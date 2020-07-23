<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		//$this-> load->model("codigospostalesModel");

	}
	
	public function index()
	{
		//$datos=array();
		$this-> load->model("CodigosPostalesModel");
		//$result = $this ->db ->get('codigos_espana');
		$provincia = $this -> CodigosPostalesModel -> get_DistinctCodigos();
		$poblacion = $this -> CodigosPostalesModel -> get_DistinctPoblacion();

		$info = @file_get_contents('https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/PostesMaritimos/');
		$items = json_decode($info, true);
		$count = count($items["ListaEESSPrecio"]);

		for ($i=0; $i < $count; $i++) { 
			
			if ($items["ListaEESSPrecio"][$i]["Localidad"]=="ALICANTE/ALACANT"){
			
			$datos[] = $items["ListaEESSPrecio"][$i];

			}

		}

		$data = array('provincia'=>$provincia, 'poblacion'=>$poblacion, 'datos'=>$datos);
		$this->load->view('inicio',$data);
	}

	public function searchGas()
	{
		return true;
	}
}
