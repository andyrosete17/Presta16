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

class OnePageCheckoutPSLoginModuleFrontController extends ModuleFrontController
{
    public $ssl                 = true;
    public $display_column_left = false;
    public $name                = 'login';

    public function initContent()
    {
        parent::initContent();

        if (!class_exists('http_class')) {
            include _PS_MODULE_DIR_.'onepagecheckoutps/lib/social_network/http.php';
        }
        if (!class_exists('oauth_client_class_pts')) {
            include _PS_MODULE_DIR_.'onepagecheckoutps/lib/social_network/oauth_client.php';
        }

        $client = new oauth_client_class_pts;

        $opc_social_networks = Tools::jsonDecode($this->module->config_vars['OPC_SOCIAL_NETWORKS']);

        $social_network = Tools::strtolower(Tools::getValue('sv'));

        if (!empty($social_network) && !empty($opc_social_networks)) {
            $client->redirect_uri = $this->context->link->getModuleLink(
                'onepagecheckoutps',
                'login',
                array('sv' => Tools::getValue('sv'))
            );

            $client->server             = $opc_social_networks->{$social_network}->network;
            $client->client_id          = $opc_social_networks->{$social_network}->client_id;
            $client->client_secret      = $opc_social_networks->{$social_network}->client_secret;
            $client->scope              = $opc_social_networks->{$social_network}->scope;
            $client->configuration_file = dirname(__FILE__).'/../../lib/social_network/oauth_configuration.json';

            switch ($client->server) {
                case 'Google':
                    $client->offline = true;
                    break;
            }

            $headers     = array();
            $return_data = array();

            if (($success = $client->Initialize())) {
                if (($success = $client->Process())) {
                    if (Tools::strlen($client->access_token)) {
                        switch ($client->server) {
                            case 'Facebook':
                                //$appsecret_proof = hash_hmac('sha256', $access_token, $client->client_secret);
                                $success = $client->CallAPI(
                                    'https://graph.facebook.com/v2.3/me?fields=email,first_name,last_name',
                                    'GET',
                                    array(),
                                    array('FailOnAccessError' => true),
                                    $return_data
                                );

                                $headers['facebook'] = array(
                                    'firstname' => 'first_name',
                                    'lastname'  => 'last_name',
                                    'email'     => 'email'
                                );
                                break;
                            case 'Google':
                                $success = $client->CallAPI(
                                    'https://www.googleapis.com/oauth2/v1/userinfo',
                                    'GET',
                                    array(),
                                    array('FailOnAccessError' => true),
                                    $return_data
                                );

                                $headers['google'] = array(
                                    'firstname' => 'given_name',
                                    'lastname'  => 'family_name',
                                    'email'     => 'email'
                                );
                                break;
                            case 'Paypal':
                                $success = $client->CallAPI(
                                    'https://api.paypal.com/v1/identity/openidconnect/userinfo/?schema=openid',
                                    'GET',
                                    array(),
                                    array('FailOnAccessError' => true),
                                    $return_data
                                );

                                $headers['paypal'] = array(
                                    'firstname' => 'given_name',
                                    'lastname'  => 'family_name',
                                    'email'     => 'email',
                                    'birthday'  => 'birthday',
                                    'address'   => array(
                                        'address1' => 'street_address',
                                        'city' => 'locality',
                                        'postcode' => 'postal_code'
                                    )
                                );
                                break;
                        }
                    }
                }
                $success = $client->Finalize($success);
            }
            
            if ($success && !empty($return_data) && property_exists($return_data, 'email')) {
                $delivery_address = null;
                $invoice_address  = null;
                $customer = new Customer();
                $customer->getByEmail($return_data->email);

                if (!Validate::isLoadedObject($customer)) {
                    foreach ($headers[$social_network] as $field => $value) {
                        if ($field == 'address' && is_array($value)) {
                            $id_address = $this->module->createAddress('delivery');
                            $delivery_address = new Address($id_address);

                            foreach ($value as $field_da => $value_da) {
                                if (isset($return_data->address->{$value_da})) {
                                    $delivery_address->{$field_da} = $return_data->address->{$value_da};
                                }
                            }
                        } else {
                            if (property_exists($return_data, $value)) {
                                $customer->{$field} = $return_data->{$value};
                            }
                        }
                    }

                    $password = Tools::passwdGen();
                    $customer->passwd = md5(pSQL(_COOKIE_KEY_.$password));

                    $customer->newsletter = (int)FieldClass::getDefaultValue('customer', 'newsletter');

                    $this->module->createCustomer($customer, $delivery_address, $invoice_address, $password, false);
                } else {
                    //valida al cliente si se registro por social login.
                    /*$verificationbyemail = $this->module->isModuleActive('verificationbyemail');
                    if ($verificationbyemail) {
                        if ($customer->active == 0) {
                            $customer->active = 1;
                            $customer->save();
                        }
                    }*/

                    $this->module->singInCustomer($customer);
                }

                Db::getInstance(_PS_USE_SQL_SLAVE_)->delete('opc_social_customer', 'id = '.(int)$return_data->id);
                Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(
                    'opc_social_customer',
                    array(
                        'id' => (int)$return_data->id,
                        'id_customer' => (int)$customer->id,
                        'network' => pSQL($social_network)
                    )
                );
            } else {
                if (!array_key_exists('email', $return_data)) {
                    echo 'Email not found.';
                    die();
                }
                
                echo $client->error;
                die();
            }

            $redirect_url = $this->context->link->getPageLink('my-account');
            if ($this->context->cart->nbProducts()) {
                if ($this->module->config_vars['OPC_REDIRECT_DIRECTLY_TO_OPC']) {
                    $redirect_url = $this->context->link->getPageLink(
                        'order-opc',
                        true,
                        $this->context->language->id,
                        array('checkout' => '1')
                    );
                } else {
                    $redirect_url = $this->context->link->getPageLink('order-opc');
                }
            } else {
                $address_customer = $this->context->customer->getAddresses($this->context->cookie->id_lang);
                if (empty($address_customer)) {
                    $redirect_url = $this->context->link->getPageLink('addresses');
                }
            }

            echo '<script>window.opener.location.href="'.$redirect_url.'";</script>';
            echo '<script>window.opener.focus();</script>';
            echo '<script>self.close();</script>';

            if ($client->exit) {
                exit;
            }
        }
    }
}
