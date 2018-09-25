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
        $header9 = new ListHeader();
        $header10 = new ListHeader();
        $header11 = new ListHeader();

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
        $header9->populateFromArray(array(
            'name' => 'Bank',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getBank',
                'urlPattern' => 'javascript:'),
        ));
        $header5->populateFromArray(array(
            'name' => 'Account Name',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getAccountName',
                'urlPattern' => 'javascript:'),
        ));
        $header10->populateFromArray(array(
            'name' => 'Account Number',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getAccountNumber',
                'urlPattern' => 'javascript:'),
        ));
        $header11->populateFromArray(array(
            'name' => 'Bank Branch',
            'elementType' => 'link',
            'filters' => array('I18nCellFilter' => array()
                              ),
            'elementProperty' => array(
                'labelGetter' => 'getBankBranchAddress',
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

        $this->headers = array($header1, $header2, $header3, $header4, $header9, $header5, $header10, $header11, $header6, $header7, $header8);
    }

    public function getClassName() {
        return 'Vendor';
    }
}

