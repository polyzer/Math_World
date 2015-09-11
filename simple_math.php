<?php 
	session_start();
	$_SESSION["vk_simple_math"]["true_connection"] = "true";
?>

<!DOCTYPE html>
<html>
<head>
	<title>MATH WORLD</title>
	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="./simple_math_style.css" />
	<script type="text/javascript"
     src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
 	</script>
 </head>
<body>

	<div id="lesson_container_div"> 
		<div id="lesson_name">
			there is name
		</div>
		<table id="lesson_part_table">
			<tr class="unit_tr">
				<th class="data_th"></th>
				<th class="description_th"></th>
				<th class="link_th"></th>
			</tr>		
		</table>
	</div>

<script>

	var _User = function (params)
	{
		var FullName,
			Login,
			Pass,
			IdKey;
	}


	var _Lesson = function (params) 
	{
		var IdKey,
			Title, // название всего урока
			Author, // автор
			Date, // дата создания
			PartsArray; // массив частей
		this.PartsArray = new Array();

		if(params)
		{
			if (params.id_key)
			{
				this.IdKey = params.id_key;
			}
			if (params.title)
			{
				this.Title = params.title;
			}
			if (params.author)
			{
				this.Author = params.author;
			}
			if (params.date)
			{
				this.Date = params.date;
			}
			if (params.parts)
			{
				this.PartsArray = parts;
			}			
		} else
		{
			this.Title = "Новый Урок";
			this.Author = this.user.name;
			this.Date = new Date();
			this.PartsArray.push(_Part_Of_Lesson({ status : "new"})); // вставляем новый урок

		}

	};

	var _Part_Of_Lesson = function() 
	{
		var Title, //название раздела урока
			IndexNumber, //порядковый номер данной части в уроке
			UnitsArray; // Здесь хранятся данные для отображения в юнитах (данные и описания)

	}

	function doAjaxRequest(datas)
	{
		var request = new XMLHttpRequest();
		request.parent = this;
		request.open("POST", "/simple_math_server_funcs.php", true);
		request.onreadystatechange = function() 
		{
			if (request.readyState === 4 && (request.status === 200 || request.statusText==="OK")) 
			{
				// разбор ответа

			}
		}
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(datas);

	}


	function createElementWParams(params)
	{
		if (params){
			var el = document.createElement(params.element);
			var propNames = Object.keys(params);
			for(var i = 0; i < propNames.length; i++)
			{
				if (propNames[i] == "element")
					continue;
				if (propNames[i] == "id"){
					el[propNames[i]] = params[propNames[i]];
					continue;
				}
				if (propNames[i] == "class"){
					el[propNames[i]] = params[propNames[i]];
					continue;
				}
				el.style[propNames[i]] = params[propNames[i]];
			}

		}
	}

	function loadLessonFromServer()
	{
		var 
	}

	//queues structures:
	// Объект ниже содержит очереди
	//отображаемых юнитов с вложенными элементами
	//пока предполагается существование 2-х очередей
	//1 - очередь объекта
	//2 - очередь объяснений|описаний данных объеков 

	//Так как предполагается учебная цель данной программы, то
	//данные цепочки будут называться уроками.

	var LineQueues = new function() 
	{
		var DataQueue; // очередь из данных (уравнений и т.д.) которые будут показаны
		var DescQueue; // очередь из описаний, которые нужно показать
		// в зависимости от длины data/desc, некоторые элементы будут отображены, а другие нет
	}



	var data_array = new Array();


</script>

</body>
</html>
