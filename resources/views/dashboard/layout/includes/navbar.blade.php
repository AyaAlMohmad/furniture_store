<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>
            <li class="list-inline-item dropdown notification-list nav-user">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('dashboard/assets/images/users/avatar-6.jpg') }}" alt="user"
                        class="rounded-circle">
                    <span class="d-none d-md-inline-block ml-1">{{ Auth::user()->name }} <i
                            class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">

                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="dripicons-exit text-muted"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            @if ($module_name != 'dash' && $method_name == 'index')
                <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        Activity <i class="mdi mdi-plus"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated">
                        @if ($method_name == 'index' && in_array('create', $module_actions))
                            <a href="{{ route($module_name . '.create') }}" class="btn btn-primary btn-xs"><i
                                    class="ace-icon fa fa-plus"></i> Create item</a>
                        @endif
                        @if ($method_name == 'index' && in_array('recycleBin', $module_actions))
                            <a href="{{ route($module_name . '.soft') }}" class="btn btn-xs btn-danger"><i
                                    class="ace-icon dripicons-trash bigger-120"></i> Recycle Bin</a>
                        @endif

                    </div>
                </li>

            @endif
            <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                @if ($method_name != 'index')
                    <a href="{{ route($module_name . '.index') }}"
                        class="nav-link dropdown-toggle arrow-none waves-effect">
                        <i class=" ion ion-md-redo "style="font-size: 20px;"></i>
                    </a>
                @endif
            </li>
            <li class="list-inline-item dropdown notification-list d-none d-sm-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#">
                    <span class="fi fi-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                    {{ Config::get('languages')[App::getLocale()]['display'] }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a class="dropdown-item" href="{{ Route('lang.switch', $lang) }}">
                                <span class="fi fi-{{ $language['flag-icon'] }}"></span>
                                {{ $language['display'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </li>


        </ul>


    </nav>

</div>
