
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
$pdf->SetTitle('CA par Point de Vente');

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
if($date1!="" && $date2!=""){
$date1=date('d/m/Y', strtotime(str_replace('-', '/',$date1)));
$date2=date('d/m/Y', strtotime(str_replace('-', '/',$date2)));
$m=' du  '.$date1.' au  '.$date2;
}
// ---------------------------------------------------------

$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('times', 'A', 11);
$logo=  CakeSession::read('logo');

$tbl .=' 

<table width="100%">
<tr>
    <td width="45%" align="left" >
    <IMG SRC="../webroot/img/'.$soc["Societe"]["logo"].'" width="110"  >
</td>
    <td  width="55%">
        <table width="100%">
            <tr>
            <br> 
                <td height="35px" align="left" ><strong>CA Par Point De Vente  '.$name.'</strong></td> 
            </tr> 
        </table>
    </td>
</tr>
<br>
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
<br><br><br>
   
 <table border="1" align="center" cellpadding="2" cellspacing="0"  width="100%" class="table" nobr="true">       
   <tr bgcolor="#FFFFFF" align="center">
                        <th width="25%" align="center" $zz height="30px" ><strong>Point De Vente</strong></th>
                        <th width="25%" align="center" $zz ><strong>CA ht</strong></th>
                         <th width="25%" align="center" $zz ><strong>CA ttc</strong></th>
                        <th width="25%" align="center" $zz ><strong>%</strong></th>
                        
   </tr>';
        $i=0;$total=0;
       // debug($commfournisseurs);die;
       foreach ($tab as $br){
            
            $i++;
            if($i==24){
                $tbl .='</table>';
                $pdf->writeHTML($tbl, true, false, false, false, '');
                $pdf->AddPage('P');
                $i=0;
                $tbl='
                    <table width="100%">
<tr>
    <td  width="55%">
        <IMG SRC="../webroot/img/'.$logo.'" >
    </td>
    <td  width="45%">
        <table width="100%">
            <tr>
            <br> 
                <td height="35px" align="left" ><strong>CA Par Clients  '.$m.'</strong></td> 
            </tr> 
        </table>
    </td>
</tr>
<br>
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
';
            }
            
          
               
        $tbl .= 
    '<tr bgcolor="#FFFFFF" align="center">    
        <td width="25%" nobr="nobr" align="left" height="30px" $zz>'.$br['PVname'].'</td>
        <td width="25%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$br['tot']).'</td>
             <td width="25%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$br['totttc']).'</td>
        <td width="25%" nobr="nobr" align="right"  $zz>'.$br['por'].'</td>
        
    </tr>' ;     
}

$tbl .= '
   <tr bgcolor="#FFFFFF" align="center">    
       
        <td width="25%" colspan="3" nobr="nobr" align="center"  $zz>Total</td>
        <td width="25%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$totaleBLF).'</td>
             <td width="25%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$totaleBLFttc).'</td>
        <td width="25%" nobr="nobr" align="right"  $zz>100%</td>
    </tr>
</table>
<br><br><br>
   
 <table border="1" align="center" cellpadding="2" cellspacing="0"  width="100%" class="table" nobr="true">       
   <tr bgcolor="#FFFFFF" align="center">
                        <th width="20%" align="center" $zz height="30px" ><strong>Point De Vente</strong></th>
                        <th width="15%" align="center" $zz ><strong>CA</strong></th>
                        <th width="10%" align="center" $zz ><strong>%CA</strong></th>
                        <th width="15%" align="center" $zz ><strong>Reglement</strong></th>
                        <th width="15%" align="center" $zz ><strong>%Reglement</strong></th>
                        <th width="15%" align="center" $zz ><strong>Reste</strong></th>
                        <th width="10%" align="center" $zz ><strong>%Reste</strong></th></tr>';
$totreg=0; $totres=0; 
                                        foreach ($tab as $brr){
                                                $mtreste=$brr['totttc']-$brr['mtregler'];
                                                $totreg=$totreg+$brr['mtregler'];
                                                $totres=$totres+$mtreste;
                                                $porreg=($brr['mtregler']/$brr['totttc'])*100;
                                                $porres=($mtreste/$brr['totttc'])*100;
    
     $tbl .= 
    '<tr bgcolor="#FFFFFF" align="center">    
        <td width="20%" nobr="nobr" align="left" height="30px" $zz>'.$brr['PVname'].'</td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.$brr['totttc'].'</td>
        <td width="10%" nobr="nobr" align="right"  $zz>'.$brr['porttc'].'%</td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$brr['mtregler']).'</td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$porreg).'%</td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$mtreste).'</td>
        <td width="10%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$porres).'%</td>
        
    </tr>' ;
    
    
}
$tbl .= '
   <tr bgcolor="#FFFFFF" align="center">    
       
        <td width="20%" colspan="3" nobr="nobr" align="center"  $zz>Total</td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$totaleBLFttc).'</td>
        <td width="10%" nobr="nobr" align="right"  $zz>100%</td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$totreg).'</td>
        <td width="15%" nobr="nobr" align="right"  $zz></td>
        <td width="15%" nobr="nobr" align="right"  $zz>'.sprintf("%01.3f",$totres).'</td>
        <td width="10%" nobr="nobr" align="right"  $zz></td>
    </tr>
</table>
<br><br><br>';    

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
ob_end_clean();
$pdf->Output('devis.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>