<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:26:54
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\blockuserinfo\blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213385967059fcb4ee5debf0-24949552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ffe58c9b1d74768315bb17e3983244a6559d786' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\blockuserinfo\\blockuserinfo.tpl',
      1 => 1509733217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213385967059fcb4ee5debf0-24949552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_logged' => 0,
    'link' => 0,
    'cookie' => 0,
    'homepage' => 0,
    'logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4ee5f2478_39994255',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4ee5f2478_39994255')) {function content_59fcb4ee5f2478_39994255($_smarty_tpl) {?>

<!-- Block user information module HEADER -->
<div class="btn-group compact-hidden user-info">	
	<?php if ($_smarty_tpl->tpl_vars['is_logged']->value) {?>			
		<a class="btn-xs dropdown-toggle" data-toggle="dropdown" class="login account" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" rel="nofollow">
			<span class="text-box"><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
</span><?php if ($_smarty_tpl->tpl_vars['homepage']->value!=1||$_smarty_tpl->tpl_vars['homepage']->value!=5) {?><span class="lnr lnr-chevron-down"></span><?php }?>
		</a>
	<?php } else { ?>
		<a class="btn-xs dropdown-toggle" data-toggle="dropdown" class="login" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Login to your customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" rel="nofollow">
			<span class="text-box"><?php echo smartyTranslate(array('s'=>'Login','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
			<span class="lnr lnr-chevron-down"></span>
		</a>
	<?php }?>
	<ul role="menu" class="dropdown-menu">
		<li><a class="wishlist" href="index.php?fc=module&amp;module=blockwishlist&amp;controller=mywishlist" title="<?php echo smartyTranslate(array('s'=>'View my Wishlist','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" rel="nofollow">
			<span class="text-box"><?php echo smartyTranslate(array('s'=>'Wishlist','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
		</a></li>
		<li><a class="compare" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('compare',true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" rel="nofollow">
			<?php echo smartyTranslate(array('s'=>'Compare','mod'=>'blockuserinfo'),$_smarty_tpl);?>

		</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="account" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
 </a></li>		
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="account" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Checkout','mod'=>'blockuserinfo'),$_smarty_tpl);?>
 </a></li>
		<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout");?>
" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="logout" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></li>
		<?php } else { ?>
		<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true),'html');?>
" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="login" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></li>
		<?php }?>
	</ul>
</div>
<?php }} ?>
