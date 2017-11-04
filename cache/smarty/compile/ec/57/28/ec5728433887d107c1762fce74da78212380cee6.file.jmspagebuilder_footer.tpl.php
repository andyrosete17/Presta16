<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:26:54
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\jmspagebuilder\views\templates\hook\jmspagebuilder_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61949338759fcb4eebb14f8-73655555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec5728433887d107c1762fce74da78212380cee6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\jmspagebuilder\\views\\templates\\hook\\jmspagebuilder_footer.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61949338759fcb4eebb14f8-73655555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'row' => 0,
    'root_url' => 0,
    'column' => 0,
    'addon' => 0,
    'jpb_phover' => 0,
    'settingpanel' => 0,
    'themeskins' => 0,
    'jpb_skin' => 0,
    'content_dir' => 0,
    'themename' => 0,
    'sk' => 0,
    'homepages' => 0,
    'hp' => 0,
    'jpb_homepage' => 0,
    'producthovers' => 0,
    'phkey' => 0,
    'ph' => 0,
    'jpb_rtl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4eebf7287_24830727',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4eebf7287_24830727')) {function content_59fcb4eebf7287_24830727($_smarty_tpl) {?>
<footer>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
	<div class="jms-row<?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->custom_class)&&$_smarty_tpl->tpl_vars['row']->value->settings->custom_class) {?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['row']->value->settings->custom_class,'htmlall','UTF-8');?>
<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->background_img)&&$_smarty_tpl->tpl_vars['row']->value->settings->background_img) {?>style="<?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->background_img)&&$_smarty_tpl->tpl_vars['row']->value->settings->background_img) {?>background-image:url('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['root_url']->value,'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['row']->value->settings->background_img,'htmlall','UTF-8');?>
');<?php }?><?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->background_size)&&$_smarty_tpl->tpl_vars['row']->value->settings->background_size) {?>background-size:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['row']->value->settings->background_size,'htmlall','UTF-8');?>
;<?php }?><?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->background_attachment)&&$_smarty_tpl->tpl_vars['row']->value->settings->background_attachment) {?>background-attachment:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['row']->value->settings->background_attachment,'htmlall','UTF-8');?>
;<?php }?><?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->background_position)&&$_smarty_tpl->tpl_vars['row']->value->settings->background_position) {?>background-position:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['row']->value->settings->background_position,'htmlall','UTF-8');?>
;<?php }?>"<?php }?>>
		<?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->fluid)&&$_smarty_tpl->tpl_vars['row']->value->settings->fluid=='0') {?><div class="container"><?php }?>
		<div class="row">
		<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_smarty_tpl->tpl_vars['cindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value->cols; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['cindex']->value = $_smarty_tpl->tpl_vars['column']->key;
?>
			<div class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value->className,'htmlall','UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['column']->value->settings->custom_class)&&$_smarty_tpl->tpl_vars['column']->value->settings->custom_class) {?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value->settings->custom_class,'htmlall','UTF-8');?>
<?php }?>" style="<?php if (isset($_smarty_tpl->tpl_vars['column']->value->settings->background_img)&&$_smarty_tpl->tpl_vars['column']->value->settings->background_img) {?>background-image:url('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['root_url']->value,'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value->settings->background_img,'htmlall','UTF-8');?>
');<?php }?><?php if (isset($_smarty_tpl->tpl_vars['column']->value->settings->background_size)&&$_smarty_tpl->tpl_vars['column']->value->settings->background_size) {?>background-size:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value->settings->background_size,'htmlall','UTF-8');?>
;<?php }?><?php if (isset($_smarty_tpl->tpl_vars['column']->value->settings->background_attachment)&&$_smarty_tpl->tpl_vars['column']->value->settings->background_attachment) {?>background-attachment:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value->settings->background_attachment,'htmlall','UTF-8');?>
;<?php }?><?php if (isset($_smarty_tpl->tpl_vars['column']->value->settings->background_position)&&$_smarty_tpl->tpl_vars['column']->value->settings->background_position) {?>background-position:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['column']->value->settings->background_position,'htmlall','UTF-8');?>
;<?php }?>">
				<?php  $_smarty_tpl->tpl_vars['addon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['addon']->_loop = false;
 $_smarty_tpl->tpl_vars['aindex'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['column']->value->addons; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['addon']->key => $_smarty_tpl->tpl_vars['addon']->value) {
$_smarty_tpl->tpl_vars['addon']->_loop = true;
 $_smarty_tpl->tpl_vars['aindex']->value = $_smarty_tpl->tpl_vars['addon']->key;
?>
					<div class="addon-box">
						<?php if (isset($_smarty_tpl->tpl_vars['addon']->value->return_value)&&$_smarty_tpl->tpl_vars['addon']->value->return_value) {?><?php echo $_smarty_tpl->tpl_vars['addon']->value->return_value;?>
<?php }?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
		<?php if (isset($_smarty_tpl->tpl_vars['row']->value->settings->fluid)&&$_smarty_tpl->tpl_vars['row']->value->settings->fluid=='0') {?></div><?php }?>
	</div>
<?php } ?>
</footer>
<?php if ($_smarty_tpl->tpl_vars['jpb_phover']->value=='image_swap') {?>
<script type="text/javascript">		
    $(document).ready(function(){	
		var JmsAjax = new $.JmsAjaxFunc();		
        JmsAjax.processAjax();		
    });
</script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['settingpanel']->value) {?>
<div id="jmstools" class="jmsclose hidden-xs hidden-sm">
	<a id="jmstools-arrow" class="pull-right"><i class="fa fa-cog fa-spin"></i></a>
	<div id="jmstools-content" class="pull-left">
		<form action="index.php" method="POST">
			<?php if (count($_smarty_tpl->tpl_vars['themeskins']->value)>0) {?>
			<div class="form-group">
				<label class="form-label">Theme Skin</label>
					<a class="skin-box <?php if ($_smarty_tpl->tpl_vars['jpb_skin']->value=='default'||$_smarty_tpl->tpl_vars['jpb_skin']->value=='') {?>active<?php }?>" title="Default">
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['content_dir']->value,'htmlall','UTF-8');?>
themes/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['themename']->value,'htmlall','UTF-8');?>
/skin-icons/default.png" alt="Default" />
					</a>
				<?php  $_smarty_tpl->tpl_vars['sk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themeskins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sk']->key => $_smarty_tpl->tpl_vars['sk']->value) {
$_smarty_tpl->tpl_vars['sk']->_loop = true;
?>
					<a class="skin-box <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sk']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['jpb_skin']->value==$_tmp1) {?>active<?php }?>" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sk']->value,'htmlall','UTF-8');?>
" data-color="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sk']->value,'htmlall','UTF-8');?>
">
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['content_dir']->value,'htmlall','UTF-8');?>
themes/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['themename']->value,'htmlall','UTF-8');?>
/skin-icons/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sk']->value,'htmlall','UTF-8');?>
.png" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['sk']->value,'htmlall','UTF-8');?>
" />
					</a>					
				<?php } ?>
			</div>
			<?php }?>	
			<?php if (isset($_smarty_tpl->tpl_vars['homepages']->value)&&count($_smarty_tpl->tpl_vars['homepages']->value)>1) {?>
			<div class="form-group">
					<label>Home Page</label>
					<select name="jpb_homepage" id="jmshomepage">
					<?php  $_smarty_tpl->tpl_vars['hp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homepages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['hp']->key => $_smarty_tpl->tpl_vars['hp']->value) {
$_smarty_tpl->tpl_vars['hp']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hp']->value['id_homepage'],'htmlall','UTF-8');?>
" <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hp']->value['id_homepage'],'htmlall','UTF-8');?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['jpb_homepage']->value==$_tmp2) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['hp']->value['title'],'htmlall','UTF-8');?>
</option>					
					<?php } ?>	
					</select>
			</div>
			<?php }?>			
			<?php if (isset($_smarty_tpl->tpl_vars['producthovers']->value)) {?>
			<div class="form-group">
					<label>Product Box Hover</label>
					<select name="jpb_phover" id="jmsphover">
					<?php  $_smarty_tpl->tpl_vars['ph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ph']->_loop = false;
 $_smarty_tpl->tpl_vars['phkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['producthovers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ph']->key => $_smarty_tpl->tpl_vars['ph']->value) {
$_smarty_tpl->tpl_vars['ph']->_loop = true;
 $_smarty_tpl->tpl_vars['phkey']->value = $_smarty_tpl->tpl_vars['ph']->key;
?>
						<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['phkey']->value,'htmlall','UTF-8');?>
" <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['phkey']->value,'htmlall','UTF-8');?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['jpb_phover']->value==$_tmp3) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['ph']->value,'htmlall','UTF-8');?>
</option>					
					<?php } ?>	
					</select>
			</div>
			<?php }?>				
			<div class="form-group">		
				<label>Direction</label>	
				<select name="jpb_rtl">
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['jpb_rtl']->value=='0') {?>selected="selected"<?php }?>>LTR</option>										
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['jpb_rtl']->value=='1') {?>selected="selected"<?php }?>>RTL</option>										
				</select>				
			</div>
			<input id="jmsskin" type="hidden" name="jpb_skin" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['jpb_skin']->value,'htmlall','UTF-8');?>
" />
			
			<div class="form-group btn-action">
				<button type="submit" class="btn" name="apply" value="1">Apply</button>
				<a class="btn" href="index.php?settingreset=1">Reset</a>
			</div>
			<input type="hidden" name="settingpanel" value="1" />
		</form>	
	</div>
</div>
<?php }?><?php }} ?>
