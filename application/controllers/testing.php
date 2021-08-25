<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {


	public function index()
	{
		$this->load->view('v_index');
	}

	public function profile()
	{
		$this->load->view('v_profile');
	}

	public function general()
	{
		$this->load->view('v_general');
	}

	public function tabel()
	{
		$this->load->view('v_tabel');
	}

	public function chart()
	{
		$this->load->view('v_chart');
	}

	public function general_form()
	{
		$this->load->view('v_general_form');
	}

	public function login()
	{
		$this->load->view('akun/v_login');
	}
	
	public function form(){
		$this->load->view('admin/v_contoh_form');
	}
	
	public function inputPO(){
		$this->load->view('v_inputpo');
	}

	// public function register()
	// {
	// 	$this->load->view('akun/v_register');
	// }

	
}
