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
<?php if (@$parametrage == 'par') { ?>
        <div class="col-md-3"  >
            <div class="panel panel-default">
                <div class="panel-heading aff_suivi">
                    <h3 class="panel-title">Param&ecirc;trages</h3>
                </div>
                <div class="panel-body">
                    <div class="ls-animated-multi-lists">

                        <ul>
                            <?php
                            $lien_parametrage = CakeSession::read('lien_parametrage');
                            //debug($lien_parametrage);die;
                            $n = 0;
                            if (!empty($lien_parametrage)) {
                                foreach ($lien_parametrage as $k => $liens) {
                                    if (@$liens['lien'] == 'societes') {
                                        $societe = 1;
                                    }
                                    if (@$liens['lien'] == 'personnels') {
                                        $personnel = 1;
                                    }
                                    if (@$liens['lien'] == 'fonctions') {
                                        $fonction = 1;
                                    }
                                    if (@$liens['lien'] == 'utilisateurs') {
                                        $utilisateur = 1;
                                    }
                                    if (@$liens['lien'] == 'pointdeventes') {
                                        $pointdevente = 1;
                                    }
                                    if (@$liens['lien'] == 'exercices') {
                                        $exercice = 1;
                                    }
                                    if (@$liens['lien'] == 'workflows') {
                                        $workflow = 1;
                                    }
                                    if (@$liens['lien'] == 'etatworkflows') {
                                        $etatworkflow = 1;
                                    }
                                    if (@$liens['lien'] == 'tracemisejours') {
                                        $tracemisejour = 1;
                                    }
                                }
                            }
                            ?>
                            <?php if (@$societe == 1) { ?>

                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Societes/index">
                                        <span>Societes</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$fonction == 1) { ?>

                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Fonctions/index">
                                       <span>Fonctions</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$personnel == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Personnels/index">
                                        <span>Personnels</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$utilisateur == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Utilisateurs/index">
                                       <span>Utilisateurs</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$pointdevente == 1) { ?>

                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Pointdeventes/index">
                                       <span>Points De Ventes</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$exercice == 1) { ?>

                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Exercices/index">
                                        <span>Exercices</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$workflow == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>workflows/index">
                                        <span>Ordres de travail</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$etatworkflow == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>etatworkflows/index">
                                     <span>Etat d'ordres de travail</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$tracemisejour == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>tracemisejours/indexx">
                                       <span>Historique utilisateur</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>