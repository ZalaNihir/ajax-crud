<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view()
    {

        $data = Category::get();
        return response()->json(
            $data,
        );
    }
    public function store(Request $request)
    {
        
        $data = new Category();
        $data->name = $request->name;
        $data->save();
        return response()->json(
            $data,
        );
    }
    public function delete($id)
    {
        
       $data = Category::where('id',$id)->delete();
        return response()->json(
            $data,
        );
    }
    public function edit($id)
    {
        
       $data = Category::where('id',$id)->first();
        return response()->json(
            $data,
        );
    }
    public function update(Request $request)
    {   
        // return "Helo";
       $data = Category::find($request->id);
       $data->name = $request->name;
       $data->save();
        return response()->json(
            $data,
        );
    }
}
