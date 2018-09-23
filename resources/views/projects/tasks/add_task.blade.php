@extends('admin.backend')
@section('content')
    <div class="bgc-white p-45 bd  col-md-6  h-1@lg">
        <h2 class="c-grey-900">Detail Task #new</h2>
        <form action="{{ route('tasks.store') }}" class="form-control" method="post">
            {{ csrf_field() }}
            <input type="hidden" id="created_by" name="created_by" value="{{ auth()->user()->id }}">
            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" id="project_id" name="project_id" value="{{ $feature->project_id }}">
            <input type="hidden" id="feature_id" name="feature_id" value="{{ $feature->id }}">
            <h6 class="c-grey-900 badge-secondary" style="text-align: right;text-decoration-color:#fff;"></h6>
            <div class="form-row">
                <label for="title" class="col-form-label-lg col-md-12">Subject
                        <input type="text" name="title" id="title" class="form-control" placeholder="please enter a title">
                </label>
            </div>
            <div class="form-row">
                <label for="body" class="col-form-label-lg col-md-12">Description
                        <textarea name="body" id="body" class="form-control body-editor">Enter task details here</textarea>
                </label>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon" id="status-select">Status:
                                <select id="status" name="status" class="form-control" aria-describedby="status-select">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->title }}</option>
                                    @endforeach
                                </select></label>
                        </div>
                        <div class="input-group">
                            <label class="input-group-addon" id="assigned-select">Assigned:
                                <select id="assigned_id" name="assigned_id" class="form-control" aria-describedby="assigned-select">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-outline-primary pull-right">Save</button>
            </div>
        </form>
        @if($errors)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
        @endif
    </div>
@endsection
