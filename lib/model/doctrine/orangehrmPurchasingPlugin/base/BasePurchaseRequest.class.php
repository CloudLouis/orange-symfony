<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PurchaseRequest', 'doctrine');

/**
 * BasePurchaseRequest
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $master_id
 * @property integer $id
 * @property integer $category_id
 * @property integer $product_id
 * @property float $quantity
 * @property float $price_range_bottom
 * @property float $price_range_top
 * @property integer $budget_department
 * @property integer $budget_category
 * @property integer $approved_by
 * @property date $approval_date
 * @property string $additional_detail
 * @property string $transaction_number
 * @property integer $status
 * @property string $rejection_reason
 * @property Employee $Employee
 * @property Budget $Budget
 * @property Budget $Budget_2
 * @property Category $Category
 * @property Product $Product
 * @property Doctrine_Collection $PurchaseOrder
 * 
 * @method integer             getMasterId()           Returns the current record's "master_id" value
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getCategoryId()         Returns the current record's "category_id" value
 * @method integer             getProductId()          Returns the current record's "product_id" value
 * @method float               getQuantity()           Returns the current record's "quantity" value
 * @method float               getPriceRangeBottom()   Returns the current record's "price_range_bottom" value
 * @method float               getPriceRangeTop()      Returns the current record's "price_range_top" value
 * @method integer             getBudgetDepartment()   Returns the current record's "budget_department" value
 * @method integer             getBudgetCategory()     Returns the current record's "budget_category" value
 * @method integer             getApprovedBy()         Returns the current record's "approved_by" value
 * @method date                getApprovalDate()       Returns the current record's "approval_date" value
 * @method string              getAdditionalDetail()   Returns the current record's "additional_detail" value
 * @method string              getTransactionNumber()  Returns the current record's "transaction_number" value
 * @method integer             getStatus()             Returns the current record's "status" value
 * @method string              getRejectionReason()    Returns the current record's "rejection_reason" value
 * @method Employee            getEmployee()           Returns the current record's "Employee" value
 * @method Budget              getBudget()             Returns the current record's "Budget" value
 * @method Budget              getBudget2()            Returns the current record's "Budget_2" value
 * @method Category            getCategory()           Returns the current record's "Category" value
 * @method Product             getProduct()            Returns the current record's "Product" value
 * @method Doctrine_Collection getPurchaseOrder()      Returns the current record's "PurchaseOrder" collection
 * @method PurchaseRequest     setMasterId()           Sets the current record's "master_id" value
 * @method PurchaseRequest     setId()                 Sets the current record's "id" value
 * @method PurchaseRequest     setCategoryId()         Sets the current record's "category_id" value
 * @method PurchaseRequest     setProductId()          Sets the current record's "product_id" value
 * @method PurchaseRequest     setQuantity()           Sets the current record's "quantity" value
 * @method PurchaseRequest     setPriceRangeBottom()   Sets the current record's "price_range_bottom" value
 * @method PurchaseRequest     setPriceRangeTop()      Sets the current record's "price_range_top" value
 * @method PurchaseRequest     setBudgetDepartment()   Sets the current record's "budget_department" value
 * @method PurchaseRequest     setBudgetCategory()     Sets the current record's "budget_category" value
 * @method PurchaseRequest     setApprovedBy()         Sets the current record's "approved_by" value
 * @method PurchaseRequest     setApprovalDate()       Sets the current record's "approval_date" value
 * @method PurchaseRequest     setAdditionalDetail()   Sets the current record's "additional_detail" value
 * @method PurchaseRequest     setTransactionNumber()  Sets the current record's "transaction_number" value
 * @method PurchaseRequest     setStatus()             Sets the current record's "status" value
 * @method PurchaseRequest     setRejectionReason()    Sets the current record's "rejection_reason" value
 * @method PurchaseRequest     setEmployee()           Sets the current record's "Employee" value
 * @method PurchaseRequest     setBudget()             Sets the current record's "Budget" value
 * @method PurchaseRequest     setBudget2()            Sets the current record's "Budget_2" value
 * @method PurchaseRequest     setCategory()           Sets the current record's "Category" value
 * @method PurchaseRequest     setProduct()            Sets the current record's "Product" value
 * @method PurchaseRequest     setPurchaseOrder()      Sets the current record's "PurchaseOrder" collection
 * 
 * @package    orangehrm
 * @subpackage model\purchasing\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePurchaseRequest extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_purchase_request');
        $this->hasColumn('master_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('category_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('product_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('quantity', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('price_range_bottom', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('price_range_top', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('budget_department', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('budget_category', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('approved_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('approval_date', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('additional_detail', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('transaction_number', 'string', 225, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 225,
             ));
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('rejection_reason', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Employee', array(
             'local' => 'approved_by',
             'foreign' => 'emp_number'));

        $this->hasOne('Budget', array(
             'local' => 'budget_department',
             'foreign' => 'department'));

        $this->hasOne('Budget as Budget_2', array(
             'local' => 'budget_category',
             'foreign' => 'category'));

        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('Product', array(
             'local' => 'product_id',
             'foreign' => 'id'));

        $this->hasMany('PurchaseOrder', array(
             'local' => 'id',
             'foreign' => 'request_id'));
    }
    public function getMasterEmployee(){
     $service = new RequestSubmissionService();
     $reqM = $service->getRequestMasterList();
     foreach($reqM as $M){
         if($M->getId() == $this->getMasterId()){
             $emp = $M->getEmployee();
         }
     }
     return $emp->getFirstName()." ".$emp->getLastName();
    }       
    public function getCurrentStatus(){
        $stat = $this->getStatus();
        if($stat == 0){
            return "Pending";
        }else if($stat == 1){
            return "Approved";
        }else if($stat == 2){
            return "Rejected";
        }
    }
}