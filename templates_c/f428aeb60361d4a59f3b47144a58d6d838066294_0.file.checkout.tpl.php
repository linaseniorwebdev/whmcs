<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:25:24
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fac4289260_94484858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f428aeb60361d4a59f3b47144a58d6d838066294' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/checkout.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/common.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories-collapsed.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/linkedaccounts.tpl' => 2,
  ),
),false)) {
function content_5d28fac4289260_94484858 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'getFontAwesomeCCIcon' => 
  array (
    'compiled_filepath' => '/home/azur/webapps/app-whmcs/templates_c/f428aeb60361d4a59f3b47144a58d6d838066294_0.file.checkout.tpl.php',
    'uid' => 'f428aeb60361d4a59f3b47144a58d6d838066294',
    'call_name' => 'smarty_template_function_getFontAwesomeCCIcon_19517096685d28fac421a851_56449436',
  ),
));
$template = $_smarty_tpl;
echo '<script'; ?>
>
    // Define state tab index value
    var statesTab = 10;
    // Do not enforce state input client side
    var stateNotRequired = true;
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/PasswordStrength.js"><?php echo '</script'; ?>
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


<div id="order-standard_cart">
  <div class="viewCartDiv checkoutDiv">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?a=checkout" name="orderfrm" id="frmCheckout">
                <input type="hidden" name="submit" value="true" />
                <input type="hidden" name="custtype" id="inputCustType" value="<?php echo $_smarty_tpl->tpl_vars['custtype']->value;?>
" />
    <div class="row">       

        <div class="col-md-8">
            <h4 class="cartreview"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['checkout'];?>
</h4>
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <div class="already-registered clearfix">
                <div class="pull-right">
                    <button type="button" class="btn btn-info<?php if ($_smarty_tpl->tpl_vars['loggedin']->value || !$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['custtype']->value == "existing") {?> hidden<?php }?>" id="btnAlreadyRegistered">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['alreadyRegistered'];?>

                    </button>
                    <button type="button" class="btn btn-warning<?php if ($_smarty_tpl->tpl_vars['loggedin']->value || $_smarty_tpl->tpl_vars['custtype']->value != "existing") {?> hidden<?php }?>" id="btnNewUserSignup">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['createAccount'];?>

                    </button>
                </div>
                <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['enterPersonalDetails'];?>
</p>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                <div class="alert alert-danger checkout-error-feedback" role="alert">
                    <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['correctErrors'];?>
:</p>
                    <ul>
                        <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                    </ul>
                </div>
                <div class="clearfix"></div>
            <?php }?>

            

                <div id="containerExistingUserSignin"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value || $_smarty_tpl->tpl_vars['custtype']->value != "existing") {?> class="hidden"<?php }?>>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['existingCustomerLogin'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['emailAddress'];?>
</label>
                                <input type="text" name="loginemail" id="inputLoginEmail" class="field" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
</label>
                                <input type="password" name="loginpassword" id="inputLoginPassword" class="field" placeholder="">
                            </div>
                        </div>
                    </div>

                    <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/linkedaccounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('linkContext'=>"checkout-existing"), 0, true);
?>
                </div>

                <div id="containerNewUserSignup">

                    <div<?php if ($_smarty_tpl->tpl_vars['loggedin']->value || $_smarty_tpl->tpl_vars['custtype']->value == "existing") {?> class="hidden"<?php }?>>
                        <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/linkedaccounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('linkContext'=>"checkout-new"), 0, true);
?>
                    </div>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['personalInformation'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['firstName'];?>
</label>
                                <input type="text" name="firstname" id="inputFirstName" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['firstname'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?> autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['lastName'];?>
</label>
                                <input type="text" name="lastname" id="inputLastName" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['lastname'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['emailAddress'];?>
</label>
                                <input type="email" name="email" id="inputEmail" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['email'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['phoneNumber'];?>
</label>
                                <input type="tel" name="phonenumber" id="inputPhone" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['phonenumber'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                    </div>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['billingAddress'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['companyName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['optional'];?>
)</label>
                                <input type="text" name="companyname" id="inputCompanyName" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['companyname'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress'];?>
</label>
                                <input type="text" name="address1" id="inputAddress1" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address1'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress2'];?>
</label>
                                <input type="text" name="address2" id="inputAddress2" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['address2'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['city'];?>
</label>
                                <input type="text" name="city" id="inputCity" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['city'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['state'];?>
</label>
                                <input type="text" name="state" id="inputState" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['state'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                 <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['postcode'];?>
</label>
                                <input type="text" name="postcode" id="inputPostcode" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['postcode'];?>
"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> readonly="readonly"<?php }?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['country'];?>
</label>
                                <select name="country" id="inputCountry" class="field"<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?> disabled="disabled"<?php }?>>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'countrylabel', false, 'countrycode');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['countrycode']->value => $_smarty_tpl->tpl_vars['countrylabel']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['countrycode']->value;?>
"<?php if ((!$_smarty_tpl->tpl_vars['country']->value && $_smarty_tpl->tpl_vars['countrycode']->value == $_smarty_tpl->tpl_vars['defaultcountry']->value) || $_smarty_tpl->tpl_vars['countrycode']->value == $_smarty_tpl->tpl_vars['country']->value) {?> selected<?php }?>>
                                            <?php echo $_smarty_tpl->tpl_vars['countrylabel']->value;?>

                                        </option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
                        <div class="sub-heading">
                            <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderadditionalrequiredinfo'];?>
</span>
                        </div>
                        <div class="field-container">
                            <div class="row">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
?>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
                                            <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>

                                            <?php if ($_smarty_tpl->tpl_vars['customfield']->value['description']) {?>
                                                <span class="field-help-text">
                                                    <?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>

                                                </span>
                                            <?php }?>
                                        </div>
                                    </div>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                    <?php }?>

                </div>

                <?php if ($_smarty_tpl->tpl_vars['domainsinorder']->value) {?>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainregistrantinfo'];?>
</span>
                    </div>

                    <p class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['domainAlternativeContact'];?>
</p>

                    <div class="row margin-bottom">
                        <div class="col-sm-6">
                            <select name="contact" id="inputDomainContact" class="field">
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['usedefaultcontact'];?>
</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domaincontacts']->value, 'domcontact');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['domcontact']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['domcontact']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['contact']->value == $_smarty_tpl->tpl_vars['domcontact']->value['id']) {?> selected<?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['domcontact']->value['name'];?>

                                    </option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <option value="addingnew"<?php if ($_smarty_tpl->tpl_vars['contact']->value == "addingnew") {?> selected<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareanavaddcontact'];?>
...
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row<?php if ($_smarty_tpl->tpl_vars['contact']->value != "addingnew") {?> hidden<?php }?>" id="domainRegistrantInputFields">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['firstName'];?>
</label>
                                <input type="text" name="domaincontactfirstname" id="inputDCFirstName" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['firstname'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['lastName'];?>
</label>
                                <input type="text" name="domaincontactlastname" id="inputDCLastName" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['lastname'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['emailAddress'];?>
</label>                                
                                <input type="email" name="domaincontactemail" id="inputDCEmail" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['email'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['phoneNumber'];?>
</label>
                                <input type="tel" name="domaincontactphonenumber" id="inputDCPhone" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['phonenumber'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['companyName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['optional'];?>
)</label>
                                <input type="text" name="domaincontactcompanyname" id="inputDCCompanyName" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['companyname'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress'];?>
</label>
                                <input type="text" name="domaincontactaddress1" id="inputDCAddress1" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['address1'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['streetAddress2'];?>
</label>
                                <input type="text" name="domaincontactaddress2" id="inputDCAddress2" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['address2'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['city'];?>
</label>
                                <input type="text" name="domaincontactcity" id="inputDCCity" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['city'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['state'];?>
</label>
                                <input type="text" name="domaincontactstate" id="inputDCState" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['state'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['postcode'];?>
</label>
                                <input type="text" name="domaincontactpostcode" id="inputDCPostcode" class="field" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['domaincontact']->value['postcode'];?>
">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['country'];?>
</label>
                                <select name="domaincontactcountry" id="inputDCCountry" class="field">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'countrylabel', false, 'countrycode');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['countrycode']->value => $_smarty_tpl->tpl_vars['countrylabel']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['countrycode']->value;?>
"<?php if ((!$_smarty_tpl->tpl_vars['domaincontact']->value['country'] && $_smarty_tpl->tpl_vars['countrycode']->value == $_smarty_tpl->tpl_vars['defaultcountry']->value) || $_smarty_tpl->tpl_vars['countrycode']->value == $_smarty_tpl->tpl_vars['domaincontact']->value['country']) {?> selected<?php }?>>
                                            <?php echo $_smarty_tpl->tpl_vars['countrylabel']->value;?>

                                        </option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                    </div>

                <?php }?>

                <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value) {?>

                    <div id="containerNewUserSecurity"<?php if ((!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['custtype']->value == "existing") || ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value && !$_smarty_tpl->tpl_vars['securityquestions']->value)) {?> class="hidden"<?php }?>>

                        <div class="sub-heading">
                            <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['accountSecurity'];?>
</span>
                        </div>

                        <div id="containerPassword" class="row<?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value && $_smarty_tpl->tpl_vars['securityquestions']->value) {?> hidden<?php }?>">
                            <div id="passwdFeedback" style="display: none;" class="alert alert-info text-center col-sm-12"></div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
</label>
                                    <input type="password" name="password" id="inputNewPassword1" data-error-threshold="<?php echo $_smarty_tpl->tpl_vars['pwStrengthErrorThreshold']->value;?>
" data-warning-threshold="<?php echo $_smarty_tpl->tpl_vars['pwStrengthWarningThreshold']->value;?>
" class="field" placeholder=""<?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"<?php }?>>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaconfirmpassword'];?>
</label>
                                    <input type="password" name="password2" id="inputNewPassword2" class="field" placeholder=""<?php if ($_smarty_tpl->tpl_vars['remote_auth_prelinked']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"<?php }?>>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="passwordStrengthMeterBar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center small text-muted" id="passwordStrengthTextLabel"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrength'];?>
: <?php echo $_smarty_tpl->tpl_vars['LANG']->value['pwstrengthenter'];?>
</p>
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['securityquestions']->value) {?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <select name="securityqid" id="inputSecurityQId" class="field">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityquestion'];?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['securityquestions']->value, 'question');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['question']->value['id'] == $_smarty_tpl->tpl_vars['securityqid']->value) {?> selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>

                                            </option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group prepend-icon">
                                        <label for="inputSecurityQAns" class="field-icon">
                                            <i class="fas fa-lock"></i>
                                        </label>
                                        <input type="password" name="securityqans" id="inputSecurityQAns" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityanswer'];?>
">
                                    </div>
                                </div>
                            </div>
                        <?php }?>

                    </div>

                <?php }?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hookOutput']->value, 'output');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['output']->value) {
?>
                    <div>
                        <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <div class="sub-heading">
                    <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['paymentDetails'];?>
</span>
                </div>

                
                <?php if ($_smarty_tpl->tpl_vars['canUseCreditOnCheckout']->value) {?>
                    <div id="applyCreditContainer" class="apply-credit-container" data-apply-credit="<?php echo $_smarty_tpl->tpl_vars['applyCredit']->value;?>
">
                        <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cart.availableCreditBalance','amount'=>$_smarty_tpl->tpl_vars['creditBalance']->value),$_smarty_tpl ) );?>
</p>

                        <?php if ($_smarty_tpl->tpl_vars['creditBalance']->value->toNumeric() >= $_smarty_tpl->tpl_vars['total']->value->toNumeric()) {?>
                            <label class="radio">
                                <input id="useFullCreditOnCheckout" type="radio" name="applycredit" value="1"<?php if ($_smarty_tpl->tpl_vars['applyCredit']->value) {?> checked<?php }?>>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cart.applyCreditAmountNoFurtherPayment','amount'=>$_smarty_tpl->tpl_vars['total']->value),$_smarty_tpl ) );?>

                            </label>
                        <?php } else { ?>
                            <label class="radio">
                                <input id="useCreditOnCheckout" type="radio" name="applycredit" value="1"<?php if ($_smarty_tpl->tpl_vars['applyCredit']->value) {?> checked<?php }?>>
                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cart.applyCreditAmount','amount'=>$_smarty_tpl->tpl_vars['creditBalance']->value),$_smarty_tpl ) );?>

                            </label>
                        <?php }?>

                        <label class="radio">
                            <input id="skipCreditOnCheckout" type="radio" name="applycredit" value="0"<?php if (!$_smarty_tpl->tpl_vars['applyCredit']->value) {?> checked<?php }?>>
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'cart.applyCreditSkip','amount'=>$_smarty_tpl->tpl_vars['creditBalance']->value),$_smarty_tpl ) );?>

                        </label>
                    </div>
                <?php }?>
                <div id="paymentGatewaysContainer" class="form-group">
                    <p class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['preferredPaymentMethod'];?>
</p>

                    <div class="text-left">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gateways']->value, 'gateway', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['gateway']->value) {
?>
                            <label class="radio-inline">
                                <input type="radio" name="paymentmethod" value="<?php echo $_smarty_tpl->tpl_vars['gateway']->value['sysname'];?>
" class="payment-methods<?php if ($_smarty_tpl->tpl_vars['gateway']->value['type'] == "CC") {?> is-credit-card<?php }?>"<?php if ($_smarty_tpl->tpl_vars['selectedgateway']->value == $_smarty_tpl->tpl_vars['gateway']->value['sysname']) {?> checked<?php }?> />
                                <?php echo $_smarty_tpl->tpl_vars['gateway']->value['name'];?>

                            </label>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </div>

                <div class="alert alert-danger text-center gateway-errors hidden"></div>

                <div class="clearfix"></div>

                <div id="creditCardInputFields"<?php if ($_smarty_tpl->tpl_vars['selectedgatewaytype']->value != "CC") {?> class="hidden"<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?>
                        <div class="row margin-bottom">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <label class="radio-inline">
                                        <input type="radio" name="ccinfo" value="useexisting" id="useexisting" <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?> checked<?php } else { ?> disabled<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcarduseexisting'];?>

                                        <?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour']) {?>
                                            (<?php echo $_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'];?>
)
                                        <?php }?>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="ccinfo" value="new" id="new" <?php if (!$_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] || $_smarty_tpl->tpl_vars['ccinfo']->value == "new") {?> checked<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardenternewcard'];?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="ccinfo" value="new" />
                    <?php }?>
                    <div id="newCardInfo" class="row<?php if ($_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] && $_smarty_tpl->tpl_vars['ccinfo']->value != "new") {?> hidden<?php }?>">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" id="cctype" name="cctype" value="<?php echo $_smarty_tpl->tpl_vars['acceptedcctypes']->value[0];?>
" />
                                <div class="dropdown" id="cardType">
                                    <button class="btn btn-default dropdown-toggle field" type="button" id="creditCardType" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span id="selectedCardType">
                                            <i class="<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getFontAwesomeCCIcon', array('ccType'=>$_smarty_tpl->tpl_vars['acceptedcctypes']->value[0]), true);?>
 fa-fw"></i>
                                            <?php echo $_smarty_tpl->tpl_vars['acceptedcctypes']->value[0];?>

                                        </span>
                                        <span class="fas fa-caret-down fa-fw"></span>
                                    </button>
                                    <ul class="dropdown-menu" id="creditCardTypeDropDown" aria-labelledby="creditCardType">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['acceptedcctypes']->value, 'cardType');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cardType']->value) {
?>
                                            <li>
                                                <a href="#">
                                                    <i class="<?php $_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'getFontAwesomeCCIcon', array('ccType'=>$_smarty_tpl->tpl_vars['cardType']->value), true);?>
 fa-fw"></i>
                                                    <span class="type">
                                                        <?php echo $_smarty_tpl->tpl_vars['cardType']->value;?>

                                                    </span>
                                                </a>
                                            </li>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardNumber" class="field-icon">
                                    <i class="fas fa-credit-card"></i>
                                </label>
                                <input type="tel" name="ccnumber" id="inputCardNumber" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['cardNumber'];?>
" autocomplete="cc-number">
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['showccissuestart']->value) {?>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputCardStart" class="field-icon">
                                        <i class="far fa-calendar-check"></i>
                                    </label>
                                    <input type="tel" name="ccstartdate" id="inputCardStart" class="field" placeholder="MM / YY (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardstart'];?>
)" autocomplete="cc-exp">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputCardIssue" class="field-icon">
                                        <i class="fas fa-asterisk"></i>
                                    </label>
                                    <input type="tel" name="ccissuenum" id="inputCardIssue" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardissuenum'];?>
">
                                </div>
                            </div>
                        <?php }?>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardExpiry" class="field-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </label>
                                <input type="tel" name="ccexpirydate" id="inputCardExpiry" class="field" placeholder="MM / YY<?php if ($_smarty_tpl->tpl_vars['showccissuestart']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['LANG']->value['creditcardcardexpires'];?>
)<?php }?>" autocomplete="cc-exp">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardCVV" class="field-icon">
                                    <i class="fas fa-barcode"></i>
                                </label>
                                <input type="tel" name="cccvv" id="inputCardCVV" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['cvv'];?>
" autocomplete="cc-cvc">
                            </div>
                        </div>
                    </div>
                    <div id="existingCardInfo" class="row<?php if (!$_smarty_tpl->tpl_vars['clientsdetails']->value['cclastfour'] || $_smarty_tpl->tpl_vars['ccinfo']->value == "new") {?> hidden<?php }?>">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardCvvExisting" class="field-icon">
                                    <i class="fas fa-barcode"></i>
                                </label>
                                <input type="tel" name="cccvvexisting" id="inputCardCvvExisting" class="field" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['cvv'];?>
" autocomplete="cc-cvc">
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['shownotesfield']->value) {?>

                    <div class="sub-heading">
                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderForm']['additionalNotes'];?>
</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="notes" class="field notetext" rows="4" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernotesdescription'];?>
"><?php echo $_smarty_tpl->tpl_vars['orderNotes']->value;?>
</textarea>
                            </div>
                        </div>
                    </div>

                <?php }?>

                

                <div class="text-left">
                    <?php if ($_smarty_tpl->tpl_vars['accepttos']->value) {?>
                        <p class="accepttos">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="accepttos" id="accepttos" />
                                &nbsp;
                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertosagreement'];?>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['tosurl']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertos'];?>
</a>
                            </label>
                        </p>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['captcha']->value) {?>
                        <div class="text-center margin-bottom">
                            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        </div>
                    <?php }?>
                    <button type="submit"
                            id="btnCompleteOrder"
                            class="btn btn-primary btn-lg disable-on-click spinner-on-click <?php if ($_smarty_tpl->tpl_vars['captcha']->value) {
echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);
}?>"
                            <?php if ($_smarty_tpl->tpl_vars['cartitems']->value == 0) {?>disabled="disabled"<?php }?>
                            onclick="this.value='<?php echo $_smarty_tpl->tpl_vars['LANG']->value['pleasewait'];?>
'">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['completeorder'];?>

                    </button>
                </div>
            

            <?php if ($_smarty_tpl->tpl_vars['servedOverSsl']->value) {?>
                <div class="alert alert-warning checkout-security-msg">
                    <i class="fas fa-lock"></i>
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersecure'];?>
 (<strong><?php echo $_smarty_tpl->tpl_vars['ipaddress']->value;?>
</strong>) <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersecure2'];?>

                    <div class="clearfix"></div>
                </div>
            <?php }?>

        </div>
        <div class="col-md-4">

                        
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
                                    <div class="total-due-today total-due-today-padded">
                                        <span id="totalDueToday" class="amt"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
                                        <span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertotalduetoday'];?>
</span>
                                    </div>                                    
                                </div>
                            </div>
                                <?php if ($_smarty_tpl->tpl_vars['showMarketingEmailOptIn']->value) {?>
                                    <div class="showMarketingEmail">
                                        <div class="marketing-email-optin">
                                            <div class="text-center p10">
											<img src="templates/<?php echo $_smarty_tpl->tpl_vars['hostx_theme_settings']->value['template_name_custom'];?>
/images/marketingemail.png"></div>
                                            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'emailMarketing.joinOurMailingList'),$_smarty_tpl ) );?>
</h4>
                                            <p><?php echo $_smarty_tpl->tpl_vars['marketingEmailOptInMessage']->value;?>
</p>
                                            <div class="text-center">
                                                <input type="checkbox" name="marketingoptin" value="1"<?php if ($_smarty_tpl->tpl_vars['marketingEmailOptIn']->value) {?> checked<?php }?> class="no-icheck toggle-switch-success" data-size="small" data-on-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'yes'),$_smarty_tpl ) );?>
" data-off-text="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'no'),$_smarty_tpl ) );?>
">
                                            </div>
                                        </div>                                    
                                    </div>    
                                <?php }?>
                        </div>



        </div>

    </div>
    </form>
  </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/jquery.payment.js"><?php echo '</script'; ?>
>
<?php }
/* smarty_template_function_getFontAwesomeCCIcon_19517096685d28fac421a851_56449436 */
if (!function_exists('smarty_template_function_getFontAwesomeCCIcon_19517096685d28fac421a851_56449436')) {
function smarty_template_function_getFontAwesomeCCIcon_19517096685d28fac421a851_56449436(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

    <?php if ($_smarty_tpl->tpl_vars['ccType']->value == "Visa") {?>
        fab fa-cc-visa
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value == "MasterCard") {?>
        fab fa-cc-mastercard
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value == "Discover") {?>
        fab fa-cc-discover
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value == "American Express") {?>
        fab fa-cc-amex
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value == "JCB") {?>
        fab fa-cc-jcb
    <?php } elseif ($_smarty_tpl->tpl_vars['ccType']->value == "Diners Club" || $_smarty_tpl->tpl_vars['ccType']->value == "EnRoute") {?>
        fab fa-cc-diners-club
    <?php } else { ?>
        fas fa-credit-card
    <?php }
}}
/*/ smarty_template_function_getFontAwesomeCCIcon_19517096685d28fac421a851_56449436 */
}
