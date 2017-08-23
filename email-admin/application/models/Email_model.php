<?php

class Email_model extends CI_model
{
	public function __construct()
	{
		# ...
	}

	# CMS

	public function getAllEmails($email_table, $is_reports = false) # $is_reports is when called for exporting data, which outputs no limit
	{
		$this->db->from($email_table);
		$this->db->order_by("date_sent", "desc");

		# Check for filters
		$where_arr = array();
		if(isset($_GET['from']) && $_GET['from'] != "")
		{
			$where_arr[] = "date_sent >= '".date("Y-m-d H:i:s", strtotime($_GET['from']))."'";
		}
		if(isset($_GET['to']) && $_GET['to'] != "")
		{
			$where_arr[] = "date_sent <= '".date("Y-m-d 23:59:59", strtotime($_GET['to']))."'";
		}

		$where = implode(" AND ", $where_arr);
		if($where != "")
		{
			$this->db->where($where);
		}

		if(!$is_reports)
		{
			# Pagination set limit
			$limit = 0;
			if($this->uri->segment(3) !== FALSE)
			{
				$limit = $this->uri->segment(3);
			}
			$this->db->limit(TABLE_DATA_PER_PAGE, $limit); # number_per_page, start row
		}

		$db_emails = $this->db->get();
		if($db_emails->num_rows() > 0)
		{
			return $db_emails->result();
		}
		else
		{
			return false;
		}
	}

	public function getReferrals($is_reports = false)
	{
		$this->db->from("emails_referrals");
		$this->db->order_by("date_sent", "desc");

		# Check for filters
		$where_arr = array();
		if(isset($_GET['from']) && $_GET['from'] != "")
		{
			$where_arr[] = "date_sent >= '".date("Y-m-d H:i:s", strtotime($_GET['from']))."'";
		}
		if(isset($_GET['to']) && $_GET['to'] != "")
		{
			$where_arr[] = "date_sent <= '".date("Y-m-d 23:59:59", strtotime($_GET['to']))."'";
		}

		$where = implode(" AND ", $where_arr);
		if($where != "")
		{
			$this->db->where($where);
		}

		if(!$is_reports)
		{
			# Pagination set limit
			$limit = 0;
			if($this->uri->segment(3) !== FALSE)
			{
				$limit = $this->uri->segment(3);
			}
			$this->db->limit(TABLE_DATA_PER_PAGE, $limit); # number_per_page, start row
		}

		$db_emails = $this->db->get();
		if($db_emails->num_rows() > 0)
		{
			$db_final = array();
			foreach ($db_emails->result() as $email) {
				$email->referee = $this->getReferredBy($email->referred_by);
				$db_final[] = $email;
			}
			return $db_final;
		}
		else
		{
			return false;
		}
	}

	public function getReferredBy($referee_id)
	{
		$this->db->from("emails_referees");
		$this->db->where("id", $referee_id);
		$referee = $this->db->get();
		if($referee->num_rows() > 0)
		{
			return $referee->result();
		}
		else
		{
			return null;
		}
	}

	public function getTotalEmails($email_table)
	{
		$this->db->select("id");
		$this->db->from($email_table);

		# Check for filters
		$where = "";
		$get_var = array(
			"from" => "date_sent >= ",
			"to" => "date_sent <= ",
			"type" => "type = "
		);

		$where_arr = array();
		foreach ($get_var as $get_key => $get_value) {
			if(isset($_GET[$get_key]) && $_GET[$get_key] != "")
			{
				if($get_key == "from" || $get_key == "to")
				{
					$_GET[$get_key] = date("Y-m-d H:i:s", strtotime($_GET[$get_key]));
				}
				$where_arr[] = $get_value."'".$_GET[$get_key]."'";
			}
		}

		$where = implode(" AND ", $where_arr);
		if($where != "")
		{
			$this->db->where($where);
		}

		return $this->db->get()->num_rows();
	}
}

?>
