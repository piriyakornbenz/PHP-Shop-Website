$(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#updateModalReviews').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('#update_id_reviews').val(data[0]);
        $('#update_name').val(data[2]);
        $('#update_email').val(data[3]);
        $('#update_message').val(data[4]);
    });
});