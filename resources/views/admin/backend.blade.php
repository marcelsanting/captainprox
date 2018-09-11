@extends('layouts.master')
@section('page')
@include('admin.assets.sidebar')

<!-- #Main ============================ -->
<div class="page-container">
    <div>
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
    </div>
</div>
@endsection
