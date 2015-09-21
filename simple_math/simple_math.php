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
	<div id="main_lessons_div">
		<div id="lesson_title_div">
			Алгебра
		</div>
		<div id="lesson_content_div"> 
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
	var _User, // Этот класс описывает юзера! -создатели уроков/ученики/админы
		_Lesson_Content, // Это класс контента урока!
		_Lesson_Part, // Это части урока! - содержатся в lesson-контенте
		_Lesson_Part_Unit, // юнит - содержится в lesson part
		_Lesson_Part_Unit_Data, // это уравнения - содержатся в 
		_Lesson_Part_Unit_Description, // описание уравнений
		_Lesson_Part_Unit_Links, // это какая-то ссылка
		_Previews_Content, // это див с превьюшкками
		_Preview; // превью


	///////////// GLOBAL OBJECTS ///////////////////////
	var MainDisplayElements;
	// Отображаемые контейнеры:
	// Здесь хранятся не только объекты, но и параметры

	this.MainDisplayElements = new Object();
	this.MainDisplayElements["parameters"] = 
	{
		// свойства класс для разных создаваемых нами компонентов
		"classes" : 
		{
			"Data": "data inline_divs",
			"Description": "descrition inline_divs",
			"Links": "links inline_divs",
			"Unit" : "lesson_part_unit clear-fix",
			"Part" : "lessons_part",
			"Preview" : "preview",
		}
	};
	this.MainDisplayElements["divs"] = {
		// самый главный div, который будет отображаться,
		// Он только отображается, не меняется!
		// Этот див можно вытаскивать и всовывать в body!
		// таким образом будет меняться отображаемый объект!
		"main_lessons_div" : createElementWParams({
			"id" : "main_lessons_div",
			"element" : "div"
		}),
		// Это элемент, в котором будет только меняться содержимое,
		// сам он пересоздаваться не должен!
		"lesson_title_div" : createElementWParams({
			"id" : "lesson_title",
			"element" : "div"
		}),
		// Это Основной div для для хранения previews
		"main_previews_div" : createElementWParams({
			"id": "main_previews_div",
			"element" : "div"
		}),

		"previews_title_div" : createElementWParams({
			"id": "previews_title_div",
			"element": "div"
		})
	};

	this.MainDisplayElements.insertDivs = function () 
	{
		document.body.appendChild(this.divs.main_lessons_div);
		this.divs.main_lessons_div.appendChild(this.divs.lesson_title_div);
		document.body.appendChild(this.divs.main_previews_div);
		this.divs.main_previews_div.appendChild(this.divs.previews_title_div);
	};

	this.MainDisplayElements.setPreviewsTitle = function (params) 
	{
		if (params)
		{
			if (params.PreviewTitle)
				this.previews_title_div.innerHTML = params.PreviewTitle;
		}

	}

	this.MainDisplayElements.setLessonTitle = function (params) 
	{
		if (params)
		{
			if (params.LessonTitle)
				this.lesson_title_div.innerHTML = params.LessonTitle;
		}

	}

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
// класс div'a с Превьюшками. Подразумевается существование
// единственного объекта данного класса!
	this._Previews_Content = function(params)
	{
		var Div;
			this.Div = document.createElement("div");
			this.Div.setAttribute("id", "previews_content");
		
		var Variables;
			this.Variables = new Object();
		//Массив Превьюшек
			this.Variables.PreviewsArray = new Array();
		if (params)
		{
			if (params.Title)
				this.Variables.Title = params.Title;
			if (params.PreviewsArray)
				this.Variables.PreviewsArray = params.PreviewsArray;
		}


		// в параметрах передается тип загрузки:
		// type:
		// -- all = загружаем все! (последние 50)
		// -- rate = по рейтингу!
		// -- sections = по секции!
		function loadPreviewsByParameters(params)
		{
			doAjaxRequest(params);
		}

		function setPreviews(data)
		{
			for (prev in data.previews)
			{
				var Prev = new _Lesson_Preview(prev);
				this.Variables.PreviewsArray.push(Prev);
			}
		}

	};

// Это превьюшка. Будет состоять из:
// названия урока, Картинки,  
	this._Lesson_Preview = function()
	{
		var Div;
			this.Div = MathLessons.

		var Variables = new Object();
			this.Variables.Title;
			this.Variables.Image;
			this.Variables.IdKey;

		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	}

	this._User = function (params)
	{
		// Переменные удобнее хранить в Объекте!
		// ибо их можно легко сохранить в JSON!!!
		var Variables;
			this.Variables = new Object();
			this.Variables.FullName;
			this.Variables.Login;
			this.Variables.Pass;
			this.Variables.IdKey;
		
		if (params)
		{
			if(params.FullName)
				this.Variables.FullName = params.FullName;
			if (params.Login)
				this.Variables.Login = params.Login;
			if (params.Pass)
				this.Variables.Pass = params.Pass;
			if (params.IdKey)
				this.Variables.IdKey = params.IdKey;
		}
	}

	this._Lesson_Content = function (params) 
	{
		var Div = document.getElementById("lesson_content_div");
		var Variables = new Object();
			this.Variables.IdKey;
			this.Variables.Title;
			this.Variables.Author;
			this.Variables.Date;
			this.Variables.PartsArray = new Array();
		
		if(params)
		{
			if (params.IdKey)
				this.Variables.IdKey = params.IdKey;
			if (params.Title)
				this.Variables.Title = params.Title;
			if (params.Author)
				this.Variables.Author = params.Author;
			if (params.Date)
				this.Variables.Date = params.Date;
			if (params.Parts)
				this.Variables.PartsArray = params.Parts;
		}

		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	};

	this._Lesson_Part = function() 
	{
		var Div;
		var Variables;
			this.Variables = new Object();
			this.Variables.Title; //название раздела урока
			this.Variables.IndexNumber; //порядковый номер данной части в уроке
			this.Variables.UnitsArray = new Array(); // Здесь хранятся данные для отображения в юнитах (данные и описания)
		this.Div;
		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	}
	this._Lesson_Part_Unit = function () 
	{
		var Div;
		var Variables;
			this.Variables = new Object();
			this.Variables.Type; // тип юнита. Предполагаемые - Определение, Пример, 
			this.Variables.Description;
			this.Variables.Datav
			this.Variables.Links;
			this.Variables.DatasArray = new Array();
			this.Variables.DescriptionsArray = new Array();
			this.Variables.LinksArray = new Array();
		this.Div;
		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	}
	this._Lesson_Part_Unit_Data = function() 
	{
		var Div;
		var Variables;
			this.Variables = new Object();
			this.Variables.IdKey;
			this.Variables.Inner;
		this.Div;
		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	}
	this._Lesson_Part_Unit_Description = function ()
	{
		var Div;
		var Variables;
			this.Variables = new Object();
			this.Variables.ID;
			this.Variables.Inner;
		this.Div;
		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	}
	this._Lesson_Part_Unit_Link = function () 
	{
		var Div;
		var Variables;
			this.Variables = new Object();
			this.Variables.IdKey;
			this.Variables.Inner;
		this.Div;
		function addDiv(params) 
		{
			if (params)
			{
				if (params.to)
				{
					params.to.appendChild(this.Div);
				}
			}
		}
	}

	// req_data - JSON объект
	// подразумевается следующие параметры:
	// request_text - текст запроса
	// ready_function - функция, которая будет вызвана
	// после выполнения запроса
	// 
	function doAjaxRequest(req_data)
	{
		var request = new XMLHttpRequest();
		request.parent = this;
		request.open("POST", "/simple_math_server_funcs.php", false);
		request.onreadystatechange = function() 
		{
			req_data.ready_function(request);
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

	// Создает И показывает див с превьюшками уроков!
	function createLessonsPreviewsPage(previews)
	{
		//Функция ожидает на вход JSON-объект
		//у которого элементы параметр-значение
		//задают Title урока и
		 
	}

};
</script>

</body>
</html>
