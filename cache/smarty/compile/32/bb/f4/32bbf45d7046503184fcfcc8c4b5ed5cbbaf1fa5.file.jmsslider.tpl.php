<?php /* Smarty version Smarty-3.1.19, created on 2017-11-03 21:45:33
         compiled from "C:\xampp\htdocs\Presta16\modules\jmsslider\views\templates\hook\jmsslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52289742259fcd56dda3226-32979207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32bbf45d7046503184fcfcc8c4b5ed5cbbaf1fa5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Presta16\\modules\\jmsslider\\views\\templates\\hook\\jmsslider.tpl',
      1 => 1509733219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52289742259fcd56dda3226-32979207',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slides' => 0,
    'slide' => 0,
    'root_url' => 0,
    'layer' => 0,
    'configs' => 0,
    'vimeo_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_59fcd56de5f249_53928112',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fcd56de5f249_53928112')) {function content_59fcd56de5f249_53928112($_smarty_tpl) {?>

<div class="jms-slider-wrapper">
	<div class="responisve-container">
		<div class="slider" >
		<div class="fs_loader"></div>
		<?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
			<div class="slide <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['slide']->value['class_suffix'],'htmlall','UTF-8');?>
" style="background:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['slide']->value['bg_color'],'htmlall','UTF-8');?>
 url(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['root_url']->value,'htmlall','UTF-8');?>
modules/jmsslider/views/img/slides/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['slide']->value['bg_image'],'htmlall','UTF-8');?>
) no-repeat left top;background-size:cover;" <?php if ($_smarty_tpl->tpl_vars['slide']->value['slide_link']) {?>onclick="document.location='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['slide']->value['slide_link'],'htmlall','UTF-8');?>
';"<?php }?>>
				<?php  $_smarty_tpl->tpl_vars['layer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['layer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slide']->value['layers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['layer']->key => $_smarty_tpl->tpl_vars['layer']->value) {
$_smarty_tpl->tpl_vars['layer']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_type']=='text') {?>
					<div class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_class_suffix'],'htmlall','UTF-8');?>
 jms-slide-content" 
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_fixed']) {?>data-fixed<?php }?> 
					data-position="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_y'],'htmlall','UTF-8');?>
,<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_x'],'htmlall','UTF-8');?>
" 
					data-fontsize = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_font_size'],'htmlall','UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_line_height']) {?>
					data-lineheight = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_line_height'],'htmlall','UTF-8');?>
px"
					<?php }?>
					data-in="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_in'],'htmlall','UTF-8');?>
" 
					data-out="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_out'],'htmlall','UTF-8');?>
" 
					data-delay="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_delay'],'htmlall','UTF-8');?>
" 
					data-ease-in="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_ease_in'],'htmlall','UTF-8');?>
" 
					data-ease-out="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_ease_out'],'htmlall','UTF-8');?>
" 
					data-step="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_step'],'htmlall','UTF-8');?>
" 
					data-special="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_special'],'htmlall','UTF-8');?>
"
					data-time = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_time'],'htmlall','UTF-8');?>
"
					style="font-size: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_font_size'],'htmlall','UTF-8');?>
px; font-style:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_style'],'htmlall','UTF-8');?>
; color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_color'],'htmlall','UTF-8');?>
; line-height:<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_line_height']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_line_height'],'htmlall','UTF-8');?>
px<?php }?>;"					
					><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_html'],'htmlall','UTF-8');?>

					</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['layer']->value['data_type']=='image') {?>					
					<img class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_class_suffix'],'htmlall','UTF-8');?>
 jms-slide-content" 
					src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['root_url']->value,'htmlall','UTF-8');?>
modules/jmsslider/views/img/layers/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_image'],'htmlall','UTF-8');?>
" 
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_fixed']) {?>data-fixed<?php }?> 
					data-position="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_y'],'htmlall','UTF-8');?>
,<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_x'],'htmlall','UTF-8');?>
" 
					data-in="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_in'],'htmlall','UTF-8');?>
" 
					data-out="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_out'],'htmlall','UTF-8');?>
" 
					data-delay="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_delay'],'htmlall','UTF-8');?>
" 
					data-ease-in="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_ease_in'],'htmlall','UTF-8');?>
" 
					data-ease-out="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_ease_out'],'htmlall','UTF-8');?>
" 
					data-time = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_time'],'htmlall','UTF-8');?>
"
					data-step="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_step'],'htmlall','UTF-8');?>
" 
					data-special="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_special'],'htmlall','UTF-8');?>
" 
					width="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_width'],'htmlall','UTF-8');?>
" 
					height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_height'],'htmlall','UTF-8');?>
"/>
					<?php } else { ?>
						
					<iframe class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_class_suffix'],'htmlall','UTF-8');?>
 jms-slide-content"
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_fixed']||$_smarty_tpl->tpl_vars['layer']->value['data_video_bg']) {?>data-fixed<?php }?> 
					data-position="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_y'],'htmlall','UTF-8');?>
,<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_x'],'htmlall','UTF-8');?>
" 
					data-in="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_in'],'htmlall','UTF-8');?>
" 
					data-out="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_out'],'htmlall','UTF-8');?>
" 
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_video_bg']) {?>data-delay="0"<?php } else { ?>data-delay="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_delay'],'htmlall','UTF-8');?>
" <?php }?>
					data-ease-in="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_ease_in'],'htmlall','UTF-8');?>
" 
					data-ease-out="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_ease_out'],'htmlall','UTF-8');?>
" 
					data-step="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_step'],'htmlall','UTF-8');?>
" 
					data-special="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_special'],'htmlall','UTF-8');?>
"
					data-time = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_time'],'htmlall','UTF-8');?>
"
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['data_video_bg']) {?>
						width="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_WIDTH'],'htmlall','UTF-8');?>
"
						height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_HEIGHT'],'htmlall','UTF-8');?>
"
					<?php } else { ?>
						width="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_width'],'htmlall','UTF-8');?>
"
						height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_height'],'htmlall','UTF-8');?>
"
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['layer']->value['videotype']=='youtube') {?>
						src="http://www.youtube.com/embed/<?php echo substr($_smarty_tpl->tpl_vars['layer']->value['data_video'],(strpos($_smarty_tpl->tpl_vars['layer']->value['data_video'],'?v=')+3));?>
?autoplay=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_video_autoplay'],'htmlall','UTF-8');?>
&controls=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_video_controls'],'htmlall','UTF-8');?>
&loop=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_video_loop'],'htmlall','UTF-8');?>
"
					<?php } elseif ($_smarty_tpl->tpl_vars['layer']->value['videotype']=='vimeo') {?>
						 <?php $_smarty_tpl->tpl_vars['vimeo_link'] = new Smarty_variable((explode("/",$_smarty_tpl->tpl_vars['layer']->value['data_video'])), null, 0);?>
						src="https://player.vimeo.com/video/<?php echo $_smarty_tpl->tpl_vars['vimeo_link']->value[count($_smarty_tpl->tpl_vars['vimeo_link']->value)-1];?>
?autoplay=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_video_autoplay'],'htmlall','UTF-8');?>
&loop=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['layer']->value['data_video_loop'],'htmlall','UTF-8');?>
"
					<?php }?>	
					allowfullscreen 
					frameborder="0">
					</iframe> 
					<?php }?>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

  
<script type="text/javascript">
	$(window).load(function(){
		$('.slider').fractionSlider({	
			'slideTransition' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_TRANS'],'htmlall','UTF-8');?>
",
			'slideEndAnimation' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_END_ANIMATE']) {?>true<?php } else { ?>false<?php }?>,
			'transitionIn' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_TRANS_IN'],'htmlall','UTF-8');?>
", // default in - transition
			'transitionOut' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_TRANS_OUT'],'htmlall','UTF-8');?>
", // default out - transition
			'fullWidth' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_FULL_WIDTH']) {?>true<?php } else { ?>false<?php }?>, // transition over the full width of the window
			'delay' : <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_DELAY'],'htmlall','UTF-8');?>
, // default delay for elements
			'timeout' : <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_DURATION'],'htmlall','UTF-8');?>
, // default timeout before switching slides
			'speedIn' : <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_SPEED_IN'],'htmlall','UTF-8');?>
,
			'speedOut' : <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_SPEED_OUT'],'htmlall','UTF-8');?>
, // default in - transition speed
			'easeIn' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_EASE_IN'],'htmlall','UTF-8');?>
", // default easing in
			'easeOut' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_EASE_OUT'],'htmlall','UTF-8');?>
", // default easing out
			'controls' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_SHOW_CONTROLS']) {?>true<?php } else { ?>false<?php }?>, // controls on/off
			'pager' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_SHOW_PAGES']) {?>true<?php } else { ?>false<?php }?>, // pager inside of the slider on/off OR $('someselector') for a pager outside of the slider
			'autoChange' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_AUTO_CHANGE']) {?>true<?php } else { ?>false<?php }?>, // auto change slides
			'pauseOnHover' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_PAUSE_HOVER']) {?>true<?php } else { ?>false<?php }?>, // Pauses slider on hover (current step will still be completed)
			'backgroundAnimation' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_BG_ANIMATE']) {?>true<?php } else { ?>false<?php }?>,
			'backgroundEase' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_BG_EASE'],'htmlall','UTF-8');?>
",
			'responsive' : <?php if ($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_RESPONSIVE']) {?>true<?php } else { ?>false<?php }?>, // responsive slider (see below for some implementation tipps)
			'dimensions' : "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_WIDTH'],'htmlall','UTF-8');?>
,<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->escapePTS($_smarty_tpl->tpl_vars['configs']->value['JMS_SLIDER_HEIGHT'],'htmlall','UTF-8');?>
",
		});
	});
</script><?php }} ?>
