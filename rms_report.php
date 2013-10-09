<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/cavex_monitoring_system/'.'routes.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/cavex_monitoring_system/'.'header.php');
require_once($aRoutes['paths']['config'].'bs_model.php');
require_once('inc/PHPExcel.php');
$oLogin = new BSLogin();
$oLogin->IsLogged("admin");

$form = $_POST;
if(!empty($form['generate_report'])){
    if(!empty($form['rms_from_datetime']) && !empty($form['rms_to_datetime'])){
        $to_datetime = $form['rms_from_datetime'];
        $from_datetime = $form['rms_to_datetime'];
        header("Location: generate_rms_report.php?from_datetime=$from_datetime&to_datetime=$to_datetime");
        // $oModel = new BSModel();
        // $query_rms_report = "SELECT t1.valor, t2.identificador, t1.fecha_hora from rms as t1 join radios as t2 on t1.radio_id = t2.id where t1.fecha_hora > '".$form['rms_from_datetime']."' and t1.fecha_hora < '".$form['rms_to_datetime']."' order by t1.fecha_hora desc limit 100000";
        // $aRmsReport = $oModel->Select($query_rms_report);
        // // print_r($aRmsReport);
        // $objPHPExcel = new PHPExcel();

        // // Set document properties
        // $objPHPExcel->getProperties()->setCreator("Alessandro Minoccheri")
        //                      ->setLastModifiedBy("Alessandro Minoccheri")
        //                      ->setTitle("Office 2007 XLSX Test Document")
        //                      ->setSubject("Office 2007 XLSX Test Document")
        //                      ->setDescription("Generazione report inverter")
        //                      ->setKeywords("office 2007 openxml php")
        //                      ->setCategory("");
        // $objPHPExcel->getActiveSheet()->setCellValue('A1', 'From:'.$form['rms_from_datetime']);
        // $objPHPExcel->getActiveSheet()->setCellValue('B1', 'To:'.$form['rms_to_datetime']);
        // $objPHPExcel->getActiveSheet()->setCellValue('A2', 'Radio Identifier');
        // $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Rms value');
        // $objPHPExcel->getActiveSheet()->setCellValue('C2', 'Datetime');
        // // $i = 3;
        // // foreach ($aRmsReport as $report) {
        // //     $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $report['identificador']);
        // //     $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $report['valor']);
        // //     $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $report['fecha_hora']);
        // //     $i = $i + 1;
        // // }
        // $objPHPExcel->getActiveSheet()->setTitle('Simple');
        // $objPHPExcel->setActiveSheetIndex(0);
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="reporte.xls"');
        // header('Cache-Control: max-age=0');

        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        // $objWriter->save('php://output');
        // exit;
    }           
}


?>


<link rel="stylesheet" href="<? echo $aRoutes['paths']['css']?>jquery-ui-1.10.3.custom.css">

<form class="form-inline" name="rms_report_form" action="rms_report.php" id="rms-report-form" method="post" enctype="multipart/form-data">
	<div class="single-checkbox" id="from_date_div">
	    <input type="text" class="datetime_input" id="rms_from_datetime" name="rms_from_datetime" placeholder="From" value="<?=$filter_form['from_date']?>"/>
	</div>
	<div class="single-checkbox" id="to_date_div">
	    <input type="text" class="datetime_input" id="rms_to_datetime" name="rms_to_datetime" placeholder="To" value="<?=$filter_form['to_date']?>"/>
	</div>
	<input class="btn btn-primary" type="submit" name="generate_report" id="generate-report" value="Generate"> 
</form>

<script type="text/javascript">
    $('#rms_from_datetime').datetimepicker({
    	dateFormat: "yy-mm-dd",
    	timeFormat: 'HH:mm'
    });
    $('#rms_to_datetime').datetimepicker({
    	dateFormat: "yy-mm-dd",
    	timeFormat: 'HH:mm'
    });
</script>