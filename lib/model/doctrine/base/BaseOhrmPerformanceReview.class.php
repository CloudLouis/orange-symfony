<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('OhrmPerformanceReview', 'doctrine');

/**
 * BaseOhrmPerformanceReview
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $status_id
 * @property integer $employee_number
 * @property date $work_period_start
 * @property date $work_period_end
 * @property integer $job_title_code
 * @property integer $department_id
 * @property date $due_date
 * @property date $completed_date
 * @property timestamp $activated_date
 * @property string $final_comment
 * @property decimal $final_rate
 * @property HsHrEmployee $HsHrEmployee
 * @property Doctrine_Collection $OhrmReviewer
 * @property Doctrine_Collection $OhrmReviewerRating
 * 
 * @method integer               getId()                 Returns the current record's "id" value
 * @method integer               getStatusId()           Returns the current record's "status_id" value
 * @method integer               getEmployeeNumber()     Returns the current record's "employee_number" value
 * @method date                  getWorkPeriodStart()    Returns the current record's "work_period_start" value
 * @method date                  getWorkPeriodEnd()      Returns the current record's "work_period_end" value
 * @method integer               getJobTitleCode()       Returns the current record's "job_title_code" value
 * @method integer               getDepartmentId()       Returns the current record's "department_id" value
 * @method date                  getDueDate()            Returns the current record's "due_date" value
 * @method date                  getCompletedDate()      Returns the current record's "completed_date" value
 * @method timestamp             getActivatedDate()      Returns the current record's "activated_date" value
 * @method string                getFinalComment()       Returns the current record's "final_comment" value
 * @method decimal               getFinalRate()          Returns the current record's "final_rate" value
 * @method HsHrEmployee          getHsHrEmployee()       Returns the current record's "HsHrEmployee" value
 * @method Doctrine_Collection   getOhrmReviewer()       Returns the current record's "OhrmReviewer" collection
 * @method Doctrine_Collection   getOhrmReviewerRating() Returns the current record's "OhrmReviewerRating" collection
 * @method OhrmPerformanceReview setId()                 Sets the current record's "id" value
 * @method OhrmPerformanceReview setStatusId()           Sets the current record's "status_id" value
 * @method OhrmPerformanceReview setEmployeeNumber()     Sets the current record's "employee_number" value
 * @method OhrmPerformanceReview setWorkPeriodStart()    Sets the current record's "work_period_start" value
 * @method OhrmPerformanceReview setWorkPeriodEnd()      Sets the current record's "work_period_end" value
 * @method OhrmPerformanceReview setJobTitleCode()       Sets the current record's "job_title_code" value
 * @method OhrmPerformanceReview setDepartmentId()       Sets the current record's "department_id" value
 * @method OhrmPerformanceReview setDueDate()            Sets the current record's "due_date" value
 * @method OhrmPerformanceReview setCompletedDate()      Sets the current record's "completed_date" value
 * @method OhrmPerformanceReview setActivatedDate()      Sets the current record's "activated_date" value
 * @method OhrmPerformanceReview setFinalComment()       Sets the current record's "final_comment" value
 * @method OhrmPerformanceReview setFinalRate()          Sets the current record's "final_rate" value
 * @method OhrmPerformanceReview setHsHrEmployee()       Sets the current record's "HsHrEmployee" value
 * @method OhrmPerformanceReview setOhrmReviewer()       Sets the current record's "OhrmReviewer" collection
 * @method OhrmPerformanceReview setOhrmReviewerRating() Sets the current record's "OhrmReviewerRating" collection
 * 
 * @package    orangehrm
 * @subpackage model\base
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOhrmPerformanceReview extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_performance_review');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('status_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('employee_number', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('work_period_start', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('work_period_end', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('job_title_code', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('department_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('due_date', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('completed_date', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('activated_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('final_comment', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('final_rate', 'decimal', 18, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             'scale' => '2',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('HsHrEmployee', array(
             'local' => 'employee_number',
             'foreign' => 'emp_number'));

        $this->hasMany('OhrmReviewer', array(
             'local' => 'id',
             'foreign' => 'review_id'));

        $this->hasMany('OhrmReviewerRating', array(
             'local' => 'id',
             'foreign' => 'review_id'));
    }
}