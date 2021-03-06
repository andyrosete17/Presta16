<?php
/**
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * We are experts and professionals in PrestaShop
 *
 * @author    PresTeamShop.com <support@presteamshop.com>
 * @copyright 2011-2017 PresTeamShop
 * @license   see file: LICENSE.txt
 * @category  PrestaShop
 * @category  Module
 * revision   12
 */

class OnePageCheckoutPSCore extends Module
{
    public $config_vars       = array();
    public $prefix_module     = '';
    protected $configure_vars = array();
    protected $errors         = array();
    protected $warnings       = array();
    protected $html           = '';
    protected $smarty;
    protected $cookie;
    protected $success;
    protected $params_back;
    public $globals;

    const CODE_SUCCESS = 0;
    const CODE_ERROR   = -1;

    public function __construct($name = null, $context = null)
    {
        $this->errors      = array();
        $this->warnings    = array();
        $this->params_back = array();
        $this->globals     = new stdClass();
        $this->fillGlobalVars();

        parent::__construct($name, $context);

        $file_smarty_config = _PS_ROOT_DIR_.'/config/smarty.config.inc.php';
        if (is_file($file_smarty_config)) {
            if (is_writable($file_smarty_config)) {
                $content = Tools::file_get_contents($file_smarty_config);

                if (!strstr($content, 'escapePTS')) {
                    $content .= '
                        //CODE MODULES PRESTEAMSHOP - PLEASE NOT REMOVE
                        //--------------------------------------------------------------------------------------------------------
                        smartyRegisterFunction($smarty, "modifier", "escape", "escapePTS");
                        function escapePTS($string, $esc_type = "html", $char_set = null, $double_encode = true, $as_html = false)
                        {
                            $smarty_escape = SMARTY_PLUGINS_DIR."modifier.escape.php";
                            include_once $smarty_escape;

                            if (!$as_html && is_callable("smarty_modifier_escape")) {
                                $string = call_user_func("smarty_modifier_escape", $string, $esc_type, $char_set, $double_encode);
                            }

                            return $string;
                        }
                        //--------------------------------------------------------------------------------------------------------
                    ';
                    file_put_contents($file_smarty_config, $content);
                }
            }
        }

        $file_uniform = _PS_THEME_DIR_.'js/autoload/15-jquery.uniform-modified.js';
        if (is_file($file_uniform)) {
            if (is_writable($file_uniform)) {
                $content_uniform = Tools::file_get_contents($file_uniform);

                if (!strstr($content_uniform, '.not(".not_unifrom, .not_uniform").uniform();')) {
                    $content_uniform = preg_replace(
                        '/'.preg_quote('.uniform();').'/i',
                        '.not(".not_unifrom, .not_uniform").uniform();',
                        $content_uniform
                    );

                    file_put_contents($file_uniform, $content_uniform);

                    rename($file_uniform, _PS_THEME_DIR_.'js/autoload/15-jquery.uniform-modified-pts.js');
                }
            }
        }

        $this->smarty = $this->context->smarty;
        $this->cookie = $this->context->cookie;

        $this->fillConfigVars();
    }

    public function install()
    {
        foreach ($this->configure_vars as $config) {
            if (!Configuration::updateValue($config['name'], $config['default_value'], $config['is_html'])) {
                return false;
            }
        }

        $this->installTab();

        if (!parent::install() || !$this->executeFileSQL('install')) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        foreach ($this->configure_vars as $config) {
            Configuration::deleteByName($config['name']);
        }

        if ($id_tab = Tab::getIdFromClassName('AdminActions'.$this->prefix_module)) {
            $tab = new Tab((int)$id_tab);
            $tab->delete();
        }

        if (!parent::uninstall() || !$this->executeFileSQL('uninstall')) {
            return false;
        }

        if (isset($this->context->smarty->registered_plugins['modifier']['escape'])) {
            $this->context->smarty->unregisterPlugin('modifier', 'escape');
        }

        //clear compile templates
        $this->context->smarty->clearCompiledTemplate();

        return true;
    }

    public function installTab()
    {
        $id_tab = Tab::getIdFromClassName('AdminActions'.$this->prefix_module);
        if (!empty($id_tab)) {
            $tab = new Tab((int)$id_tab);
            $tab->delete();
        }

        if (!Tab::getIdFromClassName('AdminActions'.$this->prefix_module)) {
            $name_tab = array();
            $languages = Language::getLanguages(false);
            foreach ($languages as $lang) {
                $name_tab[$lang['id_lang']] = $this->displayName;
            }

            $tab = new Tab();
            $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentModules');
            $tab->class_name = 'AdminActions'.$this->prefix_module;
            $tab->module = $this->name;
            $tab->name = $name_tab;
            $tab->save();
        }
    }

    private function fillGlobalVars()
    {
        $this->globals->type_control = (object) array(
                'select'   => 'select',
                'textbox'  => 'textbox',
                'textarea' => 'textarea',
                'radio'    => 'radio',
                'checkbox' => 'checkbox'
        );

        $this->globals->lang               = new stdClass();
        $this->globals->lang->type_control = array(
            'select'   => $this->l('List'),
            'textbox'  => $this->l('Textbox'),
            'textarea' => $this->l('Textarea'),
            'radio'    => $this->l('Radio button'),
            'checkbox' => $this->l('Checkbox')
        );
    }

    protected function displayForm()
    {
        if (!array_key_exists('JS_FILES', $this->params_back)) {
            $this->params_back['JS_FILES'] = array();
        }
        if (!array_key_exists('CSS_FILES', $this->params_back)) {
            $this->params_back['CSS_FILES'] = array();
        }

        //add anothers scripts
        if (version_compare(_PS_VERSION_, '1.6') < 0) {
            array_unshift(
                $this->params_back['JS_FILES'],
                $this->_path.'views/js/lib/bootstrap/pts/bootstrap.min.js?v='.$this->version
            );

            if (version_compare(_PS_VERSION_, '1.5') < 0) {
                //add jquery in lower version than 1.5
                array_unshift(
                    $this->params_back['JS_FILES'],
                    $this->_path.'views/js/lib/jquery/jquery.min/jquery.min.js?v='.$this->version
                );
            }

            //add bootstrap files if issen't 1.6
        }

        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/lib/jquery/plugins/growl/jquery.growl.css?v='.$this->version
        );
        array_push(
            $this->params_back['JS_FILES'],
            $this->_path.'views/js/lib/jquery/plugins/growl/jquery.growl.js?v='.$this->version
        );

        //own bootstrap
        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/lib/bootstrap/pts/pts-bootstrap.css?v='.$this->version
        );

        //switch
        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/lib/simple-switch/simple-switch.css?v='.$this->version
        );

        //back
        array_push(
            $this->params_back['JS_FILES'],
            $this->_path.'views/js/admin/configure.js?v='.$this->version
        );
        array_push(
            $this->params_back['JS_FILES'],
            $this->_path.'views/js/lib/pts/tools.js?v='.$this->version
        );
        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/admin/configure.css?v='.$this->version
        );
        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/lib/pts/tools.css?v='.$this->version
        );
        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/lib/pts/pts-menu.css?v='.$this->version
        );

        //icons
        array_push(
            $this->params_back['CSS_FILES'],
            $this->_path.'views/css/lib/font-awesome/font-awesome.css?v='.$this->version
        );

        $iso = Language::getIsoById((int) Configuration::get('PS_LANG_DEFAULT'));

        $server_name = Tools::strtolower($_SERVER['SERVER_NAME']);
        $server_name = str_ireplace('www.', '', $server_name);

        $url_store = $this->getUrlStore().$this->context->shop->getBaseURI().'modules/'.$this->name;

        $query_string = str_replace('&conf=12', '', $_SERVER['QUERY_STRING']);
        $action_url = Tools::safeOutput($_SERVER['PHP_SELF']).'?'.$query_string;

        $this->params_back = array_merge(array(
            'ACTIONS_CONTROLLER_URL' => $this->context->link->getAdminLink('AdminActions'.$this->prefix_module),
            'MODULE_DIR'                         => $this->_path,
            'MODULE_IMG'                         => $this->_path.'views/img/',
            'MODULE_NAME'                        => $this->name,
            'MODULE_VERSION'                     => $this->version,
            'MODULE_TPL'                         => _PS_ROOT_DIR_.'/modules/'.$this->name.'/',
            'CONFIGS'                            => $this->config_vars,
            'ISO_LANG'                           => $iso,
            'GLOBALS'                            => $this->globals,
            'VERSION'                            => $this->version,
            'SUCCESS_CODE'                       => self::CODE_SUCCESS,
            'ERROR_CODE'                         => self::CODE_ERROR,
            'SERVER_NAME'                        => $server_name,
            'MODULE_PATH_ABSOLUTE'               => realpath(dirname(__FILE__).'/../'),
            'URL_STORE'                          => $url_store,
            'ACTION_URL'                         => $action_url,
            'WARNINGS'                           => $this->warnings,
            $this->prefix_module.'_STATIC_TOKEN' => Tools::encrypt($this->name.'/index'),
            ), $this->params_back);

        $this->smarty->assign('paramsBack', $this->params_back);
    }

    private function executeFileSQL($file_name)
    {
        if (!file_exists(dirname(__FILE__).'/../sql/'.$file_name.'.sql')) {
            return true;
        } elseif (!$sql = Tools::file_get_contents(dirname(__FILE__).'/../sql/'.$file_name.'.sql')) {
            return false;
        }

        $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
        $sql = str_replace('MYSQL_ENGINE', _MYSQL_ENGINE_, $sql);
        $sql = preg_split("/;\s*[\r\n]+/", $sql);

        foreach ($sql as $query) {
            if (!Db::getInstance()->Execute(trim($query))) {
                return false;
            }
        }

        return true;
    }

    protected function fillConfigVars()
    {
        if (!Module::isInstalled($this->name)) {
            return false;
        }

        $languages = Language::getLanguages(false);
        foreach ($this->configure_vars as $config) {
            /*if (!Configuration::getIdByName($config['name'])) {
                Configuration::updateValue(
                    $config['name'],
                    $config['default_value'],
                    array_key_exists('is_html', $config) ? $config['is_html'] : false
                );
            }*/

            if (isset($config['is_bool']) && $config['is_bool']) {
                $this->config_vars[$config['name']] = (bool)Configuration::get($config['name']);
            } else {
                $this->config_vars[$config['name']] = Configuration::get($config['name']);

                if (isset($config['is_lang']) && $config['is_lang']) {
                    $this->config_vars[$config['name']] = array();
                    foreach ($languages as $language) {
                        $this->config_vars[$config['name']][$language['id_lang']] = Configuration::get(
                            $config['name'],
                            $language['id_lang']
                        );
                    }
                }
            }
        }
        $this->config_vars[$this->prefix_module.'_RM'] = Configuration::get($this->prefix_module.'_RM');
    }

    protected function displayErrors($return = true)
    {
        if (count($this->errors)) {
            $html = '
    		<div class="alert alert-warning">
    			<ol>';
            foreach ($this->errors as $error) {
                $html .= '<li>'.$error.'</li>';
            }
            $html .= '
    			</ol>
    		</div>';

            if ($return) {
                $this->html = $html;
            } else {
                echo $html;
            }
        }
    }

    protected function displayWarnings($return = true)
    {
        if (count($this->warning)) {
            $html = '
    		<div class="alert alert-warning">
    			<ol>';
            foreach ($this->warning as $warning) {
                $html .= '<li>'.$warning.'</li>';
            }
            $html .= '
    			</ol>
    		</div>';

            if ($return) {
                $this->html = $html;
            } else {
                echo $html;
            }
        }
    }

    protected function sendEmail(
        $email,
        $subject,
        $values = array(),
        $template_name = 'default',
        $email_from = null,
        $to_name = null,
        $lang = null,
        $file_attachment = null
    ) {
        if ($lang == null) {
            $lang = (int) Configuration::get('PS_LANG_DEFAULT');
        }
        if ($email_from == null) {
            $email_from = (string) Configuration::get('PS_SHOP_EMAIL');
        }

        return Mail::Send(
            $lang,
            $template_name,
            $subject,
            $values,
            $email,
            $to_name,
            $email_from,
            null,
            $file_attachment,
            null,
            _PS_MODULE_DIR_.$this->name.'/mails/'
        );
    }

    public function updateVersion()
    {
        $registered_version = Configuration::get($this->prefix_module.'_VERSION');

        if ($registered_version != $this->version) {
            $list = array();

            $upgrade_path = _PS_MODULE_DIR_.$this->name.'/upgrades/';

            // Check if folder exist and it could be read
            if (file_exists($upgrade_path) && ($files = scandir($upgrade_path))) {
                // Read each file name
                foreach ($files as $file) {
                    if (!in_array($file, array('.', '..', '.svn', 'index.php'))) {
                        $tab          = explode('-', $file);
                        $file_version = basename($tab[1], '.php');
                        // Compare version, if minor than actual, we need to upgrade the module
                        if (count($tab) == 2 && version_compare($registered_version, $file_version) < 0) {
                            $list[] = array(
                                'file'             => $upgrade_path.$file,
                                'version'          => $file_version,
                                'upgrade_function' => 'upgrade_module_'.str_replace('.', '_', $file_version));
                        }
                    }
                }
            }
            usort($list, array($this, 'moduleVersionSort'));
            foreach ($list as $num => $file_detail) {
                include $file_detail['file'];

                // Call the upgrade function if defined
                if (function_exists($file_detail['upgrade_function'])) {
                    $file_detail['upgrade_function']($this);
                }

                unset($list[$num]);
            }

            Configuration::updateValue($this->prefix_module.'_VERSION', $this->version);

            $this->fillConfigVars();
        }

        return 'OK';
    }

    public function checkModulePTS()
    {
        return true;
    }

    public function isVisible()
    {
        $display_module = true;
        $enable_debug = $this->config_vars[$this->prefix_module.'_ENABLE_DEBUG'];

        if ($enable_debug) {
            $display_module = false;
            $my_ip = Tools::getRemoteAddr();
            $ip_debug = $this->config_vars[$this->prefix_module.'_IP_DEBUG'];
            $array_ips_debug = explode(',', $ip_debug);

            if (in_array($my_ip, $array_ips_debug)) {
                $display_module = true;
            }
        }

        if ($display_module) {
            $registered_version = Configuration::get($this->prefix_module.'_VERSION');
            if ($registered_version != $this->version) {
                $display_module = false;
            }
        }

        return $display_module;
    }

    protected function copyOverride($file)
    {
        $source = _PS_MODULE_DIR_.$this->name.'/public/'.$file;
        $dest   = _PS_ROOT_DIR_.'/'.$file;

        $path_dest = dirname($dest);

        if (!is_dir($path_dest)) {
            if (!mkdir($path_dest, 0777, true)) {
                return false;
            }
        }

        if (@copy($source, $dest)) {
            $path_cache_file = _PS_ROOT_DIR_.'/cache/class_index.php';
            if (file_exists($path_cache_file)) {
                unlink($path_cache_file);
            }

            return true;
        }

        return false;
    }

    protected function existOverride($filename, $key = false)
    {
        $file = _PS_ROOT_DIR_.'/'.$filename;

        if (file_exists($file)) {
            if ($key) {
                $file_content = Tools::file_get_contents($file);
                if (preg_match($key, $file_content) > 0) {
                    return true;
                }

                return false;
            }

            return true;
        }

        return false;
    }

    public function isModuleActive($name_module, $function_exist = false)
    {
        if (Module::isInstalled($name_module)) {
            $module = Module::getInstanceByName($name_module);
            if (Validate::isLoadedObject($module) && $module->active) {
                if ($function_exist) {
                    if (method_exists($module, $function_exist)) {
                        return $module;
                    } else {
                        return false;
                    }
                }

                return $module;
            }
        }

        return false;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function getUrlStore()
    {
        return (Configuration::get('PS_SSL_ENABLED') ? Tools::getShopDomainSsl(true) : Tools::getShopDomain(true));
    }

    public static function getServerIpAddress()
    {
        $server_addr = $_SERVER['SERVER_ADDR'];
        if ($server_addr === '::1') {
            $hostname    = php_uname('n');
            $server_addr = gethostbyname($hostname);
        }

        return $server_addr;
    }

    private function moduleVersionSort($a, $b)
    {
        return version_compare($a['version'], $b['version']);
    }

    /**
     * Customize save data from form.
     * @param type $option
     * @param string $config_var_value
     */
    protected function saveCustomConfigValue($option, &$config_var_value)
    {
        switch ($option['name']) {
            case 'custom':
                $config_var_value = '';
                break;
        }
    }

    /**
     * @internal This method is not editable, use <b>saveCustomConfigValue</b> if necessary
     * @param type $option
     */
    protected function saveConfigValue($option)
    {
        $config_var_name = $this->prefix_module.'_'.$option['name'];
        $config_var_name = Tools::strtoupper($config_var_name);

        if (array_key_exists($config_var_name, $this->config_vars)) {
            if (isset($option['multilang'])) {
                $languages        = Language::getLanguages(false);
                $config_var_value = array();

                foreach ($languages as $language) {
                    $config_var_value[$language['id_lang']] = Tools::getValue($option['name'].'_'.$language['id_lang']);
                }
            } else {
                $config_var_value = Tools::getValue($option['name'], null);
            }

            switch ($option['type']) {
                case $this->globals->type_control->checkbox:
                    $config_var_value = (int) ((is_null($config_var_value) || empty($config_var_value)) ? false : true);
                    break;
                case $this->globals->type_control->select:
                    if (isset($option['multiple']) && $option['multiple']) {
                        if (is_array($config_var_value) && count($config_var_value)) {
                            $config_var_value = implode(',', $config_var_value);
                        } else {
                            $config_var_value = '';
                        }
                    }
                    break;
                default:
                    $config_var_value = (is_null($config_var_value)) ? '' : $config_var_value;
                    break;
            }

            //call function to save some options by custom restrictions or data treatment
            $this->saveCustomConfigValue($option, $config_var_value);

            //save value
            if (!Configuration::updateValue($config_var_name, $config_var_value)) {
                $this->errors[] = $this->l('An error occurred while trying update').': '.$option['label'];
            }

            //if dependencies
            if (isset($option['depends']) && is_array($option['depends']) && count($option['depends'])) {
                foreach ($option['depends'] as $dependency_option) {
                    $this->saveConfigValue($dependency_option);
                }
            }
        }
    }

    /**
     * Save data configuration from post form.
     * @param type $form
     */
    protected function saveFormData($form)
    {
        if (isset($form['options']) && is_array($form['options']) && count($form['options'])) {
            foreach ($form['options'] as $option) {
                $this->saveConfigValue($option);
            }
            $this->fillConfigVars();
        }
    }

    public function writeLog($error = null)
    {
        $name_error = Tools::getValue('name_error', 'Internal error');
        $code_error = Tools::getValue('code_error', '000');
        $error      = Tools::getValue('error', $error);
        $data_sent  = Tools::getValue('data_sent');

        $name_log = date('Ymd').'_error.log';

        $message = '['.$code_error.'] '.$name_error."\n".$error."\n\n".$data_sent."\n";
        $message .= '----------------------------------------------------------------'."\n\n";

        $file_log = fopen(dirname(__FILE__).'/../log/'.$name_log, 'a+');
        fwrite($file_log, $message);
        fclose($file_log);

        if (class_exists('PrestaShopLogger')) {
            PrestaShopLogger::addLog($message, 3, $code_error, 'OnePageCheckoutPS');
        }

        return 'An internal error has occurred. Please inform the administrator of the store, thank you.';
    }

    protected function truncateChars($text, $limit, $ellipsis = '...')
    {
        if (Tools::strlen($text) > $limit) {
            $text = trim(Tools::substr($text, 0, $limit)).$ellipsis;
        }

        return $text;
    }

    protected function getCacheId($extra_params = array())
    {
        $cacheId = '';
        $cache_array = array();

        $cache_array[] = $this->name;
        $cache_array[] = (int)$this->context->shop->id;
        $cache_array[] = (int)$this->context->language->id;
        $cache_array[] = (int)$this->context->currency->id;

        $cacheId = implode('|', $cache_array);
        $cacheId .= '|'.implode('|', $extra_params);

        return $cacheId;
    }

    protected static function getFormatedName($name)
    {
        $theme_name = Context::getContext()->shop->theme_name;
        $name_without_theme_name = str_replace(array('_'.$theme_name, $theme_name.'_'), '', $name);

        //check if the theme name is already in $name if yes only return $name
        if (strstr($name, $theme_name) && self::getByNameNType($name)) {
            return $name;
        } elseif (self::getByNameNType($name_without_theme_name.'_'.$theme_name)) {
            return $name_without_theme_name.'_'.$theme_name;
        } elseif (self::getByNameNType($theme_name.'_'.$name_without_theme_name)) {
            return $theme_name.'_'.$name_without_theme_name;
        } else {
            return $name_without_theme_name.'_default';
        }
    }

    public static function getByNameNType($name, $type = null)
    {
        $results = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'image_type`');

        $types = array('products', 'categories', 'manufacturers', 'suppliers', 'scenes', 'stores');
        $total = count($types);
        foreach ($results as $result) {
            foreach ($result as $value) {
                $value = $value;
                for ($i = 0; $i < $total; ++$i) {
                    if ($name === $result['name'] && $types[$i] === $type) {
                        return $result;
                    }
                }
            }
        }
        return false;
    }
}
