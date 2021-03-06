@extends('admin.backend')

@section('content')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30@lg">Projects Overview</h4>
        <div class="row">
            <div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('projects.add_project')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    @if(Auth::user()->hasRole(['administrator', 'Manager']))
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProject">Add new project</button>
                    @endif
                    <hr />
                    <table id="ProjectTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Project Owner</th>
                            <th>progress</th>
                            <th>Status</th>
                            <th>actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Project Owner</th>
                            <th>progress</th>
                            <th>Status</th>
                            <th>actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
