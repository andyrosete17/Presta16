<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 22:19:41
         compiled from "C:\xampp\htdocs\Presta16\admin573yqroyx\themes\default\template\helpers\list\list_action_preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106700054659fcdd6d13a485-70127661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b05362241d6e1cb960ba95ebdbb5435713d210fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\admin573yqroyx\\themes\\default\\template\\helpers\\list\\list_action_preview.tpl',
      1 => 1504515462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106700054659fcdd6d13a485-70127661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcdd6d13df21_88465122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcdd6d13df21_88465122')) {function content_59fcdd6d13df21_88465122($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" target="_blank">
	<i class="icon-eye"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a>
<?php }} ?>
