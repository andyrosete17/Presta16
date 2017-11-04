<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:26:54
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\jmspagebuilder\views\templates\hook\addonbanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74387952759fcb4eeb841a2-69166562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c5a57d5de48cfdea85fa484c5b5f14b383f2d9b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\jmspagebuilder\\views\\templates\\hook\\addonbanner.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74387952759fcb4eeb841a2-69166562',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'box_class' => 0,
    'banner' => 0,
    'banner_link' => 0,
    'target' => 0,
    'root_url' => 0,
    'alt_text' => 0,
    'html_content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4eeb8dab3_97925552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4eeb8dab3_97925552')) {function content_59fcb4eeb8dab3_97925552($_smarty_tpl) {?>
<div class="jms-banner<?php if ($_smarty_tpl->tpl_vars['box_class']->value) {?> <?php echo $_smarty_tpl->tpl_vars['box_class']->value;?>
<?php }?>">
<?php if ($_smarty_tpl->tpl_vars['banner']->value) {?>
	<a href="<?php if ($_smarty_tpl->tpl_vars['banner_link']->value) {?><?php echo $_smarty_tpl->tpl_vars['banner_link']->value;?>
<?php } else { ?>#<?php }?>"<?php if ($_smarty_tpl->tpl_vars['target']->value=='new window') {?> target="_blank"<?php }?>>
		<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['root_url']->value,'html','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['banner']->value,'html','UTF-8');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['alt_text']->value;?>
" />
	</a>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['html_content']->value) {?>
<?php echo $_smarty_tpl->tpl_vars['html_content']->value;?>

<?php }?>
</div>	
<?php }} ?>
