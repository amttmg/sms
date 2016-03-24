<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_teachers extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'teacher_id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'name'=>array(
                        'type'=>'varchar',
                        'constraint'=>'5',
                ),
                'address' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '64',
                ),
                'phone'=>array(
                        'type'=>'VARCHAR',
                        'constraint'=>'32'
                ),
                'email'=>array(
                        'type'=>'VARCHAR',
                        'constraint'=>'256',
                        'null'=>TRUE
                ),
                'status'=>array(
        		'type'=>'VARCHAR',
        		'constraint'=>'25',
        		'null'=>TRUE
                ),
        ));
        $this->dbforge->add_key('teacher_id', TRUE);
        $this->dbforge->create_table('teachers');
		
	}

	public function down() {
		$this->dbforge->drop_table('teachers');
		
	}

}
