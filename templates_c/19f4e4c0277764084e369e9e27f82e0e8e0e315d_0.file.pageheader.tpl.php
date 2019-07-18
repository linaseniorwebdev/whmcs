<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 18:40:21
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/includes/pageheader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24c375e4cd81_40534878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19f4e4c0277764084e369e9e27f82e0e8e0e315d' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/includes/pageheader.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24c375e4cd81_40534878 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['templatefile']->value == 'homepage' || $_smarty_tpl->tpl_vars['filename']->value == 'error') {?>

<?php } else { ?>

<div class ="dedicated_banner col-xs-12 no_padding reseller_banner"> 
    
    <div class="container">
        <div class="row"> 
<div class ="subbanner col-xs-12 no_padding">
 <div class ="banner_text"> 
            <h1 class="white_text">
         <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

            </h1>
            
            <p class="black_text">Web Hosting Made <span class="bold_font"> EASY And AFFORDABLE! </span></p>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['showbreadcrumb']->value) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
        
              </div>


    </div>
    
    
    </div>

<?php }
}
}
