<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $user =  Auth::user();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'max:255'],
            'short_description' => ['string', 'max:500'],
            'facebook' => ['string', 'max:255'],
            'instagram' => ['string', 'max:255'],
            'twitter' => ['string', 'max:255'],
            'image' => ['image'],
        ]);

        if ($request['image']) {
            $data['image'] = $this->uploadImage($request, 'image', 'images');
        }

        $user = Auth::user();

        $user->update($data);

        ToastrHelper::success('Cập nhật thông tin' . $user->name);

        return redirect()->route('home.index');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' =>  ['required', 'same:new_password'],
        ]);

        $user = Auth::user();

        if (!Hash::check($data['old_password'], $user->password)) {
            ToastrHelper::warning('Mật khẩu cũ không chính xác');
            
            return redirect()->back();
        } else {

            $user->update([
                'password' => Hash::make($data['new_password'])
            ]);

            ToastrHelper::success('Cập nhật mật khẩu cho tài khoản ' . $user->name);

            return redirect()->route('home.index');
        }
    }
}
