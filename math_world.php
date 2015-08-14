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

<script src='../resources/js/MathWorld_extra_functions.js'></script>

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
		var angle = 0.0;
		var raycaster = new THREE.Raycaster();
		var mouse_vector = new THREE.Vector2(), INTERSECTED, integral, radical, pi, nable;
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

		var Wall_Plane_g = new THREE.PlaneGeometry(10000, 300, 4000);
		var Wall_Plane_m = new THREE.MeshLambertMaterial({color: 0xb55489, side: THREE.DoubleSide});
		var Wall_Plane = new THREE.Mesh(Wall_Plane_g, Wall_Plane_material);
		Wall_Plane.position.set(0,0,0);

		scene.add(Wall_Plane);

		var collada_loader = new THREE.ColladaLoader();
		collada_loader.load(
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
		collada_loader.load(			
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
		collada_loader.load(			
			"resources/3D/pi.dae",
			function(collada)
			{
				collada.scene.traverse(function(object)
				{
					if (object instanceof THREE.Mesh)
					{
						pi = object;
						pi.position.set(500, 100, 100);
						scene.add(pi);
					}
				});
			}
		);

		var obj_loader = new THREE.OBJLoader();
		obj_loader.load(			
			"resources/3D/nabla.obj",
			function(object)
			{
				nabla = object;
				nabla.position.set(100, 100, 400);
				nabla.scale.set(100, 100, 100);
				scene.add(nabla);
			}
		);


				// add 3D text
		var materialSide = new THREE.MeshLambertMaterial( { color: 0x003388 } );
		var materialArray = [ materialSide];
		var textGeom = new THREE.TextGeometry( "+ - * / = () {}", 
		{
			size: 30, height: 4, curveSegments: 3,
			font: "helvetiker",  style: "normal",
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
		
		setInterval(function(){
			radical.rotation.x += 0.02;
			radical.rotation.y += 0.02;
		}, 100);		

		camera.lookAt(Wall_Plane.position);
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
