<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot;?>Deviprospects/index"/> <i class="fa fa-reply"></i> Retour </a>
    </div>
    
</div>
<br>
<div class="row" >
                        <div class="col-md-12" >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Ajout Suggestion Commande'); ?></h3>
                                </div>
                                <div class="panel-body">
        <?php echo $this->Form->create('Deviprospect',array('autocomplete' => 'off','class'=>'form-horizontal ls_form','id'=>'','data-bv-message'=>'This value is not valid','data-bv-feedbackicons-valid'=>'fa fa-check','data-bv-feedbackicons-invalid'=>'fa fa-bug','data-bv-feedbackicons-validating'=>'fa fa-refresh')); ?>

            <div class="col-md-6">                  
              	<?php

		echo $this->Form->input('fournisseur_id',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'fc','class'=>'form-control select  artfournisseur','empty'=>'Veuillez Choisir !!') );
                ?>
              <div class="fournisseurexterne" style="display:none;" >
                  <div class='form-group' >	
                    <label class='col-md-2 control-label' id="labeldevise" ><?php echo __('Importation'); ?></label>	
                                  
			
                                  <div class='col-sm-10' champ="divimpor" id="divimpor" >     </div>
			
		
                                 
                  </div> 
                <?php
		//echo $this->Form->input('importation_id',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'importation_id','class'=>'form-control select get_tr_coe') );		
                echo $this->Form->input('tr',array('label'=>'Cours Devise','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'tr','class'=>'form-control ','type'=>'text') );
                echo $this->Form->input('coe',array('label'=>'Coefficient','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'coe','class'=>'form-control ','type'=>'text') );
                echo $this->Form->input('coefficient',array('value'=>1,'div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'coef','class'=>'form-control calculcout','type'=>'hidden') );
		?>  
                </div> 
                </div>
                <div class="col-md-6"><?php
		echo $this->Form->input('numero',array('readonly'=>'readonly','value'=>$mm,'div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'numero','class'=>'form-control') );
		echo $this->Form->input('depot_id',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'depot_id','class'=>'form-control','empty'=>'Veuillez Choisir !!') );		
		echo $this->Form->input('date',array('div'=>'form-group','value'=>date("d/m/Y"),'type'=>'text','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control datePickerOnly') );		
		echo $this->Form->input('Controller',array('value'=>'Bonreception','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','id'=>'controller','type'=>'hidden') );
	         ?>
                </div>  
                <input type="hidden" value="" id="typefrs" />     
                                      <!-- Autre ligne reception-->
<!--                   <div class="row ligne fournisseurinterne" >
                        
                        <div class="col-md-12" >
                            <div class="panel panel-default" >
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Ligne de Suggestion Commande'); ?></h3>
                                    <a class="btn btn-danger ajouterligne_reception" table='addtable' index='index'  tr="tr" style="
                                    float: right; 
                                    position: relative;
                                    top: -25px;
                                "><i class="fa fa-plus-circle"  ></i> Ajouter ligne</a>
                                </div>
                                <div class="panel-body" >
                                <table class="table table-bordered table-striped table-bottomless" id="addtable" style="width:100%" align="center" >
                                <thead>
                                <tr>
                                    <td align="center" width="38%"  nowrap="nowrap">Article</td>
                                    <td align="center" width="10%" nowrap="nowrap"> Qte </td>
                                    <td align="center" width="10%" nowrap="nowrap">Prix</td>    
                                    <td align="center" width="10%" nowrap="nowrap">Remise %</td>       
                                    <td align="center" width="10%" nowrap="nowrap">Fodec % </td>
                                    <td align="center" width="10%" nowrap="nowrap">TVA % </td>    
                                    <td align="center" width="2%"></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="tr" style="display:none;" >
                                    <td  champ="tdarticle" id="tdarticle">
                                        <?php echo $this->Form->input('article_id',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'article_id','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'idarticle testligneinv','empty'=>'Veuillez Choisir !!') );?>

                                    </td>
                                   
                                  
                                    <td >
                                 <?php echo $this->Form->input('sup',array('name'=>'','id'=>'','champ'=>'sup','table'=>'Lignereception','index'=>'','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','type'=>'hidden','class'=>'form','label'=>'') );?>

                                        <?php echo $this->Form->input('quantite',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'quantite','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php 
                                     echo $this->Form->input('prixhtva',array('value'=>'','div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'prixhtva','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                     <?php //echo $this->Form->input('prix',array('type'=>'hidden','div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'prixx','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php
                                     echo $this->Form->input('remise',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'remise','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php  echo $this->Form->input('fodec',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'fodec','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('tva',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'tva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                 
                                      <td align="center"><i index=""  class="fa fa-times suporfacturefrs" style="color: #c9302c;font-size: 22px;"></td>
                                </tr>
                                
                                <tr class="cc" >
                                    <td  champ="tdarticle" id="tdarticle0" >
                                        <?php echo $this->Form->input('article_id',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][article_id]','table'=>'Lignereception','index'=>'','id'=>'article_id0','champ'=>'article_id','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testligneinv idarticle select','onchange'=>'tvaart(0) testligneinv','empty'=>'Veuillez Choisir !!') );?>
               
                                    </td>
                                    
                                     <td >
                                     <?php echo $this->Form->input('sup',array('name'=>'data[Lignereception][0][sup]','id'=>'sup0','champ'=>'sup','table'=>'Lignereception','index'=>'0','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'hidden','after'=>'</div>','class'=>'form-control','label'=>'Nom') );?>
                                     
                                        <?php echo $this->Form->input('quantite',array('label'=>'','div'=>'form-group', 'name' => 'data[Lignereception][0][quantite]','table'=>'Lignereception','index'=>'0','id'=>'quantite0','champ'=>'quantite','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('prixhtva',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][prixhtva]','table'=>'Lignereception','index'=>'0','id'=>'prixhtva0','champ'=>'prixhtva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                     <?php //echo $this->Form->input('prix',array('type'=>'hidden','div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][prix]','table'=>'Lignereception','index'=>'0','id'=>'prixx0','champ'=>'prix','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php
                                     echo $this->Form->input('remise',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][remise]','table'=>'Lignereception','index'=>'0','id'=>'remise0','champ'=>'remise','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php  echo $this->Form->input('fodec',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][fodec]','table'=>'Lignereception','index'=>'0','id'=>'fodec0','champ'=>'fodec','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('tva',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][tva]','table'=>'Lignereception','index'=>'0','id'=>'tva0','champ'=>'tva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                    <td align="center"><i index="0"  class="fa fa-times suporfacturefrs" style="color: #c9302c;font-size: 22px;"></td>
                                </tr>
                                </tbody>
                                </table>
              	                <input type="hidden" value="0" id="index" />
                                </div>
                            </div>
                        </div>                
                    </div> -->
                                      
                   <div class="row ligne fournisseurexterne"  >
                        
                        <div class="col-md-12" >
                            <div class="panel panel-default" >
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Ligne de Suggestion Commande'); ?></h3>
                                   
                                </div>
                                <div class="panel-body" >
                                <table class="table table-bordered table-striped table-bottomless" id="addtableext" style="width:100%" align="center" >
                                <thead>
                                <tr>
                                    <td align="center" width="30%"  nowrap="nowrap">Article</td>
                                    <td align="center" width="9%" nowrap="nowrap"> Réference </td>
                                    <td align="center" width="8%" nowrap="nowrap"> Qte </td>
                                    <td align="center" width="8%" nowrap="nowrap">Prix</td>  
                                    <td align="center" width="8%" nowrap="nowrap">CR TTC</td>  
                                    <td align="center" width="8%" nowrap="nowrap">TVA % </td>    
                                    <td align="center" width="1%"></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="tr" style="display:none;" >
                                    <td  champ="tdarticle" id="tdarticlee">
                                        <?php echo $this->Form->input('article_id',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'article_id','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'idarticle testligneinv','empty'=>'Veuillez Choisir !!') );?>
                                 
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('reference',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'reference','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control ') );?>
                                    </td>
                                    
                                    <td >
                                      <?php echo $this->Form->input('sup',array('name'=>'','id'=>'','champ'=>'sup','table'=>'Lignereception','index'=>'','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','type'=>'hidden','class'=>'form','label'=>'') );?>
                                  
                                        <?php echo $this->Form->input('quantite',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'quantite','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculcout') );?>
                                    </td>
                                    <td >
                                     <?php 
                                     echo $this->Form->input('prixhtva',array('value'=>'','div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'prix','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculcout') );?>
                                    </td>
                                     <td >
                                     <?php 
                                     echo $this->Form->input('cout de revien',array('value'=>'','div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'prixhtva','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                   
                                    <td >
                                     <?php echo $this->Form->input('tva',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Lignereception','index'=>'','id'=>'','champ'=>'tva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                 
                                      <td align="center"><i index=""  class="fa fa-times suporfacturefrs" style="color: #c9302c;font-size: 22px;"></td>
                                </tr>
                                
                                <tr class="cc" >
                                    <td  champ="tdarticle" id="tdarticle0" >
                                        <?php echo $this->Form->input('article_id',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][article_id]','table'=>'Lignereception','index'=>'','id'=>'article_id0','champ'=>'article_id','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testligneinv idarticle select','onchange'=>'tvaart(0) testligneinv','empty'=>'Veuillez Choisir !!') );?>
                                  
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('reference',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][reference]','table'=>'Lignereception','index'=>'0','id'=>'reference0','champ'=>'reference','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control ') );?>
                                    </td>
                                     <td >
                                     <?php echo $this->Form->input('sup',array('name'=>'data[Lignereception][0][sup]','id'=>'sup0','champ'=>'sup','table'=>'Lignereception','index'=>'0','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'hidden','after'=>'</div>','class'=>'form-control','label'=>'Nom') );?>
                                    
                                        <?php echo $this->Form->input('quantite',array('label'=>'','div'=>'form-group', 'name' => 'data[Lignereception][0][quantite]','table'=>'Lignereception','index'=>'0','id'=>'quantite0','champ'=>'quantite','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control testlr calculcout') );?>
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('prixhtva',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][prix]','table'=>'Lignereception','index'=>'0','id'=>'prix0','champ'=>'prixhtva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculcout') );?>
                                    </td>
                                     <td >
                                     <?php echo $this->Form->input('cout de revien',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][prixhtva]','table'=>'Lignereception','index'=>'0','id'=>'prixhtva0','champ'=>'prixhtva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                    <td >
                                     <?php echo $this->Form->input('tva',array('div'=>'form-group','label'=>'', 'name' => 'data[Lignereception][0][tva]','table'=>'Lignereception','index'=>'0','id'=>'tva0','champ'=>'tva','type'=>'text','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control calculefacfournisseur') );?>
                                    </td>
                                    
                                    <td align="center"><i index="0"  class="fa fa-times suporfacturefrs" style="color: #c9302c;font-size: 22px;"></td>
                                </tr>
                                </tbody>
                                </table>
              	<input type="hidden" value="0" id="index" />
</div>
                            </div>
                        </div>
                        <a class="btn btn-danger ajouterligne_reception" table='addtableext' index='index'  tr="tr" style="
                                   float: left; 
                                   position: relative;
                                   top: -55px;
                                   left: 15px;
                                "><i class="fa fa-plus-circle"  ></i> Ajouter ligne</a>
</div>                     
                              
                                                     
                                      
                <div class="col-md-6">                  
              	<?php
		echo $this->Form->input('montantdevise',array('label'=>'Montant devise','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'text','readonly'=>'readonly','after'=>'</div>','id'=>'montantdevise','class'=>'form-control') );
		
                ?>
                </div>
                <div class="col-md-6"><?php
		echo $this->Form->input('totalht',array('label'=>'Total HT','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'text','readonly'=>'readonly','after'=>'</div>','id'=>'Total_HT','class'=>'form-control ') );
	        echo $this->Form->input('tva',array('label'=>'TVA','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'text','readonly'=>'readonly','after'=>'</div>','id'=>'tva','class'=>'form-control') );
                echo $this->Form->input('totalttc',array('label'=>'Total TTC','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'text','readonly'=>'readonly','after'=>'</div>','id'=>'Total_TTC','class'=>'form-control') );
	        ?>
                </div>  
                      
<div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                                <button type="submit" class="btn btn-primary  ">Enregistrer</button>
                                            </div>
                                        </div>
<?php echo $this->Form->end();?>
</div>
                            </div>
                        </div
</div>
</div>
