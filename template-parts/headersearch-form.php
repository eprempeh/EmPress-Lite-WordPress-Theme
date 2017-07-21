<?php
/**
 * The template for displaying header search form.
 *
 *
 * @package EmPress_Lite
 */ 
?>
<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>" role="form">
	<input type="text" value="<?php _e('Search for...', 'empress-lite'); ?>" name="s" id="s" class="form-control" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
	<input type="submit" id="searchsubmit" value="" />
</form>