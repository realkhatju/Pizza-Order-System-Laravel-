$(document).ready(function() {
    // when + button click
    $('.btn-plus').click(function() {
        $parentNode = $(this).parents("tr");
        $price = Number($parentNode.find('#price').text().replace("Ks", ""));
        $qty = Number($parentNode.find('#qty').val());
        $total = $price * $qty;
        $parentNode.find('#total').html(`${$total} Ks`);
        summaryCalculation();

        // console.log($price+"  "+$qty);

        // $total = $price * $qty;

        // $parentNode.find('#total').html($total + " Ks")
    })

    // when -button click
    $('.btn-plus').click(function() {
        $parentNode = $(this).parents("tr");
        $price = Number($parentNode.find('#price').text().replace("Ks", ""));
        $qty = Number($parentNode.find('#qty').val());
        $total = $price * $qty;
        $parentNode.find('#total').html(`${$total} Ks`);
        summaryCalculation();

        // console.log($price+"  "+$qty);

        // $total = $price * $qty;

        // $parentNode.find('#total').html($total + " Ks")
    })

    // when cross button click
    $('.btnRemove').click(function() {
        $parentNode = $(this).parents("tr");
        $parentNode.remove();
        summaryCalculation();
    })

    // calculation final price of order
    function summaryCalculation() {
        $totalPrice = 0;
        $('#dataTable tbody tr').each(function(index, row) {
            $totalPrice += Number($(row).find('#total').text().replace("Ks", ""));
        });

        $("#subTotalPrice").html(`${$totalPrice} Ks`);
        $("#finalPrice").html(`${$totalPrice+2000} Ks`);
    }
})