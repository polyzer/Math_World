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
	<div id="full_lessons_container">
		<div id="lesson_title">
			Алгебра
		</div>
		<div id="lesson_container"> 
			<div class="lesson_part">
			<div class="lesson_part_title">
			</div>
				<div class="lesson_part_unit clear-fix">
					<div class="data inline_divs">
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>
						<div class="math_data">
						$$\lim_{x \to \infty} \left(1 + \frac{1}{n} \right)^n = e$$
						</div>
					</div>
					<div class="description inline_divs">
						Квадратные уравнения и второй замечательный предел и может быть что-либо другое
					</div>
					<div class="links inline_divs">&#9755;</div>
				</div>
				<div class="lesson_part_unit clear-fix">
					<div class="data inline_divs">
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>
						</div>
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>

					</div>
					<div class="description inline_divs">oin3u9b9ubfi9yuывафыварфышвапцщуншмгмыгвшапныфвща щшнпы ащшпфгцу пн293878п67а шгпавщш3278п98цуршгырващшфывадоисмдриывадb</div>
					<div class="links inline_divs"></div>
				</div>
				<div class="lesson_part_unit clear-fix">
					<div class="data inline_divs">
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>
						<div class="math_data">
							<math> 
								<mrow>
									<mi>a</mi>
									<msup>
										<mi>x</mi>
										<mn>2</mn>
									</msup>
									<mo>+</mo>
									<mi>b</mi>
									<mi>x</mi>
									<mo>+</mo>
									<mi>c</mi>
									<mo>=</mo>
									<mn>0</mn>
								</mrow>
							</math>					
						</div>
						<div class="math_data">
						$$\lim_{x \to \infty} \left(1 + \frac{1}{n} \right)^n = e$$
						</div>
					</div>
					<div class="description inline_divs">
						Квадратные уравнения и второй замечательный предел
					</div>
					<div class="links inline_divs"></div>
				</div>
				
			</div>
		</div>
	</div>
<script>
// это модуль для MathWorld.
// Здесь будут отображаться уроки.
var MathLessons = new function() 
{

	// Классы:
	var _User,
		_Lesson,
		_Lesson_Part,
		_Lesson_Part_Unit,
		_Lesson_Part_Unit_Data,
		_Lesson_Part_Unit_Description,
		_Lesson_Part_Unit_Link;

	// Отображаемые, контейнеры:
	// Здесь хранятся не только объекты, но и параметры
	var DisplayElements = new Object();
	this.DisplayElements["parameters"] = 
	{
		// свойства класс для разных создаваемых нами компонентов
		"classes" : 
		{
			"Data": "data inline_divs",
			"Description": "descrition inline_divs",
			"Links": "links inline_divs",
			"Unit" : "lesson_part_unit clear-fix",
			"Part" : "lessons_part"
		}
	};
	this.DisplayElements["divs"] = {
		// самый главный div, который будет отображаться,
		"full_lessons_container" : document.getElementById("full_lessons_container"),
		"Parts" 
	};


	// пробуем добавить!
	var unit_div = document.createElement("div");
	this.unit_div.setAttribute("class", "lesson_part_unit clear-fix");
	var des_div = document.createElement("div");
	this.des_div.setAttribute("class", "description inline_divs");
	var links_div = document.createElement("div");
	this.links_div.setAttribute("class", "links inline_divs");
	var data_div = document.createElement("div");
	this.data_div.setAttribute("class", "data inline_divs");

	var Parts = document.getElementsByClassName("lesson_part");
	this.Parts[0].appendChild(unit_div);
	this.unit_div.appendChild(data_div);
	this.unit_div.appendChild(des_div);
	this.unit_div.appendChild(links_div);
	this.data_div.innerHTML = '<div class="math_data">$$\\lim_{x \\to \\infty} \\left(1 + \\frac{1}{n} \\right)^n = e$$</div>';
	this.des_div.innerHTML = '<p>THERE ARE SOME TEXT</p>';
	this.links_div.innerHTML = '&#9755;';

	window.alert(this.data_div.innerHTML);
//

	this._User = function (params)
	{
		var FullName,
			Login,
			Pass,
			IdKey;
		if (params)
		{
			if(params.FullName)
				this.FullName = params.FullName;
			if (params.Login)
				this.Login = params.Login;
			if (params.Pass)
				this.Pass = params.Pass;
			if (params.IdKey)
				this.IdKey = params.IdKey;
		}
	}

	this._Lesson = function (params) 
	{
		var IdKey,
			Title, // название всего урока
			Author, // автор
			PartsArray; // массив частей
		this.PartsArray = new Array();

		if(params)
		{
			if (params.IdKey)
			{
				this.IdKey = params.IdKey;
			}
			if (params.Title)
			{
				this.Title = params.Title;
			}
			if (params.Author)
			{
				this.Author = params.Author;
			}
			if (params.Date)
			{
				this.Date = params.Date;
			}
			if (params.Parts)
			{
				this.PartsArray = Parts;
			}			
		} else
		{
			this.Title = "Новый Урок";
			this.Author = this.user.name;
			this.PartsArray.push(_Part_Of_Lesson({ status : "new"})); // вставляем новый урок
		}

	};

	this._Lesson_Part = function() 
	{
		var Title, //название раздела урока
			IndexNumber, //порядковый номер данной части в уроке
			UnitsArray; // Здесь хранятся данные для отображения в юнитах (данные и описания)

	}

	this._Lesson_Part_Unit = function () 
	{
		var Type;
		var Descriptions;
		var Datas;
		var Links;

	}
	this._Lesson_Part_Unit_Data = function() 
	{
		var ID;
		var Inner;
		var UnitIndex;
	}
	this._Lesson_Part_Unit_Description = function ()
	{
		var ID;
		var Inner;
		var UnitIndex;
	}
	this._Lesson_Part_Unit_Link = function () 
	{
		var ID;
		var Inner;
		var UnitIndex;
	}

	// req_data - JSON объект
	// подразумевается следующие параметры:
	// request_text - текст запроса
	// ready_func - функция, которая будет вызвана
	// после выполнения запроса
	// 
	function doAjaxRequest(req_data)
	{
		var request = new XMLHttpRequest();
		request.parent = this;
		request.open("POST", "/simple_math_server_funcs.php", true);
		request.onreadystatechange = function() 
		{
			req_data.ready_func(request);
		}
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(req_data.request_text);

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
					el.setAttribute(propNames[i],params[propNames[i]]);
					continue;
				}
				if (propNames[i] == "class"){
					el.setAttribute(propNames[i],params[propNames[i]]);
					continue;
				}
				el.style.setAttribute(propNames[i], params[propNames[i]]);
			}

		}
		return el;
	}

	// функция создает элементы Lesson,
	// (Data, Description, Links)
	// получаемые из AJAX
	function createAndReturnObject(params)
	{
		if(params)
		{

		}
	}

	// Данная функция инициализирует новый урок.
	// load - загрузка существующего по параметру (id)
	// create - создание нового и сохранение
	// Надо еще придумать режим редактирования
	function Init(params)
	{
		if(params)
		{
			if(params.status === "load")
			{
				// Загружаем Урок!!!

			} else if(params.status === "create")
			{
				//Создаем новый урок!
			}
		}
	}

	function getAllLessonsByParameter(params)
	{
		if (params)
		{
			
		}
	}

};
</script>

</body>
</html>
