
<?php 
use_javascript(plugin_web_path('orangehrmAdminPlugin', 'js/viewProductsSuccess')); 
?>

<div id="product" class="box">
    
    <div class="head"><h1 id="productHeading"><?php echo __("Add Product"); ?></h1></div>
    
    <div class="inner">

        <form name="frmProduct" id="frmProduct" method="post" action="<?php echo url_for('admin/viewProducts'); ?>" >

            <?php echo $form['_csrf_token']; ?>
            
            <fieldset>
                <ol>
                    <li>
                        <?php echo $form->render(); ?>
                    </li>
                    <li class="required">
                        <em>*</em> <?php echo __(CommonMessages::REQUIRED_FIELD); ?>
                    </li>
                </ol>
                
                <p>
                    <input type="button" class="savebutton" name="btnSave" id="btnSave" value="<?php echo __("Save"); ?>"/>
                    <input type="button" class="reset" name="btnCancel" id="btnCancel" value="<?php echo __("Cancel");?>"/>
                </p>
            </fieldset>
        </form>
    </div>
</div>

<div id="productList">
    <!-- List component  -->
    <?php include_component('core', 'ohrmList', $parmetersForListCompoment); ?>
</div>

<!-- Confirmation box HTML: Begins -->
<div class="modal hide" id="deleteConfModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo __('OrangeHRM - Confirmation Required'); ?></h3>
  </div>
  <div class="modal-body">
    <p><?php echo __(CommonMessages::DELETE_CONFIRMATION); ?></p>
  </div>
  <div class="modal-footer">
    <input type="button" class="btn" data-dismiss="modal" id="dialogDeleteBtn" value="<?php echo __('Ok'); ?>" />
    <input type="button" class="btn reset" data-dismiss="modal" value="<?php echo __('Cancel'); ?>" />
  </div>
</div>
<!-- Confirmation box HTML: Ends -->

<script type="text/javascript">
	var products = <?php echo str_replace('&#039;', "'", $form->getProductListAsJson()) ?> ;
        var productList = eval(products);
	var lang_NameRequired = '<?php echo __(ValidationMessages::REQUIRED); ?>';
	var lang_exceed50Charactors = '<?php echo __(ValidationMessages::TEXT_LENGTH_EXCEEDS, array('%amount%' => 100)); ?>';
	var productInfoUrl = "<?php echo url_for("admin/getProductListJson?id="); ?>";
	var lang_editProduct = "<?php echo __("Edit Product"); ?>";
	var lang_addProduct = "<?php echo __("Add Product"); ?>";
	var lang_uniqueName = '<?php echo __(ValidationMessages::ALREADY_EXISTS); ?>';
</script>