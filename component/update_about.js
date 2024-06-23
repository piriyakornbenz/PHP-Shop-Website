$(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#updateModalAbout').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('#update_id_about').val(data[0]);
        $('#heading_about').val(data[1]);
        $('#description_about').val(data[2]);
        $('#button_about').val(data[3]);
    });
});