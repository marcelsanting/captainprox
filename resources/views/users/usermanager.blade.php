@extends('admin.backend')

@section('content')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">UserManager</h4>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="UserTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>created</th>
                            <th >last update</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>created</th>
                            <th >last update</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
