<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_marksheets extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'marksheet_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'student_class_id'=>array(
                        'type'=>'BIGINT',
                ),
                'issue_date' => array(
                        'type' => 'DATE',
                ),
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>TRUE
                ),
        ));
        $this->dbforge->add_key('marksheet_id', TRUE);
        $this->dbforge->create_table('marksheets');
		
	}

	public function down() {
		$this->dbforge->drop_table('marksheets');
		
	}

}
