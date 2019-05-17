<div class="container">
    <div class="d-flex">
        <a class="header-brand" href="{{ route('admin.dashboard') }}">
            {{ env('APP_NAME') }}
        </a>
        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown d-none d-md-flex">
                <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span v-if="notifs.length" class="nav-unread"></span>
                </a>
                <div v-if="notifs.length" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a v-for="notif in notifs" v-bind:href="notif.data.url" class="dropdown-item d-flex">
                        <div>
                            <span v-text="notif.data.message"></span>
                            <div class="small text-muted" v-text="notif.created_at"></div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">{{ __('common.markasread') }}</a>
                </div>
                <div v-else class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <p class="text-center pt-3">{{ __('common.nonotifsfound') }}</p>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{ Auth::user()->avatarurl }})"></span>
                    <span class="ml-2 d-none d-lg-block">
                        <span class="text-default">{{ Auth::user()->name }}</span>
                        <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                        <i class="dropdown-icon fe fe-settings"></i> {{ __('common.settings') }}
                    </a>
                    <a @click="signOut('{{ route('logout') }}')" class="dropdown-item" href="javascript:void(0)">
                        <i class="dropdown-icon fe fe-log-out"></i> {{ __('auth.signout') }}
                    </a>
                </div>
            </div>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
            <span class="header-toggler-icon"></span>
        </a>
    </div>
</div>
