function init() {
				containerX = document.getElementById('BoB3D');
				renderer = new THREE.WebGLRenderer( { alpha: true } );
				renderer.setSize(  document.getElementById('BoB3D').style.width, document.getElementById('BoB3D').style.height );
				containerX.appendChild( renderer.domElement );
				//

				camera = new THREE.PerspectiveCamera( 70, document.getElementById('BoB3D').style.width / document.getElementById('BoB3D').style.height , 1, 1000 );
				camera.position.z = 400;

				scene = new THREE.Scene();

				var geometry = new THREE.CubeGeometry( 200, 200, 200 );

				var texture = THREE.ImageUtils.loadTexture( '/media/textures/skinnyBobStreamNotLive.jpg' );
				texture.anisotropy = renderer.getMaxAnisotropy();

				var material = new THREE.MeshBasicMaterial( { map: texture } );

				mesh = new THREE.Mesh( geometry, material );
				scene.add( mesh );

				//

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				camera.aspect = document.getElementById('BoB3D').style.width / document.getElementById('BoB3D').style.height;
				camera.updateProjectionMatrix();

				renderer.setSize( document.getElementById('BoB3D').style.width, document.getElementById('BoB3D').style.height );

			}

			function animate() {

				requestAnimationFrame( animate );

				mesh.rotation.x += 0.005;
				mesh.rotation.y += 0.01;

				renderer.render( scene, camera );

			}
