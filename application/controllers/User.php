<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	/**
	 * This is the constructor for the User controller. The purpose of
	 * the constructor for each controller is to include functionality for login,
	 * password reset, and user registration pages if applicable.
	 */
	public function __construct()
	{
		// Call the parent constructor as required for this to work.
		parent::__construct();

		// Load Helpers.
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');

		// Load libraries.
		$this->load->library('table');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/user
	 *	- or -
	 * 		http://example.com/index.php/user/index
	 *	- or -
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			array('Username', form_input()),
			array('Password', form_input()),
			array('', form_submit('submit', 'Login!')),
		);

		// Display submitted data and sanitize user input.
		$output = $this->table->generate($data);

		// Load the view.
		$data = array(
			'title' => 'Active Directory Submitted Data',
			'css_path' => 'themes/user/css/login.css',
			'content' => $output,
		);
		$this->load->view('template', $data);
	}
}