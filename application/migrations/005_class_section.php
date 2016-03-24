<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_class_section extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'class_section_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'class_id' => array(
                        'type' => 'INT',
                        'constraint' => '5',
                        'null'=>FALSE
                ),
                'section_id'=>array(
                		'type'=>'INT',
                		'constraint'=>'5',
                		'null'=>FALSE
                ),
        ));
        $this->dbforge->add_key('class_section_id', TRUE);
        $this->dbforge->create_table('class_section');
		
	}

	public function down() {
		$this->dbforge->drop_table('class_section');
		
	}

}

/* End of file 003_migrations.php */
/* Location: ./application/migrations/004_sectons.php */