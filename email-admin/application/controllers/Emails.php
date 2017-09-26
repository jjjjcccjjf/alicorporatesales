<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emails extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		# Load all models
		$this->load->model("email_model");
		#Load needed libraries not in autoload
		$this->load->library('pagination');
		# Set include array for header and footer
		$this->include = array();
	}

	public function wrapper($body, $data = NULL)
	{
		if (check_login($this->session))
		{
			$this->load->view('partials/header', $this->include);
			$this->load->view('partials/left-sidebar');
			$this->load->view($body, $data);
			$this->load->view('partials/footer', $this->include);
		}
		else {
			redirect(base_url());
		}
	}

	# DATA Wrapper Functions
	public function Inquiry()
	{
		// # Ready css/js
		// $this->include["responsive_table"] = true;
		// # Set Export links
		// $page_data["csv_export_link"] = base_url("Emails/inquiryExportCSV").concat_existing_get();
		// # Get Pagination
		// $pag_conf['base_url'] = base_url("Emails/Inquiry");
		// $pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		// $pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_inquiry");
		// $pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		// $this->pagination->initialize($pag_conf);
		// $page_data['pagination'] = $this->pagination->create_links();
		// # Set Table name in email_tables
		// $page_data["table_name"] = "inquiry.php";
		// # Set if super admin
		// $page_data['td_colspan'] = 8;
		// # Set link for clearing page
		// $page_data['clear_url'] = "Emails/Inquiry";
		// # Get All Emails for Inquiry
		// $page_data["all_emails"] = $this->email_model->getAllEmails("emails_inquiry");
		$this->Acentives();
		// $this->wrapper("email_management", $page_data);
	}

	public function Arc()
	{
		# Ready css/js
		$this->include["responsive_table"] = true;
		# Set Export links
		$page_data["csv_export_link"] = base_url("Emails/arcExportCSV").concat_existing_get();
		# Get Pagination
		$pag_conf['base_url'] = base_url("Emails/Arc");
		$pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		$pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_arc");
		$pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		$this->pagination->initialize($pag_conf);
		$page_data['pagination'] = $this->pagination->create_links();
		# Set Table name in email_tables
		$page_data["table_name"] = "arc.php";
		# Set if super admin
		$page_data['td_colspan'] = 14;
		# Set link for clearing page
		$page_data['clear_url'] = "Emails/Arc";
		# Get All Emails for Inquiry
		$page_data["all_emails"] = $this->email_model->getAllEmails("emails_arc");
		$this->wrapper("email_management", $page_data);
	}

	public function Acentives()
	{
		# Ready css/js
		$this->include["responsive_table"] = true;
		# Set Export links
		$page_data["csv_export_link"] = base_url("Emails/accentiveExportCSV").concat_existing_get();
		# Get Pagination
		$pag_conf['base_url'] = base_url("Emails/Acentives");
		$pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		$pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_acentives_discount");
		$pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		$this->pagination->initialize($pag_conf);
		$page_data['pagination'] = $this->pagination->create_links();
		# Set Table name in email_tables
		$page_data["table_name"] = "acentives.php";
		# Set if super admin
		$page_data['td_colspan'] = 7;
		# Set link for clearing page
		$page_data['clear_url'] = "Emails/Acentives";
		# Get All Emails for Inquiry
		$page_data["all_emails"] = $this->email_model->getAllEmails("emails_acentives_discount");
		$this->wrapper("email_management", $page_data);
	}

	public function BankNewSeller()
	{
		# Ready css/js
		$this->include["responsive_table"] = true;
		# Set Export links
		$page_data["csv_export_link"] = base_url("Emails/bankNewSellerExportCSV").concat_existing_get();
		# Get Pagination
		$pag_conf['base_url'] = base_url("Emails/BankNewSeller");
		$pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		$pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_bank_inquiry_new_seller");
		$pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		$this->pagination->initialize($pag_conf);
		$page_data['pagination'] = $this->pagination->create_links();
		# Set Table name in email_tables
		$page_data["table_name"] = "bank_new_seller.php";
		# Set if super admin
		$page_data['td_colspan'] = 7;
		# Set link for clearing page
		$page_data['clear_url'] = "Emails/BankNewSeller";
		# Get All Emails for Inquiry
		$page_data["all_emails"] = $this->email_model->getAllEmails("emails_bank_inquiry_new_seller");
		$this->wrapper("email_management", $page_data);
	}

	public function BankExistingSeller()
	{
		# Ready css/js
		$this->include["responsive_table"] = true;
		# Set Export links
		$page_data["csv_export_link"] = base_url("Emails/bankExistingSellerExportCSV").concat_existing_get();
		# Get Pagination
		$pag_conf['base_url'] = base_url("Emails/BankExistingSeller");
		$pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		$pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_bank_inquiry_existing_seller");
		$pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		$this->pagination->initialize($pag_conf);
		$page_data['pagination'] = $this->pagination->create_links();
		# Set Table name in email_tables
		$page_data["table_name"] = "bank_existing_seller.php";
		# Set if super admin
		$page_data['td_colspan'] = 8;
		# Set link for clearing page
		$page_data['clear_url'] = "Emails/BankExistingSeller";
		# Get All Emails for Inquiry
		$page_data["all_emails"] = $this->email_model->getAllEmails("emails_bank_inquiry_existing_seller");
		$this->wrapper("email_management", $page_data);
	}

	public function Referrals()
	{
		# Ready css/js
		$this->include["responsive_table"] = true;
		# Set Export links
		$page_data["csv_export_link"] = base_url("Emails/referralExportCSV").concat_existing_get();
		# Get Pagination
		$pag_conf['base_url'] = base_url("Emails/Referrals");
		$pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		$pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_referrals");
		$pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		$this->pagination->initialize($pag_conf);
		$page_data['pagination'] = $this->pagination->create_links();
		# Set Table name in email_tables
		$page_data["table_name"] = "referrals.php";
		# Set if super admin
		$page_data['td_colspan'] = 7;
		# Set link for clearing page
		$page_data['clear_url'] = "Emails/Referrals";
		# Get All Emails for Inquiry
		$page_data["all_emails"] = $this->email_model->getReferrals();
		$this->wrapper("email_management", $page_data);
	}

	public function Homestarter()
	{
		# Ready css/js
		$this->include["responsive_table"] = true;
		# Set Export links
		$page_data["csv_export_link"] = base_url("Emails/homestarterExportCSV").concat_existing_get();
		# Get Pagination
		$pag_conf['base_url'] = base_url("Emails/Homestarter");
		$pag_conf['reuse_query_string'] = TRUE;	# maintain get varibles if any
		$pag_conf['total_rows'] = $this->email_model->getTotalEmails("emails_homestarter");
		$pag_conf['per_page'] = TABLE_DATA_PER_PAGE;
		$this->pagination->initialize($pag_conf);
		$page_data['pagination'] = $this->pagination->create_links();
		# Set Table name in email_tables
		$page_data["table_name"] = "homestarter.php";
		# Set if super admin
		$page_data['td_colspan'] = 8;
		# Set link for clearing page
		$page_data['clear_url'] = "Emails/Homestarter";
		# Get All Emails for Inquiry
		$page_data["all_emails"] = $this->email_model->getAllEmails("emails_homestarter");
		$this->wrapper("email_management", $page_data);
	}

	public function homestarterExportCSV()
	{
		$column_headers = array("Name", "Email", "Contact Number", "Bank Relationship", "Brand", "Project Name", "Inquiry Date", "Message");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=home_starter_report.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		$export_data = $this->email_model->getAllEmails("emails_homestarter", true);
		foreach ($export_data as $export_arr) {
			$final_row = array(
				$export_arr->name,
				$export_arr->email,
				$export_arr->contact_num,
				$export_arr->bank_relationship != "Others" ? $export_arr->bank_relationship : "Others: ".$export_arr->other_bank_relationship,
				$export_arr->brand,
				$export_arr->project_name,
				$export_arr->date_sent,
				$export_arr->message,
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent))
			);
			fputcsv($fp, $final_row);
		}
	}

	public function accentiveExportCSV()
	{
		# Set Column Headers of CSV
		$column_headers = array("Name", "Email", "Employer", "Brand", "Project Name", "Service Years", "Inquiry Date");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=email_acentive_report.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		# Get All Report Summary
		$export_data = $this->email_model->getAllEmails("emails_acentives_discount", true);
		foreach ($export_data as $export_arr) {
			$final_row = array(
				$export_arr->name,
				$export_arr->email,
				$export_arr->employer,
				$export_arr->brand,
				$export_arr->project_name,
				$export_arr->service_years,
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent))
			);
			fputcsv($fp, $final_row);
		}
	}

	public function bankNewSellerExportCSV()
	{
		# Set Column Headers of CSV
		$column_headers = array("Name", "Email", "Contact Number", "Message", "Bank Referral", "Bank Officer", "Inquiry Date");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=email_bank_new_seller.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		# Get All Emails
		$export_data = $this->email_model->getAllEmails("emails_bank_inquiry_new_seller", true);
		foreach ($export_data as $export_arr) {
			$final_row = array(
				$export_arr->name,
				$export_arr->email,
				$export_arr->contact_num,
				$export_arr->message,
				$export_arr->referral_from != "Other Banks" ? $export_arr->referral_from : "Other Bank: ".$export_arr->other_referral,
				$export_arr->bank_officer,
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent))
			);
			fputcsv($fp, $final_row);
		}
	}

	public function bankExistingSellerExportCSV()
	{
		# Set Column Headers of CSV
		$column_headers = array("Name", "Email", "Contact Number", "Message", "Bank Referral", "Bank Officer", "Inquiry Date");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=email_bank_existing_seller.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		# Get All Emails
		$export_data = $this->email_model->getAllEmails("emails_bank_inquiry_existing_seller", true);
		foreach ($export_data as $export_arr) {
			$final_row = array(
				$export_arr->name,
				$export_arr->email,
				$export_arr->contact_num,
				$export_arr->message,
				$export_arr->brand,
				$export_arr->project_name,
				$export_arr->seller_name,
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent))
			);
			fputcsv($fp, $final_row);
		}
	}

	public function inquiryExportCSV()
	{
		# Set Column Headers of CSV
		$column_headers = array("Name", "Email", "Employer", "Mobile", "Phone", "Message", "Send More", "Inquiry Date");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=email_inquiry_report.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		# Get All Store Summary
		$export_data = $this->email_model->getAllEmails("emails_inquiry", true);
		foreach ($export_data as $export_arr) {
			$final_row = array(
				$export_arr->name,
				$export_arr->email,
				$export_arr->employer,
				$export_arr->mobile,
				$export_arr->phone,
				$export_arr->message,
				$export_arr->send_me_more == 1 ? "Yes" : "No",
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent))
			);
			fputcsv($fp, $final_row);
		}
	}

	public function arcExportCSV()
	{
		# Set Column Headers of CSV
		$column_headers = array("Name", "Brand", "Project Name", "Email", "Inquiry Date", "Mobile Number", "Unit Number", "Street Name", "Subdivision", "Province", "City", "Birthday (YYYY-MM-DD)", "Year Purchased", "Price");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=arc_inquiry_report.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		# Get All Store Summary
		$export_data = $this->email_model->getAllEmails("emails_arc", true);
		foreach ($export_data as $export_arr) {
			$middle_name = $export_arr->middle_name != "" ? " ".$export_arr->middle_name." " : " ";
			$final_row = array(
				$export_arr->first_name.$middle_name.$export_arr->last_name,
				$export_arr->brand,
				$export_arr->project_name,
				$export_arr->email,
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent)),
				$export_arr->mobile,
				$export_arr->house_num != "" ? $export_arr->house_num : "N/A",
				$export_arr->street_name != "" ? $export_arr->street_name : "N/A",
				$export_arr->subdivision != "" ? $export_arr->subdivision : "N/A",
				$export_arr->province != "" ? $export_arr->province : "N/A",
				$export_arr->city != "" ? $export_arr->city : "N/A",
				$export_arr->birthday != "" ? $export_arr->birthday : "N/A",
				$export_arr->year_purchased != "" ? $export_arr->year_purchased : "N/A",
				$export_arr->price
			);
			fputcsv($fp, $final_row);
		}
	}

	public function referralExportCSV()
	{
		# Set Column Headers of CSV
		$column_headers = array("Referral Name", "Brand", "Project", "Contact", "Email", "Referred By", "Inquiry Date");
		$fp = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=email_referral_report.csv'); # Don't forget to change filename!
		fputcsv($fp, $column_headers);
		# Get All Store Summary
		$export_data = $this->email_model->getReferrals(true);
		foreach ($export_data as $export_arr) {
			$referred_by = "Employer: ".$export_arr->referee[0]->employer."\n";
			$referred_by .= "Name: ".$export_arr->referee[0]->name."\n";
			$referred_by .= "Contact: ".$export_arr->referee[0]->contact."\n";
			$referred_by .= "Email: ".$export_arr->referee[0]->email;
			$final_row = array(
				$export_arr->name,
				$export_arr->brand,
				$export_arr->project,
				$export_arr->contact,
				$export_arr->email,
				$referred_by,
				date("m/d/Y H:i:s", strtotime($export_arr->date_sent))
			);
			fputcsv($fp, $final_row);
		}
	}
}

?>
