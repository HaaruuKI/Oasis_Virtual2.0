<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Navigation PageDesign/Lesson</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="sara mazal lessons">
<meta name="keywords" content="HTML, CSS, JavaScript, mazal, icons">
<meta name="author" content="Sara Mazal">
<!--  SGVsbG8hIE15IG5hbWUgaXMgU2FyYSBNYXphbC4gV2VsY29tZSB0byBteSBDb2RlUGVuIQ== -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500&family=Raleway:wght@100;200;300;400;500&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<!-- SGVsbG8hIE15IG5hbWUgaXMgU2FyYSBNYXphbC4gV2VsY29tZSB0byBteSBDb2RlUGVuOiBodHRwczovL2NvZGVwZW4uaW8vU2FyYW1hemFsICYgR2l0SHViOiBodHRwczovL2dpdGh1Yi5jb20vc2FyYW1hemFs -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

<style>
  /* Agregamos estilos para el contenido desplegable */
  .nav-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #1e1f26;
    padding: 10px;
  }

  .nav-tab.active + .nav-dropdown {
    display: block;
  }
</style>
<style>
  /* Estilos adicionales para el botón de scroll hacia arriba */
  .scroll-top-btn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 50%;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
  }
  
  .scroll-top-btn:hover {
    background-color: #555;
  }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<sectio class="nav">
  <!-- <span class="m">I</span><span class="m">T</span><span class="m">S</span><span class="m">&nbsp;</span><span class="m">o</span><span class="m">f</span><span class="m">&nbsp;</span><span class="m">T</span><span class="m">E</span><span class="m">C</span><span class="m">H</span><span class="m">N</span><span class="m">O</span><span class="m">L</span><span class="m">O</span><span class="m">G</span><span class="m">I</span><span class="m">E</span><span class="m">S</span> -->
  <!-- <a class="nav-tab" href="#tab-vite"></a><span class="nav-tab-slider"></span> -->
  <h1>OASIS VIRTUAL</h1>
  <h3 class="span loader"><span class="m">TU </span><span class="m">ESCAPE </span><span class="m">DE </span><span class="m">LA </span><span class="m">REALIDAD</span></h3>
  <div class="nav-container">
    <a class="nav-tab" href="#">Menu</a>
    <!-- Agregamos el contenido desplegable -->
    <div class="nav-dropdown">
      <a class="nav-tab" href="#tab-svelte">Inicar Sesion</a>
      <a class="nav-tab" href="#tab-svelte">Registrarse</a>
      <a class="nav-tab" href="#tab-svelte">Admin</a>
    </div>
      
    <a class="nav-tab" href="#tab-esbuild">Galeria</a><a class="nav-tab" href="#tab-next">Sobre nostros</a><a class="nav-tab" href="#tab-typescript">Contacto</a>
    <button class="scroll-top-btn" onclick="scrollToTop()">
      <i class="fas fa-chevron-up"></i>
    </button>
  </div>
</sectio>
<main class="main">
  <section class="slider" id="tab-svelte">
    <h1>SVELTE</h1>
    <h2>another frontend JS framework</h2>
  </section>
  <section class="slider" id="tab-esbuild">
    <h1>ESBUILD</h1>
    <h2>an extremely fast JavaScript bundler</h2>
  </section>
  <section class="slider" id="tab-next">
    <h1>NEXT.JS</h1>
    <h2>framework for Production</h2>
  </section>
  <section class="slider" id="tab-typescript">
    <h1>TYPESCRIPT</h1>
    <h2>giving you better tooling at any scale</h2>
  </section>
  <section class="slider" id="tab-vite">
    <h1>VITE</h1>
    <h2>a frontend build tool</h2>
  </section>
</main>
<canvas class="background"></canvas><!-- SGVsbG8hIE15IG5hbWUgaXMgU2FyYSBNYXphbC4gV2VsY29tZSB0byBteSBDb2RlUGVuIQ== -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script><script  src="./script.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const navTab = document.querySelector('.nav-tab');
      const navDropdown = document.querySelector('.nav-dropdown');
      const scrollTopBtn = document.querySelector('.scroll-top-btn');
  
      navTab.addEventListener('click', function() {
        navTab.classList.toggle('active');
      });
  
      window.addEventListener('scroll', function() {
        // Mostrar u ocultar el botón de scroll hacia arriba
        if (window.scrollY > 300) {
          scrollTopBtn.style.display = 'block';
        } else {
          scrollTopBtn.style.display = 'none';
        }
      });
    });
  
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  </script>
</body>
</html>
