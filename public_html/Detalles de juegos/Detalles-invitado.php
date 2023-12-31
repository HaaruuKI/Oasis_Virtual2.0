<?php
include('../conexiones/conexion.php');

$id = $_GET['id'];

	$sql = "SELECT * FROM juegos WHERE id_juego = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Inicio|Oasis Virtual</title>
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
<link rel="stylesheet" href="../assets/css/nav y fondo.css">

  <!-- Bootstrap + FoodHut main styles -->
<link rel="stylesheet" href="../assets/css/oasis.css">
<link rel="stylesheet" href="../assets/css/responsive.css">
<link rel="stylesheet" href="detalles.css">
<style>img {aspect-ratio: 2/1; object-fit: fill;}</style>

<style>
  .nav-4 {
  display: flex;
  justify-content: center;
  align-items: center;
  flex: 1;
  color: #03dac6;
  letter-spacing: 0.1rem;
  transition: all 0.5s ease;
  font-size: 3.5vw;
}

.nav-4:hover {
  color: #1e1f26;
  background: #ff214f;
  transition: all 0.5s ease;
}

</style>
<style>
    .platform {
        margin-bottom: 20px;
    }
    .platform img {
        display: inline-block;
        margin-right: 10px;
    }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<section class="nav">
  <!-- <span class="m">I</span><span class="m">T</span><span class="m">S</span><span class="m">&nbsp;</span><span class="m">o</span><span class="m">f</span><span class="m">&nbsp;</span><span class="m">T</span><span class="m">E</span><span class="m">C</span><span class="m">H</span><span class="m">N</span><span class="m">O</span><span class="m">L</span><span class="m">O</span><span class="m">G</span><span class="m">I</span><span class="m">E</span><span class="m">S</span> -->
  <!-- <a class="nav-tab" href="#tab-vite"></a><span class="nav-tab-slider"></span> -->
  <h1><a href="#juegos"><h1>DESCRIPCION</h1></a></h1>
  <h1><a href="../index.html"><h1>OASIS VIRTUAL</h1></a></h1>
  <h3 class="span loader"><span class="m">TU </span><span class="m">ESCAPE </span><span class="m">DE </span><span class="m">LA </span><span class="m">REALIDAD</span></h3>
  <div class="nav-container">
  <a class="nav-tab" href="#" >Iniciar</a>
    <div class="nav-dropdown">
      <a class="nav-2 nav-3" href="../iniciar sesion usuario.html">Iniciar Sesion</a>
      <a class="nav-2 nav-3" href="../registrar usuario.html">Registrarse</a>
    </div>
    <a class="nav-2" href="../index.html#sobre-nosotros">SobreNosotros</a>
    <a class="nav-4" href="../Lista de juegos/juegos.php#juegos">Ver juegos</a>
    <a class="nav-2" href="../index.html#galeria">Galeria</a>
    <a class="nav-tab" href="#Contactos">Contacto</a>
    <button class="scroll-top-btn" onclick="scrollToTop()">
      <i class="fas fa-chevron-up"></i>
    </button>
  </div>
</section>
<main class="main">

<section class="slider" id="juegos">
    <br>
<div style="background-color: transparent; border: none" class="card">
  <div class="left">
  </div>
  <div style="padding: 0 0px;position: fixed;  position: fixed; bottom: 7%; width: 73%;" class="right"><img style="width: 400px; display: block" class="helmet" src="<?php echo $row['imagen'] ?>" alt="..."/>
    <div class="productInfo"style="position: relative; left: 46px; top: -36px;">
      <h1 style="font-size: 2vw; width: 600px; position: relative; left: -256px; top: 15px;"><?php echo $row['nombre_juego'] ?></h1>
      <h2>$<?php echo $row['precio'] ?></h2>
      <div class="details">
        <div class="size">
          <h4>VALORACION</h4>
            <p>1</p>
            <p>2</p>
            <p>3</p>
            <p>4</p>
            <p>5</p>
        </form>
        </div>
        <div class="durability">
          <h4>Desarrollador:<a><br><?php echo $row['desarrollador'];?></a></h4>
          <h4>Plataforma:<a><br><?php echo $row['plataforma'];?></a></h4>
        </div>
      </div>
      <button style="position: relative; left: 0px; top: 5px;" id="iniciar">Agregar al carrito</button><h1><a style="position: relative; top: 0px; left: 0px" href="#descripcion">Descripcion</a></h1>
    </div>
  </div>
  <script>
document.getElementById("iniciar").onclick = function() {
    window.location.href = "../iniciar sesion usuario.html#sesion";
};
</script>


</section>
<section class="slider" id="descripcion">
<h1>Descripcion</h1>
<br>
  <h4>Fecha creacion<a><br><?php echo $row['fecha_creacion'];?></a></h4>
  <h4>Genero:<a><br><?php echo $row['genero'];?></a></h4>
  <br><br>
  <p><?php echo $row['descripcion'];?></p>
</section>
  </main>
<canvas class="background"></canvas><!-- SGVsbG8hIE15IG5hbWUgaXMgU2FyYSBNYXphbC4gV2VsY29tZSB0byBteSBDb2RlUGVuIQ== -->
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script><script  src="../assets/js/script.js"></script>

<!-- Pie de pagina -->
      <!-- seccion de contaactos  -->
<section class="" id="Contactos" >
      <div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
        <div class="row">
            <div class="col-md-6 px-0">
                <div id="map" style="width: 100%; height: 100%; min-height: 400px"></div>
            </div>
            <div class="col-md-6 px-5 has-height-lg middle-items">
                <h3>Encuentranos en</h3>
                <a href="http://www.utnogales.edu.mx/" target="_blank">http://www.utnogales.edu.mx/</a>
                <div class="text-muted">
                    <p><span class="ti-location-pin pr-3"></span> Ave universidad 271, Universitaria, 84097 Nogales, Son.</p>
                    <p><span class="ti-support pr-3"></span> +52 (631)311-1830</p>
                    <p><span class="ti-email pr-3"></span></p>
                </div>
            </div>
        </div>
    </div>
<footer>
    <!-- pie de pagina  -->
    <div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
        <div class="row">
            <div class="col-sm-4">
                <h3>Nuestro correo</h3>
                <P class="text-muted"></P>
            </div>
            <div class="col-sm-4">
                <h3>Nuestro telefono</h3>
                <P class="text-muted">+52 (631)311-1830</P>
            </div>
            <div class="col-sm-4">
                <h3>Encuentranos en</h3>
                <P class="text-muted">Ave universidad 271, Universitaria, 84097 Nogales, Son.</P>
            </div>
        </div>
    </div>
    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> esta <i class="ti-heart text-danger"></i> hecho por <a href="https://github.com/HaaruuKI" style="color: #ff214f;" >HaaruuKI</a></p>
    </div>

    <!-- end of page footer -->

	<!-- core  -->
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="../assets/vendors/wow/wow.js"></script>

    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="../assets/js/oasis.js"></script>
  </section>
  </footer>

    <!-- SCRIPTS -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const navTab = document.querySelector('.nav-tab');
        const navDropdown = document.querySelector('.nav-dropdown');
        const scrollTopBtn = document.querySelector('.scroll-top-btn');

        navTab.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the default link behavior

          navTab.classList.toggle('active');

          // Scroll to the dropdown menu
          if (navTab.classList.contains('active')) {
            const navDropdownHeight = navDropdown.scrollHeight;
            window.scrollTo({ top: navDropdownHeight, behavior: 'smooth' });
          }
        });

        window.addEventListener('scroll', function() {
          // Show or hide the scroll-to-top button
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