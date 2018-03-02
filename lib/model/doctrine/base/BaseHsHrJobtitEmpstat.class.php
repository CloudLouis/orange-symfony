<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HsHrJobtitEmpstat', 'doctrine');

/**
 * BaseHsHrJobtitEmpstat
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $jobtit_code
 * @property integer $estat_code
 * @property OhrmJobTitle $OhrmJobTitle
 * @property OhrmEmploymentStatus $OhrmEmploymentStatus
 * 
 * @method integer              getJobtitCode()           Returns the current record's "jobtit_code" value
 * @method integer              getEstatCode()            Returns the current record's "estat_code" value
 * @method OhrmJobTitle         getOhrmJobTitle()         Returns the current record's "OhrmJobTitle" value
 * @method OhrmEmploymentStatus getOhrmEmploymentStatus() Returns the current record's "OhrmEmploymentStatus" value
 * @method HsHrJobtitEmpstat    setJobtitCode()           Sets the current record's "jobtit_code" value
 * @method HsHrJobtitEmpstat    setEstatCode()            Sets the current record's "estat_code" value
 * @method HsHrJobtitEmpstat    setOhrmJobTitle()         Sets the current record's "OhrmJobTitle" value
 * @method HsHrJobtitEmpstat    setOhrmEmploymentStatus() Sets the current record's "OhrmEmploymentStatus" value
 * 
 * @package    orangehrm
 * @subpackage model\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHsHrJobtitEmpstat extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hs_hr_jobtit_empstat');
        $this->hasColumn('jobtit_code', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('estat_code', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OhrmJobTitle', array(
             'local' => 'jobtit_code',
             'foreign' => 'id'));

        $this->hasOne('OhrmEmploymentStatus', array(
             'local' => 'estat_code',
             'foreign' => 'id'));
    }
}