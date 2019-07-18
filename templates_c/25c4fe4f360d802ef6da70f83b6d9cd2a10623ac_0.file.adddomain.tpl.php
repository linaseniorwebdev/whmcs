<?php
/* Smarty version 3.1.33-p1, created on 2019-07-08 22:09:48
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/adddomain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d23a30c73c761_79347656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25c4fe4f360d802ef6da70f83b6d9cd2a10623ac' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/adddomain.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d23a30c73c761_79347656 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/azur/webapps/app-whmcs/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$template = $_smarty_tpl;
echo '<script'; ?>
 type="text/javascript" src="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/style.css" />
      <div id="order-modern">
        <h2 class="text-center black_text"> <?php if ($_smarty_tpl->tpl_vars['domain']->value == "register") {?>
          <?php echo $_smarty_tpl->tpl_vars['LANG']->value['registerdomain'];?>

          <?php } elseif ($_smarty_tpl->tpl_vars['domain']->value == "transfer") {?>
          <?php echo $_smarty_tpl->tpl_vars['LANG']->value['transferdomain'];?>

          <?php }?>  </h2>
       
      <div class="seprator text-center col-xs-12 no_padding">
      
      <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/images/decorted-image.png" class="img-responsive" />
      </div>
        
        <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
        <div class="errorbox"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['errormessage']->value,'
          <li>',' &nbsp;#&nbsp; ');?>
 &nbsp;#&nbsp; 
        </div>
        <br />
        <?php }?>
        <div class="domain-checker-container hw_domaincontainer">
          <div class="domain-checker-bg register_domain_box clearfix hw_doaminchecker">
            <form onsubmit="checkAvailability();return false">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 hwdomain_search">
                  <div class="domain-checker-fieldcontainer">
                    <div class="row">
                      <div class="col-md-8">
                        <input type="text" class="form-control input-lg" placeholder="<?php if ($_smarty_tpl->tpl_vars['domain']->value == "register") {
echo $_smarty_tpl->tpl_vars['LANG']->value['findyourdomain'];
} else {
echo $_smarty_tpl->tpl_vars['LANG']->value['exampledomain'];
}?>" value="<?php echo $_smarty_tpl->tpl_vars['sld']->value;?>
" id="inputDomain" />
                      </div>
                      <div class="col-md-2">
                        <select name="tld" id="inputTld" class="form-control input-lg">
                          
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tlds']->value, 'listtld');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['listtld']->value) {
?>
                                            
                          <option value="<?php echo $_smarty_tpl->tpl_vars['listtld']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['listtld']->value == $_smarty_tpl->tpl_vars['tld']->value) {?> selected="selected"<?php }?>> <?php echo $_smarty_tpl->tpl_vars['listtld']->value;?>
 </option>
                          
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    
                        </select>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" id="btnCheckAvailability" class="btn btn-primary btn-lg btn-block"> <?php if ($_smarty_tpl->tpl_vars['domain']->value == "register") {?>
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['search'];?>

                        <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainstransfer'];?>

                        <?php }?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <form method="post" action="cart.php?a=add&domain=<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
">
          <div id="domainresults" class="domainresults hidden domain_error"></div>
        </form>
        <?php echo '<script'; ?>
 language="javascript">
        var regType = '<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
';
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
        <?php if ($_smarty_tpl->tpl_vars['sld']->value) {?>
            jQuery(document).ready(function() {
                checkAvailability();
            });
        <?php }?>
    <?php echo '</script'; ?>
> 
      </div>
<?php }
}
