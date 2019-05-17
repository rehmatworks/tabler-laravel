@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<form action="{{ route('admin.users') }}" method="post">
    @csrf
    <div class="row">
        <div class="form-group col-sm-4 col-md-2">
            <label class="form-label">
                {{ __('users.role') }}
            </label>
            <select name="role" class="custom-select @error('role') ? is-invalid @enderror">
                @foreach($roles as $role)
                <option value="{{ $role->id }}"{{ old('role') == $role->id ? ' selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-sm-4 col-md-3">
            <label class="form-label">
                {{ __('users.name') }} <span class="form-required">*</span>
            </label>
            <input name="name" type="text" value="{{ old('name') }}" class="form-control @error('name') ? is-invalid @enderror" placeholder="{{ __('users.name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-sm-4 col-md-3">
            <label class="form-label">
                {{ __('users.email') }} <span class="form-required">*</span>
            </label>
            <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') ? is-invalid @enderror" placeholder="{{ __('users.email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-sm-4 col-md-3">
            <label class="form-label">
                {{ __('auth.password') }} <span class="form-required">*</span>
            </label>
            <input name="password" type="password" class="form-control @error('password') ? is-invalid @enderror" placeholder="{{ __('auth.setaccountpassword') }}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group col-sm-4 col-md-1">
            <label class="form-label">&nbsp;</label>
            <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fe fe-plus"></i></button>
        </div>
    </div>
</form>
