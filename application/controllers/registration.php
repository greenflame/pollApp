<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {
	public function index()
	{
		$this->load->database();
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('login', 'Логин', 'trim|required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('password', 'Пароль', 'trim|required|min_length[6]|max_length[32]|md5');
		$this->form_validation->set_rules('passconf', 'Повтор пароля', 'trim|required|min_length[6]|max_length[32]|md5');
	
		$data = array();
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('top');
			$this->load->view('blog_registration');
			$this->load->view('footer');
			if(isset($_POST['submit']))
			{
				if( ( (isset($_POST['input_login'])) && (isset($_POST['input_password'])) && (isset($_POST['repeat_password'])) )  && ( ($_POST['input_login'] != null) && ($_POST['input_password'] != null) && $_POST['repeat_password'] != null) && ($_POST['input_password'] == $_POST['repeat_password']))
				{
					$query = $this->db->get('users');
					$data['login'] = $_POST['input_login'];
					$password = isset($_POST['input_password']);
					$data['password_hash'] = md5($password);
					$bool = true;
					if ($query->num_rows() > 0)
					{
						
						foreach ($query->result() as $row)
						{
							$login = $row->login;
							echo 'Занятый ' . $login . ' Введённый ' . $data['login'];
							if($data['login'] == $login)
								$bool = false;
						};
						if($bool)
						{
							$query = $this->db->insert('users', $data);
							echo '<div id="successful_registration">Вы удачно зарегистрировались. Перейдите <a href="home">на Главную</a>, чтобы осуществить вход на сайт.</div>';
						}
						else
							echo 'Этот логин уже занят.';
					}
				}
				
			}	
		}	
	}
}