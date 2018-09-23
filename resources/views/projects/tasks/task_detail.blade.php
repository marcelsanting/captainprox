@extends('admin.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="bgc-white p-45 bd  col-md-6  h-1@lg">
            <h2 class="c-grey-900">Detail Task #{{ $task->id }}</h2>
            <form action="{{ route('tasks.update', $task->id) }}" method="post" class="form-control">
                @method('PUT')
                @csrf
                <h6 class="c-grey-900 badge-secondary" style="text-align: right;text-decoration-color:#fff;">{{ $task->owner->name }}</h6>
            <div class="form-row">
                <label for="title" class="col-form-label-lg col-md-12">Subject
                @if(auth()->user()->id == $task->user_id)
                    <input type="text" name="title" id="title" class="form-control" placeholder="please enter a title" value="{{ $task->title }}">
                @else
                    <p>{{ $task->title }}</p>
                @endif
                </label>
            </div>
            <div class="form-row">
                <label for="body" class="col-form-label-lg col-md-12">Description
                    @if(auth()->user()->id == $task->user_id)
                    <textarea name="body" id="body" class="form-control body-editor">{{ $task->body }}</textarea>
                    @else
                        <div class="bgc-grey-100">{{ $task->body }}</div>
                    @endif
                </label>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-addon" id="status-select">Status:
                            <select id="status" name="status" class="form-control" aria-describedby="status-select">
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" @if($status->id === $task->status) selected @endif>{{ $status->title }}</option>
                                @endforeach
                            </select></label>
                        </div>
                        <div class="input-group">
                            <label class="input-group-addon" id="assigned-select">Assigned:
                            <select id="assigned_id" name="assigned_id" class="form-control" aria-describedby="assigned-select">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id === $task->assinged_id) selected @endif>{{ $user->name }}</option>
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
        </div>
        <div class="bgc-white p-45 bd col-md-6" >
            <h2 class="c-grey-900">History</h2>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-history" aria-selected="true">Comments</a>
                    <a class="nav-item nav-link" id="nav-form-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-form" aria-selected="false">New comment</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
            <div class="col-md-12 tab-pane fade show active" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                @if(!empty($task->comments))
                <ul class="list-group h-50" style="overflow-y: scroll;">
                    @foreach($task->comments as $comment)
                    <li class="bgc-grey-50 p-45 bd comment">
                        <h6 class="c-grey-900 badge-info">{{ $comment->created_at }}</h6>
                        {!! $comment->body !!}
                    </li>
                    @endforeach
                </ul>
                @else
                    No comments were placed
                @endif
            </div>
            <div class="col-md-12 tab-pane fade" id="nav-form" role="tabpanel" style="position: relative; top:0; aria-labelledby="nav-form-tab">
                <form action="{{ route('comments.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" id="task_id" name="task_id" value="{{ $task->id }}">
                <div class="form-row">
                    <label for="body">Comment
                        <textarea class="body-editor2 form-control" name="body" id="body"></textarea>
                    </label>
                </div>
                <button class="btn btn-outline-primary" type="submit">add</button>
                </form>
                @if($errors)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
