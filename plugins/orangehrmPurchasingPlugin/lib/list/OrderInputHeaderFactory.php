<?php

class OrderInputHeaderFactory extends ohrmListConfigurationFactory {

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

		$header1->populateFromArray(array(
		    'name' => 'Id',
		    'width' => '5%',
		    'isSortable' => true,
		    'sortField' => 'id',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' => array('getId')),
		    
		));
		
		$header2->populateFromArray(array(
		    'name' => 'Vendor',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'vendor',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' => array('getVendor')),
		    
		));

		$header3->populateFromArray(array(
		    'name' => 'Product',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'product',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' => array('getProduct')),
		    
		));
                
        $header4->populateFromArray(array(
		    'name' => 'Price',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'price',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getPrice'),
		    
		));

		$header10->populateFromArray(array(
		    'name' => 'Quantity',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'quantity',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getQuantity'),
		    
		));

		$header5->populateFromArray(array(
		    'name' => 'Recipient',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'recipient_id',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getRecipientEmployee'),
		    
		));

		$header6->populateFromArray(array(
		    'name' => 'Issued Date',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'issued_date',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getIssuedDate'),
		    
		));
		$header7->populateFromArray(array(
		    'name' => 'Deadline',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'id',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getDeadline'),
		    
		));

		$header8->populateFromArray(array(
		    'name' => 'Requester',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'requester_id',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getRequesterEmployee'),
		    
		));

		$header9->populateFromArray(array(
		    'name' => 'Description',
		    'width' => '10%',
		    'isSortable' => true,
		    'sortField' => 'description',
		    'elementType' => 'label',
		    'elementProperty' => array('getter' =>'getDescription'),
		    
		));


		$this->headers = array($header1, $header2, $header3, $header5, $header6, $header7, $header8, $header9, $header10, $header4);
	}
	
	public function getClassName() {
		return 'Order';
	}

}

?>
