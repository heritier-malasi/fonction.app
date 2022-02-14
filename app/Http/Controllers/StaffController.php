<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    public function index(Request $request){
        $id = Auth::user()->id;
        $staffs = User::where('id','=', $id)->first();
        return view('pages.admin.all-staffs', compact('staffs'));
    }

    public function cropImage(Request $request){
        $path = 'files/'.Auth::user()->id;
        $file = $request->file('picture');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        $upload = $file->move(public_path($path), $new_image_name);

        if(!$upload){
              return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
        }else{
            $id = Auth::user()->id;
            // $userInfo = User::where('id','=', $id)->first();
            // $userPhoto = $userInfo->picture;

            // if ($userPhoto !='') {
            //     unlink($path.$userPhoto);
            // }

            User::where('id','=', $id)->update(['picture'=>$new_image_name]);

            // return dd($userInfo);

            return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'name'=>$new_image_name]);
        }

    }
}
