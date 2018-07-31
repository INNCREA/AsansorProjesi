$(function () {
    $('.temel-tablo').DataTable({
        responsive: true,
        autoWidth: true,
        scrollX: false,
        searching: true,
        paging: true,
        processing: true,
        columnDefs: [
        { targets: [-1], searchable: false },
        { targets: [-1], orderable: false }
        ]
    });
    $('.rapor-tablo').DataTable({
        dom: '<B>frtip',
        responsive: true,
        buttons: [
        'copy', 'excel', 'pdf', 'print'
        ]
    });
});