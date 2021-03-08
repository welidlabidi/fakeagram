@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row pt-5 d-flex align-items-center">
        @foreach($userss as $user)
        <?php if (Auth::user()->id !== $user->id) { ?>
        <div class="card d-flex align-items-center mr-3" style="width: 14rem; padding-bottom:10px;">
            <a href="/profile/{{$user->id}}">
                <?php if ($user->image !== null) { ?>
                <img class="card-img-top rounded-circle" style="width: 80px; padding-top:10px; padding-bottom:10px;"
                    src="/storage/{{$user->image}}" alt="Card image cap"></a>
            <?php } else { ?>
            <img class="card-img-top rounded-circle" style="width: 80px; padding-top:10px; padding-bottom:10px;"
                src="/storage/uploads/KAlHAflUKk2vFfr9B8oU1RrYa6clPEbc5xshaQ1c.png" alt="Card image cap"></a>
            <?php } ?>
            <div class="card-body" style="display:contents;">
                <h5 class="card-title">{{$user->title}}</h5>
                <followbutton user-id="{{ $user->id }}" follows={{ $follows }}></followbutton>
            </div>
        </div>
        <?php } ?>

        @endforeach
    </div>


    <hr>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-4 offset-4">
            <a href="/profile/{{$post->user_id}}"><img src="/storage/{{ $post->image }}" class="w-100" alt="" /></a>
        </div>
    </div>
    <div class="row pt-2 pb-4">
        <div class="col-4 offset-4">
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user_id }}">
                        <span class="text-dark">{{$post->username}}</span>
                    </a>
                </span>
                {{ $post->caption}}
            </p>
        </div>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $posts -> links()}}
    </div>
</div>
</div>
@endsection