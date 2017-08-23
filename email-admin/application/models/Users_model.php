<?php

class Users_model extends CI_model
{
	public function __construct()
	{
		# ...
	}

	#Login
	public function verifyLogin($post, $admin = 0)
	{
		$this->db->from('users');
		$this->db->where("email = '".$post['email']."'");
		$db_results = $this->db->get();

		if($db_results->num_rows() >= 1)
		{
			$db_data = $db_results->result()[0];
			if($db_data->is_deleted != 1)
			{
				if(password_verify($post['password'], $db_data->password))
				{
					return $db_data;
				}
				else
				{
					return array("error"=>"401");
				}
			}
			else
			{
				return array("error"=>"401");
			}
		}
		else
		{
			return array("error"=>"false");
		}
	}

	#Number of users per type and status
	public function getTotalUsers()
	{
		$this->db->select("u_id");
		$this->db->from("users");
		$this->db->where("is_deleted != 1");
		$db_results = $this->db->get();
		return $db_results->num_rows();
	}

	#All users details per type
	public function getAllUsers()
	{
		$this->db->from("users");
		$this->db->order_by("date_added", "desc");
		// $this->db->where("is_deleted", "0");

		$limit = 0;
		if($this->uri->segment(3) !== FALSE)
		{
			$limit = $this->uri->segment(3);
		}
		$this->db->limit(TABLE_DATA_PER_PAGE, $limit); # number_per_page, start row
		$db_results = $this->db->get();

		if($db_results->num_rows() > 0)
		{
			return $db_results->result();
		}
		else
		{
			return null;
		}

	}

	# POST add user
	public function addUser($post)
	{
		$this->load->model("ajax_model");
		if(!$this->ajax_model->checkExists($post, "users", "u_id", "email"))
		{
			$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
			unset($post['con_password']);
			if($post['type'] == 0)
			{
				$post['is_super'] = 1;
			}
			if($this->db->insert("users", $post))
			{
				return array("alert_msg" => "Successfully added new User", "alert_color" => "green");
			}
			else
			{
				return array("alert_msg" => "Adding of users failed. Please contact maintenance or try again.", "alert_color" => "red");
			}
		}
		else
		{
			return array("alert_msg" => "Email already exists. Please enter a new valid email.", "alert_color" => "red");
		}
	}

	# POST edit user
	public function editUser($post)
	{
		$this->db->where("u_id", $post['u_id']);
		unset($post["u_id"]); # Prevent Conflict
		unset($post["con_password"]);

		if(isset($post["password"]))
		{
			if($post["password"] != "")
			{
				$post["password"] = password_hash($post["password"], PASSWORD_DEFAULT);
			}
			else
			{
				unset($post["password"]); # Prevent clearing password
			}
		}
		return $this->db->update("users", $post);
	}

	#Specific Account
	public function getAccount($user_id)
	{
		$this->db->from('users');
		$this->db->where('u_id = "'.$user_id.'"');
		$db_results = $this->db->get();
		if($db_results->num_rows() <= 0)
		{
			return null;
		}
		else
		{
			$db_data = $db_results->result()[0];
			return $db_data;
		}
	}
}

?>
