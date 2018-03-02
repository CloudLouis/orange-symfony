<?php

class getProductListJsonAction extends sfAction {

    public function execute($request) {

        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);
        sfConfig::set('sf_debug', false);

        if ($this->getRequest()->isXmlHttpRequest()) {
            $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        }

        $productId = $request->getParameter('id');

        $service = new ProductService();
        $product = $service->getProductById($productId);

        return $this->renderText(json_encode($product->toArray()));
    }

}

