<?php
$piwik_url = Settings::get("piwik_url", "str");
$piwik_site_id = Settings::get("piwik_site_id", "int");
?>
<?php
if (Request::isPost()) {
    
    ?>
<div class="alert alert-success alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php translate("changes_was_saved")?>
		</div>
<?php
}
?>
<form
	action="<?php Template::escape(ModuleHelper::buildAdminURL("piwik"))?>"
	method="post">
<?php csrf_token_html()?>
<p>
		<strong><?php translate("piwik_url");?></strong><br /> <input
			type="text" name="piwik_url"
			value="<?php Template::escape($piwik_url);?>">
	</p>
	<p>
		<strong><?php translate("piwik_site_id");?></strong><br /> <input
			type="number" step="1" name="piwik_site_id"
			value="<?php Template::escape($piwik_site_id);?>">
	</p>
	<p>
		<button type="submit" class="btn btn-default"><?php translate("save");?></button>
	</p>
</form>