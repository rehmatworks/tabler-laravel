@extends('auth.master')

@section('content')
<form class="card" action="{{ route('password.update') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="card-body p-6">
        <h4 class="text-center">{{ __('auth.setanewpassword') }}</h4>
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
            <label class="form-label">{{ __('auth.password') }}</label>
            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.setnewaccountpassword') }}">
            @if($errors->has('password'))
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label class="form-label">{{ __('auth.confirmpassword') }}</label>
            <input name="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="{{ __('auth.confirmaccountpassword') }}">
            @if($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </div>
            @endif
        </div>
        <div class="form-footer mt-0">
            <button type="submit" class="btn btn-primary btn-block">{{ __('auth.resetpassword') }}</button>
        </div>
    </div>
</form>
@endsection
