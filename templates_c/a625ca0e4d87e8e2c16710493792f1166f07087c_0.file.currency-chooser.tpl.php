<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:20:24
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/shared/currency-chooser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d251328011bd0_90913108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a625ca0e4d87e8e2c16710493792f1166f07087c' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/shared/currency-chooser.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d251328011bd0_90913108 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['currencies']->value) {?>
    <div align="right">
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
<?php }
}
}
