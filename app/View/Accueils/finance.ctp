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
<?php if (@$finance == 'fnc') { ?>
        <div class="col-md-3"  >
            <div class="panel panel-default">
                <div class="panel-heading aff_suivi">
                    <h3 class="panel-title">Finance</h3>
                </div>
                <div class="panel-body">
                    <div class="ls-animated-multi-lists">
                        
                            <ul>
                                <?php
                                $lien_finance = CakeSession::read('lien_finance');
                                $n = 0;
                                if (!empty($lien_finance)) {
                                    foreach ($lien_finance as $k => $liens) {

                                        if (@$liens['lien'] == 'comptes') {
                                            $compte = 1;
                                        }
                                        if (@$liens['lien'] == 'bordereaus') {
                                            $bordereau = 1;
                                        }
                                        if (@$liens['lien'] == 'versements') {
                                            $versement = 1;
                                        }
                                        if (@$liens['lien'] == 'sortiecaissees') {
                                            $sortiecaissee = 1;
                                        }

                                        if (@$liens['lien'] == 'caissees') {
                                            $caisse = 1;
                                        }
                                        if (@$liens['lien'] == 'retenue') {
                                            $retenue = 1;
                                        }
                                        if (@$liens['lien'] == 'retenuefournisseur') {
                                            $retenuefournisseur = 1;
                                        }
                                        if (@$liens['lien'] == 'etatvente') {
                                            $etatvente = 1;
                                        }
                                        if (@$liens['lien'] == 'etatachat') {
                                            $etatachat = 1;
                                        }
                                        if (@$liens['lien'] == 'carnetcheques') {
                                            $carnetcheque = 1;
                                        }
                                        if (@$liens['lien'] == 'alimentations') {
                                            $alimentation = 1;
                                        }
                                        if (@$liens['lien'] == 'interne') {
                                            $interne = 1;
                                        }



                                        if (@$liens['lien'] == 'engagementcomptes') {
                                            $engagementcomptes = 1;
                                        }
                                        if (@$liens['lien'] == 'engagementfournisseurs') {
                                            $engagementfournisseurs = 1;
                                        }
                                        if (@$liens['lien'] == 'engagementclients') {
                                            $engagementclients = 1;
                                        }
                                        if (@$liens['lien'] == 'retraits') {
                                            $retraits = 1;
                                        }
                                    }
                                }
                                ?>

                                <?php if (@$engagementcomptes == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Engagementcomptes/index">Engagement Compte</a></li>
                                <?php } ?>
                                <?php if (@$engagementfournisseurs == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexpf">Engagement Fournisseur</a></li>
                                <?php } ?>
                                <?php if (@$engagementclients == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexpc">Engagement Client</a></li>
                                <?php } ?>
                                <?php if (@$engagementcomptes == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Engagementcomptes/indexbancaire">T.B Dossier Bancaire</a></li>
                                <?php } ?>
                                <?php if (@$engagementfournisseurs == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexcredit">Engagement Zitouna</a></li>
                                    <li class="">
                                        <a class="" href="<?php echo $this->webroot; ?>Engagementcomptes/tableaudebordengagement">T.B Engagement</a></li>
                                <?php } ?>

                                <?php if (@$bordereau == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Bordereaus/index">Bordereau</a></li>
                                <?php } ?>
                                <?php if (@$versement == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Versements/index">Versement</a></li>
                                <?php } ?>
                                <?php if (@$retraits == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexr">Retrait</a></li>
                                <?php } ?>
                                <?php if (@$compte == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Comptes/index">Compte</a></li>
                                <?php } ?>
                                <?php if (@$carnetcheque == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Carnetcheques/index">Souche chequier</a></li>
                                <?php } ?>
   
                                <?php if (@$retenue == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Caissees/retenue">Retenue clients</a></li>
                                <?php } ?>
                                <?php if (@$retenuefournisseur == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Caissees/retenuefournisseur">Retenue fournisseurs</a></li>
                                <?php } ?>
                                <?php if (@$etatvente == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Caissees/etatvente">Etat des Ventes </a></li>
                                <?php } ?>
                                <?php if (@$etatachat == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Caissees/etatachat">Etat des Achats</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>