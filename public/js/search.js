$(function () {
    // $(".search-input").on("keyup", function () {
    //     var value = $(this).val().toLowerCase();
    //     $(".table-search tr").filter(function () {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    // });

    // table_search(search,tr,indexSearch='0')
    $('.search-input').keyup(function () {
        table_search($('.search-input').val(), $('.table-search tbody tr'), '012');
    });
});