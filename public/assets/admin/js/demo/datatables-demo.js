$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [[ 0, "desc" ]] // Orders by the first column (ticket) in descending order
    });
});
