<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HsHrModule', 'doctrine');

/**
 * BaseHsHrModule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $mod_id
 * @property string $name
 * @property string $owner
 * @property string $owner_email
 * @property string $version
 * @property string $description
 * 
 * @method string     getModId()       Returns the current record's "mod_id" value
 * @method string     getName()        Returns the current record's "name" value
 * @method string     getOwner()       Returns the current record's "owner" value
 * @method string     getOwnerEmail()  Returns the current record's "owner_email" value
 * @method string     getVersion()     Returns the current record's "version" value
 * @method string     getDescription() Returns the current record's "description" value
 * @method HsHrModule setModId()       Sets the current record's "mod_id" value
 * @method HsHrModule setName()        Sets the current record's "name" value
 * @method HsHrModule setOwner()       Sets the current record's "owner" value
 * @method HsHrModule setOwnerEmail()  Sets the current record's "owner_email" value
 * @method HsHrModule setVersion()     Sets the current record's "version" value
 * @method HsHrModule setDescription() Sets the current record's "description" value
 * 
 * @package    orangehrm
 * @subpackage model\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHsHrModule extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hs_hr_module');
        $this->hasColumn('mod_id', 'string', 36, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 36,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('owner', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('owner_email', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('version', 'string', 36, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 36,
             ));
        $this->hasColumn('description', 'string', null, array(
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
        
    }
}