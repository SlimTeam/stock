<div class="container">
	<h1 class="xs-right">
		<select id="regions" style="border:none;width:205px;" onchange="changeRegion()">
			<option value="user">Utilisateurs</option>
			<option value="tag">Tags</option>
			<option value="stocking_place">Lieux de stockage</option>
			<option value="supplier">Fournisseurs</option>
			<option value="item_group">Groupes d'objets</option>
		</select>,
		<a class="like-normal" href="<?php echo base_url(); ?>admin/">
			<span class="word-administration">Administration</span>
		</a>
	</h1>
	<!-- First something more simple <span onclick="minilist()">Utilisateurs</span>, Administration -->

	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr class="row">
					<th><?php echo $this->lang->line('header_username'); ?></th>
					<th><?php echo $this->lang->line('header_lastname'); ?></th>
					<th><?php echo $this->lang->line('header_firstname'); ?></th>
					<th><?php echo $this->lang->line('header_email'); ?></th>
					<th><?php echo $this->lang->line('header_user_type'); ?></th>
					<th><?php echo $this->lang->line('header_is_active'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) { ?>
				<tr class="row">
					<td>
						<a href="<?php echo base_url('/admin/modify_user').'/'.$user->user_id ?>" style="display:block"><?php echo html_escape($user->username); ?></a>
					</td>
					<td><?php echo html_escape($user->lastname); ?></td>
					<td><?php echo html_escape($user->firstname); ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php echo $user->user_type->name; ?></td>
					<td>
						<?php if ($user->is_active) {echo "Oui";} else {echo "Non";} ?>
						<a href="<?php echo base_url('/admin/delete_user').'/'.$user->user_id ?>"
							class="close" title="Supprimer l'utilisateur">×</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<a href="<?php echo base_url(); ?>admin/new_user/" class="btn btn-primary">Nouveau…</a>
	</div>

	<script src="<?php echo base_url(); ?>assets/js/geoline.js">
	</script>
