<?php
/* Smarty version 3.1.33-p1, created on 2019-07-08 22:09:49
  from '/home/azur/webapps/app-whmcs/templates/AKD/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d23a30d654765_88873872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '316b1aa7179f0a7ea46481403a1b9fcb66ac2ce1' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/AKD/login.tpl',
      1 => 1562091557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d23a30d654765_88873872 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
dologin.php" role="form">
    <div class="row">	
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['login'];?>
</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_smarty_tpl->tpl_vars['incorrect']->value) {?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginincorrect'];?>
</strong>
                        </div>
                    <?php } elseif ($_smarty_tpl->tpl_vars['verificationId']->value && empty($_smarty_tpl->tpl_vars['transientDataName']->value)) {?>
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['verificationKeyExpired'],'textcenter'=>true), 0, true);
?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['ssoredirect']->value) {?>
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>$_smarty_tpl->tpl_vars['LANG']->value['sso']['redirectafterlogin'],'textcenter'=>true), 0, true);
?>
                    <?php }?>
                    <div class="form-group">
                        <label for="username"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginemail'];?>
</label>
                        <input type="email" name="username" id="username" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginemail'];?>
" />
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginpassword'];?>
</label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginpassword'];?>
" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <input type="checkbox" name="rememberme"<?php if ($_smarty_tpl->tpl_vars['rememberme']->value) {?> checked="checked"<?php }?> /> 
                            <label><?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginrememberme'];?>
</label>
                        </div>
                    </div>	
                </div>
                <div class="panel-footer">
                    <input id="login" type="submit" class="btn res-100 btn-3d btn-primary" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['loginbutton'];?>
" /> <p class="pull-right res-left" style="margin-top:10px;"><a href="pwreset.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['forgotpw'];?>
</a></p>
                </div>
            </div>
        </div>
    </div>
</form><?php }
}
