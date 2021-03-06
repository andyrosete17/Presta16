<?php
/**
* 2007-2017 PrestaShop
*
* Jms Page Builder
*
*  @author    Joommasters <joommasters@gmail.com>
*  @copyright 2007-2017 Joommasters
*  @license   license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*  @Website: http://www.joommasters.com
*/

if (!defined('_PS_VERSION_')) {
    exit;
}
include_once(_PS_MODULE_DIR_.'jmspagebuilder/classes/jmsHelper.php');
include_once(_PS_MODULE_DIR_.'jmspagebuilder/params.php');
class JmsPageBuilder extends Module
{
    private $_themeskins = array();
    private $_producthovers = array();
    private $_productboxs = array();
    private $fields_options = array();
    public function __construct()
    {
        $this->name = 'jmspagebuilder';
        $this->tab = 'front_office_features';
        $this->version = '3.0.6';
        $this->author = 'joommasters';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->id_homepage = Configuration::get('JPB_HOMEPAGE');
        parent::__construct();
        if (_JPB_THEMESKINS_) {
            $this->_themeskins = explode(",", _JPB_THEMESKINS_);
        }
        if (_JPB_PRODUCTHOVERS_) {
            $hover_strs = explode(",", _JPB_PRODUCTHOVERS_);
            foreach ($hover_strs as $hover_str) {
                $_fields = explode(":", $hover_str);
                $this->_producthovers[$_fields[0]] = $_fields[1];
            }
        }
        $this->displayName = $this->l('Jms Page Builder');
        $this->description = $this->l('Home Page Builder For Prestashop Theme.');
        $this->root_url = JmsPageBuilderHelper::getRootUrl();
    }

    public function install()
    {
        if (parent::install() && $this->registerHook('header') && $this->registerHook('displayBackOfficeHeader') && $this->registerHook('displayHome') && $this->registerHook('displayTop') && $this->registerHook('displayFooter')) {
            $res = Configuration::updateValue('JPB_SKIN', '');
            $res &= Configuration::updateValue('JPB_PRODUCTHOVER', '');
            $res &= Configuration::updateValue('JPB_PRODUCTCOLOR', 0);
            $res &= Configuration::updateValue('JPB_RTL', '0');
            $res &= Configuration::updateValue('JPB_SETTINGPANEL', 0);
            $res &= Configuration::updateValue('JPB_JCAROUSEL', 1);
            $res &= Configuration::updateValue('JPB_AWESOME', 1);
            $res &= Configuration::updateValue('JPB_COUNTDOWN', 1);
            $res &= Configuration::updateValue('JPB_ANIMATE', 1);
            $res &= Configuration::updateValue('JPB_MOBILEMENU', 1);
            $res &= Configuration::updateValue('JPB_CONVERTURL', 0);
            $res &= Configuration::updateValue('JPB_LISTINGLAYOUT', 'leftcolumn');
            $res &= Configuration::updateValue('JPB_PRODUCTLAYOUT', 'withoutcolumn');
            $res &= Configuration::updateValue('JPB_BLOGLAYOUT', 'leftcolumn');
            $res &= Configuration::updateValue('JPB_GRID', '1');
            include(dirname(__FILE__).'/install/jmsinstall.php');
            $install_class = new JmsPageBuilderInstall();
            $install_class->createTable();
            $install_class->installDemo();

            $id_tab1 = $this->addTab('Jms Page Builder', 'dashboard');
            $this->addTab('Home Pages', 'homepages', $id_tab1);
            $this->addTab('Media', 'media', -1);
            $this->addTab('Setting', 'setting', $id_tab1);
            return $res;
        }
        return false;
    }

    public function uninstall()
    {
        /* Deletes Module */
        if (parent::uninstall()) {
            $res = Configuration::deleteByName('JPB_SKIN');
            $res &= Configuration::deleteByName('JPB_PRODUCTHOVER');
            $res &= Configuration::deleteByName('JPB_PRODUCTCOLOR');
            $res &= Configuration::deleteByName('JPB_RTL');
            $res &= Configuration::deleteByName('JPB_SETTINGPANEL');
            $res &= Configuration::deleteByName('JPB_JCAROUSEL');
            $res &= Configuration::deleteByName('JPB_AWESOME');
            $res &= Configuration::deleteByName('JPB_COUNTDOWN');
            $res &= Configuration::deleteByName('JPB_ANIMATE');
            $res &= Configuration::deleteByName('JPB_MOBILEMENU');
            $res &= Configuration::deleteByName('JPB_CONVERTURL');
            $sql = array();
            include(dirname(__FILE__).'/install/uninstall.php');
            foreach ($sql as $s) {
                Db::getInstance()->execute($s);
            }
            Configuration::deleteByName('JPB_HOMEPAGE');
            $this->removeTab('media');
            $this->removeTab('homepages');
            $this->removeTab('setting');
            $this->removeTab('dashboard');
            return $res;
        }
        return false;
    }

    private function addTab($title, $class_sfx = '', $parent_id = 0)
    {
        $class = 'Admin'.Tools::ucfirst($this->name).Tools::ucfirst($class_sfx);
        @Tools::copy(_PS_MODULE_DIR_.$this->name.'/logo.gif', _PS_IMG_DIR_.'t/'.$class.'.gif');
        $_tab = new Tab();
        $_tab->class_name = $class;
        $_tab->module = $this->name;
        $_tab->id_parent = $parent_id;
        $langs = Language::getLanguages(false);
        foreach ($langs as $l) {
            $_tab->name[$l['id_lang']] = $title;
        }
        if ($parent_id == -1) {
            $_tab->id_parent = -1;
            $_tab->add();
        } else {
            $_tab->add(true, false);
        }
        return $_tab->id;
    }

    private function removeTab($class_sfx = '')
    {
        $tabClass = 'Admin'.Tools::ucfirst($this->name).Tools::ucfirst($class_sfx);
        $idTab = Tab::getIdFromClassName($tabClass);
        if ($idTab != 0) {
            $tab = new Tab($idTab);
            $tab->delete();
            return true;
        }
        return false;
    }

    public function getCurrentHomePage()
    {
        //$id_shop = $this->context->shop->id;
        if ($this->context->cookie->jpb_homepage != '') {
            $homepage_id = $this->context->cookie->jpb_homepage;
        } else {
            $homepage_id = Configuration::get('JPB_HOMEPAGE');
        }
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('SELECT ph.* FROM '._DB_PREFIX_.'jmspagebuilder_homepages ph LEFT JOIN '._DB_PREFIX_.'jmspagebuilder p ON ph.`id_homepage` = p.`id_homepage` WHERE ph.`id_homepage` = '.$homepage_id);
    }

    public static function MNexec($hook_name, $module_name = null, $hookArgs = array())
    {
        if (empty($module_name) || !Validate::isHookName($hook_name)) {
            die(Tools::displayError());
        }

        $context = Context::getContext();
        if (!isset($hookArgs['cookie']) || !$hookArgs['cookie']) {
            $hookArgs['cookie'] = $context->cookie;
        }
        if (!isset($hookArgs['cart']) || !$hookArgs['cart']) {
            $hookArgs['cart'] = $context->cart;
        }

        if (!($moduleInstance = Module::getInstanceByName($module_name))) {
            return;
        }
        $retro_hook_name = Hook::getRetroHookName($hook_name);

        $hook_callable = is_callable(array($moduleInstance, 'hook'.$hook_name));
        $hook_retro_callable = is_callable(array($moduleInstance, 'hook'.$retro_hook_name));
        $output = '';

        if (($hook_callable || $hook_retro_callable) && Module::preCall($moduleInstance->name)) {
            if ($hook_callable) {
                $output = $moduleInstance->{'hook'.$hook_name}($hookArgs);
            } elseif ($hook_retro_callable) {
                $output = $moduleInstance->{'hook'.$retro_hook_name}($hookArgs);
            }
        }
        return $output;
    }

    public function loadAddon($addon)
    {
        if ($addon->type == 'module') {
            return $this->MNexec($addon->settings->hook, $addon->settings->modulename);
        } else {
            $addonfile = 'addon'.$addon->type.'.php';
            $addonclass = 'JmsAddon'.Tools::ucfirst($addon->type);
            if (file_exists(_PS_MODULE_DIR_.'jmspagebuilder/addons/'.$addonfile)) {
                require_once(_PS_MODULE_DIR_.'jmspagebuilder/addons/'.$addonfile);
            }
            $addon_instance = new $addonclass();
            $addon_instance->root_url = JmsPageBuilderHelper::getRootUrl();
            return $addon_instance->returnValue($addon);
        }
    }

    private function resetSetting()
    {
        $this->context->cookie->__unset('jpb_homepage');
        $this->context->cookie->__unset('jpb_skin');
        $this->context->cookie->__unset('jpb_phover');
        $this->context->cookie->__unset('jpb_pcolor');
        $this->context->cookie->__unset('jpb_rtl');

    }

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/adminicon.css');
    }

    public function hookDisplayHeader()
    {
        if (Tools::isSubmit('settingpanel') && (int)(Tools::getValue('settingpanel')) == 1) {
            if (Tools::isSubmit('jpb_skin')) {
                $this->context->cookie->jpb_skin = Tools::getValue('jpb_skin');
            }
            if (Tools::isSubmit('jpb_homepage')) {
                $this->context->cookie->jpb_homepage = Tools::getValue('jpb_homepage');
            }
            if (Tools::isSubmit('jpb_phover')) {
                $this->context->cookie->jpb_phover = Tools::getValue('jpb_phover');
            }
            if (Tools::isSubmit('jpb_pcolor')) {
                $this->context->cookie->jpb_pcolor = Tools::getValue('jpb_pcolor');
            }
            if (Tools::isSubmit('jpb_rtl')) {
                $this->context->cookie->jpb_rtl = Tools::getValue('jpb_rtl');
            }
            Tools::redirect($this->context->shop->getBaseURL());
        } elseif (Tools::isSubmit('settingreset')) {
            $this->resetSetting();
            Tools::redirect($this->context->shop->getBaseURL());
        } elseif ((int)configuration::get('JPB_SETTINGPANEL') == 0) {
            $this->resetSetting();
        }
        if ($this->context->cookie->jpb_homepage != '') {
            $jpb_homepage = $this->context->cookie->jpb_homepage;
        } else {
            $jpb_homepage = Configuration::get('JPB_HOMEPAGE');
        }
        if ($this->context->cookie->jpb_skin != '') {
            $jpb_skin = $this->context->cookie->jpb_skin;
        } else {
            $jpb_skin = Configuration::get('JPB_SKIN');
        }
        if ($jpb_skin == 'default' || $jpb_skin == 'preset1') {
            $jpb_skin = '';
        }
        if ($this->context->cookie->jpb_phover != '') {
            $jpb_phover = $this->context->cookie->jpb_phover;
        } else {
            $jpb_phover = Configuration::get('JPB_PRODUCTHOVER');
        }
        if ($this->context->cookie->jpb_pcolor != '') {
            $jpb_pcolor = $this->context->cookie->jpb_pcolor;
        } else {
            $jpb_pcolor = Configuration::get('JPB_PRODUCTCOLOR');
        }
        if ($this->context->cookie->jpb_rtl != '') {
            $jpb_rtl = $this->context->cookie->jpb_rtl;
        } else {
            $jpb_rtl = Configuration::get('JPB_RTL');
        }
        $homepage = $this->getCurrentHomePage();
        if ((int)configuration::get('JPB_AWESOME')) {
            $this->context->controller->addCSS(($this->_path).'views/css/font-awesome.css');
        }
        if ((int)configuration::get('JPB_JCAROUSEL')) {
            $this->context->controller->addJS(($this->_path).'views/js/jquery.jcarousel.min.js');
            $this->context->controller->addJS(($this->_path).'views/js/owl.carousel.js');
            $this->context->controller->addCSS(($this->_path).'views/css/jcarousel.css');
            $this->context->controller->addCSS(($this->_path).'views/css/owl.carousel.css');
            $this->context->controller->addCSS(($this->_path).'views/css/owl.theme.css');
        }
        if ((int)configuration::get('JPB_ANIMATE')) {
            $this->context->controller->addCSS(($this->_path).'views/css/animate.css');
        }
        if ((int)configuration::get('JPB_COUNTDOWN')) {
            $this->context->controller->addJS(($this->_path).'views/js/jquery.plugin.js');
            $this->context->controller->addJS(($this->_path).'views/js/jquery.countdown.js');
        }
        if ($jpb_phover == 'image_swap') {
            $this->context->controller->addJS(($this->_path).'views/js/runajax.js');
        }
        if ((int)$jpb_pcolor) {
            $this->context->controller->addJS(($this->_path).'views/js/colorsajax.js');
        }
        if ($homepage['css_file']) {
            $this->context->controller->addCSS($this->root_url.'themes/'._THEME_NAME_.'/css/'.$homepage['css_file']);
        }
        if ((int)$jpb_rtl || $this->context->language->is_rtl) {
            $this->context->controller->addCSS($this->root_url.'themes/'._THEME_NAME_.'/css/rtl.css');
            $this->context->controller->addCSS($this->root_url.'themes/'._THEME_NAME_.'/css/rtl-'.$homepage['css_file']);
        }
        if ($jpb_skin) {
            $this->context->controller->addCSS($this->root_url.'themes/'._THEME_NAME_.'/css/skins/'.$jpb_skin.'.css');
            $this->context->controller->addCSS($this->root_url.'themes/'._THEME_NAME_.'/css/skins/'.$jpb_skin .'-'. $homepage['css_file']);
        }
        if ((int)configuration::get('JPB_MOBILEMENU')) {
            $this->context->controller->addJS(($this->_path).'views/js/off-canvas.js');
            $this->context->controller->addCSS(($this->_path).'views/css/off-canvas.css');
        }
        $jpb_layout = '';
        if (Tools::isSubmit('jpb_layout') && (Tools::getValue('jpb_layout')) != '') {
            $jpb_layout = Tools::getValue('jpb_layout');
        } elseif (isset($this->context->controller->php_self) && $this->context->controller->php_self == 'category') {
            $jpb_layout = configuration::get('JPB_LISTINGLAYOUT');
        } elseif (isset($this->context->controller->php_self) && $this->context->controller->php_self == 'product') {
            $jpb_layout = configuration::get('JPB_PRODUCTLAYOUT');
        } elseif (Tools::getValue('module') == 'jmsblog') {
            $jpb_layout = configuration::get('JPB_BLOGLAYOUT');
        }        
        if ($jpb_layout == 'withoutcolumn') {
            $this->context->smarty->assign('hide_left_column', 1);
            $this->context->smarty->assign('hide_right_column', 1);
        } elseif ($jpb_layout == 'leftcolumn') {
            $this->context->smarty->assign('hide_left_column', 0);
            $this->context->smarty->assign('hide_right_column', 1);
        } elseif ($jpb_layout == 'rightcolumn') {
            $this->context->smarty->assign('hide_left_column', 1);
            $this->context->smarty->assign('hide_right_column', 0);
        }
        if (Tools::isSubmit('jpb_grid') && (Tools::getValue('jpb_grid')) != '') {
            $jpb_grid = Tools::getValue('jpb_grid');
        } else {
            $jpb_grid = configuration::get('JPB_GRID');
        }
        if ($jpb_grid == '0') {
            $this->context->smarty->assign('jpb_grid', 0);
        } else {
            $this->context->smarty->assign('jpb_grid', 1);
        }
        $this->context->smarty->assign('themename', _THEME_NAME_);
        $this->context->smarty->assign('jpb_homepage', $jpb_homepage);
        $this->context->smarty->assign('jpb_homeclass', $homepage['home_class']);
        $this->context->smarty->assign('jpb_skin', $jpb_skin);
        $this->context->smarty->assign('jpb_phover', $jpb_phover);
        $this->context->smarty->assign('jpb_pcolor', $jpb_pcolor);
        $this->context->smarty->assign('jpb_rtl', $jpb_rtl);
        $this->context->smarty->assign('jpb_mobilemenu', (int)configuration::get('JPB_MOBILEMENU'));
    }

    public function hookdisplayTop()
    {
        if ((int)$this->id_homepage == 0) {
            return "You must select homepage!";
        }
        $homepage = $this->getCurrentHomePage();
        $params = $homepage['params'];
        $tresult = array();
        $t_index = 0;
        $rows = (array)Tools::jsonDecode($params);
        foreach ($rows as $key => $row) {
            if ($row->settings->hook == 'top' && ((isset($row->settings->active) && (int)$row->settings->active == 1) || !isset($row->settings->active))) {
                $tresult[] = $row;
                $columns = $rows[$key]->cols;
                foreach ($columns as $ckey => $column) {
                    $addons = $column->addons;
                    foreach ($addons as $akey => $addon) {
                        $tresult[$t_index]->cols[$ckey]->addons[$akey]->return_value = $this->loadAddon($addon);
                    }
                }
                $t_index++;
            }
        }
        $this->smarty->assign(array(
            'rows' => $tresult,
            'root_url' => $this->root_url
        ));
        return $this->display(__FILE__, 'jmspagebuilder_header.tpl');
    }

    public function hookdisplayHome()
    {
        if ((int)$this->id_homepage == 0) {
            return "You must select homepage!";
        }
        $homepage = $this->getCurrentHomePage();
        $params = $homepage['params'];
        $rows = (array)Tools::jsonDecode($params);
        $bresult = array();
        $b_index = 0;
        foreach ($rows as $key => $row) {
            if (($row->settings->hook == 'body' || $row->settings->hook == '') && ((isset($row->settings->active) && (int)$row->settings->active == 1) || !isset($row->settings->active))) {
                $bresult[] = $row;
                $columns = $rows[$key]->cols;
                foreach ($columns as $ckey => $column) {
                    $addons = $column->addons;
                    foreach ($addons as $akey => $addon) {
                        $bresult[$b_index]->cols[$ckey]->addons[$akey]->return_value = $this->loadAddon($addon);
                    }
                }
                $b_index++;
            }
        }
        $this->smarty->assign(array(
            'rows' => $bresult,
            'root_url' => $this->root_url
        ));
        return $this->display(__FILE__, 'jmspagebuilder_body.tpl');
    }

    public function hookdisplayFooter()
    {
        if ((int)$this->id_homepage == 0) {
            return "You must select homepage!";
        }
        $homepage = $this->getCurrentHomePage();
        $params = $homepage['params'];
        $rows = (array)Tools::jsonDecode($params);
        $fresult = array();
        $f_index = 0;
        foreach ($rows as $key => $row) {
            if ($row->settings->hook == 'footer' && ((isset($row->settings->active) && (int)$row->settings->active == 1) || !isset($row->settings->active))) {
                $fresult[] = $row;
                $columns = $rows[$key]->cols;
                foreach ($columns as $ckey => $column) {
                    $addons = $column->addons;
                    foreach ($addons as $akey => $addon) {
                        $fresult[$f_index]->cols[$ckey]->addons[$akey]->return_value = $this->loadAddon($addon);
                    }
                }
                $f_index++;
            }
        }
        if ((int)Configuration::get('JPB_SETTINGPANEL')) {
            $homepages = JmsPageBuilderHelper::getHomePages('1');
            $this->context->smarty->assign('themeskins', $this->_themeskins);
            if (count($this->_producthovers)) {
                $this->context->smarty->assign('producthovers', $this->_producthovers);
            }
            if (count($homepages)) {
                $this->context->smarty->assign('homepages', $homepages);
            }
            $this->context->controller->addCSS($this->_path.'views/css/settingpanel.css');
            $this->context->controller->addJS($this->_path.'views/js/settingpanel.js');
        }
        $this->smarty->assign(array(
            'rows' => $fresult,
            'settingpanel' => (int)Configuration::get('JPB_SETTINGPANEL'),
            'root_url' => $this->root_url
        ));
        return $this->display(__FILE__, 'jmspagebuilder_footer.tpl');
    }
    public function getAllImages($id_lang, $where, $order)
    {
        $sql = 'SELECT i.`id_product`, image_shop.`cover`, i.`id_image`, il.`legend`, i.`position`,pl.`link_rewrite`
                FROM `'._DB_PREFIX_.'image` i
                '.Shop::addSqlAssociation('image', 'i').'
                LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (i.`id_product` = pl.`id_product`)
                LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')'.$where.' '.$order;

        return Db::getInstance()->executeS($sql);
    }
    public function getSecondImgs($productids)
    {
        $link = $this->context->link;
        $id_lang = Context::getContext()->language->id;
        $where  = ' WHERE i.`id_product` IN ('.$productids.') AND (i.`cover` IS NULL OR i.`cover` = 0)';
        $order  = ' ORDER BY i.`id_product`,`position`';
        $limit  = ' LIMIT 0,1';
        //get product info\
        $listImg = $this->getAllImages($id_lang, $where, $order, $limit);
        $savedImg = array();
        $obj = array();
        $this->smarty->assign(array('homeSize' => Image::getSize(ImageType::getFormatedName('home')),'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),'smallSize' => Image::getSize(ImageType::getFormatedName('small'))));
        foreach ($listImg as $product) {
            if (!in_array($product['id_product'], $savedImg)) {
                $obj[] = array('id'=>$product['id_product'],'content'=>($link->getImageLink($product['link_rewrite'], $product['id_image'], ImageType::getFormatedName('home'))));
            }
            $savedImg[] = $product['id_product'];
        }
        return $obj;
    }
    public function getColors($productids)
    {
        $product_ids = explode(",", $productids);
        $obj = array();
        $colorproducts = Product::getAttributesColorList($product_ids);
        foreach ($product_ids as $product_id) {
            $tpl = $this->context->smarty->createTemplate(_PS_THEME_DIR_.'product-list-colors.tpl', $colorproducts[$product_id]);
            if (isset($colorproducts[$product_id])) {
                $tpl->assign(array(
                    'id_product'  => $product_id,
                    'colors_list' => $colorproducts[$product_id],
                    'link'        => Context::getContext()->link,
                    'img_col_dir' => _THEME_COL_DIR_,
                    'col_img_dir' => _PS_COL_IMG_DIR_
                ));
            }
            $obj[] = array('id'=>$product_id,'content'=>($tpl->fetch()));
        }
        return $obj;
    }
}
