$(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#updateModalFooter').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('#update_id_footer').val(data[0]);
        $('#update_footer').val(data[1]);
    });
});