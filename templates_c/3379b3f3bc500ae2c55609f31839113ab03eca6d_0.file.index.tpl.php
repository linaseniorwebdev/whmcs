<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:17:47
  from '/home/azur/webapps/app-whmcs/templates/six_six/store/weebly/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d25128bf37b56_04893329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3379b3f3bc500ae2c55609f31839113ab03eca6d' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/six_six/store/weebly/index.tpl',
      1 => 1562183974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d25128bf37b56_04893329 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/store/css/style.css" rel="stylesheet">

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
            <span class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.toggleNav"),$_smarty_tpl ) );?>
</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="nav-landing-page">
          <ul class="nav navbar-nav">
            <li><a href="#" onclick="smoothScroll('#overview');return false"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.tab.overview"),$_smarty_tpl ) );?>
</a></li>
            <li><a href="#" onclick="smoothScroll('#features');return false"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.tab.features"),$_smarty_tpl ) );?>
</a></li>
            <li><a href="#" onclick="smoothScroll('#pricing');return false"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.tab.pricing"),$_smarty_tpl ) );?>
</a></li>
            <li><a href="#" onclick="smoothScroll('#faq');return false"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.tab.faq"),$_smarty_tpl ) );?>
</a></li>
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
                    <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.ddEditor"),$_smarty_tpl ) );?>
</h3>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.ddEditorDescription"),$_smarty_tpl ) );?>
</p>
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
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.builder"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.builderDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/ecommerce.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.ecommerce"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.ecommerceDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/forms.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.forms"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.formsDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/templates.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.templates"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.templatesDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/gallery.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.gallery"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.galleryDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/blogging.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.blogging"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.bloggingDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/video.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.video"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.videoDescription"),$_smarty_tpl ) );?>
</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="feature">
                    <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/weebly/icons/seo.png"></div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.seo"),$_smarty_tpl ) );?>
</h4>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.features.seoDescription"),$_smarty_tpl ) );?>
</p>
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
                                <option><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"changeCurrency"),$_smarty_tpl ) );?>
 (<?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['prefix'];?>
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

            <?php if ($_smarty_tpl->tpl_vars['litePlan']->value) {?>
                <div class="weebly-lite-plan">
                    <div class="pricing pull-right">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['litePlan']->value->pricing()->allAvailableCycles(), 'pricing');
$_smarty_tpl->tpl_vars['pricing']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pricing']->value) {
$_smarty_tpl->tpl_vars['pricing']->index++;
$_smarty_tpl->tpl_vars['pricing']->first = !$_smarty_tpl->tpl_vars['pricing']->index;
$__foreach_pricing_2_saved = $_smarty_tpl->tpl_vars['pricing'];
?>
                            <h4 class="pricing-text <?php echo $_smarty_tpl->tpl_vars['pricing']->value->cycle();
if (!$_smarty_tpl->tpl_vars['pricing']->first) {?> hidden<?php }?>">
                                <?php echo $_smarty_tpl->tpl_vars['pricing']->value->toFullString();?>

                            </h4>
                        <?php
$_smarty_tpl->tpl_vars['pricing'] = $__foreach_pricing_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <h4 class="pricing-text not-available hidden">-</h4>
                    </div>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.lite.headline"),$_smarty_tpl ) );?>
</h4>
                    <h5><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.lite.tagline"),$_smarty_tpl ) );?>
</h5>
                    <p><?php echo $_smarty_tpl->tpl_vars['litePlan']->value->description;?>
</p>
                    <form method="post" action="<?php echo routePath('store-order');?>
">
                        <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['litePlan']->value->id;?>
">
                        <input type="hidden" name="billingcycle" value="">
                        <button type="submit" class="btn btn-default btn-signup">
                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>'getStartedNow'),$_smarty_tpl ) );?>

                        </button>
                    </form>
                </div>
            <?php }?>

            <div class="row weebly-plans">
                <?php if (count($_smarty_tpl->tpl_vars['products']->value) > 0) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
                        <div class="<?php if (count($_smarty_tpl->tpl_vars['products']->value) == 1) {?>col-sm-6 col-sm-offset-3<?php } elseif (count($_smarty_tpl->tpl_vars['products']->value) == 2) {?>col-sm-5<?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?> col-sm-offset-1<?php }
} elseif (count($_smarty_tpl->tpl_vars['products']->value) == 3) {?>col-sm-4<?php } else { ?>col-sm-3<?php }?>">
                            <div class="pricing-item">
                                <div class="header">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                                    <h5><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.idealFor",'for'=>$_smarty_tpl->tpl_vars['product']->value->idealFor),$_smarty_tpl ) );?>
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
$__foreach_pricing_4_saved = $_smarty_tpl->tpl_vars['pricing'];
?>
                                        <span class="pricing-text <?php echo $_smarty_tpl->tpl_vars['pricing']->value->cycle();
if (!$_smarty_tpl->tpl_vars['pricing']->first) {?> hidden<?php }?>">
                                            <?php echo $_smarty_tpl->tpl_vars['pricing']->value->toFullString();?>

                                        </span>
                                    <?php
$_smarty_tpl->tpl_vars['pricing'] = $__foreach_pricing_4_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <span class="pricing-text not-available hidden">
                                        -
                                    </span>
                                </div>
                                <div class="feature-heading"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.siteFeatures"),$_smarty_tpl ) );?>
</div>
                                <ul class="site-features">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->siteFeatures, 'feature', false, 'langKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['langKey']->value => $_smarty_tpl->tpl_vars['feature']->value) {
?>
                                        <li>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.features.".((string)$_smarty_tpl->tpl_vars['langKey']->value)),$_smarty_tpl ) );?>

                                        </li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                                <div class="feature-heading"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.eCommerceFeatures"),$_smarty_tpl ) );?>
</div>
                                <ul class="ecommerce-features">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->ecommerceFeatures, 'feature', false, 'langKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['langKey']->value => $_smarty_tpl->tpl_vars['feature']->value) {
?>
                                        <li>
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.pricing.features.".((string)$_smarty_tpl->tpl_vars['langKey']->value)),$_smarty_tpl ) );?>

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
                                <button type="submit" class="btn btn-primary btn-block btn-signup"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"signup"),$_smarty_tpl ) );?>
</button>
                            </form>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['inPreview']->value) {?>
                    <div class="col-xs-12 lead text-center">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.adminPreview"),$_smarty_tpl ) );?>

                    </div>
                <?php }?>
            </div>

        </div>
    </div>

    <div class="content-block faq" id="faq">
        <div class="container">
            <h3 class="text-center"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.faq.title"),$_smarty_tpl ) );?>
</h3>
            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, array(array(1,2,3),array(4,5,6),array(7,8)), 'columns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['columns']->value) {
?>
                    <div class="col-md-4">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['columns']->value, 'row', true);
$_smarty_tpl->tpl_vars['row']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->iteration++;
$_smarty_tpl->tpl_vars['row']->last = $_smarty_tpl->tpl_vars['row']->iteration === $_smarty_tpl->tpl_vars['row']->total;
$__foreach_row_8_saved = $_smarty_tpl->tpl_vars['row'];
?>
                            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.faq.q".((string)$_smarty_tpl->tpl_vars['row']->value)),$_smarty_tpl ) );?>
</h4>
                            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.faq.a".((string)$_smarty_tpl->tpl_vars['row']->value)),$_smarty_tpl ) );?>
</p>
                            <?php if ($_smarty_tpl->tpl_vars['row']->last && $_smarty_tpl->tpl_vars['row']->value != 8) {?>
                                <div class="hidden-md hidden-lg"><hr></div>
                            <?php } else { ?>
                                <hr>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_8_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.websiteBuilder.trust"),$_smarty_tpl ) );?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/store/weebly/master.js"><?php echo '</script'; ?>
>
<?php }
}
