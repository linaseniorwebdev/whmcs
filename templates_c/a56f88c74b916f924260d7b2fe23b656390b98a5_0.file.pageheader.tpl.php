<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 22:14:38
  from '/home/azur/webapps/app-whmcs/templates/six_six/includes/pageheader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24f5aee65e92_84463879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a56f88c74b916f924260d7b2fe23b656390b98a5' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/six_six/includes/pageheader.tpl',
      1 => 1562183974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24f5aee65e92_84463879 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><div class="header-lined">
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;
if ($_smarty_tpl->tpl_vars['desc']->value) {?> <small><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</small><?php }?></h1>
    <?php if ($_smarty_tpl->tpl_vars['showbreadcrumb']->value) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
</div>
<?php }
}
