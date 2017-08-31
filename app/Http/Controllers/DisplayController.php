<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DisplayController extends Controller
{
    public function auth(){
        if(Auth::check()) return Auth::user();
        else return null;
    }

    public function openToken(){
        $user = $this->auth();
        if($user==null) return redirect('/');
        return view('opentokens');
    }

    public function clickToken(){
        $user = $this->auth();
        if($user==null) return redirect('/');
        return view('clicktokens');
    }

    public function myTokens($type){
        $user = $this->auth();
        if($user==null) return redirect('/');
        switch ($type){
            case "openTokens":
                $_GET['type'] = '1';
                break;
            case "clickTokens":
                $_GET['type'] = '2';
                break;
            default:
                $type = 'all';
                $_GET['type'] = '';
                break;
        }
        $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->showAll()->getdata())['content'];
        $data = [];
        foreach ($raw_data as $key => $item)
            $data[] = (array)$item;
        return view('mytokens',compact(array('type','data')));
    }

    public function logs($id){
        $user = $this->auth();
        if($user==null) return redirect('/');

        //get list of all ids created by this user to display in a list
        $_GET['type'] = '';
        $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->showAll()->getdata())['content'];
        $data1 = [];
        $ids = [];
        foreach ($raw_data as $key => $item){
            $data1[((array)$item)["id"]] = (array)$item;
            $ids[] = end($data1)["id"];
        }
        //

        $data=[];
        if($id=='home') return view('logs',compact(array('id','ids')));
        else {
            $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->showTokenDetails($id)->getdata())['content'];
            $raw_data = $raw_data[1];
            if(!isset($data1[$id])) {$id='home';return view('logs',compact(array('id','ids')));}
            $data[] = $data1[$id];
            foreach ($raw_data as $key => $item){
                $data[] = (array)$item;
            }
            return view('logs',compact(array('id','data')));
        }
    }

    public function frauds($id){
        $user = $this->auth();
        if($user==null) return redirect('/');

        //get list of all ids created by this user to display in a list
        $_GET['type'] = '';
        $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->showAll()->getdata())['content'];
        $data1 = [];
        $ids = [];
        foreach ($raw_data as $key => $item){
            $data1[((array)$item)["id"]] = (array)$item;
            $ids[] = end($data1)["id"];
        }
        //

        $data=[];
        if($id=='home') return view('frauds',compact(array('id','ids')));
        else {
            $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->tokenFrauds($id)->getdata())['content'];
            if(!isset($data1[$id])) {$id='home';return view('frauds',compact(array('id','ids')));}
            $data[] = $data1[$id];
            foreach ($raw_data as $key => $item){
                $data[$key] = ((array)$item)[0];
            }
            return view('frauds',compact(array('id','data')));
        }
    }

    public function delete($id){
        $user = $this->auth();
        if($user==null) return redirect('/');

        //get list of all ids created by this user to display in a list
        $_GET['type'] = '';
        $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->showAll()->getdata())['content'];
        $data1 = [];
        $ids = [];
        foreach ($raw_data as $key => $item){
            $data1[((array)$item)["id"]] = (array)$item;
            $ids[] = end($data1)["id"];
        }
        //

        $data=[];
        if($id=='home') return view('delete',compact(array('id','ids')));
        else {
            if(!isset($data1[$id])) {$id='home';return view('delete',compact(array('id','ids')));}
            $data[] = $data1[$id];
            return view('delete',compact(array('id','data')));
        }
    }

    public function deleteConfirm($id){
        $user = $this->auth();
        if($user==null) return redirect('/');
        $val = ((array)app('App\Http\Controllers\SentTokensController')->delete($id)->getdata())['content'];
        $id = 'delete';
        return view('delete',compact(array('id','val')));
    }

    public function iStats($id){
        $user = $this->auth();
        if($user==null) return redirect('/');

        //get list of all ids created by this user to display in a list
        $_GET['type'] = '';
        $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->showAll()->getdata())['content'];
        $data1 = [];
        $ids = [];
        foreach ($raw_data as $key => $item){
            $data1[((array)$item)["id"]] = (array)$item;
            $ids[] = end($data1)["id"];
        }
        //

        $data=[];
        if($id=='home') return view('iStats',compact(array('id','ids')));
        else {
            if(!isset($data1[$id])) {$id='home';return view('iStats',compact(array('id','ids')));}
            if(!isset($_GET['start']) || $_GET['start']=="") {
                $start = 1501525800;
                $_GET['start'] = $start;
            }
            if(!isset($_GET['bucket']) || $_GET['bucket']=="") {
                $bucket = 30;
                $_GET['bucket'] = $bucket;
            }
            $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->tokenStats($id)->getdata())['content'];
            foreach ($raw_data as $key => $val) {
                $data[$key] = ((array)$val);
                $data[$key]['details'] = (array)$data[$key]['details'];
            }
            return view('iStats',compact(array('id','data')));
        }
    }

    public function Stats(){
        $user = $this->auth();
        if($user==null) return redirect('/');
        $raw_data = ((array)app('App\Http\Controllers\SentTokensController')->stats()->getdata())['content'];
        $data=[];
        foreach ($raw_data as $key => $val) {
            $data[$key] = ((array)$val);
            $data[$key]['details'] = (array)$data[$key]['details'];
        }
        return view('Stats',compact(array('data')));
    }
}































