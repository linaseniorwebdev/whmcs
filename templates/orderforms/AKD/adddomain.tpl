<script type="text/javascript" src="templates/orderforms/{$carttpl}/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="templates/orderforms/{$carttpl}/style.css" />
      <div id="order-modern">
        <h2 class="text-center black_text"> {if $domain eq "register"}
          {$LANG.registerdomain}
          {elseif $domain eq "transfer"}
          {$LANG.transferdomain}
          {/if}  </h2>
       
      <div class="seprator text-center col-xs-12 no_padding">
      
      <img src="{$WEB_ROOT}/templates/{$template}/assets/images/decorted-image.png" class="img-responsive" />
      </div>
        
        {if $errormessage}
        <div class="errorbox">{$errormessage|replace:'
          <li>':' &nbsp;#&nbsp; '} &nbsp;#&nbsp; 
        </div>
        <br />
        {/if}
        <div class="domain-checker-container hw_domaincontainer">
          <div class="domain-checker-bg register_domain_box clearfix hw_doaminchecker">
            <form onsubmit="checkAvailability();return false">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 hwdomain_search">
                  <div class="domain-checker-fieldcontainer">
                    <div class="row">
                      <div class="col-md-8">
                        <input type="text" class="form-control input-lg" placeholder="{if $domain eq "register"}{$LANG.findyourdomain}{else}{$LANG.exampledomain}{/if}" value="{$sld}" id="inputDomain" />
                      </div>
                      <div class="col-md-2">
                        <select name="tld" id="inputTld" class="form-control input-lg">
                          
                                        {foreach from=$tlds item=listtld}
                                            
                          <option value="{$listtld}"{if $listtld eq $tld} selected="selected"{/if}> {$listtld} </option>
                          
                                        {/foreach}
                                    
                        </select>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" id="btnCheckAvailability" class="btn btn-primary btn-lg btn-block"> {if $domain eq "register"}
                        {$LANG.search}
                        {else}
                        {$LANG.domainstransfer}
                        {/if} </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <form method="post" action="cart.php?a=add&domain={$domain}">
          <div id="domainresults" class="domainresults hidden domain_error"></div>
        </form>
        <script language="javascript">
        var regType = '{$domain}';
        function checkAvailability() {
            var btnLookupText = jQuery("#btnCheckAvailability").html();
            jQuery("#btnCheckAvailability").html('<i class="fa fa-spinner fa-spin"></i>');
            jQuery.post("cart.php", { ajax: 1, a: "domainoptions", sld: jQuery("#inputDomain").val(), tld: jQuery("#inputTld").val(), checktype: regType },
                function(data) {
                    jQuery("#domainresults").html(data);
                    if (!jQuery("#domainresults").is(":visible")) {
                        jQuery("#domainresults").hide().removeClass('hidden').slideDown();
                    }
                    jQuery("#btnCheckAvailability").html(btnLookupText);
                }
            );
        }
        function cancelcheck() {
            jQuery("#inputDomain").focus();
            jQuery("#domainresults").fadeOut();
        }
        {if $sld}
            jQuery(document).ready(function() {
                checkAvailability();
            });
        {/if}
    </script> 
      </div>
