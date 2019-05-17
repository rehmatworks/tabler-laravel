@extends('auth.master')

@section('content')
<form class="card" action="{{ route('login') }}" method="post">
    @csrf
    <div class="card-body p-6">
        <h4 class="text-center">{{ __('auth.accountlogin') }}</h4>
        <hr class="mt-1 mb-3">
        <div class="form-group">
            <label class="form-label">{{ __('common.emailaddress') }}</label>
            <input name="email" type="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('common.youremailaddress') }}">
            @if($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label class="form-label">
                {{ __('auth.password') }}
                <a href="{{ route('password.request') }}" class="float-right small">{{ __('auth.resetpassword') }}</a>
            </label>
            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.youraccountpassword') }}">
            @if($errors->has('password'))
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>
        <div class="form-footer mt-0">
            <button type="submit" class="btn btn-primary btn-block">{{ __('auth.login') }}</button>
        </div>
    </div>
</form>
@endsection
