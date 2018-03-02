$(document).ready(function() {

    $('#btnSave').click(function() {
        var selected = $('.checkbox_list input:checked').map(function(){
            return $(this).val();
        }).get();
        $('#vendor_category_submission').val(selected.join(", "));
        $('#frmVendor').submit();
    });

    $('#vendor').hide();

    $('#btnAdd').click(function() {
        $('#vendor').show();
        $('.top').hide();
        $('#vendor_name_').val('');
        $('#vendor_vendorId').val('');
        $('#vendor_category_').val('');
        $('#vendor_PIC_').val('');
        $('#vendor_contact_').val('');
        $('#vendor_address_').val('');
        $('#vendor_account_').val('');
        $('#vendor_NPWP_').val('');
        $('#vendor_code_').val('');
        $(".messageBalloon_success").remove();
    });

    $('#btnCancel').click(function() {
        $('#vendor').hide();
        $('.top').show();
        $('#btnDelete').show();
        validator.resetForm();
    });

    $('a[href="javascript:"]').click(function(){
        var row = $(this).closest("tr");
        var statId = row.find('input').val();
        var url = vendorInfoUrl+statId;
        $('#vendorHeading').html(lang_editVendor);
        getvendorInfo(url);

    });

    $('#btnDelete').attr('disabled', 'disabled');


    $("#ohrmList_chkSelectAll").click(function() {
        if($(":checkbox").length == 1) {
            $('#btnDelete').attr('disabled','disabled');
        }
        else {
            if($("#ohrmList_chkSelectAll").is(':checked')){
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

    $('#btnDelete').click(function(){
        $('#frmList_ohrmListComponent').submit(function(){
            $('#deleteConfirmation').dialog('open');
            return false;
        });
    });

    $('#frmList_ohrmListComponent').attr('name','frmList_ohrmListComponent');
    $('#dialogDeleteBtn').click(function() {
        document.frmList_ohrmListComponent.submit();
    });
    $('#dialogCancelBtn').click(function() {
        $("#deleteConfirmation").dialog("close");
    });

    $.validator.addMethod("uniqueName", function(value, element, params) {
        var temp = true;
        var currentStatus;
        var id = $('#vendor_vendorId').val();
        var natCount = vendorList.length;
        for (var j=0; j < natCount; j++) {
            if(id == vendorList[j].id){
                currentStatus = j;
            }
        }
        var i;
        var name = $.trim($('#vendor_name_').val()).toLowerCase();
        for (i=0; i < natCount; i++) {

            arrayName = vendorList[i].name.toLowerCase();
            if (name == arrayName) {
                temp = false
                break;
            }
        }
        if(currentStatus != null){
            if(name == vendorList[currentStatus].name.toLowerCase()){
                temp = true;
            }
        }

        return temp;
    });

    var validator = $("#frmvendor").validate({

        rules: {
            'vendor[name]' : {
                required:true,
                maxlength: 100,
                uniqueName: true
            }
        },
        messages: {
            'vendor[name]' : {
                required: lang_NameRequired,
                maxlength: lang_exceed50Charactors,
                uniqueName: lang_uniqueName
            }

        }

    });
});

function getvendorInfo(url){

    $.getJSON(url, function(data) {
        $('#vendor_name_').val(data.name);
        $('#vendor_category_').val(data.provides);
        $('#vendor_PIC_').val(data.pic);
        $('#vendor_contact_').val(data.contact);
        $('#vendor_address_').val(data.address);
        $('#vendor_account_').val(data.account);
        $('#vendor_NPWP_').val(data.npwp);
        $('#vendor_code_').val(data.code);
        $('#vendor_vendorId').val(data.id);
        $('#vendor_vendorId').html(data.id);
        $('#vendor').show();
        $(".messageBalloon_success").remove();
        $('.top').hide();
    });
}