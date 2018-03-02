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
class VendorDao extends BaseDao {
    
    public function getVendorList() {

        try {
            $q = Doctrine_Query :: create()
                            ->from('Vendor')
                            ->orderBy('name ASC');
            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }

    public function getVendorById($id) {

        try {
            return Doctrine :: getTable('Vendor')->find($id);
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }

    public function getVendorIdByCode($code){
        try{
            $q = Doctrine_Query :: create()
                                ->from('Vendor')
                                ->where('code = ?', $code);
            return $q->execute();
        }catch(Exception $e){
            throw new DaoExcetpion($e->getMessage());
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

    public function getCategoryById($id){
        try{
            $query = Doctrine_Query:: create()->from('Category')
                    ->where("id = ?", $id);

            return $query->execute();

        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function deleteVendor($vendorList) {
        try {
            $q = Doctrine_Query::create()
                            ->delete('Vendor')
                            ->whereIn('id', $vendorList);

            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }
    public function getVendorToCategoryList($vendorId){
        try {
            $q = Doctrine_Query::create()
                            ->from('VendorToCategory')
                            ->where('vendor_id = ?', $vendorId);

            return $q->execute();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }

    }
    public function getSpecificVendorToCategory($vendorId, $categoryId){
        try {
            $q = Doctrine_Query::create()
                            ->from('VendorToCategory')
                            ->where('vendor_id = ?', $vendorId)
                            ->andWhere('category_id = ?', $categoryId);
            return $q->fetchOne();
        } catch (Exception $e) {
            throw new DaoException($e->getMessage());
        }
    }

}
