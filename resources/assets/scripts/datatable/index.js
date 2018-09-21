//import * as $ from 'jquery';
let $ = require("jquery");
import 'datatables';
import 'datatables.net-dt'
import 'datatables.net-dt/css/jquery.datatables.css';
import 'datatables.net-plugins/dataRender/percentageBars.js';


export default (function () {

$(document).ready(function () {
    $('#UserTable').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax':'/admin/data/users',
        'columns': [
            { 'data': 'name' },
            { 'data': 'email' },
            { 'data': 'actions' },
            { 'data': 'updated_at' },
        ]
    });

    $('#StatusTable').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax':'/admin/data/statuses',
        'columns': [
            { 'data': 'id' },
            { 'data': 'title' },
            { 'data': 'belongs_to' },
            { 'data': 'created_at' },
            { 'data': 'updated_at' },
        ]
    });
    $('#ProjectTable').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax':'/admin/data/projects',
        'columns': [
            { 'data': 'id' },
            { 'data': 'title' },
            { 'data': 'owner' },
            { 'data': 'progress' },
            { 'data': 'statusname' },
            { 'data': 'actions',
                'name': 'actions',
                'orderable': false,
                'searchable': false
            }
        ],
        columnDefs: [ {
            targets: 3,
            render: $.fn.dataTable.render.percentBar( 'round','#FFF', '#269ABC', '#31B0D5', '#286090', 1, 'groove' )
        } ]
    });
    function DataTablebuilder(table, route, progress = false) {
        if(progress === false){
            var columns = [
                {'data': 'id'},
                {'data': 'title'},
                {'data': 'statusname'},
                {'data': 'actions'}
            ];
        }else {
            var columns = [
                { 'data': 'id' },
                { 'data': 'progress' },
                { 'data': 'statusname' },
                { 'data': 'actions' }
            ]
        }

        $('#' + table).DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': route,
            'columns': columns,
            columnDefs: [{
                'targets': 'progress',
                'render' : $.fn.dataTable.render.percentBar('round', '#FFF', '#269ABC', '#31B0D5', '#286090', 1, 'groove')
            }]
        });
    }

    window.DataTablebuilder = DataTablebuilder // function a is now exported to the globals.
    /*
    $('#ProjectFeatures').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '/admin/data/features/' + search_id,
            'columns': [
                {'data': 'id'},
                {'data': 'title'},
                {'data': 'progress'},
                {'data': 'statusname'},
                {'data': 'actions'}
            ],
            columnDefs: [{
                targets: 2,
                render: $.fn.dataTable.render.percentBar('round', '#FFF', '#269ABC', '#31B0D5', '#286090', 1, 'groove')
            }]
        });
        $('#FeatureTasks').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '//admin/data/feature/tasks/' + search_id,
            'columns': [
                {'data': 'id'},
                {'data': 'title'},
                {'data': 'statusname'},
                {'data': 'actions'}
            ],
        });
        $('#ProjectTasks').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '/admin/data/project/tasks/' + search_id,
            'columns': [
                {'data': 'id'},
                {'data': 'title'},
                {'data': 'statusname'},
                {'data': 'actions'}
            ],
        });
        $('#UsersTasks').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': '/admin/data/user/tasks/' + search_id,
            'columns': [
                {'data': 'id'},
                {'data': 'title'},
                {'data': 'statusname'},
                {'data': 'actions'}
            ],
        });
        */

});
}());
