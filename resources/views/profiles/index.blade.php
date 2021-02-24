@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5 d-flex justify-content-between align-items-center">
        <div class="col-3 pb-5">
            <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100" alt="logo" />
        </div>
        <div class="col-9" class="pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1> {{ $user->username }} </h1>
                @can('update', $user->profile)
                <a href="/p/create">add new post</a>
                @endcan


            </div>

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>12k</strong> followers</div>
                <div class="pr-5"><strong>232</strong> following</div>
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