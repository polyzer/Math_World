var MathWorld = new function() 
{

	var Screen_Parameters;
	var Camera_Settings;
	var Cube_Parameters;
	var Symbol;
	var MathElement;
	var mathSymbolsTable;
	var greekLettersTable;
	var math3DObjectsTable;
	var MathMLTagsTable;
	var Parser;

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

	this.MathMLTag = function() 
	{
		var Name;
		var Type; //container | opration | identificator | number
	}

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

			if (typeof this.parameters.latex !== "undefined")
				this.latex = this.parameters.latex;

			
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



	this.mathSymbolsTable = new Array();

	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\times", "html_name":"&times;", "html_code":"&#215;", "description":"умножение"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\div","html_name":"&divide;", "html_code":"&#247;", "description":"деление"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\lt","html_name":"&lt;", "html_code":"&#60;", "description":"меньше"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\gt", "html_name":"&gt;", "html_code":"&#62;", "description":"больше"}));
	this.mathSymbolsTable.push(new this.Symbol({"html_name":"&fnof;", "html_code":"&#402;", "description":"функция"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\plus", "html_name":"&plus;", "html_code":"&#43;", "description":"плюс"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\minus", "html_name":"&minus;", "html_code":"&#45;", "description":"минус"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\minus", "html_name":"&minus;", "html_code":"&#8722;", "description":"минус"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\ast", "html_name":"&lowast;", "html_code":"&#8727;", "description":"сопряжение"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\sqrt{},\\sqrt[]{}", "html_name":"&radic;", "html_code":"&#8730;", "description":"корень"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\propto", "html_name":"&prop;", "html_code":"&#8733;", "description":"пропорциональность"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\infty", "html_name":"&infin;", "html_code":"&#8734;", "description":"бесконечность"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\angle", "html_name":"&ang;", "html_code":"&#8736;", "description":"угол"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\wedge", "html_name":"&and;", "html_code":"&#8743;", "description":"и"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\vee", "html_name":"&or;", "html_code":"&#8744;", "description":"или"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\cap", "html_name":"&cap;", "html_code":"&#8745;", "description":"пересечение"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\cup", "html_name":"&cup;", "html_code":"&#8746;", "description":"объединение"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\int", "html_name":"&int;", "html_code":"&#8747;", "description":"интеграл"}));
	this.mathSymbolsTable.push(new this.Symbol({"html_name":"&there4;", "html_code":"&#8756;", "description":"поэтому"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\sim", "html_name":"&sim;", "html_code":"&#8764;", "description":"подобно"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\cong", "html_name":"&cong;", "html_code":"&#8773;", "description":"сравнимо"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\approx", "html_name":"&asymp;", "html_code":"&#8776;", "description":"приблизительно равно"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\neq", "html_name":"&ne;", "html_code":"&#8800;", "description":"не равно"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\equiv", "html_name":"&equiv;", "html_code":"&#8801;", "description":"идентично"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\le", "html_name":"&le;", "html_code":"&#8804;", "description":"меньше или равно"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\ge", "html_name":"&ge;", "html_code":"&#8805;", "description":"больше или равно"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\subset", "html_name":"&sub;", "html_code":"&#8834;", "description":"подмножество"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\supset", "html_name":"&sup;", "html_code":"&#8835;", "description":"надмножестов"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"", "html_name":"&nsub;", "html_code":"&#8836;", "description":"не подмножество"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\subseteq", "html_name":"&sube;", "html_code":"&#8838;", "description":"подмножество"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\supseteq", "html_name":"&supe;", "html_code":"&#8839;", "description":"надмножество"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\oplus", "html_name":"&oplus;", "html_code":"&#8853;", "description":"прямая сумма"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\otimes", "html_name":"&otimes;", "html_code":"&#8855;", "description":"тензерное произведение"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\perp", "html_name":"&perp;", "html_code":"&#8869;", "description":"перпендикуляр"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\cdot", "html_name":"&sdot;", "html_code":"&#8836;", "description":"оператор точка"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\pm", "html_name":"&plusmn;", "html_code":"&#177;", "description":"плюс|минус"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\forall", "html_name":"&forall;", "html_code":"&#8704;", "description":"для каждого"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\partial", "html_name":"&part;", "html_code":"&#8706;", "description":"часть"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\exists", "html_name":"&exist;", "html_code":"&#8707;", "description":"существует"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\emptyset", "html_name":"&empty;", "html_code":"&#8709;", "description":"пустой"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\nabla", "html_name":"&nabla;", "html_code":"&#8711;", "description":"оператор Гамильтона (набла)"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\isin", "html_name":"&isin;", "html_code":"&#8712;", "description":"принадлежит к множеству"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"", "html_name":"&notin;", "html_code":"&#8713;", "description":"не принадлежит к множеству"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\ni", "html_name":"&ni;", "html_code":"&#8715;", "description":"содержит"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"", "html_name":"&prod;", "html_code":"&#8719;", "description":"произведение"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\Sigma", "html_name":"&sum;", "html_code":"&#8721;", "description":"сумма"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\Rightarrow", "html_name":"&rArr;", "html_code":"&#8658;", "description":"следует"}));
	this.mathSymbolsTable.push(new this.Symbol({"latex":"\\Leftrightarrow", "html_name":"&hArr;", "html_code":"&#8660;", "description":"равносильно"}));

	this.greekLettersTable = new Array();

	this.greekLettersTable.push(new this.Symbol({"latex":"\\alpha", "html_name":"&alpha;", "html_code":"&#945;", "description":"альфа"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\beta", "html_name":"&beta;", "html_code":"&#946;", "description":"бета"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\gamma", "html_name":"&gamma;", "html_code":"&#947;", "description":"гамма"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\delta", "html_name":"&delta;", "html_code":"&#948;", "description":"дельта"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\epsilon", "html_name":"&straightepsilon;", "html_code":"&#1013;", "description":"эпсилон"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\varepsilon", "html_name":"&epsilon;", "html_code":"&#949;", "description":"эпсилон"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\zeta", "html_name":"&zeta;", "html_code":"&#950;", "description":"зета"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\eta", "html_name":"&eta;", "html_code":"&#951;", "description":"эта"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\theta", "html_name":"&theta;", "html_code":"&#952;", "description":"сета"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\vartheta", "html_name":"&thetasym;", "html_code":"&#977;", "description":"сета"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\iota", "html_name":"&iota;", "html_code":"&#953;", "description":"йота"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\kappa", "html_name":"&kappa;", "html_code":"&#954;", "description":"каппа"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\lambda", "html_name":"&lambda;", "html_code":"&#955;", "description":"лямбда"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\mu", "html_name":"&mu;", "html_code":"&#956;", "description":"мю"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\nu", "html_name":"&nu;", "html_code":"&#957;", "description":"ню"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\xi", "html_name":"&xi;", "html_code":"&#958;", "description":"кси"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"o", "html_name":"&omicron;", "html_code":"&#959;", "description":"омикрон"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\pi", "html_name":"&pi;", "html_code":"&#960;", "description":"пи"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\varpi", "html_name":"&piv;", "html_code":"&#982;", "description":"пи"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\rho", "html_name":"&rho;", "html_code":"&#961;", "description":"ро"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\varrho", "html_name":"&varrho;", "html_code":"&#1009;", "description":"ро"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\sigma", "html_name":"&sigma;", "html_code":"&#963;", "description":"сигма"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\varsigma", "html_name":"&sigmaf;", "html_code":"&#962;", "description":"сигма"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\tau", "html_name":"&tau;", "html_code":"&#964;", "description":"тау"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\upsilon", "html_name":"&upsilon;", "html_code":"&#965;", "description":"апсилон"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\phi", "html_name":"&straightphi;", "html_code":"&#981;", "description":"фи"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\varphi", "html_name":"&phi;", "html_code":"&#966;", "description":"фи"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\chi", "html_name":"&chi;", "html_code":"&#967;", "description":"чи"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\psi", "html_name":"&psi;", "html_code":"&#968;", "description":"пси"}));
	this.greekLettersTable.push(new this.Symbol({"latex":"\\omega", "html_name":"&omega;", "html_code":"&#969;", "description":"омега"}));

	this.math3DObjectsTable = new Array();


	this.Parser = function() {

	};



};
