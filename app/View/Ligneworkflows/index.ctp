<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot;?>Ligneworkflows/add"/> <i class="fa fa-plus-circle"></i> Ajouter </a>
    </div>
    
</div>
<br><input type="hidden" id="page" value="1"/>
<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Ligneworkflows'); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="ls-editable-table table-responsive ls-table">
                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                      <thead>
	<tr>
	         
		<th><?php echo $this->Paginator->sort('Id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Workflow_id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Typeworkflow_id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Personnel_id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Obligatoire'); ?></th>
			<th class="actions" align="center"></th>
        </tr></thead><tbody>
	<?php foreach ($ligneworkflows as $ligneworkflow): ?>
	<tr>
		<td style="display:none"><?php echo h($ligneworkflow['Ligneworkflow']['id']); ?>&nbsp;</td>
		<td >
			<?php echo $this->Html->link($ligneworkflow['Workflow']['id'], array('controller' => 'workflows', 'action' => 'view', $ligneworkflow['Workflow']['id'])); ?>
		</td>
		<td >
			<?php echo $this->Html->link($ligneworkflow['Typeworkflow']['name'], array('controller' => 'typeworkflows', 'action' => 'view', $ligneworkflow['Typeworkflow']['id'])); ?>
		</td>
		<td >
			<?php echo $this->Html->link($ligneworkflow['Personnel']['name'], array('controller' => 'personnels', 'action' => 'view', $ligneworkflow['Personnel']['id'])); ?>
		</td>
		<td ><?php echo h($ligneworkflow['Ligneworkflow']['obligatoire']); ?>&nbsp;</td>
		<td align="center">
			<?php echo $this->Html->link("<button class='btn btn-xs btn-success'><i class='fa fa-search'></i></button>", array('action' => 'view', $ligneworkflow['Ligneworkflow']['id']),array('escape' => false)); ?>
			<?php echo $this->Html->link("<button class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button>", array('action' => 'edit', $ligneworkflow['Ligneworkflow']['id']),array('escape' => false)); ?>
			<?php echo $this->Form->postLink("<button class='btn btn-xs btn-danger'><i class='fa fa-trash-o'></i></button>", array('action' => 'delete', $ligneworkflow['Ligneworkflow']['id']),array('escape' => false,null), __('Veuillez vraiment supprimer cette enregistrement # %s?', $ligneworkflow['Ligneworkflow']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
                          </tbody>
	</table>
	
                                </div></div></div></div></div>	


