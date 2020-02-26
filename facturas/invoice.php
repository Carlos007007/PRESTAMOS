<?php
	

	require "./fpdf.php";

	$pdf = new FPDF('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();
	$pdf->Image('../vistas/assets/img/logo.png',10,10,30,30,'PNG');

	$pdf->SetFont('Arial','B',18);
	$pdf->SetTextColor(0,107,181);
	$pdf->Cell(0,10,utf8_decode(strtoupper("nombre de la empresa")),0,0,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(-35,10,utf8_decode('N. de factura'),'',0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',15);
	$pdf->SetTextColor(0,107,181);
	$pdf->Cell(0,10,utf8_decode(""),0,0,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(-35,10,utf8_decode("CODIGO DE FACTURA"),'',0,'C');

	$pdf->Ln(25);

	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(36,8,utf8_decode('Fecha de emisión:'),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(27,8,utf8_decode(date("d/m/Y", strtotime("2020-01-07"))),0,0);
	$pdf->Ln(8);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(27,8,utf8_decode('Atendido por:'),"",0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(13,8,utf8_decode("NOMBRE DEL ADMINISTRADOR"),0,0);

	$pdf->Ln(15);

	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(15,8,utf8_decode('Cliente:'),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(65,8,utf8_decode("NOMBRE DEL CLIENTE"),0,0);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(10,8,utf8_decode('DNI:'),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(40,8,utf8_decode("0000000000"),0,0);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(19,8,utf8_decode('Teléfono:'),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,8,utf8_decode("(000)00000000"),0,0);
	$pdf->SetTextColor(33,33,33);

	$pdf->Ln(8);

	$pdf->Cell(8,8,utf8_decode('Dir:'),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,8,utf8_decode("DIRECCION DEL CLIENTE"),0,0);

	$pdf->Ln(15);

	$pdf->SetFillColor(38,198,208);
	$pdf->SetDrawColor(38,198,208);
	$pdf->SetTextColor(33,33,33);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(15,10,utf8_decode('Cant.'),1,0,'C',true);
	$pdf->Cell(90,10,utf8_decode('Descripción'),1,0,'C',true);
	$pdf->Cell(51,10,utf8_decode('Tiempo - Costo'),1,0,'C',true);
	$pdf->Cell(25,10,utf8_decode('Subtotal'),1,0,'C',true);

	$pdf->Ln(10);

	$pdf->SetTextColor(97,97,97);


	$pdf->Cell(15,10,utf8_decode(2000),'L',0,'C');
	$pdf->Cell(90,10,utf8_decode("00000 - silla plastica blanca"),'L',0,'C');
	$pdf->Cell(51,10,utf8_decode("7 Evento ($10.00 c/u)"),'L',0,'C');
	$pdf->Cell(25,10,utf8_decode("$100,000.00"),'LR',0,'C');
	$pdf->Ln(10);
	$pdf->Cell(15,10,utf8_decode(2000),'L',0,'C');
	$pdf->Cell(90,10,utf8_decode("00000 - Mesa plastica roja"),'L',0,'C');
	$pdf->Cell(51,10,utf8_decode("10 Evento ($10.00 c/u)"),'L',0,'C');
	$pdf->Cell(25,10,utf8_decode("$100,000.00"),'LR',0,'C');

	$pdf->Ln(10);

	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(15,10,utf8_decode(''),'T',0,'C');
	$pdf->Cell(90,10,utf8_decode(''),'T',0,'C');
	$pdf->Cell(51,10,utf8_decode('TOTAL'),'LTB',0,'C');
	$pdf->Cell(25,10,utf8_decode("$100,000.00"),'LRTB',0,'C');

	$pdf->Ln(15);

	$pdf->MultiCell(0,9,utf8_decode("OBSERVACIÓN: ".$datos_prestamo['prestamo_observacion']),0,'J',false);

	$pdf->SetFont('Arial','',12);
	if(true){
		$pdf->Ln(12);

		$pdf->SetTextColor(97,97,97);
		$pdf->MultiCell(0,9,utf8_decode("NOTA IMPORTANTE: \nEsta factura presenta un saldo pendiente de pago por la cantidad de $.00"),0,'J',false);
	}

	$pdf->Ln(25);

	/*----------  INFO. EMPRESA  ----------*/
	$pdf->SetFont('Arial','B',9);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(0,6,utf8_decode("NOMBRE DE LA EMPRESA"),0,0,'C');
	$pdf->Ln(6);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,6,utf8_decode("DIRECCION DE LA EMPRESA"),0,0,'C');
	$pdf->Ln(6);
	$pdf->Cell(0,6,utf8_decode("Teléfono: "),0,0,'C');
	$pdf->Ln(6);
	$pdf->Cell(0,6,utf8_decode("Correo: "),0,0,'C');


	$pdf->Output("I","Factura_1.pdf",true);