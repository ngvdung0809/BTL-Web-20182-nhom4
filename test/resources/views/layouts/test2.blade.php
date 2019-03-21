<!DOCTYPE html>
<html>
<head>
	<title>ThreeJS</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://threejs.org/build/three.min.js"></script>
<script src="https://threejs.org/examples/js/controls/OrbitControls.js"></script>

	<style>
		body {
			background-color: #000;
			margin: 0px;
			overflow: hidden;
			float: left;
		}
		#zoom{
			top: 250px;
			right: 100px;
			position: absolute;
		}
	</style>
</head>
<body>		
	<script>
// Simple three.js example

	var mesh1, mesh2, mesh3, mesh4, mesh5, renderer, scene, camera,  controls;

	init();
	animate();



	function init() {

		
	    // renderer
	    renderer = new THREE.WebGLRenderer(); 
	    renderer.setSize( window.innerWidth, window.innerHeight );
	    document.body.appendChild( renderer.domElement );

	    // scene
	    scene = new THREE.Scene();
	    
	    // camera
	    camera = new THREE.PerspectiveCamera( 100, window.innerWidth / window.innerHeight, 1, 10000 );
	    camera.position.set( 0, 0, 50 );
	    
	    // ambient
	    scene.add( new THREE.AmbientLight( 0x222222 ) );
	    
	    // light
	    var light = new THREE.DirectionalLight( 0xffffff, 1 );
	    light.position.set( 20, 20, 0 );
	    scene.add( light );
	    
	    
		var axesHelper = new THREE.AxesHelper( 500 );
		scene.add( axesHelper );

	    // geometry
	    //1
	    var geometry = new THREE.CylinderGeometry( 5, 5, 20, 32 );    
	    // material
	    var material = new THREE.MeshPhongMaterial( {
	        color: 0x00ffff, 
	        flatShading: true,
	        transparent: true,
	        opacity: 0.7,
	    } );    
	    // mesh
	    mesh1 = new THREE.Mesh( geometry, material );
	    scene.add( mesh1 );
	    mesh1.position.setX(-30);


	    //2
	    var geometry = new THREE.CylinderGeometry( 5, 5, 20, 32 );    
	    // material
	    var material = new THREE.MeshPhongMaterial( {
	        color: 0x00ffff, 
	        flatShading: true,
	        transparent: true,
	        opacity: 0.7,
	    } );    
	    // mesh
	    mesh2 = new THREE.Mesh( geometry, material );
	    scene.add( mesh2 );
	    mesh2.position.setX(-15);


	    //3
	    var geometry = new THREE.CylinderGeometry( 5, 5, 20, 32 );    
	    // material
	    var material = new THREE.MeshPhongMaterial( {
	        color: 0x00ffff, 
	        flatShading: true,
	        transparent: true,
	        opacity: 0.7,
	    } );    
	    // mesh
	    mesh3 = new THREE.Mesh( geometry, material );
	    scene.add( mesh3 );
	    mesh3.position.setX(0);


	    //4
	    var geometry = new THREE.CylinderGeometry( 5, 5, 20, 32 );    
	    // material
	    var material = new THREE.MeshPhongMaterial( {
	        color: 0x00ffff, 
	        flatShading: true,
	        transparent: true,
	        opacity: 0.7,
	    } );
	    // mesh
	    mesh4 = new THREE.Mesh( geometry, material );
	    scene.add( mesh4 );
	    mesh4.position.setX(15);


	    //5
	    var geometry = new THREE.CylinderGeometry( 5, 5, 20, 32 );    
	    // material
	    var material = new THREE.MeshPhongMaterial( {
	        color: 0x00ffff, 
	        flatShading: true,
	        transparent: true,
	        opacity: 0.7,
	    } );    
	    // mesh
	    mesh5 = new THREE.Mesh( geometry, material );
	    scene.add( mesh5 );
	    mesh5.position.setX(30);
			
			// controls
	    controls = new THREE.OrbitControls( camera, renderer.domElement );
		controls.target = mesh3.position;

		
	}

	function animate() {

	    requestAnimationFrame( animate );
	    
	    renderer.render( scene, camera );

	}

	function zoomIn() {
		var carx =  camera.position.x;
		var cary =  camera.position.y;
		var carz = camera.position.z;
		if(carz>=20)
			{
				carz-=10;
			}
		camera.position.set(carx, cary, carz);
		controls.update();


	}

	function zoomOut() {
		var carx =  camera.position.x;
		var cary =  camera.position.y;
		var carz = camera.position.z;
		carz+=10;
		camera.position.set(carx, cary, carz);
		controls.update();

	}
	</script>
	<div id="zoom">
		<button id="zoom-out" type="button" onclick="zoomOut()">ZoomOut</button><br>
		<button id="zoom-in" type="button" onclick="zoomIn()">ZoomIn</button>

	</div>
	
</body>
</html>