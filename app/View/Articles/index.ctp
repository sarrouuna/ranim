<script language="JavaScript" type="text/JavaScript">

    function flvFPW1(){

    var v1=arguments,v2=v1[2].split(","),v3=(v1.length>3)?v1[3]:false,v4=(v1.length>4)?parseInt(v1[4]):0,v5=(v1.length>5)?parseInt(v1[5]):0,v6,v7=0,v8,v9,v10,v11,v12,v13,v14,v15,v16;v11=new Array("width,left,"+v4,"height,top,"+v5);for (i=0;i<v11.length;i++){v12=v11[i].split(",");l_iTarget=parseInt(v12[2]);if (l_iTarget>1||v1[2].indexOf("%")>-1){v13=eval("screen."+v12[0]);for (v6=0;v6<v2.length;v6++){v10=v2[v6].split("=");if (v10[0]==v12[0]){v14=parseInt(v10[1]);if (v10[1].indexOf("%")>-1){v14=(v14/100)*v13;v2[v6]=v12[0]+"="+v14;}}if (v10[0]==v12[1]){v16=parseInt(v10[1]);v15=v6;}}if (l_iTarget==2){v7=(v13-v14)/2;v15=v2.length;}else if (l_iTarget==3){v7=v13-v14-v16;}v2[v15]=v12[1]+"="+v7;}}v8=v2.join(",");v9=window.open(v1[0],v1[1],v8);if (v3){v9.focus();}document.MM_returnValue=false;return v9;

    }

</script>
<?php
$add = "";
$edit = "";
$delete = "";
$imprimer = "";
$lien = CakeSession::read('lien_stock');
//debug($lien_stock);die;
foreach ($lien as $k => $liens) {
    //debug($liens);die;
    if (@$liens['lien'] == 'articles') {
        $add = $liens['add'];
        $edit = $liens['edit'];
        $delete = $liens['delete'];
        $imprimer = $liens['imprimer'];
    }
}
if ($add == 1) {
    ?>

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn btn-danger" href="<?php echo $this->webroot; ?>Articles/add"/> <i class="fa fa-plus-circle"></i> Ajouter </a>
            <a class="btn btn btn-danger" href="<?php echo $this->webroot; ?>Factureclients/recap_nouveau_prix/null/null/1/null/null/Article"/> <i class="fa fa-plus-circle"></i> Ajouter Article Composé </a>
        </div>

    </div>
<?php } ?>
<br>
<input type="hidden" id="page"  value="indexarticle">
<div class="row" >
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Recherche'); ?></h3>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('Article', array('autocomplete' => 'off', 'class' => 'form-horizontal ls_form')); ?>

                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('sousfamille_id', array('empty' => 'veuillez choisir', 'div' => 'form-group', 'label' => 'Sous famille', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    echo $this->Form->input('typeetatarticle_id', array('label' => 'Etat Article', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'id' => 'typeetatarticle_id', 'after' => '</div>', 'class' => 'form-control select ', 'empty' => 'Veuillez Choisir !!'));
//                    echo $this->Form->input('article_id', array('label' => 'Article', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'id' => 'article_id', 'after' => '</div>', 'class' => 'form-control select ', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('famille_id', array('empty' => 'veuillez choisir', 'div' => 'form-group', 'label' => 'Famille', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    ?>

                    <?php
//                    echo $this->Form->input('code', array('div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control ', 'type' => 'text', 'label' => 'Code'));
//                    echo $this->Form->input('article_id', array('empty' => 'veuillez choisir', 'div' => 'form-group', 'label' => 'D&egrave;signation', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    ?>
                    
                        <?php
                        echo $this->Form->input('article_id', array('div' => 'form-group', 'index' => '0', 'id' => 'article_id0', 'champ' => 'article_id', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'hidden'));
                        ?>
                        <?php
                        echo $this->Form->input('code', array('yourid'=>'article_id0','div' => 'form-group', 'placeholder' => 'Code', 'label' => 'Code', 'index' => '0', 'id' => 'code0', 'champ' => 'code', 'between' => '<div class="col-sm-10"><div class="autocomplete" style="width:100%;">', 'after' => '</div></div>', 'class' => 'form-control index_code_manuel_autocomplete', 'type' => 'text'));
                        ?>
                    



                </div>
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('soussousfamille_id', array('empty' => 'veuillez choisir', 'div' => 'form-group', 'label' => 'Sous sous famille', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    echo $this->Form->input('typestockarticle_id', array('label' => 'Etat Stock', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'id' => 'typestockarticle_id', 'after' => '</div>', 'class' => 'form-control select ', 'empty' => 'Veuillez Choisir !!'));
                    ?>
                    
                        <?php echo $this->Form->input('designation', array('yourid'=>'article_id0','div' => 'form-group', 'placeholder' => 'Designation', 'label' => 'Article', 'index' => '0', 'id' => 'designation0', 'champ' => 'designation', 'between' => '<div class="col-sm-10"><div class="autocomplete" style="width:100%;">', 'after' => '</div></div>', 'class' => 'form-control index_designation_manuel_autocomplete', 'type' => 'text')); ?>

                </div>      

                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary" id="aff">Chercher</button>  
                        <a class="btn btn-primary" href="<?php echo $this->webroot; ?>Articles/index"/>Afficher Tout </a>
                        <?php if ($imprimer == 1) { ?>
                            <a  onClick="flvFPW1(wr + 'Articles/imprimerrecherche?familleid=<?php echo @$familleid; ?>&code=<?php echo @$code; ?>&typestockarticleid=<?php echo @$typestockarticleid; ?>&typeetatarticleid=<?php echo @$typeetatarticleid; ?>&sousfamilleid=<?php echo @$sousfamilleid; ?>&soussousfamilleid=<?php echo @$soussousfamilleid; ?>', 'UPLOAD', 'width=800,height=1150,scrollbars=yes', 0, 2, 2);return document.MM_returnValue" href="javascript:;" ><button class="btn btn-primary">Imprimer</button> </a>
                        <?php } ?>


                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<br><input type="hidden" id="page" value="1"/>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Articles'); ?></h3>
            </div>
            <div class="panel-body">
                <div class="ls-editable-table table-responsive ls-table">
                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                        <thead>
                            <tr>

                                <th style="display: none;"><?php echo ('Id'); ?></th>
                                <th><?php echo ('Code'); ?></th> 

                                <th><?php echo ('Désignation'); ?></th>

                                <th><?php echo ('Famille_id'); ?></th>

                                <th><?php echo ('Sous famille_id'); ?></th>



                                <th><?php echo ('Prix de vente HT'); ?></th>

                                <th><?php echo ('Prix Achat Net'); ?></th>

                                <th class="actions" align="center"></th>
                            </tr></thead><tbody>
                            <?php
                            foreach ($totarticles as $article):
                                $nbtotale=0;
                                $obj1 = ClassRegistry::init('Lignefactureclient');
  
                               $id_art=$article['Article']['id'];
                              $nb=$obj1->query("SELECT SUM(nb) AS nb
FROM (
   SELECT count(*) nb FROM  `lignefactureclients`       WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignelivraisons` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignefactures` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignereceptions` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignebonreceptionstocks` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignedeviprospects` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignecommandes` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignefactureavoirs` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignedeviprospects` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignedevis` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignecommandeclients` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignefactureavoirfrs` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `lignebonsortiestocks` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `ligneproductions` WHERE  `article_id` =$id_art UNION ALL
   SELECT count(*) nb FROM  `ligneinventaires` WHERE  `article_id` =$id_art
  
) AS nb");
                              $nbtotale=$nb['0'][0]['nb'];
                       
                                ?>
                                <tr>
                                    <td style="display:none"><?php echo h($article['Article']['id']); ?></td>
                                    <td ><?php echo h($article['Article']['code']); ?></td>

                                    <td ><?php echo h($article['Article']['name']); ?></td>
                                    <td >
                                        <?php echo $this->Html->link($article['Famille']['name'], array('controller' => 'familles', 'action' => 'view', $article['Famille']['id'])); ?>
                                    </td>
                                    <td >
                                        <?php echo $this->Html->link($article['Sousfamille']['name'], array('controller' => 'sousfamilles', 'action' => 'view', $article['Sousfamille']['id'])); ?>
                                    </td>

                                    <td ><?php echo h($article['Article']['prixvente']); ?></td>
                                    <td ><?php echo h($article['Article']['coutrevient']); ?></td>
                                    <td align="center">
                                        <?php echo $this->Html->link("<button class='btn btn-xs btn-success'><i class='fa fa-search'></i></button>", array('action' => 'view', $article['Article']['id']), array('escape' => false)); ?>
                                        <?php
                                        if ($edit == 1) {
                                            echo $this->Html->link("<button class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button>", array('action' => 'edit', $article['Article']['id']), array('escape' => false));
                                        }
                                        ?>
                                        <?php
                                        if (($delete == 1) && ($nbtotale == 0)) {
                                            echo $this->Form->postLink("<button class='btn btn-xs btn-danger'><i class='fa fa-trash-o'></i></button>", array('action' => 'delete', $article['Article']['id']), array('escape' => false, null), __('Veuillez vraiment supprimer cette enregistrement # %s?', $article['Article']['id']));
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div></div></div></div></div>	


