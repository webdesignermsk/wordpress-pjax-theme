var $ = jQuery;

//nav toggle
$('#nav-toggle').on('click',function(){
	$('header').toggleClass('header-active');
});

$('.menu-item.menu-item-has-children>a').on('click',function(e){
	if($(window).width()<1220){
		e.preventDefault();
		$(this).next().toggleClass('sub-menu--active');
	}
})


//lazy loading
function lazyInit(){
    $('.lazy-img').Lazy({
        afterLoad: function(element){
            imagesLoaded(element,function(){
                element.parent().addClass('loaded');
            });
        }
    });
}
lazyInit();
//smooth scroll to anchor
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});

//animations

//appearence animation on scroll
$('.appear').each(function() {
    let el = $(this);
    let inview = el.waypoint(function(direction) {
        el.addClass('visible');
    }, {
        offset: '95%'
    });
});

$('.svg-animation').each(function() {
    let el = $(this);
    let inview = el.waypoint(function(direction) {
        setTimeout(function(){
            el.addClass('animation-active');
          }, 1000);
    }, {
        offset: '95%'
    });
});

//cubes scene
$( document ).ready(function() {
  $('#cubesScene').each(function(){
  	let elementDom = this;
    let element = $(this);
  	let scene = new THREE.Scene();
  	let w = h =  $(this).width();
  	let camera = new THREE.PerspectiveCamera( 30, element.width() / element.width(), 0.01, 1000 );

  	let renderer = new THREE.WebGLRenderer({ alpha: true , antialias: true});
  	renderer.setSize( element.width()*1, element.width()*1 );
    renderer.setPixelRatio(window.devicePixelRatio);
  	elementDom.appendChild( renderer.domElement );


  	//light
  	let light = new THREE.DirectionalLight(0xefefef, 2);
      // you set the position of the light and it shines into the origin
      light.position.set(-5,5,30).normalize();
      scene.add(light);
      
      // add ambient light
      // subtle blue
      let ambientLight = new THREE.AmbientLight(0x000022);
      scene.add(ambientLight);

  	let geometry = new THREE.BoxGeometry( 1, 1, 1 );
  	let material = new THREE.MeshPhongMaterial({
          // light
          specular: 0x278443,
          // intermediate
          color: 0x278443,
          // dark
          emissive: 0x09bb52,
          shininess: 40,
          wireframe: false,
          //map: THREE.ImageUtils.loadTexture('http://i.imgur.com/xCE2Br4.jpg?1')
      });
  	let cube = new THREE.Mesh( geometry, material );
  	scene.add( cube );

  	let geometry2 = new THREE.BoxGeometry( 0.8, 0.8, 0.8 );
  	let material2 = new THREE.MeshPhongMaterial({
          // light
          specular: 0xefefef,
          // intermediate
          color: 0xefefef,
          // dark
          emissive: 0xbfbfbf,
          shininess: 50,
          wireframe: false,
          //map: THREE.ImageUtils.loadTexture('http://i.imgur.com/xCE2Br4.jpg?1')
      });
  	let cube1 = new THREE.Mesh( geometry2, material2 );
  	let cube2 = new THREE.Mesh( geometry2, material2 );
  	let cube3 = new THREE.Mesh( geometry2, material2 );
  	let cube4 = new THREE.Mesh( geometry2, material2 );
  	cube1.position.set(-2,0,0);
  	cube2.position.set(0,-2,0);
  	cube3.position.set(2,0,0);
  	cube4.position.set(0,2,0);
  	scene.add( cube1 ).add( cube2 ).add( cube3 ).add( cube4 );

  	let geometry3 = new THREE.BoxGeometry( 0.6, 0.6, 0.6 );
  	let material3 = new THREE.MeshPhongMaterial({
          // light
          specular: 0xa9d240,
          // intermediate
          color: 0xa9d240,
          // dark
          emissive: 0xa9d240,
          shininess: 50,
          wireframe: false,
          //map: THREE.ImageUtils.loadTexture('http://i.imgur.com/xCE2Br4.jpg?1')
      });
  	let cube5 = new THREE.Mesh( geometry3, material3 );
  	let cube6 = new THREE.Mesh( geometry3, material3 );
  	let cube7 = new THREE.Mesh( geometry3, material3 );
  	let cube8 = new THREE.Mesh( geometry3, material3 );
  	cube5.position.set(-1.5,1.5,0);
  	cube6.position.set(-1.5,-1.5,0);
  	cube7.position.set(1.5,-1.5,0);
  	cube8.position.set(1.5,1.5,0);
  	cube5.rotation.z = Math.PI/4;
  	cube6.rotation.z = Math.PI/4;
  	cube7.rotation.z = Math.PI/4;
  	cube8.rotation.z = Math.PI/4;
  	scene.add( cube5 ).add( cube6 ).add( cube7 ).add( cube8 );

  	camera.position.z = 11;


  	function render() {
  		requestAnimationFrame( render );
  	  	cube.rotation.x += 0.01;
  	  	cube.rotation.y += 0.01;
          cube5.rotation.x += 0.005;
          cube5.rotation.y += 0.005;
          cube6.rotation.x += 0.005;
          cube6.rotation.y -= 0.005;
          cube7.rotation.x += 0.005;
          cube7.rotation.y += 0.005;
          cube8.rotation.x += 0.005;
          cube8.rotation.y -= 0.005;
  		renderer.render( scene, camera );
  	}
  	render();

      $(window).on('resize',function(){
          camera.aspect = 1;
          camera.updateProjectionMatrix();

          renderer.setSize( element.width()*1 , element.width()*1 );
      });

  	$(this).on('mousemove',function(e){
  		var parentOffset = $(this).parent().offset();
          var x = (e.pageX - parentOffset.left)/$(this).parent().width();
          var y = (e.pageY - parentOffset.top)/$(this).parent().width();
          x-=0.5;
          y-=0.5;
          cube1.rotation.y = x*Math.PI/8;
          cube1.rotation.x = y*Math.PI/8;
          cube2.rotation.y = x*Math.PI/8;
          cube2.rotation.x = y*Math.PI/8;
          cube3.rotation.y = x*Math.PI/8;
          cube3.rotation.x = y*Math.PI/8;
          cube4.rotation.y = x*Math.PI/8;
          cube4.rotation.x = y*Math.PI/8;
          //console.log(x,y);
  	})

      $('#bannerAnimation').addClass('animation-active');
      // $('#bannerAnimation').on('click',function(){
      //     $(this).toggleClass('animation-active');
      // })
  });
});

//svg animations
// $('.svg-animation').addClass('animation-active');
$('.svg-animation').click(function(){
     $(this).toggleClass('animation-active');
});

//morph circle scene
$( document ).ready(function() {
  $('#morphCircleScene').each(function(){
      let element = $(this);
      let canvas;
      let ctx;
      let w, h;
      let m;
      let simplex;
      let mx, my;
      let now;

      function setup() {
        canvas = document.querySelector("#morphCircleScene");
        ctx = canvas.getContext("2d");
        reset();
        window.addEventListener("resize", reset);
      }

      function reset() {
        simplex = new SimplexNoise();
        w = canvas.width = element.width();
        h = canvas.height = element.height();
        m = Math.min(w, h);
        mx = w / 2;
        my = h / 2;
      }

      function draw(timestamp) {
        now = timestamp;
        requestAnimationFrame(draw);
        ctx.strokeStyle = "#f6f8f1";
        ctx.fillStyle = '#f6f8f1';
        ctx.clearRect(0, 0, w, h);
        drawCircle(w/3);
      }

      function drawCircle(r) {
        ctx.beginPath();
        let point, x, y;
        let deltaAngle = Math.PI * 2 / 400;
        for(let angle = 0; angle < Math.PI * 2; angle += deltaAngle) {
          point = calcPoint(angle, r);
          x = point[0];
          y = point[1];
          ctx.lineTo(x, y);
        }
        ctx.fill();
        ctx.stroke();
      }

      function calcPoint(angle, r) {
        let noiseFactor = mx / w * 150;
        let zoom = my / h * 200;
        let x = Math.cos(angle) * r + w / 2;
        let y = Math.sin(angle) * r + h / 2;
        n = (simplex.noise3D(x / zoom/3, y / zoom/3, now/10000)) * noiseFactor;
        x = Math.cos(angle) * (r + n) + w / 2;
        y = Math.sin(angle) * (r + n) + h / 2;
        return [x, y];
      }

      setup();
      draw();
  });
});