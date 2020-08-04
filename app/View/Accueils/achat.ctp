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
<?php if (@$achat == 'ach') { ?>
        <div class="col-md-3"  >
            <div class="panel panel-default">
                <div class="panel-heading aff_suivi">
                    <h3 class="panel-title">Achat</h3>
                </div>
                <div class="panel-body">
                    <div class="ls-animated-multi-lists">
                        <li class="current">
                            <ul class="souscurent" tabindex="0">
                                <?php
                                $lien_achat = CakeSession::read('lien_achat');
                                $n = 0;
                                if (!empty($lien_achat)) {
                                    foreach ($lien_achat as $k => $liens) {
                                        if (@$liens['lien'] == 'famillefournisseurs') {
                                            $famillefournisseur = 1;
                                        }
                                        if (@$liens['lien'] == 'fournisseurs') {
                                            $fournisseur = 1;
                                        }
                                        if (@$liens['lien'] == 'bonreceptions') {
                                            $bonreception = 1;
                                        }
                                        if (@$liens['lien'] == 'factures') {
                                            $facture = 1;
                                        }
                                        if (@$liens['lien'] == 'factureavoirfrs') {
                                            $factureavoirfrs = 1;
                                        }

                                        if (@$liens['lien'] == 'commandes') {
                                            $commande = 1;
                                        }
                                        if (@$liens['lien'] == 'relevefournisseurs') {
                                            $relevefournisseur = 1;
                                        }
                                        if (@$liens['lien'] == 'reglements') {
                                            $reglement = 1;
                                        }
                                        if (@$liens['lien'] == 'piecereglements') {
                                            $piecereglement = 1;
                                        }
                                        if (@$liens['lien'] == 'importations') {
                                            $importation = 1;
                                        }
                                        if (@$liens['lien'] == 'namepiecejointes') {
                                            $namepiecejointe = 1;
                                        }
                                        if (@$liens['lien'] == 'deviprospects') {
                                            $deviprospect = 1;
                                        }
                                        if (@$liens['lien'] == 'namesituations') {
                                            $namesituation = 1;
                                        }
                                        if (@$liens['lien'] == 'engagementfournisseurs') {
                                            $engagementfournisseur = 1;
                                        }
                                        if (@$liens['lien'] == 'etatpiecereglements') {
                                            $etatpiecereglement = 1;
                                        }
                                        if (@$liens['lien'] == 'etatretenues') {
                                            $etatretenues = 1;
                                        }
                                        if (@$liens['lien'] == 'etatvariations') {
                                            $etatvariations = 1;
                                        }
                                        if (@$liens['lien'] == 'variationtauxdechanges') {
                                            $variationtauxdechange = 1;
                                        }
                                    }
                                }
                                ?>
                                <li>
                                    <a href="#">Fournisseurs</a>
                                    <ul style="margin-top: 20px; display:none">
                                     <?php if (@$famillefournisseur == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Famillefournisseurs/index">Famille fournisseurs</a></li>
                                        <?php } ?>
                                        <?php if (@$fournisseur == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Fournisseurs/index">Fournisseurs</a></li>
                                     <?php } ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Commandes</a>
                                    <ul style="margin-top: 20px; display:none">
                                    <?php if (@$deviprospect == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Deviprospects/index">Suggestion Commande</a></li>
                                        <?php } ?>
                                    <?php if (@$commande == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Commandes/index">Commandes</a></li>
                                     <?php } ?>
                                    <?php if (@$importation == 1) { ?>
                                            <li class="">
                                                <a class="" href="<?php echo $this->webroot; ?>Importations/index">Importation</a></li>
                                      <?php } ?>
                                     <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatarticles/index">Prévision Commande Achat</a></li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="#">Facturation </a>
                                    <ul style="margin-top: 20px; display:none">
                                    <?php if (@$bonreception == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Bonreceptions/index">Bon de Livraison</a></li>
                                        <?php } ?>
                                        <?php if (@$factureavoirfrs == 1) { ?>
                                            <li class="">
                                                <a class="" href="<?php echo $this->webroot; ?>Bonreceptions/indexavoir">BL Avoir</a></li>
                                        <?php } ?>
                                        <?php if (@$facture == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Factures/index">Factures</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Bonreceptions/transfertbl_fact">Transfert Bon de Livraison --> Facture</a></li>
                                        <?php } ?>
                                        <?php if (@$factureavoirfrs == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Factureavoirfrs/index">>Factures Avoir</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>        
                                <li>
                                    <a href="#">R&egrave;glements </a>
                                    <ul style="margin-top: 20px; display:none">
                                    <?php if (@$reglement == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Reglements/index">R&egrave;glements</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Reglements/indeximp">R&egrave;glements des Impayé</a></li>    
                                        <?php } ?>
                                    <?php if (@$engagementfournisseur == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>traitecredits/index">Engagement Credit</a></li>
                                        <?php } ?>
                                    <?php if (@$etatretenues == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>etatretenues/index">Etat Retenues</a></li>
                                        <?php } ?>
                                         <?php if (@$etatvariations == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>variationtauxdechanges/index">Etat Variation Taux De Change</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Parametrage</a>
                                    <ul style="margin-top: 20px; display:none">
                                    <?php if (@$namepiecejointe == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>namepiecejointes/index">Piece jointe</a></li>
                                        <?php } ?>
                                        <?php if (@$namesituation == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>namesituations/index">Situation</a></li>
                                        <?php } ?>

                                    <?php if (@$etatpiecereglement == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>etatpiecereglements/index">Etat Piece Reglement</a></li>
    <?php } ?>                     </ul>
                                </li>   
                                <?php if (@$relevefournisseur == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Relevefournisseurs/index">Relevé Fournisseur</a></li>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Relevefournisseurs/indextotale">Relevé Fournisseur Globale</a></li>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Relevefournisseurs/indexetranger">Relevé Fournisseurs Etrangers</a></li>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Relevefournisseurs/indexetrangertotal">Relevé Fournisseurs Etrangers Globale</a></li>
                                <?php } ?>
                                     
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
