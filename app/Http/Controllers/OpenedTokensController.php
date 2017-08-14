<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OpenedTokens;	
use App\SentTokens;	
use App\Http\PixelResponse;

\date_default_timezone_set('Asia/Kolkata');

class OpenedTokensController extends Controller
{
    public function track(Request $request){
    	$id = $request->query('id');
    	$item = SentTokens::where('id','=',$id)->get()->first();
    	if($item){
    		$item->opens += 1;
    		$item->save();
    		OpenedTokens::create([
    		'created_at' => \date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
    		'tracker_id' => $id,
    		'http_cache_control' => \Request::server('HTTP_CACHE_CONTROL'),
    		'http_accept' => \Request::server('HTTP_ACCEPT'),
    		'http_accept_encoding' => \Request::server('HTTP_ACCEPT_ENCODING'),
    		'http_accept_lang' => \Request::server('HTTP_ACCEPT_LANGUAGE'),
    		'user_ip' => \Request::server('REMOTE_ADDR'),
    		'user_agent' => \Request::server('HTTP_USER_AGENT'),
    		]);
    		return new PixelResponse();
    		//dd(OpenedTokens::latest()->first()->id);
    	}
    	else{
    		return null;
    	}
    }
}
