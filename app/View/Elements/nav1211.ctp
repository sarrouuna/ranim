<audio id="chatAudio">
    <source src="<?php echo $this->webroot; ?>sounds/notify.ogg" type="audio/ogg">
    <source src="<?php echo $this->webroot; ?>sounds/notify.mp3" type="audio/mpeg">
    <source src="<?php echo $this->webroot; ?>sounds/notify.wav" type="audio/wav">
</audio>
<!--  <script>
 $(document).ready(function() 
{
$(document).click(function(){
$(".dropdown-menu").hide('slow'); 
});

$(".dropdown-menu").click(function(e){
  e.stopPropagation(); 
});
   notification(); 
   login();
})

function login(){
var prevCuisNotif=null;	
if(prevCuisNotif) {
clearInterval(prevCuisNotif);
}
prevCuisNotif = setInterval(function () {
    

        $.ajax({
            type: "POST",
            data: {
               
               
            },
            url: wr+"Utilisateurs/testlogin/",
            dataType : "json",
             global : false
        }).done(function(data){
        console.log(data); 
        testmsglogin= $('#testmsglogin').val(); 
        if((data.user ==0)&&(testmsglogin==0)){
        $('#testmsglogin').val(1);    
        bootbox.confirm("voulez vous connecter une autre fois !!!?", function (result) {
        if (result) {
            var html = 'Ok';
            bootbox.hideAll();
            //window.open("#reModal_refuser");
            window.open("http://127.0.0.1:8080/test_thermeco/Utilisateurs/login/1","nom_popup","menubar=no, status=no, scrollbars=no, menubar=no, width=800, height=1000");
            return false;
            //var html = 'Cancel';
           
        } else {
            var html = 'Cancel';
            //window.location.href=wr+"Utilisateurs/login";
        }
       
        })}})
          
}, 5000);
}





function notification(){
          
          
personnel= $('#user').val(); 

var prevCuisNotif=null;	
if(prevCuisNotif) {
            clearInterval(prevCuisNotif);
        }
prevCuisNotif = setInterval(function () {
    var abc="";
     var abc1="";
    var nb="0";
$.ajax({
            type: "POST",
            data: {
                personnel: personnel
               
            },
            url: wr+"Deviprospects/notifdevis/",
            dataType : "json",
             global : false
        }).done(function(data){
             console.log(data); 
          //alert(data.nbdevis); 
               if((Number(data.nbdevis) > 0) && (Number(data.nbrworkflows) >0)){
                   
                ion.sound.play("bell_ring"); 
                $('#chatAudio')[0].play();
                nb=data.nbdevis;
                
                
                
            if(data.listedevis.length!=0){
            $.each(data.listedevis, function(i,item) {
               
                // console.log(item.id);
                abc1+="<li><a href='<?php echo $this->webroot; ?>Deviprospects/edit/"+item.deviprospects.id+"?t=1&b="+data.banque+"'><div class='email-top-content'><strong>Suggestion Commande num�ro: "+item.deviprospects.numero+" par fournisseur "+data.fournisseurs[item.deviprospects.fournisseur_id]+" dans la date "+item.deviprospects.date+" leur total est : "+item.deviprospects.totalttc+"</strong></div></a></li>";
            });
            }
            $('.notification').html(abc);
            }
           //zeinab 
            $.ajax({
            type: "POST",
            data: {
                personnel: personnel
               
            },
            url: wr+"Bonsortiestocks/notifbsstock/",
            dataType : "json",
             global : false
        }).done(function(data1){
             console.log(data1);
              nb=Number(nb) + Number(data1.nb);
         if(data1.listebs.length!=0){
            $.each(data1.listebs, function(i,item){ 
                // console.log(item.id);
                abc1+="<li style='background-color:#ffeeee'><a href='<?php echo $this->webroot; ?>Bonsortiestocks/edit/"+item.bonsortiestocks.id+"/1'><div class='email-top-content'><strong>Bon Sortie num�ro: "+item.bonsortiestocks.numero+" dans la date "+item.bonsortiestocks.date+"</strong></div></a></li>";
            });
           
           }
            if(data1.listebsvalid.length!=0){
             $.each(data1.listebsvalid, function(i,item){ 
                // console.log(item.id);
                     abc1+="<li style='background-color:#ffeeee;' id='"+item.bonsortiestocks.id+"'> <table width='100%' ><tr><td><a href='' ><div class='email-top-content'><strong><font color='rgba(85, 179, 87, 0.19)'>Bon Sortie num�ro: "+item.bonsortiestocks.numero+" est valid�e</font></strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i ><IMG src='<?php echo $this->webroot; ?>assets/images/supp.png' alt='Supp' width='10px' height='10px' onclick='Suppbs("+item.bonsortiestocks.id+")'></i></span></td></tr></table></li>";
           });
           }
            if(data1.listebsrefus.length!=0){
             $.each(data1.listebsrefus, function(i,item){ 
                // console.log(item.id);
                abc1+="<li style='background-color:#ffeeee;' id='"+item.bonsortiestocks.id+"'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Bonsortiestocks/edit/"+item.bonsortiestocks.id+"/2' ><div class='email-top-content'><strong><font color='red'>Bon Sortie num�ro: "+item.bonsortiestocks.numero+" non valid�e</font></strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i ><img src='<?php echo $this->webroot; ?>assets/images/supp.png' alt='Supp'  width='10px' height='10px'  onclick='Suppbs("+item.bonsortiestocks.id+")'></i></span></td></tr></table></li>";
            });
            }
             $('.notification').html(abc1);
            
         
          $('#spannotif').html(nb);		
        
         
           
         });		
 
       });	
},  2500);

    }
    
    
    
//zeinab
function Suppbs(id){
    $(this).parent().parent().parent().hide();
  $.ajax({
            type: "POST",
            data: {
                bonsorti: id
               
            },
            url: wr+"Bonsortiestocks/notifBS/",
            dataType : "json",
             global : false
        }).done(function(){
        })
}
 </script>  -->



<?php
$defaultmenu = CakeSession::read('defaultmenu');
$user = CakeSession::read('users');
echo '<input type="hidden" value="' . $user . '" id="user"/> ';
echo '<input type="hidden" value="0" id="testmsglogin"/> ';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Menu HTML / Javascript : Aper�u</title>
    <!-- nettuts -->
    <!-- traduit et adapt� par outils-web.com -->
    <!-- chargement des feuilles de style -->
</head>
<body>
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
<ul id="nav">
    <?php if (@$parametrage == 'par') { ?>
        <li class="current"><a href="#">Paramtrage</a><!-- n1 -->
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
                            <i><img src="<?php echo $this->webroot; ?>assets/images/societe.png" alt=""
                                    width="15px"/></i></i> <span>Societes</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$fonction == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Fonctions/index">
                            <i class="fa fa-edit"></i></i> <span>Fonctions</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$personnel == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Personnels/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/client.png" alt=""
                                    width="15px"/></i> <span>Personnels</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$utilisateur == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Utilisateurs/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/client.png" alt=""
                                    width="15px"/></i> <span>Utilisateurs</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$pointdevente == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Pointdeventes/index">
                            <i class="fa fa-edit"></i></i> <span>Points De Ventes</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$exercice == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Exercices/index">
                            <i class="fa fa-edit"></i></i> <span>Exercices</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$workflow == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>workflows/index">
                            <i class="fa fa-edit"></i> <span>Ordres de travail</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatworkflow == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>etatworkflows/index">
                            <i class="fa fa-edit"></i> <span>Etat d'ordres de travail</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$tracemisejour == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>tracemisejours/indexx">
                            <i class="fa fa-edit"></i> <span>Historique utilisateur</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if (@$stock == 'stk') { ?>
        <li class="current"><a href="#">Stock</a>
            <ul>
                <?php
                $lien_stock = CakeSession::read('lien_stock');
                $n = 0;
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
                        if (@$liens['lien'] == 'stockatelier') {
                            $stockatelier = 1;
                        }
                    }
                }
                ?>
                <li>
                    <a href="#">Mouvement<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                    <?php if (@$transfert == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Transferts/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Bon de Transfert</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$bonreceptionstock == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonreceptionstocks/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Bon de rec&eacute;ption</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$bonsortiestock == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonsortiestocks/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Bon de Sortie</span>
                        </a>
                    </li>
                <?php } ?>    
                </ul></li>
                
                <li>
                    <a href="#">Stock ATELIER<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                    <?php if (@$article == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatstockmins/indexx">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Modification des articles</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$bonsortiestock == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonsortiestocks/index1">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Bon de Sortie produits consommables</span>
                        </a>
                    </li>
                <?php } ?>    
                </ul>
                </li>
                
                <li>
                    <a href="#">Production<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                     <?php if (@$fichetechniques == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Fichetechniques/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Fiche Technique : Nomenclature</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$productions == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Productions/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Bon de Production</span>
                        </a>
                    </li>
                <?php } ?>   
                    </ul>
                </li>
                
                
                <li>
                    <a href="#">Articles<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                <?php if (@$article == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Articles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/article.png" alt=""
                                    width="15px"/></i> <span>Articles</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$famille == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Familles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/famille.png" alt=""
                                    width="15px"/></i> <span>Familles</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$sousfamille == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Sousfamilles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/famille.png" alt=""
                                    width="15px"/></i> <span>Sous familles</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$soussousfamille == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Soussousfamilles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/famille.png" alt=""
                                    width="15px"/></i> <span>Sous sous familles</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$unite == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Unites/index">
                            <i class="fa fa-edit"></i> <span>Unites</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$tag == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Tags/index">
                            <i class="fa fa-edit"></i> <span>Tags</span>
                        </a>
                    </li>
                <?php } ?>        
                 </ul>
                </li> 
                
                
                
                <li>
                    <a href="#">Inventaire<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                        <?php if (@$inventaire == 1) { ?>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Inventaires/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/inventaire.png" alt=""
                                            width="15px"/></i> <span>Inventaires</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (@$inventaire == 1) { ?>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Inventaires/indexpararticle">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/inventaire.png" alt=""
                                            width="15px"/></i> <span>Inventaire/Article </span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (@$inventaire == 1) { ?>
                            <!--<li class="">
                                <a class="" href="<?php /*echo $this->webroot; */?>Inventaires/indexparfamille">
                                    <i><img src="<?php /*echo $this->webroot; */?>assets/images/inventaire.png" alt=""
                                            width="15px"/></i> <span>Inventaire/Famille</span>
                                </a>
                            </li>-->
                        <?php } ?>
                        <?php if (@$inventaire == 1) { ?>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Copiestockdepots/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/inventaire.png" alt=""
                                            width="15px"/></i> <span>Copie de stock</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (@$inventaire == 1) { ?>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Bonecarts/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/inventaire.png" alt=""
                                            width="15px"/></i> <span>Bon d'&eacute;cart</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                
                
                <li>
                    <a href="#">Etat de stock<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                    <?php if (@$stockdepot == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Stockdepots/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Etat de stock</span>
                        </a>
                    </li>
                    
                <?php } ?>
                <?php if (@$stockdepotd == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Stockdepots/indexpardepot">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Etat de stock d&eacute;taill&eacute;</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$stockdepot == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Stockdepots/etattest">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Etat Comparaison Stock&Historique</span>
                        </a>
                    </li>
                <?php } ?>        
                <?php if (@$etatstockmin == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>etatstockmins/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Etat de stock Min</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatfuturcommande == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>etatfuturcommandes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Etat Futur Stock</span>
                        </a>
                    </li>
                <?php } ?>    
                 </ul>
                </li>        
                
                <?php if (@$depot == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Depots/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/depoticon.png" alt="" width="15px"/></i>
                            <span>Depots</span>
                        </a>
                    </li>
                <?php } ?>
                
            </ul>
        </li>
    <?php } ?>
    <?php if (@$achat == 'ach') { ?>
        <li class="current"><a href="#">Achat</a>
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
                    <a href="#">Fournisseurs<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                <?php if (@$famillefournisseur == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Famillefournisseurs/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/famille.png" alt=""
                                    width="15px"/></i> <span>Famille fournisseurs</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$fournisseur == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Fournisseurs/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/client.png" alt=""
                                    width="15px"/></i> <span>Fournisseurs</span>
                        </a>
                    </li>
                <?php } ?>
                </ul>
                </li>
                <li>
                    <a href="#">Commandes<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                <?php if (@$deviprospect == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Deviprospects/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Suggestion Commande</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$commande == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Commandes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Commandes</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$importation == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Importations/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Importation</span>
                        </a>
                    </li>
                <?php } ?>        
                </ul>
                </li>
                <li>
                    <a href="#">Facturation<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                <?php if (@$bonreception == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonreceptions/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Bon de Livraison</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$facture == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Factures/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Factures</span>
                        </a>
                    </li>
               <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonreceptions/transfertbl_fact">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Transfert Bon de Livraison --> Facture</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$factureavoirfrs == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Factureavoirfrs/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Factures Avoir</span>
                        </a>
                    </li>
                <?php } ?>
                </ul>
                </li>        
                <li>
                    <a href="#">R&egrave;glements<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                <?php if (@$reglement == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Reglements/index">
                            <i class="fa fa-edit"></i> <span>R&egrave;glements </span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$engagementfournisseur == 1) {  ?>
                <li class="">
                    <a class="" href="<?php echo $this->webroot; ?>traitecredits/index">
                        <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                        <span>Engagement Credit</span>
                    </a>
                </li>
                <?php } ?>
                <?php if (@$etatretenues == 1) {  ?>
                <li class="">
                    <a class="" href="<?php echo $this->webroot; ?>etatretenues/index">
                        <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                        <span>Etat Retenues</span>
                    </a>
                </li>
                <?php }  ?>
                <?php if (@$etatvariations == 1) {  ?>
                <li class="">
                    <a class="" href="<?php echo $this->webroot; ?>variationtauxdechanges/index">
                        <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                        <span>Etat Variation Taux De Change</span>
                    </a>
                </li>
                <?php }  ?>
                </ul>
                </li>        
                <?php if (@$relevefournisseur == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Relevefournisseurs/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Etat de solde fournisseur</span>
                        </a>
                    </li>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Relevefournisseurs/indexetranger">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Relevé des Fournisseurs Etrangers</span>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="#">Parametrage<img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>
                    <ul>
                <?php if (@$namepiecejointe == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>namepiecejointes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Piece jointe</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$namesituation == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>namesituations/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Situation</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (@$etatpiecereglement == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>etatpiecereglements/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Etat Piece Reglement</span>
                        </a>
                    </li>
                <?php } ?>
                </ul>
                </li>        
            </ul>
        </li>
    <?php } ?>
    <?php if (@$vente == 'vnt') { ?>
        <li class="current"><a href="#">Vente</a>
            <ul>
                <?php
                $lien_vente = CakeSession::read('lien_vente');
                $n = 0;
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
                        //**zeinab**
                        if (@$liens['lien'] == 'interventions') { //debug($liens);die;
                             $intervention = 1;
                        }
                        //*******
                    }
                }
                ?>

                <?php if ((@$client == 1) || (@$familleclient == 1) || (@$sousfamilleclient == 1)) { ?>
                    <li>
                        <a href="#">Info Client <img src="<?php echo $this->webroot; ?>assets/images/multi.png"
                                                     border="0" width="15" height="15" align="absmiddle"></a>
                        <ul>
                            <?php if (@$client == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Clients/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/client.png" alt=""
                                                width="15px"/></i> <span>Client</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Regions/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/icons/gmap-2.png" alt=""
                                                width="15px"/></i> <span>Région</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Zones/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/icons/gmap-2.png" alt=""
                                                width="15px"/></i> <span>Ville</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$familleclient == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Familleclients/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/famille.png" alt=""
                                                width="15px"/></i> <span> Famille Client</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$sousfamilleclient == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Sousfamilleclients/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/famille.png" alt=""
                                                width="15px"/></i> <span>Sous Famille Client</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$pay == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Pays/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/icons/gmap-2.png" alt=""
                                                width="15px"/></i> <span>Pays</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (@$zone == 1) { ?>
                                <li class="">
                                    <a class="" href="<?php echo $this->webroot; ?>Zones/index">
                                        <i><img src="<?php echo $this->webroot; ?>assets/images/icons/gmap-2.png" alt=""
                                                width="15px"/></i> <span>Zone</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (@$devi == 1) { ?>

                    <li>
                        <a href="#">Devis <img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                                               width="15" height="15" align="absmiddle"></a>

                        <ul>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Devis/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>Devis </span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Devis/indexx">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>Factures Proforma</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Affaires/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>Affaire</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Affaires/etataffaire">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>statistique</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Suivicommercials/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>Suivi Commercial</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Affaires/indexvisite">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>Visite</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="" href="<?php echo $this->webroot; ?>Regions/index">
                                    <i><img src="<?php echo $this->webroot; ?>assets/images/devis.png" alt=""
                                            width="15px"/></i> <span>R&eacute;gions</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                <?php } ?>
                <?php if (@$commandeclient == 1) { ?>
                    <li class="">
                        <a href="#">Commande <img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                        width="15" height="15" align="absmiddle"></a>
                    <ul>  
                        <?php if (@$commandeclient == 1) { ?>
                        <li class="">
                            <a class="" href="<?php echo $this->webroot; ?>Commandeclients/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Commande</span>
                            </a>
                        </li>
                        <?php } ?>
                         <?php if (@$etatsoldecommandeclient == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatsoldecommandeclients/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Solde Commandes Clients</span>
                        </a>
                    </li>
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatsoldecommandeclients/liquidation">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Liquidation Commandes Clients</span>
                        </a>
                    </li>
                <?php } ?>
                    </ul>    
                    </li>
                <?php } ?>
                <li class="">
                        <a href="#">Facturation <img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                        width="15" height="15" align="absmiddle"></a>
                <ul>    
                <?php if (@$bonlivraison == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonlivraisons/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Bon de livraison</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$factureclient == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Factureclients/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Facture</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bonlivraisons/indexx">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Facturation des BL</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (@$factureavoir == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Factureavoirs/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/facture.jpg" alt=""
                                    width="15px"/></i> <span>Facture Avoir</span>
                        </a>
                    </li>
                <?php } ?>
                </ul>    
                </li>
                
                
                <li class="">
                        <a href="#">R&egrave;glements <img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                        width="15" height="15" align="absmiddle"></a>
                <ul>    
                <?php if (@$reglementclient == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Reglementclients/index">
                            <i class="fa fa-edit"></i> <span>R&egrave;glements </span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Reglementclients/indexrl">
                            <i class="fa fa-edit"></i> <span>R&egrave;glements libres</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Reglementclients/etat_reg">
                            <i class="fa fa-edit"></i> <span>Etat R&egrave;glements</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Reglementclients/indexpc">
                            <i class="fa fa-edit"></i> <span>Caisse Personnel</span>
                        </a>
                    </li>
                    
                    
                <?php } ?>
                </ul>    
                </li> 
                <li class="">
                        <a href="#">Relev&eacute; client <img src="<?php echo $this->webroot; ?>assets/images/multi.png" border="0"
                        width="15" height="15" align="absmiddle"></a>
                <ul>   
                <?php if (@$releve == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Releves/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Relev&eacute; client</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$recouvrements == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Recouvrements/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Etat Recouvrement client</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Releves/indextotale">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i>
                            <span>Relev&eacute; client globale</span>
                        </a>
                    </li>
                
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bordereaus/indeximp">
                            <i class="fa fa-edit"></i> <span>Etat des Impay&eacute;s</span>
                        </a>
                </li>
                <li class="">
                <a class="" href="<?php echo $this->webroot; ?>Releves/prevision">
                    <i ><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i> <span>Prévision Recouvrement</span>
                </a>
                </li>
                <li class="">
                <a class="" href="<?php echo $this->webroot; ?>Releves/indexprevision">
                    <i ><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i> <span>Liste Prévision</span>
                </a>
                </li>    
                <li class="">
                <a class="" href="<?php echo $this->webroot; ?>Releves/index_reg_n_ech">
                    <i ><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i> <span>Ecours Clients</span>
                </a>
                </li>    
                <?php } ?>
               </ul>    
                </li>
                <?php if (@$historiquearticle == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etathistoriquearticles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Historique Article</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatlignevente == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatligneventes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Vente Journalier</span>
                        </a>
                    </li>
                <?php } ?>
                 <?php 
                 //***zeinab***
                 if (@$intervention == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Interventions/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Fiche d'intervention</span>
                        </a>
                    </li>
                <?php } 
                //************
                ?>
            </ul>
        </li>
    <?php } ?>
    <?php if (@$finance == 'fnc') { ?>
        <li class="current"><a href="#">Finance</a>
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
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Engagementcomptes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/compte.png" alt=""
                                    width="15px"/></i> <span>Engagement Compte</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$engagementfournisseurs == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexpf">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Engagement Fournisseur</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$engagementclients == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexpc">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Engagement Client</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$engagementfournisseurs == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexcredit">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Engagement Zitouna</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (@$bordereau == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bordereaus/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Bordereau</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$versement == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Versements/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/versement.png" alt="" width="15px"/></i>
                            <span>Versement</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (@$retraits == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Bordereaus/indexr">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Retrait</span>
                        </a>
                    </li>
                   <!-- <li class="">
                        <a class="" href="<?php /*echo $this->webroot; */?>Bordereaus/tabledebord">
                            <i><img src="<?php /*echo $this->webroot; */?>assets/images/bon.png" alt="" width="15px"/></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>-->
                <?php } ?>
                <?php if (@$compte == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Comptes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/compte.png" alt=""
                                    width="15px"/></i> <span>Compte</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$carnetcheque == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Carnetcheques/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/cheques.jpg" alt=""
                                    width="15px"/></i> <span>Souche chequier</span>
                        </a>
                    </li>
                <?php } ?>
                <?php //if(@$alimentation==1){?>
                <!--<li class="">
                                            <a class="" href="<?php echo $this->webroot; ?>Alimentations/index">
                                                <i ><img src="<?php echo $this->webroot; ?>assets/images/cheques.jpg" alt="" width="15px"/></i> <span>Alimentation caisse</span>
                                            </a>
                                        </li>-->
                <?php //}  ?>
                <?php //if(@$sortiecaissee==1){?>
                <!--<li class="">
                                            <a class="" href="<?php echo $this->webroot; ?>Sortiecaissees/index">
                                                <i><img src="<?php echo $this->webroot; ?>assets/images/sortiecaisse.jpg" alt="" width="15px"/></i> <span>Sortie caisse</span>
                                            </a>
                                        </li>-->
                <?php //}  ?>
                <?php //if(@$interne==1){?>
                <!--<li class="">
                                            <a class="" href="<?php echo $this->webroot; ?>Caissees/interne">
                                                <i><img src="<?php echo $this->webroot; ?>assets/images/caisse.png" alt="" width="15px"/></i> <span>Caisse interne</span>
                                            </a>
                                        </li>-->
                <?php //}  ?>


                <?php //if(@$caisse==1){?>
                <!--<li class="">
                                            <a class="" href="<?php echo $this->webroot; ?>Caissees/index">
                                                <i><img src="<?php echo $this->webroot; ?>assets/images/caisse.png" alt="" width="15px"/></i> <span>Caisse</span>
                                            </a>
                                        </li>-->
                <?php //}  ?>
                <?php if (@$retenue == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Caissees/retenue">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/retenue.png" alt=""
                                    width="15px"/></i> <span>Retenue clients</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$retenuefournisseur == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Caissees/retenuefournisseur">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/retenue.png" alt=""
                                    width="15px"/></i> <span>Retenue fournisseurs</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatvente == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Caissees/etatvente">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/etatvente.png" alt="" width="15px"/></i>
                            <span>Etat des Ventes </span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatachat == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Caissees/etatachat">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/etatvente.png" alt="" width="15px"/></i>
                            <span>Etat des Achats </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if (@$stat == 'stat') { ?>
        <li class="current"><a href="#">Statistique</a>
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
                        //****ZEINAB **
                        
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
                    
                
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatclients/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Client</span>
                        </a>
                    </li>
               
                
                <?php } ?>
                <?php if (@$etatarticle2 == 1) { ?>
                    
                
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatarticles/indexx">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Article 1</span>
                        </a>
                    </li>
               
                
                <?php } ?>
                <?php if (@$etatarticle == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatarticles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Article 2</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatpointdevente == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Point De Vente</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatclientarticle == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatclientarticles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Client/Article</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatcaarticle == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatcaarticles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Article/Exercice</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatcaclientarticle == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatcaclientarticles/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Par Client/Exercice</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$etatcapersonnel == 1) { ?>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/indexpersonnel">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA Global Par Commercial</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatcapersonnels/index">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>CA D&eacute;taill&eacute; Par Commercial</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(@$benefices==1){?>

                <li class="">
                    <a class="" href="<?php echo $this->webroot; ?>Etatbenefices/index">
                        <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt=""
                                width="15px"/></i></i> <span>Etat B&eacute;n&eacute;fices</span>
                    </a>
                </li>
                <?php } ?>
                 <?php 
                 //***ZEINAB **
                 if(@$etatmargearticle==1){?>
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatarticles/etatmargearticle">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Marge de vente par article</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if(@$etatmargeclient==1){?>
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatarticles/etatmargeclient">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Etat marge client</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
    <?php if (@$compta == 'compta') { ?>
        <li class="current"><a href="#">Comptabilit&eacute;</a>
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
                        if (@$liens['lien'] == 'declarationtvaavoir') {
                            $declarationtvaavoir = 1;
                        }
                        if (@$liens['lien'] == 'journalvente') {
                            $journalvente = 1;
                        }
                        
                        //*** ZEINAB **
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

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatclients/tva">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Etat TVA des ventes</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$declarationtvaavoir == 5) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatclients/tvaavoir">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>D&eacute;claration Tva Avoir</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$journalvente == 1) { ?>

                    <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_vente">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal vente</span>
                        </a>
                    </li>
                <?php } ?>
                
                 <?php
                 //***ZEINAB ***
                 if (@$journalachat == 1) { ?> 
                   <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_achat">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal achat</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$effetrecevoirtraite == 1) { ?>
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_recevoir/3">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal effet recevoir traite</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$effetrecevoircheque == 1) { ?>
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_recevoir/2">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal effet recevoir cheque</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$effetrecevoirespese == 1) { ?>
                 <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_recevoir/1">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal effet recevoir espese</span>
                        </a>
                    </li>
                
                
                <?php } ?>
                <?php if (@$effetpayertraite == 1) { ?>
                
                 <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_payer/3">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal effet payer traite</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$effetpayercheque == 1) { ?>
                <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_payer/2">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal effet payer cheque</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (@$effetpayerespese == 1) { ?>
                 <li class="">
                        <a class="" href="<?php echo $this->webroot; ?>Etatpointdeventes/journale_effet_payer/1">
                            <i><img src="<?php echo $this->webroot; ?>assets/images/commande.png" alt="" width="15px"/></i></i>
                            <span>Journal effet payer espese</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>

    <?php
    $p = CakeSession::read('users');
    //debug($p);die;
    $obj = ClassRegistry::init('Utilisateur');
    $test = $obj->find('first', array('conditions' => array('Utilisateur.id' => $p), 'recursive' => 2));
    $nom = $test['Utilisateur']['login'];
    $pvi = $test['Utilisateur']['pointdevente_id'];
    if ($pvi == 0) {
        $pvn = "Admin";
    } else {
        $pvn = $test['Pointdevente']['name'];
    }
    ?>
    <li style="float: right;">
        <a href="<?php echo $this->webroot; ?>Utilisateurs/login">
            <i class="fa fa-power-off"></i>
        </a>
    </li>
    <li style="float: right;">

        <font size="4"><strong>
                <center>BienVenue</center>
                <br><?php echo $nom . ' (' . $pvn . ')'; ?></strong></font>

    </li>
    <li style="float: right;">
        <!--All task drop down start-->
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
            <span class="fa fa-tasks"></span>
            <span class="badge badge-lightBlue"></span>
        </a>


        <?php
        $stock = CakeSession::read('stock');
        $parametrage = CakeSession::read('parametrage');
        $achat = CakeSession::read('achat');
        $vente = CakeSession::read('vente');
        $finance = CakeSession::read('finance');
        $stat = CakeSession::read('stat');
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
        ?>
        <ul class="goal-item">
            <?php if (@$parametrage == 'par') { ?>
                <li><a class="aff_divparametrage"><i><span title="Parametrage">
                                                        <div class="goal-content">
                                                            <img src="<?php echo $this->webroot; ?>assets/images/ico/fab.ico"
                                                                 alt="" width="20px"/>

                                                            Parametrage
                                                        </div>                
                                                    </span></i></a></li>
            <?php } ?>
            <?php if (@$stock == 'stk') { ?>
                <li><a class="aff_divstock"><i><span title="Stock">
                                                        <div class="goal-content">    
                                                            <img src="<?php echo $this->webroot; ?>assets/images/depot.png"
                                                                 alt="" width="20px"/>

                                                            Stock
                                                        </div>                
                                                    </span></i></a></li>
            <?php } ?>
            <?php if (@$achat == 'ach') { ?>
                <li><a class="aff_divachat"><i><span title="Achat">
                                                        <div class="goal-content">
                                                            <img src="<?php echo $this->webroot; ?>assets/images/achat.png"
                                                                 alt="" width="20px"/>
                                                            Achat
                                                        </div>
                                                    </span></i></a></li>
            <?php } ?>
            <?php if (@$vente == 'vnt') { ?>
                <li><a class="aff_divvente"><i><span title="Vente">
                                                        <div class="goal-content">
                                                            <img src="<?php echo $this->webroot; ?>assets/images/vente.png"
                                                                 alt="" width="20px"/>
                                                            Vente
                                                        </div>
                                                    </span></i></a></li>
            <?php } ?>
            <?php if (@$finance == 'fnc') { ?>
                <li><a class="aff_divfinance"><i><span title="Finance">
                                                        <div class="goal-content">
                                                            <img src="<?php echo $this->webroot; ?>assets/images/finance.png"
                                                                 alt="" width="20px"/>
                                                            Finance
                                                        </div>
                                                    </span></i></a></li>
            <?php } ?>
            <?php if (@$stat == 'stat') { ?>
                <li><a class="aff_divstat"><i><span title="Statistique">
                                                        <div class="goal-content">
                                                            <img src="<?php echo $this->webroot; ?>assets/images/telechargement.png"
                                                                 alt="" width="20px"/>
                                                            Statistique
                                                        </div>
                                                    </span></i></a></li>
            <?php } ?>


        </ul>

    </li>
    <li style="float: right;">

        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
            <span class="fa fa-envelope-o"></span>
            <span class="badge badge-red" id="spannotif">0</span>
        </a>


        <ul class="email-top" style="height: 500px; overflow-y: scroll;">
            <div class="notification"></div>
            <div class="notification1"></div>
            <div class="notification2"></div>
            <div class="notification3"></div>
        </ul>


    </li>

    <li style="float: right;">

        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
            <span class="fa fa-bell-o"></span>
            <span class="badge badge-red" id="spancaisse">0</span>
        </a>


        <ul class="email-top" style="height: 500px; overflow-y: scroll;">
            <div class="notificationcaisse"></div>

        </ul>


    </li>


</ul>


</body>

</html>


<style>
    /*    body {font: normal .8em/1.5em Arial, Helvetica, sans-serif;background: #ebebeb;width: 900px;margin: 100px auto;color: #666;}*/
    body {
        font: normal .8em/1.5em Arial, Helvetica, sans-serif;
        font-size: 12px;
        background: #ebebeb;
        width: 100%;
        margin: auto;
        color: #666;
    }

    a {
        color: #333;
    }

    #nav {
        margin: 0;
        padding: 7px 6px 0;
        background: #7d7d7d url(<?php echo $this->webroot; ?>assets/images/gradient.png) repeat-x 0 -110px;
        line-height: 100%;
        border-radius: 2em;
        -webkit-border-radius: 2em;
        -moz-border-radius: 2em;
        z-index: 99999;
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .4);
        position: fixed;
        width: 98%;
        z-index: 9999;
        top: 0;
    }

    #nav li {
        margin: 0 5px;
        padding: 0 0 10px;
        float: left;
        position: relative;
        list-style: none;
        z-index: 99999;
    }

    /* main level link */
    #nav a {
        font-weight: bold;
        color: #e7e5e5;
        text-decoration: none;
        display: block;
        padding: 8px 20px;
        margin: 0;
        z-index: 99999;
        -webkit-border-radius: 1.6em;
        -moz-border-radius: 1.6em;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
    }

    #nav a:hover {
        background: #000;
        color: #fff;
    }

    /* main level link hover */
    #nav .current a, #nav li:hover > a {
        background: #ece5e5 url(<?php echo $this->webroot; ?>assets/images/gradient.png) repeat-x 0 -40px;
        color: #000000;
        border-top: solid 1px #f8f8f8;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        z-index: 99999;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-shadow: 0 1px 0 rgba(255, 255, 255, 1);
    }

    /* sub levels link hover */
    #nav ul li:hover a, #nav li:hover li a {
        background: none;
        border: none;
        color: #666;
        -webkit-box-shadow: none;
        z-index: 99999;
        -moz-box-shadow: none;
    }

    #nav ul a:hover {
        background: #0078ff url(<?php echo $this->webroot; ?>assets/images/gradient.png) repeat-x 0 -100px !important;
        color: #fff !important;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    /* dropdown */
    #nav li:hover > ul {
        display: block;
    }

    /* level 2 list */
    #nav ul {
        display: none;
        margin: 0;
        padding: 0;
        width: 185px;
        position: absolute;
        top: 35px;
        left: 0;
        background: #ddd url(<?php echo $this->webroot; ?>assets/images/gradient.png) repeat-x 0 0;
        border: solid 1px #b4b4b4;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
    }

    #nav ul li {
        float: none;
        margin: 0;
        padding: 0;
    }

    #nav ul a {
        font-weight: normal;
        text-shadow: 0 1px 0 #fff;
    }

    /* level 3+ list */
    #nav ul ul {
        left: 181px;
        top: -3px;
    }

    /* rounded corners of first and last link */
    #nav ul li:first-child > a {
        -webkit-border-top-left-radius: 9px;
        -moz-border-radius-topleft: 9px;

        -webkit-border-top-right-radius: 9px;
        -moz-border-radius-topright: 9px;
    }

    #nav ul li:last-child > a {
        -webkit-border-bottom-left-radius: 9px;
        -moz-border-radius-bottomleft: 9px;

        -webkit-border-bottom-right-radius: 9px;
        -moz-border-radius-bottomright: 9px;
    }

    /* clearfix */
    #nav:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0;
    }

    #nav {
        display: inline-block;
    }

    html[xmlns] #nav {
        display: block;
    }

    * html #nav {
        height: 1%;
    }


</style>
<script>
    /*$( "#nav li" ).click(function() {
     if (  $( "#nav li ul" ).css( "display" ) == 'block' ){
     }
     });*/
    /*
     $(".current a").click(function() {
     if ( $('.souscurent').css("display","block")) {
     alert ('ttt');
     }

     else {

     alert('ss');
     }
     });
     */
</script>


<script>
    $(document).ready(function () {
        $(document).click(function () {
            $(".dropdown-menu").hide('slow');
        });

        $(".dropdown-menu").click(function (e) {
            e.stopPropagation();
        });


        notification();
        //login();
        notificationcaisse();
    })


    function login() {
        var prevCuisNotif = null;
        if (prevCuisNotif) {
            clearInterval(prevCuisNotif);
        }
        prevCuisNotif = setInterval(function () {


            $.ajax({
                type: "POST",
                data: {},
                url: wr + "Utilisateurs/testlogin/",
                dataType: "json",
                global: false
            }).done(function (data) {
                console.log(data);
                testmsglogin = $('#testmsglogin').val();
                if ((data.user == 0) && (testmsglogin == 0)) {
                    $('#testmsglogin').val(1);
                    bootbox.confirm("voulez vous connecter une autre fois !!!?", function (result) {
                        if (result) {
                            var html = 'Ok';
                            bootbox.hideAll();
                            //window.open("#reModal_refuser");
                            window.open("http://www.mtd-app.com/thermeco/Utilisateurs/login/1", "nom_popup", "menubar=no, status=no, scrollbars=no, menubar=no, width=800, height=1000");
                            return false;
                            //var html = 'Cancel';

                        } else {
                            var html = 'Cancel';
                            //window.location.href=wr+"Utilisateurs/login";
                        }

                    })
                }
            })

        }, 5000);
    }


    function notification() {

        personnel = $('#user').val();

        var prevCuisNotif = null;
        if (prevCuisNotif) {
            clearInterval(prevCuisNotif);
        }
        prevCuisNotif = setInterval(function () {
                var abc = "";
                var abc1 = "";
                var abc2 = "";
                var abc3 = "";
                var nbrnotif = "0";

                $.ajax({
                    type: "POST",
                    data: {
                        personnel: personnel

                    },
                    url: wr + "Deviprospects/notifdevis/",
                    dataType: "json",
                    global: false
                })
                    .done(function (data) {
                        console.log("devis " + data.nbdevis);
                        //alert(data.nbdevis);
                        if ((Number(data.nbdevis) > 0) && (Number(data.nbrworkflows) > 0)) {

                            ion.sound.play("bell_ring");
                            $('#chatAudio')[0].play();
                            nbrnotif = data.nbdevis;
                            //$('#spannotif').html(nbrnotif);


                            if (data.listedevis.length != 0) {
                                $.each(data.listedevis, function (i, item) {

                                    // console.log(item.id);
                                    abc += "<li id='" + item.deviprospects.id + "'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Deviprospects/edit/" + item.deviprospects.id + "?t=1&b=" + data.banque + "'><div class='email-top-content'><strong>Suggestion Commande numéro: " + item.deviprospects.numero + " par fournisseur " + data.fournisseurs[item.deviprospects.fournisseur_id] + " dans la date " + item.deviprospects.date + " leur total est : " + item.deviprospects.totalttc + "</strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i ><IMG src='<?php echo $this->webroot; ?>assets/images/supp.png' alt='Supp' width='10px' height='10px' onclick='Suppsugcommande(" + item.deviprospects.id + ")'></i></span></td></tr></table></li>";
                                });
                            }
                            $('.notification').html(abc);
                            //$('#spannotif').html(nb);
                        }


                        //zeinab
                        $.ajax({
                            type: "POST",
                            data: {
                                personnel: personnel

                            },
                            url: wr + "Bonsortiestocks/notifbsstock/",
                            dataType: "json",
                            global: false
                        })
                            .done(function (data1) {
                                console.log("sorti " + data1.nb);
                                nbrnotif = Number(nbrnotif) + Number(data1.nb);
                                //$('#spannotif').html(nbrnotif);
                                if (data1.listebs.length != 0) {
                                    $.each(data1.listebs, function (i, item) {
                                        // console.log(item.id);
                                        abc1 += "<li style='background-color:#ffeeee'><a href='<?php echo $this->webroot; ?>Bonsortiestocks/edit/" + item.bonsortiestocks.id + "/1'><div class='email-top-content'><strong>Bon Sortie numéro: " + item.bonsortiestocks.numero + " dans la date " + item.bonsortiestocks.date + "</strong></div></a></li>";
                                    });

                                }
                                if (data1.listebsvalid.length != 0) {
                                    $.each(data1.listebsvalid, function (i, item) {
                                        // console.log(item.id);
                                        abc1 += "<li style='background-color:#ffeeee;' id='" + item.bonsortiestocks.id + "'> <table width='100%' ><tr><td><a href='' ><div class='email-top-content'><strong><font color='rgba(85, 179, 87, 0.19)'>Bon Sortie numéro: " + item.bonsortiestocks.numero + " est validée</font></strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i ><IMG src='<?php echo $this->webroot; ?>assets/images/supp.png' alt='Supp' width='10px' height='10px' onclick='Suppbs(" + item.bonsortiestocks.id + ")'></i></span></td></tr></table></li>";
                                    });
                                }
                                if (data1.listebsrefus.length != 0) {
                                    $.each(data1.listebsrefus, function (i, item) {
                                        // console.log(item.id);
                                        abc1 += "<li style='background-color:#ffeeee;' id='" + item.bonsortiestocks.id + "'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Bonsortiestocks/edit/" + item.bonsortiestocks.id + "/2' ><div class='email-top-content'><strong><font color='red'>Bon Sortie numéro: " + item.bonsortiestocks.numero + " non validée</font></strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i ><img src='<?php echo $this->webroot; ?>assets/images/supp.png' alt='Supp'  width='10px' height='10px'  onclick='Suppbs(" + item.bonsortiestocks.id + ")'></i></span></td></tr></table></li>";
                                    });
                                }
                                $('.notification1').html(abc1);
                                //$('#spannotif').html(nb);


                                //notification affaire
                                $.ajax({
                                    type: "POST",
                                    data: {
                                        personnel: personnel

                                    },
                                    url: wr + "Affaires/notif_affaire/",
                                    dataType: "json",
                                    global: false
                                })
                                    .done(function (data2) {


                                        if (Number(data2.nbrworkflows) > 0) {
                                            console.log("affaire " + data2.nb);
                                            nbrnotif = Number(nbrnotif) + Number(data2.nb);
                                            //$('#spannotif').html(nbrnotif);
                                            if (data2.tab.length != 0) {
                                                $.each(data2.tab, function (i, item) {
                                                    // console.log(item.id);


                                                    abc2 += "<li style='background-color:#D7BDE2'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Affaires/view/" + item.id + "/1'><div class='email-top-content'><strong>" + item.personel + " a créé Nouveau Affire numéro: " + item.numero + " dans la date " + item.date + "</strong></div></a></td></tr></table></li>";
                                                });

                                            }

                                            $('.notification2').html(abc2);
                                        }

                                        //notification visite

                                        $.ajax({
                                            type: "POST",
                                            data: {
                                                personnel: personnel

                                            },
                                            url: wr + "Affaires/notif_visite/",
                                            dataType: "json",
                                            global: false
                                        })
                                            .done(function (data3) {
                                                console.log("visite " + data3.nbv);
                                                nbrnotif = Number(nbrnotif) + Number(data3.nbv);
                                                if (data3.tabv.length != 0) {
                                                    $.each(data3.tabv, function (i, item) {
                                                        abc3 += "<li style='background-color:#cfeff1'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Affaires/indexvisite/" + item.id + "'><div class='email-top-content'><strong>" + item.personel + ": vous avez une nouvelle visite en " + item.lieu + " Le : " + item.date + " &aacute; propos affaire: " + item.affaire + "</strong></div></a></td></tr></table></li>";
                                                    });
                                                }
                                                $('.notification3').html(abc3);


                                                console.log("tot " + nbrnotif);
                                                $('#spannotif').html(nbrnotif);
                                            });
                                    });
                            });
                    });
            }
            , 70000);

    }

    function notificationcaisse() {
        personnel = $('#user').val();
        var prevCuisNotif = null;
        if (prevCuisNotif) {
            clearInterval(prevCuisNotif);
        }
        prevCuisNotif = setInterval(function () {
            var abc = "";
            var nbrnotif = "0";
            $.ajax({
                type: "POST",
                url: wr + "Piecereglementclients/notif_caisse/" + personnel,
                dataType: "json",
                global: false
            })
                .done(function (data) {
                    if (Number(data.nbrworkflows) > 0) {
                        nbrnotif = Number(nbrnotif) + Number(data.nb);
                        if (data.tab.length != 0) {
                            $.each(data.tab, function (i, item) {
                                abc += "<li style='background-color:#D7BDE2'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Reglementclients/indexpcc/" + item.utilisateur_id + "'><div class='email-top-content'><strong>" + item.personel + " a envoyé : " + item.count + " piéce(s) </strong></div></a></td></tr></table></li>";
                            });
                        }
                        $('.notificationcaisse').html(abc);
                        $('#spancaisse').html(nbrnotif);
                    }
                })
        }, 80000);

    }


    //zeinab
    function Suppbs(id) {
        $(this).parent().parent().parent().hide();
        $.ajax({
            type: "POST",
            data: {
                bonsorti: id

            },
            url: wr + "Bonsortiestocks/notifBS/",
            dataType: "json",
            global: false
        }).done(function () {
        })
    }

    function Suppsugcommande(id) {
        $(this).parent().parent().parent().hide();
        $.ajax({
            type: "POST",
            data: {
                id: id

            },
            url: wr + "Deviprospects/notifBS/",
            dataType: "json",
            global: false
        }).done(function () {
        })
    }
</script>