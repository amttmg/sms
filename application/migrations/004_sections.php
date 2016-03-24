<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Sections extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

		$this->dbforge->add_field(array(
                'section_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'section_name' => array(
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
        $this->dbforge->add_key('section_id', TRUE);
        $this->dbforge->create_table('sections');
		
	}

	public function down() {
		$this->dbforge->drop_table('sections');
		
	}

}

/* End of file 003_migrations.php */
/* Location: ./application/migrations/004_sectons.php */