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
class VendorForm extends BaseForm {
    private $vendorService;

    public function getVendorService() {
        if (is_null($this->vendorService)) {
            $this->vendorService = new VendorService();
            $this->vendorService->setVendorDao(new VendorDao());
        }
        return $this->vendorService;
    }

    public function configure() {
        $category = $this->getCategoryList();

        $this->setWidgets(array(
            'vendorId' => new sfWidgetFormInputHidden(),
            'PIC*' => new sfWidgetFormInputText(),
            'name*' => new sfWidgetFormInputText(),
            'contact*' => new sfWidgetFormInputText(),
            'address*' => new sfWidgetFormInputText(),
            'account*' => new sfWidgetFormInputText(),
            'NPWP*' => new sfWidgetFormInputText(),
            'code*' => new sfWidgetFormInputText(), 
            'category*' => new sfWidgetFormChoice(array('multiple' => true,'expanded' => true,'choices' => $category)),
            'category_submission' => new sfWidgetFormInputHidden()
        ));

        $this->setValidators(array(
            'vendorId' => new sfValidatorNumber(array('required' => false)),
            'PIC*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'name*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'contact*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'address*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'account*' => new sfValidatorNumber(array('required' => true)),
            'NPWP*' => new sfValidatorNumber(array('required' => true)),
            'code*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'category*' => new sfValidatorString(array('required' => false, 'max_length' => 100)),
            'category_submission' => new sfValidatorString(array('required' => false, 'max_length' => 100)),
        ));

        $this->widgetSchema->setNameFormat('vendor[%s]');
    }



    private function getCategoryList() {
        $list = array();
        $vendor = $this->getVendorService()->getCategory();

        foreach ($vendor as $cat) {
            $list[$cat->getId()] = $cat->getName();
        }
        return $list;
    }

    public function save() {

        $vendorId = $this->getValue('vendorId');
        if (!empty($vendorId)) {
            $vendor = $this->getVendorService()->getVendorById($vendorId);

            $vendorToCategoryList = $this->getVendorService()->getVendorToCategoryList($vendorId);
            $categories = explode(", ", $this->getValue('category_submission'));
            foreach($vendorToCategoryList as $vTc){
                foreach($categories as $cat){
                    if($vTc->getCategoryId()!=$cat){
                        $vTcN = $this->getVendorService()->getSpecificVendorToCategory($vTc->getCategoryId(), $cat);
                        $vTcN->setCategoryId($cat);
                        $vTcN->save();
                    }
                }
            }

        } else {
            $vendor = new Vendor();
        }
        $vendor->setName($this->getValue('name*'));
        $vendor->setPic($this->getValue('PIC*'));
        $vendor->setContact($this->getValue('contact*'));
        $vendor->setAddress($this->getValue('address*'));
        $vendor->setAccount($this->getValue('account*'));
        $vendor->setNpwp($this->getValue('NPWP*'));
        $vendor->setCode($this->getValue('code*'));
        $vendor->save();

        if (empty($vendorId)) {
            $venId = $this->getVendorService()->getVendorIdByCode($this->getValue('code*'));
            $categories = explode(", ", $this->getValue('category_submission'));
            foreach($venId as $chosenVendor){
                foreach($categories as $cat){
                    $vendorToCategory = new VendorToCategory();
                    $vendorToCategory->setVendorId($chosenVendor->getId());
                    $vendorToCategory->setCategoryId($cat);
                    $vendorToCategory->save();
                }
            }
        }

    }

    public function getVendorListAsJson() {

        $list = array();
        $vendorList = $this->getVendorService()->getCategory();
        foreach ($vendorList as $vendor) {
            $list[] = array('id' => $vendor->getId(), 'name' => $vendor->getName());
        }
        return json_encode($list);
    }
}

