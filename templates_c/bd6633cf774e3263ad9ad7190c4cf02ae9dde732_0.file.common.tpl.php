<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:24:28
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/common.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fa8c4e7f80_77672184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd6633cf774e3263ad9ad7190c4cf02ae9dde732' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/common.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d28fa8c4e7f80_77672184 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['templatefile']->value == 'domainregister') {
} else { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/css/all.min.css?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
" />
<?php }
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/scripts.min.js?v=<?php echo $_smarty_tpl->tpl_vars['versionHash']->value;?>
"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/css/custom.css" />
<?php }
}
