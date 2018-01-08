<?php
	// include autoloader
	require_once 'dompdf/autoload.inc.php';
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

//	use Illuminate\Support\Facades\File;
	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml(file_get_contents('nota.html'));

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("nota anda");
?>
