<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_teacher_subjects extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'teacher_subject_id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'Subject_class_section_id'=>array(
                        'type'=>'INT',
                        'constraint'=>'5',
                ),
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>TRUE
                ),
        ));
        $this->dbforge->add_key('teacher_subject_id', TRUE);
        $this->dbforge->create_table('teacher_subjects');
		
	}

	public function down() {
		$this->dbforge->drop_table('teacher_subjects');
		
	}

}
