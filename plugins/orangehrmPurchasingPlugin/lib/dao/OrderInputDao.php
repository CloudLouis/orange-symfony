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
class OrderInputDao extends BaseDao {
    
    public function getRequestList() {
        $list = $this->getOrderList();
        foreach($list as $l){
            $ordered[$l->getId()] = $l->getTransactionNumber();
        }
        try {
                if(!empty($ordered)){
                    $q = Doctrine_Query :: create()
                                    ->from('PurchaseRequest')
                                    ->whereNotIn('transaction_number', $ordered)
                                    ->orderBy('id ASC');
                }else{
                    $q = Doctrine_Query :: create()
                                    ->from('PurchaseRequest')
                                    ->orderBy('id ASC');
                }

            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getOrderByStatus($num){
        try {
            $q = Doctrine_Query::create()
                            ->from('PurchaseOrder')
                            ->where('status = ?', $num);

            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }

    }

    public function deleteOrder($ids) {
        try {
            $q = Doctrine_Query::create()
                            ->delete('PurchaseOrder')
                            ->whereIn('id', $ids);

            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    
    public function getRequestByTransactionNumber($tn) {
        try {
            $q = Doctrine_Query :: create()
                            ->from('PurchaseRequest')
                            ->where('id = ?', $tn);
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    
    public function getRequestMaster($id) {
        try {
            $q = Doctrine_Query :: create()
                            ->from('PurchaseRequestMaster')
                            ->where('id = ?', $id);
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getVendorList() {

        try {
            $q = Doctrine_Query :: create()
                            ->from('Vendor')
                            ->orderBy('id DESC');
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getOrderList() {

        try {
            $q = Doctrine_Query :: create()
                            ->from('PurchaseOrder')
                            ->orderBy('id DESC');
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getEmployeeList() {

        try {
            $q = Doctrine_Query :: create()
                            ->from('Employee')
                            ->orderBy('emp_number DESC');
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
}
