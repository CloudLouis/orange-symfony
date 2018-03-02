$(document).ready(function() {

    $('#btnSave').click(function() {
        url = url_transaction_number + '?prod=' + $('#purchaseRequest_product_id').val()+'&user='+lang_userId+'&date='+formatDate();
        $.ajax({
            type: 'get',
            url: url,
            success: function(response){
                $('#purchaseRequest_transaction_number').html(response)
                $('#purchaseRequest_transaction_number').val(response)
                $('#frmPurchaseRequests').submit();
            }
        });
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

    $('#btnAdd').click(function() {
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
        
        url = url_number + '?num=' + lang_userId;
        $.ajax({
            type: 'get',
            url: url,
            success: function(response){
                $('#purchaseRequest_employee_number').html(response)
                $('#purchaseRequest_employee_number').val(response)
            }
        });

        url = url_dept + '?num=' + lang_userId;
        $.ajax({
            type: 'get',
            url: url,
            success: function(response){
                $('#purchaseRequest_department').html(response)
                $('#purchaseRequest_department').val(response)
            }
        });
        
        $('#purchaseRequest_date').html(formatDate());
        $('#purchaseRequest_date').val(formatDate());
    });

    $('#btnCancel').click(function() {
        $('#purchaseRequest').hide();
        $('.top').show();
    });
    $('#dialogCancelBtn').click(function() {
        $("#deleteConfirmation").dialog("close");
    });
});
function formatDate() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
    
}