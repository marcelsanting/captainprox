<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                    <i class="ti-menu"></i>
                </a>
            </li>
            @include('admin.assets.search')
        </ul>

        <ul class="nav-right">
            @include('admin.assets.notify')
            @include('admin.assets.mail')
            @include('admin.assets.user')
        </ul>
    </div>
</div>
