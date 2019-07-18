<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 18:40:21
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/includes/breadcrumb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24c375e58204_04728251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe7cb151d7f68193e7f064ceb831614d13f1b5b5' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/includes/breadcrumb.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24c375e58204_04728251 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?>

<div class ="container">
  <div class ="row">
    <div class ="baner_below_icons col-xs-12 no_padding">
      <ul>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumb']->value, 'item', true);
$_smarty_tpl->tpl_vars['item']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->iteration++;
$_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>       
        <li<?php if ($_smarty_tpl->tpl_vars['item']->last) {?> class="blue_text"<?php }?>><?php if (!$_smarty_tpl->tpl_vars['item']->last) {?><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><?php }
if ($_smarty_tpl->tpl_vars['item']->value['label'] == 'Portal Home') {?><i class="fa fa-home" aria-hidden="true"></i> HOME<?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['label'];
}
if (!$_smarty_tpl->tpl_vars['item']->last) {?></a><?php }?> </li><?php if (!$_smarty_tpl->tpl_vars['item']->last) {?> <li> /</li><?php }?>        
  <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    </div>
  </div>
</div>
<?php }
}
