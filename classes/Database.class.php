<?php

class Database
{
    protected $__connect;
    protected $__table;
    protected $__query;
    protected $__result;

    public function __construct($host, $user, $pass, $db_name) {
        $link = mysqli_connect($host, $user, $pass, $db_name);
        if (!$link) {
            die('Fail to connect: ' . myqsli_errno() . ' ' . mysqli_connect_error());
        } else {
            mysqli_set_charset($link, 'utf8');
            $this->__connect = $link;
        }
    }

    public function single_record($sql) {
        $this->__query = $this->query($sql);
        $result = mysqli_fetch_assoc($this->__query);
        mysqli_free_result($this->__query);
        return $result;
    }

    public function list_record($sql) {
        $list = array();
        $this->__query = $this->query($sql);

        if (mysqli_num_rows($this->__query) > 0) {
            while ($row = mysqli_fetch_assoc($this->__query)) {
                $list[] = $row;
            }
            mysqli_free_result($this->__query);
        }
        return $list;
    }

    public function is_exist($sql) {
        $this->__query = $this->query($sql);
        if (mysqli_num_rows($this->__query) > 0) {
            return true;
        }
        return false;
    }

    public function affected_rows() {
        return mysqli_affected_rows($this->__connect);
    }

	public function table($name) {
        $this->__table = $name;
        return $this;
	}

    public function create($data) {
        $fields = implode(',', array_keys($data));
        $valueStr = implode(',', array_fill(0, count($data), '?'));
        $values = array_values($data);

        $sql = "INSERT INTO $this->__table($fields) VALUES ($valueStr)";
        $statement = $this->__connect->prepare($sql);
        $statement->bind_param(str_repeat('s', count($data)), ...$values);
        $statement->execute();

        return $statement->affected_rows;
    }

    public function update($data) {
    	$update = implode(', ', array_map(
		    function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
		    $data,
		    array_keys($data)
		));
		// cách 2
		// str_replace('=', ':', http_build_query($array, null, ','));
        $sql = "UPDATE $this->__table SET $update WHERE `id`={$this->__result['id']}";
        $this->query($sql);
        if ($this->__query) {
        	return true;
        }
        return false;
    }

    public function get() {
        $sql = "SELECT * FROM $this->__table";
        $this->query($sql);
        $list = array();
        if (mysqli_num_rows($this->__query)) {
            while ($row = mysqli_fetch_assoc($this->__query)) {
                $list[] = $row;
            }
            mysqli_free_result($this->__query);
        }
        return $list;
    }

    public function where(...$data) {
		$col = $data[0];
    	$condition = '=';
    	if (count($data) === 2) {
    		$value = $data[1];
    	} elseif (count($data) === 3) {
    		$value = $data[2];
    		$condition = $data[1];
    	} else {
    		die('Query not accepted!');
    	}

        $sql = "SELECT * FROM $this->__table WHERE `$col` $condition $value";
        $this->query($sql);
        if ($this->__result = mysqli_fetch_assoc($this->__query)) {
            return $this;
        } else {
            die('WHERE condition not found!!!');
        }
    }

    public function with($table) {
    	$column = str_replace('s', '_id', $table);
        $sql = "SELECT $this->__table.id, $this->__table.name, $this->__table.address, $this->__table.email, $this->__table.phone, $table.start_at, $table.end_at, $table.price, $this->__table.tour_id FROM `$this->__table` INNER JOIN `$table` ON `$this->__table`.`$column`=`$table`.`id`";

        $this->query($sql);
        $list = array();
        if (mysqli_num_rows($this->__query) > 0) {
            while ($row = mysqli_fetch_assoc($this->__query)) {
                $list[] = $row;
            }
            mysqli_free_result($this->__query);
        }
        return $list;
    }

    public function find($id) {
        $sql = "SELECT * FROM $this->__table WHERE `id`=$id";
        $this->query($sql);
        $row = mysqli_fetch_assoc($this->__query);
        return $row;
    }

    public function query($sql) {
        return $this->__query = mysqli_query($this->__connect, $sql);
    }

    public function delete($id = null) {
    	if (empty($id)) {
    		$sql = "DELETE FROM $this->__table WHERE id={$this->__result['id']}";
    	} else {
	        $sql = "DELETE FROM $this->__table WHERE $row=$id";
    	}
        $this->query($sql);
        if ($this->affected_rows()) {
            return true;
        }
        return false;
    }

    function __destruct() {
        if ($this->__connect) {
            mysqli_close($this->__connect);
        }
    }
}