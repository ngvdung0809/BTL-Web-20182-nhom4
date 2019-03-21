<!DOCTYPE html>
<html>
<head>
	<title>3D</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		body{
			position: relative;
			margin: 0;
			overflow: hidden;
		}
		canvas{
			position: absolute;
			left: 0;
			background-color: red;
		}
		#control{
			top: 250px;
			right: 100px;
			position: absolute;
		}
	</style>
</head>
<body>
	<canvas id="myCanvas">
		
	</canvas>
	<script type="text/javascript" src="{{ asset('js/three.min.js') }}"></script>
	<script type="text/javascript">
		var renderer, camera, scene, geometry, material, mesh;
		var size = 50, WIDTH=4*window.innerWidth/5, HEIGHT=window.innerHeight;
		onCreate(size);
	
	function onCreate(aspect){
		console.log(aspect);
		renderer = new THREE.WebGLRenderer({canvas: document.getElementById("myCanvas"), antialias: true}); 
		renderer.setSize(WIDTH, HEIGHT);
		renderer.setClearColor(0x00ff00);
		renderer.setPixelRatio(window.devicePixelRatio);
		
		
		camera = new THREE.PerspectiveCamera(aspect, window.innerWidth/window.innerHeight, 0.1, 3000);
		scene = new THREE.Scene();

		geometry = new THREE.CylinderGeometry(100, 100, 150, 100, 1, false, 0, 2*Math.PI);
		material = new THREE.MeshNormalMaterial();
		mesh = new THREE.Mesh(geometry, material);
		mesh.position.set(0, 0, -1000);
		mesh.rotation.set(0, 0, 0);
		// geometry.translate( 0, 75, 0 );
		scene.add(mesh);

		geometry1 = new THREE.CylinderGeometry(100, 100, 150, 100, 1, false, 0, 2*Math.PI);
		material1 = new THREE.MeshNormalMaterial();
		mesh1 = new THREE.Mesh(geometry1, material1);
		mesh1.position.set(-300, 0, -1000);
		mesh1.rotation.set(0, 0, 0.8);
		scene.add(mesh1);

		geometry2 = new THREE.CylinderGeometry(100, 100, 150, 100, 1, false, 0, 2*Math.PI);
		material2 = new THREE.MeshNormalMaterial();
		mesh2 = new THREE.Mesh(geometry2, material2);
		mesh2.position.set(-600, 0, -1000);
		mesh2.rotation.set(0, 0, 1.2);
		scene.add(mesh2);

		geometry3 = new THREE.CylinderGeometry(100, 100, 150, 100, 1, false, 0, 2*Math.PI);
		material3 = new THREE.MeshNormalMaterial();
		mesh3 = new THREE.Mesh(geometry3, material3);
		mesh3.position.set(300, 0, -1000);
		mesh3.rotation.set(0, 0, 1);
		scene.add(mesh3);

		geometry4 = new THREE.CylinderGeometry(100, 100, 150, 100, 1, false, 0, 2*Math.PI);
		material4 = new THREE.MeshNormalMaterial();
		mesh4 = new THREE.Mesh(geometry4, material4);
		mesh4.position.set(600, 0, -1000);
		mesh4.rotation.set(0, 0, 0.3);
		scene.add(mesh4);

		renderer.render(scene, camera);
		requestAnimationFrame(render);
		function render(){
		
  			mesh.rotation.x = corner;
  			mesh1.rotation.x = corner;
  			mesh2.rotation.x = corner;
  			mesh3.rotation.x = corner;
  			mesh4.rotation.x = corner;
  		
			renderer.render(scene, camera);
			requestAnimationFrame(render);
		}
		
		document.addEventListener('mousemove', handleMouseMove, false);
		var mousePos = { x: 0, y: 0 };
		var corner = Math.PI;
		function handleMouseMove(event) {
 		 	
  			mousePos = {x:event.clientX, y:event.clientY};
  			if(mousePos.y <= 257)
  			corner = Math.PI*1.2;
  			else if(mousePos.y >= 395)
  			corner= -Math.PI*1.2;	
  			else
  				corner = Math.PI;
  			
		}
		
	}
		function zoomOut() {
			if(size > 10)
				size -= 10;
			onCreate(size);
		}
		function zoomInt() {
			if(size < 100)
				size += 10;
			onCreate(size);
		}
		
	</script>
	<div id="control">
		
		<button type="button" class="btn btn-primary" onclick="zoomOut()">ZoomOut</button><hr>
		<button type="button" class="btn btn-secondary" onclick="zoomInt()">ZoomInt</button>

	</div>
	
</body>
</html>