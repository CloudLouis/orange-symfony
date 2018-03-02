<?php

class getVendorListJsonAction extends sfAction {

    public function execute($request) {

        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);
        sfConfig::set('sf_debug', false);

        if ($this->getRequest()->isXmlHttpRequest()) {
            $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        }

        $vendorId = $request->getParameter('id');

        $service = new VendorService();
        $vendor = $service->getVendorById($vendorId);

        return $this->renderText(json_encode($vendor->toArray()));
    }

}

