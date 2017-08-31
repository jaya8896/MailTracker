<?php

namespace App\Http\Controllers;

use App\SentTokens;	
use App\OpenedTokens;
use App\TokenDestination;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


\date_default_timezone_set('Asia/Kolkata');

class SentTokensController extends Controller
{
    protected $unAuth = "Error : 401 Unauthorized. Enter correct credentials.";
    protected $Forbid = "Error : 403 Forbidden. You don't have access to requested token.";

    public function auth(){
        $user_id = \Request::server('HTTP_USER_ID');
        $pass = \Request::server('HTTP_PASS');
        $item = User::where('id','=',$user_id)->where('password','=',$pass)->get()->first();
        if($item==null){
            $user = Auth::user();
            if($user) $item=$user;
        }
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

        arsort($result);
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
//                $tracker = '<img src="http://127.0.0.1:8000/opens?id=';
//                $tracker .=  SentTokens::latest()->first()->id;
//                $tracker .= '">';
                $tracker = 'http://127.0.0.1:8000/opens?id=';
                $tracker .=  SentTokens::latest()->first()->id;
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
            if(!isset($_GET['type'])) $_GET['type'] = "";
            $type = $_GET['type'];
            $item = SentTokens::where('created_by','=',$user->id)->latest()->select('created_by','id','created_at')->get();

            foreach ($item as $index) {
                $index['opens'] = sizeof(OpenedTokens::where('tracker_id','=',$index['id'])->get());
                $index['dest_url'] = ($temp=TokenDestination::where('id','=',$index['id'])->get()->first())?$temp->dest:null;
                $index['token_type'] = ($index['dest_url'])? "Click token" : "Open token";
            }

            if($type){
                $result = [];
                foreach ($item as $inde){
                    if($type=='1' && $inde['dest_url']==null){
                        $result[] = $inde;
                    }
                    if($type=='2' && $inde['dest_url']){
                        $result[] = $inde;
                    }
                    if($type!='1' && $type!='2') return response()->json(['content' => "Invalid 'type'"],404);
                }
                return response()->json(['content' => $result]);
            }
            else return response()->json(['content' => $item]);
        }
        else return response()->json(['content' => $this->unAuth,],401);
    }

    public function showTokenDetails($id){
        $user = $this->auth();
        if($user){
            $item = array(SentTokens::where('id','=',$id)->where('created_by','=',$user->id)->get()->first());
            if($item[0]){
                $item[] = OpenedTokens::where('tracker_id','=',$id)->get();
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
            if(!isset($_GET['browser'])) $_GET['browser'] = "";
            if(!isset($_GET['os'])) $_GET['os'] = "";
            if(!isset($_GET['device'])) $_GET['device'] = "";
            if(!isset($_GET['type'])) $_GET['type'] = "";
            $filters = [];
            $filters['browser'] = $_GET['browser'];
            $filters['os'] = $_GET['os'];
            $filters['device'] = $_GET['device'];
            $type = $_GET['type'];
            $item = SentTokens::where('created_by','=',$user->id)->select('id')->get();

            foreach ($item as $key) {
                $opens = OpenedTokens::where('tracker_id','=',$key['id'])->select('browser','os','device')->get();

                $data_simple = [];
                $ctr=0;
                foreach ($opens as $each) {
                    $data_simple[$ctr]['browser'] = $each['browser'];
                    $data_simple[$ctr]['os'] = $each['os'];
                    $data_simple[$ctr]['device'] = $each['device'];
                    $ctr++;
                }

                $key['dest_url'] = ($temp=TokenDestination::where('id','=',$key['id'])->get()->first())?$temp->dest:null;
                $key["count"] = sizeof($opens);
                if($key["count"]>0) $key["unique_count"] = 1;
                else $key["unique_count"] = 0;
                $key["details"] = $data_simple;
            }

            $result = [];
            if(!$type) $result = $item;
            if($type){
                foreach ($item as $inde){
                    if($type=='1' && $inde['dest_url']==null){
                        $result[] = $inde;
                    }
                    if($type=='2' && $inde['dest_url']){
                        $result[] = $inde;
                    }
                    if($type!='1' && $type!='2') return response()->json(['content' => "Invalid 'type'"],404);
                }
            }

            foreach ($result as $res){
                $res['details'] = $this->Groupify($res['details'],$filters);
            }

            return response()->json(['content' => $result]);
        }

        else response()->json(['content' => $this->unAuth,],401);
    }

    public function tokenStats($id){
        $user = $this->auth();
        if($user){
            if(!isset($_GET['browser'])) $_GET['browser'] = "";
            if(!isset($_GET['os'])) $_GET['os'] = "";
            if(!isset($_GET['device'])) $_GET['device'] = "";
            $bucket = $_GET['bucket'];
            $start = $_GET['start'];
            if($bucket==null || $start==null) return response()->json(['content' => "Bad Request. Parameters 'start' or 'bucket' not set.",],400);
            $filters = [];
            $filters['browser'] = $_GET['browser'];
            $filters['os'] = $_GET['os'];
            $filters['device'] = $_GET['device'];
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
                sort($data_simple);
                $tokenStats = [];
                if($data_simple) $tokenStats = $this->Bucketify($data_simple,$bucket,$start,$filters);
                return response()->json(['content' => $tokenStats]);
            }
            else return response()->json(['content' => $this->Forbid,],403);
        }
        else{
            return response()->json(['content' => $this->unAuth,],401);
        }
    }

    public function tokenFrauds($id){
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
            if($deleted) return response()->json(['content' => "Success. Token Deleted.",]);
            else return response()->json(['content' => $this->Forbid,],403);
        }
        else{
            return response()->json(['content' => $this->unAuth,],401);
        }
    }
}
