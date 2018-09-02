<form action="{{url('/admin/projects/store')}}" method="post">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" type="text" id="owner_id" name="owner_id" value="{{ Auth::user()->id }}"/>
        <input type="hidden" type="text" id="status" name="status" value="1"/>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Project Title" required>
        </div>
        <hr/>
        <h6 class="c-grey-900 mT-10 mB-30">Project details</h6>
        <div class="form-row">

        </div>
        <div class="form-group">
            <label for="body">Project summary:</label>
            <textarea name="body" id="body" class="form-control" placeholder="Enter your project details..." rows="8" required>
            </textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


