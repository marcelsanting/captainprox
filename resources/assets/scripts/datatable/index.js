import * as $ from 'jquery';
import 'datatables';
import 'datatables.net-dt'
import 'datatables.net-dt/css/jquery.datatables.css';
import 'datatables.net-plugins/dataRender/percentageBars.js';


export default (function () {

$(document).ready(function () {
    $('#UserTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":"/admin/data/users",
        "columns": [
            { "data": "name" },
            { "data": "email" },
            { "data": "created_at" },
            { "data": "updated_at" },
        ]
    });

    $('#StatusTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":"/admin/data/statuses",
        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "belongs_to" },
            { "data": "created_at" },
            { "data": "updated_at" },
        ]
    });
    $('#ProjectTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":"/admin/data/projects",
        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "owner" },
            { "data": "progress" },
            { "data": "statusname" },
            { "data": "actions" },
        ],
        columnDefs: [ {
            targets: 3,
            render: $.fn.dataTable.render.percentBar( 'round','#FFF', '#269ABC', '#31B0D5', '#286090', 1, 'groove' )
        } ]
    });
    $('#ProjectFeatures').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":"/admin/data/features/"+element_id,
        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "progress" },
            { "data": "statusname" },
            { "data": "actions" }
        ],
        columnDefs: [ {
            targets: 2,
            render: $.fn.dataTable.render.percentBar( 'round','#FFF', '#269ABC', '#31B0D5', '#286090', 1, 'groove' )
        } ]
    });
});
}());
