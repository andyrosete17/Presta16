<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:28:33
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\productscategory\productscategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100638774359fcb5516beaa5-52451185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ea042aea636b7d0317649e58eb2a81ea9487e97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\productscategory\\productscategory.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100638774359fcb5516beaa5-52451185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryProducts' => 0,
    'phover' => 0,
    'categoryProduct' => 0,
    'link' => 0,
    'comparator_max_item' => 0,
    'PS_CATALOG_MODE' => 0,
    'ProdDisplayPrice' => 0,
    'restricted_country_mode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb5516eac25_07088126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb5516eac25_07088126')) {function content_59fcb5516eac25_07088126($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>0&&$_smarty_tpl->tpl_vars['categoryProducts']->value!==false) {?>
<section class="page-product-box blockproductscategory">
	<div class="addon-title">
		<h3> <?php echo smartyTranslate(array('s'=>'Relatives product','mod'=>'productscategory'),$_smarty_tpl);?>
</h3>
	</div>
	<div id="productscategory_list">
		<div class="accessories-carousel">
		<?php  $_smarty_tpl->tpl_vars['categoryProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryProduct']->key => $_smarty_tpl->tpl_vars['categoryProduct']->value) {
$_smarty_tpl->tpl_vars['categoryProduct']->_loop = true;
?>
			<div class="item ajax_block_product" itemscope itemtype="http://schema.org/Product">
				<div class="product-preview <?php if ($_smarty_tpl->tpl_vars['phover']->value=='image_swap') {?>image_swap<?php }?>">
					<div class="preview">
						<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],$_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['category'],$_smarty_tpl->tpl_vars['categoryProduct']->value['ean13']);?>
" class="lnk_img product-image" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
">
							<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['id_image'],'home_default'),'html','UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
" />
						</a>
						<div class="product_action">
							<a class="addToWishlist product-btn" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],'html');?>
', false, 1); return false;" data-id-product="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],'html');?>
" title="<?php echo smartyTranslate(array('s'=>'Add to Wishlist','mod'=>'productscategory'),$_smarty_tpl);?>
">
								<span class="fa fa-heart"></span>
							</a>
							<?php if (isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
							<a class="add_to_compare product-btn" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['categoryProduct']->value['link'],'html','UTF-8');?>
 " data-id-product="<?php echo $_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'];?>
" title="<?php echo smartyTranslate(array('s'=>'Add to Compare','mod'=>'productscategory'),$_smarty_tpl);?>
">
								<span class="fa fa-exchange"></span>
								<span class="fa fa-spin fa-spinner"></span>
								<span class="fa fa-check"></span>
							</a>
							<?php }?>
							<a data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['categoryProduct']->value['link'],'html','UTF-8');?>
" class="quick-view btn-radius-square product-btn hidden-xs" title="<?php echo smartyTranslate(array('s'=>'Quick View','mod'=>'productscategory'),$_smarty_tpl);?>
">
								<span class="fa fa-search"></span>
							</a>
						</div>
						<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&($_smarty_tpl->tpl_vars['categoryProduct']->value['allow_oosp']||$_smarty_tpl->tpl_vars['categoryProduct']->value['quantity']>0)) {?>
							<div class="action">
								<a class="product-btn cart-button btn-default active ajax_add_to_cart_button" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,'qty=1&amp;id_product={$categoryProduct.id_product|intval}&amp;token={$static_token}&amp;add'),'html','UTF-8');?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product']);?>
" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'productscategory'),$_smarty_tpl);?>
">
									<?php echo smartyTranslate(array('s'=>"Add to cart",'mod'=>"productscategory"),$_smarty_tpl);?>

									<span class="fa fa-spin fa-spinner"></span>
									<span class="fa fa-check"></span>
								</a>
							</div>
						<?php }?>
					</div>
					<div class="product-info">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],$_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['category'],$_smarty_tpl->tpl_vars['categoryProduct']->value['ean13']),'html','UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
" itemprop="url" itemprop="name">			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['categoryProduct']->value['name'],'html','UTF-8');?>

						</a>
						<?php if ($_smarty_tpl->tpl_vars['ProdDisplayPrice']->value&&$_smarty_tpl->tpl_vars['categoryProduct']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
						<div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">		
							<?php if (isset($_smarty_tpl->tpl_vars['categoryProduct']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['categoryProduct']->value['specific_prices']&&(number_format($_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price'],2)!==number_format($_smarty_tpl->tpl_vars['categoryProduct']->value['price_without_reduction'],2))) {?>
								<span class="old price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
								<span class="price special-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price']),$_smarty_tpl);?>
</span>
							<?php } else { ?>
								<span class="price new" itemprop="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price']),$_smarty_tpl);?>
</span>
							<?php }?>
							
						</div>
						<?php } else { ?>
							<?php }?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<?php }?>
<?php }} ?>
