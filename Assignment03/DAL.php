<?php

ini_set('display_errors', 'On');

class DAL {
	private $connection;
	private $db;
	private $collection;
	public function __construct($dbnm) {
		try {
			$this->connection = new Mongo();
			$this->db = $this->connection->$dbnm;
		} catch (MongoConnectionException $mce) {
			echo $mce->getTraceAsString();
		}
	}
	public function getConnection() {
		return $this->connection;
	}
	public function getDb() {
		return $this->db;
	}
	public function setDb($db) {
		$this->db = $db;
	}
	public function getCollection() {
		return $this->collection;
	}
	public function setCollection($collection) {
		$this->collection = $this->db->$collection;
	}
	//saves thing
	function save_object($obj) {
		//$obj = $this->prepare_array();
		$this->collection->insert($obj);
	}
	public function insertRecord($record) {
		try {
			$this->collection->save($record, array("options" => "safe"));
		} catch (MongoCursorException $mce) {
			echo $mce->getTraceAsString() . "<br>";
		}
		catch (MongoCursorTimeoutException $mcte) {
			echo $mcte->getTraceAsString() . "<br>";
		}
	}
	public function find_object($_key) {
		try {
			$i = 0;
			$cursor = $this->collection->find($_key);
			echo "<table border='1'>";
			while ($cursor->hasNext()) {
				echo "<tr>";
				if ($i == 0) {
					$temp = $cursor->getNext();
					$cursor->reset();
					foreach ($temp as $key => $value) {
						echo "<td>" . $key . "</td>";
					}
					echo "</tr>";
					$i++;
				}
				foreach ($cursor->getNext() as $key => $value) {
					echo "<td>" . $value . "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} catch (MongoCursorTimeoutException $mcte) {
			echo $mcte->getTraceAsString() . "<br>";
		} catch (MongoConnectionException $mce) {
			echo $mce->getTraceAsString() . "<br>";
		}
	}
	public function update_object($_key, $_newValue) {
		try {
			$this->collection->update($_key, array('$set' => $_newValue), array("safe" => "true", "multiple" => true));
		} catch (MongoCursorException $mce) {
			echo $mce . getTraceAsString() . "<br>";
		} catch (MongoCursorTimeoutException $mcte) {
			echo $mcte . getTraceAsString() . "<br>";
		}
	}

	function find_object_by_id($collection, $id) {
		$obj = $collection->findOne(array('_id' => new MongoId($id)));
		return $obj;
	}

}
	
