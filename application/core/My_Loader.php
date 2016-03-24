<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader 
{
    var $data="";
    function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {
        $CI =& get_instance();
        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $CI->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
    }
}