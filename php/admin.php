<?php
session_start();
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel de Administrador</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-image: url('../images/fondmad.jpg'); 
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $verificar_tabla = "SHOW TABLES LIKE 'productos'";
        $resultado_verificar = mysqli_query($conexion, $verificar_tabla);

        if ($resultado_verificar->num_rows == 1) {

            $consulta_productos = "SELECT * FROM productos";
            $resultado_productos = mysqli_query($conexion, $consulta_productos);

            if ($resultado_productos) {
                ?>
              <center>  <h2>Productos Disponibles</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Producto</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Inventario</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr></center>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultado_productos)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['nombre_producto']}</td>";
                            echo "<td>{$row['precio']}</td>";
                            echo "<td>{$row['descripcion']}</td>";
                            echo "<td>{$row['categoria']}</td>";
                            echo "<td>{$row['inventario']}</td>";
                            echo "<td>{$row['fecha_creacion']}</td>";
                            echo "<td>";
                            echo "<a href='editar_producto.php?id={$row['id']}'>Editar</a> | ";
                            echo "<a href='eliminar_producto.php?id={$row['id']}'>Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <h2>Agregar Nuevo Producto</h2>
                <form method="post" action="agregar_producto.php" enctype="multipart/form-data">
                    <label for="nombre_producto">Nombre Producto:</label>
                    <input type="text" name="nombre_producto" required>

                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" required>

                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" required></textarea>

                    <label for="categoria">Categoría:</label>
                    <input type="text" name="categoria" required>

                    <label for="inventario">Inventario:</label>
                    <input type="number" name="inventario" required>

                    <label for="imagen">Imagen del Producto:</label>
                    <input type="file" name="imagen" accept="image/*" required>

                    <button type="submit" name="agregar">Agregar Producto</button>
                    <a class="btn-salir" href="../login.php">Salir</a>
                </form>
                <?php
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo "La tabla 'productos' no existe en la base de datos.";
        }
        ?>
    </div><br>
    <div class="container">
    <CENTER> <h3>
            Red de la Empresa 
          </h3></CENTER>
          <center> <img src="../images/diagrama.jpg" alt=""></center>
         <center> <img src="../images/diagrama-1.jpg" alt=""></center><br><br>
     </div>
       
     
        
         <div class="container">
        <center> <h3>Tabla de IP</h3></center>
         <table>
        <thead>
             <tr> 
                <th>EQUIPO</th>
                <th>Gateway</th>
                <th>IP ASIGNADA</th>
                <th>MASK</th>
               <th>DEPARTAMENTO</th>
             </tr>
        </thead>
        <tbody>
            <tr>
                <td>PC1</td>
                <td>192.168.100.1</td>
                <td>192.168.100.2</td>
                <td>255.255.255.0</td>
                <td>Redes</td>
            </tr>
            <tr>
                <td>PC2</td>
                <td>10.10.16.1</td>
                <td>10.10.16.2</td>
                <td>255.255.255.0</td>
                <td>Redes</td>
            </tr>
            <tr>
                <td>PC3</td>
                <td>10.10.16.1</td>
                <td>10.10.16.3</td>
                <td>255.255.255.0</td>
                <td>Soporte Tecnico</td>
            </tr>
            <tr>
                <td>PC4</td>
                <td>192.168.100.1</td>
                <td>192.168.100.3</td>
                <td>255.255.255.0</td>
                <td>Soporte Tecnico</td>
            </tr>
            <tr>
                <td>PC5</td>
                <td>192.168.100.1</td>
                <td>192.168.100.4</td>
                <td>255.255.255.0</td>
                <td>Soporte Tecnico</td>
            </tr>
            <tr>
                <td>PC6</td>
                <td>192.168.100.1</td>
                <td>192.168.100.5</td>
                <td>255.255.255.0</td>
                <td>Analisis de Datos</td>
            </tr>
            <tr>
                <td>PC7</td>
                <td>10.10.16.1</td>
                <td>10.10.16.4</td>
                <td>255.255.255.0</td>
                <td>Analisis de Datos</td>
            </tr>
            <tr>
                <td>PC8</td>
                <td>10.10.16.1</td>
                <td>10.10.16.5</td>
                <td>255.255.255.0</td>
                <td>Analisis de datos</td>
            </tr>
            <tr>
                <td>PC9</td>
                <td>10.10.16.1</td>
                <td>10.10.16.7</td>
                <td>255.255.255.0</td>
                <td>Servicios Web</td>
            </tr>
            <tr>
                <td>PC10</td>
                <td>1192.168.100.1</td>
                <td>192.168.100.6</td>
                <td>255.255.255.0</td>
                <td>Servicios Web</td>
            </tr>
            <tr>
                <td>PC11</td>
                <td>192.168.100.1</td>
                <td>192.168.100.7</td>
                <td>255.255.255.0</td>
                <td>Servicios Web</td>
            </tr>
            <tr>
                <td>PC12</td>
                <td>192.168.100.1</td>
                <td>192.168.100.8</td>
                <td>255.255.255.0</td>
                <td>Servicios Web</td>
            </tr>
            <tr>
                <td>PC13</td>
                <td>192.168.100.1</td>
                <td>192.168.100.9</td>
                <td>255.255.255.0</td>
                <td>Base de Datos</td>
            </tr>
            <tr>
                <td>PC14</td>
                <td>192.168.100.1</td>
                <td>192.168.100.10</td>
                <td>255.255.255.0</td>
                <td>Base de Datos</td>
            </tr>
            <tr>
                <td>Servidor 1</td>
                <td>192.168.100.1</td>
                <td>192.168.100.11</td>
                <td>255.255.255.0</td>
                <td>Base de Datos</td>
            </tr>
            <tr>
                <td>Servidor2</td>
                <td>10.10.16.1</td>
                <td>10.10.16.7</td>
                <td>255.255.255.0</td>
                <td>Base de Datos</td>
            </tr>
            <tr>
                <td>PC15</td>
                <td>10.10.16.1</td>
                <td>10.10.16.8</td>
                <td>255.255.255.0</td>
                <td>Base de Datos</td>
            </tr>
            <tr>
                <td>PC16</td>
                <td>10.10.16.1</td>
                <td>10.10.16.9</td>
                <td>255.255.255.0</td>
                <td>Desarrollo Web</td>
            </tr>
            <tr>
                <td>PC17</td>
                <td>192.168.100.1</td>
                <td>10.10.16.12</td>
                <td>255.255.255.0</td>
                <td>Desarrollo Web</td>
            </tr>
            <tr>
                <td>PC18</td>
                <td>192.168.100.1</td>
                <td>10.10.16.13</td>
                <td>255.255.255.0</td>
                <td>Desarrollo Web</td>
            </tr>
            <tr>
                <td>PC19</td>
                <td>192.168.100.1</td>
                <td>10.10.16.14</td>
                <td>255.255.255.0</td>
                <td>Desarrollo Web</td>
            </tr>
            <tr>
                <td>PC20</td>
                <td>192.168.100.1</td>
                <td>192.168.100.15</td>
                <td>255.255.255.0</td>
                <td>Seguridad Informatica</td>
            </tr><tr>
                <td>PC21</td>
                <td>192.168.100.1</td>
                <td>192.168.100.16</td>
                <td>255.255.255.0</td>
                <td>Seguridad Informatica</td>
            </tr><tr>
                <td>PC22</td>
                <td>10.10.16.1</td>
                <td>10.10.16.10</td>
                <td>255.255.255.0</td>
                <td>Seguridad Informatica</td>
            </tr><tr>
                <td>PC23</td>
                <td>10.10.16.1</td>
                <td>10.10.16.11</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Software</td>
            </tr>
            </tr><tr>
                <td>PC24</td>
                <td>10.10.16.1</td>
                <td>10.10.16.12</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Software</td>
            </tr>
            </tr><tr>
                <td>PC25</td>
                <td>10.10.16.1</td>
                <td>10.10.16.13</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Software</td>
            </tr>
            </tr><tr>
                <td>PC26</td>
                <td>192.168.100.1</td>
                <td>192.168.100.17</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Software</td>
            </tr>
            </tr><tr>
                <td>PC27</td>
                <td>192.168.100.1</td>
                <td>192.168.100.18</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Aplicaciones moviles</td>
            </tr>
            </tr><tr>
                <td>PC28</td>
                <td>192.168.100.1</td>
                <td>192.168.100.19</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Aplicaciones moviles<</td>
            </tr>
            </tr><tr>
                <td>PC29</td>
                <td>10.10.16.1</td>
                <td>10.10.16.14</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Aplicaciones moviles<</td>
            </tr>
            </tr><tr>
                <td>PC30</td>
                <td>10.10.16.1</td>
                <td>10.10.16.15</td>
                <td>255.255.255.0</td>
                <td>Desarrollo de Aplicaciones moviles<</td>
            </tr>
            </tr><tr>
                <td>PC31</td>
                <td>10.10.16.1</td>
                <td>10.10.16.16</td>
                <td>255.255.255.0</td>
                <td>Adminstracion y Seguridad de Redes</td>
            </tr>
            </tr><tr>
                <td>PC32</td>
                <td>10.10.16.1</td>
                <td>10.10.16.17</td>
                <td>255.255.255.0</td>
                <td>Adminstracion y Seguridad de Redes</td>
            </tr>
            </tr><tr>
                <td>PC33</td>
                <td>192.168.100.1</td>
                <td>192.168.100.20</td>
                <td>255.255.255.0</td>
                <td>Adminstracion y Seguridad de Redes</td>
            </tr>

        </tbody>
    </table>
    </div><br><br>
    <div class="container">
    <CENTER> <h3>
            Inventario
          </h3>
          <img src="../images/T-1.png" alt="">
          <img src="../images/T-2.png" alt="">
          <img src="../images/T-3.png" alt="">
          <img src="../images/T-4.png" alt=""></CENTER>
     </div>

</body>

</html>
