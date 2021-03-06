
<?php

App::import('Vendor', 'xtcpdf');
$pdf = new XTCPDF();

class MYPDF extends TCPDF {
var $xheadertext  = 'PDF created using CakePHP and TCPDF'; 
    var $xheadercolor = array(0,0,200); 
    //var $xfootertext  = 'Copyright Ã‚Â© %d XXXXXXXXXXX. <b>All rights reserved.</b>'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ;
    //Page header
    public function Header() {
        
    }

    // Page footer
    public function Footer() {
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);  
         $footertext1 = sprintf($this->xfootertext1, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
         $footertext2 = sprintf($this->xfootertext2, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
        $this->Cell(0,8, $footertext,'T',1,'L'); 
        $this->Cell(0,1, $footertext1,0,1,'L'); 
        $this->Cell(0,3, $footertext2,0,1,'L'); 
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PARAMED');
$pdf->SetTitle('Facture Client');

$ent = 'entete.jpg';
$ModelSociete = ClassRegistry::init('Societe');
$soc = $ModelSociete->find('first',array('conditions'=>array('Societe.mere'=>1)));

$footer = '     SARL au Capital de : ' . $soc['Societe']['capital'] . '          Adresse : ' . $soc['Societe']['adresse'] . '          Code T.V.A: ' . $soc['Societe']['codetva'] . '          RIB: ' . $soc['Societe']['rib'] . '          RC: ' . $soc['Societe']['rc']  ;
$footer1 = ''; 
$aaa = "abc";
$pdf->xfootertext = $footer;
$pdf->xfootertext1 = '';
$pdf->xfootertext2 = '';

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}
if(!empty($date1) && !empty($date2)){
$date1=date('d/m/Y', strtotime(str_replace('-', '/',$date1)));
$date2=date('d/m/Y', strtotime(str_replace('-', '/',$date2)));
$m=' du  '.$date1.' au  '.$date2;
}
// ---------------------------------------------------------

$pdf->AddPage('L');

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('times', 'A', 12);
$logo=  CakeSession::read('logo');



        

$footer = 'Paramed';

//$aaa = "abc";
//$pdf->xfootertext = $footer;
//$pdf->xfootertext1 = '';
//$pdf->xfootertext2 = '';
//
//// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
//
//// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//
//// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//
//// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//
//// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//
//// set some language-dependent strings (optional)
//if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
//    require_once(dirname(__FILE__) . '/lang/eng.php');
//    $pdf->setLanguageArray($l);
//}
//
//// ---------------------------------------------------------
//
//
//
////$pdf->SetFont('dejavusans', '', 12);
////$pdf->SetFont('times', 'B', 12);
//$pdf->SetFont('aealarabiya', '', 12);
////$pdf->SetFont('dejavusans', '', 12);
// $pdf->AddPage('L');   //  P  ou L 

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

//$pdf->SetFont('times', 'A', 11);
   
        
// --------------------------------------------------------------------------
//$dd='';
 // debug($soldeinitial);die;
$tbl = '
 
<table width="100%">
<tr>
    <td width="45%" align="left" >
                        <IMG SRC="../webroot/img/' . $soc["Societe"]["logo"] . '" width="120"  >
                    </td>
    <td  width="55%">
        <table width="100%">
            <tr>
                <td height="35px" align="left" ><strong>Etat de solde Clients ' . @$m . '</strong></td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td align="left" width="55%"  >' . $soc['Societe']['adresse'] . '</td>
    <td align="left" width="45%" ><strong>Tél : </strong>' . $soc['Societe']['tel'] . '</td>
</tr>
<tr>
    <td align="left" width="55%"  ><strong>TVA :</strong>' . $soc['Societe']['codetva'] . '</td>
    <td align="left" width="45%" ><strong>Fax :</strong>' . $soc['Societe']['fax'] . '</td>
</tr>
<tr>
    <td align="left" width="55%"  ><strong>R.C :</strong>' . $soc['Societe']['rc'] . '</td>
     <td align="left" width="45%" ><strong>Site web : </strong>' . $soc['Societe']['site'] . '</td>
</tr>
    
</table>

<table border="1" align="center" cellpadding="2" cellspacing="0"  width="100%" class="table" >       

<tr bgcolor="#EAEAEA" align="center">
        <th width="10%" align="center"  ><strong>Date</strong></th>
        <th width="11%" align="center"  ><strong>N° Piece</strong></th>
        <th width="30%" align="center"  ><strong>Libellé Piece</strong></th>
        <th width="12%" align="center"  ><strong>Echéance</strong></th>
        <th width="12%" align="center"  ><strong>Dédit</strong></th>
        <th width="12%" align="center"  ><strong>Crédit</strong></th>
        <th width="13%" align="center"  ><strong>Solde</strong></th>
    </tr>';
        
    
   
        if(!empty($relefes)){
        $totdebit=0;
        $totcredit=0;
        $totimpayer=0;
        $totreg=0; 
        $totavoir=0;
        $totsolde=0;
        $totdebitt=0;
        $totcreditt=0;
        $totimpayert=0;
        $totregt=0; 
        $totavoirt=0;
        $totsoldet=0;
        $clt_id=0; 
        $totsoldett=0;
        //debug($relefes);
        $hh=0;
        $c=0;$t=0;
        foreach ($relefes as $i=>$relefe){
        $totdebitt=$totdebitt+@$relefe['Relevefournisseur']['debit'];
        $totcreditt=$totcreditt+@$relefe['Relevefournisseur']['credit'];
        $totimpayert=$totimpayert+@$relefe['Relevefournisseur']['impaye'];
        $totregt=$totregt+@$relefe['Relevefournisseur']['reglement'];
        $totavoirt=$totavoirt+@$relefe['Relevefournisseur']['avoir'];
        $totsoldet=$totsoldet+@$relefe['Relevefournisseur']['solde'];
            $hh++; 
                    
                    
if ($relefe['Fournisseur']['id']!=$clt_id){
    
        if($i!=0){ 
        
$tbl .='
       <tr>
        <td colspan="3" bgcolor="#EAEAEA" align="center"><strong> Total  </strong></td>    
        <td  align="right"><strong>'.@$totdebit.'</strong></td>
        <td  align="right"><strong>'.@$totcredit.'</strong></td>
        <td  align="right"><strong>'.@$totsolde.'</strong></td>
      </tr>';
        $totsoldett = $totsoldett + $totsoldet;
        $totdebit=0;
        $totcredit=0;
        $totimpayer=0;
        $totreg=0; 
        $totavoir=0;
        $totsolde=0;
        
} 
$soldedeb="";$soldecred="";
$sld=$soldeint;$soldecredd=0;
$soldedebb=0;
if($soldeint<0){
 $soldedeb=$soldeint*(-1);  
 $soldedebb=$soldeint;
}
if($soldeint>0){
 $soldecredd=$soldeint;   
 $soldecred=$soldeint;   
}
$tbl .='<tr>
    <td bgcolor="#EAEAEA" align="center"><strong> Fournisseur </strong></td>    <td colspan="6"  ><strong>&nbsp;&nbsp;&nbsp;&nbsp;'. @$relefe['Fournisseur']['code'].'  '.@$relefe['Fournisseur']['name']. '</strong></td>
</tr>
<tr>
    <td bgcolor="#EAEAEA" width="63%" align="center" colspan="4"><strong> Solde départ </strong></td> 
       
        <td width="12%" nobr="nobr" align="right"   >'.@$soldedeb.'</td>
        <td width="12%" nobr="nobr" align="right"   >'.@$soldecred.'</td>
        <td width="13%" nobr="nobr" align="right"  >'.@$soldeint.'</td> 
</tr>';

}
$clt_id=$relefe['Fournisseur']['id'];                    
if($relefe['Relevefournisseur']['debit']!=null) {
           // debug("debit");die;
         $sld=$sld+$relefe['Relevefournisseur']['debit'];
        }   else{
            // debug("credit");die;
             $sld=$sld-$relefe['Relevefournisseur']['credit'];
        }   
                        
     if($relefe['Relevefournisseur']['echeance']=="01/01/1970"){
        $relefe['Relevefournisseur']['echeance']="" ;   
        }
            
        
        
        $tbl .= 
    '<tr  align="center">    
        <td width="10%" nobr="nobr" align="center"  ><strong>'.date("d/m/Y",strtotime(str_replace('-','/',@$relefe['Relevefournisseur']['date']))).'</strong></td>
        <td width="11%" nobr="nobr" align="center"   >'.@$relefe['Relevefournisseur']['numero'].'</td>
        <td width="30%" nobr="nobr" align="left"   >'.@$relefe['Relevefournisseur']['type'].'</td>  
        <td width="12%" nobr="nobr" align="center"  >'.@$relefe['Relevefournisseur']['echeance'].'</td>    
        <td width="12%" nobr="nobr" align="right"   >'.@$relefe['Relevefournisseur']['debit'].'</td>
        <td width="12%" nobr="nobr" align="right"   >'.@$relefe['Relevefournisseur']['credit'].'</td>
        <td width="13%" nobr="nobr" align="right"  >'.sprintf("%01.3f",@$sld).'</td> 
    </tr>';    
 
 
        $totdebit=$totdebit+@$relefe['Relevefournisseur']['debit'];
        $totcredit=$totcredit+@$relefe['Relevefournisseur']['credit'];
        $totimpayer=$totimpayer+@$relefe['Relevefournisseur']['impaye'];
        $totreg=$totreg+@$relefe['Relevefournisseur']['reglement'];
        $totavoir=$totavoir+@$relefe['Relevefournisseur']['avoir'];
        $totsolde=$totsolde+@$relefe['Relevefournisseur']['solde'];
        }$totsoldett = $totsoldett + @$sld;
 }
      $tbl .=  
       ' 
           <tr bgcolor="#EAEAEA" align="center">  
                <td colspan="4" align="center" width="63%"   ><strong>Total </strong></td>
                <td  align="right" width="12%"><strong>'.sprintf("%01.3f",($totdebit+$soldedebb)).'</strong></td>
                <td  align="right" width="12%"><strong>'.sprintf("%01.3f",($totcredit+$soldecredd)).'</strong></td> 
                <td  align="right" width="13%"><strong>'.sprintf("%01.3f",$sld).'</strong></td>
           </tr>
            <tr bgcolor="#EAEAEA" align="center">  
                <td colspan="4" align="center" width="63%"   ><strong>Total Générale</strong></td>
                <td  align="right" width="12%"><strong>'.sprintf("%01.3f",($totdebitt+$soldedebb)).'</strong></td>
                <td  align="right" width="12%"><strong>'.sprintf("%01.3f",($totcreditt+$soldecredd)).'</strong></td> 
                <td  align="right" width="13%"><strong>'.sprintf("%01.3f",$totsoldett).'</strong></td>
           </tr>
           ';
        
$tbl .= 
        ' 
</table> <br><br>
';

           
            
           
 $tbl .='
</table>            
';
    

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
ob_end_clean();
$pdf->Output('releve_client.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>