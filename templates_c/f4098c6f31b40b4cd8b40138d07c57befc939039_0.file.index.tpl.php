<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:20:23
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d251327f35996_67633152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4098c6f31b40b4cd8b40138d07c57befc939039' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/index.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d251327f35996_67633152 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/css/style.css" rel="stylesheet">

<div class="landing-page ssl">

    <div class="hero">
        <div class="container">
            <h2>SSL Certificates</h2>
            <h3>Secure your site and add trust & confidence for your visitors</h3>
        </div>
    </div>

    <div class="validation-levels">
        <div class="container">
            <h3>Choose your level of validation</h3>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="item">
                        <h4>Domain Validation (DV)</h4>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl-dv-icon.png">
                        <span>Basic Security</span>
                        <p>Issued in minutes, ideal for blogs, social media & personal websites</p>
                        <a href="<?php echo routePath('store-ssl-certificates-dv');?>
" class="btn">Buy</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="item">
                        <h4>Organization Validation (OV)</h4>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl-ov-icon.png">
                        <span>Strong business level SSL</span>
                        <p>Company identity included in certificate, ideal for business websites</p>
                        <a href="<?php echo routePath('store-ssl-certificates-ov');?>
" class="btn">Buy</a>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">
                    <div class="item">
                        <h4>Extended Validation (EV)</h4>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl-ev-icon.png">
                        <span>Maximum Protection & Trust</span>
                        <p>Green address bar & company name displayed, ideal for ecommerce</p>
                        <a href="<?php echo routePath('store-ssl-certificates-ev');?>
" class="btn">Buy</a>
                    </div>
                </div>
            </div>
            <p><a href="#" class="show-all"><i class="fa fa-arrow-down"></i> Not sure? View all certificates</a></p>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('current'=>''), 0, true);
?>

    <div class="content-block">
        <div class="container">

            <div class="row">
                <div class="col-sm-4 col-md-3 col-sm-push-8 col-md-push-9 text-right hidden-xs">
                    <br><br>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl.png">
                </div>
                <div class="col-sm-8 col-md-9 col-sm-pull-4 col-md-pull-3">

                    <h3>What is SSL?</h3>

                    <div class="text-center visible-xs">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl.png">
                        <br><br>
                    </div>

                    <p>SSL Certificates enable data encryption on the internet and allow data to be transmitted securely from a web server to a browser. With SSL, your website can use the https protocol and will display a padlock in end users web browsers to indicate the connection is secure.</p>

                    <p>Although all SSL certificates use similar methods to protect and validate your data, the level of trust and assertion they provide varies. <a href="<?php echo routePath('store-ssl-certificates-dv');?>
">Standard SSL (Domain Validated)</a> Certificates are the easiest and most common type of SSL certificate. <a href="<?php echo routePath('store-ssl-certificates-ov');?>
">OV</a> and <a href="<?php echo routePath('store-ssl-certificates-ev');?>
">EV Certificates</a> also authenticate the identity of the company or organization that holds the certificate providing more trust to end users.</p>

                    <p><a href="<?php echo routePath('store-ssl-certificates-ev');?>
">EV Certificates</a> offer the highest level of validation and trust, and will show the name of the company or organization in green in the address bar. This is an immediate, visual way that viewers can know that extra steps were taken to confirm the site they’re visiting – which is why most large companies and organizations choose EV certificates.</p>

                </div>
            </div>

        </div>
    </div>

    <div class="standout-1">
        <div class="container browser">
            <h3>Browsers are changing, are you prepared?</h3>
            <div class="browser-image">
                <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/browser-warning.jpg">
            </div>
        </div>
        <div class="browser-notice">
            <div class="wrapper-container">
                <div class="wrapper">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/padlock-x.png">
                    Web pages not served via HTTPS will be marked ‘not secure’ in <strong>Google Chrome</strong>
                    and <strong>Mozilla Firefox</strong>. Could your website be one of them?
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="content-block browser-msg">
        <div class="container">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/browser-usage.png">
            <span>As the world's most popular browsers, this will affect nearly 70% of global internet traffic and other browser companies will follow suit.</span>
        </div>
    </div>

    <div class="content-block detailed-info" id="sslDetail">
        <div class="container">

            <div class="panel">
              <div class="panel-heading">
                <h4 data-toggle="collapse" data-parent="#accordion" href="#collapseAllCerts" class="panel-title expand">
                   <span class="arrow"><i class="fa fa-chevron-right"></i></span>
                  <a href="#">View All SSL Certificates</a>
                </h4>
              </div>
              <div id="collapseAllCerts" class="panel-collapse collapse">
                <div class="panel-body">

                    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/currency-chooser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <ul class="ssl-certs-all">
                        <?php if (count($_smarty_tpl->tpl_vars['certificates']->value) > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['certificates']->value, 'products', false, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value => $_smarty_tpl->tpl_vars['products']->value) {
?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                                                <p><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</p>
                                            </div>
                                            <div class="col-sm-3 col-sm-offset-1">
                                                <div class="padded-cell price">
                                                    from<br>
                                                    <strong><?php echo $_smarty_tpl->tpl_vars['product']->value->pricing()->best()->yearlyPrice();?>
</strong>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="padded-cell">
                                                    <form method="post" action="<?php echo routePath('store-order');?>
">
                                                        <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                                                        <button type="submit" class="btn btn-success btn-block">Buy Now</button>
                                                    </form>
                                                    <a href="<?php echo routePath("store-ssl-certificates-".((string)$_smarty_tpl->tpl_vars['type']->value));?>
">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php } elseif ($_smarty_tpl->tpl_vars['inPreview']->value) {?>
                            <div class="lead text-center">
                                SSL products you activate will be displayed here
                            </div>
                        <?php }?>
                    </ul>

                </div>
              </div>
            </div>
            <div class="panel">
              <div class="panel-heading">
                <h4 data-toggle="collapse" data-parent="#accordion" href="#collapseFaq" class="panel-title expand">
                    <span class="arrow"><i class="fa fa-chevron-right"></i></span>
                  <a href="#">FAQ's</a>
                </h4>
              </div>
              <div id="collapseFaq" class="panel-collapse collapse">
                <div class="panel-body">

                    <h4>What is an SSL Certificate?</h4>

                    <p>SSL Certificates enable data encryption on the internet and allow data to be transmitted securely from a web server to a browser. With SSL, your website can use the https protocol and will display a padlock in end users web browsers to indicate the connection is secure.</p>

                    <h4>Why do I need an SSL Certificate?</h4>

                    <p>SSL Certificates are an essential part of the internet. They not only encrypt communication between your computer and the server where a website is located, but they also provide verification that a site is what it claims to be.</p>

                    <h4>What are the different types of SSL?</h4>

                    <p>There are 3 different levels of vetting that SSL Certificates are based upon. Domain Validated (DV) , Organization Validated (OV), and Extended Validation (EV). The major difference between the types of certificate relates to the information the Certificate Authority, RapidSSL, GeoTrust and Symantec, requires and validates in order to issue a certificate. The higher levels of certificate require more information, and often is displayed in the browser bar. EV SSL for example turns the browser bar green and displays the organization name to visitors to generate more trust.</p>

                </div>
              </div>
            </div>

        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/logos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</div>

<?php echo '<script'; ?>
>
$(function() {
  $(".expand").on( "click", function() {
    $expand = $(this).find(">:first-child");

    if($expand.html() == '<i class="fa fa-chevron-right"></i>') {
      $expand.html('<i class="fa fa-chevron-down"></i>');
    } else {
      $expand.html('<i class="fa fa-chevron-right"></i>');
    }
  });
  $('.show-all').click(function(e) {
    e.preventDefault();
    if (!$('#collapseAllCerts').hasClass('in')) {
        $('#collapseAllCerts').collapse('show');
    }
    $('html, body').animate({
        scrollTop: $('#sslDetail').offset().top
    }, 500);
  });
});
<?php echo '</script'; ?>
>
<?php }
}
