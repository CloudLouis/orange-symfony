<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('OhrmJobCategory', 'doctrine');

/**
 * BaseOhrmJobCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $HsHrEmployee
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getName()         Returns the current record's "name" value
 * @method Doctrine_Collection getHsHrEmployee() Returns the current record's "HsHrEmployee" collection
 * @method OhrmJobCategory     setId()           Sets the current record's "id" value
 * @method OhrmJobCategory     setName()         Sets the current record's "name" value
 * @method OhrmJobCategory     setHsHrEmployee() Sets the current record's "HsHrEmployee" collection
 * 
 * @package    orangehrm
 * @subpackage model\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOhrmJobCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_job_category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 60, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 60,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('HsHrEmployee', array(
             'local' => 'id',
             'foreign' => 'eeo_cat_code'));
    }
}