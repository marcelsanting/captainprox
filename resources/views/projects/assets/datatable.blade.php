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
    window.addEventListener('DOMContentLoaded', function() {
        (function($) {
            $(document).ready(function() {
                DataTablebuilder('{{$tablename}}', '{{ $route }}', {{ $progressbar }});
            });
        })(jQuery);
    });

</script>
