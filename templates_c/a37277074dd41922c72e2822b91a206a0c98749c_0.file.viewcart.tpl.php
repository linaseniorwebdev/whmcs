<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:24:28
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/viewcart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fa8c4d9135_53000086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a37277074dd41922c72e2822b91a206a0c98749c' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/viewcart.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/checkout.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/common.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories-collapsed.tpl' => 1,
  ),
),false)) {
function content_5d28fa8c4d9135_53000086 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['checkout']->value) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/checkout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
} else { ?>

    <?php echo '<script'; ?>
>
        // Define state tab index value
        var statesTab = 10;
        var stateNotRequired = true;
    <?php echo '</script'; ?>
>
    <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>

    <div id="order-standard_cart">

        <div class="row">
            <div class="col-md-12">
                <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>

            <div class="viewCartDiv col-md-12">

                <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                <div class="row">
                    <div class="col-md-8 mx_width">

                        <?php if ($_smarty_tpl->tpl_vars['promoerrormessage']->value) {?>

                        <?php } elseif ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                            <div class="alert alert-danger" role="alert">
                                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['correctErrors'];?>
:</p>
                                <ul>
                                    <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                                </ul>
                            </div>                                                                 
                        <?php } elseif ($_smarty_tpl->tpl_vars['promotioncode']->value && $_smarty_tpl->tpl_vars['rawdiscount']->value == "0.00") {?>                            
                        <?php } elseif ($_smarty_tpl->tpl_vars['promoaddedsuccess']->value) {?>                            
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['bundlewarnings']->value) {?>
                            <div class="alert alert-warning" role="alert">
                                <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundlereqsnotmet'];?>
</strong><br />
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bundlewarnings']->value, 'warning');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->value) {
?>
                                        <li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </div>
                        <?php }?>
                        <h4 class="cartreview"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartreviewcheckout'];?>
</h4>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?a=view">

                            <div class="view-cart-items-header">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-7">
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['productOptions'];?>

                                    </div>                                    
                                    <div class="col-sm-4 col-xs-5">
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['priceCycle'];?>

                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['showqtyoptions']->value) {?>
                                        <div class="col-sm-2 hidden-xs text-center">
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['qty'];?>

                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="view-cart-items">

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <span class="item-title">
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['productinfo']['name'];?>

                                                                                                       
                                                </span>
                                                <span class="item-group">
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['productinfo']['groupname'];?>

                                                </span>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['domain']) {?>
                                                    <span class="item-domain">
                                                        <?php echo $_smarty_tpl->tpl_vars['product']->value['domain'];?>

                                                    </span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['configoptions']) {?>
                                                    <small>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['configoptions'], 'configoption', false, 'confnum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['confnum']->value => $_smarty_tpl->tpl_vars['configoption']->value) {
?>
                                                        &nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['configoption']->value['name'];?>
: <?php if ($_smarty_tpl->tpl_vars['configoption']->value['type'] == 1 || $_smarty_tpl->tpl_vars['configoption']->value['type'] == 2) {
echo $_smarty_tpl->tpl_vars['configoption']->value['option'];
} elseif ($_smarty_tpl->tpl_vars['configoption']->value['type'] == 3) {
if ($_smarty_tpl->tpl_vars['configoption']->value['qty']) {
echo $_smarty_tpl->tpl_vars['configoption']->value['option'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['no'];
}
} elseif ($_smarty_tpl->tpl_vars['configoption']->value['type'] == 4) {
echo $_smarty_tpl->tpl_vars['configoption']->value['qty'];?>
 x <?php echo $_smarty_tpl->tpl_vars['configoption']->value['option'];
}?><br />
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                    </small>
                                                <?php }?>
                                            </div>
                                            <div class="col-sm-4 item-price">
                                                <span><?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['totalTodayExcludingTaxSetup'];?>
</span>
                                                <span class="cycle"><?php echo $_smarty_tpl->tpl_vars['product']->value['billingcyclefriendly'];?>
</span>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['productonlysetup']) {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['productonlysetup']->toPrefixed();?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersetupfee'];?>

                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['product']->value['proratadate']) {?><br />(<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderprorata'];?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['proratadate'];?>
)<?php }?>
                                            </div>

                                            <?php if ($_smarty_tpl->tpl_vars['showqtyoptions']->value) {?>
                                                <div class="col-sm-2 item-qty">
                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value['allowqty']) {?>
                                                        <input type="number" name="qty[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['qty'];?>
" class="form-control text-center" />
                                                        <button type="submit" class="btn btn-xs">
                                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['update'];?>

                                                        </button>
                                                    <?php }?>
                                                </div>
                                            <?php }?>
                                            
                                            <div class="col-sm-2 hidden-xs cartAction">
                                                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=confproduct&i=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" class="btn edit-from-cart btn-link btn-xs">
                                                    <i class="fas fa-edit"></i>                                                    
                                                </a> 
                                                <button type="button" class="btn btn-link btn-xs btn-remove-from-cart" onclick="removeItem('p','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['addons'], 'addon', false, 'addonnum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['addonnum']->value => $_smarty_tpl->tpl_vars['addon']->value) {
?>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <span class="item-title">
                                                        <?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>

                                                    </span>
                                                    <span class="item-group">
                                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderaddon'];?>

                                                    </span>
                                                    <?php if ($_smarty_tpl->tpl_vars['addon']->value['setup']) {?>
                                                        <span class="item-setup">
                                                            <?php echo $_smarty_tpl->tpl_vars['addon']->value['setup'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersetupfee'];?>

                                                        </span>
                                                    <?php }?>
                                                </div>
                                                <div class="col-sm-4 item-price">
                                                    <span><?php echo $_smarty_tpl->tpl_vars['addon']->value['totaltoday'];?>
</span>
                                                    <span class="cycle"><?php echo $_smarty_tpl->tpl_vars['addon']->value['billingcyclefriendly'];?>
</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['addons']->value, 'addon', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['addon']->value) {
?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <span class="item-title">
                                                    <?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>
                                                   
                                                </span>
                                                <span class="item-group">
                                                    <?php echo $_smarty_tpl->tpl_vars['addon']->value['productname'];?>

                                                </span>
                                                <?php if ($_smarty_tpl->tpl_vars['addon']->value['domainname']) {?>
                                                    <span class="item-domain">
                                                        <?php echo $_smarty_tpl->tpl_vars['addon']->value['domainname'];?>

                                                    </span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['addon']->value['setup']) {?>
                                                    <span class="item-setup">
                                                        <?php echo $_smarty_tpl->tpl_vars['addon']->value['setup'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersetupfee'];?>

                                                    </span>
                                                <?php }?>
                                            </div>
                                            <div class="col-sm-4 item-price">
                                                <span><?php echo $_smarty_tpl->tpl_vars['addon']->value['pricingtext'];?>
</span>
                                                <span class="cycle"><?php echo $_smarty_tpl->tpl_vars['addon']->value['billingcyclefriendly'];?>
</span>
                                            </div>
                                            <div class="col-sm-2 hidden-xs cartAction">                                                
                                                <button type="button" class="btn btn-link btn-xs btn-remove-from-cart" onclick="removeItem('a','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['domain']->value) {
?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <span class="item-title">
                                                    <?php if ($_smarty_tpl->tpl_vars['domain']->value['type'] == "register") {
echo $_smarty_tpl->tpl_vars['LANG']->value['orderdomainregistration'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['orderdomaintransfer'];
}?>                                                    
                                                </span>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['domain']) {?>
                                                    <span class="item-domain">
                                                        <?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>

                                                    </span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagement']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagement'];?>
<br /><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['emailforwarding']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding'];?>
<br /><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['idprotection']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainidprotection'];?>
<br /><?php }?>
                                            </div>
                                            <div class="col-sm-4 item-price">
                                                <?php if (count($_smarty_tpl->tpl_vars['domain']->value['pricing']) == 1 || $_smarty_tpl->tpl_vars['domain']->value['type'] == 'transfer') {?>
                                                    <span name="<?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
Price"><?php echo $_smarty_tpl->tpl_vars['domain']->value['price'];?>
</span>
                                                    <span class="cycle"><?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['domain']->value['yearsLanguage'];?>
</span>
                                                    <span class="renewal cycle">
                                                        <?php if (isset($_smarty_tpl->tpl_vars['domain']->value['renewprice'])) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainrenewalprice'),$_smarty_tpl ) );?>
 <span class="renewal-price cycle"><?php echo $_smarty_tpl->tpl_vars['domain']->value['renewprice']->toPrefixed();
echo $_smarty_tpl->tpl_vars['domain']->value['shortYearsLanguage'];
}?></span>
                                                    </span>
                                                <?php } else { ?>
                                                    <span name="<?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
Price"><?php echo $_smarty_tpl->tpl_vars['domain']->value['price'];?>
</span>
                                                    <div class="dropdown">
                                                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="<?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
Pricing" name="<?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
Pricing" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['domain']->value['yearsLanguage'];?>

                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="<?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
Pricing">
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domain']->value['pricing'], 'price', false, 'years');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['years']->value => $_smarty_tpl->tpl_vars['price']->value) {
?>
                                                                <li>
                                                                    <a href="#" onclick="selectDomainPeriodInCart('<?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
', '<?php echo $_smarty_tpl->tpl_vars['price']->value['register'];?>
', <?php echo $_smarty_tpl->tpl_vars['years']->value;?>
, '<?php if ($_smarty_tpl->tpl_vars['years']->value == 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.year'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.years'),$_smarty_tpl ) );
}?>');return false;">
                                                                        <?php echo $_smarty_tpl->tpl_vars['years']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['years']->value == 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.year'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.years'),$_smarty_tpl ) );
}?> @ <?php echo $_smarty_tpl->tpl_vars['price']->value['register'];?>

                                                                    </a>
                                                                </li>
                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        </ul>
                                                    </div>
                                                    <span class="renewal cycle">
                                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainrenewalprice'),$_smarty_tpl ) );?>
 <span class="renewal-price cycle"><?php if (isset($_smarty_tpl->tpl_vars['domain']->value['renewprice'])) {
echo $_smarty_tpl->tpl_vars['domain']->value['renewprice']->toPrefixed();
echo $_smarty_tpl->tpl_vars['domain']->value['shortYearsLanguage'];
}?></span>
                                                    </span>
                                                <?php }?>
                                            </div>
                                            <div class="col-sm-2 cartAction hidden-xs">
                                                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=confdomains" class="btn edit-from-cart btn-link btn-xs">
                                                    <i class="fas fa-edit"></i>                                                    
                                                </a>                                                
                                                <button type="button" class="btn btn-link btn-xs btn-remove-from-cart" onclick="removeItem('d','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renewals']->value, 'domain', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['domain']->value) {
?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <span class="item-title">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainrenewal'];?>

                                                </span>
                                                <span class="item-domain">
                                                    <?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>

                                                </span>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagement']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagement'];?>
<br /><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['emailforwarding']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding'];?>
<br /><?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['idprotection']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainidprotection'];?>
<br /><?php }?>
                                            </div>
                                            <div class="col-sm-4 item-price">
                                                <span><?php echo $_smarty_tpl->tpl_vars['domain']->value['price'];?>
</span>
                                                <span class="cycle"><?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>
</span>
                                            </div>
                                            <div class="col-sm-2 cartAction">
                                                <button type="button" class="btn btn-link btn-xs btn-remove-from-cart" onclick="removeItem('r','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
')">
                                                    <i class="fas fa-trash"></i>                                                    
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['upgrades']->value, 'upgrade', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['upgrade']->value) {
?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <span class="item-title">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgrade'];?>

                                                </span>
                                                <span class="item-group">
                                                    <?php if ($_smarty_tpl->tpl_vars['upgrade']->value->type == 'service') {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['upgrade']->value->originalProduct->productGroup->name;?>
<br><?php echo $_smarty_tpl->tpl_vars['upgrade']->value->originalProduct->name;?>
 => <?php echo $_smarty_tpl->tpl_vars['upgrade']->value->newProduct->name;?>

                                                    <?php } elseif ($_smarty_tpl->tpl_vars['upgrade']->value->type == 'addon') {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['upgrade']->value->originalAddon->name;?>
 => <?php echo $_smarty_tpl->tpl_vars['upgrade']->value->newAddon->name;?>

                                                    <?php }?>
                                                </span>
                                                <span class="item-domain">
                                                    <?php if ($_smarty_tpl->tpl_vars['upgrade']->value->type == 'service') {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['upgrade']->value->service->domain;?>

                                                    <?php }?>
                                                </span>
                                            </div>
                                            <div class="col-sm-4 item-price">
                                                <span><?php echo $_smarty_tpl->tpl_vars['upgrade']->value->newRecurringAmount;?>
</span>
                                                <span class="cycle"><?php echo $_smarty_tpl->tpl_vars['upgrade']->value->localisedNewCycle;?>
</span>
                                            </div>
                                            <div class="col-sm-2 cartAction">
                                                <button type="button" class="btn btn-link btn-xs btn-remove-from-cart" onclick="removeItem('u','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
')">
                                                    <i class="fas fa-trash"></i>                                                    
                                                </button>
                                            </div>
                                        </div>
                                        <?php if ($_smarty_tpl->tpl_vars['upgrade']->value->totalDaysInCycle > 0) {?>
                                            <div class="row row-upgrade-credit">
                                                <div class="col-sm-4">
                                                    <span class="item-group">
                                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['upgradeCredit'];?>

                                                    </span>
                                                    <div class="upgrade-calc-msg">
                                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"upgradeCreditDescription",'daysRemaining'=>$_smarty_tpl->tpl_vars['upgrade']->value->daysRemaining,'totalDays'=>$_smarty_tpl->tpl_vars['upgrade']->value->totalDaysInCycle),$_smarty_tpl ) );?>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4 item-price">
                                                    <span>-<?php echo $_smarty_tpl->tpl_vars['upgrade']->value->creditAmount;?>
</span>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php if ($_smarty_tpl->tpl_vars['cartitems']->value == 0) {?>
                                    <div class="view-cart-empty">
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartempty'];?>

                                    </div>
                                <?php }?>

                            </div>

                            
                                <div class="empty-cart wgs-empt-crt">
                                    <a href="cart.php" class="btn btn-link btn-continue-shopping" id="continueShopping">
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['continueShopping'];?>

                                    </a>
                                    <?php if ($_smarty_tpl->tpl_vars['cartitems']->value > 0) {?>
                                        <button type="button" class="btn btn-link btn-xs" id="btnEmptyCart">
                                            <i class="fas fa-trash-alt"></i>
                                            <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['emptycart'];?>
</span>
                                        </button>
                                    <?php }?>
                                </div>
                        </form>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hookOutput']->value, 'output');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['output']->value) {
?>
                            <div class="recomede-wgs">
                                <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gatewaysoutput']->value, 'gatewayoutput');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gatewayoutput']->value) {
?>
                            <div class="view-cart-gateway-checkout">
                                <?php echo $_smarty_tpl->tpl_vars['gatewayoutput']->value;?>

                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </div>
                    <div class="col-md-4" id="scrollingPanelContainer2">

                        <div class="order-summary" id="orderSummary">
                            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersummary'];?>
</h2>
                            <div class="orderSummaryCd">
                                <div class="loader" id="orderSummaryLoader" style="display: none;">
                                    <i class="fas fa-fw fa-sync fa-spin"></i>
                                </div>                                
                                <div class="summary-container">
                                    <div class="subtotal clearfix">
                                        <span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersubtotal'];?>
</span>
                                        <span id="subtotal" class="pull-right"><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</span>
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['promotioncode']->value || $_smarty_tpl->tpl_vars['taxrate']->value || $_smarty_tpl->tpl_vars['taxrate2']->value) {?>
                                        <div class="bordered-totals">
                                            <?php if ($_smarty_tpl->tpl_vars['promotioncode']->value) {?>
                                                <div class="clearfix">
                                                    <span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['promotiondescription']->value;?>
</span>
                                                    <span id="discount" class="pull-right"><?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['taxrate']->value) {?>
                                                <div class="clearfix">
                                                    <span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['taxname']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['taxrate']->value;?>
%</span>
                                                    <span id="taxTotal1" class="pull-right"><?php echo $_smarty_tpl->tpl_vars['taxtotal']->value;?>
</span>
                                                </div>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['taxrate2']->value) {?>
                                                <div class="clearfix">
                                                    <span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['taxname2']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['taxrate2']->value;?>
%</span>
                                                    <span id="taxTotal2" class="pull-right"><?php echo $_smarty_tpl->tpl_vars['taxtotal2']->value;?>
</span>
                                                </div>
                                            <?php }?>
                                        </div>
                                    <?php }?>
                                    <div class="recurring-totals clearfix">
                                        <span class="pull-left"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['totals'];?>
</span>
                                        <span id="recurring" class="pull-right recurring-charges">
                                            <span id="recurringMonthly" <?php if (!$_smarty_tpl->tpl_vars['totalrecurringmonthly']->value) {?>style="display:none;"<?php }?>>
                                                <span class="cost"><?php echo $_smarty_tpl->tpl_vars['totalrecurringmonthly']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
<br />
                                            </span>
                                            <span id="recurringQuarterly" <?php if (!$_smarty_tpl->tpl_vars['totalrecurringquarterly']->value) {?>style="display:none;"<?php }?>>
                                                <span class="cost"><?php echo $_smarty_tpl->tpl_vars['totalrecurringquarterly']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
<br />
                                            </span>
                                            <span id="recurringSemiAnnually" <?php if (!$_smarty_tpl->tpl_vars['totalrecurringsemiannually']->value) {?>style="display:none;"<?php }?>>
                                                <span class="cost"><?php echo $_smarty_tpl->tpl_vars['totalrecurringsemiannually']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
<br />
                                            </span>
                                            <span id="recurringAnnually" <?php if (!$_smarty_tpl->tpl_vars['totalrecurringannually']->value) {?>style="display:none;"<?php }?>>
                                                <span class="cost"><?php echo $_smarty_tpl->tpl_vars['totalrecurringannually']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
<br />
                                            </span>
                                            <span id="recurringBiennially" <?php if (!$_smarty_tpl->tpl_vars['totalrecurringbiennially']->value) {?>style="display:none;"<?php }?>>
                                                <span class="cost"><?php echo $_smarty_tpl->tpl_vars['totalrecurringbiennially']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
<br />
                                            </span>
                                            <span id="recurringTriennially" <?php if (!$_smarty_tpl->tpl_vars['totalrecurringtriennially']->value) {?>style="display:none;"<?php }?>>
                                                <span class="cost"><?php echo $_smarty_tpl->tpl_vars['totalrecurringtriennially']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
<br />
                                            </span>
                                        </span>
                                    </div>


                                    <div id="applyPromoDiv">
                                        <?php if ($_smarty_tpl->tpl_vars['promoerrormessage']->value) {?>
                                            <div class="alert alert-warning" role="alert">
                                                <?php echo $_smarty_tpl->tpl_vars['promoerrormessage']->value;?>

                                            </div>                                        
                                        <?php } elseif ($_smarty_tpl->tpl_vars['promotioncode']->value && $_smarty_tpl->tpl_vars['rawdiscount']->value == "0.00") {?>
                                            <div class="alert alert-info" role="alert">
                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['promoappliedbutnodiscount'];?>

                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['promoaddedsuccess']->value) {?>
                                            <div class="alert alert-success" role="alert">
                                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['promotionAccepted'];?>

                                            </div>
                                        <?php }?>    
                                        <?php if ($_smarty_tpl->tpl_vars['promotioncode']->value) {?>
                                            <div class="view-cart-promotion-code">
                                                <?php echo $_smarty_tpl->tpl_vars['promotioncode']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['promotiondescription']->value;?>

                                            </div>
                                            <div class="text-center">
                                                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=removepromo" class="btn btn-default btn-sm">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['removePromotionCode'];?>

                                                </a>
                                            </div>
                                        <?php } else { ?>
                                            <form method="post" action="cart.php?a=view">
                                                <label class="plable"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderPromoCodePlaceholder"),$_smarty_tpl ) );?>
</label>
                                                <div class="form-group prepend-icon ">                                                    
                                                    <input type="text" name="promocode" id="inputPromotionCode" class="field" required="required">
                                                </div>
                                                <button type="submit" name="validatepromo" class="btn btn-block" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromovalidatebutton'];?>
">
                                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromovalidatebutton'];?>

                                                </button>
                                            </form>
                                        <?php }?>
                                    </div>


                                    <div class="total-due-today total-due-today-padded">
                                        <span id="totalDueToday" class="amt"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
                                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalduetoday'];?>
</span>
                                    </div>
                                    <div class="text-center">
                                        <a href="cart.php?a=checkout" class="btn btn-success btn-lg btn-checkout<?php if ($_smarty_tpl->tpl_vars['cartitems']->value == 0) {?> disabled<?php }?>" id="checkout">
                                            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['checkout'];?>
                                            
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="cart.php">
            <input type="hidden" name="a" value="remove" />
            <input type="hidden" name="r" value="" id="inputRemoveItemType" />
            <input type="hidden" name="i" value="" id="inputRemoveItemRef" />
            <div class="modal fade modal-remove-item" id="modalRemoveItem" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['close'];?>
">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                               <i class="fas fa-trash-alt fa-3x"></i>
                                <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['removeItem'];?>
</span>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p class="cfms"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartremoveitemconfirm'];?>
</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default dismiss-no" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['no'];?>
</button>
                            <button type="submit" class="btn btn-primary dismiss-yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['yes'];?>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form method="post" action="cart.php">
            <input type="hidden" name="a" value="empty" />
            <div class="modal fade modal-remove-item" id="modalEmptyCart" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['close'];?>
">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                <i class="fas fa-trash-alt fa-3x"></i>
                                <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['emptycart'];?>
</span>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p class="cfms"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartemptyconfirm'];?>
</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default dismiss-no" data-dismiss="modal"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['no'];?>
</button>
                            <button type="submit" class="btn btn-primary dismiss-yes"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['yes'];?>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php }
}
}
