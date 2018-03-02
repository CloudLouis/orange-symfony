<?php

class ProductHeaderFactory extends ohrmListConfigurationFactory {
    protected function init() {

        $header1 = new ListHeader();
        $header2 = new ListHeader();
        $header3 = new ListHeader();
        $header4 = new ListHeader();

        $header1->populateFromArray(array(
            'name' => 'Product',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getName',
                'urlPattern' => 'javascript:'),
        ));
        $header2->populateFromArray(array(
            'name' => 'Category',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getCategory',
                'urlPattern' => 'javascript:'),
        ));
        $header3->populateFromArray(array(
            'name' => 'Provider',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getProvider',
                'urlPattern' => 'javascript:'),
        ));
        $header4->populateFromArray(array(
            'name' => 'Specifications',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getSpecifications',
                'urlPattern' => 'javascript:'),
        ));

        $this->headers = array($header1, $header2, $header3, $header4);
    }

    public function getClassName() {
        return 'Product';
    }
}

