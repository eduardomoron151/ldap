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
            <div class="contenido">
                <h3>Llenado masivo excel por cedula</h3>

                <section class="section-excel">
                    <div class="card1-excel">
                        <h4>Instrucciones</h4>
                        <ol>
                            <li>Descargue el formato excel. <a class="btn-descargar" href="formatoExcel.php" target="_blank">Descargar</a></li>
                            <li>Llene el formato solo en la columna de <span class="text-alerta">cedula</span></li>
                            <li>Adjunte el archivo excel en el formulario.</li>
                            <li>Click en generar y la descarga del excel generado comenzara con los datos completos.</li>
                        </ol>
                        
                    </div>
                    <div class="card2-excel">
                        <h4>Formulario</h4>
                        <form  enctype="multipart/form-data" action="generarExcelCedula.php" method="POST">
                            <label for="documento">Adjuntar Excel</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                            <input  id="documento" name="documento" type="file">
                            <button type="submit" class="btn-generar">Generar</button>
                        </form>
                    </div>
                </section>
            </div>
        </main>

        <?php include_once "template/footer.php"; ?>

    </div>
</body>
</html>