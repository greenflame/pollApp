<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->library('session');
		$this->load->database();
		$data = array();
		$data['is_authorized'] = false;
		$data['registration'] = false;
		$data['login'] = false;
		
		
		if(isset($_POST['button_logout'])) 
		{
			$this->session->unset_userdata(array ('id' => ''));
			$this->session->unset_userdata(array ('login' => ''));
			$data['is_authorized'] = false;
		}
		else
		{
			if(isset($_POST['button_login']))
			{
				if( ( (isset($_POST['input_login'])) && (isset($_POST['input_password'])) )  && ( ($_POST['input_login'] != null) && ($_POST['input_password'] != null)) )
				{
					$data['login'] = $_POST['input_login'];
					$data['password'] = $_POST['input_password'];
					$sql = "SELECT * FROM users WHERE login = ?"; 
					$query = $this->db->query( $sql, array($data['login']) );
					if ($query->num_rows() > 0)
					{
						$sql = "SELECT * FROM users WHERE password_hash = ?"; 
						$query = $this->db->query( $sql, array(md5($data['password'])) );
						if ($query->num_rows() > 0)
						{
							$data['is_authorized'] = true;
							echo 'Вход выполнен!';
						}
					}
				}
				else
					$data['error_authorization'] = '<div id="error_authorization"> Для входа заполните все поля</div>';
			}
		}
		$data['blog_authorization']	= $this->load->view('blog_authorization', $data, true);
		$data['blog_logout']		= $this->load->view('blog_logout', $data, true);
		$data['blog_registered_users']	= $this->load->view('blog_registered_users', $data, true);
		
		$this->load->view('top');
		$this->load->view('home_viewer', $data);
		$this->load->view('footer');
	}
}
?>