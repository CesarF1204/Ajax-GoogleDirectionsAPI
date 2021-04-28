<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directions extends CI_Controller {

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
	public function index() {
		$this->load->view('directions/index.php');
	}
	public function direction() {
		$html = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($this->input->post('from_location'))."&destination=".urlencode($this->input->post('to_location'))."&key=AIzaSyBdiiLOLuGrTnaz1wt_jBPeXfq12RWCtV8");
		$data = json_decode($html);
		$directions['directions'] = $data->routes[0]->legs[0]->steps;
		$this->load->view('partials/index.php', $directions);
	}
}
