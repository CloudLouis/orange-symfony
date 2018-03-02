$(document).ready(function() {

    $('#btnSave').click(function() {
        $('#frmProduct').submit();
    });

    $('#product').hide();

    $('#btnAdd').click(function() {
        $('#product').show();
        $('.top').hide();
        $('#product_name_').val('');
        $('#product_productId').val('');
        $('#product_provider_').val('');
        $('#product_specifications_').val('');
        $('#productHeading').html(lang_addProduct);
        $(".messageBalloon_success").remove();
    });

    $('#btnCancel').click(function() {
        $('#product').hide();
        $('.top').show();
        $('#btnDelete').show();
        validator.resetForm();
    });

    $('a[href="javascript:"]').click(function(){
        var row = $(this).closest("tr");
        var statId = row.find('input').val();
        var url = productInfoUrl+statId;
        $('#productHeading').html(lang_editProduct);
        getProductInfo(url);

    });

    $('#btnDelete').attr('disabled', 'disabled');


    $("#ohrmList_chkSelectAll").click(function() {
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
        var id = $('#product_productId').val();
        var natCount = productList.length;
        for (var j=0; j < natCount; j++) {
            if(id == productList[j].id){
                currentStatus = j;
            }
        }
        var i;
        var name = $.trim($('#nationality_name').val()).toLowerCase();
        for (i=0; i < natCount; i++) {

            arrayName = productList[i].name.toLowerCase();
            if (name == arrayName) {
                temp = false
                break;
            }
        }
        if(currentStatus != null){
            if(name == productList[currentStatus].name.toLowerCase()){
                temp = true;
            }
        }

        return temp;
    });

    var validator = $("#frmProduct").validate({

        rules: {
            'product[name]' : {
                required:true,
                maxlength: 100,
                uniqueName: true
            }
        },
        messages: {
            'product[name]' : {
                required: lang_NameRequired,
                maxlength: lang_exceed50Charactors,
                uniqueName: lang_uniqueName
            }

        }

    });
});

function getProductInfo(url){

    $.getJSON(url, function(data) {
        $('#product_provider_').val(data.provider);
        $('#product_specifications_').val(data.specifications);
        $('#product_productId').val(data.id);
        $('#product_productId').html(data.id);
        $('#product_name_').val(data.name);
        $('#product_category_').val(data.category_id);
        $('#product').show();
        $(".messageBalloon_success").remove();
        $('.top').hide();
    });
}