<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:17:47
  from '/home/azur/webapps/app-whmcs/templates/six_six/store/ssl/shared/nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d25128b57cb44_18639863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac5e14a557912a71d8f9b746cb93410ac8ddd9f8' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/six_six/store/ssl/shared/nav.tpl',
      1 => 1562183974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d25128b57cb44_18639863 (Smarty_Internal_Template $_smarty_tpl) {
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
        <li<?php if ($_smarty_tpl->tpl_vars['current']->value == 'competitiveupgrade') {?> class="active"<?php }?>><a href="<?php echo routePath('store-ssl-certificates-competitiveupgrade');?>
">Switch to Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php if ($_smarty_tpl->tpl_vars['inCompetitiveUpgrade']->value) {?>
    <div class="competitive-upgrade-banner" id="competitiveUpgradeBanner">
        <div class="container">
            <button class="btn btn-default btn-sm pull-right" onclick="$('#competitiveUpgradeBanner').slideUp()"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"dismiss"),$_smarty_tpl ) );?>
</button>
            <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.competitiveUpgrade"),$_smarty_tpl ) );?>
</h4>
            <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.competitiveUpgradeBannerMsg",'domain'=>$_smarty_tpl->tpl_vars['competitiveUpgradeDomain']->value),$_smarty_tpl ) );?>
</p>
        </div>
    </div>
<?php }
}
}
