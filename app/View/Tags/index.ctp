

 <?php $add="";$edit="";$delete="";$imprimer=""; 
$lien=  CakeSession::read('lien_stock');
//debug($lien_stock);die;
foreach($lien as $k=>$liens){
    //debug($liens);die;
	if(@$liens['lien']=='tags'){
		$add=$liens['add'];
		$edit=$liens['edit'];
		$delete=$liens['delete'];
		$imprimer=$liens['imprimer'];
	}
} 
if($add==1){?>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn btn-danger" href="<?php echo $this->webroot;?>Tags/add"/> <i class="fa fa-plus-circle"></i> Ajouter </a>
    </div>
    
</div>
<?php }?>
<br><input type="hidden" id="page" value="1"/>
<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo __('Tags'); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="ls-editable-table table-responsive ls-table">
                  <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                      <thead>
	<tr>
	         
		<th style="display: none;"><?php echo $this->Paginator->sort('Id'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Code'); ?></th>
	         
		<th><?php echo $this->Paginator->sort('Désignation'); ?></th>
			<th class="actions" align="center"></th>
        </tr></thead><tbody>
	<?php foreach ($tags as $tag): ?>
	<tr>
		<td style="display:none"><?php echo h($tag['Tag']['id']); ?></td>
		<td ><?php echo h($tag['Tag']['code']); ?></td>
		<td ><?php echo h($tag['Tag']['name']); ?></td>
		<td align="center">
			<?php echo $this->Html->link("<button class='btn btn-xs btn-success'><i class='fa fa-search'></i></button>", array('action' => 'view', $tag['Tag']['id']),array('escape' => false)); ?>
                        <?php if($delete==1) {  echo $this->Html->link("<button class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></button>", array('action' => 'edit', $tag['Tag']['id']),array('escape' => false)); } ?>
                        <?php if($delete==1) {  echo $this->Form->postLink("<button class='btn btn-xs btn-danger'><i class='fa fa-trash-o'></i></button>", array('action' => 'delete', $tag['Tag']['id']),array('escape' => false,null), __('Veuillez vraiment supprimer cette enregistrement # %s?', $tag['Tag']['id'])); } ?>
		</td>
	</tr>
<?php endforeach; ?>
                          </tbody>
	</table>
	
                                </div></div></div></div></div>	


