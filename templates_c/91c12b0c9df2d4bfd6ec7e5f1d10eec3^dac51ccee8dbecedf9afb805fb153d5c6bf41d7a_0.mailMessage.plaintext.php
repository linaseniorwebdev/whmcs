<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 12:57:43
  from 'mailMessage:plaintext' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d247327c15f20_46783829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dac51ccee8dbecedf9afb805fb153d5c6bf41d7a' => 
    array (
      0 => 'mailMessage:plaintext',
      1 => 1562669863,
      2 => 'mailMessage',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d247327c15f20_46783829 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?>Bonjour <?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
,

Récemment, une demande a été soumise pour réinitialiser votre mot de passe administrateur. Suivez le lien ci-dessous pour le réinitialiser.


<?php echo $_smarty_tpl->tpl_vars['pw_reset_url']->value;?>



Si vous n'avez pas demandé de réinitialisation d'un mot de passe, ignorez ce courriel. Le lien du mot de passe expirera en 2 heures.


 
<?php echo $_smarty_tpl->tpl_vars['whmcs_admin_link']->value;
}
}
