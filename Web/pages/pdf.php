<?php

/*
  An Example PDF Report Using FPDF
  by Matt Doyle

  From "Create Nice-Looking PDFs with PHP and FPDF"
  http://www.elated.com/articles/create-nice-looking-pdfs-php-fpdf/
*/

require_once( "fpdf/fpdf.php" );
require('../inc/config.php');


//Get variables

$Pozo = "Costayaco";
$Loc;
$Nom;
$SN;
$HZ;
$SIS;
$AL;
$INI;
$FIN;
$DEN;
$API;
$GR;
$TK;
$DU;
$LT;
$WC;
$OIL;
$WAT;
$GAS;
$PRE;
$TMP;
$GVF;
$OSS;
$CLI;
$date = date('Y-m-d');

// Begin configuration
$textColour = array( 0, 0, 0 );
$headerColour = array( 0, 0, 0 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 100, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 174, 214, 241 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportName = "Reporte $Pozo";
$reportNameYPos = 160;
$logoFile = "../backend/panel/images/logo.png";
$logoXPos = 50;
$logoYPos = 108;
$logoWidth = 110;


// End configuration


/**
  Create the title page
**/

$pdf = new FPDF( 'P', 'mm', 'A4' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->AddPage();
$pdf->SetTitle("Reporte $Nom $date");

// Logo
$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );

// Report Name
$pdf->SetFont( 'Arial', 'B', 24 );
$pdf->Ln( $reportNameYPos );
$pdf->Cell( 0, 15, utf8_decode("Reporte de prueba de producción"), 0, 0, 'C' );



/**
  Create the page header, main heading, and intro text
**/

$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', 'B', 17 );
$pdf->Image('../backend/panel/images/logo.png' , 10 ,8, 40 , 20,'PNG');
$pdf->Cell( 0, 10, "HAIMO MPFM", 0, 0, 'C' );
$pdf->Cell( -190, 23, $reportName, 0, 0, 'C' );
$pdf->SetFont( 'Arial', 'B', 15 );
$pdf->Ln( 10 );
$pdf->Cell( 0, 50, utf8_decode("INFORMACIÓN DEL POZO"), 0, 0, 'C' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );



/**
  Create the table
**/

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 35 );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 7 );

// "PRODUCT" cell
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );

//Cells
$pdf->Cell( 45, 10, "Campo", 1, 0, 'C', true );
$pdf->Cell( 45, 10, utf8_decode("Localización"), 1, 0, 'C', true );
$pdf->Cell( 45, 10, "Nombre de pozo", 1, 0, 'C', true );
$pdf->Cell( 40, 10, "Medidor SN", 1, 0, 'C', true );
$pdf->Cell( 20, 10, "Hz", 1, 0, 'C', true );
$pdf->Ln(10);
$pdf->SetFont( 'Arial', '', 7 );
$pdf->Cell( 45, 5, "$Pozo", 1, 0, 'C', false );
$pdf->Cell( 45, 5, "$LOC", 1, 0, 'C', false );
$pdf->Cell( 45, 5, "$Nom", 1, 0, 'C', false );
$pdf->Cell( 40, 5, "$SN", 1, 0, 'C', false );
$pdf->Cell( 20, 5, "$HZ", 1, 0, 'C', false );

$pdf->Ln( 20 );

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 6 );

// "PRODUCT" cell
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );

//Cells
$pdf -> SetX(17); 
$pdf->Cell( 45, 10, utf8_decode("Sistema de bombeo"), 1, 0, 'C', true );
$pdf->Cell( 45, 10, utf8_decode("Alineación de pozo"), 1, 0, 'C', true );
$pdf->Cell( 45, 10, utf8_decode("Inicio prueba MPFM"), 1, 0, 'C', true );
$pdf->Cell( 45, 10, utf8_decode("Fin de prueba MFPM"), 1, 0, 'C', true );
$pdf->Ln(10);
$pdf->SetFont( 'Arial', '', 6 );
$pdf -> SetX(17); 
$pdf->Cell( 45, 5, utf8_decode("$SIS"), 1, 0, 'C', false );
$pdf->Cell( 45, 5, utf8_decode("$AL"), 1, 0, 'C', false );
$pdf->Cell( 45, 5, utf8_decode("$INI"), 1, 0, 'C', false );
$pdf->Cell( 45, 5, utf8_decode("$FIN"), 1, 0, 'C', false );

$pdf->Ln( 3 );
$pdf -> SetX(15);
$pdf->SetFont( 'Arial', 'B', 15 );
$pdf->Cell( 0, 50, utf8_decode("PROPIEDADES DE LOS FLUIDOS"), 0, 0, 'C' ); 

$pdf->Ln( 40 );

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 6 );

// "PRODUCT" cell
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );

//Cells
$pdf->Cell( 45, 5, utf8_decode("Densidad del agua @60°F(kg/m3"), 1, 0, 'C', true );
$pdf->Cell( 45, 5, utf8_decode("Crudo API@60°F"), 1, 0, 'C', true );
$pdf->Cell( 45, 5, utf8_decode("Gr @60°F(14.7psi)"), 1, 0, 'C', true );
$pdf -> SetX(180); 
$pdf->Cell( 20, 5, utf8_decode("Prueba TK"), 1, 0, 'C', true );

//Rows
$pdf->Ln( 5 );
$pdf->Cell( 45, 5, utf8_decode("$DEN"), 1, 0, 'C', false );
$pdf->Cell( 45, 5, utf8_decode("$API"), 1, 0, 'C', false );
$pdf->Cell( 45, 5, utf8_decode("$GR"), 1, 0, 'C', false );
$pdf -> SetX(180); 
$pdf->Cell( 20, 5, utf8_decode("$TK"), 1, 0, 'C', false );

$pdf->Ln( 5 );
$pdf -> SetX(15);
$pdf->SetFont( 'Arial', 'B', 15 );
$pdf->Cell( 0, 50, utf8_decode("SUMARIO DE RESULTADOS"), 0, 0, 'C' ); 

$pdf->Ln( 40 );
$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
// Create the table header row
$pdf->SetFont( 'Arial', 'B', 6 );
// "PRODUCT" cell
$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );

//Cells
$pdf -> SetX(17);
$pdf->Cell( '170', 10, utf8_decode("HAIMO MFPM"), 1, 0, 'C', true );
$pdf->Ln( 10 );
$pdf -> SetX(17);
$pdf->Cell( '20', 8, utf8_decode("Duración (Horas)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Líquido Total"), 1, 0, 'C', true );
$pdf->Cell( '10', 8, utf8_decode("WC (%)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Crudo (SBPD)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Agua (SBPD)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Gas (SCFD)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Presión (PSI)"), 1, 0, 'C', true );
$pdf->Cell( '30', 8, utf8_decode("Temperatura (°F)"), 1, 0, 'C', true );
$pdf->Cell( '10', 8, utf8_decode("GVF (%)"), 1, 0, 'C', true );
$pdf->Ln( 8 );
$pdf -> SetX(17);
$pdf->Cell( 20, 5, utf8_decode("$DU"), 1, 0, 'C', false );
$pdf->Cell( 20, 5, utf8_decode("$LT"), 1, 0, 'C', false );
$pdf->Cell( 10, 5, utf8_decode("$WC"), 1, 0, 'C', false );
$pdf->Cell( 20, 5, utf8_decode("$OIL"), 1, 0, 'C', false );
$pdf->Cell( 20, 5, utf8_decode("$WAT"), 1, 0, 'C', false );
$pdf->Cell( 20, 5, utf8_decode("$GAS"), 1, 0, 'C', false );
$pdf->Cell( 20, 5, utf8_decode("$PRE"), 1, 0, 'C', false );
$pdf->Cell( 30, 5, utf8_decode("$TMP"), 1, 0, 'C', false );
$pdf->Cell( 10, 5, utf8_decode("$GVF"), 1, 0, 'C', false );

$pdf->Ln(20);
$pdf->SetFont( '', 'BU', 12 );
$pdf->Write( 6, "NOTAS:" );
$pdf->Ln(8);
$pdf->SetFont( 'Arial', '', 10 );
$pdf->Write( 6, "1. Las tasas de flujo que se miden en el MPFM son a condiciones de linea." );
$pdf->Ln(5);
$pdf->Write( 6, "2. Los datos mostrados en el cuadro anterior corresponden al promedio de los resultados tomados durante la prueba." );

$pdf->Ln(22);
$pdf->SetFont( 'Arial', 'B', 8 );
$pdf->Write( 6, "Representante OSS:" );
$pdf -> SetX(38);
$pdf->SetFont( 'Arial', '', 8 );
$pdf->Write( 6, utf8_decode("$OSS") );
$pdf -> SetX(100);
$pdf->SetFont( 'Arial', 'B', 8 );
$pdf->Write( 6, "Representante Cliente:" );
$pdf -> SetX(131);
$pdf->SetFont( 'Arial', '', 8 );
$pdf->Write( 6, utf8_decode("$CLI") );

$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', 'B', 17 );
$pdf->Image('../backend/panel/images/logo.png' , 10 ,8, 40 , 20,'PNG');
$pdf->Cell( 0, 10, "HAIMO MPFM", 0, 0, 'C' );
$pdf->Ln(6);
$pdf->Cell( 0, 10, "DATA POR MINUTO", 0, 0, 'C' );
$pdf->Ln(15);
$pdf->SetFont( 'Arial', 'B', 7 );
$pdf -> SetX(17);
$pdf->Cell( '20', 8, utf8_decode("Tiempo"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Líquido (SBPD)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Crudo (SBPD)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Agua (SBPD)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Gas (SBPD)"), 1, 0, 'C', true );
$pdf->Cell( '10', 8, utf8_decode("WC (%)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("GVF (%)"), 1, 0, 'C', true );
$pdf->Cell( '30', 8, utf8_decode("Temperatura (°F)"), 1, 0, 'C', true );
$pdf->Cell( '20', 8, utf8_decode("Pres (PSI)"), 1, 0, 'C', true );
$pdf->Ln(8);
$i=0;
$pdf->SetFont( 'Arial', '', 6 );
$Query = mysqli_query($link,"SELECT * FROM minutedata ORDER BY id DESC");
while($Row = mysqli_fetch_array($Query)){
  $pdf -> SetX(17);
  $pdf->Cell( '20', 8, $Row['hour'] , 1, 0, 'C', false );
  $pdf->Cell( '20', 8, $Row['LFR'], 1, 0, 'C', false );
  $pdf->Cell( '20', 8, $Row['OFR'], 1, 0, 'C', false );
  $pdf->Cell( '20', 8, $Row['WFR'], 1, 0, 'C', false );
  $pdf->Cell( '20', 8, $Row['GFR'], 1, 0, 'C', false );
  $pdf->Cell( '10', 8, $Row['WCUT'], 1, 0, 'C', false );
  $pdf->Cell( '20', 8, $Row['GVF'], 1, 0, 'C', false );
  $pdf->Cell( '30', 8, $Row['TMP'], 1, 0, 'C', false );
  $pdf->Cell( '20', 8, $Row['PRE'], 1, 0, 'C', false );
  $pdf->Ln(8);
  $i++;
}

$pdf->Output( "report.pdf", "I" );

?>
