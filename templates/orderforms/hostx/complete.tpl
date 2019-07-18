{include file="orderforms/{$carttpl}/common.tpl"}

<div id="order-standard_cart">

    <div class="row">


        <div class="col-md-12">

            <div class="col-sm-8 completeOrder col-sm-offset-2" style="border: 1px solid #ccc;">

                    <img class="completeOrderImg" src="templates/{$template}/images/completeord.png">

                    <p>{$LANG.orderreceived}</p>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="alert alert-info order-confirmation">
                                {$LANG.ordernumberis} <span>{$ordernumber}</span>
                            </div>
                        </div>
                    </div>

                    <p>{$LANG.orderfinalinstructions}</p>

                    {if $invoiceid && !$ispaid}
                        <div class="alert alert-warning text-center">
                            {$LANG.ordercompletebutnotpaid}
                            <br /><br />
                            <a href="viewinvoice.php?id={$invoiceid}" target="_blank" class="alert-link">
                                {$LANG.invoicenumber}{$invoiceid}
                            </a>
                        </div>
                    {/if}

                    {foreach $addons_html as $addon_html}
                        <div class="order-confirmation-addon-output">
                            {$addon_html}
                        </div>
                    {/foreach}

                    {if $ispaid}
                        <!-- Enter any HTML code which should be displayed when a user has completed checkout here -->
                        <!-- Common uses of this include conversion and affiliate tracking scripts -->
                    {/if}

                    <div class="text-center">
                        <a href="clientarea.php" class="btn btn-default">
                            {$LANG.orderForm.continueToClientArea}
                            &nbsp;<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
            </div>       

        </div>
    </div>
</div>
