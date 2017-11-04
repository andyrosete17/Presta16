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

<div id="onepagecheckoutps_step_one_container" class="{if !$register_customer}{$classes|escape:'htmlall':'UTF-8'}{else}col-xs-12{/if}">
    <div class="loading_small"><i class="fa-pts fa-pts-spin fa-pts-refresh fa-pts-2x"></i></div>
    <div id="onepagecheckoutps_step_one">
        {include file="./../address.tpl"}

        {if $register_customer || $CONFIGS.OPC_SHOW_BUTTON_REGISTER}
            <div id="div_save_customer" class="row">
                <div id="div_field_required" class="col-xs-12 clear clearfix">
                    <span>{l s='The fields with red asterisks(*) are required.' mod='onepagecheckoutps'}</span>
                </div>
                <div class="col-xs-12">
                    <button type="button" id="btn_save_customer" class="btn btn-primary btn-block">
                        <i class="fa-pts fa-pts-save fa-pts-lg"></i>
                        {l s='Save information' mod='onepagecheckoutps'}
                    </button>
                </div>
            </div>
        {/if}
    </div>
</div>