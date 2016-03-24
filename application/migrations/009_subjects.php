<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Subjects extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(array(
			'subject_id'=>array(
					'type'=>'INT',
					'unsigned'=>TRUE,
					'auto_increment'=>TRUE
			),
			'subject_name'=>array(
				'type'=>'VARCHAR',
				'constraint'=>'30'
			)

		));
		$this->dbforge->add_key('subject_id', TRUE);
        $this->dbforge->create_table('subjects');
		
	}

	public function down() {
		$this->dbforge->drop_table('subjects');
		
	}

}

/* End of file 007_subjects.php */
/* Location: ./application/migrations/007_subjects.php */