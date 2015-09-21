<?php
	session_start();
if ($_SESSION["math_world"]["true_connection"] && 
	$_POST["params"]
   ) 
{
	$params = json_decode($_POST["params"], true);

	$mysqli = new mysqli("localhost", //адрес хоста БД
						 "root", // имя пользователя
						 "000000", //пароль
						 "math_world"); //база данных
	
	if ($mysqli->connect_errno) {
		$server_answer = '{"server_answer":
				    {
				     "answer_status":"SERV_BAD"
			        }
				   }';
		exit($server_answer);
	} else {
		$mysqli->set_charset("utf8");
	}
	
	//получить id(через запятую)
	//и через них найти
	if ($params["operation"] === "get_lessons_previews")
	{
		if ($params[""])
		$sections_ids = explode($params["sections_ids"], ',');
		$quer = "SELECT id,title FROM `lessons` WHERE ";
		for($i=0; $i < count($sections_ids); $i++)
		{
			if ($i == (count($sections_ids) - 1))
				$quer .= "`sections_ids` =".$i.";";
			else
				$quer .= "`sections_ids` =".$i." OR ";				
		}
		$res = $mysqli->query($quer);
		$retArr = array();
		while($obj = $res->fetch_object())
		{
			$retArr[] = $obj;
		}
		$server_answer = '{"server_answer":
				    {
				     "answer_data":'.json_encode($retArr).',
				     "answer_status":"OK"
			        }
				   }';
		echo $server_answer;
	}

	
	if ($params["operation"] === "get_lesson") 
	{
		$lesson_id = $params["lesson_id"];
		$res = $mysqli->query("SELECT * FROM `lessons` WHERE `id`=".$lesson_id.";");
		$retArr = array();
		while($obj = $res->fetch_object())
		{
			$retArr[] = $obj;
		}
		$server_answer = '{"server_answer":
				    {
				     "answer_data":'.json_encode($retArr).',
				     "answer_status":"OK"
			        }
				   }';
		echo $server_answer;
}
	
	if ($operation === "get_lessons_part") 
	{
		$part_id = $_POST["part_id"];
		$res = $mysqli->query("SELECT * FROM `lessons_parts` WHERE `id`=".$part_id.";");
		$retArr = array();
		while($obj = $res->fetch_object())
		{
			$retArr[] = $obj;
		}
		echo '{"server_answer":'.json_encode($retArr).'}';
	}

	if ($operation === "get_lessons_part_unit") 
	{
		$unit_id = $params["unit_id"];
		$res = $mysqli->query("SELECT * FROM `lessons_parts_units` WHERE `id`=".$unit_id.";");
		$retArr = array();
		while($obj = $res->fetch_object())
		{
			$retArr[] = $obj;
		}
		$server_answer = '{"server_answer":
				    {
				     "answer_data":'.json_encode($retArr).',
				     "answer_status":"OK"
			        }
				   }';
		echo $server_answer;
	}


	if ($operation === "save_lesson") 
	{
		$title = $params["lesson_title"];
		$author_id = $params["author_id"];//Сделать преобразование $params
		$date = date("Y-m-d");
		$sections_id = $params["sections_id"];
		$query_string = "INSERT INTO `lessons` (`id`,
												`title`,
												`author_id`,
												`date`,
												`sections_ids`)
							   VALUES (NULL, 
							           '$title',
							           '$author_id',
							           '$date',
							           '$sections_ids');";

		if (!($res = $mysqli->query($query_string)))
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"BAD"
				        }
					   }';
			echo $server_answer;
		else {
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"OK"
				        }
					   }';
			echo $server_answer;
		}
	}

	if ($operation === "save_lesson_part") 
	{
		$lesson_id = $params["lesson_id"];
		$title = $params["part_title"];
		$index = $params[];
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
			$server_answer = '{"server_answer":
				    {
				     "answer_status":"BAD"
			        }
				   }';
			echo $server_answer;
		else {
			$server_answer = '{"server_answer":
				    {
				     "answer_status":"OK"
			        }
				   }';
			echo $server_answer;
		}
	}

	if ($operation === "save_lessons_parts_unit") 
	{
		$lesson_id = $params["lesson_id"];
		$part_id = $params["part_id"];
		$data = $params["data"];
		$index = $params["index"];
		$description = $params["description"];
		$link = $params["link"];
		$type = $params["type"];
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
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"BAD"
				        }
					   }';
			echo $server_answer;
		else {
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"OK"
				        }
					   }';
			echo $server_answer;
		}
	}

	if ($operation === "update_lesson") 
	{
		$id = $params["id"];
		$title = $params["lesson_title"];
		$author_id = $params["author_id"];//Сделать преобразование $params
		$date = date("Y-m-d");
		$sections_id = $params["sections_id"];
		$query_string = "UPDATE `lessons` SET `title` = '$title',
										/*`author_id` = '$author_id',*/
										/*`date` = '$date',*/
										`sections_ids` = '$sections_ids',
									WHERE `id` = $id;";
		if (!($res = $mysqli->query($query_string)))
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"BAD"
				        }
					   }';
			echo $server_answer;
		else {
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"OK"
				        }
					   }';
			echo $server_answer;
		}
	
	}

	if ($operation === "update_lessons_parts") 
	{
		$id = $params["lesson_id"];
		$title = $params["part_title"];
		$index = $params["index"];
		$query_string = "UPDATE `lessons_parts` SET `title` = '$title',
										`author_id` = '$author_id',
										`date` = '$date',
									WHERE `id` = $id;";
		if (!($res = $mysqli->query($query_string)))
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"BAD"
				        }
					   }';
			echo $server_answer;
		else {
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"OK"
				        }
					   }';
			echo $server_answer;
		}
	}

	if ($operation === "update_lessons_parts_unit") 
	{
		$lesson_id = $params["lesson_id"];
		$part_id = $params["part_id"];
		$data = $params["data"];
		$index = $params["index"];
		$description = $params["description"];
		$link = $params["link"];
		$type = $params["type"];
		$unit_id = $params["unit_id"];
		$query_string = "UPDATE `lessons_parts_units` SET `part_id` = '$part_id',
										`index` = '$index',
										`data` = '$data',
										`sections_id` = '$sections_id',
										`description` = '$description',
										`link` = '$link',
										`type` = '$type',
									WHERE `id` = $unit_id;";
		if (!($res = $mysqli->query($query_string)))
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"BAD"
				        }
					   }';
			echo $server_answer;
		else {
			$server_answer = '{"server_answer":
					    {
					     "answer_status":"OK"
				        }
					   }';
			echo $server_answer;
		}
	}


	if ($operation === "get_test_result") 
	{
		$VKID = $params["vk_id"];
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
	
	if ($operation === "update_") 
	{
		$first_column = $params["first_column"];
		$second_column = $params["second_column"];
		$third_column = $params["third_column"];//Сделать преобразование $params
		$fourth_column = $params["fourth_column"];
		$time_date = date("Y-m-d");
		$VKID = $params["vk_id"];
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