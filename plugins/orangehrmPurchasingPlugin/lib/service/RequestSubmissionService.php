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

class RequestSubmissionService extends BaseService{
  private $requestSubmissionDao;

    public function __construct() {
        $this->requestSubmissionDao = new RequestSubmissionDao();
    }

    public function getRequestSubmissionDao() {
        return $this->requestSubmissionDao;
    }

    public function setRequestSubmissionDao(RequestSubmissionDao $requestSubmissionDao) {
        $this->requestSubmissionDao = $requestSubmissionDao;
    }

    public function getRequestList() {
        return $this->requestSubmissionDao->getRequestList();
    }

    public function getUserRequestList($id) {
        return $this->requestSubmissionDao->getUserRequestList($id);
    }
 
    public function getCategory() {
        return $this->requestSubmissionDao->getCategory();
    }
    public function getDepartment() {
        return $this->requestSubmissionDao->getDepartment();
    }
    public function getProductByCategory($cat){
        return $this->requestSubmissionDao->getProductByCategory($cat);
    }
    public function getEmployeeNumber($id){
        return $this->requestSubmissionDao->getEmployeeNumber($id);
    }
    public function getRequestMasterByDate($date){
        return $this->requestSubmissionDao->getRequestMasterByDate($date);
    }
    public function getRequestMasterList(){
        return $this->requestSubmissionDao->getRequestMasterList();
    }
    public function getDepartmentByNumber($num){
        return $this->requestSubmissionDao->getDepartmentByNumber($num);
    }
    public function getProductById($id){
        return $this->requestSubmissionDao->getProductById($id);
    }
    public function getRequestByMaster($date){
        return $this->requestSubmissionDao->getRequestByMaster($date);
    }
    public function getRequestByStatus($num){
        return $this->requestSubmissionDao->getRequestByStatus($num);
    }
    
    

}

