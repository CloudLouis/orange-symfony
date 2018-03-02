<?php 
use_javascript(plugin_web_path('orangehrmPurchasingPlugin', 'js/requestSubmissionSuccess')); 
?>
<head>
    <style>
        form ol li input[type=text]{
            height: 26px;
            margin-bottom: 10px;
        }
    </style>
</head>
<div id="purchaseRequest" class="box">
    
    <div class="head"><h1 id="requestHeading"><?php echo __("Submit a Request"); ?></h1></div>
    
    <div class="inner">

        <form name="frmPurchaseRequests" id="frmPurchaseRequests" method="post" action="<?php echo url_for('purchasing/requestSubmission'); ?>" >

            <?php echo $form['_csrf_token']; ?>
            <?php echo $form->renderHiddenFields(); ?>
            
            <fieldset>
                <ol>
                    <li>
                        <?php echo $form['item_amount']->renderLabel(__('Item Amount'). ' <em>*</em>'); ?>
                        <?php echo $form['item_amount']->render(array("class" => "formInput", "maxlength" => 100)); ?>
                    </li>
                    <li>
                        <?php echo $form['specifications']->renderLabel(__('Specifications')); ?>
                        <?php echo $form['specifications']->render(array("class" => "formInput", "maxlength" => 100)); ?>
                    </li>
                    <li>
                        <?php echo $form['budget']->renderLabel(__('Budget'). ' <em>*</em>'); ?>
                        <?php echo $form['budget']->render(array("class" => "formInput", "maxlength" => 100)); ?>
                    </li>
                    <li>
                        <?php echo $form['additional_details']->renderLabel(__('Additional Details')); ?>
                        <?php echo $form['additional_details']->render(array("class" => "formInput", "maxlength" => 100)); ?>
                    </li>
                    <li>
                        <?php echo $form['item_category']->renderLabel(__('Name'). ' <em>*</em>'); ?>
                        <?php echo $form['item_category']->render(array("class" => "formInput", "maxlength" => 100)); ?>
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

<div id="purchaseRequestList">
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
	var lang_exceed50Charactors = '<?php echo __(ValidationMessages::TEXT_LENGTH_EXCEEDS, array('%amount%' => 100)); ?>';
	var lang_addPurchaseRequest = "<?php echo __("Submit a Request"); ?>";
	var lang_uniqueName = '<?php echo __(ValidationMessages::ALREADY_EXISTS); ?>';
    var lang_userId = "<?php echo __("%userId%", array("%userId%" => $sf_user->getAttribute('auth.userId'))); ?>"
</script>