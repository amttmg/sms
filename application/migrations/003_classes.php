<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Classes extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'class_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'class_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null'=>FALSE
                ),
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>FALSE
                ),
        ));
        $this->dbforge->add_key('class_id', TRUE);
        $this->dbforge->create_table('classes');
		
	}

	public function down() {
		$this->dbforge->drop_table('classes');
		
	}

}

/* End of file 003_classes.php */
/* Location: ./application/migrations/003_classes.php */