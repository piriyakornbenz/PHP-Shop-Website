
$(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#updateModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('#update_id').val(data[0]);
        $('#heading').val(data[1]);
        $('#subHeading').val(data[2]);
        $('#description').val(data[3]);
        $('#button').val(data[4]);
    });
});