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
<?php if (@$compta == 'compta') { ?>
         
         <div class="col-md-3"  >
                <div class="panel panel-default">
            <div class="panel-heading aff_suivi">
                <h3 class="panel-title">Comptabilité</h3>
            </div>
            <div class="panel-body">
                <div class="ls-animated-multi-lists">
                <ul>
                    <?php
                    $lien_compta = CakeSession::read('lien_compta');
                    //debug($lien_parametrage);die;
                    $n = 0;
                    if (!empty($lien_compta)) {
                        foreach (@$lien_compta as $k => $liens) {
                            if (@$liens['lien'] == 'declarationtva') {
                                $declarationtva = 1;
                            }
                            if (@$liens['lien'] == 'declarationtvafr') {
                                $declarationtvaavoir = 1;
                            }
                            if (@$liens['lien'] == 'journalvente') {
                                $journalvente = 1;
                            }

                            //****************************
                            if (@$liens['lien'] == 'journalachat') {
                                $journalachat = 1;
                            }
                            if (@$liens['lien'] == 'effetrecevoirtraite') {
                                $effetrecevoirtraite = 1;
                            }
                            if (@$liens['lien'] == 'effetrecevoircheque') {
                                $effetrecevoircheque = 1;
                            }
                            if (@$liens['lien'] == 'effetrecevoirespese') {
                                $effetrecevoirespese = 1;
                            }
                            if (@$liens['lien'] == 'effetpayertraite') {
                                $effetpayertraite = 1;
                            }
                            if (@$liens['lien'] == 'effetpayercheque') {
                                $effetpayercheque = 1;
                            }
                            if (@$liens['lien'] == 'effetpayerespese') {
                                $effetpayerespese = 1;
                            }

                            //****************************
                        }
                    }
                    ?>
                    <?php if (@$declarationtva == 1) { ?>
                        <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatclients/tva">D&eacute;claration Tva Client</a></li>
                    <?php } ?>
                    <?php if (@$declarationtvaavoir == 1) { ?>
                        <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatfournisseurs/tva">D&eacute;claration Tva Fournisseur</a></li>
                    <?php } ?>
                    <?php if (@$journalvente == 1) { ?>
                        <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_vente">Journal vente</a></li>
                    <?php } ?>
                    <?php if (@$journalachat == 1) { ?> 
                        <li class=""> <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_achat"> Journal achat </a> </li>
                    <?php } ?>
                    <?php if (@$effetrecevoirtraite == 1) { ?>
                        <li class=""> <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_recevoir/3"> Journal effet recevoir traite </a> </li>
                    <?php } ?>
                    <?php if (@$effetrecevoircheque == 1) { ?>
                        <li class="">
                            <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_recevoir/2">Journal effet recevoir cheque</a></li>
                    <?php } ?>
                    <?php if (@$effetrecevoirespese == 1) { ?>
                        <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_recevoir/1">Journal effet recevoir espece</a></li>
                    <?php } ?>
                    <?php if (@$effetpayertraite == 1) { ?>
                        <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_payer/3">Journal effet payer traite</a></li>
                    <?php } ?>
                    <?php if (@$effetpayercheque == 1) { ?>
                        <li class=""> <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_payer/2"> Journal effet payer cheque</a> </li>
                    <?php } ?>
                    <?php if (@$effetpayerespese == 1) { ?>
                        <li class=""> <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_payer/1"> Journal effet payer espece </a> </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } ?>
