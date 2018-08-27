@extends('layouts.master')
@section('page')
@include('admin.assets.sidebar')

<!-- #Main ============================ -->
<div class="page-container">
    <!-- ### $Topbar ### -->
@include('admin.assets.topbar')

<!-- ### $App Screen Content ### -->
    <main class='main-content bgc-grey-100'>
        <div id='mainContent'>
            <div class="full-container">
                @yield('content')
            </div>
        </div>
    </main>
    <!-- ### $App Screen Footer ### -->
    <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
        <span>Copyright © 2017 Designed by <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
    </footer>
</div>
@endsection
