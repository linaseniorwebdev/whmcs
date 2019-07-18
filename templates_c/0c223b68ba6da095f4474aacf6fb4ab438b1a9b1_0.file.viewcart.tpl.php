<?php
/* Smarty version 3.1.33-p1, created on 2019-07-06 21:58:01
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/viewcart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d20fd49936880_81563290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c223b68ba6da095f4474aacf6fb4ab438b1a9b1' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/viewcart.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d20fd49936880_81563290 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/azur/webapps/app-whmcs/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$template = $_smarty_tpl;
?><link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/style.css" />
<?php echo '<script'; ?>
 language="javascript">
    // Define state tab index value
    var statesTab = 10;
<?php if (in_array('state',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?>
    // Do not enforce state input client side
    var stateNotRequired = true;
<?php }
echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/PasswordStrength.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/CreditCardValidation.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
function removeItem(type,num) {
    var response = confirm("<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartremoveitemconfirm'];?>
");
    if (response) {
        window.location = 'cart.php?a=remove&r='+type+'&i='+num;
    }
}
function emptyCart(type,num) {
    var response = confirm("<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartemptyconfirm'];?>
");
    if (response) {
        window.location = 'cart.php?a=empty';
    }
}
<?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
>
window.langPasswordStrength = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrength'];?>
";
window.langPasswordWeak = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthweak'];?>
";
window.langPasswordModerate = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthmoderate'];?>
";
window.langPasswordStrong = "<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthstrong'];?>
";
<?php echo '</script'; ?>
>
<div id="order-modern">
<h2 class="text-center black_text cart_margin"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartreviewcheckout'];?>
</h2>
<div class="clear"></div>
<?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
<div class="errorbox" style="display:block;"> <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['errormessage']->value,'
  <li>',' &nbsp;#&nbsp; ');?>
 &nbsp;#&nbsp; 
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['promotioncode']->value && $_smarty_tpl->tpl_vars['rawdiscount']->value == "0.00") {?>
<div class="errorbox" style="display:block;"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['promoappliedbutnodiscount'];?>
 </div>
<?php }?>
      
      <?php if ($_smarty_tpl->tpl_vars['bundlewarnings']->value) {?>
<div class="cartwarningbox"> <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundlereqsnotmet'];?>
</strong><br />
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bundlewarnings']->value, 'warning');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->value) {
?>
  <?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
<br />
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </div>
<?php }?>
      
     
<div class="view_outer_box col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?a=view">
  <table class="cart" cellspacing="1">
    <tr>
      <th width="68%"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderdesc'];?>
</th>
      <th width="2%" class="blank-td"></th>
      <th width="30%" class="yellow-bg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderprice'];?>
</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
    <tr class="carttableproduct">
      <td class="pakage-name"><?php echo $_smarty_tpl->tpl_vars['product']->value['productinfo']['groupname'];?>
 - <strong><?php echo $_smarty_tpl->tpl_vars['product']->value['productinfo']['name'];?>
</strong><?php if ($_smarty_tpl->tpl_vars['product']->value['domain']) {?> (<?php echo $_smarty_tpl->tpl_vars['product']->value['domain'];?>
)<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['configoptions']) {?>
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
echo $_smarty_tpl->tpl_vars['LANG']->value['yes'];
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
        <?php }?>
        <div class="pull-right"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=confproduct&i=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" class="cartedit">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['carteditproductconfig'];?>
]</a> <a href="#" onclick="removeItem('p','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
');return false" class="cartremove">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartremove'];?>
]</a> <?php if ($_smarty_tpl->tpl_vars['product']->value['allowqty']) {?></div>
        <br />
        <br />
        <div align="right"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartqtyenterquantity'];?>

          <input type="text" name="qty[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]" size="3" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['qty'];?>
" />
          <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartqtyupdate'];?>
" class="btn btn-default btn-sm" />
        </div>
        <?php }?> </td>
      <td class="blank-td"></td>
      <td class="pakage-name"><?php echo $_smarty_tpl->tpl_vars['product']->value['pricingtext'];
if ($_smarty_tpl->tpl_vars['product']->value['proratadate']) {?><br />
        (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderprorata'];?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['proratadate'];?>
)<?php }?></td>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['addons'], 'addon', false, 'addonnum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['addonnum']->value => $_smarty_tpl->tpl_vars['addon']->value) {
?>
    <tr class="carttableproduct">
      <td class="pakage-name"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderaddon'];?>
 - <strong><?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>
</strong></td>
      <td class="blank-td"></td>
      <td><?php echo $_smarty_tpl->tpl_vars['addon']->value['pricingtext'];?>
</td>
    </tr>
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
    <tr class="carttableproduct">
      <td><?php echo $_smarty_tpl->tpl_vars['addon']->value['name'];?>

        <?php echo $_smarty_tpl->tpl_vars['addon']->value['productname'];
if ($_smarty_tpl->tpl_vars['addon']->value['domainname']) {?> - <strong><?php echo $_smarty_tpl->tpl_vars['addon']->value['domainname'];?>
</strong> <?php }?>
        <div class="pull-right"><a href="#" onclick="removeItem('a','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
');return false" class="cartremove">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartremove'];?>
]</a></div></td>
      <td class="blank-td"></td>
      <td><strong><?php echo $_smarty_tpl->tpl_vars['addon']->value['pricingtext'];?>
</strong></td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['domain']->value) {
?>
    <tr class="carttableproduct">
      <td><?php if ($_smarty_tpl->tpl_vars['domain']->value['type'] == "register") {
echo $_smarty_tpl->tpl_vars['LANG']->value['orderdomainregistration'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['orderdomaintransfer'];
}?> - <strong><?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
 - <?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>

        <?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagement']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagement'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['domain']->value['emailforwarding']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['domain']->value['idprotection']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainidprotection'];?>

        <?php }?></strong>
        <div class="pull-right"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=confdomains" class="cartedit">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartconfigdomainextras'];?>
]</a> <a href="#" onclick="removeItem('d','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
');return false" class="cartremove">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartremove'];?>
]</a></div></td>
      <td class="blank-td"></td>
      <td><?php echo $_smarty_tpl->tpl_vars['domain']->value['price'];?>
</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renewals']->value, 'domain', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['domain']->value) {
?>
    <tr class="carttableproduct">
      <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainrenewal'];?>
 - <?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
 - <strong><?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>

        <?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagement']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagement'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['domain']->value['emailforwarding']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['domain']->value['idprotection']) {?>&nbsp;&raquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainidprotection'];?>

        <?php }?></strong>
        <div class="pull-right"><a href="#" onclick="removeItem('r','<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
');return false" class="cartremove">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartremove'];?>
]</a></div></td>
      <td class="blank-td"></td>
      <td><?php echo $_smarty_tpl->tpl_vars['domain']->value['price'];?>
</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    <?php if ($_smarty_tpl->tpl_vars['cartitems']->value == 0) {?>
    <tr class="clientareatableactive">
      <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartempty'];?>
</td>
      <td class="blank-td"></td>
      <td></td>
    </tr>
    <?php }?>
    <tr class="subtotal">
      <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersubtotal'];?>
:</td>
      <td class="blank-td"></td>
      <td><strong><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</strong></td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['promotioncode']->value) {?>
    <tr class="promotion">
      <td><?php echo $_smarty_tpl->tpl_vars['promotiondescription']->value;?>
:</td>
      <td class="blank-td"></td>
      <td><strong><?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
</strong></td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['taxrate']->value) {?>
    <tr class="subtotal">
      <td><?php echo $_smarty_tpl->tpl_vars['taxname']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['taxrate']->value;?>
%:</td>
      <td class="blank-td"></td>
      <td><strong><?php echo $_smarty_tpl->tpl_vars['taxtotal']->value;?>
</strong></td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['taxrate2']->value) {?>
    <tr class="subtotal">
      <td><?php echo $_smarty_tpl->tpl_vars['taxname2']->value;?>
 @ <?php echo $_smarty_tpl->tpl_vars['taxrate2']->value;?>
%:</td>
      <td class="blank-td"></td>
      <td><strong><?php echo $_smarty_tpl->tpl_vars['taxtotal2']->value;?>
</strong></td>
    </tr>
    <?php }?>
    <tr class="total">
      <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalduetoday'];?>
:</td>
      <td class="blank-td"></td>
      <td><strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['totalrecurringmonthly']->value || $_smarty_tpl->tpl_vars['totalrecurringquarterly']->value || $_smarty_tpl->tpl_vars['totalrecurringsemiannually']->value || $_smarty_tpl->tpl_vars['totalrecurringannually']->value || $_smarty_tpl->tpl_vars['totalrecurringbiennially']->value || $_smarty_tpl->tpl_vars['totalrecurringtriennially']->value) {?>
    <tr class="recurring">
      <td><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalrecurring'];?>
:</td>
      <td class="blank-td"></td>
      <td> <?php if ($_smarty_tpl->tpl_vars['totalrecurringmonthly']->value) {
echo $_smarty_tpl->tpl_vars['totalrecurringmonthly']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
<br />
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['totalrecurringquarterly']->value) {
echo $_smarty_tpl->tpl_vars['totalrecurringquarterly']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
<br />
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['totalrecurringsemiannually']->value) {
echo $_smarty_tpl->tpl_vars['totalrecurringsemiannually']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
<br />
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['totalrecurringannually']->value) {
echo $_smarty_tpl->tpl_vars['totalrecurringannually']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
<br />
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['totalrecurringbiennially']->value) {
echo $_smarty_tpl->tpl_vars['totalrecurringbiennially']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
<br />
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['totalrecurringtriennially']->value) {
echo $_smarty_tpl->tpl_vars['totalrecurringtriennially']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
<br />
        <?php }?> </td>
    </tr>
    <?php }?>
  </table>
</form>
<div class="cartbuttons">
  <button type="button" class="btn btn-primary btn-sm" onclick="emptyCart();return false"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['emptycart'];?>
</button>
  <a href="cart.php" class="btn btn-success btn-sm pull-right"><i class="fa fa-shopping-cart"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['continueshopping'];?>
</a> </div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gatewaysoutput']->value, 'gatewayoutput');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gatewayoutput']->value) {
?>
<div class="clear"></div>
<div class="cartbuttons"> <?php echo $_smarty_tpl->tpl_vars['gatewayoutput']->value;?>
 </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
</div>

<?php if ($_smarty_tpl->tpl_vars['cartitems']->value != 0) {?>
<div class="view_outer_box col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?a=checkout" id="mainfrm">
  <input type="hidden" name="submit" value="true" />
  <input type="hidden" name="custtype" id="custtype" value="<?php echo $_smarty_tpl->tpl_vars['custtype']->value;?>
" />
  <h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['yourdetails'];?>
</h2>
  <div class="clear"></div>
  <ul class="client-login-link">
    <li class="signuptype<?php if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['custtype']->value != "existing") {?> active<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['loggedin']->value) {?> id="newcust"<?php }?>>
    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['newcustomer'];?>

    </li>
    <li class="signuptype<?php if ($_smarty_tpl->tpl_vars['custtype']->value == "existing" && !$_smarty_tpl->tpl_vars['loggedin']->value || $_smarty_tpl->tpl_vars['loggedin']->value) {?> active<?php }?>" id="existingcust"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['existingcustomer'];?>
</li>
  </ul>
  <div class="clear"></div>
  <div class="signupfields signupfields-existing<?php if ($_smarty_tpl->tpl_vars['custtype']->value == "existing" && !$_smarty_tpl->tpl_vars['loggedin']->value) {
} else { ?> hidden<?php }?>" id="loginfrm">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="form-group">
        <label for="inputEmail"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>
        <input type="email" name="loginemail" class="form-control" id="inputEmail" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['enteremail'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> disabled<?php }?> />
      </div>
      <div class="form-group">
        <label for="inputPassword"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
</label>
        <input type="password" name="loginpw" class="form-control" id="inputPassword" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> disabled<?php }?> />
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="signupfields<?php if ($_smarty_tpl->tpl_vars['custtype']->value == "existing" && !$_smarty_tpl->tpl_vars['loggedin']->value) {?> hidden<?php }?>" id="signupfrm">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['firstname'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="firstname" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>
</label>
          <input type="text" name="firstname" id="firstname" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['firstname'];?>
" class="form-control"<?php if (!in_array('firstname',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?> />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['lastname'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="lastname" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>
</label>
          <input type="text" name="lastname" id="lastname" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['lastname'];?>
" class="form-control"<?php if (!in_array('lastname',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?>  />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacompanyname'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['companyname'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="companyname" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacompanyname'];?>
</label>
          <input type="text" name="companyname" id="companyname" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['companyname'];?>
" class="form-control" />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['email'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="email" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>
          <input type="email" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['email'];?>
" class="form-control" required/>
          <?php }?> </div>
        <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value) {?>
        <div id="newPassword1" class="form-group has-feedback">
          <label for="inputNewPassword1" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
</label>
          <input type="password" class="form-control" id="inputNewPassword1" name="password" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" required/>
          <span class="form-control-feedback glyphicon glyphicon-password"></span> <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?> </div>
        <div id="newPassword2" class="form-group has-feedback">
          <label for="inputNewPassword2" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaconfirmpassword'];?>
</label>
          <input type="password" class="form-control" id="inputNewPassword2" name="password2" value="<?php echo $_smarty_tpl->tpl_vars['password2']->value;?>
" required/>
          <span class="form-control-feedback glyphicon glyphicon-password"></span>
          <div id="inputNewPassword2Msg"> </div>
        </div>
        <?php }?> </div>
      <div class="col-md-6">
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress1'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address1'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="address1" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress1'];?>
</label>
          <input type="text" name="address1" id="address1" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address1'];?>
" class="form-control"<?php if (!in_array('address1',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?> />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress2'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address2'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="address2" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress2'];?>
</label>
          <input type="text" name="address2" id="address2" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address2'];?>
" class="form-control" />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacity'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['city'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="city" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacity'];?>
</label>
          <input type="text" name="city" id="city" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['city'];?>
" class="form-control"<?php if (!in_array('city',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?> />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareastate'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['state'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="state" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareastate'];?>
</label>
          <input type="text" name="state" id="state" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['state'];?>
" class="form-control"<?php if (!in_array('state',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?> />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapostcode'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['postcode'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="postcode" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapostcode'];?>
</label>
          <input type="text" name="postcode" id="postcode" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['postcode'];?>
" class="form-control"<?php if (!in_array('postcode',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?> />
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacountry'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['country'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="country" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacountry'];?>
</label>
          <select id="country" name="country" class="form-control">
            
            
            
                
            
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'thisCountryName', false, 'thisCountryCode');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thisCountryCode']->value => $_smarty_tpl->tpl_vars['thisCountryName']->value) {
?>
                                        
            
                
            
            
            <option value="<?php echo $_smarty_tpl->tpl_vars['thisCountryCode']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['thisCountryCode']->value == $_smarty_tpl->tpl_vars['clientsdetails']->value['country']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['thisCountryName']->value;?>
</option>
            
            
            
                
            
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                
          
              
          
          
          </select>
          <?php }?> </div>
        <div class="form-group"> <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
          <div class="row">
            <label class="col-sm-4 text-right"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaphonenumber'];?>
 </label>
            <div class="col-sm-8"> <?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['phonenumber'];?>
 </div>
          </div>
          <?php } else { ?>
          <label for="phonenumber" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaphonenumber'];?>
</label>
          <input type="text" name="phonenumber" id="phonenumber" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['phonenumber'];?>
" class="form-control"<?php if (!in_array('phonenumber',$_smarty_tpl->tpl_vars['clientsProfileOptionalFields']->value)) {?> required<?php }?> />
          <?php }?> </div>
        <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['customfield']->value) {
?>
        <div class="form-group">
          <label class="control-label" for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
          <div class="control"> <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>
 <?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>
 </div>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?> </div>
    </div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['securityquestions']->value && !$_smarty_tpl->tpl_vars['loggedin']->value) {?>
  <div class="panel panel-default" id="securityQuestion">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityquestion'];?>
:</h3>
    </div>
    <div class="panel-body">
      <div class="form-group col-sm-12">
        <select name="securityqid" id="securityqid" class="form-control">
          
          
          
              
          
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['securityquestions']->value, 'question', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['question']->value) {
?>
                                    
          
              
          
          
          <option value=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>
</option>
          
          
          
              
          
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            
        
            
        
        
        </select>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label" for="securityqans"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityanswer'];?>
</label>
        <div class="col-sm-6">
          <input type="password" name="securityqans" id="securityqans" class="form-control"/>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  
  <?php if ($_smarty_tpl->tpl_vars['taxenabled']->value && !$_smarty_tpl->tpl_vars['loggedin']->value) {?>
  <div class="carttaxwarning"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['carttaxupdateselections'];?>

    <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['carttaxupdateselectionsupdate'];?>
" name="updateonly" class="btn btn-info btn-sm" />
  </div>
  <?php }?>
  
  <?php if ($_smarty_tpl->tpl_vars['domainsinorder']->value) {?>
  <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregistrantinfo'];?>
</h2>
  <select name="contact" id="inputDomainContact" class="form-control">
    <option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['usedefaultcontact'];?>
</option>
    
    
    
        
    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domaincontacts']->value, 'domcontact');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['domcontact']->value) {
?>
                        
    
        
    
    
    <option value="<?php echo $_smarty_tpl->tpl_vars['domcontact']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['contact']->value == $_smarty_tpl->tpl_vars['domcontact']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['domcontact']->value['name'];?>
</option>
    
    
    
        
    
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    
    
        
    
    
    <option value="addingnew"<?php if ($_smarty_tpl->tpl_vars['contact']->value == "addingnew") {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareanavaddcontact'];?>
...</option>
  </select>
  <br />
  <div class="signupfields<?php if ($_smarty_tpl->tpl_vars['contact']->value != "addingnew") {?> hidden<?php }?>" id="domaincontactfields">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="domaincontactfirstname" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>
</label>
          <input type="text" name="domaincontactfirstname" id="domaincontactfirstname" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['firstname'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactlastname" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>
</label>
          <input type="text" name="domaincontactlastname" id="domaincontactlastname" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['lastname'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactcompanyname" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacompanyname'];?>
</label>
          <input type="text" name="domaincontactcompanyname" id="domaincontactcompanyname" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['companyname'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactemail" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>
          <input type="email" name="domaincontactemail" id="domaincontactemail" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['email'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactphonenumber" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaphonenumber'];?>
</label>
          <input type="text" name="domaincontactphonenumber" id="domaincontactphonenumber" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['phonenumber'];?>
" class="form-control" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="domaincontactaddress1" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress1'];?>
</label>
          <input type="text" name="domaincontactaddress1" id="domaincontactaddress1" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['address1'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactaddress2" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress2'];?>
</label>
          <input type="text" name="domaincontactaddress2" id="domaincontactaddress2" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['address2'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactcity" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacity'];?>
</label>
          <input type="text" name="domaincontactcity" id="domaincontactcity" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['city'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactstate" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareastate'];?>
</label>
          <input type="text" name="domaincontactstate" id="domaincontactstate" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['state'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactpostcode" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapostcode'];?>
</label>
          <input type="text" name="domaincontactpostcode" id="domaincontactpostcode" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['postcode'];?>
" class="form-control" />
        </div>
        <div class="form-group">
          <label for="domaincontactcountry" class="control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacountry'];?>
</label>
          <select id="domaincontactcountry" name="domaincontactcountry" class="form-control">
            
            
            
                
            
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'thisCountryName', false, 'thisCountryCode');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['thisCountryCode']->value => $_smarty_tpl->tpl_vars['thisCountryName']->value) {
?>
                                        
            
                
            
            
            <option value="<?php echo $_smarty_tpl->tpl_vars['thisCountryCode']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['domaincontact']->value['country'] && $_smarty_tpl->tpl_vars['thisCountryCode']->value == $_smarty_tpl->tpl_vars['domaincontact']->value['country']) || $_smarty_tpl->tpl_vars['thisCountryCode']->value == $_smarty_tpl->tpl_vars['clientsdetails']->value['country']) {?>selected="selected"<?php }?>>
            
            
            
                
            <?php echo $_smarty_tpl->tpl_vars['thisCountryName']->value;?>

            
                
            
            
            </option>
            
            
            
                
            
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                
          
              
          
          
          </select>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
  <div class="col-md-6">
    <div class="signupfields padded small-box">
      <h4><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromotioncode'];?>
</h4>
      <div class="small-box-inner"> <?php if ($_smarty_tpl->tpl_vars['promotioncode']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['promotioncode']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['promotiondescription']->value;?>
<br />
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=removepromo"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderdontusepromo'];?>
</a> <?php } else { ?>
        <div class="input-group">
          <input type="text" name="promocode" id="inputPromoCode" class="form-control" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderPromoCodePlaceholder"),$_smarty_tpl ) );?>
">
          <span class="input-group-btn">
          <button type="submit" name="validatepromo" formnovalidate class="btn btn-warning" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromovalidatebutton'];?>
"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpromovalidatebutton'];?>
 </button>
          </span> </div>
        <?php }?> 
        <!--small-box-inner--> 
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="signupfields small-box padded">
      <h4 class="yellow-bg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymentmethod'];?>
</h4>
      <div class="small-box-inner">
        <ul class="list1">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gateways']->value, 'gateway', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['gateway']->value) {
?>
          <li>
            <label class="radio-inline">
              <input type="radio" name="paymentmethod" value="<?php echo $_smarty_tpl->tpl_vars['gateway']->value['sysname'];?>
" id="pgbtn<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" onclick="<?php if ($_smarty_tpl->tpl_vars['gateway']->value['type'] == "CC") {?>showCCForm()<?php } else { ?>hideCCForm()<?php }?>"<?php if ($_smarty_tpl->tpl_vars['selectedgateway']->value == $_smarty_tpl->tpl_vars['gateway']->value['sysname']) {?> checked<?php }?> />
              <?php echo $_smarty_tpl->tpl_vars['gateway']->value['name'];?>
</label>
          </li>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <div id="ccinputform" class="signupfields<?php if ($_smarty_tpl->tpl_vars['selectedgatewaytype']->value != "CC") {?> hidden<?php }?>">
          <table width="100%" cellspacing="0" cellpadding="0" class="configtable textleft">
            <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?>
            <tr>
              <td class="fieldlabel"></td>
              <td class="fieldarea"><label class="radio-inline">
                  <input type="radio" name="ccinfo" value="useexisting" id="useexisting" onclick="useExistingCC()"<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?> checked<?php } else { ?> disabled<?php }?> />
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcarduseexisting'];?>

                  <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?>
                  (<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'];?>
)
                  <?php }?> </label>
                <br />
                <label class="radio-inline">
                  <input type="radio" name="ccinfo" value="new" id="new" onclick="enterNewCC()"<?php if (!$_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] || $_smarty_tpl->tpl_vars['ccinfo']->value == "new") {?> checked<?php }?> />
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardenternewcard'];?>
 </label></td>
            </tr>
            <?php } else { ?>
            <input type="hidden" name="ccinfo" value="new" />
            <?php }?>
            <tr class="newccinfo"<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] && $_smarty_tpl->tpl_vars['ccinfo']->value != "new") {?> style="display:none;"<?php }?>>
              <td class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardtype'];?>
</td>
              <td class="fieldarea"><select name="cctype" id="cctype">
                  
                  
                  
                      
                  
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['acceptedcctypes']->value, 'cardtype', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['cardtype']->value) {
?>
                                                <option<?php if ($_smarty_tpl->tpl_vars['cctype']->value == $_smarty_tpl->tpl_vars['cardtype']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['cardtype']->value;?>

                  
                      
                  
                  
                  </option>
                  
                  
                  
                      
                  
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        
                
                    
                
                
                </select></td>
            </tr>
            <tr class="newccinfo"<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] && $_smarty_tpl->tpl_vars['ccinfo']->value != "new") {?> style="display:none;"<?php }?>>
              <td class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardnumber'];?>
</td>
              <td class="fieldarea"><input type="text" name="ccnumber" size="30" value="<?php echo $_smarty_tpl->tpl_vars['ccnumber']->value;?>
" autocomplete="off" /></td>
            </tr>
            <tr class="newccinfo"<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] && $_smarty_tpl->tpl_vars['ccinfo']->value != "new") {?> style="display:none;"<?php }?>>
              <td class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardexpires'];?>
</td>
              <td class="fieldarea"><select name="ccexpirymonth" id="ccexpirymonth" class="newccinfo">
                  
                  
                  
                      
                  
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
?>
                                                <option<?php if ($_smarty_tpl->tpl_vars['ccexpirymonth']->value == $_smarty_tpl->tpl_vars['month']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['month']->value;?>

                  
                      
                  
                  
                  </option>
                  
                  
                  
                      
                  
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        
                
                    
                
                
                </select>
                /
                <select name="ccexpiryyear" class="newccinfo">
                  
                  
                  
                      
                  
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['expiryyears']->value, 'year');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
?>
                                                <option<?php if ($_smarty_tpl->tpl_vars['ccexpiryyear']->value == $_smarty_tpl->tpl_vars['year']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>

                  
                      
                  
                  
                  </option>
                  
                  
                  
                      
                  
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        
                
                    
                
                
                </select></td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['showccissuestart']->value) {?>
            <tr class="newccinfo"<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] && $_smarty_tpl->tpl_vars['ccinfo']->value != "new") {?> style="display:none;"<?php }?>>
              <td class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardstart'];?>
</td>
              <td class="fieldarea"><select name="ccstartmonth" id="ccstartmonth" class="newccinfo">
                  
                  
                  
                      
                  
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['months']->value, 'month');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['month']->value) {
?>
                                                    <option<?php if ($_smarty_tpl->tpl_vars['ccstartmonth']->value == $_smarty_tpl->tpl_vars['month']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['month']->value;?>

                  
                      
                  
                  
                  </option>
                  
                  
                  
                      
                  
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            
                
                    
                
                
                </select>
                /
                <select name="ccstartyear" class="newccinfo">
                  
                  
                  
                      
                  
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['startyears']->value, 'year');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
?>
                                                    <option<?php if ($_smarty_tpl->tpl_vars['ccstartyear']->value == $_smarty_tpl->tpl_vars['year']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>

                  
                      
                  
                  
                  </option>
                  
                  
                  
                      
                  
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            
                
                    
                
                
                </select></td>
            </tr>
            <tr class="newccinfo"<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] && $_smarty_tpl->tpl_vars['ccinfo']->value != "new") {?> style="display:none;"<?php }?>>
              <td class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardissuenum'];?>
</td>
              <td class="fieldarea"><input type="text" name="ccissuenum" value="<?php echo $_smarty_tpl->tpl_vars['ccissuenum']->value;?>
" size="5" maxlength="3" /></td>
            </tr>
            <?php }?>
            <tr>
              <td class="fieldlabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcvvnumber'];?>
</td>
              <td class="fieldarea"><input type="text" name="cccvv" id="cccvv" value="<?php echo $_smarty_tpl->tpl_vars['cccvv']->value;?>
" size="5" autocomplete="off" />
                <a href="#" onclick="window.open('images/ccv.gif','','width=280,height=200,scrollbars=no,top=100,left=100');return false"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcvvwhere'];?>
</a></td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['shownostore']->value) {?>
            <tr>
              <td></td>
              <td class="fieldarea"><label class="checkbox-inline" for="nostore">
                  <input type="checkbox" name="nostore" />
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardnostore'];?>
 </label></td>
            </tr>
            <?php }?>
          </table>
        </div>
        <!--small-box-inner--> 
      </div>
      <!--small-box--> 
    </div>
  </div>
  <div class="col-md-12"> <?php if ($_smarty_tpl->tpl_vars['shownotesfield']->value) {?>
    <div class="signupfields small-box padded">
      <h4 class="black-bg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernotes'];?>
</h4>
      <div class="small-box-inner">
        <textarea name="notes" rows="3" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernotesdescription'];?>
"><?php echo $_smarty_tpl->tpl_vars['notes']->value;?>
</textarea>
        <!--small-box-inner--> 
      </div>
    </div>
    <?php }?> </div>
  <div class="clearfix"></div>
  <?php if ($_smarty_tpl->tpl_vars['accepttos']->value) {?>
  <div class="col-md-12">
    <label class="checkbox-inline">
      <input type="checkbox" name="accepttos" id="accepttos" />
      <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertosagreement'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['tosurl']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertos'];?>
</a> </label>
  </div>
  <br />
  <?php }?>
  <div class="col-md-12">
    <button type="submit" id="btnCompleteOrder"<?php if ($_smarty_tpl->tpl_vars['cartitems']->value == 0) {?> disabled<?php }?> onclick="this.value='<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pleasewait'];?>
'" class="btn btn-success pull-right btn-lg" <?php if ($_smarty_tpl->tpl_vars['custtype']->value == "existing" && !$_smarty_tpl->tpl_vars['loggedin']->value) {?>formnovalidate<?php }?>>
    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['checkout'];?>

    </button>
  </div>
</form>
</div>
<?php } else {
}?>
<div class="view_outer_box col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="cartwarningbox"><i class="fa fa-lock"></i> &nbsp;<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersecure'];?>
 (<strong><?php echo $_smarty_tpl->tpl_vars['ipaddress']->value;?>
</strong>) <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersecure2'];?>
 </div>
</div>
<?php }
}
