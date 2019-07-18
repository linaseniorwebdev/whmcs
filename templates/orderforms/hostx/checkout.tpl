<script>
    // Define state tab index value
    var statesTab = 10;
    // Do not enforce state input client side
    var stateNotRequired = true;
</script>
{include file="orderforms/{$carttpl}/common.tpl"}
<script type="text/javascript" src="{$BASE_PATH_JS}/StatesDropdown.js"></script>
<script type="text/javascript" src="{$BASE_PATH_JS}/PasswordStrength.js"></script>
<script>
    window.langPasswordStrength = "{$LANG.pwstrength}";
    window.langPasswordWeak = "{$LANG.pwstrengthweak}";
    window.langPasswordModerate = "{$LANG.pwstrengthmoderate}";
    window.langPasswordStrong = "{$LANG.pwstrengthstrong}";
</script>
{function name=getFontAwesomeCCIcon}
    {if $ccType eq "Visa"}
        fab fa-cc-visa
    {elseif $ccType eq "MasterCard"}
        fab fa-cc-mastercard
    {elseif $ccType eq "Discover"}
        fab fa-cc-discover
    {elseif $ccType eq "American Express"}
        fab fa-cc-amex
    {elseif $ccType eq "JCB"}
        fab fa-cc-jcb
    {elseif $ccType eq "Diners Club" || $ccType eq "EnRoute"}
        fab fa-cc-diners-club
    {else}
        fas fa-credit-card
    {/if}
{/function}

<div id="order-standard_cart">
  <div class="viewCartDiv checkoutDiv">
    <form method="post" action="{$smarty.server.PHP_SELF}?a=checkout" name="orderfrm" id="frmCheckout">
                <input type="hidden" name="submit" value="true" />
                <input type="hidden" name="custtype" id="inputCustType" value="{$custtype}" />
    <div class="row">       

        <div class="col-md-8">
            <h4 class="cartreview">{$LANG.orderForm.checkout}</h4>
            {include file="orderforms/{$carttpl}/sidebar-categories-collapsed.tpl"}

            <div class="already-registered clearfix">
                <div class="pull-right">
                    <button type="button" class="btn btn-info{if $loggedin || !$loggedin && $custtype eq "existing"} hidden{/if}" id="btnAlreadyRegistered">
                        {$LANG.orderForm.alreadyRegistered}
                    </button>
                    <button type="button" class="btn btn-warning{if $loggedin || $custtype neq "existing"} hidden{/if}" id="btnNewUserSignup">
                        {$LANG.orderForm.createAccount}
                    </button>
                </div>
                <p>{$LANG.orderForm.enterPersonalDetails}</p>
            </div>

            {if $errormessage}
                <div class="alert alert-danger checkout-error-feedback" role="alert">
                    <p>{$LANG.orderForm.correctErrors}:</p>
                    <ul>
                        {$errormessage}
                    </ul>
                </div>
                <div class="clearfix"></div>
            {/if}

            

                <div id="containerExistingUserSignin"{if $loggedin || $custtype neq "existing"} class="hidden"{/if}>

                    <div class="sub-heading">
                        <span>{$LANG.orderForm.existingCustomerLogin}</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                <label>{$LANG.orderForm.emailAddress}</label>
                                <input type="text" name="loginemail" id="inputLoginEmail" class="field" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.clientareapassword}</label>
                                <input type="password" name="loginpassword" id="inputLoginPassword" class="field" placeholder="">
                            </div>
                        </div>
                    </div>

                    {include file="orderforms/{$carttpl}/linkedaccounts.tpl" linkContext="checkout-existing"}
                </div>

                <div id="containerNewUserSignup">

                    <div{if $loggedin || $custtype eq "existing"} class="hidden"{/if}>
                        {include file="orderforms/{$carttpl}/linkedaccounts.tpl" linkContext="checkout-new"}
                    </div>

                    <div class="sub-heading">
                        <span>{$LANG.orderForm.personalInformation}</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                <label>{$LANG.orderForm.firstName}</label>
                                <input type="text" name="firstname" id="inputFirstName" class="field" placeholder="" value="{$clientsdetails.firstname}"{if $loggedin} readonly="readonly"{/if} autofocus>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.lastName}</label>
                                <input type="text" name="lastname" id="inputLastName" class="field" placeholder="" value="{$clientsdetails.lastname}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.emailAddress}</label>
                                <input type="email" name="email" id="inputEmail" class="field" placeholder="" value="{$clientsdetails.email}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.phoneNumber}</label>
                                <input type="tel" name="phonenumber" id="inputPhone" class="field" placeholder="" value="{$clientsdetails.phonenumber}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                    </div>

                    <div class="sub-heading">
                        <span>{$LANG.orderForm.billingAddress}</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.companyName} ({$LANG.orderForm.optional})</label>
                                <input type="text" name="companyname" id="inputCompanyName" class="field" placeholder="" value="{$clientsdetails.companyname}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.streetAddress}</label>
                                <input type="text" name="address1" id="inputAddress1" class="field" placeholder="" value="{$clientsdetails.address1}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.streetAddress2}</label>
                                <input type="text" name="address2" id="inputAddress2" class="field" placeholder="" value="{$clientsdetails.address2}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.city}</label>
                                <input type="text" name="city" id="inputCity" class="field" placeholder="" value="{$clientsdetails.city}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.state}</label>
                                <input type="text" name="state" id="inputState" class="field" placeholder="" value="{$clientsdetails.state}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                 <label>{$LANG.orderForm.postcode}</label>
                                <input type="text" name="postcode" id="inputPostcode" class="field" placeholder="" value="{$clientsdetails.postcode}"{if $loggedin} readonly="readonly"{/if}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.country}</label>
                                <select name="country" id="inputCountry" class="field"{if $loggedin} disabled="disabled"{/if}>
                                    {foreach $countries as $countrycode => $countrylabel}
                                        <option value="{$countrycode}"{if (!$country && $countrycode == $defaultcountry) || $countrycode eq $country} selected{/if}>
                                            {$countrylabel}
                                        </option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                    {if $customfields}
                        <div class="sub-heading">
                            <span>{$LANG.orderadditionalrequiredinfo}</span>
                        </div>
                        <div class="field-container">
                            <div class="row">
                                {foreach $customfields as $customfield}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="customfield{$customfield.id}">{$customfield.name}</label>
                                            {$customfield.input}
                                            {if $customfield.description}
                                                <span class="field-help-text">
                                                    {$customfield.description}
                                                </span>
                                            {/if}
                                        </div>
                                    </div>
                                {/foreach}
                            </div>
                        </div>
                    {/if}

                </div>

                {if $domainsinorder}

                    <div class="sub-heading">
                        <span>{$LANG.domainregistrantinfo}</span>
                    </div>

                    <p class="small text-muted">{$LANG.orderForm.domainAlternativeContact}</p>

                    <div class="row margin-bottom">
                        <div class="col-sm-6">
                            <select name="contact" id="inputDomainContact" class="field">
                                <option value="">{$LANG.usedefaultcontact}</option>
                                {foreach $domaincontacts as $domcontact}
                                    <option value="{$domcontact.id}"{if $contact == $domcontact.id} selected{/if}>
                                        {$domcontact.name}
                                    </option>
                                {/foreach}
                                <option value="addingnew"{if $contact == "addingnew"} selected{/if}>
                                    {$LANG.clientareanavaddcontact}...
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row{if $contact neq "addingnew"} hidden{/if}" id="domainRegistrantInputFields">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.firstName}</label>
                                <input type="text" name="domaincontactfirstname" id="inputDCFirstName" class="field" placeholder="" value="{$domaincontact.firstname}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.lastName}</label>
                                <input type="text" name="domaincontactlastname" id="inputDCLastName" class="field" placeholder="" value="{$domaincontact.lastname}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.emailAddress}</label>                                
                                <input type="email" name="domaincontactemail" id="inputDCEmail" class="field" placeholder="" value="{$domaincontact.email}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.phoneNumber}</label>
                                <input type="tel" name="domaincontactphonenumber" id="inputDCPhone" class="field" placeholder="" value="{$domaincontact.phonenumber}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">                                
                                <label>{$LANG.orderForm.companyName} ({$LANG.orderForm.optional})</label>
                                <input type="text" name="domaincontactcompanyname" id="inputDCCompanyName" class="field" placeholder="" value="{$domaincontact.companyname}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.streetAddress}</label>
                                <input type="text" name="domaincontactaddress1" id="inputDCAddress1" class="field" placeholder="" value="{$domaincontact.address1}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.streetAddress2}</label>
                                <input type="text" name="domaincontactaddress2" id="inputDCAddress2" class="field" placeholder="" value="{$domaincontact.address2}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.city}</label>
                                <input type="text" name="domaincontactcity" id="inputDCCity" class="field" placeholder="" value="{$domaincontact.city}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.state}</label>
                                <input type="text" name="domaincontactstate" id="inputDCState" class="field" placeholder="" value="{$domaincontact.state}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.postcode}</label>
                                <input type="text" name="domaincontactpostcode" id="inputDCPostcode" class="field" placeholder="" value="{$domaincontact.postcode}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label>{$LANG.orderForm.country}</label>
                                <select name="domaincontactcountry" id="inputDCCountry" class="field">
                                    {foreach $countries as $countrycode => $countrylabel}
                                        <option value="{$countrycode}"{if (!$domaincontact.country && $countrycode == $defaultcountry) || $countrycode eq $domaincontact.country} selected{/if}>
                                            {$countrylabel}
                                        </option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>

                {/if}

                {if !$loggedin}

                    <div id="containerNewUserSecurity"{if (!$loggedin && $custtype eq "existing") || ($remote_auth_prelinked && !$securityquestions) } class="hidden"{/if}>

                        <div class="sub-heading">
                            <span>{$LANG.orderForm.accountSecurity}</span>
                        </div>

                        <div id="containerPassword" class="row{if $remote_auth_prelinked && $securityquestions} hidden{/if}">
                            <div id="passwdFeedback" style="display: none;" class="alert alert-info text-center col-sm-12"></div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label>{$LANG.clientareapassword}</label>
                                    <input type="password" name="password" id="inputNewPassword1" data-error-threshold="{$pwStrengthErrorThreshold}" data-warning-threshold="{$pwStrengthWarningThreshold}" class="field" placeholder=""{if $remote_auth_prelinked} value="{$password}"{/if}>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label>{$LANG.clientareaconfirmpassword}</label>
                                    <input type="password" name="password2" id="inputNewPassword2" class="field" placeholder=""{if $remote_auth_prelinked} value="{$password}"{/if}>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="passwordStrengthMeterBar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-center small text-muted" id="passwordStrengthTextLabel">{$LANG.pwstrength}: {$LANG.pwstrengthenter}</p>
                            </div>
                        </div>
                        {if $securityquestions}
                            <div class="row">
                                <div class="col-sm-6">
                                    <select name="securityqid" id="inputSecurityQId" class="field">
                                        <option value="">{$LANG.clientareasecurityquestion}</option>
                                        {foreach $securityquestions as $question}
                                            <option value="{$question.id}"{if $question.id eq $securityqid} selected{/if}>
                                                {$question.question}
                                            </option>
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group prepend-icon">
                                        <label for="inputSecurityQAns" class="field-icon">
                                            <i class="fas fa-lock"></i>
                                        </label>
                                        <input type="password" name="securityqans" id="inputSecurityQAns" class="field" placeholder="{$LANG.clientareasecurityanswer}">
                                    </div>
                                </div>
                            </div>
                        {/if}

                    </div>

                {/if}

                {foreach $hookOutput as $output}
                    <div>
                        {$output}
                    </div>
                {/foreach}

                <div class="sub-heading">
                    <span>{$LANG.orderForm.paymentDetails}</span>
                </div>

                {*<div class="alert alert-success text-center large-text" role="alert">
                    {$LANG.ordertotalduetoday}: &nbsp; <strong>{$total}</strong>
                </div>*}

                {if $canUseCreditOnCheckout}
                    <div id="applyCreditContainer" class="apply-credit-container" data-apply-credit="{$applyCredit}">
                        <p>{lang key='cart.availableCreditBalance' amount=$creditBalance}</p>

                        {if $creditBalance->toNumeric() >= $total->toNumeric()}
                            <label class="radio">
                                <input id="useFullCreditOnCheckout" type="radio" name="applycredit" value="1"{if $applyCredit} checked{/if}>
                                {lang key='cart.applyCreditAmountNoFurtherPayment' amount=$total}
                            </label>
                        {else}
                            <label class="radio">
                                <input id="useCreditOnCheckout" type="radio" name="applycredit" value="1"{if $applyCredit} checked{/if}>
                                {lang key='cart.applyCreditAmount' amount=$creditBalance}
                            </label>
                        {/if}

                        <label class="radio">
                            <input id="skipCreditOnCheckout" type="radio" name="applycredit" value="0"{if !$applyCredit} checked{/if}>
                            {lang key='cart.applyCreditSkip' amount=$creditBalance}
                        </label>
                    </div>
                {/if}
                <div id="paymentGatewaysContainer" class="form-group">
                    <p class="small text-muted">{$LANG.orderForm.preferredPaymentMethod}</p>

                    <div class="text-left">
                        {foreach key=num item=gateway from=$gateways}
                            <label class="radio-inline">
                                <input type="radio" name="paymentmethod" value="{$gateway.sysname}" class="payment-methods{if $gateway.type eq "CC"} is-credit-card{/if}"{if $selectedgateway eq $gateway.sysname} checked{/if} />
                                {$gateway.name}
                            </label>
                        {/foreach}
                    </div>
                </div>

                <div class="alert alert-danger text-center gateway-errors hidden"></div>

                <div class="clearfix"></div>

                <div id="creditCardInputFields"{if $selectedgatewaytype neq "CC"} class="hidden"{/if}>
                    {if $clientsdetails.cclastfour}
                        <div class="row margin-bottom">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <label class="radio-inline">
                                        <input type="radio" name="ccinfo" value="useexisting" id="useexisting" {if $clientsdetails.cclastfour} checked{else} disabled{/if} />
                                        {$LANG.creditcarduseexisting}
                                        {if $clientsdetails.cclastfour}
                                            ({$clientsdetails.cclastfour})
                                        {/if}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="ccinfo" value="new" id="new" {if !$clientsdetails.cclastfour || $ccinfo eq "new"} checked{/if} />
                                        {$LANG.creditcardenternewcard}
                                    </label>
                                </div>
                            </div>
                        </div>
                    {else}
                        <input type="hidden" name="ccinfo" value="new" />
                    {/if}
                    <div id="newCardInfo" class="row{if $clientsdetails.cclastfour && $ccinfo neq "new"} hidden{/if}">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" id="cctype" name="cctype" value="{$acceptedcctypes.0}" />
                                <div class="dropdown" id="cardType">
                                    <button class="btn btn-default dropdown-toggle field" type="button" id="creditCardType" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span id="selectedCardType">
                                            <i class="{getFontAwesomeCCIcon ccType=$acceptedcctypes.0} fa-fw"></i>
                                            {$acceptedcctypes.0}
                                        </span>
                                        <span class="fas fa-caret-down fa-fw"></span>
                                    </button>
                                    <ul class="dropdown-menu" id="creditCardTypeDropDown" aria-labelledby="creditCardType">
                                        {foreach $acceptedcctypes as $cardType}
                                            <li>
                                                <a href="#">
                                                    <i class="{getFontAwesomeCCIcon ccType=$cardType} fa-fw"></i>
                                                    <span class="type">
                                                        {$cardType}
                                                    </span>
                                                </a>
                                            </li>
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardNumber" class="field-icon">
                                    <i class="fas fa-credit-card"></i>
                                </label>
                                <input type="tel" name="ccnumber" id="inputCardNumber" class="field" placeholder="{$LANG.orderForm.cardNumber}" autocomplete="cc-number">
                            </div>
                        </div>
                        {if $showccissuestart}
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputCardStart" class="field-icon">
                                        <i class="far fa-calendar-check"></i>
                                    </label>
                                    <input type="tel" name="ccstartdate" id="inputCardStart" class="field" placeholder="MM / YY ({$LANG.creditcardcardstart})" autocomplete="cc-exp">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group prepend-icon">
                                    <label for="inputCardIssue" class="field-icon">
                                        <i class="fas fa-asterisk"></i>
                                    </label>
                                    <input type="tel" name="ccissuenum" id="inputCardIssue" class="field" placeholder="{$LANG.creditcardcardissuenum}">
                                </div>
                            </div>
                        {/if}
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardExpiry" class="field-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </label>
                                <input type="tel" name="ccexpirydate" id="inputCardExpiry" class="field" placeholder="MM / YY{if $showccissuestart} ({$LANG.creditcardcardexpires}){/if}" autocomplete="cc-exp">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardCVV" class="field-icon">
                                    <i class="fas fa-barcode"></i>
                                </label>
                                <input type="tel" name="cccvv" id="inputCardCVV" class="field" placeholder="{$LANG.orderForm.cvv}" autocomplete="cc-cvc">
                            </div>
                        </div>
                    </div>
                    <div id="existingCardInfo" class="row{if !$clientsdetails.cclastfour || $ccinfo eq "new"} hidden{/if}">
                        <div class="col-sm-6">
                            <div class="form-group prepend-icon">
                                <label for="inputCardCvvExisting" class="field-icon">
                                    <i class="fas fa-barcode"></i>
                                </label>
                                <input type="tel" name="cccvvexisting" id="inputCardCvvExisting" class="field" placeholder="{$LANG.orderForm.cvv}" autocomplete="cc-cvc">
                            </div>
                        </div>
                    </div>
                </div>

                {if $shownotesfield}

                    <div class="sub-heading">
                        <span>{$LANG.orderForm.additionalNotes}</span>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="notes" class="field notetext" rows="4" placeholder="{$LANG.ordernotesdescription}">{$orderNotes}</textarea>
                            </div>
                        </div>
                    </div>

                {/if}

                

                <div class="text-left">
                    {if $accepttos}
                        <p class="accepttos">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="accepttos" id="accepttos" />
                                &nbsp;
                                {$LANG.ordertosagreement}
                                <a href="{$tosurl}" target="_blank">{$LANG.ordertos}</a>
                            </label>
                        </p>
                    {/if}
                    {if $captcha}
                        <div class="text-center margin-bottom">
                            {include file="$template/includes/captcha.tpl"}
                        </div>
                    {/if}
                    <button type="submit"
                            id="btnCompleteOrder"
                            class="btn btn-primary btn-lg disable-on-click spinner-on-click {if $captcha}{$captcha->getButtonClass($captchaForm)}{/if}"
                            {if $cartitems==0}disabled="disabled"{/if}
                            onclick="this.value='{$LANG.pleasewait}'">
                        {$LANG.completeorder}
                    </button>
                </div>
            

            {if $servedOverSsl}
                <div class="alert alert-warning checkout-security-msg">
                    <i class="fas fa-lock"></i>
                    {$LANG.ordersecure} (<strong>{$ipaddress}</strong>) {$LANG.ordersecure2}
                    <div class="clearfix"></div>
                </div>
            {/if}

        </div>
        <div class="col-md-4">

                        
                    <div class="order-summary" id="orderSummary">
                            <h2>{$LANG.ordersummary}</h2>
                            <div class="orderSummaryCd">
                                <div class="loader" id="orderSummaryLoader" style="display: none;">
                                    <i class="fas fa-fw fa-sync fa-spin"></i>
                                </div>                                
                                <div class="summary-container">
                                    <div class="subtotal clearfix">
                                        <span class="pull-left">{$LANG.ordersubtotal}</span>
                                        <span id="subtotal" class="pull-right">{$subtotal}</span>
                                    </div>
                                    {if $promotioncode || $taxrate || $taxrate2}
                                        <div class="bordered-totals">
                                            {if $promotioncode}
                                                <div class="clearfix">
                                                    <span class="pull-left">{$promotiondescription}</span>
                                                    <span id="discount" class="pull-right">{$discount}</span>
                                                </div>
                                            {/if}
                                            {if $taxrate}
                                                <div class="clearfix">
                                                    <span class="pull-left">{$taxname} @ {$taxrate}%</span>
                                                    <span id="taxTotal1" class="pull-right">{$taxtotal}</span>
                                                </div>
                                            {/if}
                                            {if $taxrate2}
                                                <div class="clearfix">
                                                    <span class="pull-left">{$taxname2} @ {$taxrate2}%</span>
                                                    <span id="taxTotal2" class="pull-right">{$taxtotal2}</span>
                                                </div>
                                            {/if}
                                        </div>
                                    {/if}
                                    <div class="recurring-totals clearfix">
                                        <span class="pull-left">{$LANG.orderForm.totals}</span>
                                        <span id="recurring" class="pull-right recurring-charges">
                                            <span id="recurringMonthly" {if !$totalrecurringmonthly}style="display:none;"{/if}>
                                                <span class="cost">{$totalrecurringmonthly}</span> {$LANG.orderpaymenttermmonthly}<br />
                                            </span>
                                            <span id="recurringQuarterly" {if !$totalrecurringquarterly}style="display:none;"{/if}>
                                                <span class="cost">{$totalrecurringquarterly}</span> {$LANG.orderpaymenttermquarterly}<br />
                                            </span>
                                            <span id="recurringSemiAnnually" {if !$totalrecurringsemiannually}style="display:none;"{/if}>
                                                <span class="cost">{$totalrecurringsemiannually}</span> {$LANG.orderpaymenttermsemiannually}<br />
                                            </span>
                                            <span id="recurringAnnually" {if !$totalrecurringannually}style="display:none;"{/if}>
                                                <span class="cost">{$totalrecurringannually}</span> {$LANG.orderpaymenttermannually}<br />
                                            </span>
                                            <span id="recurringBiennially" {if !$totalrecurringbiennially}style="display:none;"{/if}>
                                                <span class="cost">{$totalrecurringbiennially}</span> {$LANG.orderpaymenttermbiennially}<br />
                                            </span>
                                            <span id="recurringTriennially" {if !$totalrecurringtriennially}style="display:none;"{/if}>
                                                <span class="cost">{$totalrecurringtriennially}</span> {$LANG.orderpaymenttermtriennially}<br />
                                            </span>
                                        </span>
                                    </div>
                                    <div class="total-due-today total-due-today-padded">
                                        <span id="totalDueToday" class="amt">{$total}</span>
                                        <span>{$LANG.ordertotalduetoday}</span>
                                    </div>                                    
                                </div>
                            </div>
                                {if $showMarketingEmailOptIn}
                                    <div class="showMarketingEmail">
                                        <div class="marketing-email-optin">
                                            <div class="text-center p10">
											<img src="templates/{$hostx_theme_settings.template_name_custom}/images/marketingemail.png"></div>
                                            <h4>{lang key='emailMarketing.joinOurMailingList'}</h4>
                                            <p>{$marketingEmailOptInMessage}</p>
                                            <div class="text-center">
                                                <input type="checkbox" name="marketingoptin" value="1"{if $marketingEmailOptIn} checked{/if} class="no-icheck toggle-switch-success" data-size="small" data-on-text="{lang key='yes'}" data-off-text="{lang key='no'}">
                                            </div>
                                        </div>                                    
                                    </div>    
                                {/if}
                        </div>



        </div>

    </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="{$BASE_PATH_JS}/jquery.payment.js"></script>
