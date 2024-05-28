<?php

namespace App\Http\Controllers;

use App\Models\Ajaxupload;
use Illuminate\Http\Request;

class AjaxuploadController extends Controller
{
    public function index()
    {
        $data = Ajaxupload::get();
        return view('Ajaxupload.index',compact('data'));
    }
    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $view = 'Ajaxupload.ajaxindex';
        } else {
            $view = 'Ajaxupload.index';
        }
        $data = Ajaxupload::get();
        return view($view,compact('data'));
    }
    public function store(Request $request)
    {
        Ajaxupload::updateOrCreate([
            'id'=>$request->id,
        ],
        [
            'name'=>$request->name,
        ]);
        return response()->json([
            'code'=>'200',
        ]);
    }
    public function delete($id){
        Ajaxupload::where('id',$id)->delete();
        return response()->json([
            'code'=>'200',
        ]);
    }
    public function edit($id){
        $data = Ajaxupload::where('id',$id)->first();
        return response()->json([
            'data'=>$data,
        ]);
    }
}
       
       
