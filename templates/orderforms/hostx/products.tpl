{include file="orderforms/{$carttpl}/common.tpl"}
<div id="order-standard_cart">

    <div class="row">
        <div class="col-md-12">
            {include file="orderforms/{$carttpl}/sidebar-categories.tpl"}
        </div> 
        <div class="col-md-12">
            {if $errormessage}
                <div class="alert alert-danger">
                    {$errormessage}
                </div>
            {/if}
        </div>       
        <div class="col-md-12">

            {include file="orderforms/{$carttpl}/sidebar-categories-collapsed.tpl"}

            {foreach $hookAboveProductsOutput as $output}
                <div>
                    {$output}
                </div>
            {/foreach}
              <div class="pricing_section">    
                    <div class="tab-content">
                      <div class="tab-pane active" id="pricing">      
                          <div class="price_group">
                            <div id="productList">            
                                {foreach $products as $key => $product}
									{assign var=pidsid value=$product.pid}
                                    <div class="price_sect">            
                                      <h2>{$product.name}</h2>
                                      <p>{$customDescripti.$pidsid.pHeadSortDesc}</p>
                                      <h1>
                                        {if $product.bid}
                                            <p>{$LANG.bundledeal}</p>
                                            {if $product.displayprice}
                                                {$product.displayprice}
                                            {/if}
                                        {else}
                                            {if $product.pricing.hasconfigoptions}
                                               <p> {$LANG.startingfrom} </p>
                                            {/if}
                                            {$product.pricing.minprice.price}
                                            <br />
                                            {if $product.pricing.minprice.cycle eq "monthly"}
                                                <span class="price">{$LANG.orderpaymenttermmonthly}</span>
                                            {elseif $product.pricing.minprice.cycle eq "quarterly"}
                                                <span class="price">{$LANG.orderpaymenttermquarterly}</span>
                                            {elseif $product.pricing.minprice.cycle eq "semiannually"}
                                                <span class="price">{$LANG.orderpaymenttermsemiannually}</span>
                                            {elseif $product.pricing.minprice.cycle eq "annually"}
                                                <span class="price">{$LANG.orderpaymenttermannually}</span>
                                            {elseif $product.pricing.minprice.cycle eq "biennially"}
                                                <span class="price">{$LANG.orderpaymenttermbiennially}</span>
                                            {elseif $product.pricing.minprice.cycle eq "triennially"}
                                                <span class="price">{$LANG.orderpaymenttermtriennially}</span>
                                            {/if}
                                            <br>
                                            {if $product.pricing.minprice.setupFee}
                                                <small>{$product.pricing.minprice.setupFee->toPrefixed()} {$LANG.ordersetupfee}</small>
                                            {/if}
                                        {/if}                                        
                                      </h1>
                                      {if $product.featuresdesc}                              
                                            {$product.featuresdesc}
									  {else}
											{$product.description}
                                      {/if}
                                      <div class="bottom_sect">
                                        <h4>{$customDescripti.$pidsid.pFootCaption}</h4>
                                        <p>{$customDescripti.$pidsid.pFootSortDesc}</p>
                                        <a href="cart.php?a=add&{if $product.bid}bid={$product.bid}{else}pid={$product.pid}{/if}" class="button03">{$LANG.ordernowbutton}</a>
                                      </div>
                                    </div>              
                                {/foreach}
                            </div>    

                          </div>
                      </div>
                    </div>                  
            </div>
            {foreach $hookBelowProductsOutput as $output}
                <div>
                    {$output}
                </div>
            {/foreach}

        </div>
    </div>
</div>
