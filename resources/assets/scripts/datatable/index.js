import * as $ from 'jquery';
import 'datatables';

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
});







}());
