$(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#updateModalIcons').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('#update_id_icons').val(data[0]);
        $('#icon_icons').val(data[1]);
        $('#heading_icons').val(data[2]);
        $('#description_icons').val(data[3]);
    });
});