<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:20:35
  from '/home/azur/webapps/app-whmcs/templates/six_six/store/ssl/competitive-upgrade.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d251333ce3e04_45792187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60a19468c3b4791e46938d9ba9942b209d9c82d2' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/six_six/store/ssl/competitive-upgrade.tpl',
      1 => 1562183974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d251333ce3e04_45792187 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/store/css/style.css" rel="stylesheet">

<div class="landing-page ssl">

    <div class="hero">
        <div class="container">
            <h2>Switch to Symantec SSL</h2>
            <h3>Replace your current SSL Certificate without losing any time or money</h3>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('current'=>"competitiveupgrade"), 0, true);
?>

    <div class="content-block">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h4>Buy a new SSL Certificate from us and we'll add any remaining time you have on your current SSL Certificate up to a maximum of an additional 12 months <strong>free of charge</strong>.</h4>

                    <div class="alert alert-warning text-left">
                        <strong><i class="fas fa-star fa-5x pull-left"></i> Example Scenario</strong><br>
                        Your current 2 year certificate has 11 months left to run.
                        You make the switch and your new certificate will be valid for <strong>1 year AND 11 months</strong>.
                        The fee for the new certificate will <strong>ONLY</strong> be for 1 year.
                    </div>

                    <p>This special upgrade offer is available for SSL Certificates issued by one of the supported competitor SSL providers*. Enter your domain name below to validate your eligibility and see how much you could save.</p>

                    <?php if ($_smarty_tpl->tpl_vars['connectionError']->value) {?>
                        <div class="alert alert-danger">
                            Unable to connect to the validation API. Please try again later or contact support.
                        </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value) {?>
                        <div class="alert alert-danger">
                            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                        </div>
                    <?php } else { ?>
                        <br>
                    <?php }?>

                    <form method="post" action="<?php echo routePath('store-ssl-certificates-competitiveupgrade-validate');?>
">

                        <?php if ($_smarty_tpl->tpl_vars['validated']->value) {?>
                            <?php if ($_smarty_tpl->tpl_vars['eligible']->value) {?>
                                <div class="alert alert-success text-center">
                                    Congratulations! Your domain is eligible for the Symantec Competitive Upgrade Offer.
                                </div>
                                <table class="table table-striped">
                                    <tr>
                                        <td>Current Expiration Date</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['expirationDate']->value;?>
</td>
                                    </tr>
                                    <tr>
                                        <td>Months Remaining</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['monthsRemaining']->value;?>
 Months</td>
                                    </tr>
                                    <tr>
                                        <td>Free Extension Eligibility</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['freeExtensionMonths']->value;?>
 Months<?php if ($_smarty_tpl->tpl_vars['freeExtensionMonths']->value < $_smarty_tpl->tpl_vars['monthsRemaining']->value) {?> (Maximum of 12 months offered)<?php }?></td>
                                    </tr>
                                    <?php if (isset($_smarty_tpl->tpl_vars['maxPotentialSavingAmount']->value)) {?>
                                        <tr>
                                            <td>Potential Saving</td>
                                            <td>Save up to <strong><?php echo $_smarty_tpl->tpl_vars['maxPotentialSavingAmount']->value;?>
</strong> on a new certificate!</td>
                                        </tr>
                                    <?php }?>
                                </table>
                                <a class="btn btn-primary btn-lg" href="<?php echo routePath('store-ssl-certificates-ev');?>
">
                                    Continue to Choose SSL Certificate
                                </a>
                            <?php } else { ?>
                                <div class="alert alert-warning text-center">
                                    Unfortunately the domain you entered is not eligible for the Symantec Competitive Upgrade Offer. Please verify the domain is entered correctly and has an active and current SSL Certificate from one of the supported vendors*.
                                </div>
                            <?php }?>
                        <?php }?>

                        <?php if (!$_smarty_tpl->tpl_vars['validated']->value || !$_smarty_tpl->tpl_vars['eligible']->value) {?>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">https://</span>
                                <input type="text" name="url" value="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="form-control" placeholder="Enter your domain here">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">
                                        Validate
                                    </button>
                                </span>
                            </div>
                            <p><small>* Offer valid for Comodo, GlobalSign, Entrust, and GoDaddy SSL Certificates.</small></p>
                        <?php }?>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<?php }
}
