<script>
    window.onload = function () {
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
        ajouter_ligne_livraison1('addtable', 'index', 'tr');
    };
</script>
<br>
<div class="row" >
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading not_padinng">
                <h3 class="panel-title taille_titre">
                    <a class="btn btn btn-danger a_color" href="<?php echo $this->webroot; ?>Bonsortiestocks/index"/> <i class="fa fa-reply"></i> Retour </a>
                    <strong><?php echo __('Modification Bon Sortie '); ?></strong>
                </h3>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('Bonsortiestock', array('autocomplete' => 'off', 'class' => 'form-horizontal ls_form', 'id' => 'defaultForm', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'fa fa-check', 'data-bv-feedbackicons-invalid' => 'fa fa-bug', 'data-bv-feedbackicons-validating' => 'fa fa-refresh')); ?>

                <div class="col-md-6">                  
                    <?php
                    echo $this->Form->input('page', array('value' => 'bonsortiestock', 'id' => 'page', 'type' => 'hidden', 'div' => 'form-group', 'readonly' => 'readonly', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'required data-bv-notempty-message' => 'Champ Obligatoire'));
                    echo $this->Form->input('id', array('div' => 'form-group', 'readonly' => 'readonly', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'required data-bv-notempty-message' => 'Champ Obligatoire'));
                    echo $this->Form->input('numero', array('div' => 'form-group', 'readonly' => 'readonly', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'required data-bv-notempty-message' => 'Champ Obligatoire'));
                    echo $this->Form->input('remarque', array('rows' => 3, 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'required data-bv-notempty-message' => 'Champ Obligatoire'));
                    ?></div><div class="col-md-6"><?php
                    echo $this->Form->input('date', array('div' => 'form-group', 'value' => date("d/m/Y", strtotime(str_replace('/', '-', $this->request->data['Bonsortiestock']['date']))), 'type' => 'text', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control ', 'required data-bv-notempty-message' => 'Champ Obligatoire'));
                    if ($validation == 1 || $valide == 1) {
                        echo $this->Form->input('personnel_id', array('type' => 'hidden', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'id' => 'fc', 'class' => 'form-control', 'empty' => 'Veuillez Choisir !!'));
                    } else {
                        echo $this->Form->input('personnel_id', array('div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'id' => 'fc', 'class' => 'form-control select', 'empty' => 'Veuillez Choisir !!'));
                    }
                    echo $this->Form->input('depot_id', array('label' => 'Depot ', 'div' => 'form-group', 'id' => 'depot_id', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control select inputspcial', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('verif', array('id' => 'verif', 'type' => 'hidden', 'value' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    ?>
                </div>   


                <div class="row ligne" >
                    <table class="table table-bordered table-striped table-bottomless tablejdid scrollh" id="addtable" style="width:100%" align="center" >
                        <thead>
                            <tr class="entetetab" style="background-color: #c6b9b9;">
                                <td align="center" nowrap="nowrap" width="30%">Article</td>
                                <td align="center" nowrap="nowrap" width="48%">Designation</td>
                                <td align="center" nowrap="nowrap" width="10%"> Quantité en Stock </td>
                                <td align="center" nowrap="nowrap" width="10%"> Quantité </td>
                                <td align="center" width="2%">
                                    <a class="btn btn-danger" onclick="ajouter_ligne_livraison1('addtable', 'index', 'tr')" table='addtable' index='index'  tr="tr" style="
                                       padding: 0px 6px;
                                       "><i class="fa fa-plus-circle"  ></i> </a>
                                </td>
                            </tr>
                        </thead>
                        <?php $tablesemi = 'Lignetransfert'; ?>
                        <input id="lachaine" type="hidden" value="depot_id,code,designation,quantite" >
                        <input id="interfacetransfert" type="hidden" value="transfert" >
                        <tbody>
                            <tr class="tr" style="display:none;" >

                                <td style="width:30%" champ="tdarticle" id="">
                                    <?php //echo $this->Form->input('article_id',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignetransfert','index'=>'','id'=>'','champ'=>'article_id','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'articleidbl','empty'=>'Veuillez Choisir !!') ); ?>
                                    <div class="" style="display:inline; position: relative;">
                                        <?php
                                        echo $this->Form->input('article_id', array('div' => 'form-group', 'name' => '', 'table' => $tablesemi, 'index' => '', 'id' => '', 'champ' => 'article_id', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'hidden'));
//                                        echo $this->Form->input('code', array('div' => 'form-group', 'placeholder' => 'Code', 'label' => '', 'name' => '', 'table' => $tablesemi, 'index' => '', 'id' => '', 'champ' => 'code', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control haithamcode', 'type' => 'text'));
                                        ?>
                                        <?php echo $this->Form->input('code', array('div' => 'form-group', 'placeholder' => 'Code', 'label' => '', 'name' => '', 'table' => $tablesemi, 'index' => '', 'id' => '', 'champ' => 'code', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control codeselect', 'type' => 'text'));
                                        ?><div id="res" champ="rescode" index=""  class="haithamcss" onMouseMove="this.style.visibility = 'visible';" ></div>

                                    </div>
                                </td>
                                <td style="width:48%" id="" index="" champ="tddesg">
                                    <div class="" style="display:inline; position: relative;">
                                        <?php echo $this->Form->input('designation', array('div' => 'form-group', 'placeholder' => 'Designation', 'label' => '', 'name' => '', 'table' => $tablesemi, 'index' => '', 'id' => '', 'champ' => 'designation', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control haithamselect', 'type' => 'text'));
                                        ?><div id="res" champ="res" index=""  class="haithamcss" onMouseMove="this.style.visibility = 'visible';" ></div>
                                    </div>
                                </td>
                                <td style="width:10%">
                                    <?php echo $this->Form->input('quantitestock', array('readonly' => 'readonly', 'label' => '', 'div' => 'form-group', 'name' => '', 'table' => 'Lignetransfert', 'index' => '', 'id' => 'quantitestock', 'champ' => 'quantitestock', 'type' => 'text', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                </td>
                                <td style="width:10%">
                                    <?php echo $this->Form->input('sup', array('name' => '', 'id' => '', 'champ' => 'sup', 'table' => 'Lignetransfert', 'index' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'type' => 'hidden', 'class' => 'form', 'label' => '')); ?>
                                    <?php echo $this->Form->input('quantite', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Lignetransfert', 'index' => '', 'id' => '', 'champ' => 'quantite', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control verifqtetrsf')); ?>
                                </td> 
                                <td align="center" style="width:2%"><i index=""  class="fa fa-times supor" style="color: #c9302c;font-size: 22px;"></td>
                            </tr>

                            <?php
//debug($lignefactureclients);die;
                            foreach ($lignetransferts as $i => $l) {

                                $objArticle = ClassRegistry::init('Article');
                                $article = $objArticle->find('first', array('conditions' => array('Article.id' => $l['Lignebonsortiestock']['article_id']), 'recursive' => -1));

                                $obj = ClassRegistry::init('Stockdepot');
                                $stckdepot = $obj->find('first', array('conditions' => array('Stockdepot.article_id' => $l['Lignebonsortiestock']['article_id'], 'Stockdepot.depot_id' => $l['Lignebonsortiestock']['depot_id']), false));
                                ?> 
                                <tr class="cc<?php echo $i; ?>" >


                                    <td style="width:30%" champ="tdarticle" id="tdarticle<?php echo $i; ?>" >
                                        <?php //  echo $this->Form->input('article_id',array('value'=>$l['Lignebonsortiestock']['article_id'],'name' => 'data[Lignetransfert]['.$i.'][article_id]','index'=>$i,'id'=>'article_id'.$i,'label'=>'','div'=>'form-group','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control select articleidbl','required data-bv-notempty-message'=>'Champ Obligatoire','empty'=>'Veuillez Choisir !!','onchange'=>'qteart('.$i.')') );  ?>
                                        <div class="" style="display:inline; position: relative;">
                                            <?php
                                            echo $this->Form->input('article_id', array('div' => 'form-group', 'value' => $article['Article']['id'], 'name' => 'data[' . $tablesemi . '][' . $i . '][article_id]', 'table' => $tablesemi, 'index' => $i, 'id' => 'article_id' . $i, 'champ' => 'article_id', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'hidden'));
//                                            echo $this->Form->input('code', array('div' => 'form-group', 'onkeypress' => 'fuckfocus("input","' . $i . '",this.getAttribute("name"))', 'placeholder' => 'Code', 'value' => $article['Article']['code'], 'label' => '', 'name' => 'data[' . $tablesemi . '][' . $i . '][code]', 'table' => $tablesemi, 'index' => $i, 'id' => 'code' . $i, 'champ' => 'code', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control haithamcode', 'type' => 'text'));
                                            ?>
                                            <?php echo $this->Form->input('code', array('value' => $article['Article']['code'], 'div' => 'form-group', 'placeholder' => 'Code', 'label' => '', 'name' => 'data[' . $tablesemi . '][' . $i . '][code]', 'table' => $tablesemi, 'index' => $i, 'id' => 'code' . $i, 'champ' => 'code', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control codeselect', 'type' => 'text'));
                                            ?><div id="res" champ="rescode" index=""  class="haithamcss" onMouseMove="this.style.visibility = 'visible';" ></div>
                                        </div>
                                    </td>
                                    <td style="width:48%" id="tddesg<?php echo $i; ?>" index="<?php echo $i; ?>" champ="tddesg">
                                        <div class="" style="display:inline; position: relative;">
                                            <?php echo $this->Form->input('designation', array('value' => $article['Article']['name'], 'onkeypress' => 'fuckfocus("input","' . $i . '",this.getAttribute("name"))', 'div' => 'form-group', 'placeholder' => 'Designation', 'label' => '', 'name' => 'data[' . $tablesemi . '][' . $i . '][designation]', 'table' => $tablesemi, 'index' => $i, 'id' => 'designation' . $i, 'champ' => 'designation', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control haithamselect', 'type' => 'text')); ?>
                                            <div id="res<?php echo $i; ?>" champ="res" index="<?php echo $i; ?>"  class="haithamcss" onMouseMove="this.style.visibility = 'visible';" ></div>
                                        </div>
                                    </td>
                                    <td style="width:10%">
                                        <?php if ($validation == 0 || $validation == 2) echo $this->Form->input('quantitestock', array('readonly' => 'readonly', 'value' => @$stckdepot['Stockdepot']['quantite'], 'label' => '', 'div' => 'form-group', 'name' => 'data[Lignetransfert][' . $i . '][quantitestock]', 'table' => 'Lignetransfert', 'index' => $i, 'id' => 'quantitestock' . $i, 'champ' => 'quantitestock', 'type' => 'text', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                        <?php if ($validation == 1) echo $this->Form->input('quantitestock', array('readonly' => 'readonly', 'value' => @$stckdepot['Stockdepot']['quantite'] + $l['Lignebonsortiestock']['quantite'], 'label' => '', 'div' => 'form-group', 'name' => 'data[Lignetransfert][' . $i . '][quantitestock]', 'table' => 'Lignetransfert', 'index' => $i, 'id' => 'quantitestock' . $i, 'champ' => 'quantitestock', 'type' => 'text', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                    </td>
                                    <td style="width:10%">
                                        <?php echo $this->Form->input('sup', array('name' => 'data[Lignetransfert][' . $i . '][sup]', 'id' => 'sup' . $i, 'champ' => 'sup', 'table' => 'Lignetransfert', 'index' => $i, 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'type' => 'hidden', 'after' => '</div>', 'class' => 'form-control', 'label' => 'Nom')); ?>
                                        <?php echo $this->Form->input('quantite', array('value' => $l['Lignebonsortiestock']['quantite'], 'onkeypress' => 'fuckfocus("input","' . $i . '",this.getAttribute("name"))', 'label' => '', 'div' => 'form-group', 'name' => 'data[Lignetransfert][' . $i . '][quantite]', 'table' => 'Lignetransfert', 'index' => $i, 'id' => 'quantite' . $i, 'champ' => 'quantite', 'type' => 'text', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control verifqtetrsf')); ?>
                                    </td>
                                    <td style="width:2%" align="center"><i index="<?php echo $i; ?>"  class="fa fa-times supor" style="color: #c9302c;font-size: 22px;"></td>
                                </tr>



                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <input type="hidden" value="<?php echo $i; ?>" id="index" />                   
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button id="aff" type="submit" class="btn btn-primary btntrasBS">
                                <?php
                                if ($valide == 1)
                                    echo 'Valider';
                                else
                                    echo 'Enregistrer';
                                ?>
                            </button>
                            <?php if ($valide == 1) { ?>
                                <button id="aff2"  type="submit" class="btn btn-primary btntrasBS btnEnregistrerStk">Refuser</button>
                            <?php } ?>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>

