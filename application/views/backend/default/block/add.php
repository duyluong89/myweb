 <div class="header">
            
            <h1 class="page-title">Add new block</h1>
        </div>
        
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><?php echo t("Home")?></a> <span class="divider">/</span></li>
            <li><a href="<?php echo site_url('admin/block')?>"><?php echo t("Block")?></a> <span class="divider">/</span></li>
            <li class="active"><?php echo t("New block")?></li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" id="save"><i class="icon-save"></i> <?php echo t("Save")?></button>
    <a href="#myModal" data-toggle="modal" class="btn">Delete</a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="addBlock" name="addBlock" action="<?php echo site_url('admin/block/add')?>" method="post">
        <label><?php echo t("Block Name");?></label>
        <input type="text" value="" class="input-xlarge" name="name">
        <label><?php echo t("Content")?></label>
        <textarea  class="input-xlarge ckeditor" name="content"></textarea>
        <label><?php echo t("Status")?></label>
        <select name="active">
        	<option value="1" selected="selected"><?php echo t("Active")?></option>
          <option value="0"><?php echo t("UnActive")?></option>
        </select>
         
     </form>
      </div>
  </div>

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


                    
                    <footer>
                        <hr>

                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>