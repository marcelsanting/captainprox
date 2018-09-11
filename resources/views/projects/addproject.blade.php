<form action="{{url('/admin/projects/store')}}" method="post">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" type="text" id="status" name="status" value="1"/>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Project Title" required>
            @if ($errors->has('title'))
                <div class="alert alert-danger" role="alert">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <hr/>
        <h6 class="c-grey-900 mT-10 mB-30">Project details</h6>
        <div class="form-group">
            <label for="user_id">Project owner</label>
            <select id="user_id" name="user_id" class="form-control">
                <option>Select Project owner</option>
                <option value="1">Marcel Santing</option>
                <option value="2">Pietje Puk</option>
            </select>
            @if ($errors->has('user_id'))
                <div class="alert alert-danger" role="alert">{{ $errors->first('user_id') }}</div>
            @endif

        </div>
        <div class="form-group">
            <label for="body">Project summary:</label>
            <textarea name="body" id="body" class="form-control body-editor" placeholder="Enter your project details..." rows="8" required>
            </textarea>
            @if ($errors->has('body'))
                <div class="alert alert-danger" role="alert">{{ $errors->first('body') }}</div>
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


