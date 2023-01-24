function appendDataTable(data) {
    let htmlView = '';

    if (data.products == null) {
        htmlView += `
            <tr>
                <td>Data not found</td>
                <td>Data not found</td>
                <td>Data not found</td>
            </tr>`;
        return $('tbody').html(htmlView);
    }

    for (let i = 0; i < data.products.length; i++) {
        htmlView += `
            <tr>
                <td>` + data.products[i].name + `</td>
                <td>` + data.products[i].category + `</td>
                <td>` + data.products[i].price + `</td>
            </tr>`;
    }

    $('tbody').html(htmlView);
}

$('#productData').on('keyup', function() {
    let productData = $(this).val();
    let csrf = document.querySelector('meta[name="csrf-token"]').content;

    $.post('search', {
            "_token": csrf,
            productData: productData
        },
        function(data) {
            appendDataTable(data);
        }
    );
});
