$(document).ready(function () {
    $('#panitia').DataTable({
        responsive: true,
        "lengthMenu": [[5, 10, 20, 40, 80, 100, -1], [5, 10, 20, 40, 80, 100, "Semua data"]],
        "columnDefs": [
            {"orderable": false, "targets": 3}
        ]
    });
});