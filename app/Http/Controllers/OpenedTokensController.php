<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OpenedTokens;	
use App\TokenDestination;
use App\SentTokens;	
use UAParser\Parser;
use App\Http\PixelResponse;

\date_default_timezone_set('Asia/Kolkata');

class OpenedTokensController extends Controller
{

    public function getDevice($os){
        if($os=='Android' || $os=='iOS') return "Mobile";
        elseif ($os=='Windows' || $os=='Linux' || $os=='Mac') return "Desktop";
        else return "Other";
    }

    public function getOS($os){
        if($os=='Mac') return "macOS";
        return $os;
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function track(Request $request){
    	$id = $request->query('id');
    	$item = SentTokens::where('id','=',$id)->get()->first();
    	if($item){
            $ua = \Request::server('HTTP_USER_AGENT');
            $parser = Parser::create();
            $result = $parser->parse($ua);
    		$item->opens += 1;
    		$item->save();
    		OpenedTokens::create([
    		'created_at' => \date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
    		'tracker_id' => $id,
    		'user_ip' => $this->get_client_ip(),
            'browser' => explode(" ", $result->ua->family)[0],
            'os' => $this->getOS(explode(" ",$result->os->family)[0]),
            'device' => $this->getDevice(explode(" ",$result->os->family)[0]),
    		'user_agent' => $ua,
    		]);
            $tokendest = TokenDestination::where('id','=',$id)->get()->first();
            //dd($_SERVER);
            if($tokendest) return \redirect($tokendest->dest);
    		else return new PixelResponse();
    	}
    	else{
    		return response("",404);
    	}
    }
}
