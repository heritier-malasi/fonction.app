<?php

namespace App\Http\Controllers;

use App\Models\ImageHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageHeroController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return view('pages.admin.image_hero');
            }else {
                return view('/');
            }
        } else {
            return view('auth.login');
        }
    }

    public function createHomeImage(){
        if (Auth::check()) {
            if (Auth::user()->is_admin == 1) {
                return view('pages.admin.add-image_hero');
            }else {
                return view('/');
            }
        } else {
            return view('auth.login');
        }    }

    public function storeImage(Request $request)
    {
        $heroImage = new ImageHero;
        $heroImage->name = $request->input('name');
        $heroImage->text = $request->input('text');
        if($request->hasfile('hero_image'))
        {
            $file = $request->file('hero_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/heroImages/', $filename);
            $heroImage->hero_image = $filename;
        }
        $heroImage->save();
        return redirect()->back()->with('status','Student Image Added Successfully');
    }
}
