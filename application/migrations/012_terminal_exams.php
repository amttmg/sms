<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_terminal_exams extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'terminal_exam_id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'terminal'=>array(
                        'type'=>'varchar',
                        'constraint'=>'5',
                ),
                'evaluation_marks' => array(
                        'type' => 'INT',
                        'constraint' => '5',
                ),
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>TRUE
                ),
        ));
        $this->dbforge->add_key('terminal_exam_id', TRUE);
        $this->dbforge->create_table('terminal_exams');
		
	}

	public function down() {
		$this->dbforge->drop_table('terminal_exams');
		
	}

}
