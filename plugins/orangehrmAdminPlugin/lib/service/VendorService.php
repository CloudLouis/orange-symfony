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
 */

class VendorService extends BaseService{
  private $vendorDao;

    public function __construct() {
        $this->vendorDao = new VendorDao();
    }

    public function getVendorDao() {
        return $this->vendorDao;
    }

    public function setVendorDao(VendorDao $vendorDao) {
        $this->vendorDao = $vendorDao;
    }

    public function getVendorList() {
        return $this->vendorDao->getVendorList();
    }

    public function getVendorById($id) {
        return $this->vendorDao->getVendorById($id);
    }

    public function deleteVendor($productList) {
        return $this->vendorDao->deleteVendor($productList);
    }
 
    public function getCategory() {
        return $this->vendorDao->getCategory();
    }
 
    public function getCategoryById($id) {
        return $this->vendorDao->getCategoryById($id);
    }

    public function getVendorIdByCode($code){
        return $this->vendorDao->getVendorIdByCode($code);
    }

    public function getSpecificVendorToCategory($vendorId, $categoryId){
        return $this->vendorDao->getSpecificVendorToCategory($vendorId, $categoryId);
    }

    public function getVendorToCategoryList($vendorId){
        return $this->vendorDao->getVendorToCategoryList($vendorId);
    }
}

