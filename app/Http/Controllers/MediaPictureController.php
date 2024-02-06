<?php

namespace App\Http\Controllers;

use App\Models\mediaPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediaPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function image() {
        return view('image');
    }

    public function dropjone() {
        return view('dropjone');
    }

    public function uploadImage(Request $request) {

        // $driver = new ImageManager(new Driver());

        $input = $request->all();
		$rules = [
		    'file' => 'image|max:3000',
        ];
		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
			return Response()->make($validation->errors());
		}
        $media = new mediaPicture();
		$files = $request->file('file');

        foreach ($files as $file) {
        $filename = time()."sp".rand(1,100).'.'.$file->extension();
        $file->storeAs('uploads/images',$filename,'public');


        }
        $media->picture = $filename;

            $media->save();
        if($media->save()) {
            return response()->json(['success'=>'picture uploaded successfully','picture'=> $media]);
        }

    }









}
