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
	<div id="lesson_title">
		Алгебра
	</div>
	<div id="lesson_container_div"> 
		<div class="lesson_part_table">
			<div class="unit clear-fix">
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
				<div class="link inline_divs">&#9755;</div>
			</div>
			<div class="unit clear-fix">
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
				<div class="description inline_divs">oin3u9b9ubfi9yub</div>
				<div class="link inline_divs"></div>
			</div>
			<div class="unit clear-fix">
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
				<div class="link inline_divs"></div>
			</div>
			
		</div>
	</div>

<script>
	var unit_div = document.createElement("div");
	unit_div.class = "unit clear-fix";
	var des_div = document.createElement("div");
	des_div.class = "description inline_divs";
	var link_div = document.createElement("div");
	link_div.class = "link inline_divs";
	var data_div = document.createElement("div");
	data_div.class = "data clear-fx";


	var _User = function (params)
	{
		var FullName,
			Login,
			Pass,
			IdKey;
		if (params)
		{
			if(params.full_name)
				this.FullName = params.full_name;
			if (params.login)
				this.Login = params.login;
			if (params.pass)
				this.Pass = params.pass;
			if (params.id_key)
				this.IdKey = params.id_key;
		}
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

	var _Unit = function () 
	{
		var Type;

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


</script>

</body>
</html>
