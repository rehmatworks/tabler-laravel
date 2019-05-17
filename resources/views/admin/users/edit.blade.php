@extends('admin.master')

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            Update Profile Details
        </h1>
    </div>
    <div class="row row-cards row-deck">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url();"></div>
                        <div class="card-body text-center">
                            <img class="card-profile-img" src="{{ $user->avatarurl }}">
                            <h3 class="mb-3">{{ $user->name }}</h3>
                            <p class="mb-4">
                                Registered {{ $user->registered }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="card" enctype="multipart/form-data" method="post" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <h3 class="card-title">Edit Profile</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Full name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" placeholder="Full name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" placeholder="Email address">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Mobile Number</label>
                                        <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile number" value="{{ $user->mobile }}">
                                        @error('mobile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-control custom-select @error('mobile') is-invalid @enderror">
                                            <option value="m">Male</option>
                                            <option value="f" @if($user->gender == 'f') selected @endif>Female</option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-label">Profile Picture</div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" name="avatar">
                                          <label class="custom-file-label">Choose file</label>
                                          @error('avatar')
                                          <div class="invalid-feedback">
                                              {{ $message }}
                                          </div>
                                          @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">About Me</label>
                                        <textarea name="bio" rows="5" class="form-control @error('bio') is-invalid @enderror" placeholder="Biography">{{ $user->bio }}</textarea>
                                        @error('bio')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
