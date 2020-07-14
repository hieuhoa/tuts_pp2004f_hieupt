<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $is_image = false;
        if (Storage::disk('local')->exists
        ('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('profile/index', ['is_image' => $is_image]);
    }

    public function store(ProfileRequest $request){
        $request->photo->storeAs
        ('public/profile_images', Auth::id() . '.jpg');

        return redirect('profile')
        ->with('success', '新しいプロフィールを登録しました');
    }
}
