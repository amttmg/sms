<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_student_class_section extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'student_class_section_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'student_id' => array(
                        'type' => 'INT',
                        'constraint' => '5',
                        'null'=>FALSE
                ),
                'registerd_date'=>array(
                		'type'=>'DATE',
                		'null'=>FALSE
                ),
        ));
        $this->dbforge->add_key('student_class_section_id', TRUE);
        $this->dbforge->create_table('student_class_section');
		
	}

	public function down() {
		$this->dbforge->drop_table('student_class_section');
		
	}

}
