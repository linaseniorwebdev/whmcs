<?php
/* Smarty version 3.1.33-p1, created on 2019-07-05 17:53:56
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/category-chooser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d1f7294acb323_46170574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8faf685e6d4f590a088e29674bdf219c148490' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/category-chooser.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d1f7294acb323_46170574 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><div class="text-center col-xs-12">
  <div class="choosecat btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartchooseanothercategory'];?>
 <span class="caret"></span> </button>
    <ul class="dropdown-menu" role="menu">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productgroups']->value, 'productgroup', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['productgroup']->value) {
?>
      <li><a href="cart.php?gid=<?php echo $_smarty_tpl->tpl_vars['productgroup']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['productgroup']->value['name'];?>
</a></li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
      <li><a href="cart.php?gid=addons"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartproductaddons'];?>
</a></li>
      <?php if ($_smarty_tpl->tpl_vars['renewalsenabled']->value) {?>
      <li><a href="cart.php?gid=renewals"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainrenewals'];?>
</a></li>
      <?php }?>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['registerdomainenabled']->value) {?>
      <li><a href="cart.php?a=add&domain=register"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['registerdomain'];?>
</a></li>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['transferdomainenabled']->value) {?>
      <li><a href="cart.php?a=add&domain=transfer"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['transferdomain'];?>
</a></li>
      <?php }?>
      <li><a href="cart.php?a=view"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['viewcart'];?>
</a></li>
    </ul>
  </div>
</div>
<?php }
}
