<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>3D</title>
	<link href="{{ asset('css/babylon.css') }}" rel="stylesheet">
	<script src="{{ asset('js/babylon.js') }}"></script>
</head>
<body>
	<canvas id="render-canvas"></canvas>
	<script>
		//get object
	    var canvas = document.getElementById("render-canvas");
	    
	    //Initialising the Babylon.js engine
	    var engine = new BABYLON.Engine(canvas);

	    //Creating a scene
	    var scene = new BABYLON.Scene(engine);
	    scene.clearColor = new BABYLON.Color3(0.8, 0.8, 0.8);

	    //Creating a camera
	    var camera = new BABYLON.ArcRotateCamera("camera", 5, 1, 50, BABYLON.Vector3.Zero(), scene);
        camera.attachControl(canvas, true);

        camera.useFramingBehavior = true;

	    //Let there be lightSection
	    var light = new BABYLON.PointLight("light", new BABYLON.Vector3(10, 10, 10), scene);

	    //Cylinder 1
	    var cylinder1 = BABYLON.Mesh.CreateCylinder("cylinder1", 2, 2, 2, 12, 1, scene);
	    cylinder1.position.x = -10;
	    cylinder1.rotation.x = -0.5;
	    var cylinder1Material = new BABYLON.StandardMaterial("material", scene);
	    cylinder1Material.emissiveColor = new BABYLON.Color3(0, 0.5, 1);
	    cylinder1.material = cylinder3Material;

	    //Cylinder 2
	    var cylinder2 = BABYLON.Mesh.CreateCylinder("cylinder2", 2, 2, 2, 12, 1, scene);
	    cylinder2.position.x = 0;
	    cylinder2.position.y = 8;
	    cylinder2.rotation.y = -0.5;
	    var cylinder2Material = new BABYLON.StandardMaterial("material", scene);
	    cylinder2Material.emissiveColor = new BABYLON.Color3(1, 0.5, 1);
	    cylinder2.material = cylinder2Material;

	    //Cylinder3
	    var cylinder3 = BABYLON.Mesh.CreateCylinder("cylinder3", 2, 2, 2, 12, 1, scene);
	    cylinder3.position.x = 0;
	    cylinder3.rotation.x = -0.5;
	    var cylinder3Material = new BABYLON.StandardMaterial("material", scene);
	    cylinder3Material.emissiveColor = new BABYLON.Color3(0.7, 0.5, 0.2);
	    cylinder3.material = cylinder3Material;

	    //cylinder 4
	    var cylinder4 = BABYLON.Mesh.CreateCylinder("cylinder4", 2, 2, 2, 12, 1, scene);
	    cylinder4.position.x = 0;
	    cylinder4.position.y = -8;
	    cylinder4.rotation.x = 1.5;
	    var cylinder4Material = new BABYLON.StandardMaterial("material", scene);
	    cylinder4Material.emissiveColor = new BABYLON.Color3(1, 0.3, 0.1);
	    cylinder4.material = cylinder4Material;

	    //cylinder5
	    var cylinder5 = BABYLON.Mesh.CreateCylinder("cylinder5", 2, 2, 2, 12, 1, scene);
	    cylinder5.position.x = 10;
	    cylinder5.rotation.x = -0.5;
	    var cylinder5Material = new BABYLON.StandardMaterial("material", scene);
	    cylinder5Material.emissiveColor = new BABYLON.Color3(0, 0.5, 1);
	    cylinder5.material = cylinder5Material;

	    //Creating a rendering loop
	    var t = 0;
	    var renderLoop = function () {
	        scene.render();
	        t -= 0.01;
	        cylinder1.rotation.y = t*2;
	        cylinder2.rotation.x = t*2;
	        cylinder3.position.y = Math.sin(t*3);
	        cylinder4.rotation.z = t*2;
	        cylinder5.rotation.y = t*2;
	    };
	    engine.runRenderLoop(renderLoop);
	</script>
</body>
</html>