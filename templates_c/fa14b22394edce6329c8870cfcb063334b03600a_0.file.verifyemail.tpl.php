<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 18:55:11
  from '/home/azur/webapps/app-whmcs/templates/six/includes/verifyemail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24c6ef74fc52_45503619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa14b22394edce6329c8870cfcb063334b03600a' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/six/includes/verifyemail.tpl',
      1 => 1562183974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24c6ef74fc52_45503619 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['emailVerificationIdValid']->value) {?>
    <div class="email-verification success">
        <div class="container">
            <i class="fas fa-check"></i>
            <span class="text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['emailAddressVerified'];?>
</span>
        </div>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['emailVerificationIdValid']->value === false) {?>
    <div class="email-verification failed">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 col-xs-push-10 col-sm-1 col-sm-push-11">
                    <button type="button" class="btn close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="col-xs-10 col-xs-pull-2 col-sm-7 col-sm-pull-1 col-md-8">
                    <i class="fas fa-times-circle"></i>
                    <span class="text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['emailKeyExpired'];?>
</span>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-1">
                    <button id="btnResendVerificationEmail" class="btn btn-default btn-sm btn-block">
                    <?php echo $_smarty_tpl->tpl_vars['LANG']->value['resendEmail'];?>

                </button>
                </div>
            </div>
        </div>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['emailVerificationPending']->value && !$_smarty_tpl->tpl_vars['showingLoginPage']->value) {?>
    <div class="email-verification">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 col-xs-push-10 col-sm-1 col-sm-push-11">
                    <button type="button" class="btn close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="col-xs-10 col-xs-pull-2 col-sm-7 col-sm-pull-1 col-md-8">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span class="text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['verifyEmailAddress'];?>
</span>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-1">
                    <button id="btnResendVerificationEmail" class="btn btn-default btn-sm btn-block btn-resend-verify-email">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['resendEmail'];?>

                    </button>
                </div>
            </div>
        </div>
    </div>
<?php }
}
}
