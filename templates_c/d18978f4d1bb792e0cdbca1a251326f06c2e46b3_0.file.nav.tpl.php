<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:20:23
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/shared/nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d251328006497_48833745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd18978f4d1bb792e0cdbca1a251326f06c2e46b3' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/shared/nav.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d251328006497_48833745 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-ssl" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="nav-ssl">
      <ul class="nav navbar-nav">
        <?php if (count($_smarty_tpl->tpl_vars['certificates']->value['dv']) > 0 || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
            <li<?php if ($_smarty_tpl->tpl_vars['current']->value == 'dv') {?> class="active"<?php }?>><a href="<?php echo routePath('store-ssl-certificates-dv');?>
">Standard SSL (DV)</a></li>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['certificates']->value['ov']) > 0 || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
            <li<?php if ($_smarty_tpl->tpl_vars['current']->value == 'ov') {?> class="active"<?php }?>><a href="<?php echo routePath('store-ssl-certificates-ov');?>
">Organisation Validation (OV)</a></li>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['certificates']->value['ev']) > 0 || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
            <li<?php if ($_smarty_tpl->tpl_vars['current']->value == 'ev') {?> class="active"<?php }?>><a href="<?php echo routePath('store-ssl-certificates-ev');?>
">Extended Validation (EV)</a></li>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['certificates']->value['wildcard']) > 0 || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
            <li<?php if ($_smarty_tpl->tpl_vars['current']->value == 'wildcard') {?> class="active"<?php }?>><a href="<?php echo routePath('store-ssl-certificates-wildcard');?>
">Wildcard</a></li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>
<?php }
}
