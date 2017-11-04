<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:26:54
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\jmsajaxsearch\jmsajaxsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58886491559fcb4ee9f4a42-31322651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '725b29003cb6c7248dc7567d8b24bc315b2fe431' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\jmsajaxsearch\\jmsajaxsearch.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58886491559fcb4ee9f4a42-31322651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4ee9f76a3_85479952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4ee9f76a3_85479952')) {function content_59fcb4ee9f76a3_85479952($_smarty_tpl) {?>

<div id="jms_ajax_search" class="jms_ajax_search">
	<a href="#"  class="btn-xs search-icon" title="Search">
		<span class="fa fa-search"></span>
	</a>
	<div class="search-box dropdown-menu">	
		<form method="get" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'),'html','UTF-8');?>
" id="searchbox">
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input type="text" id="ajax_search" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search and hit enter...','mod'=>'jmsajaxsearch'),$_smarty_tpl);?>
" class="form-control" />		
		</form>
		<a href="#"  class="fa fa-search">		
		</a>
		<a id="close-search" href="#"  class="fa fa-close">		
		</a>
		<div id="search_result">
		</div>
	</div>	
	<div id="cover-background"> </div> 
</div><?php }} ?>
