{include file="orderforms/{$carttpl}/common.tpl"}

<div id="order-standard_cart">
    <div class="row">
        <div class="col-sm-12">
                {include file="orderforms/{$carttpl}/sidebar-categories.tpl"}
        </div> 

        <div class=" col-md-12">            
            <h1>
                {$LANG.transferdomain}
            </h1>            
        </div>        

        <div class="col-md-12 pull-md-right">
            {include file="orderforms/{$carttpl}/sidebar-categories-collapsed.tpl"}            
            <form method="post" action="cart.php" id="frmDomainTransfer">
                <input type="hidden" name="a" value="addDomainTransfer">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default tDomain">
                            {* <div class="panel-heading">
                                <h3 class="panel-title">{lang key='orderForm.singleTransfer'}</h3>
                            </div> *}
                            <div class="text-left">
                                <h2>{lang key='orderForm.transferToUs'}</h2>
                                <p>{lang key='orderForm.transferExtend'}*</p>
                            </div>

                            <div class="panel-body">
                                 <div class="row">
                                <div class="col-sm-5">
                                        <label for="inputTransferDomain">{lang key='domainname'}</label>
                                        <input type="text" class="form-control" name="domain" id="inputTransferDomain" value="{$lookupTerm}" placeholder="{lang key='yourdomainplaceholder'}.{lang key='yourtldplaceholder'}" data-toggle="tooltip" data-placement="left" data-trigger="manual" title="{lang key='orderForm.enterDomain'}" />
                                        <p class="text-left small">* {lang key='orderForm.extendExclusions'}</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="inputAuthCode" style="width:100%;">
                                            {lang key='orderForm.authCode'}
                                            <a href="" data-toggle="tooltip" data-placement="left" title="{lang key='orderForm.authCodeTooltip'}" class="pull-right"><i class="fas fa-question-circle"></i> {lang key='orderForm.help'}</a>
                                        </label>
                                        <input type="text" class="form-control" name="epp" id="inputAuthCode" placeholder="{lang key='orderForm.authCodePlaceholder'}" data-toggle="tooltip" data-placement="left" data-trigger="manual" title="{lang key='orderForm.required'}" />
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" id="btnTransferDomain" class="btn btn-primary btn-transfer {if $versionSeven}{$captcha->getButtonClass($captchaForm)}{/if}">
                                            <span class="loader hidden" id="addTransferLoader">
                                                <i class="fas fa-fw fa-spinner fa-spin"></i>
                                            </span>
                                            <span id="addToCart">{lang key="orderForm.addToCart"}</span>
                                        </button>
                                    </div>
                                </div>       

                                <div id="transferUnavailable" class="alert alert-warning slim-alert text-center hidden"></div>
								{if $versionSeven}
									{if $captcha->isEnabled() && !$captcha->recaptcha->isEnabled()}
										<div class="captcha-container" id="captchaContainer">
											<div class="default-captcha">
												<p>{lang key="cartSimpleCaptcha"}</p>
												<div>
													<img id="inputCaptchaImage" src="includes/verifyimage.php" />
													<input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control input-sm" data-toggle="tooltip" data-placement="right" data-trigger="manual" title="{lang key='orderForm.required'}" />
												</div>
											</div>
										</div>
									{elseif $captcha->isEnabled() && $captcha->recaptcha->isEnabled() && !$captcha->recaptcha->isInvisible()}
										<div class="form-group recaptcha-container" id="captchaContainer"></div>
									{/if}
								{else}
									{if $captcha}
										<div class="captcha-container" id="captchaContainer">
											{if $captcha eq "recaptcha"}
												<script src="https://www.google.com/recaptcha/api.js" async defer></script>
												<div id="google-recaptcha" class="g-recaptcha recaptcha-transfer center-block" data-sitekey="{$reCaptchaPublicKey}" data-toggle="tooltip" data-placement="left" data-trigger="manual" title="{lang key='orderForm.required'}" ></div>
											{else}
												<div class="default-captcha">
													<p>{lang key="cartSimpleCaptcha"}</p>
													<div>
														<img id="inputCaptchaImage" src="includes/verifyimage.php" />
														<input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control input-sm" data-toggle="tooltip" data-placement="right" data-trigger="manual" title="{lang key='orderForm.required'}" />
													</div>
												</div>
											{/if}
										</div>
									{/if}
								{/if}
                            </div>                            
                        </div>
                    </div>
                </div>

            </form>

            

        </div>
    </div>
</div>
