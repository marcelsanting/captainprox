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
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Real name</th>
                            <th>Status</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Real name</th>
                            <th>Status</th>
                            <th colspan="3">Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ $user->profile->name_first }} {{ $user->profile->name_last }}
                                    </td>
                                    <td>unknown</td>
                                    <td><button class="btn-primary">Edit</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
