<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:20:43
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/weebly/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d25133b8a47a3_89809368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd25e2fd58ee5d1403edc67b9544f20d4253d6702' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/weebly/index.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d25133b8a47a3_89809368 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/css/style.css" rel="stylesheet">

<div class="landing-page weebly">

    <div class="hero">
        <div class="container">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/logo.png">
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.headline"),$_smarty_tpl ) );?>
</h2>
            <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.tagline"),$_smarty_tpl ) );?>
</h3>
        </div>
    </div>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-landing-page" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="nav-landing-page">
          <ul class="nav navbar-nav">
            <li><a href="#" onclick="smoothScroll('#overview');return false">Overview</a></li>
            <li><a href="#" onclick="smoothScroll('#features');return false">Features</a></li>
            <li><a href="#" onclick="smoothScroll('#pricing');return false">Pricing</a></li>
            <li><a href="#" onclick="smoothScroll('#faq');return false">FAQ</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="content-block image-standout" id="overview">
        <div class="container">
            <p class="lead text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.introduction"),$_smarty_tpl ) );?>
</p>
            <br><br>
            <div class="row">
                <div class="col-sm-5">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/dragdropeditor.png">
                </div>
                <div class="col-sm-7">
                    <br><br>
                    <h3>Drag & Drop Builder</h3>
                    <p>The easy drag & drop builder allows you to create a professional website with no technical skills required. Choose different elements to add photos, maps or videos by just dragging and dropping them into place, right from your web browser.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block features" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/builder.png"></div>
                    <h4>Builder</h4>
                    <p>Create the perfect website with powerful drag and drop tools</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/ecommerce.png"></div>
                    <h4>Ecommerce</h4>
                    <p>Complete e-commerce solution to grow your business online</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/forms.png"></div>
                    <h4>Forms</h4>
                    <p>Create custom contact forms, RSVP lists and surveys</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/templates.png"></div>
                    <h4>Templates</h4>
                    <p>Professionally designed website templates with full customisation</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/gallery.png"></div>
                    <h4>Photos</h4>
                    <p>Create your own galleries, slideshows and custom backgrounds</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/blogging.png"></div>
                    <h4>Blogging</h4>
                    <p>Make an amazing blog in minutes</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/video.png"></div>
                    <h4>Video</h4>
                    <p>Embed video from popular services or host your own</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/seo.png"></div>
                    <h4>SEO</h4>
                    <p>Powerful SEO tools to help search engines find you</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block pricing" id="pricing">
        <div class="container">

            <div class="row">
                <div class="col-sm-9">
                    <div class="btn-group" role="group">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['billingCycles']->value, 'cycle');
$_smarty_tpl->tpl_vars['cycle']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cycle']->value) {
$_smarty_tpl->tpl_vars['cycle']->index++;
$_smarty_tpl->tpl_vars['cycle']->first = !$_smarty_tpl->tpl_vars['cycle']->index;
$__foreach_cycle_0_saved = $_smarty_tpl->tpl_vars['cycle'];
?>
                            <button type="button" class="btn btn-default cycle-change<?php if ($_smarty_tpl->tpl_vars['cycle']->first) {?> active<?php }?>" data-cycle="<?php echo $_smarty_tpl->tpl_vars['cycle']->value;?>
">
                                <?php ob_start();
echo ('orderpaymentterm').($_smarty_tpl->tpl_vars['cycle']->value);
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>$_prefixVariable1),$_smarty_tpl ) );?>

                            </button>
                        <?php
$_smarty_tpl->tpl_vars['cycle'] = $__foreach_cycle_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                    <br><br>
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['currencies']->value) {?>
                    <div class="col-sm-3">
                        <form method="post" action="">
                            <select name="currency" class="form-control currency-selector" onchange="submit()">
                                <option>Change Currency (<?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['code'];?>
)</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['currency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </form>
                    </div>
                <?php }?>
            </div>

            <div class="row weebly-plans">
                <?php if (count($_smarty_tpl->tpl_vars['products']->value) > 0) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
                        <div class="<?php if (count($_smarty_tpl->tpl_vars['products']->value) == 1) {?>col-sm-6 col-sm-offset-3<?php } elseif (count($_smarty_tpl->tpl_vars['products']->value) == 2) {?>col-sm-5<?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?> col-sm-offset-1<?php }
} else { ?>col-sm-4<?php }?>">
                            <div class="pricing-item">
                                <div class="header">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                                    <h5>Ideal for <?php echo $_smarty_tpl->tpl_vars['product']->value->idealFor;?>
</h5>
                                </div>
                                <div class="price">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->pricing()->allAvailableCycles(), 'pricing');
$_smarty_tpl->tpl_vars['pricing']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pricing']->value) {
$_smarty_tpl->tpl_vars['pricing']->index++;
$_smarty_tpl->tpl_vars['pricing']->first = !$_smarty_tpl->tpl_vars['pricing']->index;
$__foreach_pricing_3_saved = $_smarty_tpl->tpl_vars['pricing'];
?>
                                        <span class="pricing-text <?php echo $_smarty_tpl->tpl_vars['pricing']->value->cycle();
if (!$_smarty_tpl->tpl_vars['pricing']->first) {?> hidden<?php }?>">
                                            <?php echo $_smarty_tpl->tpl_vars['pricing']->value->toFullString();?>

                                        </span>
                                    <?php
$_smarty_tpl->tpl_vars['pricing'] = $__foreach_pricing_3_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <span class="pricing-text not-available hidden">
                                        -
                                    </span>
                                </div>
                                <div class="feature-heading">Site Features</div>
                                <ul class="site-features">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->siteFeatures, 'feature');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
?>
                                        <li>
                                            <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>

                                        </li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                                <div class="feature-heading">eCommerce Features</div>
                                <ul class="ecommerce-features">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->ecommerceFeatures, 'feature');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
?>
                                        <li>
                                            <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>

                                        </li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </div>
                            <form method="post" action="<?php echo routePath('store-order');?>
">
                                <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                                <input type="hidden" name="billingcycle" value="">
                                <button type="submit" class="btn btn-primary btn-block btn-signup">Signup</button>
                            </form>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['inPreview']->value) {?>
                    <div class="col-xs-12 lead text-center">
                        Weebly plans you activate will be displayed here
                    </div>
                <?php }?>
            </div>

        </div>
    </div>

    <div class="content-block faq" id="faq">
        <div class="container">
            <h3 class="text-center">Frequently Asked Questions</h3>
            <div class="row">
                <div class="col-md-4">
                    <h4>Can I create a blog?</h4>
                    <p>Yes the website builder allows you to include blog functionality.</p>
                    <hr>
                    <h4>Will my site be mobile friendly?</h4>
                    <p>Yes all websites created with the Weebly site builder are optimised for mobile.</p>
                    <hr>
                    <h4>Can I add photos to my website?</h4>
                    <p>Yes, you can add photos to your site, but HD Video and Audio are only available on Pro & Business plans.</p>
                    <div class="hidden-md hidden-lg"><hr></div>
                    </div>
                    <div class="col-md-4">
                    <h4>Can I sell products through my site?</h4>
                    <p>Yes eCommerce functionality is included with all plans but the number of products you can offer varies.</p>
                    <hr>
                    <h4>Can I add forms to my site?</h4>
                    <p>Yes the Weebly site builder makes it easy to create contact forms, RSVP lists, surveys and more.</p>
                    <hr>
                    <h4>How do I get my site into search engines?</h4>
                    <p>All Weebly powered websites include powerful SEO tools to help maximise your search engine ranking.</p>
                    <div class="hidden-md hidden-lg"><hr></div>
                    </div>
                    <div class="col-md-4">
                    <h4>Are there multiple styles to choose from?</h4>
                    <p>Yes there are multiple pre-made templates for you to choose from.</p>
                    <hr>
                    <h4>Can I upgrade?</h4>
                    <p>Yes you can upgrade at any time. Simply login to your account and choose the upgrade option.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block trusted-by">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/logo.png">
                </div>
                <div class="col-sm-7 text-right">
                    Trusted by over 40,000,000 people worldwide
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/weebly/master.js"><?php echo '</script'; ?>
>
<?php }
}
