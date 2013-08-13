  <div class="header">
             <h1 class="page-title">Block</h1>
    </div>
    
            <ul class="breadcrumb">
        <li><a href="<?php echo site_url("admin")?>">Home</a> <span class="divider">/</span></li>
        <li class="active">block</li>
    </ul>
    
 <div class="container-fluid">
    <div class="row-fluid">
	    <div class="btn-toolbar">
		    <a href="<?php echo site_url('admin/block/add')?>" class="btn btn-primary"><i class="icon-plus"></i> <?php echo t('New Block')?></a>
		    <button class="btn">Import</button>
		    <button class="btn">Export</button>
			  <div class="btn-group">
			  </div>
		</div>
    
      
 <div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px;">#</th>
          <th style="width: 50px;"><?php echo t("Id")?></th>
          <th><?php echo t("Block Name");?></th>
          <th style="width: 50px;"><?php echo t("Status")?></th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php $stt = 0;?>
        <?php foreach ($listBlock as $key => $b):?>
          <tr>
          <td><?php echo ++$stt?></td>
          <td><?php echo $b->id?></td>
          <td><?php echo $b->name?></td>
          <td class="txtc"><a href="javascript:void(0);" id="change<?php echo $b->id?>" onclick="block.changeStatus(<?php echo $b->id?>,<?php echo $b->active?>)" ><?php echo ($b->active==1) ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>"?><a/></td>
          <td>
              <a href="user.html"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        
        <?php endforeach?>
        
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>

      
      
    </div>
 </div>