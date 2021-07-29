<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'file'));
		$this->load->model('Model');
		$this->load->library('session');
	}

	public function register()
	{
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	public function hossignup()
	{
		$res = $this->Model->hossignup();
		if(!empty($res))
		{
			redirect('Welcome/login');
		}
		else
		{
			$this->session->set_flashdata('msg', 'All fields are mandatory!');
			redirect('Welcome/register');
		}
	}

	public function recsignup()
	{
		$res = $this->Model->recsignup();
		if(!empty($res))
		{
			redirect('Welcome/login');
		}
		else
		{
			$this->session->set_flashdata('msg', 'All fields are mandatory!');
			redirect('Welcome/register');
		}
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function signin()
	{
		$res = $this->Model->signin();
		if($res == '0')
		{
			$this->session->set_flashdata('msg', 'All fields are mandatory!');
			redirect('Welcome/login');
		}
		if($res == '2')
		{
			$this->session->set_flashdata('msg', 'Enter valid E-Mail!');
			redirect('Welcome/login');
		}
		if($res == '3')
		{
			$this->session->set_flashdata('msg', 'Enter valid E-Mail or Password!');
			redirect('Welcome/login');
		}
		else
		{
			$_SESSION['uid'] = $res['uid'];
			$_SESSION['roleid'] = $res['roleid'];
			redirect('Welcome/profile');
		}
	}

	public function profile()
	{
		$uid = $_SESSION['uid'];
		$roleid = $_SESSION['roleid'];
		$data['result'] = $this->Model->get_profile($uid);

		$this->load->view('header');
		if($roleid == '1')
		{
			$this->load->view('hosheader');
		}
		elseif($roleid == '2')
		{
			$this->load->view('recheader');
		}

		$data['roleid'] = $roleid;
		$this->load->view('profile', $data);
		$this->load->view('footer');
	}

	public function editprofileform()
	{
		$uid = $_SESSION['uid'];
		$roleid = $_SESSION['roleid'];
		$data['result'] = $this->Model->get_profile($uid);

		$this->load->view('header');
		if($roleid == '1')
		{
			$this->load->view('hosheader');
		}
		elseif($roleid == '2')
		{
			$this->load->view('recheader');
		}

		$data['roleid'] = $roleid;
		$this->load->view('editprofile', $data);
		$this->load->view('footer');
	}

	public function editprofile()
	{
		$uid = $_SESSION['uid'];
		$res = $this->Model->editprofile($uid);

		if(!empty($res))
		{
			redirect('Welcome/profile');
		}
		else
		{
			$this->session->set_flashdata('msg', 'All fields are mandatory!');
			redirect('Welcome/editprofileform');
		}
	}

	public function addbloodform()
	{
		$this->load->view('header');
		$this->load->view('hosheader');
		$this->load->view('addbloodinfo');
		$this->load->view('footer');
	}

	public function addblood()
	{
		$uid = $_SESSION['uid'];
		$res = $this->Model->addblood($uid);

		if(!empty($res))
		{
			redirect('Welcome/viewbloodform');
		}
		else
		{
			$this->session->set_flashdata('msg', 'Blood Adding Error!');
			redirect('Welcome/addbloodform');
		}
	}

	public function viewbloodform()
	{
		$uid = $_SESSION['uid'];
		$data['result'] = $this->Model->viewbloodform($uid);

		$this->load->view('header');
		$this->load->view('hosheader');
		$this->load->view('viewbloodinfo', $data);
		$this->load->view('footer');
	}

	public function viewrequestsform()
	{
		$uid = $_SESSION['uid'];
		$data['result'] = $this->Model->viewrequestsform($uid);

		$this->load->view('header');
		$this->load->view('hosheader');
		$this->load->view('viewrequests', $data);
		$this->load->view('footer');
	}

	public function bloodrequestform($bid)
	{
		$data['result'] = $this->Model->bloodrequestform($bid);

		$this->load->view('header');
		$this->load->view('recheader');
		$this->load->view('recbloodrequest', $data);
		$this->load->view('footer');
	}

	public function bloodrequest($bid)
	{
		$uid = $_SESSION['uid'];
		$res = $this->Model->bloodrequest($uid, $bid);

		if(!empty($res))
		{
			redirect('Welcome/recrequestsform');
		}
		else
		{
			$this->session->set_flashdata('msg', 'Please enter the quantity!');
			redirect('Welcome/bloodrequestform/'.$bid);
		}
	}

	public function index()
	{
		if(!isset($_SESSION['uid']))
		{
			$data['result'] = $this->Model->index();
		}
		else
		{
			$data['roleid'] = $_SESSION['roleid'];
			$data['result'] = $this->Model->index();
		}

		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function recrequestsform()
	{
		$uid = $_SESSION['uid'];
		$data['result'] = $this->Model->recrequests($uid);

		$this->load->view('header');
		$this->load->view('recheader');
		$this->load->view('recrequests', $data);
		$this->load->view('footer');
	}

	public function hastatus($rid)
	{
		$res = $this->Model->hastatus($rid);

		if(!empty($res))
		{
			redirect('Welcome/viewrequestsform');
		}
	}

	public function hdstatus($rid)
	{
		$res = $this->Model->hdstatus($rid);

		if(!empty($res))
		{
			redirect('Welcome/viewrequestsform');
		}
	}

	public function delbloodinfo()
	{
		$arr = $this->input->post('bloodid');
		if(!empty($arr))
		{
			foreach($arr as $bid)
			{
				$res = $this->Model->delbloodinfo($bid);
			}

			if(!empty($res))
			{
				redirect('Welcome/viewbloodform');
			}
		}
		else
		{
			$this->session->set_flashdata('msg', 'Please select any information to remove!');
			redirect('Welcome/viewbloodform');
		}
	}

	public function recrdel()
	{
		$arr = $this->input->post('recrid');
		if(!empty($arr))
		{
			foreach($arr as $rid)
			{
				$res = $this->Model->recrdel($rid);
			}

			if(!empty($res))
			{
				redirect('Welcome/recrequestsform');
			}
		}
		else
		{
			$this->session->set_flashdata('msg', 'Please select any request to remove!');
			redirect('Welcome/recrequestsform');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome/index');
	}
}
