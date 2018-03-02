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
class RequestSubmissionDao extends BaseDao {
    
    public function getRequestList() {

        try {
            $q = Doctrine_Query :: create()
                            ->from('PurchaseRequest')
                            ->orderBy('id ASC');
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }public function getRequestByStatus($num) {

        try {
            $q = Doctrine_Query :: create()
                            ->from('PurchaseRequest')
                            ->where('status = ?', $num);
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }

    public function getEmployeeNumber($id){
        try {
            $q = Doctrine_Query :: create()
                            ->from('SystemUser u')
                            ->where('u.id= ?', $id);
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }     
    }

    public function getUserRequestList($id) {
        
                try {
                    $y =Doctrine_Query :: create()
                                    ->select('m.id')
                                    ->from('PurchaseRequestMaster m')
                                    ->where('m.employee_number= ? ', $id)
                                    ->orderBy('m.id ASC');
                    $emp = $y->execute();

                    $q = Doctrine_Query :: create()
                                    ->from('PurchaseRequest r')
                                    ->whereIn('r.master_id', $emp)
                                    ->orderBy('r.id ASC');
                    return $q->execute();
                } catch (Exception $e) {
                    throw new DaoException($e->getMessage());
                }
            }
            

    public function getCategory(){
        try{
            $query = Doctrine_Query:: create()->from('Category')
                    ->orderBy('name');

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getDepartment(){
        try{
            $query = Doctrine_Query:: create()->from('Department')
                    ->orderBy('name');

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getProductByCategory($cat){
        try{
            $query = Doctrine_Query:: create()->from('Product')
                    ->where('category_id=?', $cat)
                    ->orderBy('name');

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getRequestMasterList(){
        try{
            $query = Doctrine_Query:: create()->from('PurchaseRequestMaster')
                    ->orderBy('date');

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getRequestMasterByDate($date){
        try{
            $query = Doctrine_Query:: create()->from('PurchaseRequestMaster')
                    ->where('date = ?', $date);

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getDepartmentByNumber($num){
        try{
            $employee = $this->getEmployeeNumber($num);
            foreach ($employee as $emp){
                $emp_id=$emp->getEmpNumber();
            }
            $query = Doctrine_Query:: create()->from('Employee')
                    ->where('emp_number = ?', $emp_id);

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getRequestByMaster($date){
        try{
            $query = Doctrine_Query:: create()->from('PurchaseRequestMaster')
                    ->where('date = ?', $date);
            foreach($query->execute() as $reqMaster){
                $q = Doctrine_Query:: create()->from('PurchaseRequest')
                                        ->where("master_id = ?", $reqMaster->getId());
                return $q->execute();
            }

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getProductById($id){
        try{
            $query = Doctrine_Query:: create()->from('Product')
                    ->where('id = ?', $id);

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    
}
