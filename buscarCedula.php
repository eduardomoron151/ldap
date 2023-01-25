<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>LDAP</title>
</head>
<body>
    <div class="container">
        
        <?php include_once "template/header.php"; ?>

        <?php include_once "template/nav.php"; ?>

        <main class="main">
            <div class="formulario">
                <h3>Buscar por cedula</h3>
                <form id="formularioCedula">
                    <input id="valor" type="text" placeholder="Cedula">
                    <button id="btnBuscar" class="btn-buscar">Buscar</button>
                </form>
                
                <section id="section" class="section">
                    <div class="card1">
                        <img id="img-buscar"  alt="Imagen">
                        <div>
                            <strong>CEDULA : </strong> 
                            <p id="cedula"></p>
                        </div>
                        <div>
                            <strong>NOMBRE : </strong> 
                            <p id="nombre"></p> 
                        </div>
                        <div>
                            <strong>NEGOCIO : </strong> 
                            <p id="negocio"></p>
                        </div>
                        <div>
                            <strong>LOCALIDAD : </strong>
                            <p id="localidad"></p>
                        </div>
                        <div>
                            <strong>EXT : </strong>
                            <p id="ext"></p>
                        </div>
                        <div>
                            <strong>CELULAR : </strong>
                            <p id="celular"></p>
                        </div>
                        <div>
                            <strong>CORREO : </strong>
                            <p id="correo"></p>
                        </div>
                        <div>
                            <strong>EMPLEADO : </strong>
                            <p id="tipoEmpleado"></p>
                        </div>
                    </div>

                    <div class="card2">
                        <div>
                            <strong>CARGO : </strong>
                            <p id="cargo"></p>
                        </div>
                        <div>
                            <strong>NÓMINA : </strong> 
                            <p id="nomina"></p>
                        </div>
                        <div>
                            <strong>ÁREA : </strong>
                            <p id="area"></p>
                        </div>
                        <div>
                            <strong>ANIVERSARIO : </strong>
                            <p id="aniversario"></p>
                        </div>
                        <div>
                            <strong>SUPERVISOR : </strong>
                            <p id="supervisor"></p>
                        </div>
                        <div>
                            <strong>ORGANIZACIÓN : </strong>
                            <p id="organizacion"></p>
                        </div>
                        <div>
                            <strong>EDIF : </strong>
                            <p id="edificion"></p>
                        </div>
                        <div>
                            <strong>DESCRIPCIÓN : </strong>
                            <p id="descripcion"></p>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <?php include_once "template/footer.php"; ?>

        <script src="js/axios.min.js"></script>
        <script src="js/buscarCedula.js"></script>


    </div>
</body>
</html>