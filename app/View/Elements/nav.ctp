<!--<audio id="chatAudio">
    <source src="<?php echo $this->webroot; ?>sounds/notify.ogg" type="audio/ogg">
    <source src="<?php echo $this->webroot; ?>sounds/notify.mp3" type="audio/mpeg">
    <source src="<?php echo $this->webroot; ?>sounds/notify.wav" type="audio/wav">
</audio>-->
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
                var abc4 = "";
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

                            //ion.sound.play("bell_ring");
                           // $('#chatAudio')[0].play();
                            nbrnotif = data.nbdevis;
                            //$('#spannotif').html(nbrnotif);


                            if (data.listedevis.length != 0) {
                                $.each(data.listedevis, function (i, item) {

                                    // console.log(item.id);
                                    abc += "<li id='" + item.deviprospects.id + "'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Deviprospects/edit/" + item.deviprospects.id + "?t=1&b=" + data.banque + "'><div class='email-top-content'><strong>Suggestion Commande numéro: " + item.deviprospects.numero + " par fournisseur " + data.fournisseurs[item.deviprospects.fournisseur_id] + " dans la date " + item.deviprospects.date + " leur total est : " + item.deviprospects.totalttc + "</strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i class='fa fa-times supor' style='color: #c9302c;font-size: 22px;' onclick='Suppsugcommande(" + item.deviprospects.id + ")'></i></span></td></tr></table></li>";
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
                                        abc1 += "<li style='background-color:#ffeeee;' id='" + item.bonsortiestocks.id + "'> <table width='100%' ><tr><td><a href='' ><div class='email-top-content'><strong><font color='rgba(85, 179, 87, 0.19)'>Bon Sortie numéro: " + item.bonsortiestocks.numero + " est validée</font></strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i class='fa fa-times supor' style='color: #c9302c;font-size: 22px;' onclick='Suppbs(" + item.bonsortiestocks.id + ")'></i></span></td></tr></table></li>";
                                    });
                                }
                                if (data1.listebsrefus.length != 0) {
                                    $.each(data1.listebsrefus, function (i, item) {
                                        // console.log(item.id);
                                        abc1 += "<li style='background-color:#ffeeee;' id='" + item.bonsortiestocks.id + "'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Bonsortiestocks/edit/" + item.bonsortiestocks.id + "/2' ><div class='email-top-content'><strong><font color='red'>Bon Sortie numéro: " + item.bonsortiestocks.numero + " non validée</font></strong></div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i class='fa fa-times supor' style='color: #c9302c;font-size: 22px;' onclick='Suppbs(" + item.bonsortiestocks.id + ")'></i></span></td></tr></table></li>";
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



                                             //notification article devis

                                        $.ajax({
                                            type: "POST",
                                            data: {
                                                personnel: personnel

                                            },
                                            url: wr + "Devis/notif_artidevis/",
                                            dataType: "json",
                                            global: false
                                        })
                                            .done(function (data3) {
                                                console.log("Notification article devis " + data3.nbnotif);
                                                
                                                nbrnotif = Number(nbrnotif) + Number(data3.nbnotif);
                                                if (data3.notif.length != 0) {
                                                    $.each(data3.notif, function (i, item) {
                                                        console.log(" article devis " + item);
                                                        abc4 += "<li style='background-color:#cfeff1'><table width='100%' ><tr><td><a href='<?php echo $this->webroot; ?>Articles/edit/" + item.article_id + "'> <strong>Article :"+item.article+" <br> "+item.message+" <br> Devis N° " + item.devis +"</div></a></td><td align='right' style='vertical-align: top;'><span class='label' ><i class='fa fa-times supor' style='color: #c9302c;font-size: 22px;' onclick='Suppnotifartdevi(" + item.id + ")'></i></span></td></tr></table></li>";
                                                    });
                                                }
                                                $('.notification4').html(abc4);


                                                console.log("tot " + nbrnotif);
                                                $('#spannotif').html(nbrnotif);
                                            });

                                    });
                            });
                    });
            }
            , 40000);

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
        }, 45000);

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
	function Suppnotifartdevi(id) { //alert(id);
        $(this).parent().parent().parent().hide();
        $.ajax({
            type: "POST",
            data: {
                id: id

            },
            url: wr + "Devis/notifBS/",
            dataType: "json",
            global: false
        }).done(function () {
        })
    }
</script>
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
    <li  style="float: right;">
<center style="font-size:150%;vertical-align: middle !important; height: 8px; width: 250px ; color: white">BienVenue</center>
                <br>
                <label class="fa" align="center" style="font-size:150%;vertical-align: middle !important; height: 8px; width: 250px ; color: white"><?php echo $nom . ' (' . $pvn . ')'; ?></label>
  

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
        background: #000000 url() repeat-x 0 -110px;
        line-height: 100%;
        border-radius: 0em;
        -webkit-border-radius: 0em;
        -moz-border-radius: 0em;
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