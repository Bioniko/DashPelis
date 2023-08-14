<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Series extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}
	public function _example_output($output = null)
	{
		$this->load->view('series.php',(array)$output);
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
			$crud->set_table('series');
			$crud->display_as('ser_descripcion', 'Descripción');
			$crud->display_as('ser_temporadas', 'Temporada');
			$crud->display_as('ser_img', 'Imagen');
			$crud->display_as('ser_nombre', 'Nombre');
			$crud->display_as('ser_tipo', 'Tipo');
			$crud->field_type('ser_tipo','dropdown',array('0' => 'Serie', '1' => 'Pelicula'));
			$crud->columns('ser_nombre','ser_descripcion','ser_tipo');
			$crud->set_subject('Pelicula o Serie');
			$crud->required_fields('city');
			

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
