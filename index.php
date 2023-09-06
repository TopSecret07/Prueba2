<?php
include 'comp/menu.php';
include 'conexion_base_datos.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>CEPEIGE - 50 AÑOS</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <section class="vh-50">
        <div class="container">
            <h3 class="bienvenido"><i class="fa-solid fa-person"> </i>Entrada </h3>
            <hr>
            <div class="row">
                <div class="col-md-4"
                    style="background-color:white; border-radius: 15px; box-shadow: 0 5px 20px #3978f69d;">
                    <br>
                    <h6>
                        <center><i class="fa-solid fa-qrcode"> Escanner </i></center>
                    </h6>
                    <hr>
                    <video id="my_camera" style="width: 100%; border-radius: 25px;"></video>
                    <hr>
                    <center>
                        <label class="btn btn-success active">
                            <input type="radio" name="options" value="1" autocomplete="off" checked> 1st Camera
                        </label>
                        <label class="btn btn-warning">
                            <input type="radio" name="options" value="2" autocomplete="off"> 2nd Camera
                        </label>
                    </center>
                    <hr>
                    <form id="qrForm" action="guardar_data_index.php" method="POST">
                        <div class="mb-3">
                            <label for="enlace_qr" class="form-label">Enlace</label>
                            <input type="text" class="form-control form-control-sm" id="enlace_qr" name="enlace_qr"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control form-control-sm" id="apellido" name="apellido"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Cedula</label>
                            <input type="text" class="form-control form-control-sm" id="cedula" name="cedula"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control form-control-sm" id="correo_electronico"
                                name="correo_electronico" placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" class="form-control form-control-sm" id="celular" name="celular"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="taller_1" class="form-label">Taller 1</label>
                            <input type="text" class="form-control form-control-sm" id="taller_1" name="taller_1"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="taller_2" class="form-label">Taller 2</label>
                            <input type="text" class="form-control form-control-sm" id="taller_2" name="taller_2"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ponencia" class="form-label">Ponencia</label>
                            <input type="text" class="form-control form-control-sm" id="ponencia" name="ponencia"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <div class="mb-3">
                            <label for="taller_2" class="form-label">Docente</label>
                            <input type="text" class="form-control form-control-sm" id="docente" name="docente"
                                placeholder="Escanee el codigo QR . . ." readonly>
                        </div>
                        <hr>
                        <center>
                            <button type="submit" class="btn btn-success" id="enviarBtn" disabled>Guardar
                                Datos</button>
                            <button type="button" class="btn btn-danger" id="cancelBtn">Cancelar</button>
                        </center>
                    </form>
                    <br>
                </div>

            </div>
        </div>
    </section>
    <script>
    // Habilitar el campo de enlace antes de enviar el formulario
    $("#qrForm").submit(function(event) {
        // Habilitar el campo de enlace
        $("#enlace_qr").prop("disabled", false);
    });

    // Función para limpiar los campos del formulario
    function limpiarFormulario() {
        // Obtén una referencia al formulario
        var formulario = document.getElementById("qrForm");

        // Recorre todos los elementos del formulario
        for (var i = 0; i < formulario.elements.length; i++) {
            var elemento = formulario.elements[i];

            // Verifica si el elemento es un campo de entrada de texto o una casilla de verificación
            if (elemento.type == "text" || elemento.type == "email") {
                elemento.value = ""; // Restablece el valor a vacío
            }
        }

        // Deshabilita el botón de enviar nuevamente
        document.getElementById("enviarBtn").disabled = true;
    }

    // Agrega un evento clic al botón "Cancelar" que llama a la función limpiarFormulario
    document.getElementById("cancelBtn").addEventListener("click", limpiarFormulario);

    let scanner;

    // Función para iniciar la cámara con la cámara seleccionada
    function startCameraWithSelected(cameraIndex) {
        if (scanner && scanner.cameras.length > cameraIndex) {
            scanner.start(scanner.cameras[cameraIndex]);
        } else {
            alert('No se encontró la cámara seleccionada.');
        }
    }

    // Función para realizar la solicitud AJAX y llenar los campos del formulario
    function fillFormFields(qrContent) {
        // Obtén los valores de los campos del formulario
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var cedula = $("#cedula").val();
        var correo_electronico = $("#correo_electronico").val();
        var celular = $("#celular").val();
        var taller_1 = $("#taller_1").val();
        var taller_2 = $("#taller_2").val();
        var ponencia = $("#ponencia").val();
        var docente = $("#docente").val();

        // Realizar la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "consulta_index.php", // Reemplaza con el archivo PHP correcto que procesa los datos
            data: {
                qr_content: qrContent,
                nombre: nombre,
                apellido: apellido,
                cedula: cedula,
                correo_electronico: correo_electronico,
                celular: celular,
                taller_1: taller_1,
                taller_2: taller_2,
                ponencia: ponencia,
                docente: docente
            },
            success: function(data) {
                // Analizar la respuesta JSON
                const response = JSON.parse(data);

                if (response.error) {
                    // Mostrar una notificación de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error,
                    });
                } else if (response.message) {
                    // Mostrar un mensaje de información
                    Swal.fire({
                        icon: 'info',
                        title: 'Información',
                        text: response.message,
                    });
                } else {
                    // Llenar los campos del formulario con los datos obtenidos
                    $("#nombre").val(response.nombre);
                    $("#apellido").val(response.apellido);
                    $("#cedula").val(response.cedula);
                    $("#correo_electronico").val(response.correo_electronico);
                    $("#celular").val(response.celular);
                    $("#taller_1").val(response.taller_1);
                    $("#taller_2").val(response.taller_2);
                    $("#ponencia").val(response.ponencia);
                    $("#docente").val(response.docente);

                    // Habilitar el botón de enviar
                    $("#enviarBtn").prop("disabled", false);

                    // Mostrar una notificación de éxito (toast)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'Comprueba el contenido'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(xhr.responseText);
                alert("Error en la solicitud AJAX: " + error);
            }
        });
    }
    // Verificar si el navegador admite getUserMedia (acceso a la cámara)
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner = new Instascan.Scanner({
                    video: document.getElementById('my_camera'),
                    mirror: false
                });
                scanner.cameras = cameras; // Almacenar las cámaras disponibles en el escáner

                // Iniciar con la primera cámara por defecto
                startCameraWithSelected(0);

                // Cambiar la cámara cuando se seleccione una opción diferente
                if (document.querySelector('input[name="options"]')) {
                    document.querySelectorAll('input[name="options"]').forEach((element,
                        index) => {
                        element.addEventListener("change", function(event) {
                            var item = event.target.value;
                            startCameraWithSelected(item -
                                1
                            ); // Restar 1 para ajustarse al índice de la matriz
                        });
                    });
                }

                // Escuchar el evento de escaneo y actualizar los campos del formulario
                scanner.addListener('scan', function(content) {
                    // Actualizar el campo de enlace
                    $("#enlace_qr").val(content);
                    // Llamar a la función para llenar los campos del formulario
                    fillFormFields(content);
                });
            } else {
                console.error('No se encontraron cámaras.');
                alert('No se encontraron cámaras.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
    } else {
        alert('Lo siento, tu navegador no admite acceso a la cámara.');
    }

    // Precargar el sonido del obturador
    var shutter = new Audio();
    shutter.autoplay = true;
    shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
    </script>
</body>

</html>