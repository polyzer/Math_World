<?php
	session_start();
if ($_SESSION["vk_simple_math"]["true_connection"] && 
	$_POST["operation"]
   ) 
{
	$operation = $_POST["operation"];

	$mysqli = new mysqli("localhost", //адрес хоста БД
						 "root", // имя пользователя
						 "000000", //пароль
						 "math_world"); //база данных
	
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MYSQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_error;
	} else {
		$mysqli->set_charset("utf8");
	}
	
	
	if ($operation === "get_lesson") {
		$lesson_id = $_POST["lesson_id"];
		$res = $mysqli->query("SELECT * FROM `lessons` WHERE `id`=".$lesson_id.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}
	
	if ($operation === "get_lessons_part") {
		$part_id = $_POST["part_id"];
		$res = $mysqli->query("SELECT * FROM `lessons_parts` WHERE `id`=".$part_id.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}

	if ($operation === "get_lessons_part_unit") {
		$unit_id = $_POST["unit_id"];
		$res = $mysqli->query("SELECT * FROM `lessons_parts_units` WHERE `id`=".$unit_id.";");
		$row = $res->fetch_assoc();
		$return_string = "";
		foreach($row as $key => $value) {
			$return_string .= $key."===".$value."&&&";
		}
		echo $return_string;
	}


	if ($operation === "save_lesson") {
		$title = $_POST["lesson_title"];
		$author_id = $_POST["author_id"];//Сделать преобразование $_POST
		$date = date("Y-m-d");
		$sections_id = $_POST["sections_id"];
		$query_string = "INSERT INTO `lessons` (`id`,
												`title`,
												`author_id`,
												`date`,
												`sections_id`)
							   VALUES (NULL, 
							           '$title',
							           '$author_id',
							           '$date',
							           '$sections_id');";

		if (!($res = $mysqli->query($query_string)))
			echo $mysqli->error;
		else {
			echo "server_answer===Данные сохранены";
		}
	}

	if ($operation === "save_lesson_part") {
		$lesson_id = $_POST["lesson_id"];
		$title = $_POST["part_title"];
		$index = $_POST[];
		$query_string = "INSERT INTO `lessons_parts` (`id`,
													  `title`,
													  `index`,
													  `lesson_id`
													  )
							   VALUES (NULL, 
							           '$title',
							           '$index',
							           '$lesson_id');";

		if (!($res = $mysqli->query($query_string)))
			echo $mysqli->error;
		else {
			echo "server_answer===Данные сохранены";
		}
	}

	if ($operation === "save_lessons_parts_unit") {
		$lesson_id = $_POST["lesson_id"];
		$part_id = $_POST["part_id"];
		$data = $_POST["data"];
		$index = $_POST["index"];
		$description = $_POST["description"];
		$link = $_POST["link"];
		$type = $_POST["type"];
		$query_string = "INSERT INTO `lessons_parts_units` (`id`,
												`data`,
												`description`,
												`link`,
												`index`,
												`type`,
												`part_id`,
												`lesson_id`)
							   VALUES (NULL, 
							           '$data',
							           '$description',
							           '$link',
							           '$index',
							           '$type',
							           '$part_id',
							           '$lesson_id');";

		if (!($res = $mysqli->query($query_string)))
			echo $mysqli->error;
		else {
			echo "server_answer===Данные сохранены";
		}
	}

	if ($operation === "update_lesson") {
		$id = $_POST["id"];
		$title = $_POST["lesson_title"];
		$author_id = $_POST["author_id"];//Сделать преобразование $_POST
		$date = date("Y-m-d");
		$sections_id = $_POST["sections_id"];
		$query = "UPDATE `lessons` SET `title` = '$title',
										/*`author_id` = '$author_id',*/
										/*`date` = '$date',*/
										`sections_id` = '$sections_id',
									WHERE `id` = $id;";
		if ($mysqli->query($query)) {
			echo "Данные обновлены!";
		}
	
	}

	if ($operation === "update_lessons_parts") {
		$id = $_POST["lesson_id"];
		$title = $_POST["part_title"];
		$index = $_POST["index"];
		$query = "UPDATE `lessons_parts` SET `title` = '$title',
										`author_id` = '$author_id',
										`date` = '$date',
									WHERE `id` = $id;";
		if ($mysqli->query($query)) {
			echo "Данные обновлены!";
		}
	
	}

	if ($operation === "update_lessons_parts_unit") {
		$lesson_id = $_POST["lesson_id"];
		$part_id = $_POST["part_id"];
		$data = $_POST["data"];
		$index = $_POST["index"];
		$description = $_POST["description"];
		$link = $_POST["link"];
		$type = $_POST["type"];
		$unit_id = $_POST["unit_id"];
		$query = "UPDATE `lessons_parts_units` SET `part_id` = '$part_id',
										`index` = '$index',
										`data` = '$data',
										`sections_id` = '$sections_id',
										`description` = '$description',
										`link` = '$link',
										`type` = '$type',
									WHERE `id` = $unit_id;";
		if ($mysqli->query($query)) {
			echo "Данные обновлены!";
		}
	
	}


	if ($operation === "get_test_result") {
		$VKID = $_POST["vk_id"];
		$res = $mysqli->query("SELECT * FROM `results` WHERE `vk_id`='".$VKID."';");
		if ($res->num_rows != 0){
			$row = $res->fetch_assoc();
			$return_string = "";
			foreach($row as $key => $value) {
				$return_string .= $key."===".$value."&&&";
			}
			$return_string .= "server_answer===YES_DATA&&&";
			echo $return_string;
		} else {
			echo "server_answer===NO_DATA&&&";
		}
		
		
	}
	
	if ($operation === "update_") {
		$first_column = $_POST["first_column"];
		$second_column = $_POST["second_column"];
		$third_column = $_POST["third_column"];//Сделать преобразование $_POST
		$fourth_column = $_POST["fourth_column"];
		$time_date = date("Y-m-d");
		$VKID = $_POST["vk_id"];
		$query = "UPDATE `results` SET `first_column` = '$first_column',
										`second_column` = '$second_column',
										`third_column` = '$third_column',
										`fourth_column` = '$fourth_column',
										`time_date` = '$time_date'
									WHERE `vk_id` = $VKID;";
		if ($mysqli->query($query)) {
			echo "Данные обновлены!";
		}
	
	}
	
	
	

} else {
	echo "You have no permission!";
}
?>