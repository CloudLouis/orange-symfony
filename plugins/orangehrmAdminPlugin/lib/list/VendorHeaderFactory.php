<?php

class VendorHeaderFactory extends ohrmListConfigurationFactory {
    protected function init() {

        $header1 = new ListHeader();
        $header2 = new ListHeader();
        $header3 = new ListHeader();
        $header4 = new ListHeader();
        $header5 = new ListHeader();
        $header6 = new ListHeader();
        $header7 = new ListHeader();
        $header8 = new ListHeader();

        $header1->populateFromArray(array(
            'name' => 'Name',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getName',
                'urlPattern' => 'javascript:'),
        ));
        $header2->populateFromArray(array(
            'name' => 'PIC',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getPic',
                'urlPattern' => 'javascript:'),
        ));
        $header3->populateFromArray(array(
            'name' => 'Contact',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getContact',
                'urlPattern' => 'javascript:'),
        ));
        $header4->populateFromArray(array(
            'name' => 'Address',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getAddress',
                'urlPattern' => 'javascript:'),
        ));
        $header5->populateFromArray(array(
            'name' => 'Account',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getAccount',
                'urlPattern' => 'javascript:'),
        ));

        $header6->populateFromArray(array(
            'name' => 'NPWP',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getNpwp',
                'urlPattern' => 'javascript:'),
        ));

        $header7->populateFromArray(array(
            'name' => 'Category',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getOwnedCategory',
                'urlPattern' => 'javascript:'),
        ));

        $header8->populateFromArray(array(
            'name' => 'Code',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getCode',
                'urlPattern' => 'javascript:'),
        ));

        $this->headers = array($header1, $header2, $header3, $header4, $header5, $header6, $header7, $header8);
    }

    public function getClassName() {
        return 'Vendor';
    }
}

