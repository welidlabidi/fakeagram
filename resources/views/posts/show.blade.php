@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="" />
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" alt=""
                            style="max-width:40px;" />
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark" style="font-weight: bolder;">{{$post->user->username}}</span>
                            </a>
                        </div>
                        <?php if (Auth::user()->id === $post->user->id) { ?>
                        <form action="{{ route('postDestroy', ['id' => $post->id]) }}" method="POST">
                            <button type="submit" class="btn btn-danger"
                                style="border:none; background-color:transparent;color:red;">Delete</button>
                            @csrf
                            @method('DELETE')
                        </form>
                        <?php } ?>


                    </div>
                </div>
                <hr>
                <p>
                    <span>
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark" style="font-weight: bolder;">{{$post->user->username}}</span>
                        </a>
                    </span>
                    {{ $post->caption}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection