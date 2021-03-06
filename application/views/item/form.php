<form class="container" method="post" enctype="multipart/form-data">
    <!-- BUTTONS -->
    <div class="form-group col-xs-12">
        <button type="submit" class="btn btn-success"><?php echo $this->lang->line('btn_submit'); ?></button>
        <a class="btn btn-danger" href="<?php echo base_url(); if(isset($modify)) {echo "item/view/" . $item_id;} ?>"><?php echo $this->lang->line('btn_cancel'); ?></a>
    </div>

    <!-- ERROR MESSAGES -->
    <?php
    if (!empty(validation_errors()) || !empty($upload_errors)) {
        echo '<div class="alert alert-danger">'.validation_errors();
        if (isset($upload_errors)) {
            echo $upload_errors;
        } 
        echo '</div>';
    }
    ?>

    <!-- ITEM NAME AND DESCRIPTION -->
    <div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control input-bold" name="name"
                        placeholder="<?php echo $this->lang->line('field_item_name') ?>"
                        value="<?php if(isset($name)) {echo set_value('name',$name);} else {echo set_value('name');} ?>" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="description"
                        placeholder="<?php echo $this->lang->line('field_item_description') ?>"
                        value="<?php if(isset($description)) {echo set_value('description',$description);} else {echo set_value('description');} ?>" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group col-xs-7">
                <input type="text" class="form-control input-bold" name="inventory_number"
                       id="inventory_number"
                       placeholder="<?php echo $this->lang->line('field_inventory_number') ?>"
                       value="<?php if(isset($inventory_number)) {echo set_value('inventory_number',$inventory_number);} else {echo set_value('inventory_number');} ?>" />
            </div>
            <div class="form-group col-xs-5">
                <input type="text" class="form-control" name="inventory_id"
                       id="inventory_id"
                       value="<?php if(isset($inventory_id)) {echo set_value('inventory_id',$inventory_id);} else {echo set_value('inventory_id');} ?>"
                        disabled />
            </div>
            <div class="form-group col-xs-12">
                <input type="button" class="form-control btn btn-primary" name="inventory_number_button"
                       value="<?php echo $this->lang->line('btn_generate_inventory_nb') ?>" onclick="createInventoryNo()">
            </div>
        </div>
    </div>

    <!-- ITEM DETAILS -->
    <div>
        <div class="col-xs-12">
            <p class="bg-primary">&nbsp;<?php echo $this->lang->line('text_item_detail'); ?></p>
        </div>
        <div class="form-group col-md-4">
            <label for="photo"><?php echo $this->lang->line('field_image_upload'); ?></label>
			<input type="file" id="photo" name="photo" accept="image/*" class="form-control-file" />
            <?php if (isset($image) && $image!='') { ?>
                <img src="<?php echo base_url('uploads/images/'.$image); ?>"
                     width="100%"
                     alt="<?php echo $this->lang->line('field_image'); ?>" />
            <?php } ?>
        </div>
        <div class="col-md-8">
            <div class="form-group col-md-4">
                <label for="item_group_id"><?php echo $this->lang->line('field_group'); ?>&nbsp;</label>
                <?php
                if (isset($_POST['item_group_id'])) {
                    // A group has allready been selected, keep it selected
                    echo form_dropdown('item_group_id', $item_groups_name, $_POST['item_group_id'], 'class="form-control" id="item_group_id"');
                } elseif (isset($item_group_id)) {
                    // The item exists, get its group and select it
                    echo form_dropdown('item_group_id', $item_groups_name, $item_group_id, 'class="form-control" id="item_group_id"');
                } else {
                    // No group selected
                    echo form_dropdown('item_group_id', $item_groups_name, '', 'class="form-control" id="item_group_id"');
                }
                ?>
            </div>
            <div class="form-group col-md-8">
                <label for="serial_number"><?php echo $this->lang->line('field_serial_number'); ?>&nbsp;</label>
                <input type="text" id="serial_number" name="serial_number" class="form-control"
                        value="<?php if(isset($serial_number)) {echo set_value('serial_number',$serial_number);} else {echo set_value('serial_number');} ?>" />
            </div>
            <div class="form-group col-xs-12">
                <label for="remarks"><?php echo $this->lang->line('field_remarks'); ?></label>
                <textarea id="remarks" name="remarks" class="form-control"><?php
                    // Don't move the <php> markups or they will be white spaces in textarea
                    if(isset($remarks)) {echo set_value('remarks',$remarks);} else {echo set_value('remarks');} 
                ?></textarea>
            </div>
        </div>

        <!-- Button to display linked file -->
        <div class="form-group col-xs-12">
            <label for="linked_file"><?php echo $this->lang->line('field_linked_file_upload'); ?></label>
            <input type="file" id="linked_file" name="linked_file" accept=".pdf, .doc, .docx" class="form-control-file" />
        </div>
    </div>

    <!-- ITEM STATUS, LOAN STATUS AND HISTORY -->
    <div>
        <div class="col-xs-12">
            <p class="bg-primary">&nbsp;<?php echo $this->lang->line('text_item_loan_status'); ?></p>
        </div>
        <div class="form-group col-md-4">
            <label for="item_condition_id"><?php echo $this->lang->line('text_item_condition'); ?></label>
            <select id="item_condition_id" name="item_condition_id" class="form-control"><?php
                foreach ($condishes as $item_condition) {
                    ?><option value="<?php echo $item_condition->item_condition_id; ?>" <?php
                        if (isset($item_condition_id) && $item_condition_id == $item_condition->item_condition_id) {
                            echo "selected";
                        }
                    ?> ><?php echo $item_condition->name; ?></option><?php
                } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="stocking_place_id"><?php echo $this->lang->line('field_stocking_place'); ?></label>
			<select id="stocking_place_id" name="stocking_place_id" class="form-control"><?php
				foreach ($stocking_places as $stocking_place) { 
				?><option value="<?php echo $stocking_place->stocking_place_id; ?>" <?php
                    if (isset($stocking_place_id) && $stocking_place_id == $stocking_place->stocking_place_id) {
                        echo "selected";
                    }
                ?> ><?php echo $stocking_place->name; ?></option><?php
				} ?>
			</select>
        </div>
    </div>

    <!-- ITEM SUPPLIER, BUYING AND WARRANTY INFORMATIONS -->
    <div>
        <div class="col-xs-12">
            <p class="bg-primary">&nbsp;<?php echo $this->lang->line('text_item_buying_warranty'); ?></p>
        </div>
        <div class ="col-md-4">
            <div class="form-group">
                <label for="supplier_id"><?php echo $this->lang->line('field_supplier'); ?></label>
                <select id="supplier_id" name="supplier_id" class="form-control"><?php
                    foreach ($suppliers as $supplier) { 
    				?><option value="<?php echo $supplier->supplier_id; ?>" <?php
                        if (isset($supplier_id) && $supplier_id == $supplier->supplier_id) {
                            echo "selected";
                        }
                    ?> ><?php echo $supplier->name; ?></option><?php
    				} ?>
                </select>
            </div>
            <div class="form-group">
                <label for="supplier_ref"><?php echo $this->lang->line('field_supplier_ref'); ?></label>
                <input type="text" id="supplier_ref" name="supplier_ref" class="form-control"
                       value="<?php if(isset($supplier_ref)) {echo set_value('supplier_ref',$supplier_ref);} else {echo set_value('supplier_ref');} ?>" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="buying_price"><?php echo $this->lang->line('field_buying_price'); ?></label>
                <input type="number" id="buying_price" name="buying_price" class="form-control" min="0" step="0.05" 
                       value="<?php if(isset($buying_price)) {echo set_value('buying_price',$buying_price);} else {echo set_value('buying_price');} ?><?php echo set_value('buying_price'); ?>" />
            </div>
            <div class="form-group">
                <label for="buying_date"><?php echo $this->lang->line('field_buying_date'); ?></label>
                <input type="date" id="buying_date" name="buying_date" class="form-control"
                       value="<?php if(isset($buying_date)) {echo set_value('buying_date',$buying_date);} else {echo set_value('buying_date', date('Y-m-d'));} ?>" onblur="change_warranty()" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="warranty_duration"><?php echo $this->lang->line('field_warranty_duration'); ?></label>
                <input type="number" id="warranty_duration" name="warranty_duration" class="form-control" min="0" max="1000"
                       value="<?php if(isset($warranty_duration)) {echo set_value('warranty_duration',$warranty_duration);} else {echo set_value('warranty_duration');} ?>" onblur="change_warranty()" />
            </div>
            <span class="label label-success" id="garantie">Sous garantie</span>
        </div>
    </div>

    <!-- ITEM TAGS -->
    <div>
        <div class="col-xs-12">
            <p class="bg-primary">&nbsp;<?php echo $this->lang->line('text_item_tags'); ?></p>
        </div>
        <div class="checkbox col-xs-12">
			<?php foreach ($item_tags as $item_tag) { ?>
                <label class="checkbox-inline">
                    <input class="tag-checkbox" type="checkbox" name="tag<?php echo $item_tag->item_tag_id; ?>" value="<?php echo $item_tag->item_tag_id; ?>"
                        <?php
                        // Check the checkbox if tag is assigned to this item
                        if (isset($tag_links)) {
                            foreach ($tag_links as $tag_link) {
                                if ($tag_link->item_tag_id == $item_tag->item_tag_id){
                                    echo 'checked';
                                }
                            }
                        }
                        ?>
                    />

                    <?php echo $item_tag->name; ?>
                </label>
			<?php } ?>
        </div>
    </div>
</form>

<script>
function change_warranty()
{
	var buying_date = new Date(document.getElementById('buying_date').value);
	var duration = +document.getElementById('warranty_duration').value;
	var span_garantie = document.getElementById('garantie');

	//Get remaining months (ceil)
	var current_date = new Date();

	var remaining_months = (buying_date.getFullYear() * 12 + buying_date.getMonth()) + duration - (current_date.getFullYear() * 12 + current_date.getMonth());

	if (buying_date.getDate() >= current_date.getDate())
		remaining_months++;

	if (remaining_months > 3)
	{
		// Under warranty
		span_garantie.innerHTML = "<?php echo $this->lang->line('text_warranty_status')[1]; ?>";
		span_garantie.class = "label label-success";
	}
	else if (remaining_months > 0)
	{
		// Warranty expires soon
		span_garantie.innerHTML = "<?php echo $this->lang->line('text_warranty_status')[2]; ?>";
		span_garantie.class = "label label-warning";
	}
	else
	{
		// Warranty expired
		span_garantie.innerHTML = "<?php echo $this->lang->line('text_warranty_status')[3]; ?>";
		span_garantie.class = "label label-danger";
	}
}

function createInventoryNo(){
    
    var objectGroupField = document.getElementById('item_group_id');
    
    var objectGroups = [<?php 
        $array = "";
        foreach($item_groups as $item_group){
            $array .= "\"".$item_group->short_name."\",";
        }; 
        
        echo $array;
        ?>];

    var tagShortName = getFirstTagShortName();
    var buyingDateField = document.getElementById('buying_date');
    var date = new Date(buyingDateField.value).getFullYear();
    var inventoryNumberField = document.getElementById('inventory_number');
    var inventoryNumber = "";
    var inventoryIdField = document.getElementById('inventory_id');
    
    date = date.toString().slice(2,4);
    if(date == "N"){
        date = "00";
    }
    
    inventoryNumber = <?php echo '"'.INVENTORY_PREFIX.'."' ?> + objectGroups[objectGroupField.value-1] + tagShortName + date;
    inventoryNumberField.value = inventoryNumber;

    // If inventory_id field is empty, complete it
    if (inventoryIdField.value == "") {
        id = <?php echo $item_id ?>;
        id = id.toString();
        for(var i = id.length;i < <?php echo INVENTORY_NUMBER_CHARS ?>; i++){
            id = "0" + id;
        }
        id = "." + id;

        inventoryIdField.value = id;
    }
}

function getFirstTagShortName(){
    var tags = document.getElementsByClassName('tag-checkbox');
    var firstTagShortName = "";

    // Get an array with every tags shortnames
    var tagsShortNames = [<?php 
                            foreach($item_tags as $item_tag){
                                echo "\"".$item_tag->short_name."\",";
                            }; 
                        ?>];
    
    for(var i = 0;i < tags.length;i++){
        if(tags[i].checked === true){
            firstTagShortName = tagsShortNames[i];
            break;
        }
    }
    
    return firstTagShortName;
}
</script>
