<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Vendor', 'doctrine');

/**
 * BaseVendor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $pic
 * @property string $contact
 * @property string $address
 * @property integer $account
 * @property string $npwp
 * @property string $code
 * @property integer $id
 * @property Doctrine_Collection $PurchaseOrder
 * @property Doctrine_Collection $Quotations
 * @property Doctrine_Collection $VendorToCategory
 * 
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getPic()              Returns the current record's "pic" value
 * @method string              getContact()          Returns the current record's "contact" value
 * @method string              getAddress()          Returns the current record's "address" value
 * @method integer             getAccount()          Returns the current record's "account" value
 * @method string              getNpwp()             Returns the current record's "npwp" value
 * @method string              getCode()             Returns the current record's "code" value
 * @method integer             getId()               Returns the current record's "id" value
 * @method Doctrine_Collection getPurchaseOrder()    Returns the current record's "PurchaseOrder" collection
 * @method Doctrine_Collection getQuotations()       Returns the current record's "Quotations" collection
 * @method Doctrine_Collection getVendorToCategory() Returns the current record's "VendorToCategory" collection
 * @method Vendor              setName()             Sets the current record's "name" value
 * @method Vendor              setPic()              Sets the current record's "pic" value
 * @method Vendor              setContact()          Sets the current record's "contact" value
 * @method Vendor              setAddress()          Sets the current record's "address" value
 * @method Vendor              setAccount()          Sets the current record's "account" value
 * @method Vendor              setNpwp()             Sets the current record's "npwp" value
 * @method Vendor              setCode()             Sets the current record's "code" value
 * @method Vendor              setId()               Sets the current record's "id" value
 * @method Vendor              setPurchaseOrder()    Sets the current record's "PurchaseOrder" collection
 * @method Vendor              setQuotations()       Sets the current record's "Quotations" collection
 * @method Vendor              setVendorToCategory() Sets the current record's "VendorToCategory" collection
 * 
 * @package    orangehrm
 * @subpackage model\purchasing\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVendor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_vendor');
        $this->hasColumn('name', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('pic', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('contact', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('address', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('account', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('npwp', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('code', 'string', 6, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 6,
             ));
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('PurchaseOrder', array(
             'local' => 'id',
             'foreign' => 'vendor_id'));

        $this->hasMany('Quotations', array(
             'local' => 'id',
             'foreign' => 'vendor_id'));

        $this->hasMany('VendorToCategory', array(
             'local' => 'id',
             'foreign' => 'vendor_id'));
    }

    public function getOwnedCategory(){
        $vTc = $this->getVendorToCategory();
        foreach($vTc as $rec){
            $list .= "  ".$rec->getCategory();
        }
        return $list;
    }
}