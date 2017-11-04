<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:29:55
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\contact-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200853882559fcb5a39861c4-61375058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c28c38ed6c49f805a76e2e541dffc86541d2683' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\contact-form.tpl',
      1 => 1509733216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200853882559fcb5a39861c4-61375058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmation' => 0,
    'force_ssl' => 0,
    'base_dir_ssl' => 0,
    'base_dir' => 0,
    'alreadySent' => 0,
    'request_uri' => 0,
    'customerThread' => 0,
    'contacts' => 0,
    'contact' => 0,
    'flag' => 0,
    'email' => 0,
    'PS_CATALOG_MODE' => 0,
    'is_logged' => 0,
    'orderList' => 0,
    'order' => 0,
    'orderedProductList' => 0,
    'id_order' => 0,
    'products' => 0,
    'product' => 0,
    'fileupload' => 0,
    'max_upload_size' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb5a39e38d5_20268196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb5a39e38d5_20268196')) {function content_59fcb5a39e38d5_20268196($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Contact'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<div class="google_map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2650.3507862626852!2d144.9551689341772!3d-37.81777832804675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4cedf3f8f7%3A0xfa96fd631be5d789!2sCollins+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2s!4v1461211120164" width="1170" height="570" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="address-contact-form">
			<ul>
				<li><?php echo smartyTranslate(array('s'=>'61 3 8376 6284'),$_smarty_tpl);?>
</li>
				<li><?php echo smartyTranslate(array('s'=>'121 King Street, Melbourne Victoria 3000 Australia'),$_smarty_tpl);?>
</li>
			</ul>
			<ul class="social-block">
				<li><a href="#"><span class="fa fa-facebook"></span></a></li>
				<li><a href="#"><span class="fa fa-twitter"></span></a></li>
				<li><a href="#"><span class="fa fa-instagram"></span></a></li>
				<li><a href="#"><span class="fa fa-linkedin"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 contact-form">
		<h1 class="page-heading bottom-indent">
			<?php echo smartyTranslate(array('s'=>'We would love to hear from you'),$_smarty_tpl);?>

		</h1>
		<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
			<p class="alert alert-success success"><?php echo smartyTranslate(array('s'=>'Your message has been successfully sent to our team.'),$_smarty_tpl);?>
</p>
			<ul class="footer_links clearfix">
				<li>
					<a class="btn btn-default button button-small" href="<?php if (isset($_smarty_tpl->tpl_vars['force_ssl']->value)&&$_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>">
						<span>
							<i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

						</span>
					</a>
				</li>
			</ul>
		<?php } elseif (isset($_smarty_tpl->tpl_vars['alreadySent']->value)) {?>
			<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Your message has already been sent.'),$_smarty_tpl);?>
</p>
			<ul class="footer_links clearfix">
				<li>
					<a class="btn btn-default button button-small" href="<?php if (isset($_smarty_tpl->tpl_vars['force_ssl']->value)&&$_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>">
						<span>
							<i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

						</span>
					</a>
				</li>
			</ul>
		<?php } else { ?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<form action="<?php echo $_smarty_tpl->tpl_vars['request_uri']->value;?>
" method="post" class="contact-form-box" enctype="multipart/form-data">
				<fieldset>
					<div class="clearfix">
						<div>
							<div class="form-group selector1">
								<label for="id_contact"><?php echo smartyTranslate(array('s'=>'Subject Heading'),$_smarty_tpl);?>
</label>
							<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_contact'])&&$_smarty_tpl->tpl_vars['customerThread']->value['id_contact']&&count($_smarty_tpl->tpl_vars['contacts']->value)) {?>
									<?php $_smarty_tpl->tpl_vars['flag'] = new Smarty_variable(true, null, 0);?>
									<?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['contact']->value['id_contact']==$_smarty_tpl->tpl_vars['customerThread']->value['id_contact']) {?>
											<input type="text" class="form-control" id="contact_name" name="contact_name" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contact']->value['name'],'html','UTF-8');?>
" readonly="readonly" />
											<input type="hidden" name="id_contact" value="<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" />
											<?php $_smarty_tpl->tpl_vars['flag'] = new Smarty_variable(false, null, 0);?>
										<?php }?>
									<?php } ?>
									<?php if ($_smarty_tpl->tpl_vars['flag']->value&&isset($_smarty_tpl->tpl_vars['contacts']->value[0]['id_contact'])) {?>
											<input type="text" class="form-control" id="contact_name" name="contact_name" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contacts']->value[0]['name'],'html','UTF-8');?>
" readonly="readonly" />
											<input type="hidden" name="id_contact" value="<?php echo intval($_smarty_tpl->tpl_vars['contacts']->value[0]['id_contact']);?>
" />
									<?php }?>
							</div>
							<?php } else { ?>
								<select id="id_contact" class="form-control" name="id_contact">
									<option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
									<?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
										<option value="<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
"<?php if (isset($_REQUEST['id_contact'])&&$_REQUEST['id_contact']==$_smarty_tpl->tpl_vars['contact']->value['id_contact']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contact']->value['name'],'html','UTF-8');?>
</option>
									<?php } ?>
								</select>
							</div>
								<p id="desc_contact0" class="desc_contact<?php if (isset($_REQUEST['id_contact'])) {?> unvisible<?php }?>">&nbsp;</p>
								<?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
									<p id="desc_contact<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" class="desc_contact contact-title<?php if (!isset($_REQUEST['id_contact'])||intval($_REQUEST['id_contact'])!=intval($_smarty_tpl->tpl_vars['contact']->value['id_contact'])) {?> unvisible<?php }?>">
										<i class="icon-comment-alt"></i><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['contact']->value['description'],'html','UTF-8');?>

									</p>
								<?php } ?>
							<?php }?>
							<p class="form-group">
								<label for="email"><?php echo smartyTranslate(array('s'=>'Email address'),$_smarty_tpl);?>
</label>
								<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['email'])) {?>
									<input class="form-control grey" type="text" id="email" name="from" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['customerThread']->value['email'],'html','UTF-8');?>
" readonly="readonly" />
								<?php } else { ?>
									<input class="form-control grey validate" type="text" id="email" name="from" data-validate="isEmail" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['email']->value,'html','UTF-8');?>
" />
								<?php }?>
							</p>
							<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
								<?php if ((!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])||$_smarty_tpl->tpl_vars['customerThread']->value['id_order']>0)) {?>
									<div class="form-group selector1">
										<label><?php echo smartyTranslate(array('s'=>'Order reference'),$_smarty_tpl);?>
</label>
										<?php if (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&isset($_smarty_tpl->tpl_vars['is_logged']->value)&&$_smarty_tpl->tpl_vars['is_logged']->value) {?>
											<select name="id_order" class="form-control">
												<option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
												<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
													<option value="<?php echo intval($_smarty_tpl->tpl_vars['order']->value['value']);?>
"<?php if (intval($_smarty_tpl->tpl_vars['order']->value['selected'])) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['order']->value['label'],'html','UTF-8');?>
</option>
												<?php } ?>
											</select>
										<?php } elseif (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&empty($_smarty_tpl->tpl_vars['is_logged']->value)) {?>
											<input class="form-control grey" type="text" name="id_order" id="id_order" value="<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])>0) {?><?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order']);?>
<?php } else { ?><?php if (isset($_POST['id_order'])&&!empty($_POST['id_order'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_POST['id_order'],'html','UTF-8');?>
<?php }?><?php }?>" />
										<?php } elseif (intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])>0) {?>
											<input class="form-control grey" type="text" name="id_order" id="id_order" value="<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['reference'])&&$_smarty_tpl->tpl_vars['customerThread']->value['reference']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['customerThread']->value['reference'],'html','UTF-8');?>
<?php } else { ?><?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order']);?>
<?php }?>" readonly="readonly" />
										<?php }?>
									</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['is_logged']->value)&&$_smarty_tpl->tpl_vars['is_logged']->value) {?>
									<div class="form-group selector1">
										<label class="unvisible"><?php echo smartyTranslate(array('s'=>'Product'),$_smarty_tpl);?>
</label>
										<?php if (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_product'])) {?>
											<?php  $_smarty_tpl->tpl_vars['products'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['products']->_loop = false;
 $_smarty_tpl->tpl_vars['id_order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderedProductList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['products']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['products']->key => $_smarty_tpl->tpl_vars['products']->value) {
$_smarty_tpl->tpl_vars['products']->_loop = true;
 $_smarty_tpl->tpl_vars['id_order']->value = $_smarty_tpl->tpl_vars['products']->key;
 $_smarty_tpl->tpl_vars['products']->index++;
 $_smarty_tpl->tpl_vars['products']->first = $_smarty_tpl->tpl_vars['products']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['first'] = $_smarty_tpl->tpl_vars['products']->first;
?>
												<select name="id_product" id="<?php echo $_smarty_tpl->tpl_vars['id_order']->value;?>
_order_products" class="unvisible product_select form-control"<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['first']) {?> style="display:none;"<?php }?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['first']) {?> disabled="disabled"<?php }?>>
													<option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
													<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
														<option value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['value']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['label'],'html','UTF-8');?>
</option>
													<?php } ?>
												</select>
											<?php } ?>
										<?php } elseif ($_smarty_tpl->tpl_vars['customerThread']->value['id_product']>0) {?>
											<input  type="hidden" name="id_product" id="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_product']);?>
" readonly="readonly" />
										<?php }?>
									</div>
								<?php }?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['fileupload']->value==1) {?>
								<p class="form-group">
									<label for="fileUpload"><?php echo smartyTranslate(array('s'=>'Attach File'),$_smarty_tpl);?>
</label>
									<input type="hidden" name="MAX_FILE_SIZE" value="<?php if (isset($_smarty_tpl->tpl_vars['max_upload_size']->value)&&$_smarty_tpl->tpl_vars['max_upload_size']->value) {?><?php echo intval($_smarty_tpl->tpl_vars['max_upload_size']->value);?>
<?php } else { ?>2000000<?php }?>" />
									<input type="file" name="fileUpload" id="fileUpload" class="form-control" />
								</p>
							<?php }?>
						</div>
						<div>
							<div class="form-group">
								<label for="message"><?php echo smartyTranslate(array('s'=>'Message'),$_smarty_tpl);?>
</label>
								<textarea class="form-control" id="message" name="message"><?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?><?php echo stripslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['message']->value,'html','UTF-8'));?>
<?php }?></textarea>
							</div>
						</div>
					</div>
					<div class="submit">
						<button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span><?php echo smartyTranslate(array('s'=>'Send'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span></button>
					</div>
				</fieldset>
			</form>
		<?php }?>
		</div>
</div>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'contact_fileDefaultHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileDefaultHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No file selected','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileDefaultHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'contact_fileButtonHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileButtonHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Choose File','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'contact_fileButtonHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>
