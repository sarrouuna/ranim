
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
//debug($societeid);die;
$ModelSociete = ClassRegistry::init('Societe');
$soc = $ModelSociete->find('first',array('conditions'=>array('Societe.id'=>$societeid)));

$footer = '     SARL au Capital de : ' . $soc['Societe']['capital'] . '          Adresse : ' . $soc['Societe']['adresse'] . '          Code T.V.A: ' . $soc['Societe']['codetva'] . '          RIB: ' . $soc['Societe']['rib']      ;
$footer1 = '     Site : ' . $soc['Societe']['site'] . '           E-mail: ' . $soc['Societe']['mail'] . '           Tel : ' . $soc['Societe']['tel'] . '             Fax : ' . $soc['Societe']['fax'].'                          '.$pdf->getAliasNumPage().' / '.$pdf->getAliasNbPages();

$aaa = "abc";
$pdf->xfootertext = $footer;
$pdf->xfootertext1 = $footer1;
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

$pdf->AddPage('P');

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('times', 'A', 7);
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
 
<table width="100%"  border="0">
<tr>
    <td width="80%" align="left" >
            <strong style="font-size:13;">'.$soc['Societe']['nom'].'</strong> <br>
            <table>
            <tr>
            <td align="left" width="70%" style="font-size:9;">
            <strong>'.$soc['Societe']['activite'].'</strong><br>
            '.$soc['Societe']['adresse'].'<br>
            <strong>M.F : </strong>'.$soc['Societe']['codetva'].'<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RC : </strong>'.$soc['Societe']['rc'].'<br> 
            <strong>RIB : </strong>'.$soc['Societe']['rib'].'<br>
            <strong>TEL/FAX : </strong>'.$soc['Societe']['tel'].'<br>   
            </td>
            </tr>
            </table>
    </td>
    <td  width="20%" align="left">
            <IMG SRC="../webroot/img/'.$soc["Societe"]["logo"].'" style="width: 100px;height:80px;" >
    </td>
    
</tr>
</table>
<table border="1" align="center" cellpadding="2" cellspacing="0"  width="100%" class="table" >       

<tr bgcolor="#EAEAEA" align="center">
        <th width="8%" align="center"  ><strong>Date</strong></th>
        <th width="10%" align="center"  ><strong>N° Piece</strong></th>
        <th width="40%" align="center"  ><strong>Libellé Piece</strong></th>
        <th width="7%" align="center"  ><strong>Dédit</strong></th>
        <th width="7%" align="center"  ><strong>Crédit</strong></th>
        <th width="7%" align="center"  ><strong>Impayé</strong></th>
        <th width="7%" align="center"  ><strong>Règlement</strong></th>
        <th width="7%" align="center"  ><strong>Avoir</strong></th>
        <th width="7%" align="center"  ><strong>Solde</strong></th>
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
        //debug($relefes);
        $hh=0;
        $c=0;$t=0;
        foreach ($relefes as $i=>$relefe){
        $totdebitt=$totdebitt+@$relefe['Relefe']['debit'];
        $totcreditt=$totcreditt+@$relefe['Relefe']['credit'];
        $totimpayert=$totimpayert+@$relefe['Relefe']['impaye'];
        $totregt=$totregt+@$relefe['Relefe']['reglement'];
        $totavoirt=$totavoirt+@$relefe['Relefe']['avoir'];
        $totsoldet=$totsoldet+@$relefe['Relefe']['solde'];
        
//        if($hh >15){
//            //debug($hh);
//                        $tbl.='</table>';
//                        $pdf->writeHTML($tbl, true, false, false, false, '');
//                        $pdf->AddPage('L');
//                        $hh=0;
//                        $tbl='
//                           <table width="100%"  border="0">
//<tr>
//    <td width="80%" align="left" >
//            <strong style="font-size:13;">'.$soc['Societe']['nom'].'</strong> <br>
//            <table>
//            <tr>
//            <td align="left" width="70%" style="font-size:9;">
//            <strong>'.$soc['Societe']['activite'].'</strong><br>
//            '.$soc['Societe']['adresse'].'<br>
//            <strong>M.F : </strong>'.$soc['Societe']['codetva'].'<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RC : </strong>'.$soc['Societe']['rc'].'<br> 
//            <strong>RIB : </strong>'.$soc['Societe']['rib'].'<br>
//            <strong>TEL/FAX : </strong>'.$soc['Societe']['tel'].'<br>   
//            </td>
//            </tr>
//            </table>
//    </td>
//    <td  width="20%" align="left">
//            <IMG SRC="../webroot/img/'.$soc["Societe"]["logo"].'" style="width: 100px;height:80px;" >
//    </td>
//    
//</tr>
//</table>
//<table border="1" align="center" cellpadding="2" cellspacing="0"  width="100%" class="table" nobr="true">       
//
//<tr bgcolor="#EAEAEA" align="center">
//        <th width="10%" align="center"  ><strong>Date</strong></th>
//        <th width="12%" align="center"  ><strong>N° Piece</strong></th>
//        <th width="18%" align="center"  ><strong>Libellé Piece</strong></th>
//        <th width="10%" align="center"  ><strong>Dédit</strong></th>
//        <th width="10%" align="center"  ><strong>Crédit</strong></th>
//        <th width="10%" align="center"  ><strong>Impayé</strong></th>
//        <th width="10%" align="center"  ><strong>Règlement</strong></th>
//        <th width="10%" align="center"  ><strong>Avoir</strong></th>
//        <th width="10%" align="center"  ><strong>Solde</strong></th>
//    </tr>';
//                        
//        }
                    
if ($relefe['Client']['id']!=$clt_id){
    
        if($i!=0){ 
        
$tbl .='
       <tr>
        <td colspan="3" bgcolor="#EAEAEA" align="center"><strong> Total  </strong></td>    
        <td  align="right"><strong>'.number_format(@$totdebit,3, '.', ' ').'</strong></td>
        <td  align="right"><strong>'.number_format(@$totcredit,3, '.', ' ').'</strong></td>
        <td  align="right"><strong>'.number_format(@$totimpayer,3, '.', ' ').'</strong></td>
        <td  align="right"><strong>'.number_format(@$totreg,3, '.', ' ').'</strong></td>
        <td  align="right"><strong>'.number_format(@$totavoir,3, '.', ' ').'</strong></td>
        <td  align="right"><strong>'.number_format(@$totsolde,3, '.', ' ').'</strong></td>
      </tr>';
        $totdebit=0;
        $totcredit=0;
        $totimpayer=0;
        $totreg=0; 
        $totavoir=0;
        $totsolde=0;
        
}

$client=ClassRegistry::init('Client')->find('first', array('conditions' => array('Client.id'=>$relefe['Client']['id']),'recursive'=>0 ));
        $condb3 = 'Bonlivraison.client_id ='.$relefe['Client']['id'];
        $condf3 = 'Factureclient.client_id ='.$relefe['Client']['id'];
        $condfa3='Factureavoir.client_id ='.$relefe['Client']['id'];
        $condr3 = 'Reglementclient.client_id ='.$relefe['Client']['id'];
        $condtr3 = 'Transfert.societearrive ='.$client['Client']['societe_id'];    
        $solde=0;
            $soldeavoir=ClassRegistry::init('Factureavoir')->find('first', array(
            'fields'=>array('sum(Factureavoir.totalttc) as solde'),    
            'conditions' => array(@$condfas,$condfa3,$condfa6),'recursive'=>0 ));
            if(!empty($soldeavoir)){
                $solde=$solde-$soldeavoir[0]['solde'];
            }
            $soldebl=ClassRegistry::init('Bonlivraison')->find('first', array(
            'fields'=>array('sum((Bonlivraison.totalttc)) as solde'),    
            'conditions' => array(@$condbs,$condb3,$condb6,'Bonlivraison.factureclient_id'=>0),'recursive'=>0 ));
            if(!empty($soldebl)){
                $solde=$solde+$soldebl[0]['solde'];
                
            }
            $soldefac=ClassRegistry::init('Factureclient')->find('first', array(
            'fields'=>array('sum((Factureclient.totalttc)) as solde'),    
            'conditions' => array(@$condfs,$condf3,$condf6),'recursive'=>0 ));
            if(!empty($soldebl)){
                $solde=$solde+$soldefac[0]['solde'];
                
            }
            $soldereg=ClassRegistry::init('Reglementclient')->find('first', array(
            'fields'=>array('sum((Reglementclient.Montant)) as solde'),    
            'conditions' => array(@$condbbs,$condr3,$condr6,"Reglementclient.emi!='052'"),'recursive'=>0 ));
            if(!empty($soldereg)){
                $solde=$solde-$soldereg[0]['solde'];
            }
            $soldepiece=ClassRegistry::init('Piecereglementclient')->find('first', array(
            'fields'=>array('sum(Piecereglementclient.montant) as solde'),    
            'conditions' => array(@$condbbs,$condr3,$condr6,'Piecereglementclient.paiement_id in (2,3)','Piecereglementclient.situation="Impayé"'),'recursive'=>0 ));
            if(!empty($soldepiece)){
                $solde=$solde+$soldepiece[0]['solde'];
                
            }
            $soldetransfert=ClassRegistry::init('Transfert')->find('first', array(
            'fields'=>array('sum(Transfert.totttc) as solde'),    
            'conditions' => array(@$condtrs,$condtr3,$condtr6,'Transfert.fact_vente=0'),'recursive'=>0 ));
            if(!empty($soldetransfert)){
                $solde=$solde+$soldetransfert[0]['solde'];
                
            }    
            $soldeint=$client['Client']['solde']+$solde;
            $totsolde=$totsolde+$soldeint;
            $sld=$soldeint;
            
            $soldeencours=$soldeencours+$soldeint;










$soldedeb=0;$soldecred=0;
$sld=$soldeint;$soldecredd=0;
$soldedebb=0;
if($soldeint>0){
 $soldedeb=$soldeint;  
 $soldedebb=$soldeint;
}
if($soldeint<0){
 $soldecredd=$soldeint;   
 $soldecred=$soldeint*(-1);   
}
$tbl .='<tr>
    <td bgcolor="#EAEAEA" align="center"><strong> Client </strong></td>    <td colspan="8"  ><strong>&nbsp;&nbsp;&nbsp;&nbsp;'. @$relefe['Client']['code'].'  '.@$relefe['Client']['name']. '</strong></td>
</tr>
<tr>
    <td bgcolor="#EAEAEA" width="58%" align="center" colspan="3"><strong> Solde départ </strong></td> 
       
        <td width="7%" nobr="nobr" align="right"   >'.number_format(@$soldedeb,3, '.', ' ').'</td>
        <td width="7%" nobr="nobr" align="right"   >'.number_format(@$soldecred,3, '.', ' ').'</td>
        <td width="7%" nobr="nobr" align="right"  ></td>
        <td width="7%" nobr="nobr" align="right"  ></td> 
        <td width="7%" nobr="nobr" align="right"  ></td> 
        <td width="7%" nobr="nobr" align="right"  >'.number_format(@$soldeint,3, '.', ' ').'</td> 
</tr>';

}
$clt_id=$relefe['Client']['id'];                    
   if($relefe['Relefe']['debit']!=null) {
           // debug("debit");die;
         $sld=$sld+$relefe['Relefe']['debit'];
        }   else{
            // debug("credit");die;
             $sld=$sld-$relefe['Relefe']['credit'];
        }


//        $letype='';
//            if($relefe['Relefe']['tr']==0){
//                $letype=$relefe['Relefe']['type'];
//            }


        $tbl .=
    '<tr  align="center">    
        <td width="8%" nobr="nobr" align="center"  ><strong>'.date("d/m/Y",strtotime(str_replace('/','-',@$relefe['Relefe']['date']))).'</strong></td>
        <td width="10%" nobr="nobr" align="center"   >'.@$relefe['Relefe']['numero'].'</td>
        <td width="40%" nobr="nobr" align="left"   >'.@$relefe['Relefe']['type'].'</td>    
        <td width="7%" nobr="nobr" align="right"   >'.number_format(@$relefe['Relefe']['debit'],3, '.', ' ').'</td>
        <td width="7%" nobr="nobr" align="right"   >'.number_format(@$relefe['Relefe']['credit'],3, '.', ' ').'</td>
        <td width="7%" nobr="nobr" align="right"  >'.number_format(@$relefe['Relefe']['impaye'],3, '.', ' ').'</td>
        <td width="7%" nobr="nobr" align="right"  >'.number_format(@$relefe['Relefe']['reglement'],3, '.', ' ').'</td> 
        <td width="7%" nobr="nobr" align="right"  >'.number_format(@$relefe['Relefe']['avoir'],3, '.', ' ').'</td> 
        <td width="7%" nobr="nobr" align="right"  >'.number_format(@$sld,3, '.', ' ').'</td> 
    </tr>';

//    if($relefe['Relefe']['tr']==1){
//        $hh=$hh+1;
//        $lach='';
//        $lach= str_replace('<br>', ' *** ', $relefe['Relefe']['type']);
//
//        $tbl .=
//            '<tr  align="center">    
//                <td width="100%" colspan="7" nobr="nobr" align="left"   >'.@$lach.'</td>    
//            </tr>';
//
//    }




 
 
        $totdebit=$totdebit+@$relefe['Relefe']['debit'];
        $totcredit=$totcredit+@$relefe['Relefe']['credit'];
        $totimpayer=$totimpayer+@$relefe['Relefe']['impaye'];
        $totreg=$totreg+@$relefe['Relefe']['reglement'];
        $totavoir=$totavoir+@$relefe['Relefe']['avoir'];
        $totsolde=$totsolde+@$relefe['Relefe']['solde'];
        if($relefe['Relefe']['typ']=="Reg"){
        $hh=$hh+$relefe['Relefe']['nbligneimp'];  
        }else{
        $hh=$hh+1;
        }
        }}
      $tbl .=  
       ' 
           <tr bgcolor="#EAEAEA" align="center">  
                <td colspan="3" align="center" width="58%"   ><strong>Total </strong></td>
                <td  align="right" width="7%"><strong>'.number_format(($totdebit+$soldedebb),3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format(($totcredit+$soldecredd),3, '.', ' ').'</strong></td>     
                <td  align="right" width="7%"><strong>'.number_format($totimpayer,3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format($totreg,3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format($totavoir,3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format($sld,3, '.', ' ').'</strong></td>
           </tr>
            <tr bgcolor="#EAEAEA" align="center">  
                <td colspan="3" align="center" width="58%"   ><strong>Total Générale</strong></td>
                <td  align="right" width="7%"><strong>'.number_format(($totdebitt+$soldedebb),3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format(($totcreditt+$soldecredd),3, '.', ' ').'</strong></td>     
                <td  align="right" width="7%"><strong>'.number_format($totimpayert,3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format($totregt,3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format($totavoirt,3, '.', ' ').'</strong></td>
                <td  align="right" width="7%"><strong>'.number_format($sld,3, '.', ' ').'</strong></td>
           </tr>
           ';
        
$tbl .= 
        ' 
</table> 
';
//debug($tbl);die;
$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
ob_end_clean();
$pdf->Output('releve_client.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>