<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot;?>Tabetatarticles/add"/> <i class="fa fa-plus-circle"></i> Ajouter </a>
    </div>
    
</div>
<br><input type="hidden" id="page" value="1"/>
<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Tabetatarticles'); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="ls-editable-table table-responsive ls-table">
                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                      <thead>
	<tr>
	         
		<th><?php echo $this->Paginator->sort('Id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Clientid'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Name'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Articleid'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Article'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Qte'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Tot'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Por'); ?></th>
			<th class="actions" align="center"></th>
        </tr></thead><tbody>
	<?php foreach ($tabetatarticles as $tabetatarticle): ?>
	<tr>
		<td style="display:none"><?php echo h($tabetatarticle['Tabetatarticle']['id']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['clientid']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['name']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['articleid']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['article']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['qte']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['tot']); ?>&nbsp;</td>
		<td ><?php echo h($tabetatarticle['Tabetatarticle']['por']); ?>&nbsp;</td>
		<td align="center">
			<?php echo $this->Html->link("<button class='btn btn-xs btn-success'><i class='fa fa-search'></i></button>", array('action' => 'view', $tabetatarticle['Tabetatarticle']['id']),array('escape' => false)); ?>
			<?php echo $this->Html->link("<button class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button>", array('action' => 'edit', $tabetatarticle['Tabetatarticle']['id']),array('escape' => false)); ?>
			<?php echo $this->Form->postLink("<button class='btn btn-xs btn-danger'><i class='fa fa-trash-o'></i></button>", array('action' => 'delete', $tabetatarticle['Tabetatarticle']['id']),array('escape' => false,null), __('Veuillez vraiment supprimer cette enregistrement # %s?', $tabetatarticle['Tabetatarticle']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
                          </tbody>
	</table>
	
                                </div></div></div></div></div>	


