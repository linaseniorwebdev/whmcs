<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:26:40
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/ev.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d2514a08835b3_63634165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4f3ed40b2a75b4524f9e259603e153f6aff58d6' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/ev.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d2514a08835b3_63634165 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/css/style.css" rel="stylesheet">

<div class="landing-page ssl">

    <div class="hero">
        <div class="container">
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.ev.title"),$_smarty_tpl ) );?>
</h2>
            <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.ev.tagline"),$_smarty_tpl ) );?>
</h3>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('current'=>"ev"), 0, true);
?>

    <div class="content-block">
        <div class="container">

            <div class="row">
                <div class="col-sm-4 col-sm-push-8 text-right hidden-xs">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl-multi.png">
                </div>
                <div class="col-sm-8 col-sm-pull-4">

                    <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.ev.descriptionTitle"),$_smarty_tpl ) );?>
</h3>

                    <div class="text-center visible-xs">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl-multi.png">
                        <br><br>
                    </div>

                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.ev.descriptionContent"),$_smarty_tpl ) );?>


                </div>
            </div>

        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/certificate-pricing.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"ev"), 0, true);
?>

    <div class="content-block dashed-border">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-push-7 col-md-5 col-md-push-7">
                    <br>
                    <h4>Contains Your EV Authenticated Organization Details</h4>
                    <p>Certificate details indicate your website is using an Extended Validation SSL Certificate and include the issuing CA, validity status, and expiration date.</p>
                </div>
                <div class="col-lg-6 col-lg-pull-2 col-md-7 col-md-pull-4">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/cert-details-ev.png">
                </div>
            </div>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"ev"), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/logos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</div>
<?php }
}
