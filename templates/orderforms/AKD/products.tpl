<script type="text/javascript" src="templates/orderforms/{$carttpl}/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="templates/orderforms/{$carttpl}/style.css" />
    <div id="order-modern"  class="mainbox dedicated_planbox">
      <h2 class="black_text  text-center margin-botom30">{$groupname}</h2>
        {include file="templates/orderforms/{$carttpl}/category-chooser.tpl"}
        
       <div class="plans_box cartplans">
          {$turns = 0}
            {foreach from=$products key=num item=product}
              <div class="dedicated_plan1 HW_cart" id="product{$num}"  onclick="window.location='cart.php?a=add&{if $product.bid}bid={$product.bid}{else}pid={$product.pid}{/if}'">
            <div class="heading_textbox">
    <h3>{$product.name}{if $product.qty}<small>({$product.qty} {$LANG.orderavailable})</small>{/if}</h3>
    
    <!--headingbox-->
    </div>
    
    <div class="dedicated_price yellow_text">
    
    
    {if $product.bid}
                
                
                
                
                  {$LANG.bundledeal}
                  {if $product.displayprice}{$product.displayprice}{/if}
                  {else}{$product.pricing.minprice.price|substr:0:-3}<span>/{if $product.pricing.minprice.cycle eq "monthly"}
                  {$LANG.orderpaymenttermmonthly}
                  {elseif $product.pricing.minprice.cycle eq "quarterly"}
                  {$LANG.orderpaymenttermquarterly}
                  {elseif $product.pricing.minprice.cycle eq "semiannually"}
                  {$LANG.orderpaymenttermsemiannually}
                  {elseif $product.pricing.minprice.cycle eq "annually"}
                  {$LANG.orderpaymenttermannually}
                  {elseif $product.pricing.minprice.cycle eq "biennially"}
                  {$LANG.orderpaymenttermbiennially}
                  {elseif $product.pricing.minprice.cycle eq "triennially"}
                  {$LANG.orderpaymenttermtriennially}
                  {/if} </span> {/if} </div>
                <div class="plan_inner">
                 {$product.featuresdesc} 
                   {if $product.features}
                <ul class="list-inline">
                {foreach from=$product.features key=feature item=value}
                <li><span class="fa fa-check-circle-o"></span> {$feature} <span class="orange">{$value}</span> </li>
                {/foreach}
              </ul>
              {/if}
   <div class="product_order btn1"><a href="cart.php?a=add&{if $product.bid}bid={$product.bid}{else}pid={$product.pid}{/if}" role="button">{$LANG.ordernowbutton}</a> </div>
<!--plan_inner-->
</div>
<!--dedicated_plan1-->
</div>
            {/foreach} 
          <!--planbox--> 
        </div>
        </div>
