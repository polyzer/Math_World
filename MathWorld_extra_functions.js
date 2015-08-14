
	var Screen_Parameters = function()
	{
		var Height;
		var Width;

		this.Height = parseInt(window.innerHeight);
		this.Width = parseInt(window.innerWidth);

	};

	var Camera_Settings = function(parameters_json) 
	{
		var View_Angle, Aspect_Ratio, Near, Far;
		var parameters = {};

		if (parameters_json)
			this.parameters = JSON.parse(parameters_json);
		
		if (typeof parameters.view_angle !== "undefined")
			this.View_Angle = parameters.view_angle;
		else
			this.View_Angle = 45;

		if (typeof parameters.aspect_ratio !== "undefined")
			this.Aspect_Ratio = parameters.view_angle; // угол обзора
		else
			this.Aspect_Ratio = parseInt(window.innerWidth) / parseInt(window.innerHeight);

		if (typeof parameters.near !== "undefined")
			this.Near = parameters.near;
		else
			this.Near = 1;

		if (typeof parameters.far !== "undefined")
			this.Far = parameters.far;
		else
			this.Far = 10000;
	};

	var Cube_Parameters = function()
	{
		var Width, Height, Depth, Separator;
		this.Width = this.Height = this.Depth = 20;
		this.Separator = 10;
	};

	var MathElement = function()
	{
		var Type; // operation | identificator | number | container
		var Data; // HTML значение содержимого
		var MathObject3D; // 3D объект, который будет в сцене
		var 
	};

	var HTMLSymbol = function (args_json){
		var htmlCode;
		var htmlName;
		var javascriptUnicode;
		var description;

		this.htmlCode = null;
		this.htmlName = null;
		this.javascriptUnicode = null;
		this.description = null;

		var parameters =  {};

		if (args_json)
		{
			this.parameters = JSON.parse(args_json);
			
			if (typeof this.parameters.html_code !== "undefined")
				this.htmlCode = this.parameters.html_code;

			if (typeof this.parameters.html_name !== "undefined")
				this.htmlName = this.parameters.html_name;

			if (typeof this.parameters.javascript_unicode !== "undefined")
				this.javascriptUnicode = this.parameters.javascript_unicode;

			if (typeof this.parameters.description !== "undefined")
				this.description = this.parameters.description;
		}
	};

	var mathSymbolsTable = [];
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&times;", "html_code":"&#215;", "description":"Умножение"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&divide;", "html_code":"&#247;", "description":"Деление"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&lt;", "html_code":"&#60;", "description":"Меньше"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&gt;", "html_code":"&#62;", "description":"Больше"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&fnof;", "html_code":"&#402;", "description":"Функция"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&plus;", "html_code":"&#43;", "description":"Плюс"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&minus;", "html_code":"&#45;", "description":"Минус"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&minus;", "html_code":"&#8722;", "description":"Минус"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&lowast;", "html_code":"&#8727;", "description":"Сопряжение"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&radic;", "html_code":"&#8730;", "description":"Корень"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&prop;", "html_code":"&#8733;", "description":"Пропорциональность"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&infin;", "html_code":"&#8734;", "description":"Бесконечность"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&ang;", "html_code":"&#8736;", "description":"Угол"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&and;", "html_code":"&#8743;", "description":"И"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&or;", "html_code":"&#8744;", "description":"Или"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&cap;", "html_code":"&#8745;", "description":"Пересечение"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&cup;", "html_code":"&#8746;", "description":"Объединение"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&int;", "html_code":"&#8747;", "description":"Интеграл"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&there4;", "html_code":"&#8756;", "description":"поэтому"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&sim;", "html_code":"&#8764;", "description":"подобно"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&cong;", "html_code":"&#8773;", "description":"сравнимо"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&asymp;", "html_code":"&#8776;", "description":"приблизительно равно"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&ne;", "html_code":"&#8800;", "description":"Не равно"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&equiv;", "html_code":"&#8801;", "description":"идентично"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&le;", "html_code":"&#8804;", "description":"меньше или равно"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&ge;", "html_code":"&#8805;", "description":"больше или равно"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&sub;", "html_code":"&#8834;", "description":"подмножество"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&sup;", "html_code":"&#8835;", "description":"надмножестов"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&nsub;", "html_code":"&#8836;", "description":"не подмножество"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&sube;", "html_code":"&#8838;", "description":"подмножество"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&supe;", "html_code":"&#8839;", "description":"надмножество"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&oplus;", "html_code":"&#8853;", "description":"прямая сумма"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&otimes;", "html_code":"&#8855;", "description":"тензерное произведение"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&perp;", "html_code":"&#8869;", "description":"перпендикуляр"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&sdot;", "html_code":"&#8836;", "description":"оператор точка"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&plusmn;", "html_code":"&#177;", "description":"плюс|минус"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&forall;", "html_code":"&#8704;", "description":"Для каждого"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&part;", "html_code":"&#8706;", "description":"часть"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&pi;", "html_code":"&#960;", "description":"Пи"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&exist;", "html_code":"&#8707;", "description":"существует"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&empty;", "html_code":"&#8709;", "description":"пустой"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&nabla;", "html_code":"&#8711;", "description":"оператор Гамильтона (набла)"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&isin;", "html_code":"&#8712;", "description":"принадлежит к множеству"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&notin;", "html_code":"&#8713;", "description":"не принадлежит к множеству"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&ni;", "html_code":"&#8715;", "description":"содержит"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&prod;", "html_code":"&#8719;", "description":"произведение"}));
	mathSymbolsTable.push(new HTMLSymbol({"html_name":"&sum;", "html_code":"&#8721;", "description":"сумма"}));








	var MathFormula = function()
	{

	};