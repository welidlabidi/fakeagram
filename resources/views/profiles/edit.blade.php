@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
        @csrf

        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Edit profile</h2>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">title</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description')  ?? $user->profile->description }}"
                        autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Url</label>

                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                        value="{{ old('url')  ?? $user->profile->url  }} " autocomplete="url" autofocus>

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                        <input type="file" , class="form-controle-file" id="image" name="image"
                            style="padding-left: 15px;" />

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <button class="btn btn-primary">Save profile</button>
                </div>
            </div>

        </div>

</div>
</form>
</div>
@endsection