$(document).ready(function() {

    $('#btnSave').click(function() {
        $('#purchaseRequest_transaction_number').html($('#purchaseRequest_product_id').val()+'/'+$('#purchaseRequest_employee_number').val()+'/'+new Date().getTime());
        $('#purchaseRequest_transaction_number').val($('#purchaseRequest_product_id').val()+'/'+$('#purchaseRequest_employee_number').val()+'/'+new Date().getTime());
        $('#frmPurchaseRequests').submit();
    });

    $('#purchaseRequest_category_id').on('change', function(){
        url = url_product + '?cat=' + this.value;
        $.ajax({
            type: 'get',
            url: url,
            success: function(response){
                $('#purchaseRequest_product_id').empty()
                $('#purchaseRequest_product_id').append(response);
            }
        });
    })

    $('#purchaseRequest').hide();

    $('#btnSearch').click(function() {
        $('#purchaseRequest').show();
        $('.top').hide();
        $('#purchaseRequest_product_id').val('');
        $('#purchaseRequest_quantity').val('');
        $('#purchaseRequest_additional_details').val('');
        $('#purchaseRequest_price_lower').val('');
        $('#purchaseRequest_price_upper').val('');
        $('#purchaseRequest_userId').html(lang_userId);
        $('#purchaseRequest_userId').val(lang_userId);
        $('#requestHeading').html(lang_addPurchaseRequest);
        $(".messageBalloon_success").remove();
    
    });

    $('#btnCancel').click(function() {
        $('#purchaseRequest').hide();
        $('.top').show();
    });
    $('#dialogCancelBtn').click(function() {
        $("#deleteConfirmation").dialog("close");
    });
});