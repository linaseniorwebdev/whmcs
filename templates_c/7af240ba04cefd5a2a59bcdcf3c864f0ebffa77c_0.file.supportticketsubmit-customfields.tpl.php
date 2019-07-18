<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:17:53
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/supportticketsubmit-customfields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d251291df26a5_35115217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7af240ba04cefd5a2a59bcdcf3c864f0ebffa77c' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/supportticketsubmit-customfields.tpl',
      1 => 1562091558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d251291df26a5_35115217 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customfield']->value) {
?>
    <div class="form-group">
        <label for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
        <?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>

        <?php if ($_smarty_tpl->tpl_vars['customfield']->value['description']) {?>
            <p class="help-block"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>
</p>
        <?php }?>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
