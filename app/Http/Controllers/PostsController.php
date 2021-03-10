<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;
use App\Profile;
use App\User;
use App\Http\Controllers\ProfilesController;

class PostsController extends Controller
{
    protected $ProfilesController;
    public function __construct(ProfilesController $ProfilesController)
    {
        $this->ProfilesController = $ProfilesController;
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate();
        $userss = Profile::all();
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;






        return view('posts.index', compact('posts', 'userss', 'follows'));
    }




    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);


        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}