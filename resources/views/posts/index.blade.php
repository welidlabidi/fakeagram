@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row pt-5 d-flex align-items-center">
        @foreach($userss as $user)
        <?php if (Auth::user()->id !== $user->id) { ?>
        <?php if ($user) { ?>
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
                <followbutton user-id="{{ $user->id }}" follows={{ $follows }}>
                </followbutton>

            </div>
        </div>
        <?php } ?>
        <?php } ?>
        @endforeach
    </div>


    <hr>




    @foreach($posts as $post)
    <div class="row pt-5">
        <div class="offset-4">
            <div style="border:solid 1px lightgray; border-bottom:none; border-radius:5px;">
                <span class="font-weight-bold">
                    <img src="{{ $post->user->profile->profileImage() }}" style="width: 35px; margin:10px;"
                        class="rounded-circle" alt="" />
                    <a href="/profile/{{ $post->user_id }}">
                        <span class="text-dark">{{$post->user->username}}</span>
                    </a>
                </span>
            </div>
            <a href="/profile/{{$post->user_id}}"><img src="/storage/{{ $post->image }}" style="max-width: 500px;"
                    alt="" /></a>
            <div style="border:solid 1px lightgray; border-top:none; border-radius:5px;" class="pt-3">
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user_id }}">
                            <span class="text-dark pr-3 pl-2">{{$post->user->username}}</span>
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