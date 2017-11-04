<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:27:02
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\jmspagebuilder\views\templates\hook\addonfeature.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9810461359fcb4f6d83802-18311102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8a62c5061fdad751fc24c17a6c0f212e2383105' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\jmspagebuilder\\views\\templates\\hook\\addonfeature.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9810461359fcb4f6d83802-18311102',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'box_class' => 0,
    'text_align' => 0,
    'image_type' => 0,
    'image' => 0,
    'root_url' => 0,
    'alt_text' => 0,
    'icon_class' => 0,
    'title' => 0,
    'html_content' => 0,
    'button_text' => 0,
    'button_link' => 0,
    'target' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4f6d90da5_08431391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4f6d90da5_08431391')) {function content_59fcb4f6d90da5_08431391($_smarty_tpl) {?>
<div class="feature-box<?php if ($_smarty_tpl->tpl_vars['box_class']->value) {?> <?php echo $_smarty_tpl->tpl_vars['box_class']->value;?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['text_align']->value) {?>style="text-align:<?php echo $_smarty_tpl->tpl_vars['text_align']->value;?>
;"<?php }?>>
<?php if ($_smarty_tpl->tpl_vars['image_type']->value=='image'&&$_smarty_tpl->tpl_vars['image']->value) {?>	
	<div class="image"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['root_url']->value,'html','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['image']->value,'html','UTF-8');?>
" alt="<?php echo $_smarty_tpl->tpl_vars['alt_text']->value;?>
" /></div>
<?php } elseif ($_smarty_tpl->tpl_vars['icon_class']->value) {?>
	<i class="<?php echo $_smarty_tpl->tpl_vars['icon_class']->value;?>
"></i>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['title']->value) {?>	
<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['html_content']->value) {?>
<?php echo $_smarty_tpl->tpl_vars['html_content']->value;?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['button_text']->value) {?>
<a href="<?php if ($_smarty_tpl->tpl_vars['button_link']->value) {?><?php echo $_smarty_tpl->tpl_vars['button_link']->value;?>
<?php } else { ?>#<?php }?>"<?php if ($_smarty_tpl->tpl_vars['target']->value=='new window') {?> target="_blank"<?php }?>><?php echo $_smarty_tpl->tpl_vars['button_text']->value;?>
</a>
<?php }?>
</div>	
<?php }} ?>
