<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 05:48:01
  from '/home/azur/webapps/app-whmcs/templates/AKD/supportticketsubmit-customfields.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d240e71af2070_00978407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53a9ebe00b0d957c49f4e0087e00f6cdf497a336' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/AKD/supportticketsubmit-customfields.tpl',
      1 => 1562091558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d240e71af2070_00978407 (Smarty_Internal_Template $_smarty_tpl) {
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
