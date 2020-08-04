<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot; ?>Societes/index"/> <i class="fa fa-reply"></i> Retour </a>
    </div>

</div>
<br>
<div class="row" >
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Logo accueil'); ?></h3>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('Accueil', array('type' => 'file', 'autocomplete' => 'off', 'class' => 'form-horizontal ls_form', 'id' => 'defaultForm', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'fa fa-check', 'data-bv-feedbackicons-invalid' => 'fa fa-bug', 'data-bv-feedbackicons-validating' => 'fa fa-refresh')); ?>

                <div class="col-md-6">                  
                    <?php
                    echo $this->Form->input('logo_acc', array('label'=>'Logo d\'accueil','div' => 'form-group', 'between' => '<div class="col-sm-10">', 'after' => '</div>', 'class' => 'form-control', 'type' => 'file', 'multiple' => "true", 'id' => "file-3"));
                    ?></div><div class="col-md-6"><?php 
                    $existeacc = ClassRegistry::init('Accueil')->find('first');
                    if(!empty($existeacc)){
                         if(!empty($existeacc['Accueil']['logo_acc'])){
                   
                    ?>
                    <div type="file"  class ='col-sm-10' style=''><img  style="width: 500xp; height: 150px;" src="<?php echo $this->webroot; ?>files/logoaccueils/<?php echo h($existeacc['Accueil']['logo_acc']);?>"   >
                                                </div> 
                <?php    }}  ?>
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

