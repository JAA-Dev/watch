$(document).ready(function() {
    // Search functionality
    $('#search').on('keyup', function() {
        filterProducts();
    });

    // Category filter
    $('#txtcate1').on('change', function() {
        filterProducts();
    });

    // Sorting functionality (Price)
    $('#sort-select').on('change', function() {
        var sortOrder = $(this).val();
        var products = $('#product-container .product');

        products.sort(function(a, b) {
            var priceA = parseFloat($(a).find('.product-price').text());
            var priceB = parseFloat($(b).find('.product-price').text());

            if (sortOrder === 'asc') {
                return priceA - priceB;
            } else {
                return priceB - priceA;
            }
        });

        $('#product-list').html(products);
    });

    function filterProducts() {
        var searchText = $('#search').val().toLowerCase();
        var category = $('#txtcate1').val().toLowerCase();

        $('#product-container .product').each(function() {
            var productName = $(this).find('.product-name').text().toLowerCase();
            var productCategory = $(this).find('.product-category').text().toLowerCase();

            var isMatch = productName.includes(searchText) && (category === '' || productCategory === category);

            if (isMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});