<script type="text/javascript" src="templates/orderforms/{$carttpl}/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="templates/orderforms/{$carttpl}/style.css" />

<div class="contentbox paddingbox grey-bg">
  <section class="container group">
    <div class="row">
      <div id="order-modern">
        <h2 class="text-center black_text cart_margin">{$LANG.cartproductaddons}</h2>
        {include file="templates/orderforms/{$carttpl}/category-chooser.tpl"}
        <div class="row"> {foreach from=$addons key=num item=addon}
          <div class="col-md-6">
            <div id="addon{$num}" class="product">
              <div class="pricing"> {if $addon.free}
                {$LANG.orderfree}
                {else} <span class="pricing">{$addon.recurringamount} {$addon.billingcycle}</span> {if $addon.setupfee}<br />
                + {$addon.setupfee} {$LANG.ordersetupfee}{/if}
                {/if} </div>
              <div class="name"> {$addon.name} </div>
              <div class="description">{$addon.description}</div>
              <form method="post" action="{$smarty.server.PHP_SELF}?a=add" class="form-inline">
                <input type="hidden" name="aid" value="{$addon.id}" />
                <div class="text-center">
                  <label for="inputProductId{$num}">{$LANG.cartproductaddonschoosepackage}</label>
                  <br />
                  <div class="form-group">
                    <select name="productid" id="inputProductId{$num}" class="form-control">
                      
                      
                                    {foreach from=$addon.productids item=product}
                                        
                      
                      <option value="{$product.id}">{$product.product}{if $product.domain} - {$product.domain}{/if}</option>
                      
                      
                                    {/foreach}
                                
                    
                    </select>
                  </div>
                  <button type="submit" class="btn btn-success"> <i class="fa fa-shopping-cart"></i> {$LANG.ordernowbutton} </button>
                </div>
              </form>
            </div>
          </div>
          {if $num % 2} </div>
        <div class="row"> {/if}
          
          {/foreach} </div>
        {if $noaddons}
        <div class="errorbox" style="display:block;">{$LANG.cartproductaddonsnone}</div>
        {/if} </div>
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <!--contentbox--> 
</div>