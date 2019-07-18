<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:25:18
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/marketconnect-promo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fabe5b61c2_79017609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de0b14bfe58a973d8fe10b80e447f9aa87be6190' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/marketconnect-promo.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d28fabe5b61c2_79017609 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><div class="mc-promo <?php echo $_smarty_tpl->tpl_vars['promotion']->value->getClass();?>
">
    <div class="header">
    <div class="cta">
        <div class="price">
            <?php if ($_smarty_tpl->tpl_vars['product']->value->isFree()) {?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"orderfree"),$_smarty_tpl ) );?>

            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->pricing()->first()) {?>
                <?php echo $_smarty_tpl->tpl_vars['product']->value->pricing()->first()->breakdownPrice();?>

            <?php }?>
        </div>
        <button type="button" class="btn btn-sm btn-add" data-product-key="<?php echo $_smarty_tpl->tpl_vars['product']->value->productKey;?>
">
            <span class="text">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"addtocart"),$_smarty_tpl ) );?>

            </span>
            <span class="arrow">
                <i class="fa fa-chevron-right"></i>
            </span>
        </button>
    </div>
        <div class="expander">
            <i class="fa fa-chevron-right rotate" data-toggle="tooltip" data-placement="right" title="Click to learn more"></i>
        </div>
        <div class="icon">
            <img src="<?php echo $_smarty_tpl->tpl_vars['promotion']->value->getImagePath();?>
">
        </div>
        <div class="content">
            <div class="headline truncate"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getHeadline();?>
</div>
            <div class="tagline truncate"><?php echo $_smarty_tpl->tpl_vars['promotion']->value->getTagline();?>
</div>
        </div>
    </div>
    <div class="body clearfix">
        <?php if ($_smarty_tpl->tpl_vars['promotion']->value->hasFeatures()) {?>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['promotion']->value->getFeatures(), 'feature');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
?>
                    <li><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>
</li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        <?php }?>
    </div>
</div>
<?php }
}
