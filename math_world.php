<!DOCTYPE html>
<html>
<head>
	<title>MATH WORLD</title>
	<meta charset="utf-8">
</head>
<body>
<script src='../libs/threejs/build/three.js'></script>
<script src='../libs/threejs/examples/js/loaders/OBJLoader.js'></script>
<script src='../libs/threejs/examples/js/loaders/ColladaLoader.js'></script>
<script src='../libs/threejs/examples/js/controls/FirstPersonControls.js'></script>
<script src='../libs/threejs/src/extras/THREEx/THREEx.FullScreen.js'></script>
<script src='../libs/threejs/src/extras/THREEx/THREEx.KeyboardState.js'></script>
<script src='../libs/threejs/src/extras/THREEx/THREEx.WindowResize.js'></script>

<script src="../libs/threejs/examples/fonts/gentilis_bold.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/gentilis_regular.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/optimer_bold.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/optimer_regular.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/helvetiker_bold.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/helvetiker_regular.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/droid/droid_sans_regular.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/droid/droid_sans_bold.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/droid/droid_serif_regular.typeface.js"></script>
<script src="../libs/threejs/examples/fonts/droid/droid_serif_bold.typeface.js"></script>
<script>

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

	function setNewColors(scene, objects_array)
	{		
		for (var i = 0; i < objects_array.length; i++)
		{
			objects_array[i].material.emissive.setHex(Math.random() * 0xffffff);
		}
		for(var i = 0; i < scene.children.length; i++)
		{
				scene.children[i].material.emissive.setHex(Math.random() * 0xffffff);
		}
	}

	function rotateElements(scene)
	{
		for(i = 0; i < scene.children.length; i++)
		{
			scene.children[i].rotation.x += 0.1;
		}
	}

	function createLine(scene, count, objects_array)
	{
		var CubeParameters = new Cube_Parameters();
		for (var i = 0; i < count; i++)
		{
			var cube_material = new THREE.MeshLambertMaterial({color: 0xb55489, side: THREE.DoubleSide});
			var cube_geometry = new THREE.CubeGeometry(
									CubeParameters.Width,
									CubeParameters.Height,
									CubeParameters.Depth
													);
			var cube = new THREE.Mesh(cube_geometry, cube_material);
			if (objects_array.length == 0)
				cube.position.set(0, 100, 0);
			else
				cube.position.set(
					0, 
					objects_array[objects_array.length - 1].position.y + CubeParameters.Width + CubeParameters.Separator,
					0);
			scene.add(cube);
			objects_array.push(cube);
			cube = null;
		}
	}

	function rotateCamera(camera)
	{
		camera.rotate.z += 0.3;
	}
	
	function getChar(event) 
	{
   	  if (event.which == null) { // IE
	    if (event.keyCode < 32) return null; // спец. символ
	    return String.fromCharCode(event.keyCode)
	  }

	  if (event.which != 0 && event.charCode != 0) { // все кроме IE
	    if (event.which < 32) return null; // спец. символ
	    return String.fromCharCode(event.which); // остальные
	  }

	  return null; // спец. символ
	}
/*
	function collisionDetection(element1, element1)
	{
		if (element1.position.x == )
	}
*/
</script>


<script>

	function MathWorld()
	{

		var container, scene, camera, renderer, controls, stats;
		var angle;
		angle = 0.0;
		var raycaster = new THREE.Raycaster();
		var mouse_vector = new THREE.Vector2(), INTERSECTED, integral, radical;
		var ScreenParameters = new Screen_Parameters();
		var CameraSettings = new Camera_Settings();
		var keyboard = new THREEx.KeyboardState();
		var clock = new THREE.Clock();

		var planes = [];
		var balls = [];
		var cubes = [];
		function onMouseMove(event)
		{
			mouse_vector.x = (event.clientX / window.innerWidth) * 2 - 1;
			mouse_vector.y = - (event.clientY / window.innerHeight) * 2 + 1;
		}


		window.addEventListener('mousemove', onMouseMove, false);

			//threejs elements


		container = document.createElement("div");
		container.style.position = "absolute";
		container.style.top = "-10px";
		container.style.left = "-10px";
		document.body.appendChild(container);

		//SCENE
		scene = new THREE.Scene();
		//END OF SCENE

		//CAMERA
		camera = new THREE.PerspectiveCamera(CameraSettings.View_Angle, 
											 CameraSettings.Aspect_Ratio, 
											 CameraSettings.Near, 
											 CameraSettings.Far);

		camera.position.set(-100,0, 500);
		//END OF CAMERA DEFINITION
		
		//RENDERER
		renderer = new THREE.WebGLRenderer();
		renderer.setSize(ScreenParameters.Width, ScreenParameters.Height);
		container.appendChild(renderer.domElement);
		//END OF RENDERER DEFINITION

		THREEx.WindowResize(renderer, camera);
		THREEx.FullScreen.bindKey({ charCode : 'm'.charCodeAt(0) });

// OBJECTS DOWNLOAD AND DEFINITIONS

		var plane_geometry = new THREE.PlaneGeometry(10000, 300, 4000);
		var plane_material = new THREE.MeshLambertMaterial({color: 0xb55489, side: THREE.DoubleSide});
		var plane = new THREE.Mesh(plane_geometry, plane_material);
		plane.position.set(0,0,0);

		scene.add(plane);

		var loader = new THREE.ColladaLoader();
		loader.load(
			"resources/3D/Integral.dae",
			function(collada)
			{
				collada.scene.traverse(function(object)
				{
					if (object instanceof THREE.Mesh)
					{
						integral = object;
						scene.add(integral);
					}
				});
			}
		);
		loader.load(			
			"resources/3D/radical.dae",
			function(collada)
			{
				collada.scene.traverse(function(object)
				{
					if (object instanceof THREE.Mesh)
					{
						radical = object;
						radical.position.set(100, 100, 100);
						scene.add(radical);
					}
				});
			}
		);

				// add 3D text
		var materialSide = new THREE.MeshLambertMaterial( { color: 0x003388 } );
		var materialArray = [ materialSide];
		var textGeom = new THREE.TextGeometry( "Hello, World!", 
		{
			size: 30, height: 4, curveSegments: 3,
			font: "helvetiker", weight: "bold", style: "normal",
			bevelThickness: 1, bevelSize: 2, bevelEnabled: true,
			material: 0, extrudeMaterial: 1
		});
		// font: helvetiker, gentilis, droid sans, droid serif, optimer
		// weight: normal, bold
		
		var textMesh = new THREE.Mesh(textGeom, materialSide );
		
		textGeom.computeBoundingBox();
		var textWidth = textGeom.boundingBox.max.x - textGeom.boundingBox.min.x;
		
		textMesh.position.set( -0.5 * textWidth, 50, 100 );
		textMesh.rotation.x = -Math.PI / 4;
		scene.add(textMesh);








		// OUR GLOBAL LIGHTS
		var	light = new THREE.PointLight(0xffffff, 1.8, 80000); // цвет, интенсивность, расстояние 
		light.position.set(0,0,0); // устанавливаем позицию по x, y, z
		light.castShadow = true;
		light.shadowMapWidth = 2048; // ставим качество тени 
		light.shadowMapHeight = 2048;
		scene.add(light);
		// END OF GLOBAL LIGHTS

		//FIRST_PERSON_CAMERA_CONTROLS
		controls = new THREE.FirstPersonControls(camera);
		controls.movementSpeed = 2;
		controls.lookSpeed = 0.001;
		//FIRST_PERSON_CAMERA_CONTROLS_END

//END OF OBJECTS DOWNLOAD AND DEFINITIONS

//SET KEYBOARD BINDINGS
		


//END OF KEYBOARD BINDINGS


		createLine(scene, 1000, cubes);
		
		setInterval(function(){
			setNewColors(scene, cubes);
		}, 1000);		
		setInterval(function(){
			radical.rotation.x += 0.02;
			radical.rotation.y += 0.02;
		}, 100);		


		function animate()
		{


			raycaster.setFromCamera(mouse_vector, camera);

			var intersects = raycaster.intersectObjects(scene.children);

			if (intersects.length > 0)
			{
				if(INTERSECTED != intersects[0].object)
				{
					if(INTERSECTED)
						INTERSECTED.material.emissive.setHex(INTERSECTED.currentHex);
					INTERSECTED = intersects[0].object;
					INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
					INTERSECTED.material.emissive.setHex(0xff0000);
				}
				
				
			}else
			{
				if (INTERSECTED)
					INTERSECTED.material.emissive.setHex(INTERSECTED.currentHex);
				INTERSECTED = null;
			}

			requestAnimationFrame(animate);
				controls.update(1);
			renderer.render(scene, camera);
			

		}
		animate();	

	}
//END OF MathWorld FUNCTION


// START THE PROGRAM
	MathWorld();



</script>



</body>
</html>
