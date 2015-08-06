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
			array(form_input(array(
				'name'  => 'un',
				'class' => 'form-control',
				'placeholder' => 'Username',
			))),
			array(form_input(array(
				'name'  => 'pw',
				'class' => 'form-control',
				'placeholder' => 'Password',
			))),
			array(form_submit(array(
				'name'  => 'submit',
				'value' => 'Login',
				'class' => 'btn btn-primary',
			))),
		);

		// Set the template for the table to be a bootstrap table.
		$this->table->set_template(
			array(
				'table_open' => '<table class="table">',
			)
		);

		$this->table->set_heading(array('MyActive Login'));

		// Display submitted data and sanitize user input.
		$output = form_open(base_url() . 'index.php/user');
		$output .= '<div align="center" class="jumbotron">' . $this->table->generate($data) . '</div>';
		$output .= form_close();

		// Load the view.
		$data = array(
			'title' => 'Active Directory Submitted Data',
			'css_path' => 'themes/user/css/login.css',
			'content' => $output,
		);
		$this->load->view('template', $data);
	}
}
