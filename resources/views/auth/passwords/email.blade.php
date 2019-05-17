@extends('auth.master')

@section('content')
<form class="card" action="{{ route('password.email') }}" method="post">
    @csrf
    <div class="card-body p-6">
        <h4 class="text-center">{{ __('auth.resetpassword') }}</h4>
        <hr class="mt-1 mb-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="form-group">
            <label class="form-label">{{ __('common.emailaddress') }}</label>
            <input name="email" type="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('common.youremailaddress') }}">
            @if($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <div class="form-footer mt-0">
            <button type="submit" class="btn btn-primary btn-block">{{ __('auth.sendresetlink') }}</button>
        </div>
    </div>
</form>
@endsection
