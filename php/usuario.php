<?php
// usuario.php
session_start();
include('conexion.php');

// Consulta para obtener la lista de productos
$consulta_productos = "SELECT * FROM productos";
$resultado_productos = mysqli_query($conexion, $consulta_productos);

?>

<!DOCTYPE html>
<html>

<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Color de fondo */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .producto {
            border: 1px solid #ccc;
            background-color: #fff;
            margin: 10px;
            padding: 15px;
            text-align: center;
        }

        .producto img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>INICIO</title>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet" />
  <link href="../css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area sub_pages">
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="../index.html">
            <img src="../images/im.png" alt="" /><span>
              APPLESERVICES
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href=""> Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="acerc.html"> Acerca de </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html"> Servicio </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html"> Contactanos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../login.php"> Salir </a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a href="contact.html">
              Cotización
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
  
  <div class="container">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .producto {
            width: 20%;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .producto img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <h2>Productos Disponibles</h2>
    <div class="grid">
        <?php
        // Consulta para obtener productos
        $consulta_productos = "SELECT * FROM productos";
        $resultado_productos = mysqli_query($conexion, $consulta_productos);

        $contador = 0; // Inicializamos el contador

        while ($row = mysqli_fetch_assoc($resultado_productos)) {
            echo '<div class="producto">';
            
            // Verificar si la clave 'imagen' existe y no está vacía antes de intentar acceder a ella
            if (!empty($row['imagen'])) {
                $ruta_imagen = '../img/' . $row['imagen']; // Reemplaza esto con la ruta correcta
                echo '<img src="' . $ruta_imagen . '" alt="' . $row['nombre_producto'] . '">';
            }
            
            echo '<h3>' . $row['nombre_producto'] . '</h3>';
            echo '<p>Precio: $' . $row['precio'] . '</p>';
            echo '<p>' . $row['descripcion'] . '</p>';
            echo '<button>Comprar</button>';
            echo '<button>Agregar al Carrito</button>';
            echo '</div>';

            $contador++;

            // Agregamos un salto de línea después de cada fila de 5 productos
            if ($contador % 5 == 0) {
                echo '<br>';
            }
        }
        ?>
    </div>
</div>




</body>
</html>