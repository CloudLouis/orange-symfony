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
class orderReportAction extends sfAction {
    
        private $orderInputService;
    
        public function getOrderInputService(){
            if (is_null($this->orderInputService)) {
                $this->orderInputService = new orderInputService();
                $this->orderInputService->setOrderInputDao(new OrderInputDao());
            }
            return $this->orderInputService;
        }
    
        public function setForm(sfForm $form) {
            if (is_null($this->form)) {
                $this->form = $form;
            }
        }
    
        public function execute($request) {
            $this->setForm(new OrderReportForm());
            $status_code= $this->getUser()->getAttribute('reportOrder');
    
            if(empty($status_code)){
            $orderList = $this->getOrderInputService()->getOrderList();
            }else{
                $orderList = $this->getOrderInputService()->getOrderByStatus($status_code);
            }
            $this->_setListComponent($orderList);
            $params = array();
            $this->parmetersForListCompoment = $params;
            

            if ($request->isMethod('post')) {
                $this->form->bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $this->getUser()->setAttribute('reportOrder', $this->form->getValue('Report_for'));
                    $this->redirect('purchasing/orderReport');
                }
            }
        }
    
        private function _setListComponent($orderList) {
            
            if($this->getUser()->getAttribute('reportOrder') == 2){
                $configurationFactory = new OrderReportRejectionHeaderFactory();
            }else{
                $configurationFactory = new OrderReportHeaderFactory();
            }
            ohrmListComponent::setConfigurationFactory($configurationFactory);
            ohrmListComponent::setListData($orderList);
        }
    


}

