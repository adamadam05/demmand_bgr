<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Captcha extends CI_Controller {
	private $captcha_sess_key = 'BGR_SECURITY_CAPTCHA';

	public function __construct()
	{
		parent::__construct();
	}

	public function generateCaptcha()
	{
		if ($this->input->is_ajax_request()) {
			// load codeigniter captcha helper
			$this->load->helper('captcha');

			$words = array_merge(range('1', '9'), range('A', 'Z'));
			shuffle($words);
			$max_length = 5;
			$words = substr(implode("", $words), 0, $max_length);

			$vals = array(
				'word' => $words,
				'img_path' => FCPATH . './captcha/admin/',
				'img_url' => base_url() . 'captcha/admin/',
				'img_width' => 300,
				'img_height' => 50,
				'expiration' => 7200,
				'font_size' => 24,
				'font_path' => FCPATH . '/captcha/fonts/leadcoat.ttf',
				'colors' => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40),
				),
			);

			// create captcha image
			$cap = create_captcha($vals);
			// print_r($this->load->helper('captcha'));die;
			// store the captcha word in a session
			$this->session->set_userdata($this->captcha_sess_key, $cap['word']);
			echo $cap['image'];
		}
	}

	public function captchaValidate()
	{
		$is_valid = false;
		$words = $this->input->post('captcha_words');
		if ($this->session->userdata($this->captcha_sess_key) == $words) {
			$is_valid = true;
		}

		echo json_encode(array('is_valid' => $is_valid));
	}	
}
