<?php
	session_start();

if ($_SESSION["math_world"]["true_connection"] &&
	$_POST["operation"]
	)
{
	$operation = $_POST["operation"];
	$mysqli = new mysqli("localhost",
						"root",
						"000000",
						"math_world"
						);
	if ($mysqli->connect_errno) 
	{
		echo "Не удалось подключиться к MYSQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error;
	} else 
	{
		$mysqli->set_charset("utf8");
	}



	if ($operation === "get_constant") 
	{
		$question_number = $_POST["question_numbero"];
		$res = $mysqli->query("SELECT * FROM `questions` WHERE `num`=".$question_number.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}

	if ($operation === "get_story") 
	{
		$question_number = $_POST["question_number"];
		$res = $mysqli->query("SELECT * FROM `questions` WHERE `num`=".$question_number.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}

	if ($operation === "get_image_path") 
	{
		$question_number = $_POST["question_number"];
		$res = $mysqli->query("SELECT * FROM `questions` WHERE `num`=".$question_number.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}



}




?>