<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot;?>Lignecommandeclients/add"/> <i class="fa fa-plus-circle"></i> Ajouter </a>
    </div>
    
</div>
<br><input type="hidden" id="page" value="1"/>
<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Lignecommandeclients'); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="ls-editable-table table-responsive ls-table">
                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                      <thead>
	<tr>
	         
		<th><?php echo $this->Paginator->sort('Id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Commandeclient_id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Article_id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Quantite'); ?></th>
			<th class="actions" align="center"></th>
        </tr></thead><tbody>
	<?php foreach ($lignecommandeclients as $lignecommandeclient): ?>
	<tr>
		<td style="display:none"><?php echo h($lignecommandeclient['Lignecommandeclient']['id']); ?>&nbsp;</td>
		<td >
			<?php echo $this->Html->link($lignecommandeclient['Commandeclient']['id'], array('controller' => 'commandeclients', 'action' => 'view', $lignecommandeclient['Commandeclient']['id'])); ?>
		</td>
		<td >
			<?php echo $this->Html->link($lignecommandeclient['Article']['name'], array('controller' => 'articles', 'action' => 'view', $lignecommandeclient['Article']['id'])); ?>
		</td>
		<td ><?php echo h($lignecommandeclient['Lignecommandeclient']['quantite']); ?>&nbsp;</td>
		<td align="center">
			<?php echo $this->Html->link("<button class='btn btn-xs btn-success'><i class='fa fa-search'></i></button>", array('action' => 'view', $lignecommandeclient['Lignecommandeclient']['id']),array('escape' => false)); ?>
			<?php echo $this->Html->link("<button class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button>", array('action' => 'edit', $lignecommandeclient['Lignecommandeclient']['id']),array('escape' => false)); ?>
			<?php echo $this->Form->postLink("<button class='btn btn-xs btn-danger'><i class='fa fa-trash-o'></i></button>", array('action' => 'delete', $lignecommandeclient['Lignecommandeclient']['id']),array('escape' => false,null), __('Veuillez vraiment supprimer cette enregistrement # %s?', $lignecommandeclient['Lignecommandeclient']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
                          </tbody>
	</table>
	
                                </div></div></div></div></div>	


