<?php

namespace App\Http\Controllers;

use App\SentTokens;	
use App\OpenedTokens;
use App\TokenDestination;
use App\User;
use Illuminate\Http\Request;

\date_default_timezone_set('Asia/Kolkata');

class SentTokensController extends Controller
{
    protected $unAuth = "Error : 401 Unauthorized. Enter correct credentials.";
    protected $Forbid = "Error : 403 Forbidden. You don't have access to requested token.";

    public function auth(){
        $user_id = \Request::server('HTTP_USER_ID');
        $pass = \Request::server('HTTP_PASS');
        $item = User::where('id','=',$user_id)->where('password','=',$pass)->get()->first();
        return $item;
    }

    public function Groupify($data,$filters){
        $combinations = [];
        $helper = [];
        $ctr=0;
        foreach ($filters as $filter => $bool) {
            if($bool=='true'){
                $helper[$ctr] = [];
                foreach ($data as $key => $value) {
                    $helper[$ctr][$value[$filter]] = 1;
                }
                $ctr++;
            }
        }
        //dd($helper);
        if($ctr==1){
            foreach($helper[0] as $key => $value) {
                $combinations[$key] = 0;
            }
            foreach ($combinations as $key => $value) {
                for($i=0;$i<sizeof($data);$i++){
                    if(in_array($key, $data[$i])) $combinations[$key]+=1;
                }
            }
        }

        if($ctr==2){
            foreach($helper[0] as $key0 => $value0) {
                foreach ($helper[1] as $key1 => $value1) {
                    $appended = $key0." % ".$key1;
                    $combinations[$appended] = 0;
                }
            }
            foreach ($combinations as $key => $value) {
                for($i=0;$i<sizeof($data);$i++){
                    $split = explode(" % ", $key);
                    if(in_array($split[0], $data[$i])&&
                        in_array($split[1], $data[$i])) $combinations[$key]+=1;
                }
            }
        }

        if($ctr==3){
            foreach($helper[0] as $key0 => $value0) {
                foreach ($helper[1] as $key1 => $value1) {
                    foreach ($helper[2] as $key2 => $value2) {
                        $appended = $key0." % ".$key1." % ".$key2;
                        $combinations[$appended] = 0;
                    }
                }
            }
            foreach ($combinations as $key => $value) {
                for($i=0;$i<sizeof($data);$i++){
                    $split = explode(" % ", $key);
                    if(in_array($split[0], $data[$i])&&
                        in_array($split[1], $data[$i])&&
                        in_array($split[2], $data[$i])) $combinations[$key]+=1;
                }
            }
        }

        $result = [];
        foreach ($combinations as $key => $value) {
            if($value) $result[$key] = $value;
        }

        return $result;
    }

    public function Bucketify($data,$val,$start,$filters){
        $val_sec = $val*60;
        $cur = $start;
        $next = $cur + $val_sec;
        $max = end($data)['created_at'];
        $result = array();
        $result[$cur] = 0;
        for($i=0;$i<sizeof($data);) {
            $key = $data[$i]['created_at'];
            if($key<$next && $key>=$cur){
                $result[$cur]['count'] += 1;
                $result[$cur]['details'][] = $data[$i];
                $i += 1;
            }
            else{
                $cur = $next;
                $next = $cur + $val_sec;
                $result[$cur]['count'] = 0;
                $result[$cur]['details'] = [];
            }
        }
        $final = array();
        foreach ($result as $key => $value) {
            if($value['count']){
                $final[\date("d F Y H:i:s", $key)." (+ ".($val)." min)"] = $value;
            }
        }
        foreach ($final as $key => $value) {
            $final[$key]['details'] = $this->Groupify($value['details'],$filters);
        }
        return $final;
    }

    public function checkFraud($data){
        $hashs = [];
        foreach ($data as $key){
            $hashs[$key] = 1;
        }
        foreach ($data as $key){
            $hashs[$key] += 1;
        }
        $result = [];
        foreach ($hashs as $key => $value) {
            if($value>2){
                $result[\date("d F Y H:i:s", $key)] = $value-1;
            }
        }
        return $result;
    }

    public function generate(){
        $user = $this->auth();
        if($user){
            $user->tokens_created += 1;
            $user->save();
            $cur = \date('Y-m-d H:i:s');
            $dest = \Request::server('HTTP_DEST');
            SentTokens::create([
                'created_by' => $user->id,
                'created_at' => $cur
                ]);
            if($dest){
                TokenDestination::create([
                    'id' => SentTokens::latest()->first()->id,
                    'dest' => $dest
                    ]);
                $tracker = 'http://127.0.0.1:8000/opens?id=';
                $tracker .=  SentTokens::latest()->first()->id;
            }
            else{
                $tracker = '<img src="http://127.0.0.1:8000/opens?id=';
                $tracker .=  SentTokens::latest()->first()->id;
                $tracker .= '">';
            }
            return response()->json(['content' => $tracker,]);
        }
        else{
            return response()->json(['content' => $this->unAuth,],401);
        }
    }

    public function showAll(){
        $user = $this->auth();
        if($user){
            $item = SentTokens::where('created_by','=',$user->id)->latest()->get();
            return response()->json(['content' => $item]);
        }
        else return response()->json(['content' => $this->unAuth,],401);
    }

    public function showTokenDetails($id){
        $user = $this->auth();
        if($user){
            $item = array(SentTokens::where('id','=',$id)->where('created_by','=',$user->id)->get()->first());
            if($item[0]){
                if($item[0]->opens>0) $item[] = OpenedTokens::where('tracker_id','=',$id)->get();
                return response()->json(['content' => $item]);
            }
            else return response()->json(['content' => $this->Forbid,],403);
        }
        else{
            response()->json(['content' => $this->unAuth,],401);
        }
    }

     public function stats(){
        $user = $this->auth();
        if($user){
            $item = SentTokens::where('created_by','=',$user->id)->select('id','opens')->get();
            foreach ($item as $key) {
                if($key["opens"]>0) $key["unique_opens"] = 1;
                else $key["unique_opens"] = 0;
            }
            return response()->json(['content' => $item]);
        }
        else response()->json(['content' => $this->unAuth,],401);
    }

    public function tokenStats(Request $request, $id){
        $user = $this->auth();
        if($user){
            $bucket = $request->query('bucket');
            $start = $request->query('start');
            $filters = [];
            $filters['browser'] = $request->query('browser');
            $filters['os'] = $request->query('os');
            $filters['device'] = $request->query('device');
            $item = SentTokens::where('id','=',$id)->where('created_by','=',$user->id)->get()->first();
            if($item){
                $data = OpenedTokens::where('tracker_id','=',$id)->select('created_at','browser','os','device')->get();
                $data_simple = [];
                $ctr=0;
                foreach ($data as $each) {
                    $data_simple[$ctr]['created_at'] = $each['created_at']->getTimestamp();
                    $data_simple[$ctr]['browser'] = $each['browser'];
                    $data_simple[$ctr]['os'] = $each['os'];
                    $data_simple[$ctr]['device'] = $each['device'];
                    $ctr++;
                }
                //dd($data_simple);
                sort($data_simple);
                $tokenStats = [];
                //if($data_simple) $tokenStats = $this->Groupify($data_simple,$filters);
                if($data_simple) $tokenStats = $this->Bucketify($data_simple,$bucket,$start,$filters);
                return response()->json(['content' => $tokenStats]);
            }
            else return response()->json(['content' => $this->Forbid,],403);
        }
        else{
            return response()->json(['content' => $this->unAuth,],401);
        }
    }

    public function tokenFrauds(Request $request, $id){
        $user = $this->auth();
        if($user){
            $item = SentTokens::where('id','=',$id)->where('created_by','=',$user->id)->get()->first();
            if($item){
                $data = OpenedTokens::where('tracker_id','=',$id)->select('created_at')->get();
                $data_simple = [];
                foreach ($data as $each) {
                    $data_simple[] = $each['created_at']->getTimestamp();
                }
                sort($data_simple);
                $frauds = [];
                if($data_simple) $frauds = $this->checkFraud($data_simple);
                return response()->json(['content' => $frauds]);
            }
            else return response()->json(['content' => $this->Forbid,],403);
        }
        else{
            return response()->json(['content' => $this->unAuth,],401);
        }
    }

    public function delete($id){
        $user = $this->auth();
        if($user){
            $deleted = SentTokens::where('id', '=', $id)->where('created_by','=',$user->id)->delete();
            if($deleted) return response()->json(['content' => "Success",]);
            else return response()->json(['content' => $this->Forbid,],403);
        }
        else{
            return response()->json(['content' => $this->unAuth,],401);
        }
    }
}
