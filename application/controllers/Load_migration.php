<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_migration extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('migration');
        }

	public function index()
        {

                if ($this->migration->latest() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
                else
                {
                        $data='<!DOCTYPE html>
                        <html>
                        <head>
                                <title></title>
                                <style>
                                h3 {
                                    background-color:#0033FF;
                                    color:white;
                                    margin:0 auto;
                                    width:50%;
                                    text-align:center;
                                }

                                </style>
                        </head>
                        <body>
                        <h3>database successfully migrated to latest version </h3><br/>
                        </body>
                        </html>';
                	echo($data);
                }
        }
        public function reset($version='')
        {
                if(!$version)
                {
                        echo("version should be supplied");
                        die();
                }
                if ($this->migration->version($version) === FALSE)
                {
                        show_error($this->migration->error_string());
                }
                else
                {
                        $data='<!DOCTYPE html>
                        <html>
                        <head>
                                <title></title>
                                <style>
                                h3 {
                                    background-color:#0033FF;
                                    color:white;
                                    margin:0 auto;
                                    width:50%;$version
                                    text-align:center;
                                }

                                </style>
                        </head>
                        <body>
                        <h3>migration successfully reset back to version '. $version.'</h3><br/>
                        </body>
                        </html>';
                        echo($data);
                }
        }

}

/* End of file Migrations.php */
/* Location: ./application/controllers/Migrations.php */