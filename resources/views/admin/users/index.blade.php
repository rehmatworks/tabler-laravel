@extends('admin.master')

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            Manage Users
        </h1>
    </div>
    <div class="row row-cards row-deck">
        <users-component baseurl="{{ route('admin.users') }}"></users-component>
    </div>
</div>
@endsection
