@extends('admin.backend')

@section('content')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Status Collection</h4>
        <div class="row">
            <div class="col-md-12">

                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h6 class="c-grey-900">Add a new Status</h6>
                    <hr />
                    <form method="post" action="{{route('statuses.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Set Task title" required/>
                            @if ($errors->has('title'))
                                <div class="alert alert-danger" role="alert">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn-primary">Add Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="StatusTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Belongs_to</th>
                            <th>Created</th>
                            <th>last update</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Belongs_to</th>
                            <th>Created</th>
                            <th>last update</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
