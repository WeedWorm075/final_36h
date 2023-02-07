<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('BaseController.php');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Function_model');
		$tab['message']=$this->Function_model->insert(2,"neinein");
		//$this->load->view('welcome_message');
		$this->load->view('Login',$tab);
		
	}

	public function accueil()		//fonction mandeha makany amin'ny accueil
	{	$this->load->helper('url');
		$this->load->library('session');
		//$this->load->view('welcome_message');
		$this->load->view('Accueil');
	}

    public function hello($fiderana)		//fonction mandeha makany amin'ny accueil
    {	echo "hello".$fiderana;
    }
	
	public function bonjour($pseudo=''){
		if($pseudo!=''){
			echo 'Salut a toi :'.$pseudo.'<br/>';
		}
		else{
			echo 'Bonjour inconnu';
		}
	}

	public function  manger($plat='rien',$boisson='rien'){
		echo 'Voici votre menu : <br/>';
		echo $plat.'<br/>';
		echo $boisson.'<br/>';
		echo 'Bon appetit!';
	}

	public function manahoana(){
		$data=array();
		$data['adresse']=$this->input->get('adresse');
		$data['nom']=$this->input->get('nom');
		$this->load->view('PageAhatongavana',$data);
	}

	public function format($vola){
		$this->load->helper('FormatAriary');
		ariary($vola);
	}

	public function verifierLogin(){

		//$this->load->helper('url');
		$this->load->library('session');
		$utilisateur=$this->input->post('nom');
		$mdp=$this->input->post('mdp');
		if($utilisateur=='Utilisateur'&&$mdp=='1234'){
			$this->session->set_userdata('utilisateur', $utilisateur);
			redirect(site_url('welcome/accueil'));
		}
		else{
			redirect(site_url('welcome'));
		}
	}
}
