var MathWorld = new function() 
{
	// classes
	var _Screen_Parameters;
	var _Camera_Settings;
	var _Cube_Parameters;
	var _Symbol;
	var _Math_Element;
	var _Math_3D_Object;
	var _MathML_Tag;
	var _Parser;
	//Global MathWorld Objects
		//Tables
	var mathSymbolsTable;
	var englishLettersTable;
	var englishLettrsNames;
	var greekLettersTable;
	var greekLettersNames;
	var math3DObjectsTable;
	var math3DObjectsNames;
	var MathMLTagsTable;
	var mathFormulaScenes;
	var mathFormulaNames;
		// Loaders & Functions
	var ColladaLoader;
		// Funcs
	var load3DObjectByName;
	var load3DColladaScenes;
	var objMaterialProperty;
	var getSizeOfObject();
	var Starter;

	//MainObjects
	var MainScene;
	var MainCamera;
	var MainContainer;
	var MainRanderer;
	var MainControls;
	var MainStats;
	var MainCameraSettings;
	var MainScreenParameters;

	var World;



	this.ColladaLoader = new THREE.ColladaLoader();



// FUNCS DEFINITIONS
	
	this.objMaterialProperty = function(parameters_json)
	{
		if (parameters_json)
		{
			if (parameters_json.value){
				parameters_json.obj.material[parameters_json.property].set(parameters_json.value);
			} else
			{
				return parameters_json.obj.material[parameters_json.property].getHexString();
			}
		}

	}

	this.getSizeOfObject = function(parameters_json)
	{
		if (parameters_json)
		{
			parameters_json.geometry.computeBoundingBox();
			var ret = new Object();
			ret.x = parameters_json.geometry.boundingBox.max.x - parameters_json.geometry.boundingBox.min.x;
			ret.y = parameters_json.geometry.boundingBox.max.y - parameters_json.geometry.boundingBox.min.y;
			ret.z = parameters_json.geometry.boundingBox.max.z - parameters_json.geometry.boundingBox.min.z;
			return ret;
		}
	}

	function load3DObjectByName(name, loader)
	{
	    return new Promise(
		    function(resolve) 
		    {
		        loader.load(
		            "resources/3D/math.dae",
		            function(collada) 
		            {
		            	var obj;
		                obj = collada.scene.getChildByName(name, true);
		                resolve(obj);
		            }
		        );
		    }
		);
	}



//	function load3DColladaScenes(name, loader)


// CLASSES DEFINITIONS

	this._Screen_Parameters = function()
	{
		var Height;
		var Width;

		this.Height = parseInt(window.innerHeight);
		this.Width = parseInt(window.innerWidth);

	};

	this._Camera_Settings = function(parameters_json) 
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
	
	this._Cube_Parameters = function()
	{
		var Width, Height, Depth, Separator;
		this.Width = this.Height = this.Depth = 20;
		this.Separator = 10;
	};

	this._Math_Element = function()
	{ // следующие элементы представляются не в кодах, а как есть
		var Childs; //массив с вложенными конструкциями: если есть, определен, имеет потомков, если нет = null
		var Type; // operation = o | identificator = i | number = n | container = c
		var HTMLSymbol; // HTML значение содержимого
		var MathObject3D; // 3D объект, который будет в сцене
		var Name;
		var MathMLTag;
	};

	this._MathML_Tag = function() 
	{
		var Name;
		var Type; //container | opration | identificator | number
	}

	this._Symbol = function (args_json){
		var htmlCode;
		var htmlName;
		var keySym;
		var javascriptUnicode;
		var description;
		var latex;

		this.htmlCode = null;
		this.htmlName = null;
		this.javascriptUnicode = null;
		this.description = null;
		this.latex = null;
		this.keySym = null;

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

			if (typeof this.parameters.keySym !== "undefined")
				this.keySym = this.parameters.keySym;

		}
	};

	this.Parser = function() {
			function parseMathMLto3D(MathMLCode) {
				// получаем ноду со входом в код = тэг <math>
				var mathMLHeadNode = MathMLCode.getElementsByTagName("math")[0];
				window.alert(mathMLHeadNode);
			}
	};




// MATHWORLD OBJECTS initialisations


	this.mathSymbolsTable = new Array();

	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\times", "html_name":"&times;", "html_code":"&#215;", "description":"умножение"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\div","html_name":"&divide;", "html_code":"&#247;", "description":"деление"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\lt","html_name":"&lt;", "html_code":"&#60;", "description":"меньше"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\gt", "html_name":"&gt;", "html_code":"&#62;", "description":"больше"}));
	this.mathSymbolsTable.push(new this._Symbol({"html_name":"&fnof;", "html_code":"&#402;", "description":"функция"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\plus", "html_name":"&plus;", "html_code":"&#43;", "description":"плюс"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\minus", "html_name":"&minus;", "html_code":"&#45;", "description":"минус"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\minus", "html_name":"&minus;", "html_code":"&#8722;", "description":"минус"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\ast", "html_name":"&lowast;", "html_code":"&#8727;", "description":"сопряжение"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\sqrt{},\\sqrt[]{}", "html_name":"&radic;", "html_code":"&#8730;", "description":"корень"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\propto", "html_name":"&prop;", "html_code":"&#8733;", "description":"пропорциональность"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\infty", "html_name":"&infin;", "html_code":"&#8734;", "description":"бесконечность"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\angle", "html_name":"&ang;", "html_code":"&#8736;", "description":"угол"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\wedge", "html_name":"&and;", "html_code":"&#8743;", "description":"и"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\vee", "html_name":"&or;", "html_code":"&#8744;", "description":"или"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\cap", "html_name":"&cap;", "html_code":"&#8745;", "description":"пересечение"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\cup", "html_name":"&cup;", "html_code":"&#8746;", "description":"объединение"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\int", "html_name":"&int;", "html_code":"&#8747;", "description":"интеграл"}));
	this.mathSymbolsTable.push(new this._Symbol({"html_name":"&there4;", "html_code":"&#8756;", "description":"поэтому"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\sim", "html_name":"&sim;", "html_code":"&#8764;", "description":"подобно"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\cong", "html_name":"&cong;", "html_code":"&#8773;", "description":"сравнимо"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\approx", "html_name":"&asymp;", "html_code":"&#8776;", "description":"приблизительно равно"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\neq", "html_name":"&ne;", "html_code":"&#8800;", "description":"не равно"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\equiv", "html_name":"&equiv;", "html_code":"&#8801;", "description":"идентично"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\le", "html_name":"&le;", "html_code":"&#8804;", "description":"меньше или равно"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\ge", "html_name":"&ge;", "html_code":"&#8805;", "description":"больше или равно"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\subset", "html_name":"&sub;", "html_code":"&#8834;", "description":"подмножество"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\supset", "html_name":"&sup;", "html_code":"&#8835;", "description":"надмножестов"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"", "html_name":"&nsub;", "html_code":"&#8836;", "description":"не подмножество"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\subseteq", "html_name":"&sube;", "html_code":"&#8838;", "description":"подмножество"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\supseteq", "html_name":"&supe;", "html_code":"&#8839;", "description":"надмножество"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\oplus", "html_name":"&oplus;", "html_code":"&#8853;", "description":"прямая сумма"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\otimes", "html_name":"&otimes;", "html_code":"&#8855;", "description":"тензерное произведение"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\perp", "html_name":"&perp;", "html_code":"&#8869;", "description":"перпендикуляр"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\cdot", "html_name":"&sdot;", "html_code":"&#8836;", "description":"оператор точка"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\pm", "html_name":"&plusmn;", "html_code":"&#177;", "description":"плюс|минус"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\forall", "html_name":"&forall;", "html_code":"&#8704;", "description":"для каждого"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\partial", "html_name":"&part;", "html_code":"&#8706;", "description":"часть"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\exists", "html_name":"&exist;", "html_code":"&#8707;", "description":"существует"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\emptyset", "html_name":"&empty;", "html_code":"&#8709;", "description":"пустой"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\nabla", "html_name":"&nabla;", "html_code":"&#8711;", "description":"оператор Гамильтона (набла)"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\isin", "html_name":"&isin;", "html_code":"&#8712;", "description":"принадлежит к множеству"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"", "html_name":"&notin;", "html_code":"&#8713;", "description":"не принадлежит к множеству"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\ni", "html_name":"&ni;", "html_code":"&#8715;", "description":"содержит"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"", "html_name":"&prod;", "html_code":"&#8719;", "description":"произведение"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\Sigma", "html_name":"&sum;", "html_code":"&#8721;", "description":"сумма"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\Rightarrow", "html_name":"&rArr;", "html_code":"&#8658;", "description":"следует"}));
	this.mathSymbolsTable.push(new this._Symbol({"latex":"\\Leftrightarrow", "html_name":"&hArr;", "html_code":"&#8660;", "description":"равносильно"}));

	this.greekLettersTable = new Array();

	this.greekLettersTable.push(new this._Symbol({"latex":"\\alpha", "html_name":"&alpha;", "html_code":"&#945;", "description":"альфа"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\beta", "html_name":"&beta;", "html_code":"&#946;", "description":"бета"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\gamma", "html_name":"&gamma;", "html_code":"&#947;", "description":"гамма"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\delta", "html_name":"&delta;", "html_code":"&#948;", "description":"дельта"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\epsilon", "html_name":"&straightepsilon;", "html_code":"&#1013;", "description":"эпсилон"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\varepsilon", "html_name":"&epsilon;", "html_code":"&#949;", "description":"эпсилон"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\zeta", "html_name":"&zeta;", "html_code":"&#950;", "description":"зета"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\eta", "html_name":"&eta;", "html_code":"&#951;", "description":"эта"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\theta", "html_name":"&theta;", "html_code":"&#952;", "description":"сета"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\vartheta", "html_name":"&thetasym;", "html_code":"&#977;", "description":"сета"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\iota", "html_name":"&iota;", "html_code":"&#953;", "description":"йота"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\kappa", "html_name":"&kappa;", "html_code":"&#954;", "description":"каппа"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\lambda", "html_name":"&lambda;", "html_code":"&#955;", "description":"лямбда"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\mu", "html_name":"&mu;", "html_code":"&#956;", "description":"мю"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\nu", "html_name":"&nu;", "html_code":"&#957;", "description":"ню"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\xi", "html_name":"&xi;", "html_code":"&#958;", "description":"кси"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"o", "html_name":"&omicron;", "html_code":"&#959;", "description":"омикрон"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\pi", "html_name":"&pi;", "html_code":"&#960;", "description":"пи"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\varpi", "html_name":"&piv;", "html_code":"&#982;", "description":"пи"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\rho", "html_name":"&rho;", "html_code":"&#961;", "description":"ро"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\varrho", "html_name":"&varrho;", "html_code":"&#1009;", "description":"ро"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\sigma", "html_name":"&sigma;", "html_code":"&#963;", "description":"сигма"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\varsigma", "html_name":"&sigmaf;", "html_code":"&#962;", "description":"сигма"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\tau", "html_name":"&tau;", "html_code":"&#964;", "description":"тау"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\upsilon", "html_name":"&upsilon;", "html_code":"&#965;", "description":"апсилон"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\phi", "html_name":"&straightphi;", "html_code":"&#981;", "description":"фи"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\varphi", "html_name":"&phi;", "html_code":"&#966;", "description":"фи"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\chi", "html_name":"&chi;", "html_code":"&#967;", "description":"чи"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\psi", "html_name":"&psi;", "html_code":"&#968;", "description":"пси"}));
	this.greekLettersTable.push(new this._Symbol({"latex":"\\omega", "html_name":"&omega;", "html_code":"&#969;", "description":"омега"}));

	this.math3DObjectsTable = new Object();
	this.math3DObjectsNames = new Array();

	this.math3DObjectsNames.push("");
	this.math3DObjectsNames.push("Pi");
	this.math3DObjectsNames.push("integral");
	this.math3DObjectsNames.push("radical");
	this.math3DObjectsNames.push("sum");
	this.math3DObjectsNames.push("infinity");



	this.MainScene = new THREE.Scene();

		//CAMERA
	this.MainCameraSettings = new this._Camera_Settings();
	this.MainScreenParameters = new this._Screen_Parameters();


	this.MainCamera = new THREE.PerspectiveCamera(
										 this.MainCameraSettings.View_Angle, 
										 this.MainCameraSettings.Aspect_Ratio, 
										 this.MainCameraSettings.Near, 
										 this.MainCameraSettings.Far
										 );

	this.MainCamera.position.set(-100,0, 500);
		//END OF CAMERA DEFINITION


	this.MainContainer = document.createElement("div");
	this.MainContainer.style.position = "absolute";
	this.MainContainer.style.top = "-10px";
	this.MainContainer.style.left = "-10px";
	document.body.appendChild(this.MainContainer);


		
		//RENDERER
	this.MainRenderer = new THREE.WebGLRenderer();
	this.MainRenderer.setSize(this.MainScreenParameters.Width, this.MainScreenParameters.Height);
	this.MainContainer.appendChild(this.MainRenderer.domElement);
		//END OF RENDERER DEFINITION

	this.MainControls = new THREE.FirstPersonControls(this.MainCamera);
	this.MainControls.movementSpeed = 2;
	this.MainControls.lookSpeed = 0.001;


	THREEx.WindowResize(this.MainRenderer, this.MainCamera);
	THREEx.FullScreen.bindKey({ charCode : 'm'.charCodeAt(0) });



	this.Starter = function()
	{
		// Сперва загружаем 3Д-модели мат объектов
		Promise.all(this.math3DObjectsNames.map(
			function(name) 
			{
				var prom = load3DObjectByName(name, this.ColladaLoader);
				prom.then(function (obj) {
					MathWorld.math3DObjectsTable[obj.name] = obj;
				});
				return prom;
			},this // контекст
											   )
// Здесь уже можно работать дальше
		).then(function () {
			MathWorld.World();
		});			
	
	}

	this.Starter();// запускаем загрузку всех Ajax ресурсов

};
