<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:26:55
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67674881959fcb4ef729e39-66961350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4271b28cdc5238ba43fdc774fffcf067dcbac942' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\footer.tpl',
      1 => 1509733217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67674881959fcb4ef729e39-66961350',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'hide_right_column' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
    'content_only' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4ef730687_46562896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4ef730687_46562896')) {function content_59fcb4ef730687_46562896($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index') {?>	
				</section>
				<?php if (!$_smarty_tpl->tpl_vars['hide_right_column']->value&&!empty($_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value)&&$_smarty_tpl->tpl_vars['page_name']->value=='product') {?>						
				<!-- right -->
				<aside class="col-sm-4 col-md-3 col-lg-3 content-aside">
					<div class="content-aside-inner">
					<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

					</div>
				</aside>
				<?php }?>	
			</div>		
			</section>	
		<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER']->value)&&!$_smarty_tpl->tpl_vars['content_only']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>
<?php }?>
			</div></div>
		</div><!-- #page -->
		<div class="back-to-top" id="back-to-top">
			<span class="lnr lnr-chevron-up"></span>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./global.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
