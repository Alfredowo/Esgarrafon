<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar empleado</title>
    <style>
        .bodylogina{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            /*background-color: rgb(126, 169, 171);*/
            background-image: url(1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 800px;
        }
        .h1logina{
            color: antiquewhite;
            border-bottom: 6px solid rgb(90, 146, 163);
        }
        .formowo{
            color: antiquewhite;
            margin: 30px;
            padding: auto;
            border: 2px solid powderblue;
        }
        .form2owo{
            color: azure;
            text-align: center;
            background-color: rgba(21, 30, 82, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(14, 18, 78, 0.3);
        }
        .tituolowo{
            text-align: center;
            color: azure;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .menu {
            background-color: #071b36ee; /* Color de fondo de la barra de menú */
            display: flex;
            justify-content: flex-end; /* Alinea los botones a la derecha */
            align-items: center; /* Centra verticalmente los botones */
            height: 50px; /* Altura de la barra de menú */
        }

        /* Resto del código CSS se mantiene igual */

        .menu-button {
            background-color: rgb(45, 118, 131); /* Color de fondo de los botones */
            color: white; /* Color del texto de los botones */
            border: none;
            padding: 10px 20px; /* Espaciado interno de los botones */
            margin: 0 10px; /* Margen horizontal entre los botones */
            cursor: pointer;
        }
        .menu-button:hover {
            background-color: rgb(101, 163, 173); /* Color de fondo al pasar el mouse por encima */
        }
    .botonregresar {
        font-family: Verdana,Geneva,Tahoma,sans-serif;
        color: #c4c3ca;
        cursor: pointer;
        background-color: #13141D;
        border: none;
        padding: 10px 20px; /* Ajusta el padding según tu preferencia */
    }
    .botonregresar:hover{
        background-color: #4CA289 ;
    }
        .neon{
            width: 75%;
            padding: 9px;
            font-size: 1em;
            border: none;
            border-bottom: 1px solid rgb(135, 190, 190);
            background-color: rgba(66, 66, 117, 0.425);
            margin-top: 3px;
            transition: border-bottom-color 0.3s;
        }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }
    .modal-content {
        background-color: #060827;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #000000;
        width: 60%;
    }
    .close {
        color: azure;
        float: right;
        cursor: pointer;
    }
    .botonuwu{
        position: absolute;
        background-color: #32417C;
        bottom: 10px;
        left: 10px;
        border: none;
        color: azure;
        padding: 10px 10px;
        cursor: pointer;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .botonuwu:hover{
            background-color: rgb(101, 163, 173);
    }
    </style>
    <link rel="stylesheet" href="style.css">
    <?php
    require("conexion.php");
    $consulta = "select id, Nombre from Empleados";
    $resultado=$conn->query($consulta);
    ?>
</head>
<body class="fondouwu">
<h2 class="titulos">Seleccionar empleado:</h2>
<div class="divwaos2">
    <form action="Formulario.php" method="post">
        <select class="selectorewe" name="empleado" id="empleado">
            <?php
            if (!$resultado) {
                die("Error en la consulta: " . $conn->error);
            }
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="'.$fila['id'].'">'.$fila['Nombre'].'</option>';
            }
            ?>
        </select><br><br>
        <center><input class="botonowo" type="submit" value="Evaluar"></center>
        <br><br>
    </form>
    <button class="botonuwu" id="openRegisterModal">Agregar administrador nuevo</button>
    <form action="Login.html">
        <center><input class="botonregresar" type="submit" value="Regresar"></center></form>
    </form>
    <!-- Modal de Registro -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span  class="close" id="closeRegisterModal">&times;</span>
            <h2 class="tituolowo">Registro</h2>
            <form class="form2owo" id="registerForm">
                Usuario: <br><input class="neon" type="text" name="registroUsuario" id="registroUsuario" required><br><br>
                Contraseña: <br> <input type="password" class="neon"  name="registroContrasena" id="registroContrasena" required><br><br>
                Confirmar Contraseña: <br><input type="password" class="neon"  name="confirmarContrasena" id="confirmarContrasena" required><br><br>
                <button class="botonuwu2" id="registrar">Registrar</button>
            </form>
        </div>
    </div>
        <script>
        const openRegisterModalButton = document.getElementById("openRegisterModal");
        const registerModal = document.getElementById("registerModal");
        const closeRegisterModalButton = document.getElementById("closeRegisterModal");
        const registerForm = document.getElementById("registerForm");
    
        openRegisterModalButton.addEventListener("click", function() {
            registerModal.style.display = "block";
        });
    
        closeRegisterModalButton.addEventListener("click", function() {
            registerModal.style.display = "none";
        });
    
        registerForm.addEventListener("submit", function(event) {
            event.preventDefault();
            const registroUsuario = document.getElementById("registroUsuario").value;
            const registroContrasena = document.getElementById("registroContrasena").value;
            const confirmarContrasena = document.getElementById("confirmarContrasena").value;

            if (registroContrasena !== confirmarContrasena) {
                alert("Las contraseñas no coinciden");
            } else {
                const datosUsuario = new URLSearchParams();
                //const datosUsuario = new FormData();
                datosUsuario.append("registroUsuario", registroUsuario);
                datosUsuario.append("registroContrasena", registroContrasena);
                datosUsuario.append("permisos", 1);
                //alert("Las contraseñas SI coinciden");
                //alert("El usuario es " + registroUsuario);
                // Hacer una solicitud al servidor para verificar si el usuario existe
                fetch("verificar_registro.php", {
                    method: "POST", // Cambia el método a POST
                    headers: {
                        // Ajusta el encabezado a application/x-www-form-urlencoded
                        "Content-Type": "application/x-www-form-urlencoded" 
                    },
                    // Envía los datos POST como una cadena codificada
                    body: "registroUsuario=" + registroUsuario 
                })
                .then(response => response.text())
                .then(data => {
                    //alert("resultado: " + data);
                    if (data == '{"existe":true}') {
                        alert("El usuario ya existe, crea uno nuevo");
                    } else {
                        //alert("El usuario no existe, registrar");
                        // Si el usuario no existe, hacer otra solicitud a registrar
                        fetch("registrar_usuario.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: datosUsuario.toString() // Convertir el objeto a una cadena codificada
                            //body: datosUsuario // Utiliza el objeto FormData como cuerpo de la solicitud
                            //body: "registroUsuario=" + registroUsuario 
                        })
                        .then(response => response.json())
                        .then(data => {
                            // alerta que indica si el regstro fue exitoso
                            alert(data);
                            // Eliminar el modal del DOM
                            registerModal.style.display = "none";
                        })
                        .catch(error => {
                            console.error("Error al registrar usuario:", error);
                            alert("Error al registrar usuario: " + error);
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Ocurrió un error al verificar el usuario. " + error);
                });
            }
        });
    </script>    
</div>
</body>
</body>
</html>