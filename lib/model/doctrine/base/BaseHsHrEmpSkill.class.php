<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HsHrEmpSkill', 'doctrine');

/**
 * BaseHsHrEmpSkill
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $emp_number
 * @property integer $skill_id
 * @property decimal $years_of_exp
 * @property string $comments
 * @property HsHrEmployee $HsHrEmployee
 * @property OhrmSkill $OhrmSkill
 * 
 * @method integer      getId()           Returns the current record's "id" value
 * @method integer      getEmpNumber()    Returns the current record's "emp_number" value
 * @method integer      getSkillId()      Returns the current record's "skill_id" value
 * @method decimal      getYearsOfExp()   Returns the current record's "years_of_exp" value
 * @method string       getComments()     Returns the current record's "comments" value
 * @method HsHrEmployee getHsHrEmployee() Returns the current record's "HsHrEmployee" value
 * @method OhrmSkill    getOhrmSkill()    Returns the current record's "OhrmSkill" value
 * @method HsHrEmpSkill setId()           Sets the current record's "id" value
 * @method HsHrEmpSkill setEmpNumber()    Sets the current record's "emp_number" value
 * @method HsHrEmpSkill setSkillId()      Sets the current record's "skill_id" value
 * @method HsHrEmpSkill setYearsOfExp()   Sets the current record's "years_of_exp" value
 * @method HsHrEmpSkill setComments()     Sets the current record's "comments" value
 * @method HsHrEmpSkill setHsHrEmployee() Sets the current record's "HsHrEmployee" value
 * @method HsHrEmpSkill setOhrmSkill()    Sets the current record's "OhrmSkill" value
 * 
 * @package    orangehrm
 * @subpackage model\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHsHrEmpSkill extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hs_hr_emp_skill');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('emp_number', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('skill_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('years_of_exp', 'decimal', 2, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('comments', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('HsHrEmployee', array(
             'local' => 'emp_number',
             'foreign' => 'emp_number'));

        $this->hasOne('OhrmSkill', array(
             'local' => 'skill_id',
             'foreign' => 'id'));
    }
}