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
class OrderInputForm extends BaseForm {
    private $orderInputService;

    public function getOrderInputService() {
        if (is_null($this->orderInputService)) {
            $this->orderInputService = new orderInputService();
            $this->orderInputService->setOrderInputDao(new OrderInputDao());
        }
        return $this->orderInputService;
    }

    public function configure() {

        $vendor = $this->getVendorList();
        $employee = $this->getEmployeeList();
        $transaction = $this->getRequestList();
        $inputDatePattern = sfContext::getInstance()->getUser()->getDateFormat();

        $this->setWidgets(array(
            'transaction_number' => new sfWidgetFormSelect(array('choices' => $transaction), array("class" => "formSelect", "maxlength" => 3)),
            'employee_number' => new sfWidgetFormInputHidden(),
            'vendor_id' => new sfWidgetFormSelect(array('choices' => $vendor), array("class" => "formSelect", "maxlength" => 3)),
            'recipient_id' => new sfWidgetFormSelect(array('choices' => $employee), array("class" => "formSelect", "maxlength" => 3)),
            'price_(each)' => new sfWidgetFormInputText(),
            'issued_date' => new ohrmWidgetDatePicker(array(), array('id' => 'order_issued_date')),
            'deadline' => new ohrmWidgetDatePicker(array(), array('id' => 'order_deadline')),
            'description' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'employee_number' => new sfValidatorNumber(array('required' => false)),
            'vendor_id' => new sfValidatorNumber(array('required' => true)),
            'price_(each)' => new sfValidatorNumber(array('required' => true)),
            'recipient_id' => new sfValidatorNumber(array('required' => true)),
            'issued_date' => new sfValidatorString(array('required' => false)),
            'deadline' => new sfValidatorString(array('required' => false)),
            'description' => new sfValidatorString(array('required' => false)),
            'transaction_number' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('order[%s]');
    }

    private function getVendorList() {
        $list = array();
        $vendor = $this->getOrderInputService()->getVendorList();

        $list[0] = '--Pick a vendor--';
        foreach ($vendor as $ven) {
            $list[$ven->getId()] = $ven->getName();
        }
        return $list;
    }

    private function getEmployeeList() {
        $list = array();
        $vendor = $this->getOrderInputService()->getEmployeeList();

        foreach ($vendor as $ven) {
            $list[$ven->getEmpNumber()] = $ven->getFirstName()." ".$ven->getLastName();
        }
        return $list;
    }

    private function getRequestList() {
        $list = array();
        $vendor = $this->getOrderInputService()->getRequestList();

        $list[0] = '--Pick a purchase request--';
        foreach ($vendor as $ven) {
            $list[$ven->getId()] = $ven->getTransactionNumber();
        }
        return $list;
    }

    public function save() {

        $request = new PurchaseOrder();

        $regM = $this->getOrderInputService()->getRequestByTransactionNumber($this->getValue('transaction_number'));

        foreach($regM as $requested){
            $master = $this->getOrderInputService()->getRequestMaster($requested->getMasterId());
            foreach($master as $mas){
                $request->setRequestMasterId($mas->getId());
                $request->setRequesterId($mas->getEmployeeNumber());
            }
            $request->setRequestId($requested->getId());
            $request->setProductId($requested->getProductId());
            $request->setApprovedBy($requested->getApprovedBy());
            $request->setQuantity($requested->getQuantity());
            $request->setTransactionNumber($requested->getTransactionNumber());
        }
        $request->setVendorId($this->getValue('vendor_id'));
        $request->setPrice($this->getValue('price_(each)'));
        $request->setRecipientId($this->getValue('recipient_id'));
        $request->setIssuedDate($this->getValue('issued_date'));
        $request->setDeadline($this->getValue('deadline'));
        $request->setDescription($this->getValue('description'));
        
        $request->save();
    }
}