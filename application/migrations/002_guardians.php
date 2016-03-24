<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Guardians extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {

			$this->dbforge->add_field(array(
                'guardian_id' => array(
                        'type' => 'BIGINT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'address' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null'=>FALSE
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
                'status'=>array(
                		'type'=>'VARCHAR',
                		'constraint'=>'25',
                		'null'=>FALSE
                ),
        ));
        $this->dbforge->add_key('guardian_id', TRUE);
        $this->dbforge->create_table('guardians');
		
	}

	public function down() {
		$this->dbforge->drop_table('guardians');
		
	}

}

/* End of file 003_guardians.php */
/* Location: ./application/migrations/003_guardians.php */