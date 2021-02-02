<?php

namespace  App\Models;

use DateTime;
use Illuminate\Support\Facades\Auth;

class InterimReportPdf extends TCPDF {
    var $test_request_information=[];

    //Pdf Header
    Public function Header(){
        /** f($this->page == 1){
        $this->writeHTML(View::make('interimReportHeader'), true, false, true, false, '');
        $this->SetMargins(PDF_MARGIN_LEFT, 50, PDF_MARGIN_RIGHT);
        }else {
        $this->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
        }*/

        $this->writeHTML(view('interimReportHeader',$this->getTestRequestInformation()), true, false, true, false, '');
        $this->SetMargins(PDF_MARGIN_LEFT, 80, PDF_MARGIN_RIGHT);

    }

    Public function Footer(){
        $now = new DateTime();
        $printTime = $now->format('Y-m-d H:i');
        $style = array(
            'border' => true,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        $codes = $this->test_request_information['patient']['patient_number'];
        if(empty($codes)){
            $code = $this->test_request_information['patient']['ulin'];
        }else{
            $code = $codes;
        }
        //Position at 15mm at the bottom
        $this->SetY(-15);
        //Set font
        $this->SetFont('helvetica', 'I', 8);
        //set page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 10, "Printed by: ".Auth::user()->name." Date: ".$printTime, 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->write2DBarcode($code, 'QRCODE,H', 15, 15, 15, 15, $style, 'R');
    }

    Public function setTestRequestInformation($par){
        $this->test_request_information = $par;
    }

    Public function getTestRequestInformation()
    {
        return $this->test_request_information;
    }
}
