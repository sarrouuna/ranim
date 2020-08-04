<?php
$stock = CakeSession::read('stock');
$parametrage = CakeSession::read('parametrage');
$achat = CakeSession::read('achat');
$vente = CakeSession::read('vente');
$finance = CakeSession::read('finance');
$stat = CakeSession::read('stat');
$compta = CakeSession::read('compta');
$defaultmenu = CakeSession::read('defaultmenu');

$menus_par = CakeSession::read('lien_parametrage');
$menu_par = $menus_par[0]['lien'];
//debug($menu_par);die;

$menus_stk = CakeSession::read('lien_stock');
$menu_stk = $menus_stk[0]['lien'];

$menus_ach = CakeSession::read('lien_achat');
$menu_ach = $menus_ach[0]['lien'];

$menus_vnt = CakeSession::read('lien_vente');
$menu_vnt = $menus_vnt[0]['lien'];
if ($menu_vnt == 'marge') {
    $menu_vnt = $menus_vnt[1]['lien'];
}

$menus_fnc = CakeSession::read('lien_finance');
$menu_fnc = $menus_fnc[0]['lien'];

$menus_stat = CakeSession::read('lien_stat');
$menu_stat = $menus_stat[0]['lien'];

$menus_compta = CakeSession::read('lien_compta');
$menu_compta = $menus_compta[0]['lien'];
?>

<?php if (@$vente == 'vnt') { ?>
        <div class="col-md-3"  >
            <div class="panel panel-default">
                <div class="panel-heading aff_suivi">
                    <h3 class="panel-title">Vente</h3>
                </div>
                <div class="panel-body">
                    <div class="ls-animated-multi-lists">
                        
                            <ul>
                                <?php
                                $lien_vente = CakeSession::read('lien_vente');
                                $n = 0;
                                //debug($lien_vente);die;
                                if (!empty($lien_vente)) {
                                    foreach ($lien_vente as $k => $liens) {

                                        if (@$liens['lien'] == 'clients') {
                                            $client = 1;
                                        }
                                        if (@$liens['lien'] == 'bonlivraisons') {
                                            $bonlivraison = 1;
                                        }
                                        if (@$liens['lien'] == 'factureclients') {
                                            $factureclient = 1;
                                        }
                                        if (@$liens['lien'] == 'interventions') { //debug($liens);die;
                                            $intervention = 1;
                                        }
                                        if (@$liens['lien'] == 'commandeclients') {
                                            $commandeclient = 1;
                                        }
                                        if (@$liens['lien'] == 'devis') {
                                            $devi = 1;
                                        }
                                        if (@$liens['lien'] == 'releves') {
                                            $releve = 1;
                                        }
                                        if (@$liens['lien'] == 'recouvrements') {
                                            $recouvrements = 1;
                                        }
                                        if (@$liens['lien'] == 'familleclients') {
                                            $familleclient = 1;
                                        }
                                        if (@$liens['lien'] == 'sousfamilleclients') {
                                            $sousfamilleclient = 1;
                                        }
                                        if (@$liens['lien'] == 'zones') {
                                            $zone = 1;
                                        }
                                        if (@$liens['lien'] == 'factureavoirs') {
                                            $factureavoir = 1;
                                        }
                                        if (@$liens['lien'] == 'reglementclients') {
                                            $reglementclient = 1;
                                        }
                                        if (@$liens['lien'] == 'pays') {
                                            $pay = 1;
                                        }
                                        if (@$liens['lien'] == 'etatsoldecommandeclients') {
                                            $etatsoldecommandeclient = 1;
                                        }
                                        if (@$liens['lien'] == 'etathistoriquearticles') {
                                            $historiquearticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatligneventes') {
                                            $etatlignevente = 1;
                                        }
                                        if (@$liens['lien'] == 'tickets') {
                                            $tickets = 1;
                                        }
                                    }
                                }
                                ?>

                                <?php if ((@$client == 1) || (@$familleclient == 1) || (@$sousfamilleclient == 1)) { ?>
                                    <li>
                                        <a href="#">Info Client </a>
                                        <ul style="margin-top: 20px; display:none">
                                            <?php if (@$client == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Clients/index">Client</a></li>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Regions/index">Région</a></li>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Zones/index">Ville</a></li>
                                            <?php } ?>
                                            <?php if (@$familleclient == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Familleclients/index">Famille Client</a></li>
                                            <?php } ?>
                                            <?php if (@$sousfamilleclient == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Sousfamilleclients/index">Sous Famille Client</a></li>
                                            <?php } ?>
                                            <?php if (@$pay == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Pays/index">Pays</a></li>
                                            <?php } ?>
                                            <?php if (@$zone == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Zones/index">Zone</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if (@$devi == 1) { ?>
                                    <li>
                                        <a href="#">Devis  </a>

                                        <ul style="margin-top: 20px; display:none">
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Devis/index">Devis</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Devis/indexx">Factures Proforma</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Affaires/index">Affaire</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Rapportdactivitecommercials/index">Rapport d'activit&eacute;</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Affaires/etataffaire">statistique</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Suivicommercials/index">Suivi Commercial</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Affaires/indexvisite">Visite</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Regions/index">R&eacute;gions</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if (@$commandeclient == 1) { ?>
                                    <li class="">
                                        <a href="#">Commande  </a>
                                        <ul style="margin-top: 20px; display:none">  
                                            <?php if (@$commandeclient == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Commandeclients/index">Commande</a></li>
                                            <?php } ?>
                                            <?php if (@$etatsoldecommandeclient == 1) { ?>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatsoldecommandeclients/index">Solde Commandes Clients</a></li>
                                                <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatsoldecommandeclients/liquidation">Liquidation Commandes Clients</a></li>
                                            <?php } ?>
                                        </ul>    
                                    </li>
                                <?php } ?>
                                <li class="">
                                    <a href="#">Facturation  </a>
                                    <ul style="margin-top: 20px; display:none">    
                                    <?php if (@$bonlivraison == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Bonlivraisons/index">Bon de livraison</a></li>
                                        <?php } ?>
                                    <?php if (@$factureclient == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Factureclients/index">Facture</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Bonlivraisons/indexx">Facturation des BL</a></li>
                                    <?php } ?>
                                    <?php if (@$factureavoir == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Factureavoirs/index">Facture Avoir </a></li>
    <?php } ?>                       </ul>    
                                </li>


                                <li class="">
                                    <a href="#">R&egrave;glements  </a>
                                    <ul style="margin-top: 20px; display:none">    
                                    <?php if (@$reglementclient == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Reglementclients/index">R&egrave;glements</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Reglementclients/indexrl">R&egrave;glements libres</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Reglementclients/indexpc">Caisse Personnel</a></li>
                                    <?php } ?>
                                    </ul>    
                                </li> 
                                <li class="">
                                    <a href="#">Relev&eacute; client  </a>
                                    <ul style="margin-top: 20px; display:none">   
                                    <?php if (@$releve == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Releves/index">Relev&eacute; client</a></li>
                                        <?php } ?>
                                        <?php if (@$recouvrements == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Recouvrements/index">Etat Recouvrement client</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Releves/indextotale">Relev&eacute; client globale</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Bordereaus/indeximp">Etat des Impay&eacute;s</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Releves/prevision">Prévision Recouvrement</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Releves/indexprevision">Liste Prévision</a></li>    
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Releves/index_reg_n_ech">Ecours Clients</a></li>    
                                        <?php } ?>
                                    </ul>    
                                </li>
                                <?php if (@$historiquearticle == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etathistoriquearticles/index">Historique Article</a></li>
                                <?php } ?>
                                <?php if (@$etatlignevente == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatligneventes/index">Vente Journalier</a></li>
                                <?php } ?>
                                <?php if (@$intervention == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Interventions/index">Fiche d'intervention</a></li>
                                <?php } ?>
                                <?php if (@$tickets == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Tickets/index">Ticket</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>