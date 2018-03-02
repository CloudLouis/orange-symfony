<?php

class getCategoryListJsonAction extends sfAction {

    public function execute($request) {

        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);
        sfConfig::set('sf_debug', false);

        if ($this->getRequest()->isXmlHttpRequest()) {
            $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        }

        $categoryId = $request->getParameter('id');

        $service = new CategoryService();
        $category = $service->getCategoryById($categoryId);

        return $this->renderText(json_encode($category->toArray()));
    }
}

