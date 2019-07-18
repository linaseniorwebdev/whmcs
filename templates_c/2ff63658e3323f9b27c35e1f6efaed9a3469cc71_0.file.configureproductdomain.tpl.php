<?php
/* Smarty version 3.1.33-p1, created on 2019-07-05 17:54:07
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/configureproductdomain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d1f729f2aaf32_65516039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ff63658e3323f9b27c35e1f6efaed9a3469cc71' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/configureproductdomain.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d1f729f2aaf32_65516039 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
echo '<script'; ?>
 type="text/javascript" src="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/style.css" />
<div id="order-modern">

    <div class="text-center">
        <h2 class="black_text cart_margin"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartproductselection'];?>
: <?php echo $_smarty_tpl->tpl_vars['productinfo']->value['groupname'];?>
 - <?php echo $_smarty_tpl->tpl_vars['productinfo']->value['name'];?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartmakedomainselection'];?>
</p>
    </div>

<form onsubmit="checkdomain();return false">

    <div class="row">
    <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
        <div class="domainoptions">
    <?php if ($_smarty_tpl->tpl_vars['incartdomains']->value) {?>
            <div class="option">
                <label class="radio-inline">
                    <input type="radio" name="domainoption" value="incart" id="selincart" /><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartproductdomainuseincart'];?>

                </label>
                <div class="domainreginput hidden clearfix" id="domainincart">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 ">
                            <select id="incartsld" name="incartdomain" class="form-control">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['incartdomains']->value, 'incartdomain', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['incartdomain']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['incartdomain']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['incartdomain']->value;?>
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
    <?php if ($_smarty_tpl->tpl_vars['registerdomainenabled']->value) {?>
            <div class="option">
                <label class="radio-inline">
                    <input type="radio" name="domainoption" value="register" id="selregister" /><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['cartregisterdomainchoice'],$_smarty_tpl->tpl_vars['companyname']->value ));?>

                </label>
                <div class="domainreginput hidden clearfix" id="domainregister">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-lg-12 domain_search_form">
                                <input type="text" id="registersld" value="<?php echo $_smarty_tpl->tpl_vars['sld']->value;?>
" placeholder="Enter your domain name...." class="form-control" />
                            <select id="registertld" class="form-control">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['registertlds']->value, 'listtld');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['listtld']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['listtld']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['listtld']->value == $_smarty_tpl->tpl_vars['tld']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['listtld']->value;?>
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
    <?php if ($_smarty_tpl->tpl_vars['transferdomainenabled']->value) {?>
            <div class="option">
                <label class="radio-inline">
                    <input type="radio" name="domainoption" value="transfer" id="seltransfer" /><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['carttransferdomainchoice'],$_smarty_tpl->tpl_vars['companyname']->value ));?>

                </label>
                <div class="domainreginput hidden clearfix" id="domaintransfer">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12 col-lg-12 domain_search_form">
                                <input type="text" id="transfersld" value="<?php echo $_smarty_tpl->tpl_vars['sld']->value;?>
"  placeholder="Enter your domain name...." class="form-control" />
                            <select id="transfertld" class="form-control">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transfertlds']->value, 'listtld');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['listtld']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['listtld']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['listtld']->value == $_smarty_tpl->tpl_vars['tld']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['listtld']->value;?>
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
    <?php if ($_smarty_tpl->tpl_vars['owndomainenabled']->value) {?>
            <div class="option">
                <label class="radio-inline">
                    <input type="radio" name="domainoption" value="owndomain" id="selowndomain" /><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['cartexistingdomainchoice'],$_smarty_tpl->tpl_vars['companyname']->value ));?>

                </label>
                <div class="domainreginput hidden clearfix" id="domainowndomain">
                            <div class="row"> <div class="col-sm-12 col-xs-12 col-lg-12 domain_search_form domain_search_form2">
                                    <input type="text" id="owndomainsld" value="<?php echo $_smarty_tpl->tpl_vars['sld']->value;?>
" placeholder="yourdomain" class="form-control" />
                                    <input type="text" id="owndomaintld" value="<?php echo substr($_smarty_tpl->tpl_vars['tld']->value,1);?>
" placeholder="com" class="form-control" />
                            </div>
                        </div>
            </div>
            </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['subdomains']->value) {?>
            <div class="option">
                <label class="radio-inline">
                    <input type="radio" name="domainoption" value="subdomain" id="selsubdomain" /><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['cartsubdomainchoice'],$_smarty_tpl->tpl_vars['companyname']->value ));?>

                </label>
                <div class="domainreginput hidden" id="domainsubdomain">
                    http:// <input type="text" id="subdomainsld" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sld']->value;?>
" /> <select id="subdomaintld"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subdomains']->value, 'subdomain', false, 'subid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['subid']->value => $_smarty_tpl->tpl_vars['subdomain']->value) {
?><option value="<?php echo $_smarty_tpl->tpl_vars['subid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['subdomain']->value;?>
</option><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select>
                </div>
            </div>
    <?php }?>
        </div>
    </div>
    </div>

    <div class="domain-fade-out">

        <div class="text-center domain_option">
            <button type="submit" id="btnDomainContinue" class="btn btn-primary btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['continue'];?>
 &nbsp;<i class="fa fa-arrow-circle-right"></i></button>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['freedomaintlds']->value) {?><p>* <em><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfreedomainregistration'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderfreedomainappliesto'];?>
: <?php echo $_smarty_tpl->tpl_vars['freedomaintlds']->value;?>
</em></p><?php }?>

    </div>

</form>

<div id="greyout"></div>

<div id="domainpopupcontainer">
    <form id="domainfrm" onsubmit="completedomain();return false">
        <div class="domainresults" id="domainresults">
            <img src="assets/img/loading.gif" border="0" alt="Loading..." />
        </div>
    </form>
</div>

<div id="prodconfigcontainer" class="hidden"></div>

<div class="clearfix"></div>

</div>


<?php echo '<script'; ?>
 language="javascript">
jQuery(".domainoptions input:first").attr('checked','checked');
jQuery(".domainoptions input:first").parent().parent().addClass('optionselected');
jQuery("#domain"+jQuery(".domainoptions input:first").val()).removeClass('hidden').show();
jQuery(document).ready(function(){
    jQuery(".domainoptions input:radio").click(function(){
        jQuery(".domainoptions .option").removeClass('optionselected');
        jQuery(this).parent().parent().addClass('optionselected');
        jQuery(".domainreginput").hide();
        jQuery("#domain"+jQuery(this).val()).removeClass('hidden').show();
    });
});
function checkdomain() {
    jQuery("#greyout").fadeIn();
    jQuery("#domainpopupcontainer").hide().removeClass('hidden').slideDown();
    var domainoption = jQuery(".domainoptions input:checked").val();
    var sld = jQuery("#"+domainoption+"sld").val();
    var tld = '';
    if (domainoption=='incart') var sld = jQuery("#"+domainoption+"sld option:selected").text();
    if (domainoption=='subdomain') var tld = jQuery("#"+domainoption+"tld option:selected").text();
    else var tld = jQuery("#"+domainoption+"tld").val();
    jQuery.post("cart.php", { ajax: 1, a: "domainoptions", sld: sld, tld: tld, checktype: domainoption },
    function(data){
        jQuery("#domainresults").html(data);
    });
}
function cancelcheck() {
    jQuery("#domainpopupcontainer").slideUp('slow',function() {
        jQuery("#greyout").fadeOut();
        jQuery("#domainresults").html('<img src="assets/img/loading.gif" border="0" alt="Loading..." />');
    });
}
function completedomain() {
    jQuery("#domainresults").append('<img src="assets/img/loading.gif" border="0" alt="Loading..." />');
    jQuery.post("cart.php", 'ajax=1&a=add&pid=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&domainselect=1&'+jQuery("#domainfrm").serialize(),
    function(data){
        if (data=='') {
            window.location='cart.php?a=view';
        } else if (data=='nodomains') {
            jQuery("#domainpopupcontainer").slideUp('slow',function() {
                jQuery("#greyout").fadeOut();
            });
        } else {
            jQuery("#prodconfigcontainer").html(data);
            jQuery(".domain-fade-out").fadeOut();
            jQuery("#domainpopupcontainer").slideUp('slow',function() {
                jQuery("#greyout").fadeOut();
            });
            jQuery("#prodconfigcontainer").hide().removeClass('hidden').slideDown();
        }
    });
}
<?php echo '</script'; ?>
>

<?php }
}
