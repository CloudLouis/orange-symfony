<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('OhrmReport', 'doctrine');

/**
 * BaseOhrmReport
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $report_id
 * @property string $name
 * @property integer $report_group_id
 * @property integer $use_filter_field
 * @property string $type
 * @property OhrmReportGroup $OhrmReportGroup
 * @property Doctrine_Collection $OhrmSelectedCompositeDisplayField
 * @property Doctrine_Collection $OhrmSelectedDisplayField
 * @property Doctrine_Collection $OhrmSelectedDisplayFieldGroup
 * @property Doctrine_Collection $OhrmSelectedFilterField
 * @property Doctrine_Collection $OhrmSelectedGroupField
 * 
 * @method integer             getReportId()                          Returns the current record's "report_id" value
 * @method string              getName()                              Returns the current record's "name" value
 * @method integer             getReportGroupId()                     Returns the current record's "report_group_id" value
 * @method integer             getUseFilterField()                    Returns the current record's "use_filter_field" value
 * @method string              getType()                              Returns the current record's "type" value
 * @method OhrmReportGroup     getOhrmReportGroup()                   Returns the current record's "OhrmReportGroup" value
 * @method Doctrine_Collection getOhrmSelectedCompositeDisplayField() Returns the current record's "OhrmSelectedCompositeDisplayField" collection
 * @method Doctrine_Collection getOhrmSelectedDisplayField()          Returns the current record's "OhrmSelectedDisplayField" collection
 * @method Doctrine_Collection getOhrmSelectedDisplayFieldGroup()     Returns the current record's "OhrmSelectedDisplayFieldGroup" collection
 * @method Doctrine_Collection getOhrmSelectedFilterField()           Returns the current record's "OhrmSelectedFilterField" collection
 * @method Doctrine_Collection getOhrmSelectedGroupField()            Returns the current record's "OhrmSelectedGroupField" collection
 * @method OhrmReport          setReportId()                          Sets the current record's "report_id" value
 * @method OhrmReport          setName()                              Sets the current record's "name" value
 * @method OhrmReport          setReportGroupId()                     Sets the current record's "report_group_id" value
 * @method OhrmReport          setUseFilterField()                    Sets the current record's "use_filter_field" value
 * @method OhrmReport          setType()                              Sets the current record's "type" value
 * @method OhrmReport          setOhrmReportGroup()                   Sets the current record's "OhrmReportGroup" value
 * @method OhrmReport          setOhrmSelectedCompositeDisplayField() Sets the current record's "OhrmSelectedCompositeDisplayField" collection
 * @method OhrmReport          setOhrmSelectedDisplayField()          Sets the current record's "OhrmSelectedDisplayField" collection
 * @method OhrmReport          setOhrmSelectedDisplayFieldGroup()     Sets the current record's "OhrmSelectedDisplayFieldGroup" collection
 * @method OhrmReport          setOhrmSelectedFilterField()           Sets the current record's "OhrmSelectedFilterField" collection
 * @method OhrmReport          setOhrmSelectedGroupField()            Sets the current record's "OhrmSelectedGroupField" collection
 * 
 * @package    orangehrm
 * @subpackage model\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOhrmReport extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_report');
        $this->hasColumn('report_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('report_group_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('use_filter_field', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OhrmReportGroup', array(
             'local' => 'report_group_id',
             'foreign' => 'report_group_id'));

        $this->hasMany('OhrmSelectedCompositeDisplayField', array(
             'local' => 'report_id',
             'foreign' => 'report_id'));

        $this->hasMany('OhrmSelectedDisplayField', array(
             'local' => 'report_id',
             'foreign' => 'report_id'));

        $this->hasMany('OhrmSelectedDisplayFieldGroup', array(
             'local' => 'report_id',
             'foreign' => 'report_id'));

        $this->hasMany('OhrmSelectedFilterField', array(
             'local' => 'report_id',
             'foreign' => 'report_id'));

        $this->hasMany('OhrmSelectedGroupField', array(
             'local' => 'report_id',
             'foreign' => 'report_id'));
    }
}