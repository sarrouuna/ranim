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
    <li class="current"><a href="<?php echo $this->webroot; ?>accueils/index">Accueil</a></li>
    <?php if ($parametrage  == 'par') { ?><li><a href="<?php echo $this->webroot; ?>accueils/param">Paramètrage</a></li><?php } ?>
    <?php if ($stock  == 'stk') { ?><li><a href="<?php echo $this->webroot; ?>accueils/stockk">Stock</a></li><?php } ?>
    <?php if ($achat  == 'ach') { ?><li><a href="<?php echo $this->webroot; ?>accueils/achat">Achat</a></li><?php } ?>
    <?php if ($vente == 'vnt') { ?><li><a href="<?php echo $this->webroot; ?>accueils/vente">Vente</a></li><?php } ?>
    <?php if ($finance == 'fnc') { ?><li><a href="<?php echo $this->webroot; ?>accueils/finance">Finance</a></li><?php } ?>
    <?php if ($stat == 'stat') { ?><li><a href="<?php echo $this->webroot; ?>accueils/stat">Statistiques</a></li><?php } ?>
    <?php if ($compta == 'compta') { ?><li><a href="<?php echo $this->webroot; ?>accueils/compt">Comptabilité</a></li><?php } ?>
    
    <li class="current"><a href="<?php echo $this->webroot; ?>Utilisateurs/login">Déconnexion</a></li>
</ul>
<style>
    /*    body {font: normal .8em/1.5em Arial, Helvetica, sans-serif;background: #ebebeb;width: 900px;margin: 100px auto;color: #666;}*/
    body {font: normal .8em/1.5em Arial, Helvetica, sans-serif; font-size: 12px;background:  #f9f9f9;width: 100%;margin:auto;color: #666;}
    a {color: #333;}

    #nav {margin: 0;padding: 7px 6px 0;background: #1e1e1e repeat-x 0 -110px;line-height: 100%;
          /* border-radius: 2em;
           -webkit-border-radius: 2em;
           -moz-border-radius: 2em;z-index: 99990;
           -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .4);
           -moz-box-shadow: 0 1px 3px rgba(0,0,0, .4);*/}
    #nav li {margin: 0 5px;padding: 0 0 10px;float: left;position: relative;list-style: none;z-index: 99991;}

    /* main level link */
    #nav a {font-weight: bold;color: #e7e5e5;text-decoration: none;display: block;padding:  8px 20px;margin: 0;z-index: 99992;
            /*-webkit-border-radius: 1.6em;
            -moz-border-radius: 1.6em;
            text-shadow: 0 1px 1px rgba(0,0,0, .3);*/}
    #nav a:hover {background: #000;color: #fff;}

    /* main level link hover */
    #nav .current a, #nav li:hover > a {text-decoration: underline;/*background: #fff; repeat-x 0 -40px*/;color: #fff;/*border-top: solid 1px #f8f8f8;*/
                                        /*-webkit-box-shadow: 0 1px 1px rgba(0,0,0, .2);
                                        -moz-box-shadow: 0 1px 1px rgba(0,0,0, .2);z-index: 99993;
                                        box-shadow: 0 1px 1px rgba(0,0,0, .2);
                                        text-shadow: 0 1px 0 rgba(255,255,255, 1);*/}

    /* sub levels link hover */
    #nav ul li:hover a, #nav li:hover li a {background: none;border: none;color: #666;
                                            -webkit-box-shadow: none;z-index: 99994;
                                            -moz-box-shadow: none;}
    #nav ul a:hover {background: #0078ff url(<?php echo $this->webroot; ?>assets/images/gradient.png) repeat-x 0 -100px !important;
                     color: #fff !important;
                     -webkit-border-radius: 0;
                     -moz-border-radius: 0;
                     text-shadow: 0 1px 1px rgba(0,0,0, .1);}

    /* dropdown */
    #nav li:hover > ul {display: block;}

    /* level 2 list */
    #nav ul {display: none;margin: 0;padding: 0;width: 185px;position: absolute;top: 35px;left: 0;
             background: #ddd url(<?php echo $this->webroot; ?>assets/images/gradient.png) repeat-x 0 0;
             border: solid 1px #b4b4b4;
             -webkit-border-radius: 10px;
             -moz-border-radius: 10px;
             border-radius: 10px;
             -webkit-box-shadow: 0 1px 3px rgba(0,0,0, .3);
             -moz-box-shadow: 0 1px 3px rgba(0,0,0, .3);
             box-shadow: 0 1px 3px rgba(0,0,0, .3);}
    #nav ul li {float: none;margin: 0;padding: 0;}

    #nav ul a {font-weight: normal;text-shadow: 0 1px 0 #fff;}

    /* level 3+ list */
    #nav ul ul {left: 181px;top: -3px;}

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
    #nav:after {content: ".";display: block;clear: both;visibility: hidden;line-height: 0;height: 0;}
    #nav {display: inline-block;} 
    html[xmlns] #nav {display: block;}
    * html #nav {height: 1%;}
</style>