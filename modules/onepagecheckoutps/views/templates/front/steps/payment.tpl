{*
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * We are experts and professionals in PrestaShop
 *
 * @category  PrestaShop
 * @category  Module
 * @author    PresTeamShop.com <support@presteamshop.com>
 * @copyright 2011-2017 PresTeamShop
 * @license   see file: LICENSE.txt
*}

{if !$register_customer}
    <div id="onepagecheckoutps_step_three_container" class="{$classes|escape:'htmlall':'UTF-8'}">
        <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
        <h5 class="onepagecheckoutps_p_step onepagecheckoutps_p_step_three">
            <i class="fa-pts fa-pts-credit-card fa-pts-3x"></i>
            {l s='Payment method' mod='onepagecheckoutps'}
        </h5>
        <div id="onepagecheckoutps_step_three"></div>
    </div>
{/if}