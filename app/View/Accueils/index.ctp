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


<div class="col-md-12">
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
    </div>
<div class="col-md-12">
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
    <div class="col-md-3"  > 
         
    </div>
</div>





