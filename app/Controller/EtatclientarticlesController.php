<?php

App::uses('AppController', 'Controller');

/**
 * Etatclientarticles Controller
 *
 * @property Etatclientarticle $Etatclientarticle
 */
class EtatclientarticlesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $lien = CakeSession::read('lien_stat');
        $x = "";
        //debug($lien);die;
        if (!empty($lien)) {
            foreach ($lien as $k => $liens) {
                if (@$liens['lien'] == 'etatclientarticles') {
                    $x = 1;
                }
            }
        }
        if (( $x <> 1) || (empty($lien))) {
            $this->redirect(array('controller' => 'utilisateurs', 'action' => 'login'));
        }
        $this->loadModel('Famille');
        $this->loadModel('Article');
        $this->loadModel('Bonlivraison');
        $this->loadModel('Lignelivraison');
        $this->loadModel('Factureclient');
        $this->loadModel('Lignefactureclient');
        $this->loadModel('Client');
        $this->loadModel('Exercice');
        $this->loadModel('Pointdevente');
        $this->loadModel('Tabetatcaparclientarticle');
        $this->loadModel('Tag');
        $this->loadModel('Articletag');
        $this->loadModel('Factureavoir');
        $this->loadModel('Lignefactureavoir');
        $this->loadModel('Fournisseur');
        $this->loadModel('Articlefournisseur');
        $this->loadModel('Personnel');
        $this->loadModel('Societe');
        $tab=array();
        $composantsoc = CakeSession::read('composantsoc');
        $fournisseurs = $this->Fournisseur->find('list', array(
            'conditions' => array('Fournisseur.societe' => $composantsoc)));
        $clients = $this->Factureclient->Client->find('list', array(
            'conditions' => array('Client.etat' => 1, 'Client.societe' => $composantsoc)));

        $p = CakeSession::read('pointdevente');
        if ($p > 0) {
            $cond_liste_pv = 'Pointdevente.id = '.$p;
        }
        $pointdeventes = $this->Pointdevente->find('list', array('conditions' => array(@$cond_liste_pv)));
        $exercices = $this->Exercice->find('list');
        $exe = date('Y');
        $exercice = $this->Exercice->find('first', array('conditions' => array('Exercice.name' => $exe)));
        $exerciceid = $exercice['Exercice']['id'];
        $condb4 = 'Bonlivraison.exercice_id =' . $exe;
        $condf4 = 'Factureclient.exercice_id =' . $exe;
        $conda4 = 'Factureavoir.exercice_id =' . $exe;
        $pv = "";
        $p = CakeSession::read('pointdevente');
        if ($p > 0) {
            $pvb = 'Bonlivraison.pointdevente_id = ' . $p;
            $pvf = 'Factureclient.pointdevente_id = ' . $p;
            $pva = 'Factureavoir.pointdevente_id = ' . $p;
        }
        
        $this->Tabetatcaparclientarticle->query('TRUNCATE tabetatcaparclientarticles;');
        if ($this->request->is('post')) {
            //debug($this->request->data);die;
            
            if ($this->request->data['Recherche']['exercice_id']) {
                $exerciceid = $this->request->data['Recherche']['exercice_id'];
                $condb4 = 'Bonlivraison.exercice_id =' . $exercices[$exerciceid];
                $condf4 = 'Factureclient.exercice_id =' . $exercices[$exerciceid];
                $conda4 = 'Factureavoir.exercice_id =' . $exercices[$exerciceid];
            }
            if ($this->request->data['Recherche']['date1'] != "__/__/____" &&(!empty($this->request->data['Recherche']['date1']))) {
                $date1 = date("Y-m-d", strtotime(str_replace('/', '-', $this->request->data['Recherche']['date1'])));
                $condb1 = 'Bonlivraison.date >= ' . "'" . $date1 . "'";
                $condf1 = 'Factureclient.date >= ' . "'" . $date1 . "'";
                $conda1 = 'Factureavoir.date >= ' . "'" . $date1 . "'";
                $condf4 = "";
                $condb4 = "";
                $conda4 = "";
            }

            if ($this->request->data['Recherche']['date2'] != "__/__/____" &&(!empty($this->request->data['Recherche']['date2']))) {
                $date2 = date("Y-m-d", strtotime(str_replace('/', '-', $this->request->data['Recherche']['date2'])));
                $condb2 = 'Bonlivraison.date <= ' . "'" . $date2 . "'";
                $condf2 = 'Factureclient.date <= ' . "'" . $date2 . "'";
                $conda2 = 'Factureavoir.date <= ' . "'" . $date2 . "'";
                $condf4 = "";
                $condb4 = "";
                $conda4 = "";
            }

            if ($this->request->data['Recherche']['client_id']) {
                $clientid = $this->request->data['Recherche']['client_id'];
                $condb3 = 'Bonlivraison.client_id =' . $clientid;
                $condf3 = 'Factureclient.client_id =' . $clientid;
                $conda3 = 'Factureavoir.client_id =' . $clientid;
            }

            if ($this->request->data['Recherche']['article_id']) {
                $articleid = $this->request->data['Recherche']['article_id'];
                $condb6 = 'Lignelivraison.article_id =' . $articleid;
                $condf6 = 'Lignefactureclient.article_id =' . $articleid;
                $conda6 = 'Lignefactureavoir.article_id =' . $articleid;
            }
            if (!empty($this->request->data['Recherche']['pointdevente_id'])) {
                $pointdeventeid = $this->request->data['Recherche']['pointdevente_id'];
                $condb5 = 'Bonlivraison.pointdevente_id =' . $pointdeventeid;
                $condf5 = 'Factureclient.pointdevente_id =' . $pointdeventeid;
                $conda5 = 'Factureavoir.pointdevente_id =' . $pointdeventeid;
            }
            if ($this->request->data['Recherche']['famille_id']) {
                $familleid = $this->request->data['Recherche']['famille_id'];
                $condb7 = 'Article.famille_id =' . $familleid;
                $condf7 = 'Article.famille_id =' . $familleid;
                $conda7 = 'Article.famille_id =' . $familleid;
            }
            if ($this->request->data['Recherche']['tag_id']) {
                $tagid = $this->request->data['Recherche']['tag_id'];
                $articles = $this->Articletag->find('all', array('recursive' => -1, 'conditions' => array('Articletag.tag_id' => $tagid)));
                $t = '(0';
                foreach ($articles as $ad) {
                    $t = $t . ',' . $ad['Articletag']['article_id'];
                }
                $t = $t . ')';
                $condb8 = 'Lignelivraison.article_id  in' . $t;
                $condf8 = 'Lignefactureclient.article_id in' . $t;
                $conda8 = 'Lignefactureavoir.article_id in' . $t;
            }

            if (!empty($this->request->data['Recherche']['fournisseur_id'])) {
                $fournisseurid = $this->request->data['Recherche']['fournisseur_id'];
                $arts = $this->Articlefournisseur->find('all', array('recursive' => -1, 'conditions' => array('Articlefournisseur.fournisseur_id' => $fournisseurid)));
                //debug($arts);die;
                $artf = '0';
                foreach ($arts as $k => $art) {
                    if ($art['Articlefournisseur']['article_id'] != '') {
                        $artf = $artf . ',' . $art['Articlefournisseur']['article_id'];
                    }
                }

                $condFsseur = 'Article.id in (' . $artf . ')';
                // debug($artf);die;
            }
            if (!empty($this->request->data['Recherche']['personnel_id'])) {
                $personnelid = $this->request->data['Recherche']['personnel_id'];
                $clients = $this->Client->find('all', array('recursive' => -1, 'conditions' => array('Client.personnel_id' => $personnelid)));
                //debug($clients);die;
                $abc = '0';
                foreach ($clients as $cl) {
                    $abc = $abc . ',' . $cl['Client']['id'];
                }
                $condb9 = 'Bonlivraison.client_id in (' . $abc . ')';
                $condf9 = 'Factureclient.client_id in (' . $abc . ')';
                $conda9 = 'Factureavoir.client_id in (' . $abc . ')';
            }
        
        $bonlivraisonparprixs = $this->Lignelivraison->find('all', array(
            'fields' => array('sum(Lignelivraison.totalttc) as ttc', 'sum(Lignelivraison.totalht) as total', 'Bonlivraison.client_id', 'Article.name', 'Article.id', 'sum(Lignelivraison.quantite) as quantite')
            , 'conditions' => array(@$pvb, @$condb1, @$condb2, @$condb3, @$condb4, @$condb5, @$condb6, @$condb7, @$condb8, @$condb9, @$condFsseur, @$condbsos)
            , 'group' => array('Bonlivraison.client_id', 'Lignelivraison.article_id')
            , 'contain' => array('Bonlivraison', 'Bonlivraison.Client', 'Article'), 'recursive' => 2));
        //debug($bonlivraisonparprixs);

        $bonlivraisonpartotales = $this->Bonlivraison->find('all', array('fields' => array('sum(Bonlivraison.totalht) as total')
            , 'conditions' => array(@$condb1, @$condb2, @$condb4, 'Bonlivraison.factureclient_id' => 0)));
        $bonlivraisonpartotalesTTC = $this->Bonlivraison->find('all', array('fields' => array('sum(Bonlivraison.totalttc) as total')
            , 'conditions' => array(@$condb1, @$condb2, @$condb4, 'Bonlivraison.factureclient_id' => 0)));

        
        $factureclientparprixs = $this->Lignefactureclient->find('all', array(
            'fields' => array('sum(Lignefactureclient.totalttc) as ttc', 'sum(Lignefactureclient.totalht) as total', 'Factureclient.client_id', 'Article.name', 'Article.id', 'sum(Lignefactureclient.quantite) as quantite')
            , 'conditions' => array('Factureclient.source="fac"', @$pvf, @$condf1, @$condf2, @$condf3, @$condf4, @$condf5, @$condf6, @$condf7, @$condf8, @$condf9, @$condFsseur, @$condfsos)
            , 'group' => array('Factureclient.client_id', 'Lignefactureclient.article_id')
            , 'contain' => array('Factureclient', 'Factureclient.Client', 'Article'), 'recursive' => 2));
        //debug($factureclientparprixs);
        
        $factureclientpartotales = $this->Factureclient->find('all', array('fields' => array('sum(Factureclient.totalht) as total')
            , 'conditions' => array(@$condf1, @$condf2, @$condf4)));
        $factureclientpartotalesTTC = $this->Factureclient->find('all', array('fields' => array('sum(Factureclient.totalttc) as total')
            , 'conditions' => array(@$condf1, @$condf2, @$condf4)));

        
        $factureavoirparprixs = $this->Lignefactureavoir->find('all', array(
            'fields' => array('sum(Lignefactureavoir.totalttc) as ttc', 'sum(Lignefactureavoir.totalht) as total', 'Factureavoir.client_id', 'Article.name', 'Article.id', 'sum(Lignefactureavoir.quantite) as quantite')
            , 'conditions' => array(@$pva, @$conda1, @$conda2, @$conda3, @$conda4, @$conda5, @$conda6, @$conda7, @$conda8, @$conda9, @$condFsseur, @$condasos)
            , 'group' => array('Factureavoir.client_id', 'Lignefactureavoir.article_id')
            , 'contain' => array('Factureavoir', 'Factureavoir.Client', 'Article'), 'recursive' => 2));
        //debug($factureclientparprixs);
        
        $factureavoirpartotales = $this->Factureavoir->find('all', array('fields' => array('sum(Factureavoir.totalht) as total')
            , 'conditions' => array(@$conda1, @$conda2, @$conda4)));
        $factureavoirpartotalesTTC = $this->Factureavoir->find('all', array('fields' => array('sum(Factureavoir.totalttc) as total')
            , 'conditions' => array(@$conda1, @$conda2, @$conda4)));
        

        $factureclientpartotales = $this->Factureclient->find('all', array('fields' => array('sum(Factureclient.totalht) as total'), 'conditions' => array('Factureclient.id > ' => 0)));


        $totaleBLF = $bonlivraisonpartotales[0][0]['total'] + $factureclientpartotales[0][0]['total'] - $factureavoirpartotales[0][0]['total'];

        $totaleBLFTTC = $bonlivraisonpartotalesTTC[0][0]['total'] + $factureclientpartotalesTTC[0][0]['total'] - $factureavoirpartotalesTTC[0][0]['total'];
        
       // debug($totaleBLFTTC);die;

        $tab = array();
        $i = 0;
        foreach ($bonlivraisonparprixs as $bonlivraison) {
            $clients = $this->Client->find('first', array('recursive' => -1,
                'conditions' => array('Client.id' => $bonlivraison['Bonlivraison']['client_id'])));

            $tab[$i]['clientid'] = $bonlivraison['Bonlivraison']['client_id'];
            if (!empty($clients)) {
                $tab[$i]['name'] = $clients['Client']['name'];
            }
            $tab[$i]['articleid'] = $bonlivraison['Article']['id'];
            $tab[$i]['article'] = $bonlivraison['Article']['name'];
            $tab[$i]['qte'] = $bonlivraison[0]['quantite'];
            $tab[$i]['tot'] = $bonlivraison[0]['total'];
            $tab[$i]['totalttc'] = $bonlivraison[0]['ttc'];
            $tab[$i]['por'] = round(($bonlivraison[0]['total'] / $totaleBLF) * 100, 3);
            $this->Tabetatcaparclientarticle->create();
            $this->Tabetatcaparclientarticle->save($tab[$i]);
            $i++;
        }
        $index = $i;
        foreach ($factureclientparprixs as $facture) {
            $clients = $this->Client->find('first', array('recursive' => -1,
                'conditions' => array('Client.id' => $facture['Factureclient']['client_id'])));
            //debug($clients);die;
            $tab[$index]['clientid'] = $facture['Factureclient']['client_id'];
            if (!empty($clients)) {
                $tab[$index]['name'] = $clients['Client']['name'];
            }
            $tab[$index]['articleid'] = $facture['Article']['id'];
            $tab[$index]['article'] = $facture['Article']['name'];
            $tab[$index]['qte'] = $facture[0]['quantite'];
            $tab[$index]['tot'] = $facture[0]['total'];
            $tab[$index]['totalttc'] = $facture[0]['ttc'];
            $tab[$index]['por'] = round(($facture[0]['total'] / $totaleBLF) * 100, 3);

            $this->Tabetatcaparclientarticle->create();
            $this->Tabetatcaparclientarticle->save($tab[$index]);
            $index++;
        }

        if (!empty($factureavoirparprixs)) {
            foreach ($factureavoirparprixs as $facture) {
                $clients = $this->Client->find('first', array('recursive' => -1,
                    'conditions' => array('Client.id' => $facture['Factureavoir']['client_id'])));
                //debug($clients);die;
                $tab[$index]['clientid'] = $facture['Factureavoir']['client_id'];
                if (!empty($clients)) {
                    $tab[$index]['name'] = $clients['Client']['name'];
                }
                $tab[$index]['articleid'] = $facture['Article']['id'];
                $tab[$index]['article'] = $facture['Article']['name'];
                $tab[$index]['qte'] = 0 - $facture[0]['quantite'];
                $tab[$index]['tot'] = 0 - $facture[0]['total'];
                $tab[$index]['totalttc'] = 0 - $facture[0]['ttc'];
                $tab[$index]['por'] = round(($facture[0]['total'] / $totaleBLF) * 100, 3);
                $this->Tabetatcaparclientarticle->create();
                $this->Tabetatcaparclientarticle->save($tab[$index]);
                $index++;
            }
        }

        $tab = $this->Tabetatcaparclientarticle->find('all', array(
            'fields' => array('sum(Tabetatcaparclientarticle.totalttc) as totalttc', 'sum(Tabetatcaparclientarticle.tot) as tot', 'clientid', 'name', 'article', 'sum(Tabetatcaparclientarticle.qte) as qte')
            , 'group' => array('Tabetatcaparclientarticle.clientid', 'Tabetatcaparclientarticle.articleid')
            , 'recursive' => 2));
        }
        $composantsoc = CakeSession::read('composantsoc');
        $fournisseurs = $this->Fournisseur->find('list', array(
            'conditions' => array('Fournisseur.societe' => $composantsoc)));
        $clients = $this->Factureclient->Client->find('list', array(
            'conditions' => array('Client.etat' => 1, 'Client.societe' => $composantsoc)));
        $familles = $this->Famille->find('list');
        $tags = $this->Tag->find('list');
        $personnels = $this->Personnel->find('list');
        $this->set(compact('societes', 'countsos', 'totaleBLFTTC', 'personnels', 'fournisseurs', 'tagid', 'tags', 'familleid', 'pointdeventeid', 'articleid', 'familles', 'totaleBLF', 'articles', 'tab', 'bonlivraisons', 'pointdeventes', 'exerciceid', 'exercices', 'date1', 'date2', 'clientid', 'clients', 'factureclients'));
    }

    public function imprimerrecherche() {
        $lien = CakeSession::read('lien_stat');
        $x = "";
        //debug($lien);die;
        if (!empty($lien)) {
            foreach ($lien as $k => $liens) {
                if (@$liens['lien'] == 'etatclients') {
                    $x = $liens['imprimer'];
                }
            }
        }
        if (( $x <> 1) || (empty($lien))) {
            $this->redirect(array('controller' => 'utilisateurs', 'action' => 'login'));
        }
        $this->loadModel('Famille');
        $this->loadModel('Article');
        $this->loadModel('Bonlivraison');
        $this->loadModel('Lignelivraison');
        $this->loadModel('Factureclient');
        $this->loadModel('Lignefactureclient');
        $this->loadModel('Client');
        $this->loadModel('Exercice');
        $this->loadModel('Pointdevente');
        $this->loadModel('Tabetatcaparclientarticle');
        $this->loadModel('Tag');
        $this->loadModel('Articletag');
        $this->loadModel('Factureavoir');
        $this->loadModel('Lignefactureavoir');



//        $pointdeventes = $this->Pointdevente->find('list');
//        $this->Tabetatcaparclientarticle->query('TRUNCATE tabetatcaparclientarticles;');         
//       $exercices = $this->Exercice->find('list');
//       $exe=date('Y');
//       $exercice = $this->Exercice->find('first',array('conditions'=>array('Exercice.name'=>$exe)));
//       $exerciceid=$exercice['Exercice']['id'];
//        $condb4 = 'Bonlivraison.exercice_id ='.$exe;
//        $condf4 = 'Factureclient.exercice_id ='.$exe;
//        $conda4 = 'Factureavoir.exercice_id ='.$exe;
//        $pv="";
//       $p=CakeSession::read('pointdevente');
//       if($p>0){
//          $pvb= 'Bonlivraison.pointdevente_id = '.$p;
//          $pvf= 'Factureclient.pointdevente_id = '.$p;
//          $pva= 'Factureavoir.pointdevente_id = '.$p;
//       }
//        
//        //debug($this->request->data);die;
        if ($this->request->query['date1']) {
            $date1 = $this->request->query['date1'];
            $condb1 = 'Bonlivraison.date >= ' . "'" . $date1 . "'";
            $condf1 = 'Factureclient.date >= ' . "'" . $date1 . "'";
            $conda1 = 'Factureavoir.date >= ' . "'" . $date1 . "'";
            $condf4 = "";
            $condb4 = "";
            $conda4 = "";
        }

        if ($this->request->query['date2']) {
            $date2 = $this->request->query['date2'];
            $condb2 = 'Bonlivraison.date <= ' . "'" . $date2 . "'";
            $condf2 = 'Factureclient.date <= ' . "'" . $date2 . "'";
            $conda2 = 'Factureavoir.date <= ' . "'" . $date2 . "'";
            $condf4 = "";
            $condb4 = "";
            $conda4 = "";
        }
//        
//        if ($this->request->query['clientid']) {
//            $clientid= $this->request->query['clientid'];
//            $condb3 = 'Bonlivraison.client_id ='.$clientid;
//            $condf3 = 'Factureclient.client_id ='.$clientid;
//            $conda3 = 'Factureavoir.client_id ='.$clientid;
//        } 
//          if ($this->request->query['exerciceid']) {
//            $exerciceid = $this->request->query['exerciceid'];
//            $condb4 = 'Bonlivraison.exercice_id ='.$exercices[$exerciceid];
//            $condf4 = 'Factureclient.exercice_id ='.$exercices[$exerciceid];
//            $conda4 = 'Factureavoir.exercice_id ='.$exercices[$exerciceid];
//        }
//         if ($this->request->query['articleid']) {
//            $articleid = $this->request->query['articleid'];
//            $condb6 = 'Lignelivraison.article_id ='.$articleid;
//            $condf6 = 'Lignefactureclient.article_id ='.$articleid;
//            $conda6 = 'Lignefactureavoir.article_id ='.$articleid;
//        } 
//         if (!empty($this->request->query['pointdeventeid'])) {
//            $pointdeventeid = $this->request->query['pointdeventeid'];
//            $condb5 = 'Bonlivraison.pointdevente_id ='.$pointdeventeid;
//            $condf5 = 'Factureclient.pointdevente_id ='.$pointdeventeid;
//            $conda5 = 'Factureavoir.pointdevente_id ='.$pointdeventeid;
//        } 
//         if ($this->request->query['familleid']) {
//            $clientid= $this->request->query['familleid'];
//            $condb7 = 'Article.famille_id ='.$clientid;
//            $condf7 = 'Article.famille_id ='.$clientid;
//            $conda7 = 'Article.famille_id ='.$familleid;
//        } 
//         if ($this->request->query['tagid']) {
//            $tagid= $this->request->query['tagid'];
//            $articles=$this->Articletag->find('all',array('recursive'=>-1,'conditions'=>array('Articletag.tag_id'=>$tagid)));
//            $t='(0';
//            foreach ($articles as $ad){
//                $t=$t.','.$ad['Articletag']['article_id'];
//            }
//            $t=$t.')';
//            $condb8 = 'Lignelivraison.article_id  in'.$t;
//            $condf8 = 'Lignefactureclient.article_id in'.$t;
//            $conda8 = 'Lignefactureavoir.article_id in'.$t;
//        }
//    
//  $bonlivraisonparprixs = $this->Lignelivraison->find('all', array(
//   'fields'=>array('sum(Lignelivraison.totalht) as total','Bonlivraison.client_id','Article.name','Article.id','sum(Lignelivraison.quantite) as quantite')
//  ,'conditions' => array('Bonlivraison.id > ' => 0,'Bonlivraison.factureclient_id'=>0,@$pvb, @$condb1, @$condb2, @$condb3 , @$condb4, @$condb5, @$condb6, @$condb7, @$condb8)
//  ,'group'=>array('Bonlivraison.client_id','Lignelivraison.article_id')
//  ,'contain'=>array('Bonlivraison','Bonlivraison.Client','Article'),'recursive'=>2));
//   
//  $bonlivraisonpartotales = $this->Bonlivraison->find('all', array('fields'=>array('sum(Bonlivraison.totalht) as total')
//  ,'conditions' => array('Bonlivraison.id > ' => 0,'Bonlivraison.factureclient_id'=>0)));
//  
//  $factureclientparprixs = $this->Lignefactureclient->find('all', array(
//   'fields'=>array('sum(Lignefactureclient.totalht) as total','Factureclient.client_id','Article.name','Article.id','sum(Lignefactureclient.quantite) as quantite')
//  ,'conditions' => array('Factureclient.id > ' => 0,@$pvf, @$condf1, @$condf2, @$condf3 , @$condf4, @$condf5, @$condf6, @$condf7, @$condf8)
//  ,'group'=>array('Factureclient.client_id','Lignefactureclient.article_id')
//  ,'contain'=>array('Factureclient','Factureclient.Client','Article'),'recursive'=>2));
//  
//  $factureavoirparprixs = $this->Lignefactureavoir->find('all', array(
//   'fields'=>array('sum(Lignefactureavoir.totalht) as total','Factureavoir.client_id','Article.name','Article.id','sum(Lignefactureavoir.quantite) as quantite')
//  ,'conditions' => array('Factureavoir.id > ' => 0,@$pva, @$conda1, @$conda2, @$conda3 , @$conda4, @$conda5, @$conda6, @$conda7, @$conda8)
//  ,'group'=>array('Factureavoir.client_id','Lignefactureavoir.article_id')
//  ,'contain'=>array('Factureavoir','Factureavoir.Client','Article'),'recursive'=>2));
//  
//  
//  $factureclientpartotales = $this->Factureclient->find('all', array('fields'=>array('sum(Factureclient.totalht) as total'), 'conditions' => array('Factureclient.id > ' => 0)));
//  $totaleBLF=$bonlivraisonpartotales[0][0]['total']+$factureclientpartotales[0][0]['total'];
//   //debug($factureclientparprixs);die;
//   $tab=array();
//   $i=0;
//       foreach ($bonlivraisonparprixs as $bonlivraison){
//       $clients = $this->Client->find('first', array(
//       'conditions' => array('Client.id'=>$bonlivraison['Bonlivraison']['client_id'])));
//       //debug($clients);die;
//       $tab[$i]['clientid']=$bonlivraison['Bonlivraison']['client_id'];
//       if(!empty($clients)){
//       $tab[$i]['name']= $clients['Client']['name'];
//       }
//       $tab[$i]['articleid']= $bonlivraison['Article']['id'];
//       $tab[$i]['article']= $bonlivraison['Article']['name'];
//       $tab[$i]['qte']= $bonlivraison[0]['quantite'];
//       $tab[$i]['tot']= $bonlivraison[0]['total'];
//       $tab[$i]['por']= round(($bonlivraison[0]['total']/$totaleBLF)*100, 3);
//       $this->Tabetatcaparclientarticle->create();
//       $this->Tabetatcaparclientarticle->save($tab[$i]); 
//       $i++;
//       }
//        $index=$i;
//       foreach ($factureclientparprixs as $facture){
//        $clients = $this->Client->find('first', array(
//       'conditions' => array('Client.id'=>$facture['Factureclient']['client_id'])));
//       //debug($clients);die;
//       $tab[$index]['clientid']= $facture['Factureclient']['client_id'];
//       if(!empty($clients)){
//       $tab[$index]['name']= $clients['Client']['name'];
//       }
//       $tab[$index]['articleid']= $facture['Article']['id'];
//       $tab[$index]['article']= $facture['Article']['name'];
//       $tab[$index]['qte']= $facture[0]['quantite'];
//       $tab[$index]['tot']= $facture[0]['total']; 
//       $tab[$index]['por']= round(($facture[0]['total']/$totaleBLF)*100,3);
//       $this->Tabetatcaparclientarticle->create();
//       $this->Tabetatcaparclientarticle->save($tab[$index]);
//       $index++;
//        }
//        
//       if(!empty($factureavoirparprixs)){
//       foreach ($factureavoirparprixs as $facture){
//        $clients = $this->Client->find('first', array(
//       'conditions' => array('Client.id'=>$facture['Factureavoir']['client_id'])));
//       //debug($clients);die;
//       $tab[$index]['clientid']= $facture['Factureavoir']['client_id'];
//       if(!empty($clients)){
//       $tab[$index]['name']= $clients['Client']['name'];
//       }
//       $tab[$index]['articleid']= $facture['Article']['id'];
//       $tab[$index]['article']= $facture['Article']['name'];
//       $tab[$index]['qte']= 0-$facture[0]['quantite'];
//       $tab[$index]['tot']= 0-$facture[0]['total']; 
//       $tab[$index]['por']= round(($facture[0]['total']/$totaleBLF)*100,3);
//       $this->Tabetatcaparclientarticle->create();
//       $this->Tabetatcaparclientarticle->save($tab[$index]);
//       $index++;
//       }
//       } 
//        
        $tab = $this->Tabetatcaparclientarticle->find('all', array(
            'fields' => array('sum(Tabetatcaparclientarticle.totalttc) as totalttc', 'sum(Tabetatcaparclientarticle.tot) as tot', 'clientid', 'name', 'article', 'sum(Tabetatcaparclientarticle.qte) as qte')
            , 'group' => array('Tabetatcaparclientarticle.clientid', 'Tabetatcaparclientarticle.articleid')
            , 'recursive' => 2));

        //debug($tab);die;
        $familles = $this->Famille->find('list');
        $articles = $this->Article->find('list');
        $clients = $this->Client->find('list');
        $tags = $this->Tag->find('list');
        $this->set(compact('tagid', 'tags', 'familleid', 'pointdeventeid', 'articleid', 'familles', 'totaleBLF', 'articles', 'tab', 'bonlivraisons', 'pointdeventes', 'exerciceid', 'exercices', 'date1', 'date2', 'clientid', 'clients', 'factureclients'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Etatclientarticle->exists($id)) {
            throw new NotFoundException(__('Invalid etatclientarticle'));
        }
        $options = array('conditions' => array('Etatclientarticle.' . $this->Etatclientarticle->primaryKey => $id));
        $this->set('etatclientarticle', $this->Etatclientarticle->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Etatclientarticle->create();
            if ($this->Etatclientarticle->save($this->request->data)) {
                $this->Session->setFlash(__('The etatclientarticle has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The etatclientarticle could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Etatclientarticle->exists($id)) {
            throw new NotFoundException(__('Invalid etatclientarticle'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Etatclientarticle->save($this->request->data)) {
                $this->Session->setFlash(__('The etatclientarticle has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The etatclientarticle could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Etatclientarticle.' . $this->Etatclientarticle->primaryKey => $id));
            $this->request->data = $this->Etatclientarticle->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Etatclientarticle->id = $id;
        if (!$this->Etatclientarticle->exists()) {
            throw new NotFoundException(__('Invalid etatclientarticle'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Etatclientarticle->delete()) {
            $this->Session->setFlash(__('Etatclientarticle deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Etatclientarticle was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
