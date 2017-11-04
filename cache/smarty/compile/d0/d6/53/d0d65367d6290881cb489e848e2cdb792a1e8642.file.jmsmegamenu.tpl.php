<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:26:54
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\jmsmegamenu\views\templates\hook\jmsmegamenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88677949559fcb4ee9d2af0-72396747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0d65367d6290881cb489e848e2cdb792a1e8642' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\jmsmegamenu\\views\\templates\\hook\\jmsmegamenu.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88677949559fcb4ee9d2af0-72396747',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_html' => 0,
    'JMSMM_MOUSEEVENT' => 0,
    'JMSMM_DURATION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4ee9d5cb9_00966348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4ee9d5cb9_00966348')) {function content_59fcb4ee9d5cb9_00966348($_smarty_tpl) {?>
<a id="open-button" class="open-button hidden-lg hidden-md" href="#"><span class="fa fa-bars"></span></a>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['menu_html']->value,'');?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
    	jQuery('.jms-megamenu').jmsMegaMenu({    			
    		event: '<?php echo $_smarty_tpl->tpl_vars['JMSMM_MOUSEEVENT']->value;?>
',
    		duration: <?php echo $_smarty_tpl->tpl_vars['JMSMM_DURATION']->value;?>

    	});		
	});	
</script>
<?php }} ?>
