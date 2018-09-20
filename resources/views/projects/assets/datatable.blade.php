<table id="{{ $tablename }}" data-content="1" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        @foreach($heads as $head)
            <th>{{ $head }}</th>
        @endforeach
    </tr>
    </thead>
    <tfoot>
    <tr>
        @foreach($heads as $head)
            <th>{{ $head }}</th>
        @endforeach
    </tr>
    </tfoot>
</table>
<script type="text/javascript">
    var project_id = '{{ $project_id }}';
    var user_id = '{{ $user_id }}';
</script>
