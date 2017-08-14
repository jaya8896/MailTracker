<?php

namespace App\Http\Controllers;

use App\SentTokens;	
use App\OpenedTokens;
use App\User;
use Illuminate\Http\Request;

\date_default_timezone_set('Asia/Kolkata');

class SentTokensController extends Controller
{
    protected $unAuth = "Error : 401 Unauthorized. Enter correct credentials.";

    public function auth(){
        $user_id = \Request::server('HTTP_USER_ID');
        $pass = \Request::server('HTTP_PASS');
        $item = User::where('id','=',$user_id)->where('password','=',$pass)->get()->first();
        return $item;
    }

    public function Bucketify($data,$val){
        $val *= 60;
        $cur = $data[0];
        $next = $cur + $val;
        $max = end($data);
        $result = array();
        $result[$cur] = 0;
        for($i=0;$i<sizeof($data);) {
            $key = $data[$i];
            if($key<$next && $key>=$cur){
                $result[$cur] += 1;
                $i += 1;
            }
            else{
                $cur = $next;
                $next = $cur + $val;
                $result[$cur] = 0;
            }
        }
        $final = array();
        foreach ($result as $key => $value) {
            if($value>0){
                $final[\date("d F Y H:i:s", $key)." (+ ".($val/60)." min)"] = $value;
            }
        }
        return $final;
    }

    public function generate(){
        $user = $this->auth();
        if($user){
            $user->tokens_created += 1;
            $user->save();
            $cur = \date('Y-m-d H:i:s');
            SentTokens::create([
                'created_by' => $user->id,
                'created_at' => $cur
                ]);
            $tracker = '<img src="http://127.0.0.1:8000/opens?id=';
            $tracker .=  SentTokens::latest()->first()->id;
            $tracker .= '">';
            return response()->json(['content' => $tracker,]);
        }
        else{
            return response()->json(['message' => $this->unAuth,],401);
        }
    }

    public function showAll(){
        $user = $this->auth();
        if($user){
            $item = SentTokens::where('created_by','=',$user->id)->latest()->get();
            return response()->json(['content' => $item]);
        }
        else return response()->json(['message' => $this->unAuth,],401);
    }

    public function showTokenDetails($id){
        $user = $this->auth();
        if($user){
            $item = array(SentTokens::where('id','=',$id)->where('created_by','=',$user->id)->get()->first());
            if($item[0] && $item[0]->opens>0){
                $item[] = OpenedTokens::where('tracker_id','=',$id)->get();
            }
            return response()->json(['content' => $item]);
        }
        else{
            response()->json(['message' => $this->unAuth,],401);
        }
    }

     public function stats(){
        $user = $this->auth();
        if($user){
            $item = SentTokens::where('created_by','=',$user->id)->select('id','opens')->get();
            return response()->json(['content' => $item]);
        }
        else response()->json(['message' => $this->unAuth,],401);
    }

    public function tokenStats(Request $request, $id){
        $user = $this->auth();
        if($user){
            $bucket = $request->query('bucket');
            $item = SentTokens::where('id','=',$id)->where('created_by','=',$user->id)->get()->first();
            if($item){
                $data = OpenedTokens::where('tracker_id','=',$id)->select('created_at')->get();
                $data_simple = [];
                foreach ($data as $each) {
                    $data_simple[] = $each['created_at']->getTimestamp();
                }
                sort($data_simple);
                $tokenStats = $this->Bucketify($data_simple,$bucket);
                return response()->json(['content' => $tokenStats]);
            }
        }
        else{
            return response()->json(['message' => $this->unAuth,],401);
        }
    }

    public function delete($id){
        $user = $this->auth();
        if($user){
            $deleted = SentTokens::where('id', '=', $id)->where('created_by','=',$user->id)->delete();
            if($deleted) return response()->json(['message' => "Success",]);
            else return response()->json(['message' => "Fail",],403);
        }
        else{
            return response()->json(['message' => $this->unAuth,],401);
        }
    }
}
