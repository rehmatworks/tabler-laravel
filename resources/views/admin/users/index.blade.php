@extends('admin.master')

@section('content')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            Dashboard
        </h1>
    </div>
    @include('admin.users.partials.addform')
    <div class="row row-cards row-deck">
        <div class="col-12">
            <div class="card">
                @if($users->count())
                    <div class="table-responsive">
                        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                            <thead>
                                <tr>
                                    <th class="text-center w-1"><i class="icon-people"></i></th>
                                    <th>{{ __('users.name') }}</th>
                                    <th>{{ __('users.email') }}</th>
                                    <th class="text-center">{{ __('users.role') }}</th>
                                    <th class="text-center"><i class="icon-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <div class="avatar d-block" style="background-image: url({{ $user->avatarurl }})">
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $user->name }}</div>
                                        <div class="small text-muted">
                                            {{ __('users.registered') }} {{ $user->created_at->format('F d, Y') }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td class="text-center">
                                        {{ $user->roles()->first()->name }}
                                    </td>
                                    <td class="text-right">
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> {{ __('common.edit') }}</a>
                                                <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> {{ __('common.delete') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center">
                        <h5 class="mt-5">{{ __('users.nousersfound') }}</h5>
                        @if(Request::get('q'))
                        <p>{{ __('common.noresultsfoundforquery', ['query' => Request::get('q')]) }}</p>
                        <p><a href="{{ Request::url() }}">{{ __('common.resetsearch') }}</a></p>
                        @else
                        <p>{{ __('users.lookslikenousersadded') }}</p>
                        @endif
                    </div>
                    @endif
            </div>
            {{ $users->appends(['q' => Request::get('q')])->links() }}
        </div>
    </div>
</div>
@endsection
