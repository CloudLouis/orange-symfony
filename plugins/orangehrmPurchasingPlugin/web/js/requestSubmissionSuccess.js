$(document).ready(function() {

    $('#btnSave').click(function() {
        $('#frmPurchaseRequests').submit();
    });

    $('#purchaseRequest_category_id').onselect(function(){
        url = url_product_and_service + $('#purchaseRequest_category_id').val()
        $.ajax({
            type: 'get',
            url: url,
            success: function(){
                
            }
        });
    })

    $('#purchaseRequest').hide();

    $('#btnAdd').click(function() {
        $('#purchaseRequest').show();
        $('.top').hide();
        $('#purchaseRequest_department_id').val('');
        $('#purchaseRequest_category_id').val('');
        $('#purchaseRequest_product_id').val('');
        $('#purchaseRequest_service_id').val('');
        $('#purchaseRequest_expected_value').val('');
        $('#purchaseRequest_additional_details').val('');
        $('#purchaseRequest_item_category').val('');
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
