<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:27:17
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/domainregister.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fb356e6131_92315635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df425ec558805a0892c62f9052fe72898fa151ee' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/domainregister.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/common.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories-collapsed.tpl' => 1,
  ),
),false)) {
function content_5d28fb356e6131_92315635 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
$_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
echo '<script'; ?>
 type="text/javascript">
   jQuery(document).ready(function(){           
        jQuery('.browse_extensions .nav-item').click(function(){
           var cat = jQuery(this).find('a').attr('data-cate');   
           jQuery('.tldlst').hide();
           jQuery('.' + cat).show();
           jQuery('.browse_extensions li').find('a').removeClass('active');
           jQuery(this).find('a').addClass('active');
        })
        jQuery('.browse_extensions .nav-item').eq(0).click();
   })
<?php echo '</script'; ?>
>
<div id="order-standard_cart">
    <div class="register-domain-section">
        <div class="row">            
            <div class="col-sm-12">
                <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            </div>            
            <div class="col-sm-12">
        <div class="right">
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
          <div class="search_domain">
            <h2><?php echo $_smarty_tpl->tpl_vars['LANG']->value['registerdomain'];?>
</h2> 
            <form method="post" action="cart.php" id="frmDomainChecker">
                <input type="hidden" name="a" value="checkDomain">
                <div class="search_domain_in">
                  <input type="text" name="domain" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['findyourdomain'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['lookupTerm']->value;?>
" id="inputDomain" data-toggle="tooltip" data-placement="left" data-trigger="manual" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.domainOrKeyword'),$_smarty_tpl ) );?>
" />                  
                  <input type="submit" id="btnCheckAvailability" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['search'];?>
" class="btn domain-check-availability <?php if ($_smarty_tpl->tpl_vars['versionSeven']->value) {
echo $_smarty_tpl->tpl_vars['captcha']->value->getButtonClass($_smarty_tpl->tpl_vars['captchaForm']->value);
}?>">
                </div>
				<?php if ($_smarty_tpl->tpl_vars['versionSeven']->value) {?>
					<?php if ($_smarty_tpl->tpl_vars['captcha']->value->isEnabled() && !$_smarty_tpl->tpl_vars['captcha']->value->recaptcha->isInvisible()) {?>
						<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
							<div class="captcha-container" id="captchaContainer">
								<?php if ($_smarty_tpl->tpl_vars['captcha']->value == "recaptcha") {?>
									<br>
									<div class="form-group recaptcha-container"></div>
								<?php } elseif ($_smarty_tpl->tpl_vars['captcha']->value != "recaptcha") {?>
									<div class="default-captcha default-captcha-register-margin">
										<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"cartSimpleCaptcha"),$_smarty_tpl ) );?>
</p>
										<div>
											<img id="inputCaptchaImage" src="includes/verifyimage.php" align="middle" />
											<input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control input-sm" data-toggle="tooltip" data-placement="right" data-trigger="manual" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.required'),$_smarty_tpl ) );?>
" />
										</div>
									</div>
								<?php }?>
							</div>
						</div>
					<?php }?>
				<?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['captcha']->value) {?>
						<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
							<div class="captcha-container" id="captchaContainer">
								<?php if ($_smarty_tpl->tpl_vars['captcha']->value == "recaptcha") {?>
									<?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
									<div id="google-recaptcha" class="g-recaptcha center-block" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['reCaptchaPublicKey']->value;?>
" data-toggle="tooltip" data-placement="left" data-trigger="manual" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.required'),$_smarty_tpl ) );?>
" ></div>
								<?php } else { ?>
									<div class="default-captcha default-captcha-register-margin">
										<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"cartSimpleCaptcha"),$_smarty_tpl ) );?>
</p>
											<div>
												<img id="inputCaptchaImage" src="includes/verifyimage.php" align="middle" />
												<input id="inputCaptcha" type="text" name="code" maxlength="5" class="form-control input-sm" data-toggle="tooltip" data-placement="right" data-trigger="manual" title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.required'),$_smarty_tpl ) );?>
" />
											</div>
									</div>
								<?php }?>
							</div>
						</div>
					<?php }?>
				<?php }?>
            </form>
          </div>


           <div id="DomainSearchResults" class="hidden">

                    <div id="searchDomainInfo" class="domain-checker-result-headline">
                        <p id="primaryLookupSearching" class="domain-lookup-loader domain-lookup-primary-loader domain-searching"><i class="fas fa-spinner fa-spin"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.searching'),$_smarty_tpl ) );?>
...</p>
                        <div id="primaryLookupResult" class="domain-lookup-result hidden">
                            <p class="domain-invalid domain-checker-invalid"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.domainLetterOrNumber'),$_smarty_tpl ) );?>
<span class="domain-length-restrictions"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.domainLengthRequirements'),$_smarty_tpl ) );?>
</span></p>
                            <p class="domain-unavailable domain-checker-unavailable"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.domainIsUnavailable'),$_smarty_tpl ) );?>
</p>
                            <div class="domain-available">
                              <p class="domain-checker-available"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainavailable1'];?>
 <strong></strong> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainavailable2'];?>
</p>
                              <p class="domain-price">
                                  <span class="price"></span>
                                  <button class="button01  btn-add-to-cart" data-whois="0" data-domain="">
                                      <span class="to-add"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addtocart'];?>
</span>
                                      <span class="added"><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'checkout'),$_smarty_tpl ) );?>
</span>
                                      <span class="unavailable"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincheckertaken'];?>
</span>
                                  </button>
                              </p>
                            </div>

                            <a class="domain-contact-support btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainContactUs'];?>
</a>
                        </div>
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['spotlightTlds']->value) {?>                       
                        <div id="spotlightTlds" class="spotlight-tlds clearfix">
                            <div class="spotlight-tlds-container">
                                <div class="domain_row">
                                    <div class="row">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['spotlightTlds']->value, 'data', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>                                
                                            <div class="spotlight-tld-container spotlight-tld-container-<?php echo count($_smarty_tpl->tpl_vars['spotlightTlds']->value);?>
">
                                                <div id="spotlight<?php echo $_smarty_tpl->tpl_vars['data']->value['tldNoDots'];?>
" class="spotlight-tld">
                                                    <div class="<?php echo $_smarty_tpl->tpl_vars['data']->value['group'];?>
 domain_colos">
                                                      <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['tld'];?>
 <br> <small><?php echo $_smarty_tpl->tpl_vars['data']->value['register'];?>
</small></h2>
                                                      <span class="domain-lookup-loader domain-lookup-spotlight-loader">
                                                          <i class="fas fa-spinner fa-spin"></i>
                                                      </span>
                                                      <div class="domain-lookup-result">
                                                          <button type="button" class="btn small-button d-small-button unavailable hidden" disabled="disabled">
                                                              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainunavailable'),$_smarty_tpl ) );?>

                                                          </button>
                                                          <button type="button" class="btn small-button d-small-button invalid hidden" disabled="disabled">
                                                              <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainunavailable'),$_smarty_tpl ) );?>

                                                          </button>
                                                          
                                                          <button type="button" class="hidden btn-add-to-cart small-button" data-whois="0" data-domain="">
                                                              <span class="to-add"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.add'),$_smarty_tpl ) );?>
</span>
                                                              <span class="added"><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'checkout'),$_smarty_tpl ) );?>
</span>
                                                              <span class="unavailable"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincheckertaken'];?>
</span>
                                                          </button>                                                          
                                                      </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                  </div>
                                </div>      
                            </div>
                        </div>
                    <?php }?>

                    <div class="suggested-domains<?php if (!$_smarty_tpl->tpl_vars['showSuggestionsContainer']->value) {?> hidden<?php }?>">
                        <div class="browse_extensions">
                            <div class="tab-content">
                              <div id="popular" class="tab-pane active">
                                <div class="domain_table domain_table1">
                                  <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.suggestedDomains'),$_smarty_tpl ) );?>
</p>
                                  <div id="suggestionsLoader" class="panel-body domain-lookup-loader domain-lookup-suggestions-loader">
                                      <i class="fas fa-spinner fa-spin"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.generatingSuggestions'),$_smarty_tpl ) );?>

                                  </div>                                

                                  <ul id="domainSuggestions" class="domain-lookup-result list-group hidden">
                                    <li class="domain-suggestion list-group-item hidden">
                                      <div class="domain-name">
                                        <span class="domain"></span><span class="extension"></span>
                                        <span class="promo hidden">
                                            <span class="sales-group-hot hidden" style="none"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainCheckerSalesGroup.hot'),$_smarty_tpl ) );?>
</span>
                                            <span class="sales-group-new hidden" style="none"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainCheckerSalesGroup.new'),$_smarty_tpl ) );?>
</span>
                                            <span class="sales-group-sale hidden" style="none"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainCheckerSalesGroup.sale'),$_smarty_tpl ) );?>
</span>
                                        </span>
                                      </div>
                                      <div class="wgs-domains">  
                                        <span class="price"></span>                                        
                                      </div>
                                      <div class="domain-button">
                                          <div class="actions">                                            
                                            <button type="button" class="button01 btn-add-to-cart" data-whois="1" data-domain="">
                                                <span class="to-add"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['addtocart'];?>
</span>
                                                <span class="added"><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'checkout'),$_smarty_tpl ) );?>
</span>
                                                <span class="unavailable"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaincheckertaken'];?>
</span>
                                            </button>                                            
                                        </div>
                                      </div>  
                                    </li>
                                </ul>
                                  
                                  <div class="panel-footer more-suggestions hidden text-center">
                                      <center>                                        
                                        <a id="moreSuggestions" class="suggestions_button" href="javascript:;" onclick="loadMoreSuggestions();return false;"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainsmoresuggestions'),$_smarty_tpl ) );?>
</a>
                                                                              </center>
                                  </div>
                                  <div class="text-center text-muted domain-suggestions-warning">
                                      <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'domainssuggestionswarnings'),$_smarty_tpl ) );?>
</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        
                        
                        
                    </div>

                </div> 

            <div class="domain-pricing">
                  <div class="domain_row">
                    <div class="row">

                  <?php if ($_smarty_tpl->tpl_vars['featuredTlds']->value) {?>
                        <div class="featured-tlds-container">                            
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['featuredTlds']->value, 'tldinfo', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['tldinfo']->value) {
?>
                                    <div class="domain_colos">
                                      <h2>
                                         <div class="img-container">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_IMG']->value;?>
/tld_logos/<?php echo $_smarty_tpl->tpl_vars['tldinfo']->value['tldNoDots'];?>
.png" style="height: 42px;">
                                            </div>
                                            <br>
                                      <small>
                                            <?php if (is_object($_smarty_tpl->tpl_vars['tldinfo']->value['register'])) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['tldinfo']->value['register']->toPrefixed();
if ($_smarty_tpl->tpl_vars['tldinfo']->value['period'] > 1) {
ob_start();
echo $_smarty_tpl->tpl_vars['tldinfo']->value['period'];
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.shortPerYears",'years'=>$_prefixVariable1),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.shortPerYear",'years'=>''),$_smarty_tpl ) );
}?>
                                            <?php } else { ?>
                                                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainregnotavailable"),$_smarty_tpl ) );?>

                                            <?php }?>
                                      </small>
                                    </h2>                                      
                                    </div>                                    
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                            
                        </div>
                    <?php }?>                     


                    </div>
                  </div>

                  <div class="browse_extensions">
                    <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pricing.browseExtByCategory'),$_smarty_tpl ) );?>
</h2>
                    <ul class="nav" role="tablist">  
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoriesWithCounts']->value, 'count', false, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value => $_smarty_tpl->tpl_vars['count']->value) {
?>
                        <li class="nav-item">                          
                            <a href="javascript:;" data-cate="<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
" class="nav-link"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"domainTldCategory.".((string)$_smarty_tpl->tpl_vars['category']->value),'defaultValue'=>$_smarty_tpl->tpl_vars['category']->value),$_smarty_tpl ) );?>
 (<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)</a>
                        </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </ul>
                  <div class="tab-content">
                    <div id="popular" class="tab-pane active">
                      <div class="domain_table">
                        <table>
                          <tr>
                            <th width="25%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderdomain'),$_smarty_tpl ) );?>
</th>
                            <th width="25%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pricing.register'),$_smarty_tpl ) );?>
</th>
                            <th width="25%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pricing.transfer'),$_smarty_tpl ) );?>
</th>
                            <th width="25%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'pricing.renewal'),$_smarty_tpl ) );?>
</th> 
                          </tr>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pricing']->value['pricing'], 'price', false, 'tld');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tld']->value => $_smarty_tpl->tpl_vars['price']->value) {
?>
                          <tr class="<?php echo $_smarty_tpl->tpl_vars['price']->value['group'];?>
 tldlst <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['price']->value['categories'], 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
echo $_smarty_tpl->tpl_vars['category']->value;?>
 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>">
                            <td>.<?php echo $_smarty_tpl->tpl_vars['tld']->value;?>
</td>                             
                            <td>
                                <?php if (current($_smarty_tpl->tpl_vars['price']->value['register']) >= 0) {?>
                                    <?php echo current($_smarty_tpl->tpl_vars['price']->value['register']);?>
 <small><?php echo key($_smarty_tpl->tpl_vars['price']->value['register']);?>
 <?php if (key($_smarty_tpl->tpl_vars['price']->value['register']) > 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.years"),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.year"),$_smarty_tpl ) );
}?></small>
                                <?php } else { ?>
                                    N/A
                                <?php }?>    
                            </td>
                            <td>
                                <?php if (current($_smarty_tpl->tpl_vars['price']->value['transfer']) > 0) {?>
                                    <?php echo current($_smarty_tpl->tpl_vars['price']->value['transfer']);?>
<small><?php echo key($_smarty_tpl->tpl_vars['price']->value['transfer']);?>
 <?php if (key($_smarty_tpl->tpl_vars['price']->value['register']) > 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.years"),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.year"),$_smarty_tpl ) );
}?></small>
                                <?php } else { ?>
                                    N/A
                                <?php }?>
                            </td>
                            <td>
                                <?php if (current($_smarty_tpl->tpl_vars['price']->value['renew']) > 0) {?>
                                    <?php echo current($_smarty_tpl->tpl_vars['price']->value['renew']);?>

                                    <small><?php echo key($_smarty_tpl->tpl_vars['price']->value['renew']);?>
 <?php if (key($_smarty_tpl->tpl_vars['price']->value['register']) > 1) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.years"),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderForm.year"),$_smarty_tpl ) );
}?></small>
                                <?php } else { ?>
                                    N/A
                                <?php }?>
                            </td> 
                          </tr>
                          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                          
                        </table>
                      </div>
                                          </div>
                  </div>
                  </div>

                  <div class="add_web_hosting">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="box">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/server_icon.png">
                          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.addHosting'),$_smarty_tpl ) );?>
</h2>
                          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.chooseFromRange'),$_smarty_tpl ) );?>
</p>
                          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.packagesForBudget'),$_smarty_tpl ) );?>
</p>
                          <a href="cart.php" class="button01"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.exploreNow'),$_smarty_tpl ) );?>
</a>  
                        </div>
                      </div>
                       <div class="col-sm-6">
                        <div class="box">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/images/hosting_icon.png"> 
                          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.transferToUs'),$_smarty_tpl ) );?>
</h2>
                          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.transferExtend'),$_smarty_tpl ) );?>
*</p>
                          <p>* <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.extendExclusions'),$_smarty_tpl ) );?>
</p>
                          <a href="cart.php?a=add&domain=transfer" class="button01"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'orderForm.transferDomain'),$_smarty_tpl ) );?>
</a>  
                        </div>
                      </div>
                    </div>
                  </div>
            </div>      

        </div>
      </div>

            
        </div>
    </div>        
</div>

<?php echo '<script'; ?>
>
jQuery(document).ready(function() {
    jQuery('.tld-filters a:first-child').click();
<?php if ($_smarty_tpl->tpl_vars['lookupTerm']->value && !$_smarty_tpl->tpl_vars['captchaError']->value) {?>
    jQuery('#btnCheckAvailability').click();
<?php }?>
});
<?php echo '</script'; ?>
>
<?php }
}
