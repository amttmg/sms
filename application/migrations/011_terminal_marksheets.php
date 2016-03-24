<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_terminal_marksheets extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'terminal_marksheet_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'terminal_id'=>array(
                        'type'=>'INT',
                        'constraint'=>5,
                        'unsigned' => TRUE
                ),
                'marksheet_id' => array(
                        'type' => 'BIGINT',
                ),
                'subject_class_section_id'=>array(
                        'type'=>'INT',
                        'constraint'=>5
                ),
                'secured_marks'=>array(
                        'type'=>'FLOAT'
                ),
                'date'=>array(
                        'type'=>'DAte'
                ),
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>TRUE
                ),
        ));
        $this->dbforge->add_key('terminal_marksheet_id', TRUE);
        $this->dbforge->create_table('terminal_marksheets');
		
	}

	public function down() {
		$this->dbforge->drop_table('terminal_marksheets');
		
	}

}
