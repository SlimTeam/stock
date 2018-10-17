<div class="container" id="content">
  <div class="row">
  <h3 class="xs-right">
      <a href="#" onclick="loadPage('admin/view_users/')" class="tab_unselected"><?php echo $this->lang->line('admin_tab_users'); ?></a>
      <a href="#" onclick="loadPage('admin/view_tags/')" class="tab_unselected"><?php echo $this->lang->line('admin_tab_tags'); ?></a>
      <a href="#" onclick="loadPage('admin/view_stocking_places/')" class="tab_selected"><?php echo $this->lang->line('admin_tab_stocking_places'); ?></a>
      <a href="#" onclick="loadPage('admin/view_suppliers/')" class="tab_unselected"><?php echo $this->lang->line('admin_tab_suppliers'); ?></a>
      <a href="#" onclick="loadPage('admin/view_item_groups/')" class="tab_unselected"><?php echo $this->lang->line('admin_tab_item_groups'); ?></a>
      <a href="#" onclick="loadPage('admin/')" class="tab_unselected"><?php echo $this->lang->line('admin_tab_admin'); ?></a>
  </h3></div>
  <!-- First something more simple <span onclick="minilist()">Utilisateurs</span>, Administration -->

  <div class="row">
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
      <th>Court</th>
          <th>Long</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($stocking_places as $stocking_place) { ?>
        <tr>
          <td>
            <a href="<?php echo base_url('/admin/modify_stocking_place').'/'.$stocking_place->stocking_place_id ?>" style="display:block"><?php echo html_escape($stocking_place->short); ?></a>
          </td>
          <td>
            <?php echo html_escape($stocking_place->name); ?>
            <a href="<?php echo base_url('/admin/delete_stocking_place').'/'.$stocking_place->stocking_place_id ?>"
              class="close" title="<?php echo $this->lang->line('admin_delete_stocking_place');?>">×</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="<?php echo base_url(); ?>admin/new_stocking_place/" class="btn btn-primary"><?php echo $this->lang->line('admin_new');?></a>
    </div>
  </div>
  </div>

  <script src="<?php echo base_url(); ?>assets/js/geoline.js">
  </script>
<style type="text/css">
  .tab_unselected {
    display:block;
    float:left;
    padding:10px 15px;
    background:#0000bb;
    border:1px solid #777;
    border-radius:4px 4px 0 0;
    margin-right:1px;
    color:#fff;
    text-decoration:none;
  }
  .tab_unselected:hover {
    color: #fff;
  }
  .tab_selected {
    display:block;
    float:left;
    padding:10px 15px;
    background:#00bbff;
    border:1px solid #777;
    border-radius:4px 4px 0 0;
    margin-right:1px;
    color:#fff;
    text-decoration:none;
  }
  .tab_selected:hover {
    color: #fff;
  }
</style>

<script type="text/javascript">
    function loadPage(endOfPageString) {
        var targetPart = $('#content');
        if(endOfPageString == undefined) {
            endOfPageString = "";
        }
        var newUrlForPart = ('<?php echo base_url(); ?>' + endOfPageString);
        $('#content').load(newUrlForPart + ' #content');
    }
</script>