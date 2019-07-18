<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:26:11
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/shared/certificate-pricing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d2514836a1e53_86451042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4ebcea8370f964d31c8e08e9d8dcc245fc7c2ea' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/shared/certificate-pricing.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d2514836a1e53_86451042 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><div class="content-block certificate-options <?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
    <div class="container">

        <h3 class="pull-left">Certificate Pricing</h3>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/currency-chooser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <div class="clearfix"></div>

        <br>

        <div class="row">
            <div class="<?php if (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) == 1) {?>col-md-6 col-md-offset-3<?php } elseif (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) == 2) {?>col-md-10 col-md-offset-1<?php } else { ?>col-sm-12<?php }?>">
                <div class="row row-pricing-table">
                    <div class="col-sm-<?php if (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) == 1) {?>6<?php } elseif (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) == 2) {?>4<?php } else { ?>3<?php }?> sidebar hidden-xs">
                        <div class="header"></div>
                        <ul>
                            <li>256-Bit Encryption</li>
                            <li>Issuance Time</li>
                            <li>Great For</li>
                            <li>Warranty Value</li>
                            <li>Site Seal</li>
                            <li>Free Reissues</li>
                            <li>Browser Support</li>
                            <li>1 Year</li>
                            <li>2 Years</li>
                            <li>3 Years</li>
                        </ul>
                    </div>
                    <?php if (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) > 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value], 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                            <div class="col-sm-<?php if (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) == 1) {?>6<?php } elseif (count($_smarty_tpl->tpl_vars['certificates']->value[$_smarty_tpl->tpl_vars['type']->value]) == 2) {?>4<?php } else { ?>3<?php }?>">
                                <div class="header">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                                </div>
                                <ul>
                                    <li><i class="fa fa-check"></i></li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['certificateFeatures']->value[$_smarty_tpl->tpl_vars['product']->value->configoption1]['issuance'];?>
</li>
                                    <li><?php echo $_smarty_tpl->tpl_vars['certificateFeatures']->value[$_smarty_tpl->tpl_vars['product']->value->configoption1]['for'];?>
</li>
                                    <li>USD $<?php echo $_smarty_tpl->tpl_vars['certificateFeatures']->value[$_smarty_tpl->tpl_vars['product']->value->configoption1]['warranty'];?>
</li>
                                    <li><i class="fa fa-check"></i></li>
                                    <li><i class="fa fa-check"></i></li>
                                    <li>99.9%</li>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->pricing()->annual()) {?>
                                        <li class="price 1yr"><?php echo $_smarty_tpl->tpl_vars['product']->value->pricing()->annual()->yearlyPrice();?>
</li>
                                    <?php } else { ?>
                                        <li class="price 1yr na">-</li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->pricing()->biennial()) {?>
                                        <li class="price 2yr"><?php echo $_smarty_tpl->tpl_vars['product']->value->pricing()->biennial()->yearlyPrice();?>
</li>
                                    <?php } else { ?>
                                        <li class="price 2yr na">-</li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->pricing()->triennial()) {?>
                                        <li class="price 3yr"><?php echo $_smarty_tpl->tpl_vars['product']->value->pricing()->triennial()->yearlyPrice();?>
</li>
                                    <?php } else { ?>
                                        <li class="price 3yr na">-</li>
                                    <?php }?>
                                </ul>
                                <form method="post" action="<?php echo routePath('store-order');?>
">
                                    <input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                                    <button type="submit" class="btn btn-block">Buy Now</button>
                                </form>
                            </div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <div class="col-xs-9">
                            <div class="lead preview-text">
                                SSL Certificate products you activate will be displayed here
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
