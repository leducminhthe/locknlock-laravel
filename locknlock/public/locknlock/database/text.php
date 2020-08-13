<?php 

	class Database{
		private $hostname = 'localhost';
		private $username = 'root';
		private $password = '';
		private $database = 'dbquanlybanhang';

		protected $connection;
		protected $result;

		public function connect(){
			if (!isset($this->connection)) {
				$this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);

				if(!$this->connection){
					echo  'kết nối thất bại';
					exit;
				}
			}
			return $this->connection;
		} 

		//thực thi câu lệnh
		public function execute($sql){
			$this->result = $this->connection->query($sql);
			return $this->result;
		}

		//lấy dữ liệu
		public function getData(){
			if ($this->result) {
				$data = mysqli_fetch_array($this->result);
			}else{
				$data = 0;
			}
			return $data;
		}

		//lấy toàn bộ dữ liệu
		public function getAllData(){
			if (!$this->result) {
				$data = 0;
			}else{
				while ($datas = $this->getData()) {
					$data[] = $datas;
				}
			}
			return $data;
		}

		//thêm dữ liệu
		public function insertData($Firstname, $Lastname, $Email){
			$sql = "INSERT INTO user(Firstname, Lastname, Email) VALUES (null, '$Firstname', '$Lastname', '$Email')";
			return $this->execute($sql);
		}

		//updata database
		public function updateData($ID, $Firstname, $Lastname, $Email){
			$sql = "UPDATE user SET Firstname = '$Firstname', Lastname='$Lastname', Email = '$Email' WHERE ID = '$ID'";
			return $this->execute($sql);
		}

		//delete data
		public function deleteData($ID){
			$sql = "DELETE FROM user WHERE ID='$ID'";
			return $this->execute($sql);
		}
	}
		

 ?>