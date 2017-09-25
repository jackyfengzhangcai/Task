<?php
/**
 * @上传文件
 * @authors Jacky Feng (499042532@qq.com)
 * @date 2017-09-22 14:27:35
 */
class Upload {
	var $path;
	var $allow_type;
	var $result;
	
	/**
	 * @construct
	 * @path 上传路径(string)
	 * @allow_type 允许上传的文件类型(array)
	 */
	function __construct($path, $allow_type) {
		$this->path = $path;
		$this->allow_type = $allow_type;
		if (! is_dir ( $path )) {
			mkdir ( $path );
		}
	}
	/**
	 * @单文件上传
	 * @file 上传的文件(file)
	 */
	public function uploadFile($file) {
		$name = $file ["name"];
		$tmp_name = $file ["tmp_name"];
		$type = $file ["type"];
		if (! in_array ( $type, $this->allow_type )) {
			$result ["error"] = true;
			$result ["type_error"] = "Your files have others type can not be relanize";
			return $result;
		}
		if (! move_uploaded_file ( $tmp_name, $this->path . $name )) {
			$result ["error"] = true;
			$result ["upload_error"] = "Upload unknown error";
			return $result;
		}
		$result ["error"] = false;
		$result ["data"] = "Upload successfully";
		return $result;
	}
	/**
	 * @多文件上传
	 * @file 上传的文件(file)
	 */
	public function uploadFiles($file) {
		for($i = 0; $i < count ( $file ["error"] ); $i ++) {
			$name = $file ["name"] [$i];
			$tmp_name = $file ["tmp_name"] [$i];
			$type = $file ["type"] [$i];
			if (! in_array ( $type, $this->allow_type )) {
				$result ["error"] = true;
				$result ["type_error"] = "Your files have others type can not be relanize";
				return $result;
			}
			if (! move_uploaded_file ( $tmp_name, $this->path . $name )) {
				$result ["error"] = true;
				$result ["upload_error"] = "Upload unknown error";
				return $result;
			}
		}
		$result ["error"] = false;
		$result ["data"] = "Upload successfully";
		return $result;
	}
}
class DB {
	var $conn;
	var $db_host;
	var $db_name;
	var $db_user;
	var $db_pass;
	var $db_charset;
	function __construct($db_array) {
		$this->db_host = $db_array ["db_host"];
		$this->db_name = $db_array ["db_name"];
		$this->db_user = $db_array ["db_user"];
		$this->db_pass = $db_array ["db_pass"];
		$this->db_charset = $db_array ["db_charset"];
	}
	public function connect() {
		$this->conn = mysqli_connect ( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		mysqli_set_charset ( $this->conn, $this->db_charset );
		if ($this->conn) {
			return array (
					"error" => false,
					"data" => $this->conn 
			);
		} else {
			return array (
					"error" => true,
					"data" => mysqli_connect_error () 
			);
		}
	}
	public function close() {
		mysqli_close ( $this->conn );
	}
	public function get($sql) {
		$this->connect ();
		$result = mysqli_query ( $this->conn, $sql );
		if ($result) {
			$reslutArray = [];
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				$reslutArray [] = $row;
			}
			$this->close ();
			return array (
					"error" => false,
					"data" => $reslutArray 
			);
		} else {
			$this->close ();
			return array (
					"error" => true,
					"data" => mysqli_error ( $this->conn ) 
			);
		}
	}
	public function set($sql) {
		$this->connect ();
		$reslut = mysqli_query ( $this->conn, $sql );
		if ($reslut) {
			$this->close ();
			return array (
					"error" => false,
					"data" => $reslut 
			);
		} else {
			$this->close ();
			return array (
					"error" => true,
					"data" => mysqli_error ( $this->conn ) 
			);
		}
	}
	public function insert($sql) {
		$this->connect ();
		$reslut = mysqli_query ( $this->conn, $sql );
		if ($reslut) {
			$this->close ();
			return array (
					"error" => false,
					"data" => $reslut 
			);
		} else {
			$this->close ();
			return array (
					"error" => true,
					"data" => mysqli_error ( $this->conn ) 
			);
		}
	}
}
class Http {
	function get($url) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
	function post($url, $data) {
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
}