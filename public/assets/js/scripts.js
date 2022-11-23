$(document).ready(function () {
    $("#data-table").DataTable({
        dom: "frti",
        deferRender: true,
        scrollY: 370,
        // scrollCollapse: true,
        scroller: true,
        keys: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
        ],
    });
});
