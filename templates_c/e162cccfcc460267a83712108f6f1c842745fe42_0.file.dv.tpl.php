<?php
/* Smarty version 3.1.33-p1, created on 2019-07-10 00:26:11
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/dv.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d251483677a68_92709035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e162cccfcc460267a83712108f6f1c842745fe42' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/store/ssl/dv.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d251483677a68_92709035 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/css/style.css" rel="stylesheet">

<div class="landing-page ssl">

    <div class="hero">
        <div class="container">
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.dv.title"),$_smarty_tpl ) );?>
</h2>
            <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.dv.tagline"),$_smarty_tpl ) );?>
</h3>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('current'=>"dv"), 0, true);
?>

    <div class="content-block">
        <div class="container">

            <div class="row">
                <div class="col-sm-4 col-md-3 col-sm-push-8 col-md-push-9 text-right hidden-xs">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl.png">
                </div>
                <div class="col-sm-8 col-md-9 col-sm-pull-4 col-md-pull-3">

                    <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.dv.descriptionTitle"),$_smarty_tpl ) );?>
</h3>

                    <div class="text-center visible-xs">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/symantec/ssl.png">
                        <br><br>
                    </div>

                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.ssl.dv.descriptionContent"),$_smarty_tpl ) );?>


                </div>
            </div>

        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/certificate-pricing.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"dv"), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/features.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"dv"), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/store/ssl/shared/logos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

</div>
<?php }
}
