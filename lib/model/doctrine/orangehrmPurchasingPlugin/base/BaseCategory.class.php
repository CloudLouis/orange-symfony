<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Category', 'doctrine');

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property Doctrine_Collection $Budget
 * @property Doctrine_Collection $Product
 * @property Doctrine_Collection $PurchaseRequest
 * @property Doctrine_Collection $VendorToCategory
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getCode()             Returns the current record's "code" value
 * @method Doctrine_Collection getBudget()           Returns the current record's "Budget" collection
 * @method Doctrine_Collection getProduct()          Returns the current record's "Product" collection
 * @method Doctrine_Collection getPurchaseRequest()  Returns the current record's "PurchaseRequest" collection
 * @method Doctrine_Collection getVendorToCategory() Returns the current record's "VendorToCategory" collection
 * @method Category            setId()               Sets the current record's "id" value
 * @method Category            setName()             Sets the current record's "name" value
 * @method Category            setCode()             Sets the current record's "code" value
 * @method Category            setBudget()           Sets the current record's "Budget" collection
 * @method Category            setProduct()          Sets the current record's "Product" collection
 * @method Category            setPurchaseRequest()  Sets the current record's "PurchaseRequest" collection
 * @method Category            setVendorToCategory() Sets the current record's "VendorToCategory" collection
 * 
 * @package    orangehrm
 * @subpackage model\purchasing\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('code', 'string', 5, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Budget', array(
             'local' => 'id',
             'foreign' => 'category'));

        $this->hasMany('Product', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('PurchaseRequest', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('VendorToCategory', array(
             'local' => 'id',
             'foreign' => 'category_id'));
    }
}