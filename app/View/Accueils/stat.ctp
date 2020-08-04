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
<?php if (@$stat == 'stat') { ?>
        <div class="col-md-3"  >
            <div class="panel panel-default">
                <div class="panel-heading aff_suivi">
                    <h3 class="panel-title">Statistiques</h3>
                </div>
                <div class="panel-body">
                    <div class="ls-animated-multi-lists">
                        
                            <ul>
                                <?php
                                $lien_stat = CakeSession::read('lien_stat');
                                //debug($lien_parametrage);die;
                                $n = 0;
                                if (!empty($lien_stat)) {
                                    foreach (@$lien_stat as $k => $liens) {
                                        if (@$liens['lien'] == 'etatclientarticles') {
                                            $etatclientarticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatclients') {
                                            $etatclient = 1;
                                        }
                                        if (@$liens['lien'] == 'etatarticles') {
                                            $etatarticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatpointdeventes') {
                                            $etatpointdevente = 1;
                                        }
                                        if (@$liens['lien'] == 'historiquearticles') {
                                            $historiquearticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatcaarticles') {
                                            $etatcaarticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatcaclientarticles') {
                                            $etatcaclientarticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatcapersonnels') {
                                            $etatcapersonnel = 1;
                                        }
                                        if (@$liens['lien'] == 'benefices') {
                                            $benefices = 1;
                                        }
                                        if (@$liens['lien'] == 'etatarticle2s') {
                                            $etatarticle2 = 1;
                                        }

                                        if (@$liens['lien'] == 'etatmargearticle') {
                                            $etatmargearticle = 1;
                                        }
                                        if (@$liens['lien'] == 'etatmargeclient') {
                                            $etatmargeclient = 1;
                                        }
                                    }
                                }
                                ?>
                                <?php if (@$etatclient == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatclients/index">CA Par Client</a></li>
                                <?php } ?>
                                <?php if (@$etatarticle2 == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatarticles/indexx">CA Par Article</a></li>
                                <?php } ?>
                                <?php if (@$etatpointdevente == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/index">CA Par Point De Vente</a></li>
                                <?php } ?>
                                <?php if (@$etatclientarticle == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatclientarticles/index">CA Par Client/Article</a></li>
                                <?php } ?>
                                <li><a href="#">CA par exercice</a>
                                    <ul style="margin-top: 20px; display:none">
                                    <?php if (@$etatcaarticle == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatcaarticles/index">CA Par Article/Exercice</a></li>
                                    <?php } ?>
                                    <?php if (@$etatcaclientarticle == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatcaclientarticles/index">CA Par Client/Exercice</a></li>
                                    <?php } ?>
                                    </ul>
                                </li>    
                                <li><a href="#">CA par Commercial </a>
                                    <ul style="margin-top: 20px; display:none" >
                                         <?php if (@$etatcapersonnel == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/indexpersonnel">CA Global Par Commercial</a></li>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatcapersonnels/index">CA D&eacute;taill&eacute; Par Commercial</a></li>
                                         <?php } ?>
                                    </ul>
                                </li> 
                                <li><a href="#">B&eacute;n&eacute;fices</a>
                                    <ul style="margin-top: 20px; display:none">
                                    <?php if (@$etatmargearticle == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatarticles/etatmargearticle">B&eacute;n&eacute;fices par article</a></li>
                                    <?php } ?>
                                    <?php if (@$etatmargeclient == 1) { ?>
                                            <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatarticles/etatmargeclient">B&eacute;n&eacute;fices par client</a></li>
                                    <?php } ?>
                                    </ul>
                                </li> 
                                <?php if (1 == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatclients/caparfournisseur">CA Par fournisseur</a></li>
                                <?php } ?>
                                <?php if (1 == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatarticles/caarticlefr">CA Par Article frs</a></li>
                                <?php } ?>
                                <?php if (1 == 1) { ?>
                                    <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatclientarticles/cafrsarticle">CA Par frs/Article</a></li>
                                <?php } ?>
                                <li><a href="#">CA par exercice</a>
                                    <ul style="margin-top: 20px; display:none">
                                <?php if (1 == 1) { ?>
                                   <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatcaarticles/caarticleexercicefrs">CA Par Article/Exercice</a></li>
                                <?php } ?>
                                <?php if (1 == 1) { ?>
                                 <li class=""><a class="" href="<?php echo $this->webroot; ?>Etatcaclientarticles/cafrsexercice">CA Par frs/Exercice</a></li>
                                <?php } ?>
                                    </ul>
                                </li>
                            </ul>            
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>