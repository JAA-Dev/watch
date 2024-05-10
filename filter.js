// $(document).ready(function() {
//     $('#sort').change(function() {
//         var sort_option = $(this).val();
//         var rows = $('#categoryTable tbody > tr').get();

//         rows.sort(function(a, b) {
//             var keyA = $(a).children('td').eq(1).text().toUpperCase();
//             var keyB = $(b).children('td').eq(1).text().toUpperCase();

//             if (sort_option == 'ACD') {
//                 if (keyA < keyB) return -1;
//                 if (keyA > keyB) return 1;
//                 return 0;
//             } else if (sort_option == 'DESC') {
//                 if (keyA > keyB) return -1;
//                 if (keyA < keyB) return 1;
//                 return 0;
//             }
//         });

//         $.each(rows, function(index, row) {
//             $('#categoryTable').children('tbody').append(row);
//         });
//     });
// });

$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#categoryTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#sort').change(function() {
        var sort_option = $(this).val();
        var rows = $('#categoryTable tbody > tr').get();

        rows.sort(function(a, b) {
            var keyA = $(a).children('td').eq(1).text().toUpperCase();
            var keyB = $(b).children('td').eq(1).text().toUpperCase();

            if (sort_option == 'ACD') {
                if (keyA < keyB) return -1;
                if (keyA > keyB) return 1;
                return 0;
            } else if (sort_option == 'DESC') {
                if (keyA > keyB) return -1;
                if (keyA < keyB) return 1;
                return 0;
            }
        });

        $.each(rows, function(index, row) {
            $('#categoryTable').children('tbody').append(row);
        });
    });
});