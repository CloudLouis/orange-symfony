<?php

/**
 * BaseEmployeeSalary
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $empNumber
 * @property integer $payGradeId
 * @property string $currencyCode
 * @property string $amount
 * @property string $payPeriodId
 * @property string $salaryName
 * @property string $notes
 * @property Employee $employee
 * @property EmpDirectdebit $directDebit
 * @property PayGrade $payGrade
 * 
 * @method integer        getId()           Returns the current record's "id" value
 * @method integer        getEmpNumber()    Returns the current record's "empNumber" value
 * @method integer        getPayGradeId()   Returns the current record's "payGradeId" value
 * @method string         getCurrencyCode() Returns the current record's "currencyCode" value
 * @method string         getAmount()       Returns the current record's "amount" value
 * @method string         getPayPeriodId()  Returns the current record's "payPeriodId" value
 * @method string         getSalaryName()   Returns the current record's "salaryName" value
 * @method string         getNotes()        Returns the current record's "notes" value
 * @method Employee       getEmployee()     Returns the current record's "employee" value
 * @method EmpDirectdebit getDirectDebit()  Returns the current record's "directDebit" value
 * @method PayGrade       getPayGrade()     Returns the current record's "payGrade" value
 * @method EmployeeSalary setId()           Sets the current record's "id" value
 * @method EmployeeSalary setEmpNumber()    Sets the current record's "empNumber" value
 * @method EmployeeSalary setPayGradeId()   Sets the current record's "payGradeId" value
 * @method EmployeeSalary setCurrencyCode() Sets the current record's "currencyCode" value
 * @method EmployeeSalary setAmount()       Sets the current record's "amount" value
 * @method EmployeeSalary setPayPeriodId()  Sets the current record's "payPeriodId" value
 * @method EmployeeSalary setSalaryName()   Sets the current record's "salaryName" value
 * @method EmployeeSalary setNotes()        Sets the current record's "notes" value
 * @method EmployeeSalary setEmployee()     Sets the current record's "employee" value
 * @method EmployeeSalary setDirectDebit()  Sets the current record's "directDebit" value
 * @method EmployeeSalary setPayGrade()     Sets the current record's "payGrade" value
 * 
 * @package    orangehrm
 * @subpackage model\pim\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmployeeSalary extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hs_hr_emp_basicsalary');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('emp_number as empNumber', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('sal_grd_code as payGradeId', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('currency_id as currencyCode', 'string', 6, array(
             'type' => 'string',
             'notnull' => true,
             'default' => '',
             'length' => 6,
             ));
        $this->hasColumn('ebsal_basic_salary as amount', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('payperiod_code as payPeriodId', 'string', 13, array(
             'type' => 'string',
             'length' => 13,
             ));
        $this->hasColumn('salary_component as salaryName', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('comments as notes', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Employee as employee', array(
             'local' => 'empNumber',
             'foreign' => 'empNumber'));

        $this->hasOne('EmpDirectdebit as directDebit', array(
             'local' => 'id',
             'foreign' => 'salary_id'));

        $this->hasOne('PayGrade as payGrade', array(
             'local' => 'payGradeId',
             'foreign' => 'id'));
    }
}