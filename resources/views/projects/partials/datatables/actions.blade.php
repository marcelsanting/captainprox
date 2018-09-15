<form method="post">
    <form id="deleteProject" name="deleteProject" action="{{ route('projects.destroy', $project->id) }}" method="POST">
        @method('DELETE')
        @csrf
    </form>
</form>
<div class="col-md-12">
    <a href="{{route('projects.show', $project->id)}}" class="btn btn-outline-success col-md-4 col-sm-8">Edit</a>
    @if(Auth::user()->hasAnyRole(['Manager']))
    <button type="submit" form="deleteProject" class="btn btn-outline-danger col-md-4 col-sm-8">Delete</button>
    @endif
</div>
