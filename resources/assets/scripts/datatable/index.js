import * as $ from 'jquery';
import 'datatables';

export default (function () {

$(document).ready(function () {
    $('#UserTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":"/admin/data/users"
    });
});







}());
