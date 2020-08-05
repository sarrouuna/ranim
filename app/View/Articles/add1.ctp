<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot; ?>Articles/index"/> <i class="fa fa-reply"></i> Retour </a>
    </div>

</div>
<br>
<div class="row" >
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Ajout Article'); ?></h3>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('Article', array('autocomplete' => 'off', 'class' => 'form-horizontal ls_form', 'id' => 'defaultForm', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'fa fa-check', 'data-bv-feedbackicons-invalid' => 'fa fa-bug', 'data-bv-feedbackicons-validating' => 'fa fa-refresh', 'enctype' => 'multipart/form-data')); ?>

                <div class="col-md-6">                  
                    <?php
                    echo $this->Form->input('famille_id', array('div' => 'form-group', 'between' => '<div class="col-sm-10">', 'id' => 'famille_id', 'after' => '</div>', 'class' => 'form-control select getsousfamille', 'empty' => 'Veuillez Choisir !!'));
                    ?>




                    <div class='form-group'>	
                        <label class='col-md-2 control-label'><?php echo __('Sous Famille'); ?></label>	


                        <div class='col-sm-10' champ="divsousfamille" id="divsousfamille" >     </div>



                    </div>                
                    <div class='form-group'>	
                        <label class='col-md-2 control-label'><?php echo __('Sous sous Famille'); ?></label>	


                        <div class='col-sm-10' champ="divsoussousfamille" id="divsoussousfamille">     </div>



                    </div> 


                    <?php
                    echo $this->Form->input('unite_id', array('label' => 'Unit&egrave;', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('code', array('id' => 'code', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control testarticleexiste'));
                    echo $this->Form->input('codeinter', array('label' => 'code NGP', 'id' => 'code internationnal', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control testarticleexiste'));
                    echo $this->Form->input('name', array('label' => 'D&egrave;signation', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    echo $this->Form->input('typeetatarticle_id', array('label' => 'Etat Article', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'id' => 'typeetatarticle_id', 'after' => '</div>', 'class' => 'form-control select ', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('typestockarticle_id', array('label' => 'Etat Stock', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'id' => 'typestockarticle_id', 'after' => '</div>', 'class' => 'form-control select ', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('tag_id', array('multiple' => 'multiple', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('devise_id', array('id' => 'devise_id', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'empty' => 'Veuillez Choisir !!'));
                    echo $this->Form->input('homologation', array('label' => 'Photo', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'file', 'multiple' => "true", 'id' => "file-3"));
                    ?></div> 
                <div class="col-md-6"><?php
//                    echo $this->Form->input('stockalert', array('label' => 'Stock Alert', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
//                    echo $this->Form->input('stockmin', array('label' => 'Stock Min', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
//                    echo $this->Form->input('stockmax', array('label' => 'Stock Max', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
//                    echo $this->Form->input('stockoptimal', array('label' => 'Stock Optimal', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
                    echo $this->Form->input('prixachatdevise', array('label' => 'Prix D\'achat en devise', 'type' => 'text', 'id' => 'prixachatdevise', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control getcoutderevient champsreadonly'));
                    echo $this->Form->input('tauxchange', array('value' => 1, 'label' => 'Taux De Change', 'type' => 'text', 'id' => 'tauxchange', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control getcoutderevient'));
                    echo $this->Form->input('coefficient', array('value' => 1, 'label' => 'Coefficient', 'type' => 'text', 'id' => 'coefficient', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control getcoutderevient'));
                   
                    echo $this->Form->input('prixav_remise', array('champ'=>'prixav_remise','label' => 'Prix achat avant remise', 'type' => 'text', 'id' => 'prixav_remise', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control  calculcoutrevient champsreadonly'));
                    echo $this->Form->input('remise', array('champ'=>'remise','label' => 'Remise', 'type' => 'text', 'id' => 'remise', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculcoutrevient champsreadonly'));
                    echo $this->Form->input('coutrevient', array('champ'=>'coutrevient','label' => 'Prix achat net', 'type' => 'text', 'id' => 'coutrevient', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculcoutrevient champsreadonly'));
                  
                    echo $this->Form->input('marge', array('readonly', 'label' => 'Marge %', 'type' => 'text', 'id' => 'margepourcentage', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculmarge calculputtc'));
                    echo $this->Form->input('prixvente', array('readonly', 'label' => 'Prix De Vente HT', 'type' => 'text', 'id' => 'prixvente', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculmargev calculmargevente calculputtc'));
//                    echo $this->Form->input('margegros', array('label' => 'Marge % en Gros', 'type' => 'text', 'id' => 'margepourcentagegros', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculmargegros'));
//                    echo $this->Form->input('prixventegros', array('label' => 'Prix De Vente en Gros', 'type' => 'text', 'id' => 'prixventegros', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculmargevgros'));
                    echo $this->Form->input('tva', array('readonly', 'id' => 'tva', 'label' => 'TVA', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control calculputtc'));
                    echo $this->Form->input('prixuttc', array('readonly', 'label' => 'Prix TTC', 'type' => 'text', 'id' => 'prixuttc', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control'));
//                    echo $this->Form->input('remise', array('label' => 'Remise Caisse', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'text'));
                    echo $this->Form->input('remise_vente', array('readonly', 'id' => 'remise_vente', 'label' => 'Remise Vente', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'text'));
                    echo $this->Form->input('remise_transfert', array('label' => 'Remise Transfert', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'text'));
                    ?>


                </div> 




                <!-- Autre Fournisseur-->
                <div class="row ligne" >

                    <div class="col-md-12" >
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo __('Article Fournisseur'); ?></h3>
                                <a class="btn btn-danger ajouterligne_w" table='addtable' index='index' style="
                                   float: right; 
                                   position: relative;
                                   top: -25px;
                                   "><i class="fa fa-plus-circle"  ></i> Ajouter fournisseur</a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-bottomless" id="addtable" style="width:90%" align="center" >
                                    <thead>
                                        <tr>
                                            <td align="center" nowrap="nowrap">Fournisseur</td>
                                            <td align="center" nowrap="nowrap">Prix</td>
                                            <td align="center" nowrap="nowrap">Reference</td>
                                            <td align="center" nowrap="nowrap">Nbr Jours De Livrison</td>
                                            <td align="center"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr" style="display:none;">
                                            <td style="width:25%">
                                                <?php echo $this->Form->input('sup', array('name' => '', 'id' => '', 'champ' => 'sup', 'table' => 'Articlefournisseur', 'index' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'type' => 'hidden', 'class' => 'form', 'label' => '')); ?>
                                                <?php echo $this->Form->input('fournisseur_id', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Articlefournisseur', 'index' => '', 'id' => '', 'champ' => 'fournisseur_id', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => '', 'empty' => 'Veuillez Choisir !!')); ?>
                                            </td>
                                            <td style="width:25%">
                                                <?php echo $this->Form->input('prix', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Articlefournisseur', 'index' => '', 'id' => '', 'champ' => 'prix', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>
                                            <td style="width:25%">
                                                <?php echo $this->Form->input('reference', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Articlefournisseur', 'index' => '', 'id' => '', 'champ' => 'reference', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>
                                            <td style="width:24%">
                                                <?php echo $this->Form->input('nbrjourliv', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Articlefournisseur', 'index' => '', 'id' => '', 'champ' => 'nbrjourliv', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>


                                            <td align="center"><i index=""  class="fa fa-times supor" style="color: #c9302c;font-size: 22px;"></td>
                                        </tr>

                                        <tr>
                                            <td style="width:25%">
                                                <?php echo $this->Form->input('sup', array('name' => 'data[Articlefournisseur][0][sup]', 'id' => 'sup0', 'champ' => 'sup', 'table' => 'Articlefournisseur', 'index' => '0', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'type' => 'hidden', 'after' => '</div>', 'class' => 'form-control', 'label' => 'Nom')); ?>
                                                <?php echo $this->Form->input('fournisseur_id', array('div' => 'form-group', 'label' => '', 'name' => 'data[Articlefournisseur][0][fournisseur_id]', 'table' => 'Articlefournisseur', 'index' => '0', 'id' => 'fournisseur_id0', 'champ' => 'fournisseur_id', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control', 'empty' => 'Veuillez choisir !!')); ?>
                                            </td>
                                            <td style="width:25%">
                                                <?php echo $this->Form->input('prix', array('label' => '', 'div' => 'form-group', 'name' => 'data[Articlefournisseur][0][prix]', 'table' => 'Articlefournisseur', 'index' => '0', 'id' => 'prix0', 'champ' => 'prix', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>
                                            <td style="width:25%">
                                                <?php echo $this->Form->input('reference', array('name' => 'data[Articlefournisseur][0][reference]', 'id' => 'reference0', 'table' => 'Articlefournisseur', 'index' => '0', 'champ' => 'reference', 'label' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>
                                            <td style="width:24%">
                                                <?php echo $this->Form->input('nbrjourliv', array('name' => 'data[Articlefournisseur][0][nbrjourliv]', 'id' => 'nbrjourliv0', 'table' => 'Articlefournisseur', 'index' => '0', 'champ' => 'nbrjourliv', 'label' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>

                                            <td align="center"><i index="0"  class="fa fa-times supor" style="color: #c9302c;font-size: 22px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" value="0" id="index" />
                            </div>
                        </div>
                    </div>                
                </div> 


                <!-- Autre client-->
                <div class="row ligne" >

                    <div class="col-md-12" >
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo __('Remise Client'); ?></h3>
                                <a class="btn btn-danger ajouterligne_c" table='addtablec' index='indexc' style="
                                   float: right; 
                                   position: relative;
                                   top: -25px;
                                   "><i class="fa fa-plus-circle"  ></i> Ajouter Client</a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-bottomless" id="addtablec" style="width:90%" align="center" >
                                    <thead>
                                        <tr>
                                            <td align="center" nowrap="nowrap">Client</td>
                                            <td align="center" nowrap="nowrap">Remise</td>
                                            <td align="center"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr" style="display:none;">
                                            <td style="width:48%">
                                                <?php echo $this->Form->input('sup', array('name' => '', 'id' => '', 'champ' => 'sup', 'table' => 'Articleclient', 'index' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'type' => 'hidden', 'class' => 'form', 'label' => '')); ?>
                                                <?php echo $this->Form->input('client_id', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Articleclient', 'index' => '', 'id' => '', 'champ' => 'client_id', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => '', 'empty' => 'Veuillez Choisir !!')); ?>
                                            </td>

                                            <td style="width:45%">
                                                <?php echo $this->Form->input('remise', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Articleclient', 'index' => '', 'id' => '', 'champ' => 'remise', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>


                                            <td align="center" style="width:4%"><i index=""  class="fa fa-times suporc" style="color: #c9302c;font-size: 22px;"></td>
                                        </tr>

                                        <tr>
                                            <td style="width:48%">
                                                <?php echo $this->Form->input('sup', array('name' => 'data[Articleclient][0][sup]', 'id' => 'sup0', 'champ' => 'sup', 'table' => 'Articleclient', 'index' => '0', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'type' => 'hidden', 'after' => '</div>', 'class' => 'form-control', 'label' => 'Nom')); ?>
                                                <?php echo $this->Form->input('client_id', array('div' => 'form-group', 'label' => '', 'name' => 'data[Articleclient][0][client_id]', 'table' => 'Articleclient', 'index' => '0', 'id' => 'fournisseur_id0', 'champ' => 'client_id', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control', 'empty' => 'Veuillez choisir !!')); ?>
                                            </td>
                                            <td style="width:45%">
                                                <?php //echo $this->Form->input('remise',array('name'=>'data[Articleclient][0][remise]','id'=>'remise0','table'=>'Articleclient','index'=>'0','champ'=>'remise','label'=>'','div'=>'form-group','between'=>'<div class="coel-sm-12">','after'=>'</div>','class'=>'form-control') );  ?>
                                                <?php echo $this->Form->input('remise', array('div' => 'form-group', 'label' => '', 'name' => 'data[Articleclient][0][remise]', 'id' => 'remise0', 'table' => 'Articleclient', 'index' => '0', 'champ' => 'remise', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>

                                            <td align="center" style="width:4%"><i index="0"  class="fa fa-times suporc" style="color: #c9302c;font-size: 22px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" value="0" id="indexc" />
                            </div>
                        </div>
                    </div>                
                </div> 



                <div class="row ligne" >

                    <div class="col-md-12" >
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo __('Remise Par Famille Client'); ?></h3>
                                <a class="btn btn-danger ajouterligne_famille" table='addtablef' index='indexf' style="
                                   float: right; 
                                   position: relative;
                                   top: -25px;
                                   "><i class="fa fa-plus-circle"  ></i> Ajouter Famille</a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-bottomless" id="addtablef" style="width:90%" align="center" >
                                    <thead>
                                        <tr>
                                            <td align="center" nowrap="nowrap">Famille Client</td>
                                            <td align="center" nowrap="nowrap">Remise</td>
                                            <td align="center"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr" style="display:none;">
                                            <td style="width:48%">
                                                <?php echo $this->Form->input('sup', array('name' => '', 'id' => '', 'champ' => 'sup', 'table' => 'Remiseartfamille', 'index' => '', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'type' => 'hidden', 'class' => 'form', 'label' => '')); ?>
                                                <?php echo $this->Form->input('familleclient_id', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Remiseartfamille', 'index' => '', 'id' => '', 'champ' => 'famille_id', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => '', 'empty' => 'Veuillez Choisir !!')); ?>
                                            </td>

                                            <td style="width:45%">
                                                <?php echo $this->Form->input('remise', array('div' => 'form-group', 'label' => '', 'name' => '', 'table' => 'Remiseartfamille', 'index' => '', 'id' => '', 'champ' => 'remise', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>


                                            <td align="center" style="width:4%"><i index=""  class="fa fa-times suporf" style="color: #c9302c;font-size: 22px;"></td>
                                        </tr>

                                        <tr>
                                            <td style="width:48%">
                                                <?php echo $this->Form->input('sup', array('name' => 'data[Remiseartfamille][0][sup]', 'id' => 'sup0', 'champ' => 'sup', 'table' => 'Remiseartfamille', 'index' => '0', 'div' => 'form-group', 'between' => '<div class="col-sm-10">', 'type' => 'hidden', 'after' => '</div>', 'class' => 'form-control', 'label' => 'Nom')); ?>
                                                <?php echo $this->Form->input('familleclient_id', array('div' => 'form-group', 'label' => '', 'name' => 'data[Remiseartfamille][0][familleclient_id]', 'table' => 'Remiseartfamille', 'index' => '0', 'id' => 'familleclient_id0', 'champ' => 'familleclient_id', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control', 'empty' => 'Veuillez choisir !!')); ?>
                                            </td>
                                            <td style="width:45%">
                                                <?php //echo $this->Form->input('remise',array('name'=>'data[Articleclient][0][remise]','id'=>'remise0','table'=>'Articleclient','index'=>'0','champ'=>'remise','label'=>'','div'=>'form-group','between'=>'<div class="coel-sm-12">','after'=>'</div>','class'=>'form-control') );  ?>
                                                <?php echo $this->Form->input('remise', array('div' => 'form-group', 'label' => '', 'name' => 'data[Remiseartfamille][0][remise]', 'id' => 'remise0', 'table' => 'Remiseartfamille', 'index' => '0', 'champ' => 'remise', 'between' => '<div class="col-sm-12">', 'after' => '</div>', 'class' => 'form-control')); ?>
                                            </td>

                                            <td align="center" style="width:4%"><i index="0"  class="fa fa-times suporf" style="color: #c9302c;font-size: 22px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" value="0" id="indexf" />
                            </div>
                        </div>
                    </div>                
                </div>               


                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

