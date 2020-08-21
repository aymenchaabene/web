<?php
include ('crudproduit.php');
include ('crudcommande.php');
include ('crudClient.php');
$crud=new crudcommande();

if (isset($_GET['id_commande']))
	$id_commande=$_GET['id_commande'];

$liste=$crud->Afficher_1_Commande($crud->conn,$id_commande);
	$crud2=new crudClient();

$total=0;

foreach ($liste as $l)
{
	$date=$l['date_commande'];
	$id_commande=$l['id_commande'];
	$id_client=$l['id_client'];
	$montant=$l['montant_commande'];	
	$adresse=$l['adresse_commande'];

}
	$liste2=$crud2->recupererClient($id_client,$crud2->conn);
		foreach ($liste2 as $l2)
		{
			$nom=$l2['nom'].' '.$l2['prenom'];
		}

$crud2=new crudproduit();
$crud3=new crudlignedecommande();
$liste1=$crud3->Affiche_Produits($crud3->conn,$id_commande);

 $value=$crud->Total_Commande($crud->conn,$id_commande);
 foreach ($value as $v)
{
	$total+=$v['qte_produit']*$v['montant_produit'];
}


/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Europe/London');

/** PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/excel/Classes/PHPExcel/IOFactory.php';



echo date('H:i:s') , " Load from Excel5 template" , EOL;
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("excel/Examples/templates/30template.xls");




echo date('H:i:s') , " Add new data to the template" , EOL;
		foreach ($liste1 as $l1)
		{
		$l=$crud2->Afficher_1_Produit($crud2->conn,$l1['id_produit']);
		$l2=$crud3->Affiche_Quantites($crud3->conn,$id_commande,$l1['id_produit']);
		foreach ($l2 as $l3)
		{
			$x=$l3['qte_produit'];
		}

		foreach ($l as $l0)
		{		
		$y=$x*$l0 ['prix_produit'];

		/*
		$pdf->SetFont('Times','',12);
		$pts=$l0['ptsfid_produit']*$x;
		$pdf->Cell(40,6,$l0['nom_produit'],1);
		$pdf->Cell(40,6,$l0 ['prix_produit'],1);
		$pdf->Cell(40,6,$x,1);
		$pdf->Cell(40,6,$pts,1);
		*/
		$data = array(array('title'		=> $l0['nom_produit'],
			'price'		=> $l0 ['prix_produit'],
			'quantity'	=> $x,
			'total'	=> $y

		   ),
		);


		}

		}

$objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));

$baseRow = 5;
foreach($data as $r => $dataRow) {
	$row = $baseRow + $r;
	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $r+1)
	                              ->setCellValue('B'.$row, $dataRow['title'])
	                              ->setCellValue('C'.$row, $dataRow['price'])
	                              ->setCellValue('D'.$row, $dataRow['quantity'])
	                              ->setCellValue('E'.$row, $dataRow['total']);
	$j=$row;							  
}


$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);
$j++;
$objPHPExcel->getActiveSheet()->setCellValue('C'.$j,"Total");
$objPHPExcel->getActiveSheet()->setCellValue('D'.$j,$total);


echo date('H:i:s') , " Write to Excel5 format" , EOL;
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing file" , EOL;
echo 'File has been created in ' , getcwd() , EOL;

header("Location: table.php");