<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Profile;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $posts =  $user->posts->count();

        $followers = ($user->id) ? $user->profile->followers->count() : null;


        $following = $user->following->count();

        return view('profiles.index', compact('user', 'follows', 'posts', 'followers', 'following'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::findOrFail($id);
        $user->delete();
        $profile->delete();

        return redirect('/register');
    }



    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => '',
            'url' => '',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = (request('image')->store('uploads', 'public'));

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }



        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));

        return redirect("/profile/{$user->id}");
    }
}