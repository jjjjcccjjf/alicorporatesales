<?php

/*

Name: Jp Library

Version: 4.2

Author: John Patrick S. Ang

Description: A PHP Database and File Upload utility library.

Site: http://murakami-night.blogspot.com/

*/

function jp_curl($url, $type, $headers, $data = NULL){

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);



	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);



	if($type != "GET" || $type != "POST")

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);

	elseif($type == "POST")

		curl_setopt($ch, CURLOPT_POST, true);



	if(!is_null())

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);



	$result = curl_exec($ch);

	curl_close($ch);



	return $result;



}



function jp_create_data($data, $type){

	$data_string = "";



	foreach($data as $datum)

		if(empty($data_string)){

			if($type == "field")

				$data_string .= $datum;

			elseif($type == "value")

				$data_string .= "'".addslashes($datum)."'";

		}else{

			if($type == "field")

				$data_string .= ", ".$datum;

			elseif($type == "value")

				$data_string .= ", '".addslashes($datum)."'";

		}

	return $data_string;

}



function jp_upload($image_data, $type, $path, $index = NULL){

	if(!empty($index))

		$extension = explode(".", $image_data["name"][$index]);

	else

		$extension = explode(".", $image_data["name"]);

	$extension = end($extension);

	$extension = strtolower($extension);



	if(!file_exists($path))

		mkdir($path, 0777, true);



	$filename = "$type".time().".".$extension;



	$filepath = "$path/".$filename;



	if(!empty($index))

		$file_uploaded = move_uploaded_file($image_data["tmp_name"][$index], $filepath);

	else

		$file_uploaded = move_uploaded_file($image_data["tmp_name"], $filepath);



	if($file_uploaded)

		return $filename;

	else

		return false;

}



function jp_pagination($current_page, $total_pages, $pagination_count){

	$split = ceil($pagination_count/2);



	$pagination = array();



	if($total_pages <= $pagination_count)

		for($i=1; $i<=$total_pages; $i++)

			$pagination[] = $i;

	elseif($current_page <= $split)

		for($i=1; $i<=$pagination_count; $i++)

			$pagination[] = $i;

	elseif($current_page >= $total_pages-($split-1))

		for($i=$total_pages-($pagination_count-1); $i<=$total_pages; $i++)

			$pagination[] = $i;

	else

		for($i=$current_page-($split-1); $i<=$current_page+($split-1); $i++)

			$pagination[] = $i;



	return $pagination;

}



function jp_add($data){

	return $GLOBALS['con']->jp_add($data);

}



function jp_last_added(){

	return $GLOBALS['con']->jp_last_added();

}



function jp_get($data){

	return $GLOBALS['con']->jp_get($data);

}



function jp_delete($data){

	return $GLOBALS['con']->jp_delete($data);

}



function jp_count($data){

	return $GLOBALS['con']->jp_count($data);

}



function jp_update($data){

	return $GLOBALS['con']->jp_update($data);

}



function jp_query($query){

	return $GLOBALS['con']->con->query($query);

}



function jp_union($data){

	return $GLOBALS['con']->jp_union($data);

}



function jp_debug(){

	echo $GLOBALS['con']->qString;

}



class jp_controller{

	public $con;

	public $qString;

	protected $db;

	protected $class_table;



	function __construct($host, $user, $pass, $database, $table = NULL) {

        $this->db = $database;

		$this->con = new mysqli($host, $user, $pass, $database);

		$this->class_table = $table;

    }



	public function jp_add($params){

		if(empty($this->class_table))

			$table = $params['table'];

		else

			$table = $this->class_table;



		$data = $params['data'];



		$columns = $this->jp_show_column($table);

		$table_fields = array();



		while($row = mysqli_fetch_assoc($columns))

			$table_fields[] = $row['COLUMN_NAME'];



		foreach(array_keys($data) as $table_field)

			if(!in_array($table_field, $table_fields, true))

				unset($data[$table_field]);



		$fields = jp_create_data(array_keys($data),'field');

		$values = jp_create_data($data,'value');



		$query = "INSERT INTO $table ($fields) VALUES ($values)";



		$this->qString = $query;



		if($this->con->query($query))

			return true;

		else

			return false;

	}



	protected function jp_show_column($table){

		$result = $this->con->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$this->db."' AND TABLE_NAME = '$table';");

		return $result;

	}



	protected function jp_get_primary($table){

		$result = $this->con->query("SELECT k.column_name FROM information_schema.table_constraints t JOIN information_schema.key_column_usage k USING(constraint_name,table_schema,table_name) WHERE t.constraint_type='PRIMARY KEY' AND t.table_schema='".$this->db."' AND t.table_name='$table'");

		$field = mysqli_fetch_array($result);

		if(!empty($field['column_name']))

			return $field['column_name'];

		else

			return "*";

	}



	public function jp_last_added(){

		return $this->con->insert_id;

	}



	public function jp_count($params){

		if(empty($this->class_table))

			$table = $params['table'];

		else

			$table = $this->class_table;



		if(isset($params['select']))

			$field = $params['select'];

		else

			$field = $this->jp_get_primary($table);



		if(isset($params['where']))

			$where = $params['where'];



		if(isset($params['filters']))

			$filters = $params['filters'];

		else

			$filters = "";



		if(!isset($where))

			$query = "SELECT COUNT($field) FROM $table $filters";

		else

			$query = "SELECT COUNT($field) FROM $table WHERE $where $filters";


		//echo $query;
		$this->qString = $query;



		$result = $this->con->query($query);



		if(!empty($result)){

			$count_row = mysqli_fetch_assoc($result);

			return $count_row['COUNT('.$field.')'];

		}else

			return 0;



	}



	public function jp_get($params){

		if(isset($params['select']))

			$select = $params['select'];

		else

			$select = "*";



		if(empty($this->class_table))

			$table = $params['table'];

		else

			$table = $this->class_table;



		if(isset($params['where']))

			$where = $params['where'];



		if(isset($params['filters']))

			$filters = $params['filters'];

		else

			$filters = "";



		if(!isset($where))

			$query = "SELECT $select FROM $table $filters";

		else

			$query = "SELECT $select FROM $table WHERE $where $filters";


		//echo $query;
		$this->qString = $query;



		$result = $this->con->query($query);



		return $result;



	}



	public function jp_delete($params){

		if(empty($this->class_table))

			$table = $params['table'];

		else

			$table = $this->class_table;



		if(isset($params['where']))

			$where = $params['where'];

		else

			$where = "";



		$query = "DELETE FROM $table WHERE $where";

		$this->qString = $query;



		if(!empty($where) && $this->con->query($query))

			return true;

		else

			return false;

	}



	public function jp_union($params){

		$queries = $params['queries'];



		if(isset($params['filters']))

			$filters = $params['filters'];

		else

			$filters = "";



		if(isset($params['all']))

			$all = "ALL";

		else

			$all = "";



		if(count($queries) < 2)

			return false;

		else{

			$query = "";

			foreach($queries as $query_string)

				if($query == "")

					$query .= $query_string;

				else

					$query .= " UNION ".$all." ".$query_string;



			$query .= " ".$filters;



			$this->qString = $query;



			$result = $this->con->query($query);

			return $result;



		}

	}



	public function jp_update($params){

		if(empty($this->class_table))

			$table = $params['table'];

		else

			$table = $this->class_table;



		$data = $params['data'];



		if(isset($params['where']))

			$where = $params['where'];

		else

			$where = "";





		$columns = $this->jp_show_column($table);

		$table_fields = array();



		while($row = mysqli_fetch_assoc($columns))

			$table_fields[] = $row['COLUMN_NAME'];



		foreach(array_keys($data) as $table_field)

			if(!in_array($table_field, $table_fields, true))

				unset($data[$table_field]);



		$data_string = "";



		foreach(array_keys($data) as $datum)

			if(empty($data_string))

				$data_string .= $datum." = '".addslashes($data[$datum])."'";

			else

				$data_string .= ", ".$datum." = '".addslashes($data[$datum])."'";



		$query = "UPDATE $table SET $data_string WHERE $where";

		$this->qString = $query;



		if(!empty($where) && $this->con->query($query))

			return true;

		else

			return false;

	}

}



include('lib-connect.php');

?>
