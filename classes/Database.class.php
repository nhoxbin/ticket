<?php

	/**
	 * database connection
	 */
	class Database
	{
		protected $statement;
		protected $__table;
		protected $__connect;
		protected $__result_query;

	    /**
	     * khởi tạo
	     */
	    public function __construct($host, $user, $pass, $db_name) {
	        $link = mysqli_connect($host, $user, $pass, $db_name);
	        if (!$link) {
				echo 'Fail to connect: ' . myqsli_errno() . ' ' . mysqli_connect_error();
			} else {
				mysqli_set_charset($link, 'utf8');
				$this->__connect = $link;
			}
	    }

	    public function table($tableName) {
			$this->__table = $tableName;
			return $this;
		}

		public function get() {
			$sql = "SELECT * FROM $this->__table";
			$this->__result_query = $this->query($sql);
			$list = array();
			if (mysqli_num_rows($this->__result_query) > 0) {
				while ($row = mysqli_fetch_assoc($this->__result_query)) {
					$list[] = $row;
				}
				mysqli_free_result($this->__result_query);
			}
			return $list;
		}

		public function find($id) {
			$sql = "SELECT * FROM $this->__table WHERE `id`=$id";
			$this->__result_query = $this->query($sql);
			$row = mysqli_fetch_assoc($this->__result_query);
			return $row;
		}

		public function insert($data) {
			$fields = implode(',', array_keys($data));
			$valueStr = implode(',', array_fill(0, count($data), '?'));
			$values = array_values($data);

			$sql = "INSERT INTO $this->__table($fields) VALUES ($valueStr)";
			$this->statement = $this->__connect->prepare($sql);
			$this->statement->bind_param(str_repeat('s', count($data)), ...$values);
			$this->statement->execute();

			return $this->statement->affected_rows;
		}

		// Hàm đếm số hàng
	    public function num_rows($sql = null) {
            $query = $this->query($sql);
            if ($query) {
                $row = mysqli_num_rows($query);
                return $row;
            }       
	    }

	    public function single_record($query) {
			if ($query != null) {
				$this->__result_query = $this->query($query);
				$result = mysqli_fetch_assoc($this->__result_query);
			}
			mysqli_free_result($this->__result_query);
			return $result;
		}

		public function list_record($query) {
			$list = array();
			if ($query != null) {
				$this->__result_query = $this->query($query);

				if (mysqli_num_rows($this->__result_query) > 0) {
					while ($row = mysqli_fetch_assoc($this->__result_query)) {
						$list[] = $row;
					}
					mysqli_free_result($this->__result_query);
				}
			}
			return $list;
		}

		public function is_exist($query) {
			if ($query != null) {
				$this->__result_query = $this->query($query);
			}
			if (mysqli_num_rows($this->__result_query) > 0) {
				return true;
			}
			return false;
		}

		public function affected_rows() {
			return mysqli_affected_rows($this->__connect);
		}

		public function query($query) {
			return $this->__result_query = mysqli_query($this->__connect, $query);
		}

		function __destruct() {
			mysqli_close($this->__connect);
		}
	}