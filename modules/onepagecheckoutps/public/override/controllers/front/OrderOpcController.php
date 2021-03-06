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
 */

class OrderOpcController extends OrderOpcControllerCore
{
    /*
    * module: onepagecheckoutps
    * date: 2017-06-15
    * version: 2.3.4
    */

    /* KEY_OPC_2.3.5 */
    public $php_self    = 'order-opc';
    public $ssl         = true;
    public $name_module = 'onepagecheckoutps';
    public $onepagecheckoutps;
    public $onepagecheckoutps_dir;
    public $onepagecheckoutps_tpl;
    public $isLogged;
    public $opc_fields;
    public $is_active_module;
    private $name_file;
    private $only_register = false;

    public function __construct()
    {
        $this->guestAllowed = true;

        $this->onepagecheckoutps_dir = __PS_BASE_URI__.'modules/'.$this->name_module.'/';
        $this->onepagecheckoutps_tpl = _PS_ROOT_DIR_.'/modules/'.$this->name_module.'/';

        $this->name_file = Tools::substr(basename(__FILE__), 0, Tools::strlen(basename(__FILE__)) - 4);

        parent::__construct();
    }

    public function init()
    {
        $this->onepagecheckoutps = Module::getInstanceByName($this->name_module);

        $show_authentication = false;

        if ($this->onepagecheckoutps->isModuleActive('kiala')) {
            $show_authentication = true;
        }
        if ($this->onepagecheckoutps->isModuleActive('imaxmailactivate')) {
            $show_authentication = true;
        }
        if ($this->onepagecheckoutps->isModuleActive('emailverificationopc')) {
            $show_authentication = true;
        }
        if ($this->onepagecheckoutps->isModuleActive('bbcarrier')) {
            $show_authentication = true;
        }
        /*if ($this->onepagecheckoutps->isModuleActive('soliberte')) {
            $show_authentication = true;
        }*/
        /*if ($this->onepagecheckoutps->isModuleActive('pronesis_bancasella')) {
            $show_authentication = true;
        }*/
        /*if ($this->onepagecheckoutps->isModuleActive('checkvat')) {
            $show_authentication = true;
        }*/

        if ((Tools::getIsset('rc')
            || $show_authentication)
            && !$this->context->customer->isLogged()
            && Validate::isLoadedObject($this->context->cart)
        ) {
            $this->display_column_right = true;
            $this->display_column_left  = true;
        } else {
            $this->display_column_right = false;
            $this->display_column_left  = false;
        }

        parent::init();

        if (Validate::isLoadedObject($this->onepagecheckoutps)
            && $this->onepagecheckoutps->isModuleActive($this->name_module)
        ) {
            $this->is_active_module = true;
        } else {
            $this->is_active_module = false;
        }

        if (!$this->onepagecheckoutps->checkModulePTS()) {
            $this->is_active_module = false;
        }

        if (!$this->onepagecheckoutps->isVisible()) {
            $this->is_active_module = false;
        }

        if (!$this->is_active_module) {
            return;
        }

        if (Tools::getIsset('isPaymentStep') && $this->onepagecheckoutps->isModuleActive('paypal')) {
            Tools::redirect('index.php?controller=order-opc');
        }
        
        if (isset($this->context->cookie->express_checkout) && $this->onepagecheckoutps->isModuleActive('paypal')) {
            $paypal = Module::getInstanceByName('paypal');

            if (method_exists($paypal, 'redirectToConfirmation')) {
                $paypal->redirectToConfirmation();
            }
        }

        if (isset($this->context->cookie->paypal_express_checkout_token)
            && isset($this->context->cookie->paypal_express_checkout_payer_id)
            && Tools::getIsset('isPaymentStep')
            && $this->onepagecheckoutps->isModuleActive('paypalmx')
        ) {
            Tools::redirect($this->context->link->getModuleLink(
                'onepagecheckoutps',
                'payment',
                array('pm' => 'paypalmx', 'isPaymentStep' => 'true')
            ));
        }

        //support module eydatepicker
        if ($this->context->cart->nbProducts()) {
            if (Tools::isSubmit('ajax')) {
                if (Tools::isSubmit('method')) {
                    switch (Tools::getValue('method')) {
                        case 'updateCarrierAndGetPayments':
                            $return = array(
                                'summary' => array(
                                    'load' => false,
                                    'HOOK_SHOPPING_CART' => '',
                                    'HOOK_SHOPPING_CART_EXTRA' => ''
                                )
                            );
                            die(Tools::jsonEncode($return));
                    }
                }
            }
        }

        $emailverificationopc = $this->onepagecheckoutps->isModuleActive('emailverificationopc');
        if ($emailverificationopc) {
            if (isset($this->context->cookie->check_account)) {
                $require_email_verified = Configuration::get('EVOPC_REQUIRE_VERIFY_EMAIL');

                if ($require_email_verified) {
                    $url = $this->context->link->getModuleLink('emailverificationopc', 'verifyemail', array(
                        'token' => Tools::encrypt('emailverificationopc/index')
                    ));
                    Tools::redirect($url);
                }
            }
        }

        if (Tools::getIsset('rc')) {
            $this->only_register = true;
        } else if ($show_authentication && (!$this->context->customer->isLogged() && !$this->context->customer->isGuest())) {
            $this->only_register = true;
        }

        if ($this->only_register) {
            if ($this->context->customer->isLogged() || $this->context->customer->isGuest()) {
                $meta_authentication = Meta::getMetaByPage('my-account', $this->context->language->id);
            } else {
                $meta_authentication = Meta::getMetaByPage('authentication', $this->context->language->id);
            }

            $this->context->smarty->assign('meta_title', $meta_authentication['title']);
            $this->context->smarty->assign('meta_description', $meta_authentication['description']);
        }

        $this->context->smarty->assign('show_authentication', $show_authentication);
        $this->context->smarty->assign('register_customer', $this->only_register);
    }

    public function initContent()
    {
        parent::initContent();

        $language = $this->context->language;
        $smarty = $this->context->smarty;

        if (!$this->is_active_module) {
            return;
        }

        if ($this->onepagecheckoutps->config_vars['OPC_REDIRECT_DIRECTLY_TO_OPC']
            && !Tools::getIsset('step')
            && !Tools::getIsset('checkout')
            && !Tools::getIsset('rc')
        ) {
            $this->_assignSummaryInformations();
            $smarty->assign(array(
                'opc' => false
            ));
            $this->setTemplate(_PS_THEME_DIR_.'shopping-cart.tpl');
        } else {
            //-----------------------------------------------------------------------------
            $selected_country = (int) FieldClass::getDefaultValue('delivery', 'id_country');
            if (!$this->context->customer->isLogged() && (Configuration::get('PS_GEOLOCATION_ENABLED'))) {
                if ($this->context->country->active) {
                    $selected_country = $this->context->country->id;
                }
            }

            if (Configuration::get('PS_RESTRICT_DELIVERED_COUNTRIES')) {
                $countries = Carrier::getDeliveredCountries($language->id, true, true);
            } else {
                $countries = Country::getCountries($language->id, true);
            }

            $countries_js = array();
            $countriesNeedIDNumber = array();
            $countriesNeedZipCode = array();
            $countriesIsoCode = array();

            foreach ($countries as $country) {
                $countriesIsoCode[$country['id_country']] = $country['iso_code'];
                $countriesNeedIDNumber[$country['id_country']] = (int)$country['need_identification_number'];

                //if ($country['need_zip_code'] == 1) {
                if (!empty($country['zip_code_format'])) {
                    $countriesNeedZipCode[$country['id_country']] = $country['zip_code_format'];
                }

                if ($country['contains_states'] == 1 && isset($country['states']) && count($country['states']) > 0) {
                    foreach ($country['states'] as $state) {
                        if ($state['active'] == 1) {
                            $countries_js[$country['id_country']][] = array(
                                'id' => $state['id_state'],
                                'name' => $state['name'],
                                'iso_code' => $state['iso_code']
                            );
                        }
                    }
                }
            }

            $smarty->assign(array(
                'countries'                     => Tools::jsonEncode($countries_js),
                'countriesNeedIDNumber'         => Tools::jsonEncode($countriesNeedIDNumber),
                'countriesNeedZipCode'          => Tools::jsonEncode($countriesNeedZipCode),
                'countriesIsoCode'              => Tools::jsonEncode($countriesIsoCode)
            ));

            //-----------------------------------------------------------------------------
            //GROUP CUSTOMER
            //-----------------------------------------------------------------------------
            $groups            = Group::getGroups($this->context->cookie->id_lang);
            $groups_availables = '';

            if (!empty($this->onepagecheckoutps->config_vars['OPC_CHOICE_GROUP_CUSTOMER_ALLOW'])) {
                $groups_availables = explode(
                    ',',
                    $this->onepagecheckoutps->config_vars['OPC_CHOICE_GROUP_CUSTOMER_ALLOW']
                );
            }

            foreach ($groups as $key => $group) {
                if (is_array($groups_availables)) {
                    if (!in_array($group['id_group'], $groups_availables)) {
                        unset($groups[$key]);
                    }
                }
            }
            //-----------------------------------------------------------------------------

            $opc_fields          = array();
            $opc_fields_position = array();
            $is_need_invoice     = false;

            $fields = FieldControl::getAllFields($this->context->cookie->id_lang);

            foreach ($fields as $field) {
                if (!$field->active || (Tools::getIsset('rc') && $field->is_custom)) {
                    continue;
                }

                $field->capitalize = false;
                if (in_array($field->name, $this->onepagecheckoutps->fields_to_capitalize)
                    && $this->onepagecheckoutps->config_vars['OPC_CAPITALIZE_FIELDS']
                ) {
                    $field->capitalize = true;
                }

                if ($field->object == $this->onepagecheckoutps->globals->object->customer) {
                    if ($field->name == 'id_gender') {
                        $genders = array();
                        foreach (Gender::getGenders() as $i => $gender) {
                            $genders[$i]['id_gender'] = $gender->id_gender;
                            $genders[$i]['name']      = $gender->name;
                        }

                        $field->options = array(
                            'value'       => 'id_gender',
                            'description' => 'name',
                            'data'        => $genders
                        );
                    } elseif ($field->name == 'passwd') {
                        if ($this->isLogged) {
                            continue;
                        }

                        if ($this->onepagecheckoutps->config_vars['OPC_REQUEST_PASSWORD'] &&
                            $this->onepagecheckoutps->config_vars['OPC_OPTION_AUTOGENERATE_PASSWORD'] &&
                            !Configuration::get('PS_GUEST_CHECKOUT_ENABLED')) {
                            $new_field = new FieldControl();

                            $new_field->name          = 'checkbox_create_account';
                            $new_field->id_control    = 'checkbox_create_account';
                            $new_field->name_control  = 'checkbox_create_account';
                            $new_field->object        = 'customer';
                            $new_field->description   = $this->onepagecheckoutps->getMessageError(0);
                            $new_field->type          = 'isBool';
                            $new_field->size          = '0';
                            $new_field->type_control  = 'checkbox';
                            $new_field->default_value = '0';
                            $new_field->required      = false;
                            $new_field->is_custom     = false;
                            $new_field->active        = true;
//                            $new_field->classes .= ' col-xs-12';

                            $opc_fields[$new_field->object.'_'.$new_field->name] = $new_field;
                        }

                        //add checkbox guest checkout
                        if (Configuration::get('PS_GUEST_CHECKOUT_ENABLED')) {
                            $new_field = new FieldControl();

                            $new_field->name          = 'checkbox_create_account_guest';
                            $new_field->id_control    = 'checkbox_create_account_guest';
                            $new_field->name_control  = 'checkbox_create_account_guest';
                            $new_field->object        = 'customer';
                            $new_field->description   = $this->onepagecheckoutps->getMessageError(1);
                            $new_field->type          = 'isBool';
                            $new_field->size          = '0';
                            $new_field->type_control  = 'checkbox';
                            $new_field->default_value = '0';
                            $new_field->required      = false;
                            $new_field->is_custom     = false;
                            $new_field->active        = true;
//                            $new_field->classes = 'col-xs-12';

                            $opc_fields[$new_field->object.'_'.$new_field->name] = $new_field;
                        }

                        if ($this->onepagecheckoutps->config_vars['OPC_REQUEST_PASSWORD']) {
                            //add field password
                            $field->name_control = 'passwd_confirmation';

                            if ((int) $this->onepagecheckoutps->config_vars['OPC_OPTION_AUTOGENERATE_PASSWORD']) {
                                $field->required = false;
                            } else {
                                $field->required = true;
                            }

                            $opc_fields[$field->object.'_'.$field->name] = $field;

                            //add field confirmation password
                            $new_field = new FieldControl();

                            $new_field->name          = 'conf_passwd';
                            $new_field->id_control    = 'customer_conf_passwd';
                            $new_field->name_control  = 'passwd';
                            $new_field->object        = 'customer';
                            $new_field->description   = $this->onepagecheckoutps->getMessageError(2);
                            $new_field->type          = 'confirmation';
                            $new_field->size          = '32';
                            $new_field->type_control  = 'textbox';
                            $new_field->default_value = '';

                            if ((int) $this->onepagecheckoutps->config_vars['OPC_OPTION_AUTOGENERATE_PASSWORD']) {
                                $new_field->required = false;
                            } else {
                                $new_field->required = true;
                            }

                            $new_field->is_custom = false;
                            $new_field->active    = true;
                            $new_field->is_passwd = true;

                            $opc_fields[$new_field->object.'_'.$new_field->name] = $new_field;
                        }

                        continue;
                    } elseif ($field->name == 'email') {
                        if (!$this->isLogged) {
                            //add field email
                            $field->name_control                         = 'email_confirmation';
                            $opc_fields[$field->object.'_'.$field->name] = $field;

                            if ($this->onepagecheckoutps->config_vars['OPC_REQUEST_CONFIRM_EMAIL']
                                && !$this->isLogged
                            ) {
                                //add field confirmation email
                                $new_field = new FieldControl();

                                $new_field->name                                     = 'conf_email';
                                $new_field->id_control                               = 'customer_conf_email';
                                $new_field->name_control                             = 'email';
                                $new_field->object                                   = 'customer';
                                $new_field->description = $this->onepagecheckoutps->getMessageError(3);
                                $new_field->type                                     = 'confirmation';
                                $new_field->size                                     = '128';
                                $new_field->type_control                             = 'textbox';
                                $new_field->default_value                            = '';
                                $new_field->required                                 = $field->required;
                                $new_field->is_custom                                = false;
                                $new_field->active                                   = true;
                                $opc_fields[$new_field->object.'_'.$new_field->name] = $new_field;
                            }

                            if ($this->onepagecheckoutps->config_vars['OPC_CHOICE_GROUP_CUSTOMER']
                                && !$this->isLogged
                            ) {
                                //add field confirmation email
                                $new_field = new FieldControl();

                                $new_field->name          = 'group_customer';
                                $new_field->id_control    = 'group_customer';
                                $new_field->name_control  = 'group_customer';
                                $new_field->object        = 'customer';
                                $new_field->description   = $this->onepagecheckoutps->getMessageError(4);
                                $new_field->type          = 'isInt';
                                $new_field->size          = '11';
                                $new_field->type_control  = 'select';
                                $new_field->default_value = '';
                                $new_field->required      = false;
                                $new_field->is_custom     = false;
                                $new_field->active        = true;
                                $new_field->options       = array(
                                    'empty_option' => true,
                                    'value'        => 'id_group',
                                    'description'  => 'name',
                                    'data'         => $groups
                                );

                                $opc_fields[$new_field->object.'_'.$new_field->name] = $new_field;
                            }

                            continue;
                        }
                    }
                } elseif ($field->object == $this->onepagecheckoutps->globals->object->delivery) {
                    if ($this->onepagecheckoutps->config_vars['OPC_USE_SAME_NAME_CONTACT_DA']) {
                        if ($field->name == 'firstname') {
                            continue;
                        } elseif ($field->name == 'lastname') {
                            continue;
                        }
                    }
                } elseif ($field->object == $this->onepagecheckoutps->globals->object->invoice) {
                    if ($this->onepagecheckoutps->config_vars['OPC_ENABLE_INVOICE_ADDRESS']) {
                        if ($this->onepagecheckoutps->config_vars['OPC_USE_SAME_NAME_CONTACT_BA']) {
                            if ($field->name == 'firstname') {
                                continue;
                            } elseif ($field->name == 'lastname') {
                                continue;
                            }
                        }

                        if ($this->onepagecheckoutps->config_vars['OPC_REQUIRED_INVOICE_ADDRESS']) {
                            $is_need_invoice = true;
                        }
                    }
                }

                if ($field->name == 'id_country') {
                    $field->default_value = $selected_country;
                    $field->options       = array(
                        'empty_option' => true,
                        'value'        => 'id_country',
                        'description'  => 'name',
                        'data'         => $countries
                    );
                }

                if ($field->name == 'vat_number') {
                    $module = $this->onepagecheckoutps->isModuleActive('vatnumber');
                    if ($module) {
                        if (Configuration::get('VATNUMBER_MANAGEMENT') || Configuration::get('VATNUMBER_CHECKING')) {
                            $field->type = 'isVatNumber';
                        }
                    }
                    $module = $this->onepagecheckoutps->isModuleActive('checkvat');
                    if ($module) {
                        $field->type = 'isVatNumber';
                    }
                }

                $opc_fields[$field->object.'_'.$field->name] = $field;
            }

            $fields_position = $this->onepagecheckoutps->getFieldsPosition();
            if ($fields_position) {
                foreach ($fields_position as $group => $rows) {
                    foreach ($rows as $row => $fields) {
                        foreach ($fields as $position => $field) {
                            if ($field->name == 'id' && $group == 'customer') {
                                if (isset($opc_fields[$field->object.'_group_customer'])) {
                                    $index = $field->object.'_group_customer';
                                    $opc_fields_position[$group][$row - 2][$position - 1] = $opc_fields[$index];
                                }
                            }

                            //aditional field before
                            if ($field->name == 'passwd') {
                                if (isset($opc_fields[$field->object.'_checkbox_create_account'])) {
                                    $index = $field->object.'_checkbox_create_account';
                                    $opc_fields_position[$group][-1][-1] = $opc_fields[$index];
                                }
                                if (isset($opc_fields[$field->object.'_checkbox_create_account_guest'])) {
                                    $index = $field->object.'_checkbox_create_account_guest';
                                    $opc_fields_position[$group][-1][-1] = $opc_fields[$index];
                                }
                            }

                            //field
                            if (isset($opc_fields[$field->object.'_'.$field->name])) {
                                $index = $field->object.'_'.$field->name;
                                $opc_fields_position[$group][$row][$position] = $opc_fields[$index];
                            }

                            //aditional field after
                            if ($field->name == 'passwd') {
                                if (isset($opc_fields[$field->object.'_conf_passwd'])) {
                                    $index                                            = $field->object.'_conf_passwd';
                                    $opc_fields_position[$group][$row][$position + 1] = $opc_fields[$index];
                                }
                            } elseif ($field->name == 'email') {
                                if (isset($opc_fields[$field->object.'_conf_email'])) {
                                    $index                                            = $field->object.'_conf_email';
                                    $opc_fields_position[$group][$row][$position + 1] = $opc_fields[$index];
                                }
                            }
                        }
                    }
                }
            }

            $is_old_browser = false;
            preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if (count($matches) < 2) {
                preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            }
            if (count($matches) > 1) {
                //Then we're using IE
                $version = $matches[1];
                if ($version <= 8) {
                    $is_old_browser = true;
                }
            }

            $smarty->assign(array(
                'OPC_GLOBALS'     => $this->onepagecheckoutps->globals,
                'OPC_FIELDS'      => $opc_fields_position,
                'is_need_invoice' => $is_need_invoice
            ));

            $newsletter = false;
            if (Module::isInstalled('blocknewsletter')) {
                $newsletter = (int) Module::getInstanceByName('blocknewsletter')->active;
            }

            $is_set_invoice = false;
            if (isset($this->context->cookie->is_set_invoice)) {
                $is_set_invoice = $this->context->cookie->is_set_invoice;
            }
            
            $date_format_language = $this->onepagecheckoutps->dateFormartPHPtoJqueryUI($language->date_format_lite);

            $opc_social_networks = $this->onepagecheckoutps->config_vars['OPC_SOCIAL_NETWORKS'];
            $opc_social_networks = Tools::jsonDecode($opc_social_networks);

            $id_country_delivery_default = FieldClass::getDefaultValue('delivery', 'id_country');
            $iso_code_country_delivery_default = Country::getIsoById($id_country_delivery_default);

            $id_country_invoice_default = FieldClass::getDefaultValue('invoice', 'id_country');
            $iso_code_country_invoice_default = Country::getIsoById($id_country_invoice_default);

            $sql_payment_module = 'SELECT * FROM '._DB_PREFIX_.'opc_ship_to_pay';
            $have_ship_to_pay = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql_payment_module);

            $smarty->assign(array(
                'ONEPAGECHECKOUTPS_DIR'       => $this->onepagecheckoutps_dir,
                'ONEPAGECHECKOUTPS_TPL'       => $this->onepagecheckoutps_tpl,
                'ONEPAGECHECKOUTPS_IMG'       => $this->onepagecheckoutps_dir.'views/img/',
                'ACTION_URL'                  => Tools::safeOutput($_SERVER['PHP_SELF']).'?'.$_SERVER['QUERY_STRING'],
                'CONFIGS'                     => $this->onepagecheckoutps->config_vars,
                'CONFIGS_JS' => Tools::jsonEncode($this->onepagecheckoutps->config_vars),
                'IS_VIRTUAL_CART'             => $this->context->cart->isVirtualCart(),
                'IS_LOGGED'                   => $this->isLogged,
                'newsletter'                  => $newsletter,
                'no_products'                 => $this->context->cart->nbProducts(),
                'back'                        => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
                'id_address_delivery'         => $this->context->cart->id_address_delivery,
                'id_address_invoice'          => $this->context->cart->id_address_invoice,
                'PS_GUEST_CHECKOUT_ENABLED'   => Configuration::get('PS_GUEST_CHECKOUT_ENABLED'),
                'IS_GUEST'                    => $this->context->cookie->is_guest,
                'is_set_invoice'              => $is_set_invoice,
                'is_old_browser'              => $is_old_browser,
                'date_format_language'        => $date_format_language,
                'id_country_delivery_default' => $id_country_delivery_default,
                'id_country_invoice_default'  => $id_country_invoice_default,
                'iso_code_country_delivery_default' => $iso_code_country_delivery_default,
                'iso_code_country_invoice_default' => $iso_code_country_invoice_default,
                'opc_social_networks'         => $opc_social_networks,
                'is_rtl'                      => $language->is_rtl,
                'PS_TAX_ADDRESS_TYPE'         => Configuration::get('PS_TAX_ADDRESS_TYPE'),
                'have_ship_to_pay'            => (int)empty($have_ship_to_pay)
            ));

            /* Call a hook to display more information on form */
            $smarty->assign(array(
                'HOOK_CREATE_ACCOUNT_FORM' => Hook::exec('displayCustomerAccountForm'),
                'HOOK_CREATE_ACCOUNT_TOP'  => Hook::exec('displayCustomerAccountFormTop')
            ));

            //support module attributewizardpro
            $module = $this->onepagecheckoutps->isModuleActive('attributewizardpro');
            if ($module) {
                $smarty->assign('attributewizardpro', $module);
            }

            //support module twenga
            $module = $this->onepagecheckoutps->isModuleActive('twenga', 'doHook');
            if ($module) {
                echo $module->doHook(array('cart' => self::$cart));
            }

            //support module sociallogin
            $module = $this->onepagecheckoutps->isModuleActive('sociallogin', 'prepareCache');
            if ($module) {
                $module->prepareCache();
            }

            //support module Sveawebpay
            $module = $this->onepagecheckoutps->isModuleActive('sveawebpay');
            if ($module && Configuration::get('SVEAWEBPAY_QUICKADDRESS') == '1') {
                $smarty->assign('sveawebpay_md5', md5(Configuration::get('SVEAWEBPAY_INVOICE_PASSWORD')));
            }

            $this->onepagecheckoutps->addCODFee();
            $this->onepagecheckoutps->addBankWireDiscount();
            $this->onepagecheckoutps->addPaypalFee();
            $this->onepagecheckoutps->addSeQuraFee();
            $this->onepagecheckoutps->addModulesExtraFee();

            Tools::safePostVars();

            $position_steps = array();
            
            //grid steps
            if ($this->onepagecheckoutps->config_vars['OPC_PAYMENTS_WITHOUT_RADIO']) {
                $position_steps = array(
                    0 => array(
                        'classes' => ($this->only_register ? '' : 'col-md-4 col-sm-5').' col-xs-12',
                        'rows' => array(
                            0 => array(
                                'name_step' => 'customer',
                                'classes' => 'col-xs-12'
                            )
                        )
                    ),
                    1 => array(
                        'classes' => 'col-md-8 col-sm-7 col-xs-12',
                        'rows' => array(
                            0 => array(
                                'name_step' => 'review',
                                'classes' => 'col-xs-12'
                            ),
                            1 => array(
                                'name_step' => 'carrier',
                                'classes' => 'col-xs-12 col-md-6'
                            ),
                            2 => array(
                                'name_step' => 'payment',
                                'classes' => 'col-xs-12 '.($this->context->cart->isVirtualCart() ? 'col-md-12' : 'col-md-6')
                            )
                        )
                    )
                );
            } else {
                $position_steps = array(
                    0 => array(
                        'classes' => ($this->only_register ? '' : 'col-md-4 col-sm-5').' col-xs-12',
                        'rows' => array(
                            0 => array(
                                'name_step' => 'customer',
                                'classes' => 'col-xs-12'
                            )
                        )
                    ),
                    1 => array(
                        'classes' => 'col-md-8 col-sm-7 col-xs-12',
                        'rows' => array(
                            0 => array(
                                'name_step' => 'carrier',
                                'classes' => 'col-xs-12 col-md-6'
                            ),
                            1 => array(
                                'name_step' => 'payment',
                                'classes' => 'col-xs-12 '.($this->context->cart->isVirtualCart() ? 'col-md-12' : 'col-md-6')
                            ),
                            2 => array(
                                'name_step' => 'review',
                                'classes' => 'col-xs-12'
                            )
                        )
                    )
                );
            }
            $smarty->assign('position_steps', $position_steps);

            if (file_exists(_PS_THEME_DIR_.'modules/onepagecheckoutps/views/templates/front/onepagecheckoutps.tpl')) {
                $this->setTemplate(_PS_THEME_DIR_.'/modules/onepagecheckoutps/views/templates/front/onepagecheckoutps.tpl');
            } else {
                $this->setTemplate(_PS_MODULE_DIR_.$this->name_module.'/views/templates/front/onepagecheckoutps.tpl');
            }
        }
    }

    public function postProcess()
    {
        parent::postProcess();

        if (!$this->is_active_module) {
            return;
        }

        //$this->isLogged = $this->context->customer->isLogged();

        if (Tools::getIsset('is_ajax')) {
            define('_PTS_SHOW_ERRORS_', true);

            $data_type = 'json';
            if (Tools::isSubmit('dataType')) {
                $data_type = Tools::getValue('dataType');
            }

            $action = Tools::getValue('action');
            if (method_exists($this, $action)) {
                switch ($data_type) {
                    case 'html':
                        die($this->$action());
                    case 'json':
                        $response = Tools::jsonEncode($this->$action());
                        die($response);
                    default:
                        die('Invalid data type.');
                }
            } elseif (method_exists($this->onepagecheckoutps, $action)) {
                switch ($data_type) {
                    case 'html':
                        die($this->onepagecheckoutps->$action());
                    case 'json':
                        $response = Tools::jsonEncode($this->onepagecheckoutps->$action());
                        die($response);
                    default:
                        die('Invalid data type.');
                }
            } else {
                switch ($action) {
                    case 'updateExtraCarrier':
                        // Change virtualy the currents delivery options
                        $delivery_option = $this->context->cart->getDeliveryOption();
                        $delivery_option[(int) Tools::getValue('id_address')] = Tools::getValue('id_delivery_option');
                        $this->context->cart->setDeliveryOption($delivery_option);
                        $this->context->cart->save();
                        $return = array(
                            'content' => Hook::exec(
                                'displayCarrierList',
                                array(
                                    'address' => new Address((int) Tools::getValue('id_address'))
                                )
                            )
                        );
                        die(Tools::jsonEncode($return));
                    case 'checkRegisteredCustomerEmail':
                        $data = Customer::customerExists(Tools::getValue('email'), true);
                        die(Tools::jsonEncode((int) $data));
                    case 'checkVATNumber':
                        $errors = array();
                        $vat_number = Tools::getValue('vat_number', '');
                        $id_address = $this->context->cart->id_address_delivery;

                        if (Configuration::get('PS_TAX_ADDRESS_TYPE') == 'id_address_invoice') {
                            $id_address = $this->context->cart->id_address_invoice;
                        }

                        if (!empty($vat_number)) {
                            if (Configuration::get('VATNUMBER_MANAGEMENT')) {
                                include_once _PS_MODULE_DIR_.'vatnumber/vatnumber.php';
                                if (class_exists('VatNumber', false) && Configuration::get('VATNUMBER_CHECKING')) {
                                    $errors = VatNumber::WebServiceCheck($vat_number);
                                }
                            }
                        }

                        if (!empty($id_address)) {
                            $address = new Address($id_address);
                            $address->vat_number = $vat_number;
                            $address->save();
                        }

                        die(Tools::jsonEncode($errors));
                    case 'setFieldsNacex':
                        Db::getInstance(_PS_USE_SQL_SLAVE_)->autoExecute(
                            _DB_PREFIX_.'cart',
                            array('ncx' => Tools::getValue('txt')),
                            'UPDATE',
                            'id_cart = '.(int)$this->context->cart->id
                        );
                        break;
                }
            }
        }
    }

    public function setMedia()
    {
        parent::setMedia();

        if (!$this->is_active_module) {
            return;
        }

        foreach ($this->js_files as $key => $js) {
            if (!$this->onepagecheckoutps->config_vars['OPC_REDIRECT_DIRECTLY_TO_OPC'] || Tools::getIsset('checkout')) {
                if (strpos($js, 'cart-summary.js')) {
                    unset($this->js_files[$key]);
                }
            }

            if (strpos($js, 'order-opc.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'order-address.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'order-carrier.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'treeManagement.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'statesManagement.js')) {
                unset($this->js_files[$key]);
            }
        }

        $css_files_keys = array_keys($this->css_files);
        foreach ($css_files_keys as $key) {
            if (strpos($key, 'order-opc.css')) {
                unset($this->css_files[$key]);
            }
        }

        if ($this->onepagecheckoutps->config_vars['OPC_REDIRECT_DIRECTLY_TO_OPC']
            && !Tools::getIsset('step')
            && !Tools::getIsset('checkout')
            && !Tools::getIsset('rc')
        ) {
            $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/onepagecheckoutps.css');
            $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/override.css');
            
            $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/jquery/plugins/total-storage/jquery.total-storage.min.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/front/onepagecheckoutps.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/front/override.js');
        } else {
            if ($this->onepagecheckoutps->config_vars['OPC_AUTOCOMPLETE_GOOGLE_ADDRESS']) {
                if (!empty($this->onepagecheckoutps->config_vars['OPC_GOOGLE_API_KEY'])) {
                    $google_apy_source = 'https://maps.googleapis.com/maps/api/js?key=';
                    $google_apy_source .= trim($this->onepagecheckoutps->config_vars['OPC_GOOGLE_API_KEY']);
                    $google_apy_source .= '&sensor=false&libraries=places&language='.$this->context->language->iso_code;

                    $this->addJS($google_apy_source);
                }
            }

            $this->addJqueryPlugin('serialScroll');
            $this->addJqueryPlugin('typewatch');
            $this->addJqueryUI('ui.datepicker');
            $this->addJS(_THEME_JS_DIR_.'tools.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/form-validator/jquery.form-validator.min.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/bootstrap/pts/bootstrap.min.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/pts/tools.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/jquery/plugins/visible/jquery.visible.min.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/jquery/plugins/total-storage/jquery.total-storage.min.js');

            //support module indabox
            if ($this->onepagecheckoutps->isModuleActive('indabox')) {
                if (version_compare(_PS_VERSION_, '1.6.0.0', '>=')) {
                    $this->addJS(__PS_BASE_URI__.'modules/indabox/js/indabox-1-6.js');
                } else {
                    $this->addJS(__PS_BASE_URI__.'modules/indabox/js/indabox-1-5.js');
                }
            }

            //support module baliknapostu
            if ($this->onepagecheckoutps->isModuleActive('baliknapostu')) {
                $this->addCSS(__PS_BASE_URI__.'modules/baliknapostu/css/search_post.css');
                $this->addJS(__PS_BASE_URI__.'modules/baliknapostu/js/baliknapostu.js');
            }

            //support module rpgiftwrapping
            if ($this->onepagecheckoutps->isModuleActive('rpgiftwrapping')) {
                $this->addCSS(__PS_BASE_URI__.'modules/rpgiftwrapping/views/css/style.css');
            }

            //support module worldpay
            $module_worldpay = $this->onepagecheckoutps->isModuleActive('worldpay');
            if ($module_worldpay) {
                $mode = Configuration::get('_PS_WORLDPAY_mode');
                if ($mode) {
                    $this->addJs('https://gwapi.demo.securenet.com/v1/PayOS.js');
                } else {
                    $this->addJs('https://gwapi.demo.securenet.com/v1/PayOS.js');
                }
            }

            if (version_compare(_PS_VERSION_, '1.6.0.0', '<')) {
                $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/jquery/jquery.min/jquery.min.js');
            }

            if ($this->onepagecheckoutps->config_vars['OPC_SHOW_LIST_CITIES_GEONAMES'] ||
                $this->onepagecheckoutps->config_vars['OPC_AUTO_ADDRESS_GEONAMES']
            ) {
                $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/bootstrap/plugins/typeahead/bootstrap-typeahead.min.js');
                $this->addJS($this->onepagecheckoutps_dir.'views/js/lib/jeoquery.js');
            }

            $this->addJS($this->onepagecheckoutps_dir.'views/js/front/onepagecheckoutps.js');
            $this->addJS($this->onepagecheckoutps_dir.'views/js/front/override.js');

            //CSS
            $this->addCSS($this->onepagecheckoutps_dir.'views/css/lib/font-awesome/font-awesome.css');
            $this->addCSS($this->onepagecheckoutps_dir.'views/css/lib/bootstrap/pts/pts-bootstrap.css');

            $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/onepagecheckoutps.css');
            if (!$this->onepagecheckoutps->config_vars['OPC_PAYMENTS_WITHOUT_RADIO']) {
                $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/payments_supported.css');
            }
            
            $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/responsive.css');
            $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/override.css');

            if ($this->context->language->is_rtl) {
                $this->addCSS($this->onepagecheckoutps_dir.'views/css/front/style_rtl.css');
            }
        }
    }

    protected function _assignAddress()
    {
        if (!$this->is_active_module) {
            parent::_assignAddress();
        }
    }

    protected function _assignCarrier()
    {
        if (!$this->is_active_module) {
            parent::_assignCarrier();
        }
    }

    protected function _assignPayment()
    {
        if (!$this->is_active_module) {
            parent::_assignPayment();
        }
    }

    public function opcAssignWrappingAndTOS()
    {
        $this->_assignWrappingAndTOS();
    }

    public function opcAssignSummaryInformations()
    {
        $this->_assignSummaryInformations();
    }

    public function opcUpdateMessage($message)
    {
        $this->_updateMessage($message);
    }

    /**
     * Update data of carrier.
     *
     * @return json {boolean hasError, array errors}
     */
    public function updateCarrier()
    {
        $this->_processCarrier();

        return array('hasError' => !empty($this->errors), 'errors' => $this->errors);
    }
}
