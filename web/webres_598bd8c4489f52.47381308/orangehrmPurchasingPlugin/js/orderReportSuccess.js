$(document).ready(function() {

    $('#btnConfirm').click(function() {
        $('#frmorders').submit();
    });

    $('#order').hide();

    $('#btnSearch').click(function() {
        $('#order').show();
        $('.top').hide();
        $('#order_employee_number').val('');
        $('#order_vendor_id').val('');
        $('#order_recipient_id').val('');
        $('#order_price_(each)').val('');
        $('#order_issued_date').val('');
        $('#order_deadline').val('');
        $('#order_description').val('');
        $('#order_transaction_number').val('');
        $('#requestHeading').html(lang_inputOrder);
        $(".messageBalloon_success").remove();
    });

    $('#btnDelete').click(function(){
        $('#frmList_ohrmListComponent').submit(function(){
            $('#deleteConfirmation').dialog('open');
            return false;
        });
    });

    $('#btnDelete').attr('disabled', 'disabled');$("#ohrmList_chkSelectAll").click(function() {
        if($(":checkbox").length == 1) {
            $('#btnDelete').attr('disabled','disabled');
        }
        else {
            if($("#ohrmList_chkSelectAll").is(':checked')) {
                $('#btnDelete').removeAttr('disabled');
            } else {
                $('#btnDelete').attr('disabled','disabled');
            }
        }
    });

    $(':checkbox[name*="chkSelectRow[]"]').click(function() {
        if($(':checkbox[name*="chkSelectRow[]"]').is(':checked')) {
            $('#btnDelete').removeAttr('disabled');
        } else {
            $('#btnDelete').attr('disabled','disabled');
        }
    });
    
    $('#dialogDeleteBtn').click(function() {
        document.frmList_ohrmListComponent.submit();
    });

    $('#btnCancel').click(function() {
        $('#order').hide();
        $('.top').show();
    });
    $('#dialogCancelBtn').click(function() {
        $("#deleteConfirmation").dialog("close");
    });
});