$(document).ready(function () {
    $("#data-table").DataTable({
        dom: '<"p-4"frti>',
        deferRender: true,
        scrollY: 370,
        scrollCollapse: true,
        scroller: true,
        keys: true,
    });
});
