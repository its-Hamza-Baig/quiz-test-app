<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class Photocontroller extends Controller
{

    public function storePhoto(Request $request){
        
        $name = $request->file('photo')->getClientOriginalName();
        $size = $request->file('photo')->getSize();

        $user_id = auth()->user()->id;
        $checkphoto = Image::where('user_id',$user_id)->get();

        if(!$checkphoto->isEmpty()){
            
        $photo_id =  $checkphoto[0]['id'];

        $findphoto = Image::find($photo_id);
        
        if ($findphoto) {
            $oldFilePath = 'public/images/' . $findphoto->name;
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
            

            $request->file('photo')->storeAs('public/images', $name);

            $findphoto->name = $name;
            $findphoto->size = $size;
            $findphoto->save();
            return redirect()->back();

        }
    }
        else{



            $request->file('photo')->storeAs('public/images', $name);
            $photo = new Image();
            $photo->user_id = auth()->user()->id;
            $photo->name = $name;
            $photo->size = $size;
            $photo->save();
            return redirect()->back();
        }




    }
}
