<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>CEPEIGE - 50 AÑOS</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="main.css">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="style/inicio.css">
</head>

<body>
    <?php include 'comp/menu1.php'; ?>


    <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <center>
            <h3 class="bienvenido"><i class="fa-solid fa-user-shield"></i> Registro Usuario - Comidas </h3>
        </center>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>Enlace</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>E-mail</th>
                                <th>Coffe #1</th>
                                <th>Hora del Coffe #1</th>
                                <th>Coffe #2</th>
                                <th>Hora del Coffe #2</th>
                                <th>Almuerzo</th>
                                <th>Hora del almuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Incluye el archivo de conexión a la base de datos
                            include("conexion_base_datos.php");

                            // Realiza una consulta SELECT para obtener los datos de asistentes y alimentación
                            $sql = "SELECT asistentes.enlace_qr, asistentes.nombre, asistentes.apellido, asistentes.correo_electronico, comidas.break_1, comidas.almuerzo, comidas.break_2 FROM asistentes
                            INNER JOIN comidas ON asistente.enlace_qr = comidas.enlace_qr";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    // Usuario
                                    echo "<td>" . $row["enlace_qr"] . "</td>";
                                    echo "<td>" . $row["nombre"] . "</td>";
                                    echo "<td>" . $row["apellido"] . "</td>";
                                    echo "<td>" . $row["correo_electronico"] . "</td>";

                                    // Alimentación
                                    echo "<td>" . $row["coffe_1"] . "</td>";
                                    echo "<td>" . $row["hora_coffe_1"] . "</td>";
                                    echo "<td>" . $row["coffe_2"] . "</td>";
                                    echo "<td>" . $row["hora_coffe_2"] . "</td>";
                                    echo "<td>" . $row["almuerzo"] . "</td>";
                                    echo "<td>" . $row["hora_coffe_1"] . "</td>";

                                    

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No se encontraron resultados.</td></tr>";
                            }

                            // Cierra la conexión a la base de datos
                            $conn->close();
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <br><br><br>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

    <!-- para usar botones en datatables JS -->
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="main.js"></script>
</body>

</html>