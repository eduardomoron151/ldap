<?php
    date_default_timezone_set('America/Caracas');
    include_once "php/class/ldap.php";
    require_once "PHPExcel/Classes/PHPExcel.php";

    $directorio = 'archivos/';
    $archivo = $directorio . basename($_FILES["documento"]["name"]);
    $imageFileType = pathinfo($archivo,PATHINFO_EXTENSION);
    
    move_uploaded_file($_FILES["documento"]["tmp_name"], $archivo);

    $inputFileType = PHPExcel_IOFactory::identify($archivo);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($archivo);
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumn = $sheet->getHighestColumn(); 

    $totalRows = array();

    for ($row = 2; $row <= $highestRow; $row++){ 
        $valor = $sheet->getCell("B".$row)->getValue();

        $ldap = new Ldap($valor);
        $datos = $ldap->buscarIndicador();

        $totalRows[] = array($datos);

    }

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->
        getProperties()
            ->setCreator("Eduardo moron")
            ->setLastModifiedBy("Eduardo moron")
            ->setTitle("Excel usuario")
            ->setSubject("Documento")
            ->setDescription("Documento generado con PHPExcel")
            ->setKeywords("usuarios phpexcel")
            ->setCategory("reportes");

    $objPHPExcel->
        setActiveSheetIndex(0)
            ->setCellValue('A1', 'Cedula')
            ->setCellValue('B1', 'Indicador')
            ->setCellValue('C1', 'Nombre')
            ->setCellValue('D1', 'Negocio')
            ->setCellValue('E1', 'Localidad')
            ->setCellValue('F1', 'Ext')
            ->setCellValue('G1', 'Celular')
            ->setCellValue('H1', 'Correo')
            ->setCellValue('I1', 'Empleado')
            ->setCellValue('J1', 'Cargo')
            ->setCellValue('K1', 'Nomina')
            ->setCellValue('L1', 'Area')
            ->setCellValue('M1', 'Aniversario')
            ->setCellValue('N1', 'Supervisor')
            ->setCellValue('O1', 'Organizacion')
            ->setCellValue('P1', 'Edif')
            ->setCellValue('Q1', 'Descripcion');



    foreach ($totalRows as $llave => $valor) {
        $llave += 2;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$llave, $valor[0]['cedula'])
            ->setCellValue('B'.$llave, $valor[0]['indicador'])
            ->setCellValue('C'.$llave, $valor[0]['nombre'])
            ->setCellValue('D'.$llave, $valor[0]['negocio'])
            ->setCellValue('E'.$llave, $valor[0]['localidad'])
            ->setCellValue('F'.$llave, $valor[0]['ext'])
            ->setCellValue('G'.$llave, $valor[0]['celular'])
            ->setCellValue('H'.$llave, $valor[0]['correo'])
            ->setCellValue('I'.$llave, $valor[0]['tipoEmpleado'])
            ->setCellValue('J'.$llave, $valor[0]['cargo'])
            ->setCellValue('K'.$llave, $valor[0]['nomina'])
            ->setCellValue('L'.$llave, $valor[0]['area'])
            ->setCellValue('M'.$llave, $valor[0]['aniversario'])
            ->setCellValue('N'.$llave, $valor[0]['supervisor'])
            ->setCellValue('O'.$llave, $valor[0]['organizacion'])
            ->setCellValue('P'.$llave, $valor[0]['edificion'])
            ->setCellValue('Q'.$llave, $valor[0]['descripcion']);

    }

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);

    $objPHPExcel->getActiveSheet()->setTitle('Usuarios');
    $objPHPExcel->setActiveSheetIndex(0);

    unlink($archivo);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="usuarios_por_cedula.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
?>