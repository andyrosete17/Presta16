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

class IdentityController extends AddressesControllerCore
{
    public function init()
    {
        if (Module::isInstalled('onepagecheckoutps')) {
            $onepagecheckoutps = Module::getInstanceByName('onepagecheckoutps');
            if (Validate::isLoadedObject($onepagecheckoutps) && $onepagecheckoutps->active) {
                if ($onepagecheckoutps->isVisible()) {
                    Tools::redirectLink('index.php?controller=orderopc?rc=1&'.$_SERVER['QUERY_STRING']);
                }
            }
        }

        parent::init();
    }
}
