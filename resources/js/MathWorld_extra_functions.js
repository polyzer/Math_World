var MathWorld = new function() 
{

	var Screen_Parameters;
	var Camera_Settings;
	var Cube_Parameters;
	var Symbol;
	var MathElement;
	var SymbolsTable;
	var greekLetters;

	this.Screen_Parameters = function()
	{
		var Height;
		var Width;

		this.Height = parseInt(window.innerHeight);
		this.Width = parseInt(window.innerWidth);

	};

	this.Camera_Settings = function(parameters_json) 
	{
		var View_Angle, Aspect_Ratio, Near, Far;
		var parameters = new Object();

		if (parameters_json)
			temp = JSON.stringify(parameters_json);
			this.parameters = JSON.parse(temp);
		
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
	
	this.Cube_Parameters = function()
	{
		var Width, Height, Depth, Separator;
		this.Width = this.Height = this.Depth = 20;
		this.Separator = 10;
	};

	this.MathElement = function()
	{
		var Type; // operation | identificator | number | container
		var Data; // HTML значение содержимого
		var MathObject3D; // 3D объект, который будет в сцене
		var Name;
	};

	this.Symbol = function (args_json){
		var htmlCode;
		var htmlName;
		var javascriptUnicode;
		var description;
		var latex;

		this.htmlCode = null;
		this.htmlName = null;
		this.javascriptUnicode = null;
		this.description = null;
		this.latex = null;

		var parameters = new Object();

		if (args_json)
		{
			temp = JSON.stringify(args_json);
			this.parameters = JSON.parse(temp);
			
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

	this.SymbolsTable = new Array();

	this.SymbolsTable.push(new this.Symbol({"latex":"\times", "html_name":"&times;", "html_code":"&#215;", "description":"умножение"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\div","html_name":"&divide;", "html_code":"&#247;", "description":"деление"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\lt","html_name":"&lt;", "html_code":"&#60;", "description":"меньше"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\gt", "html_name":"&gt;", "html_code":"&#62;", "description":"больше"}));
	this.SymbolsTable.push(new this.Symbol({"html_name":"&fnof;", "html_code":"&#402;", "description":"функция"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\plus", "html_name":"&plus;", "html_code":"&#43;", "description":"плюс"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\minus", "html_name":"&minus;", "html_code":"&#45;", "description":"минус"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\minus", "html_name":"&minus;", "html_code":"&#8722;", "description":"минус"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\ast", "html_name":"&lowast;", "html_code":"&#8727;", "description":"сопряжение"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\sqrt{},\sqrt[]{}", "html_name":"&radic;", "html_code":"&#8730;", "description":"корень"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\propto", "html_name":"&prop;", "html_code":"&#8733;", "description":"пропорциональность"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\infty", "html_name":"&infin;", "html_code":"&#8734;", "description":"бесконечность"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\angle", "html_name":"&ang;", "html_code":"&#8736;", "description":"угол"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\wedge", "html_name":"&and;", "html_code":"&#8743;", "description":"и"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\vee", "html_name":"&or;", "html_code":"&#8744;", "description":"или"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\cap", "html_name":"&cap;", "html_code":"&#8745;", "description":"пересечение"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\cup", "html_name":"&cup;", "html_code":"&#8746;", "description":"объединение"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\int", "html_name":"&int;", "html_code":"&#8747;", "description":"интеграл"}));
	this.SymbolsTable.push(new this.Symbol({"html_name":"&there4;", "html_code":"&#8756;", "description":"поэтому"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\sim", "html_name":"&sim;", "html_code":"&#8764;", "description":"подобно"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\cong", "html_name":"&cong;", "html_code":"&#8773;", "description":"сравнимо"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\approx", "html_name":"&asymp;", "html_code":"&#8776;", "description":"приблизительно равно"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\neq", "html_name":"&ne;", "html_code":"&#8800;", "description":"не равно"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\equiv", "html_name":"&equiv;", "html_code":"&#8801;", "description":"идентично"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\le", "html_name":"&le;", "html_code":"&#8804;", "description":"меньше или равно"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\ge", "html_name":"&ge;", "html_code":"&#8805;", "description":"больше или равно"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\subset", "html_name":"&sub;", "html_code":"&#8834;", "description":"подмножество"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\supset", "html_name":"&sup;", "html_code":"&#8835;", "description":"надмножестов"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"", "html_name":"&nsub;", "html_code":"&#8836;", "description":"не подмножество"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\subseteq", "html_name":"&sube;", "html_code":"&#8838;", "description":"подмножество"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\supseteq", "html_name":"&supe;", "html_code":"&#8839;", "description":"надмножество"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\oplus", "html_name":"&oplus;", "html_code":"&#8853;", "description":"прямая сумма"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\otimes", "html_name":"&otimes;", "html_code":"&#8855;", "description":"тензерное произведение"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\perp", "html_name":"&perp;", "html_code":"&#8869;", "description":"перпендикуляр"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\cdot", "html_name":"&sdot;", "html_code":"&#8836;", "description":"оператор точка"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\pm", "html_name":"&plusmn;", "html_code":"&#177;", "description":"плюс|минус"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\forall", "html_name":"&forall;", "html_code":"&#8704;", "description":"для каждого"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\partial", "html_name":"&part;", "html_code":"&#8706;", "description":"часть"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\exists", "html_name":"&exist;", "html_code":"&#8707;", "description":"существует"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\emptyset", "html_name":"&empty;", "html_code":"&#8709;", "description":"пустой"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\nabla", "html_name":"&nabla;", "html_code":"&#8711;", "description":"оператор Гамильтона (набла)"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\isin", "html_name":"&isin;", "html_code":"&#8712;", "description":"принадлежит к множеству"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"", "html_name":"&notin;", "html_code":"&#8713;", "description":"не принадлежит к множеству"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\ni", "html_name":"&ni;", "html_code":"&#8715;", "description":"содержит"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"", "html_name":"&prod;", "html_code":"&#8719;", "description":"произведение"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\Sigma", "html_name":"&sum;", "html_code":"&#8721;", "description":"сумма"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\Rightarrow", "html_name":"&rArr;", "html_code":"&#8658;", "description":"следует"}));
	this.SymbolsTable.push(new this.Symbol({"latex":"\Leftrightarrow", "html_name":"&hArr;", "html_code":"&#8660;", "description":"равносильно"}));

	this.greekLetters = new Object();

	this.greekLetters.push(new this.Symbol({"latex":"", "html_name":"&pi;", "html_code":"&#960;", "description":"Пи"}));
	this.greekLetters.push(new this.Symbol({"latex":"", "html_name":"&pi;", "html_code":"&#960;", "description":"Пи"}));


};
