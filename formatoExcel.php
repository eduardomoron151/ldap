<?php
    date_default_timezone_set('America/Caracas');
    require_once "PHPExcel/Classes/PHPExcel.php";


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
    
    $objPHPExcel->getActiveSheet()->setTitle('Usuarios');
    $objPHPExcel->setActiveSheetIndex(0);

	$objPHPExcel->getActiveSheet()->getColumnDimension('A1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C1')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F1')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J1')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M1')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('O1')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P1')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q1')->setAutoSize(true);


    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="formato_excel.xls"');
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');

?>