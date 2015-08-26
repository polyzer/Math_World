MathWorld.World = function()
	{

		var raycaster = new THREE.Raycaster();
		var mouse_vector = new THREE.Vector2(), INTERSECTED;
		var keyboard = new THREEx.KeyboardState();
		var clock = new THREE.Clock();


		function onMouseMove(event)
		{
			mouse_vector.x = (event.clientX / window.innerWidth) * 2 - 1;
			mouse_vector.y = - (event.clientY / window.innerHeight) * 2 + 1;
		}
		window.addEventListener('mousemove', onMouseMove, false);

			//threejs elements



// OBJECTS DOWNLOAD AND DEFINITIONS

		var Wall_Plane_g = new THREE.PlaneGeometry(10000, 300, 4000);
		var Wall_Plane_m = new THREE.MeshLambertMaterial({color: 0xffffff, side: THREE.DoubleSide, emissive:0xffffff});
		var Wall_Plane = new THREE.Mesh(Wall_Plane_g, Wall_Plane_m);
		Wall_Plane.position.set(0,0,0);
		MathWorld.MainScene.add(Wall_Plane);

		var scene2 = new THREE.Scene();
		scene2.position.set(1000, 1000, 1000);
		MathWorld.MainScene.add(scene2);
		scene2.updateMatrix();

				// add 3D text
		var materialSide = new THREE.MeshLambertMaterial( { color: 0x003388 } );
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
		MathWorld.MainScene.add(textMesh);

		// OUR GLOBAL LIGHTS
		var	light = new THREE.PointLight(0xffffff, 100, 800000); // цвет, интенсивность, расстояние 
		light.position.set(MathWorld.MainCamera.position.x, 
						   MathWorld.MainCamera.position.y, 
						   MathWorld.MainCamera.position.z); // устанавливаем позицию по x, y, z
		MathWorld.MainScene.add(light);

		var mymeshes = new Array();

		for (var i = 0; i < 150; i++) 
		{
			var mesh = MathWorld.all3DObjectsTable[Math.round(Math.random() * 
												   (MathWorld.all3DObjectsTable.length - 1))].Mesh.clone();

			mesh.position.x = Math.round(Math.random() * (1000 + 1000)) - 1000;
			mesh.position.y = Math.round(Math.random() * (1000 + 1000)) - 1000;
			mesh.position.z = Math.round(Math.random() * (1000 + 1000)) - 1000;

			mesh.rotation.x = Math.random();
			mesh.rotation.y = Math.random();
			mesh.rotation.z = Math.random();

			mesh.scale.set(100, 100, 100);

			MathWorld.objMaterialProperty({
				"value": 0x003388,
				"property": "color",
				"obj": mesh
			});

			mymeshes.push(mesh);
			scene2.add(mesh);
//			scene2.add(mesh);

		}


		setInterval(function() {
			scene2.rotation.x += 0.001;
			scene2.rotation.y += 0.001;
			scene2.updateMatrix();
		},20);
















		MathWorld.MainCamera.lookAt(Wall_Plane.position);
		function animate()
		{
/*
			raycaster.setFromCamera(mouse_vector, MathWorld.MainCamera);

			var intersects = raycaster.intersectObjects(MathWorld.MainScene.children);

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
*/
			requestAnimationFrame(animate);
				MathWorld.MainControls.update(1);
			MathWorld.MainRenderer.render(MathWorld.MainScene, MathWorld.MainCamera);
			
		}
		animate();	

	}
//END OF MathWorld FUNCTION


// START THE PROGRAM

