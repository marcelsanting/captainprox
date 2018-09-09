<table id="{{ $tablename }}" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
