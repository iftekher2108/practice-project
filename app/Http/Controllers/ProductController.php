<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Gd\Driver as gdDriver;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $users = product::orderBy('id', 'DESC')->paginate(20);
        return view('list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dynamic_paginate(Request $request)
    {
        $users = product::orderBy('id', 'DESC')->paginate(20);
        return view('product_paginate',compact('users'))->render();
    }

    // trash data list show
    public function trashList() {
        $users =product::onlyTrashed()->paginate(20);
        return view('list_trash',compact('users'));
    }

    // single data delete
    public function trashDelete($id) {
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('trash-delete','delete successfully');
    }

    // delete all data data
    public function trashDeleteAll(Request $request) {
        $product = product::whereIn('id',$request->id);
        $product->delete();
        return response()->json(['soft-delete-data'=> 'delete successfully']);
    }

    // single data restore
    public function restoreDeleted($id) {
        $product = product::withTrashed()->find($id);
        $product->restore();
        return redirect()->back()->with('restore_deleted','restore sucessfully');
    }

    // restore all deleted data
    public function restoreAll(Request $request) {
        $product=product::withTrashed()->whereIn('id',$request->id);
        // return response()->json(['product' => $product]);
        $product->restore();
        return response()->json(['restore_deleted_all'=>'restore all successfully'],);
    }

    // parmanently delete data
     public function parmanentDelete(Request $request) {
        $product = product::withTrashed()->whereIn('id',$request->id);
        $product->forceDelete();
        return response()->json(['parmanent-delete-all'=>'parmanently delete successfully']);
     }

     public function createUser() {
        return view('create');
     }

     public function addUser(Request $request) {
        $product = new product;

        $validator = Validator::make($request->all(),[
            'name' => 'string|required',
            'picture' => 'image|mimes:png,jpeg,gif,jpg|size:1024|nullable',
            'email' =>'required',
            'password'=> 'required',
        ]);

       $driver = new ImageManager(new Driver());

        if(isset($request->picture)) {
            $image = $driver->read($request->picture);
            $image->resize(50,50);
            $file_path = public_path('uploads/images/');
            $thumb_path = public_path('uploads/images/thumb');
            $filename = time().'.'. $request->picture->extension();
            $request->picture->move($file_path,$filename);
            $image->save($thumb_path.$filename);


        }

        $product->name = $request->name;
        $product->picture = $filename;
        $product->email = $request->email;
        $product->password = $request->password;
        $product->save();

        return redirect()->back()->with('create','user create successful');

     }

     public function editUser($id) {
        $user =product::find($id);
        return view('edit',compact('user'));
     }

    public function userEdit(Request $request,$id) {
        $user = product::find($id);
    }




    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
