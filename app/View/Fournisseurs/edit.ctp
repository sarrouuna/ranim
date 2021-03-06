<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot;?>Fournisseurs/index"/> <i class="fa fa-reply"></i> Retour </a>
    </div>
    
</div>
<br>
<div class="row" >
                        <div class="col-md-12" >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Modification Fournisseur'); ?></h3>
                                </div>
                                <div class="panel-body">
        <?php echo $this->Form->create('Fournisseur',array('autocomplete' => 'off','class'=>'form-horizontal ls_form','id'=>'defaultForm','data-bv-message'=>'This value is not valid','data-bv-feedbackicons-valid'=>'fa fa-check','data-bv-feedbackicons-invalid'=>'fa fa-bug','data-bv-feedbackicons-validating'=>'fa fa-refresh','enctype' => 'multipart/form-data')); ?>

            <div class="col-md-6">                  
              	<?php
		echo $this->Form->input('id',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
		echo $this->Form->input('famillefournisseur_id',array('empty'=>'Veuillez Choisir !!','label'=>'Famille Fournisseur','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
		?>
                <div class="form-group">
                <div class="form-group col-sm-2">    
                <label class='col-md-2 control-label' >
                Devise
                </label></div>
                    <div class="form-group col-sm-2"></div> 
                     <div class="form-group col-sm-2"></div> 
                <div class="form-group col-sm-10">
                <select multiple name='data[Fournisseur][devise_id][]' champ='devise_id' id='devise_id' class=' form-control select' onchange='' >                
                    <option value="" >Veuillez choisir !!</option> 
                        <?php  foreach ($devisess as $ip=>$cp){ ?>
                            <option value="<?php echo $cp['Devise']['id'] ?>"<?php foreach ($devises as $ic=>$cc){ if($cc['Devise']['id']==$cp['Devise']['id']){?> selected="selected" <?php  }  }?> > <?php echo $cp['Devise']['name']  ?></option>
                        <?php } ?>
                </select>
                </div> 
                </div> 
       <?php    //echo $this->Form->input('devise_id',array('multiple'=>'multiple','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control','empty'=>'Veuillez Choisir !!') );
                echo $this->Form->input('code',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
		echo $this->Form->input('name',array('label'=>'Raison social','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
		echo $this->Form->input('adresse',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
		echo $this->Form->input('tel',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
                echo $this->Form->input('abreviation',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
	        echo $this->Form->input('activite',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
	        echo $this->Form->input('siteweb',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
                
                ?></div><div class="col-md-6"><?php
                echo $this->Form->input('pay_id',array('label'=>'pays','empty'=>'choix','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
	        echo $this->Form->input('zone_id',array('empty'=>'choix','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
                echo $this->Form->input('fax',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
		echo $this->Form->input('mail',array('div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
	        echo $this->Form->input('matriculefiscale',array('label'=>'Matricule fiscale','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control','empty'=>'Veuillez Choisir !!') );
                echo $this->Form->input('registrecommerce',array('label'=>'Registre de  commerce','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control') );
                echo $this->Form->input('registrecommercef',array('label'=>'','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control','type'=>'file','multiple'=>"true") );
                echo $this->Form->input('patente',array('label'=>'Patente','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','class'=>'form-control','type'=>'file','multiple'=>"true") );             
            	?>
  </div>   
                                     <!-- Autre contact-->
                   <div class="row ligne" >
                        
                        <div class="col-md-12" >
                            <div class="panel panel-default" >
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Contacts'); ?></h3>
                                    <a class="btn btn-danger ajouterligne_w" table='addtable' index='index' style="
                                    float: right; 
                                    position: relative;
                                    top: -25px;
                                "><i class="fa fa-plus-circle"  ></i> Ajouter contact</a>
                                </div>
                                <div class="panel-body">
                                <table class="table table-bordered table-striped table-bottomless" id="addtable" style="width:90%" align="center" >
                                <thead>
                                <tr>
                                    <td align="center" nowrap="nowrap">Nom prénom</td>
                                    <td align="center" nowrap="nowrap">Fonction</td>
                                    <td align="center" nowrap="nowrap">Tel</td>
                                    <td align="center" nowrap="nowrap">Mail</td>
                                    <td align="center"></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="tr" style="display:none;">
                                    <td style="width:24%">
                                        <?php echo $this->Form->input('sup',array('name'=>'','id'=>'','champ'=>'sup','table'=>'Contact','index'=>'','div'=>'form-group','between'=>'<div class="col-sm-10">','after'=>'</div>','type'=>'hidden','class'=>'form','label'=>'') );?>
                                        <?php echo $this->Form->input('name',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Contact','index'=>'','id'=>'','champ'=>'name','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                    <td style="width:24%">
                                        <?php echo $this->Form->input('fonction',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Contact','index'=>'','id'=>'','champ'=>'fonction','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                    <td style="width:24%">
                                        <?php echo $this->Form->input('tel',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Contact','index'=>'','id'=>'','champ'=>'tel','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                   <td style="width:24%">
                                        <?php echo $this->Form->input('mail',array('div'=>'form-group','label'=>'', 'name' => '','table'=>'Contact','index'=>'','id'=>'','champ'=>'mail','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                   
                                
                                    <td align="center"><i index=""  class="fa fa-times supor" style="color: #c9302c;font-size: 22px;"></td>
                                </tr>
                                <?php
                               foreach ($contacts as $i=>$contact){
                                ?>  
                                <tr>
                                    <td style="width:24%">
                                        <?php echo $this->Form->input('id',array('value'=>$contact['Contact']['id'],'name'=>'data[Contact]['.$i.'][id]','id'=>'id'.$i,'champ'=>'id','table'=>'Contact','index'=>$i,'div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'hidden','after'=>'</div>','class'=>'form-control','label'=>'Nom') );?>
                                        <?php echo $this->Form->input('sup',array('name'=>'data[Contact]['.$i.'][sup]','id'=>'sup0','champ'=>'sup','table'=>'Contact','index'=>'0','div'=>'form-group','between'=>'<div class="col-sm-10">','type'=>'hidden','after'=>'</div>','class'=>'form-control','label'=>'Nom') );?>
                                        <?php echo $this->Form->input('name',array('value'=>$contact['Contact']['name'],'label'=>'','div'=>'form-group', 'name' => 'data[Contact]['.$i.'][name]','table'=>'Contact','index'=>$i,'id'=>'name'.$i,'champ'=>'name','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                    <td style="width:24%">
                                        <?php echo $this->Form->input('fonction',array('value'=>$contact['Contact']['fonction'],'label'=>'','div'=>'form-group', 'name' => 'data[Contact]['.$i.'][fonction]','table'=>'Contact','index'=>$i,'id'=>'fonction'.$i,'champ'=>'fonction','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                    <td style="width:24%">
                                        <?php echo $this->Form->input('tel',array('value'=>$contact['Contact']['tel'],'name'=>'data[Contact]['.$i.'][tel]','id'=>'tel'.$i,'table'=>'Contact','index'=>$i,'champ'=>'tel','label'=>'','div'=>'form-group','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                   <td style="width:24%">
                                        <?php echo $this->Form->input('mail',array('value'=>$contact['Contact']['mail'],'label'=>'','div'=>'form-group', 'name' => 'data[Contact]['.$i.'][mail]','table'=>'Contact','index'=>$i,'id'=>'mail'.$i,'champ'=>'mail','between'=>'<div class="col-sm-12">','after'=>'</div>','class'=>'form-control') );?>
                                    </td>
                                    <td align="center"><i index="<?php echo $i; ?>"  class="fa fa-times supor" style="color: #c9302c;font-size: 22px;"></td>

                                </tr>
                                <?php } ?> 
                                </tbody>
                                </table>
              	<input type="hidden" value=<?php echo @$i; ?>  id="index" />
</div>
                            </div>
                        </div>                
</div>     
<div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                                <button type="submit" class="btn btn-primary testdevisefrs">Enregistrer</button>
                                            </div>
                                        </div>
<?php echo $this->Form->end();?>
</div>
                            </div>
                        </div>
</div>

