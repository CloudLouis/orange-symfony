<?php

class RequestSubmissionHeaderFactory extends ohrmListConfigurationFactory {

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

		$header1->populateFromArray(array(
		    'name' => 'Category',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'item_amount',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' => array('getCategory')),
		    
		));
		
		$header2->populateFromArray(array(
		    'name' => 'Product',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'specifications',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' => array('getProduct')),
		    
		));

		$header3->populateFromArray(array(
		    'name' => 'Quantity',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'budget',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' => array('getQuantity')),
		    
		));
                
        $header4->populateFromArray(array(
		    'name' => 'Additional Detail',
		    'width' => '20%',
		    'isSortable' => true,
		    'sortField' => 'additional_detail',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getAdditionalDetail'),
		    
		));

		$header5->populateFromArray(array(
		    'name' => 'Bottom Price',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'price_range_bottom',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getPriceRangeBottom'),
		    
		));

		$header9->populateFromArray(array(
		    'name' => 'Top Price',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'price_range_top',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getPriceRangeTop'),
		    
		));

		$header6->populateFromArray(array(
		    'name' => 'Employee',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'Employee',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getMasterEmployee'),
		    
		));

		$header8->populateFromArray(array(
		    'name' => 'Transaction Number',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'transaction_number',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getTransactionNumber'),
		    
		));

		$header7->populateFromArray(array(
		    'name' => 'ID',
		    'width' => '5%',
		    'isSortable' => true,
		    'sortField' => 'id',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getId'),
		    
		));

		$this->headers = array($header7,$header1, $header2, $header3,$header4,$header5, $header9, $header6, $header8);
	}
	
	public function getClassName() {
		return 'PurchaseRequest';
	}

}
?>
