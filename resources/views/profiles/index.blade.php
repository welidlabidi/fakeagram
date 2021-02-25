@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5 d-flex justify-content-between align-items-center">
        <div class="col-3">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" alt="logo" />
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <div class="h4"> {{ $user->username }} </div>
                    <followbutton user-id="{{ $user->id }}" follows={{ $follows}}></followbutton>
                </div>
                @can('update', $user->profile)
                <a href="/p/create">add new post</a>
                @endcan
            </div>

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $posts}}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followers}}</strong> followers</div>
                <div class="pr-5"><strong>{{ $following}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}} </div>
            <div class="d-flex justify-content-between align-items-baseline">
                <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>

                @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row pt-5 pb-4">
        @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="" />
            </a>
            <h5>{{ $post->caption  }}</h5>
        </div>


        @endforeach
    </div>
    @endsection