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

{*support module pproperties - descomentar clase del input quantity linea 27 y esta linea de abajo*}
{*{assign var="product_quantity" value=$product|psm:qty:cart_quantity-$quantityDisplayed}*}

<div id="cart_quantity_button" class="cart_quantity_button">
    <input type="hidden" class="{*$product|icp:id_cart_product*}" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count}{else}{$product_quantity|floatval}{/if}" name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_0_{$product.id_address_delivery|intval}_hidden" />
    <div class="row col-xs-12 nopadding pts-vcenter">
        <div class="input-group input-group-sm">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number cart_quantity_down"
                        {if $product.minimal_quantity < ($product_quantity) OR $product.minimal_quantity <= 1}{else}disabled="disabled"{/if}
                        data-type="minus" id="cart_quantity_down_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}">
                    <i class="fa-pts fa-pts-minus"></i>
                </button>
            </span>
            <input type="text" autocomplete="off" class="cart_quantity_input form-control input-number text-center {*$product|icp:id_cart_product*}" value="{$product_quantity|floatval}"
                   name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}" />
            <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number cart_quantity_up" data-type="plus"
                        id="cart_quantity_up_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}">
                    <i class="fa-pts fa-pts-plus"></i>
                </button>
            </span>
        </div>
        <div class="input-group input-group-sm nopadding">
            <span class="input-group-btn">
                {if isset($customizedDatas.$productId.$productAttributeId)}
                    <a class="btn-number cart_quantity_delete"
                       id="{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}"
                       href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_customization={$id_customization|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart|escape:'htmlall':'UTF-8'}")|escape:'htmlall':'UTF-8'}">
                        <i class="fa-pts fa-pts-trash-o"></i>
                    </a>
                {else}
                    <a class="btn-number cart_quantity_delete"
                       id="{$product.id_product|intval}_{$product.id_product_attribute|intval}_0_{$product.id_address_delivery|intval}"
                       href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart|escape:'htmlall':'UTF-8'}")|escape:'htmlall':'UTF-8'}">
                        <i class="fa-pts fa-pts-trash-o"></i>
                    </a>
                {/if}
            </span>
        </div>
    </div>
    <div class="input-group input-group-sm hidden">
        <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number cart_quantity_up"
                    {if $product.minimal_quantity < ($product_quantity) OR $product.minimal_quantity <= 1}
                    {else}
                        disabled="disabled"
                    {/if}
                    data-type="minus" id="cart_quantity_down_{$product.id_product|intval}_{$product.id_product_attribute|intval}_0_{$product.id_address_delivery|intval}">
                <i class="fa-pts fa-pts-minus"></i>
            </button>
        </span>
        <input type="text" autocomplete="off" class="cart_quantity_input form-control input-number"
               value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count|intval}{else}{$product_quantity|floatval}{/if}"
               name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_0_{$product.id_address_delivery|intval}" />
        <span class="input-group-btn">
            <button type="button" class="btn btn-default btn-number cart_quantity_down" data-type="plus"
                    id="cart_quantity_up_{$product.id_product|intval}_{$product.id_product_attribute|intval}_0_{$product.id_address_delivery|intval}">
                <i class="fa-pts fa-pts-plus"></i>
            </button>
        </span>

        {if ((isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0) OR (!isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed > 0))
            AND (!isset($noDeleteButton) OR !$noDeleteButton)
            AND ((!isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed) > 0 AND empty($product.gift))}
            <span class="input-group-btn cart_delete {*visible-xs*}">
                <a type="button" class="btn btn-danger btn-number cart_quantity_delete"
                   id="{$product.id_product|intval}_{$product.id_product_attribute|intval}_0_{$product.id_address_delivery|intval}"
                   href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart|escape:'htmlall':'UTF-8'}")|escape:'htmlall':'UTF-8'}">
                    <i class="fa-pts fa-pts-remove"></i>
                </a>
            </span>
        {/if}
    </div>
</div>