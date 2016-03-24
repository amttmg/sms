<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_subject_class_section extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'subject_class_section_id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'subject_id'=>array(
                        'type'=>'INT',
                        'constraint'=>'5',
                        'null'=>FALSE
                ),
                'class_section_id' => array(
                        'type' => 'INT',
                        'constraint' => '5',
                        'null'=>FALSE
                ),
                'full_marks'=>array(
                        'type'=>'INT',
                        'constraint'=>5
                ),
                'pass_marks'=>array(
                        'type'=>'INT',
                        'constraint'=>5
                ),
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>FALSE
                ),
        ));
        $this->dbforge->add_key('subject_class_section_id', TRUE);
        $this->dbforge->create_table('subject_class_section');
		
	}

	public function down() {
		$this->dbforge->drop_table('subject_class_section');
		
	}

}
