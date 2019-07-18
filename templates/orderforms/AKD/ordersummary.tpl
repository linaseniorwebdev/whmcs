<div class="summaryproduct"><span>{$producttotals.productinfo.groupname} - <b>{$producttotals.productinfo.name}</b></span></div>
<table class="ordersummarytbl">
<tr><td>{$producttotals.productinfo.name}</td><td class="text-right"><b>{$producttotals.pricing.baseprice}</b></td></tr>
{foreach from=$producttotals.configoptions item=configoption}{if $configoption}
<tr><td>&raquo; {$configoption.name}: {$configoption.optionname}</td><td class="text-right"><b>{$configoption.recurring}{if $configoption.setup} + {$configoption.setup} {$LANG.ordersetupfee}{/if}</b></td></tr>
{/if}{/foreach}
{foreach from=$producttotals.addons item=addon}
<tr><td>+ {$addon.name}</td><td class="text-right"><b>{$addon.recurring}</b></td></tr>
{/foreach}
</table>
{if $producttotals.pricing.setup || $producttotals.pricing.recurring || $producttotals.pricing.addons}
<div class="summaryproduct"></div>
<table width="100%" class="summry-table">
{if $producttotals.pricing.setup}<tr><td>{$LANG.cartsetupfees}:</td><td class="text-right"><b>{$producttotals.pricing.setup}</b></td></tr>{/if}
{foreach from=$producttotals.pricing.recurringexcltax key=cycle item=recurring}
<tr><td>{$cycle}:</td><td class="text-right"><b>{$recurring}</b></td></tr>
{/foreach}
{if $producttotals.pricing.tax1}<tr><td>{$carttotals.taxname} @ {$carttotals.taxrate}%:</td><td class="text-right"><b>{$producttotals.pricing.tax1}</b></td></tr>{/if}
{if $producttotals.pricing.tax2}<tr><td>{$carttotals.taxname2} @ {$carttotals.taxrate2}%:</td><td class="text-right"><b>{$producttotals.pricing.tax2}</b></td></tr>{/if}
</table>
{/if}
<div class="summaryproduct"></div>
<table width="100%" class="summary-total">
<tr>
<td>{$LANG.ordertotalduetoday}:</td>
<td class="text-right"><b>{$producttotals.pricing.totaltoday}</b></td></tr>
</table>
