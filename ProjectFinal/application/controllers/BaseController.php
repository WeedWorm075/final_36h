<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {
    function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
        if(!isset($_SESSION['utilisateur'])){
            redirect('welcome');
        }
    }
}
?>