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
<?php if (@$stock == 'stk') { ?>
        <div class="col-md-3" >
                <div class="panel panel-default">
            <div class="panel-heading aff_suivi">
                <h3 class="panel-title">Stock</h3>
            </div>
            <div class="panel-body">
                <div class="ls-animated-multi-lists">
                        <li>
                            <ul>

                                <?php
                                $lien_stock = CakeSession::read('lien_stock');
                                $n = 0;
                                //debug($menus_vnt);die;
                                if (!empty($lien_stock)) {
                                    foreach ($lien_stock as $k => $liens) {

                                        if (@$liens['lien'] == 'articles') {
                                            $article = 1;
                                        }
                                        if (@$liens['lien'] == 'familles') {
                                            $famille = 1;
                                        }
                                        if (@$liens['lien'] == 'sousfamilles') {
                                            $sousfamille = 1;
                                        }
                                        if (@$liens['lien'] == 'soussousfamilles') {
                                            $soussousfamille = 1;
                                        }
                                        if (@$liens['lien'] == 'tags') {
                                            $tag = 1;
                                        }
                                        if (@$liens['lien'] == 'unites') {
                                            $unite = 1;
                                        }
                                        if (@$liens['lien'] == 'inventaires') {
                                            $inventaire = 1;
                                        }
                                        if (@$liens['lien'] == 'depots') {
                                            $depot = 1;
                                        }

                                        if (@$liens['lien'] == 'stockdepots') {
                                            $stockdepot = 1;
                                        }
                                        if (@$liens['lien'] == 'stockdepotds') {
                                            $stockdepotd = 1;
                                        }
                                        if (@$liens['lien'] == 'transferts') {
                                            $transfert = 1;
                                        }
                                        if (@$liens['lien'] == 'bonreceptionstocks') {
                                            $bonreceptionstock = 1;
                                        }
                                        if (@$liens['lien'] == 'bonsortiestocks') {
                                            $bonsortiestock = 1;
                                        }
                                        if (@$liens['lien'] == 'etatstockmins') {
                                            $etatstockmin = 1;
                                        }
                                        if (@$liens['lien'] == 'etatfuturcommandes') {
                                            $etatfuturcommande = 1;
                                        }
                                        if (@$liens['lien'] == 'fichetechniques') {
                                            $fichetechniques = 1;
                                        }
                                        if (@$liens['lien'] == 'productions') {
                                            $productions = 1;
                                        }
                                        if (@$liens['lien'] == 'Mouvementstocks') {
                                            $Mouvementstocks = 1;
                                        }
                                    }
                                }
                                ?>
                                 <?php if (@$transfert == 1 || @$bonreceptionstock == 1 || @$bonsortiestock == 1) { ?> 
                                <li><a href="#">Mouvement</a>
                                    <ul style="margin-top: 20px; display:none">
                                        <?php if (@$transfert == 1) { ?>
                                            <li class="">
                                                <a class="" href="<?php echo $this->webroot; ?>Transferts/index">
                                                    
                                                    <span>Bon de Transfert</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php if (@$bonreceptionstock == 1) { ?>
                                            <li class="">
                                                <a class="" href="<?php echo $this->webroot; ?>Bonreceptionstocks/index">
                                                    <span>Bon de rec&eacute;ption</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php if (@$bonsortiestock == 1) { ?>
                                            <li class="">
                                                <a class="" href="<?php echo $this->webroot; ?>Bonsortiestocks/index">
                                                       <span>Bon de Sortie</span>
                                                </a>
                                            </li>
                                        <?php } ?>    
                                    </ul>
                                </li>
                                 <?php } ?>
                                <li> <a href="#">Stock ATELIER</a>
                                    <ul style="margin-top: 20px; display:none">
                                        <?php if (@$article == 1) { ?>
                                            <li>
                                                <a href="<?php echo $this->webroot; ?>Etatstockmins/indexx">
                                                         Modification des articles
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php if (@$bonsortiestock == 1) { ?>
                                            <li>
                                                <a href="<?php echo $this->webroot; ?>Bonsortiestocks/index1">
                                                      Bon de Sortie produits consommables
                                                </a>
                                            </li>
                                        <?php } ?>    
                                    </ul>
                                </li>


                                <li>  <a href="#">Production</a>
                                    <ul style="margin-top: 20px; display:none">
                                        <?php if (@$fichetechniques == 1) { ?>
                                            <li>
                                                <a href="<?php echo $this->webroot; ?>Fichetechniques/index">
                                                      Fiche Technique : Nomenclature
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <?php if (@$productions == 1) { ?>
                                            <li>
                                                <a  href="<?php echo $this->webroot; ?>Productions/index">
                                                      Bon de Production
                                                </a>
                                            </li>
                                        <?php } ?>   
                                    </ul>
                                </li>


                                <li>
                                    <a href="#">Articles</a>
                                    <ul style="margin-top: 20px; display:none">
                                        <?php if (@$article == 1) { ?>
                                            <li><a href="<?php echo $this->webroot; ?>Articles/index">Articles</a></li>
                                            <li><a href="<?php echo $this->webroot; ?>Ngparticles/index">NGP Articles</a></li>
                                        <?php } ?>        
                                        <?php if (@$famille == 1) { ?>
                                            <li><a href="<?php echo $this->webroot; ?>Familles/index">Familles</a></li>
                                        <?php } ?>
                                        <?php if (@$sousfamille == 1) { ?>
                                            <li ><a href="<?php echo $this->webroot; ?>Sousfamilles/index">Sous familles </a> </li>
                                        <?php } ?>
                                        <?php if (@$soussousfamille == 1) { ?>
                                            <li><a  href="<?php echo $this->webroot; ?>Soussousfamilles/index">Sous sous familles</a></li>
                                        <?php } ?>
                                        <?php if (@$unite == 1) { ?>
                                            <li><a href="<?php echo $this->webroot; ?>Unites/index">Unites</a></li>
                                        <?php } ?>
                                        <?php if (@$tag == 1) { ?>
                                            <li><a  href="<?php echo $this->webroot; ?>Tags/index">Tags  </a>  </li>
                                        <?php } ?>        
                                    </ul>
                                </li> 
                                <li>
                                    <a href="#">Inventaire</a>
                                    <ul style="margin-top: 20px; display:none">
                                        <?php if (@$inventaire == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Inventaires/index">Inventaires</a></li>
                                        <?php } ?>
                                        <?php if (@$inventaire == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Inventaires/indexpararticle">Inventaire/Article</a></li>
                                        <?php } ?>
                                        <?php if (@$inventaire == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Inventaires/indexspecial">Inventaire tournant</a></li>
                                        <?php } ?>
                                        <?php if (@$inventaire == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Copiestockdepots/index">Copie de stock</a></li>
                                        <?php } ?>
                                        <?php if (@$inventaire == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Bonecarts/index">Bon d'&eacute;cart</a></li>
                                            <?php if (CakeSession::read('imp_val_bonecart') == 1) { ?>
                                                <li><a class="" href="<?php echo $this->webroot; ?>Bonecarts/indexx">Bon d'&eacute;cart Globale</a></li>
                                            <?php }  } ?>
                                    </ul>
                                </li>
                                <li><a href="#">Etat de stock</a>
                                    <ul style="margin-top: 20px; display:none">
                                       <?php if (@$stockdepot == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Stockdepots/index">Etat de stock</a></li>
                                        <?php } ?>
                                        <?php if (@$stockdepotd == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Stockdepots/indexpardepot">Etat de stock d&eacute;taill&eacute;</a></li>
                                        <?php } ?>
                                        <?php if (@$stockdepot == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>Stockdepots/etattest">Etat Comparaison Stock&Historique</a></li>
                                        <?php } ?>        
                                        <?php if (@$etatstockmin == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>etatstockmins/index">Etat de stock Min</a></li>
                                        <?php } ?>
                                        <?php if (@$etatfuturcommande == 1) { ?>
                                            <li><a class="" href="<?php echo $this->webroot; ?>etatfuturcommandes/index">Etat Futur Stock</a></li>
                                        <?php } ?>    
                                    </ul>
                                </li>  
                                    <?php if (@$Mouvementstocks == 1) { ?>
                                    <li><a class="" href="<?php echo $this->webroot; ?>Stockdepots/etatmouvementstock">Etat Mouvement Stock par Piece</a></li>
                                <?php } ?>
                                <?php if (@$Mouvementstocks == 1) { ?>
                                    <li><a class="" href="<?php echo $this->webroot; ?>Stockdepots/etatmouvementstockarticle">Etat Mouvement Stock par Article</a></li>
                                <?php } ?>
                                <?php if (@$depot == 1) { ?>
                                    <li> <a class="" href="<?php echo $this->webroot; ?>Depots/index">Depots</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>