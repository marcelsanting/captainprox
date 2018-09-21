<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="/admin">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img class="ProxLogo" src="{{ asset('marketing/CaptainProxLogo.png') }}" alt="CaptainProx">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">{{ config('app.name', 'Laravel') }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="{{url('/admin')}}">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-home"></i>
                </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->hasRole('administrator'))
            <!-- Administrator level -->
            <li class="nav-item">
                <a class='sidebar-link' href="{{route('users.index')}}">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-user"></i>
                </span>
                    <span class="title">User Manager</span>
                </a>
            </li>
            <!-- Administrator level -->
            @endif
            @if(Auth::user()->hasAnyRole(['Developer']))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-teal-500 ti-view-list-alt"></i>
                </span>
                    <span class="title">Project Manager</span>
                    <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{route("projects.index")}}">
                            <span>Projects overview</span>
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('administrator'))
                    <!-- Administrator level -->
                    <li class="nav-item dropdown">
                        <a href="{{route('statuses.index')}}">
                            <span>Status configurator</span>
                        </a>
                    </li>
                    <!-- Administrator level -->
                    @endif
                </ul>
            </li>
            @endif

        </ul>
    </div>
</div>

