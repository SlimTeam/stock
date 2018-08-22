<div class="container">
    <div class="row">
        <p>Test</p>
    </div>
    <div class="table">
        <!-- LIST OF ITEMS -->
        <?php if(empty($items)) { ?>
          <em><?php html_escape($this->lang->line('msg_no_item')); ?></em>
        <?php } else { ?>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th><?php echo html_escape($this->lang->line('header_picture')); ?></th>
              <th><?php echo html_escape($this->lang->line('header_status')); ?></th>
              <th><?php echo html_escape($this->lang->line('header_item_name')); ?></th>
              <th nowrap><?php echo html_escape($this->lang->line('header_stocking_place')); ?></th>
              <th nowrap>
              <?php
                echo html_escape($this->lang->line('header_inventory_nb'));
                echo '<br />'.html_escape($this->lang->line('header_serial_nb'));
              ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) { ?>
                        <tr>
                <td>
                  <a href="<?php echo base_url('/item/view').'/'.$item->item_id ?>" style="display:block">
                    <img src="<?php echo base_url('uploads/images/'.$item->image); ?>"
                         width="100px"
                         alt="<?php html_escape($this->lang->line('field_image')); ?>" />
                  </a>
                </td>
                <td>
                  <?php
                    echo $item->item_condition->bootstrap_label;
                    echo '<br />'.$item->loan_bootstrap_label;
                    if (!is_null($item->current_loan)) {
                      echo '<br /><h6>'.$item->current_loan->item_localisation.'</h6>';
                    }
                  ?>
                </td>
                <td>
                  <a href="<?php echo base_url('/item/view').'/'.$item->item_id ?>" style="display:block"><?php echo html_escape($item->name); ?></a>
                  <h6><?php echo html_escape($item->description); ?></h6>
                </td>
                <td><?php echo html_escape($item->stocking_place->name); ?></td>
                <td>
                  <a href="<?php echo base_url('/item/view').'/'.$item->item_id ?>" style="display:block"><?php echo html_escape($item->inventory_number_complete); ?></a>
                  <a href="<?php echo base_url('/item/view').'/'.$item->item_id ?>" style="display:block"><?php echo html_escape($item->serial_number); ?></a>
                </td>
                <td>
                  <!-- DELETE ACCESS RESTRICTED FOR ADMINISTRATORS ONLY -->
                  <?php
                  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['user_access'] >= ACCESS_LVL_ADMIN) { ?>
                    <a href="<?php echo base_url('/item/delete').'/'.$item->item_id ?>" class="close" title="Supprimer l'objet">×</a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
    </div>
</div>