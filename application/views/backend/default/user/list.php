  <div class="header">
             <h1 class="page-title">User</h1>
    </div>
    
            <ul class="breadcrumb">
        <li><a href="<?php echo site_url("admin")?>">Home</a> <span class="divider">/</span></li>
        <li class="active">user</li>
    </ul>
    
 <div class="container-fluid">
    <div class="row-fluid">
	    <div class="btn-toolbar">
		    <a href="<?php echo site_url('admin/user/add')?>" class="btn btn-primary"><i class="icon-plus"></i> <?php echo t('New user')?></a>
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
          <th><?php echo t("Name");?></th>
          <th><?php echo t("User Name");?></th>
          <th><?php echo t("Birth day");?></th>
          <th><?php echo t("Gender");?></th>
          <th><?php echo t("Create Date");?></th>
          <th><?php echo t("Block");?></th>
          <th style="width: 50px;"><?php echo t("Status")?></th>
          <th style="width: 50px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php $stt = 0;?>
        <?php foreach ($users as $key => $u):?>
          <tr id="<?php echo $u->id?>row">
          <td><?php echo ++$stt?></td>
          <td><?php echo $u->id?></td>
          <td><?php echo $u->firstname . " " . $u->lastname?></td>
          <td><?php echo $u->username?></td>
          <td><?php echo !is_null($u->birthday)?Date("d-m-Y",$u->birthday):""?></td>
          <td><?php echo $u->gender?></td>
          <td><?php echo !is_null($u->create)?$u->Date("d-m-Y",$u->create):""?></td>
          <td class="txtc"><a href="javascript:void(0);" id="change<?php echo $u->id?>" onclick="user.changeblock(<?php echo $u->id?>,<?php echo $u->block?>)"  rel="tooltip" data-original-title="<?php echo t("Change block user")?>" ><?php echo ($u->block==1) ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>"?><a/></td>
          <td class="txtc"><a href="javascript:void(0);" id="change<?php echo $u->id?>" onclick="user.changeStatus(<?php echo $u->id?>,<?php echo $u->active?>)" rel="tooltip" data-original-title="<?php echo t("Change status")?>"><?php echo ($u->active==1) ? "<i class='icon-ok-sign'></i>" : "<i class='icon-remove-circle'></i>"?><a/></td>
          <td>
          <?php if(is_null($u->username)):?>
                <a href="<?php echo site_url('admin/user/setAccount/' . $u->id)?>" rel="tooltip" data-original-title="<?php echo t("Setup Account")?>"><i class="icon-user"></i></a>
          <?php endif?>
              <a href="<?php echo site_url('admin/user/edit/' . $u->id)?>" rel="tooltip" data-original-title="<?php echo t("Edit user")?>"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal" data-id="<?php echo $u->id?>" class="remove" rel="tooltip" data-original-title="<?php echo t("Remove user")?>"><i class="icon-remove"></i></a>
          </td>
        </tr>
        
        <?php endforeach?>
        
      </tbody>
    </table>
</div>
<!-- <div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div> -->

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