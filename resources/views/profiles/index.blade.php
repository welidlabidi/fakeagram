@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pb-5">
            <img src="../svg/fakeagramlogo.svg" style="height:100px;" alt="logo" />
        </div>
        <div class="col-9" class="pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1> {{ $user->username }} </h1>
                <a href="/p/create">add new post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>134</strong> posts</div>
                <div class="pr-5"><strong>12k</strong> followers</div>
                <div class="pr-5"><strong>232</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}} </div>
            <div><a href="">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="" />
            <h5>{{ $post->caption  }}</h5>
        </div>


        @endforeach
    </div>
    @endsection