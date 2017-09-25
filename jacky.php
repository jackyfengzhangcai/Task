<?php
//上传文件
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
//数据库操作
class DB {
	var $db_host="39.108.113.33:3306";//数据库地址
	var $db_user="root";//数据库用户
	var $db_pass="8751240";//数据库密码
	var $db_name="task";//数据库名
	var $db_charset="utf8";//数据库编码
	var $conn;//数据库连接对象
	//连接数据库
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
	//关闭数据库
	public function close() {
		mysqli_close ( $this->conn );
	}
	//查询数据库
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
	//更新数据库
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
	//插入数据库
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
//模拟访问页面
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
