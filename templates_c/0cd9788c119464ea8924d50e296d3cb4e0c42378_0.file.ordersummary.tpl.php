<?php
/* Smarty version 3.1.33-p1, created on 2019-07-06 21:57:56
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/ordersummary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d20fd44beef46_65712684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cd9788c119464ea8924d50e296d3cb4e0c42378' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/ordersummary.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d20fd44beef46_65712684 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><div class="summaryproduct"><span><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['productinfo']['groupname'];?>
 - <b><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['productinfo']['name'];?>
</b></span></div>
<table class="ordersummarytbl">
<tr><td><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['productinfo']['name'];?>
</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['baseprice'];?>
</b></td></tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producttotals']->value['configoptions'], 'configoption');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['configoption']->value) {
if ($_smarty_tpl->tpl_vars['configoption']->value) {?>
<tr><td>&raquo; <?php echo $_smarty_tpl->tpl_vars['configoption']->value['name'];?>
: <?php echo $_smarty_tpl->tpl_vars['configoption']->value['optionname'];?>
</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['configoption']->value['recurring'];
if ($_smarty_tpl->tpl_vars['configoption']->value['setup']) {?> + <?php echo $_smarty_tpl->tpl_vars['configoption']->value['setup'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersetupfee'];
}?></b></td></tr>
<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producttotals']->value['addons'], 'addon');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['addon']->value) {
?>
<tr><td>+ <?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>
</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['addon']->value['recurring'];?>
</b></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php if ($_smarty_tpl->tpl_vars['producttotals']->value['pricing']['setup'] || $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['recurring'] || $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['addons']) {?>
<div class="summaryproduct"></div>
<table width="100%" class="summry-table">
<?php if ($_smarty_tpl->tpl_vars['producttotals']->value['pricing']['setup']) {?><tr><td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartsetupfees'];?>
:</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['setup'];?>
</b></td></tr><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['recurringexcltax'], 'recurring', false, 'cycle');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cycle']->value => $_smarty_tpl->tpl_vars['recurring']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['cycle']->value;?>
:</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['recurring']->value;?>
</b></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['producttotals']->value['pricing']['tax1']) {?><tr><td><?php echo $_smarty_tpl->tpl_vars['carttotals']->value['taxname'];?>
 @ <?php echo $_smarty_tpl->tpl_vars['carttotals']->value['taxrate'];?>
%:</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['tax1'];?>
</b></td></tr><?php }
if ($_smarty_tpl->tpl_vars['producttotals']->value['pricing']['tax2']) {?><tr><td><?php echo $_smarty_tpl->tpl_vars['carttotals']->value['taxname2'];?>
 @ <?php echo $_smarty_tpl->tpl_vars['carttotals']->value['taxrate2'];?>
%:</td><td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['tax2'];?>
</b></td></tr><?php }?>
</table>
<?php }?>
<div class="summaryproduct"></div>
<table width="100%" class="summary-total">
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalduetoday'];?>
:</td>
<td class="text-right"><b><?php echo $_smarty_tpl->tpl_vars['producttotals']->value['pricing']['totaltoday'];?>
</b></td></tr>
</table>
<?php }
}
