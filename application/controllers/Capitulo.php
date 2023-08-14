<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capitulo extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}
	public function _example_output($output = null)
	{
		$this->load->view('capitulo.php',(array)$output);
	}
	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function show()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->unset_print();
			$crud->unset_clone();
			$crud->set_theme('flexigrid');
			$crud->set_table('capitulo');
			$crud->display_as('cap_nombre', 'Nombre');
			$crud->display_as('ser_id', 'Nombre Pelicula o Serie');
			$crud->display_as('cap_url', 'URL');
			$crud->display_as('bus_nombre', 'Busqueda');
			$crud->set_relation('ser_id','series','ser_nombre');
			$crud->columns('ser_id', 'bus_nombre', 'tem_id');
			$crud->set_subject('Capitulo');
			$crud->required_fields('city');
			

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
