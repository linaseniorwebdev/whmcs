<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:20:33
  from '/home/azur/webapps/app-whmcs/templates/six_six/store/ssl/shared/features.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d25133179eda2_98433655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36fc7f84fb469a3100d5b4270b59f0ab4c9f6e6b' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/six_six/store/ssl/shared/features.tpl',
      1 => 1562183974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d25133179eda2_98433655 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><div class="content-block standout-features standout">
    <div class="container">
        <div class="row text-center">
            <?php if ($_smarty_tpl->tpl_vars['type']->value == 'ev') {?>
                <div class="col-sm-4">
                    <h4>Green Address Bar</h4>
                    <p>Activates the green address bar and displays your company or organization name for a prominent visual security indicator.</p>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'ov') {?>
                <div class="col-sm-4">
                    <h4>Organization Validated</h4>
                    <p>With an OV SSL Certificate, the identity of the company or organization that holds the certificate is validated, providing more trust for end users.</p>
                </div>
            <?php } else { ?>
                <div class="col-sm-4">
                    <h4>Delivered in Minutes for Instant Protection</h4>
                    <p>The fastest and most affordable way to activate SSL protection for your website, issuance is quick and often fully automated.</p>
                </div>
            <?php }?>
            <div class="col-sm-4">
                <h4>Trust Site Seal</h4>
                <p>Our SSL Certificates come with a trust seal that has been proven to increase visitor confidence and customer conversions.</p>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['type']->value == 'ev') {?>
                <div class="col-sm-4">
                    <h4>$1.5m Warranty</h4>
                    <p>EV Certificates come with a $1.5m warranty that covers data breaches caused due to a certificate flaw.</p>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'ov') {?>
                <div class="col-sm-4">
                    <h4>$1.25m Warranty</h4>
                    <p>OV Certificates come with a $1.25m warranty that covers data breaches caused due to a certificate flaw.</p>
                </div>
            <?php } else { ?>
                <div class="col-sm-4">
                    <h4>Boost your Google Ranking</h4>
                    <p>Google uses SSL/HTTPS as a factor in determining search engine ranking. Add SSL today to help boost your Google ranking!</p>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="content-block features">
    <div class="container">
        <h3>Certificate Features</h3>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-lock"></i>
                    <h4>Encrypt sensitive data</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-credit-card"></i>
                    <h4>Secure online transactions</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-trophy"></i>
                    <h4>Prove legitimacy</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-certificate"></i>
                    <h4>Strongest & Fastest SSL</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-window-maximize"></i>
                    <h4>99.9% Browser Compatability</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-search"></i>
                    <h4>Increase SEO rank</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="far fa-clock"></i>
                    <?php if ($_smarty_tpl->tpl_vars['type']->value == 'ev') {?>
                        <h4>Issued in 2-3 Days</h4>
                    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'ov') {?>
                        <h4>Issued in 1-2 Days</h4>
                    <?php } else { ?>
                        <h4>Instant Issuance</h4>
                    <?php }?>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="feature">
                    <i class="fas fa-sync"></i>
                    <h4>Free Reissues</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
