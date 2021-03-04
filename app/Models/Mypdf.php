<?php

namespace  App\Models;

use DateTime;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf;

class Mypdf extends TCPDF {
	//Pdf Header
	Public function Header(){
		if($this->page == 1){
			$this->writeHTML(view('reportHeader'), true, false, true, false, '');
			$this->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT);
		}else {
			$this->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
		}

	}

	Public function Footer(){
		$now = new DateTime();
		$printTime = $now->format('Y-m-d H:i');

		//Position at 15mm at the bottom
		$this->SetY(-15);
		//Set font
		$this->SetFont('helvetica', 'I', 8);
		//set page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, "Printed by: ".Auth::user()->name." Date: ".$printTime, 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}
