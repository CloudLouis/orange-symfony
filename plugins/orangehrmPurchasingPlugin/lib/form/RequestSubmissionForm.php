<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 *
 */
class RequestSubmissionForm extends BaseForm {
    private $requestSubmissionService;

    public function getRequestSubmissionService() {
        if (is_null($this->requestSubmissionService)) {
            $this->requestSubmissionService = new requestSubmissionService();
            $this->requestSubmissionService->setRequestSubmissionDao(new RequestSubmissionDao());
        }
        return $this->requestSubmissionService;
    }

    public function configure() {

        $category = $this->getItemCategoryList();
        $inputDatePattern = sfContext::getInstance()->getUser()->getDateFormat();

        $this->setWidgets(array(
            'employee_number' => new sfWidgetFormInputHidden(),
            'category_id' => new sfWidgetFormSelect(array('choices' => $category), array("class" => "formSelect", "maxlength" => 3)),
            'product_id' => new sfWidgetFormSelect(array('choices' => array()), array("class" => "formSelect", "maxlength" => 3)),
            'quantity' => new sfWidgetFormInputText(),
            'price_lower' => new sfWidgetFormInputText(),
            'price_upper' => new sfWidgetFormInputText(),
            'date' => new sfWidgetFormInputHidden(),
            'additional_detail' => new sfWidgetFormInputText(),
            'transaction_number' => new sfWidgetFormInputHidden(),
            'department' => new sfWidgetFormInputHidden(),
        ));

        $this->setValidators(array(
            'employee_number' => new sfValidatorNumber(array('required' => false)),
            'category_id' => new sfValidatorNumber(array('required' => true)),
            'product_id' => new sfValidatorNumber(array('required' => false)),
            'quantity' => new sfValidatorNumber(array('required' => true)),
            'price_lower' => new sfValidatorNumber(array('required' => true)),
            'price_upper' => new sfValidatorNumber(array('required' => true)),
            'date' => new sfValidatorString(array('required' => false)),
            'additional_detail' => new sfValidatorString(array('required' => false)),
            'transaction_number' => new sfValidatorString(array('required' => false)),
            'department' => new sfValidatorNumber(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('purchaseRequest[%s]');
    }

    private function getItemCategoryList() {
        $list = array();
        $itemCategory = $this->getRequestSubmissionService()->getCategory();

        $list[0] = '--Pick a category--';
        foreach ($itemCategory as $cat) {
            $list[$cat->getId()] = $cat->getName();
        }
        return $list;
    }

    public function save() {
        $regM = $this->getRequestSubmissionService()->getRequestMasterList();

        $masterId='';
        foreach($regM as $M){
            if($M->getDate() == $this->getValue('date')){
                $masterId = $M->getId();
            }
        }
        if(empty($masterId)){
            $req = new PurchaseRequestMaster();
            $req -> setEmployeeNumber($this->getValue('employee_number'));
            $req -> setDate($this->getValue('date'));
            $req->save();
            $regM = $this->getRequestSubmissionService()->getRequestMasterByDate($this->getValue('date'));
            foreach($regM as $M){
                $masterId = $M->getId();
            }
        }

        $request = new PurchaseRequest();
        $request->setQuantity($this->getValue('quantity'));
        $request->setCategoryId($this->getValue('category_id'));
        $request->setBudgetCategory($this->getValue('category_id'));
        $request->setBudgetDepartment($this->getValue('department'));
        $request->setProductId($this->getValue('product_id'));
        $request->setPriceRangeBottom($this->getValue('price_lower'));
        $request->setPriceRangeTop($this->getValue('price_upper'));
        $request->setAdditionalDetail($this->getValue('additional_detail'));
        $request->setCategoryId($this->getValue('category_id'));
        $request->setTransactionNumber($this->getValue('transaction_number'));
        $request->setMasterId($masterId);
        $request->setApprovedBy($this->getValue('employee_number'));
        $request->setApprovalDate($this->getValue('date'));
        $request->setStatus(1);
        
        $request->save();
    }
}

