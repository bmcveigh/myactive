<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {
	/**
	 * This is the constructor for the Install controller. The purpose of
	 * the constructor for each controller is to only load the helpers and
	 * views necessary for enhanced performance.
	 */
	public function __construct()
	{
		// Call the parent constructor as required for this to work.
		parent::__construct();

		// Load Helpers.
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/install
	 *	- or -
	 * 		http://example.com/index.php/install/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/install/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		global $db;

		if (isset($db['default']['database']) && empty($db['default']['database']))
		{
			// Make the installation form.
			$output = form_open('install/process') . PHP_EOL;
			$output .= heading('Database Settings', 3) . br();

			$output .= 'Host: ' . form_input(array('name' => 'host')) . br();
			$output .= 'Database: ' . form_input(array('name' => 'db')) . br();
			$output .= 'DB Username: ' . form_input(array('name' => 'db_un')) . br();
			$output .= 'DB Password: ' . form_input(array('name' => 'db_pw')) . br(2);
			$output .= form_submit('submit', 'Submit');
			$output .= form_close();

			// Load the view.
			$data = array(
				'title' => 'Active Directory Installer',
				'content' => $output,
			);
			$this->load->view('installer', $data);
		}
		else {
			// If we have a database name, we will assume that the database connection
			// exists. Redirect to the main controller.
			header('Location: /' . base_url() . 'login');
			exit;
		}
	}

	public function process()
	{
		// Display submitted data and sanitize user input.
		$output = 'Submitted Data' . br(2);
		$output .= $this->input->post('host', TRUE) . br();
		$output .= $this->input->post('db', TRUE) . br();
		$output .= $this->input->post('db_un', TRUE) . br();
		$output .= $this->input->post('db_pw', TRUE) . br();

		// Load the view.
		$data = array(
			'title' => 'Active Directory Submitted Data',
			'content' => $output,
		);
		$this->load->view('installer', $data);

		$myfile = fopen(base_url() . 'application/config/database.php', 'w') or die('Unable to open file! Make sure it is writable!');
		$txt = "John Doe\n";
		fwrite($myfile, $txt);
		$txt = "Jane Doe\n";
		fwrite($myfile, $txt);
		fclose($myfile);
	}
}
