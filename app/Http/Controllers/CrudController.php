<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CrudController extends Controller
{
     
    public function index()
    {       
        $posts = Crud::all();
        return view('welcome',compact('posts')); 
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

        $items = $request->all();
        Crud::create([
            'username' =>$items['username'],
            'fullname' =>$items['fullname'],
            'email' =>$items['email'],
            'password' =>$items['password'],
            'status' =>$items['status']
        ]);

        return redirect('/')->with('success','Post created successfully.');
    }

    public function show($id){
        $user = DB::table('cruds')->find($id);
        return view('show',compact('user'))->with('success','Post created successfully.');
    }

    public function edit_post($id){
        $user = DB::table('cruds')->find($id);
        Session::flash('success','User selected successfully.');
        return view('edit',compact('user'));
    }

    public function edit(Request $request, $id){
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);
         
        $items = $request->all();
        Crud::where('id', $id)->update([
            'username' =>$items['username'],
            'fullname' =>$items['fullname'],
            'email' =>$items['email'],
            'password' =>$items['password'],
            'status' =>$items['status']
        ]);

        return redirect('/')->with('success','User Updated successfully.');
    }

    public function destroy($id){
        Crud::where('id', $id)->delete();
        return redirect('/')->with('error','User Deleted successfully.');
    }
}
