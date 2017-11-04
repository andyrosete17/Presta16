<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 19:27:02
         compiled from "C:\xampp\htdocs\Presta16\themes\jms_delphinus\modules\jmspagebuilder\views\templates\hook\addonproductcarousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18021813559fcb4f6b91288-75124434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9114c3b35534bfa28f448a6ad65fab2f596fb23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\themes\\jms_delphinus\\modules\\jmspagebuilder\\views\\templates\\hook\\addonproductcarousel.tpl',
      1 => 1509733218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18021813559fcb4f6b91288-75124434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cols' => 0,
    'cols_md' => 0,
    'cols_sm' => 0,
    'cols_xs' => 0,
    'navigation' => 0,
    'pagination' => 0,
    'autoplay' => 0,
    'rewind' => 0,
    'slidebypage' => 0,
    'producttype' => 0,
    'products_slides' => 0,
    'products_slide' => 0,
    'product' => 0,
    'jpb_phover' => 0,
    'link' => 0,
    'PS_CATALOG_MODE' => 0,
    'comparator_max_item' => 0,
    'add_prod_display' => 0,
    'restricted_country_mode' => 0,
    'static_token' => 0,
    'priceDisplay' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcb4f6bd0001_83771761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcb4f6bd0001_83771761')) {function content_59fcb4f6bd0001_83771761($_smarty_tpl) {?>
<script type="text/javascript">
jQuery(function ($) {
    "use strict";
	var productCarousel = $(".product-carousel");		
	var items = <?php if ($_smarty_tpl->tpl_vars['cols']->value) {?><?php echo $_smarty_tpl->tpl_vars['cols']->value;?>
<?php } else { ?>4<?php }?>,
	    itemsDesktop = <?php if ($_smarty_tpl->tpl_vars['cols']->value) {?><?php echo $_smarty_tpl->tpl_vars['cols']->value;?>
<?php } else { ?>4<?php }?>,
	    itemsDesktopSmall = <?php if ($_smarty_tpl->tpl_vars['cols_md']->value) {?><?php echo $_smarty_tpl->tpl_vars['cols_md']->value;?>
<?php } else { ?>3<?php }?>,
	    itemsTablet = <?php if ($_smarty_tpl->tpl_vars['cols_sm']->value) {?><?php echo $_smarty_tpl->tpl_vars['cols_sm']->value;?>
<?php } else { ?>2<?php }?>,
	    itemsMobile = <?php if ($_smarty_tpl->tpl_vars['cols_xs']->value) {?><?php echo $_smarty_tpl->tpl_vars['cols_xs']->value;?>
<?php } else { ?>1<?php }?>;
	var rtl = false;
	if ($("body").hasClass("rtl")) rtl = true;				
	productCarousel.owlCarousel({
		responsiveClass:true,
		responsive:{			
			1199:{
				items:itemsDesktop
			},
			992:{
				items:itemsDesktopSmall
			},
			768:{
				items:itemsTablet
			},
			318:{
				items:itemsMobile
			}
		},
		rtl: rtl,
		margin: 30,
	    nav: <?php if ($_smarty_tpl->tpl_vars['navigation']->value=='1') {?>true<?php } else { ?>false<?php }?>,
	    dots: <?php if ($_smarty_tpl->tpl_vars['pagination']->value=='1') {?>true<?php } else { ?>false<?php }?>,
		autoplay:<?php if ($_smarty_tpl->tpl_vars['autoplay']->value=='1') {?>true<?php } else { ?>false<?php }?>,
	    rewindNav: <?php if ($_smarty_tpl->tpl_vars['rewind']->value=='1') {?>true<?php } else { ?>false<?php }?>,
	    navigationText: ["", ""],
	    slideBy: <?php if ($_smarty_tpl->tpl_vars['slidebypage']->value=='1') {?>'page'<?php } else { ?>1<?php }?>,
	    slideSpeed: 200	
	});
});
</script>

<div class="addon-title">
	<h3>
	<?php if ($_smarty_tpl->tpl_vars['producttype']->value=='topseller') {?>
		<?php echo smartyTranslate(array('s'=>'TopSeller Products','mod'=>'jmspagebuilder'),$_smarty_tpl);?>

	<?php } elseif ($_smarty_tpl->tpl_vars['producttype']->value=='new') {?>	
		<?php echo smartyTranslate(array('s'=>'Latest Products','mod'=>'jmspagebuilder'),$_smarty_tpl);?>

	<?php } elseif ($_smarty_tpl->tpl_vars['producttype']->value=='onsale') {?>	
		<?php echo smartyTranslate(array('s'=>'OnSale Products','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
	
	<?php } elseif ($_smarty_tpl->tpl_vars['producttype']->value=='special') {?>	
		<?php echo smartyTranslate(array('s'=>'Special Products','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
	
	<?php } else { ?>		
		<?php echo smartyTranslate(array('s'=>'Featured Products','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
	
	<?php }?>	
	</h3>	
</div>	
<div class="product-carousel">	
	<?php  $_smarty_tpl->tpl_vars['products_slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['products_slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['products_slide']->key => $_smarty_tpl->tpl_vars['products_slide']->value) {
$_smarty_tpl->tpl_vars['products_slide']->_loop = true;
?>
		<div class="item ajax_block_product" itemscope itemtype="http://schema.org/Product">
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products_slide']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
				<div class="product-preview">
					<div class="preview">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8');?>
" class="product-image<?php if ($_smarty_tpl->tpl_vars['jpb_phover']->value=='image_swap') {?> image_swap<?php }?>" data-id-product="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['id_product'],'html','UTF-8');?>
" itemprop="url">
							<img class="img-responsive product-img1" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'),'html','UTF-8');?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['name'],'html','UTF-8');?>
" itemprop="image" />
						</a>
						<?php if (isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
						<label class="label-box sale-box">
							<span class="sale-label"><?php echo smartyTranslate(array('s'=>'Sale','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
</span>
						</label>
						<?php } elseif (isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?>
							<label class="label-box new-box">
								<span class="new-label"><?php echo smartyTranslate(array('s'=>'New','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
</span>
							</label>
						<?php }?>
						<div class="product_action">
							<a class="addToWishlist product-btn" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['id_product'],'html');?>
', false, 1); return false;" data-id-product="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['id_product'],'html');?>
" title="<?php echo smartyTranslate(array('s'=>'Add to Wishlist','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
">
								<span class="fa fa-heart"></span>
							</a>
							<?php if (isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
							<a class="add_to_compare product-btn" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8');?>
 " data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" title="<?php echo smartyTranslate(array('s'=>'Add to Compare','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
">
								<span class="fa fa-exchange"></span>
								<span class="fa fa-spin fa-spinner"></span>
								<span class="fa fa-check"></span>
							</a>
							<?php }?>
							<a data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['link'],'html','UTF-8');?>
" class="quick-view btn-radius-square product-btn hidden-xs" title="<?php echo smartyTranslate(array('s'=>'Quick View','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
">
								<span class="fa fa-search"></span>
							</a>
						</div>
						<div class="action">
						<?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']==1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
							<?php if (($_smarty_tpl->tpl_vars['product']->value['quantity']>0||$_smarty_tpl->tpl_vars['product']->value['allow_oosp'])) {?>
							<a class="product-btn cart-button btn-default active ajax_add_to_cart_button" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'),'html','UTF-8');?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
&amp;add" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
">
								<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'jmspagebuilder'),$_smarty_tpl);?>

								<span class="fa fa-spin fa-spinner"></span>
								<span class="fa fa-check"></span>
							</a>							
							<?php } else { ?>
								<a href="#" class="product-btn cart-button btn-default ajax_add_to_cart_button disable" title="<?php echo smartyTranslate(array('s'=>'Out of Stock','mod'=>'jmspagebuilder'),$_smarty_tpl);?>
">
									<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'jmspagebuilder'),$_smarty_tpl);?>

								</a>
							<?php }?>									
						<?php }?>
						</div>
					</div>
					<div class="product-info">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['product']->value['link'],'html');?>
" itemprop="url"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],25,'...'),'html','UTF-8');?>
</a>			
						<div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">			
							<?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
								<?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0) {?>
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl);?>

									<span class="old price">
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>

									</span>								
								<?php }?>
								<span class="price new" itemprop="price">
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl);?>

									<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>
<?php }?>
								</span>	
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>

								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

							<?php }?>
							<meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" />
						</div>
					</div>		 
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div><?php }} ?>
