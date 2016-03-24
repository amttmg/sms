<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Students extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
				$this->dbforge->add_field(array(
                        'student_id' => array(
                                'type' => 'BIGINT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'phone' => array(
                                'type' => 'VARCHAR',
                                'constraint'=>'30',
                                'null' => TRUE,
                        ),
                        'email'=>array(
                        		'type'=>'VARCHAR',
                        		'constraint'=>'256',
                        		'null'=>TRUE
                        ),
                        'image_url'=>array(
                        		'type'=>'VARCHAR',
                        		'constraint'=>'100',
                        		'null'=>TRUE
                        ),
                ));
                $this->dbforge->add_key('student_id', TRUE);
                $this->dbforge->create_table('students');
		
	}

	public function down() {
		$this->dbforge->drop_table('students');
		
	}

}

/* End of file 002_students.php */
/* Location: ./application/migrations/002_students.php */