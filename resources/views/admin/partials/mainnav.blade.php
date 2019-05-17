<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-3 ml-auto">
            @if(in_array(Request::route()->getName(), config('rworks.showsearchbox')))
                <form action="{{ Request::url() }}" class="input-icon my-3 my-lg-0">
                    <input name="q" type="search" class="form-control header-search" value="{{ Request::get('q') }}" placeholder="{{ __('common.search') }}&hellip;" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            @endif
        </div>
        <div class="col-lg order-lg-first">
            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link{{ Request::route()->getName()  == 'admin.dashboard' ? ' active' : '' }}"><i class="fe fe-home"></i> {{ __('nav.home') }}</a>
                </li>
                @if(Auth::user()->can('manage-users'))
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link{{ Request::route()->getName()  == 'admin.users' ? ' active' : '' }}"><i class="fe fe-users"></i> {{ __('nav.manageusers') }}</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
