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
class OrderReportForm extends BaseForm {
    private $orderInputService;

    public function getOrderInputService() {
        if (is_null($this->orderInputService)) {
            $this->orderInputService = new orderInputService();
            $this->orderInputService->setOrderInputDao(new OrderInputDao());
        }
        return $this->orderInputService;
    }

    public function configure() {

        $choices= ['Pending Order', 'Completed Order', 'Canceled Order'];
        $inputDatePattern = sfContext::getInstance()->getUser()->getDateFormat();

        $this->setWidgets(array(
            'Report_for' => new sfWidgetFormSelect(array('choices' => $choices), array("class" => "formSelect", "maxlength" => 3)),
        ));

        $this->setValidators(array(
            'Report_for' => new sfValidatorNumber(array('required' => true)),
        ));

        $this->widgetSchema->setNameFormat('order_list[%s]');
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