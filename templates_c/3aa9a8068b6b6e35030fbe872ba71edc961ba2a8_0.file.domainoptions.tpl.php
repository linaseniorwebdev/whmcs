<?php
/* Smarty version 3.1.33-p1, created on 2019-07-06 21:57:53
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/domainoptions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d20fd41c37c36_02666483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3aa9a8068b6b6e35030fbe872ba71edc961ba2a8' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/domainoptions.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d20fd41c37c36_02666483 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['invalid']->value) {?>
    <div class="domaininvalid">
        <?php if ($_smarty_tpl->tpl_vars['reason']->value) {?>
            <?php echo $_smarty_tpl->tpl_vars['reason']->value;?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomaininvalid'];?>

        <?php }?>
    </div>
    <p align="center">
        <button type="button" onclick="cancelcheck()" class="btn btn-default btn-lg">
            <i class="fa fa-arrow-circle-left"></i>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['carttryanotherdomain'];?>

        </button>
    </p>
<?php } elseif ($_smarty_tpl->tpl_vars['alreadyindb']->value) {?>
    <div class="domaininvalid">
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainexists'];?>

    </div>
    <p align="center">
        <button type="button" onclick="cancelcheck()" class="btn btn-default btn-lg">
            <i class="fa fa-arrow-circle-left"></i>
            <?php echo $_smarty_tpl->tpl_vars['LANG']->value['carttryanotherdomain'];?>

        </button>
    </p>
<?php } else { ?>

<?php if ($_smarty_tpl->tpl_vars['checktype']->value == "register" && $_smarty_tpl->tpl_vars['regenabled']->value) {?>

<input type="hidden" name="domainoption" value="register" />

<?php if ($_smarty_tpl->tpl_vars['status']->value == "available" || $_smarty_tpl->tpl_vars['status']->value == "error") {?>

<div class="domainavailable"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['cartcongratsdomainavailable'],$_smarty_tpl->tpl_vars['domain']->value ));?>
</div>
<input type="hidden" name="domains[]" value="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
" />
<div class="domainregperiod hw_domainavail black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartregisterhowlong'];?>
 <select name="domainsregperiod[<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
]" id="regperiod" class="form-control select-inline"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['regoptions']->value, 'regoption', false, 'period');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value => $_smarty_tpl->tpl_vars['regoption']->value) {
if ($_smarty_tpl->tpl_vars['regoption']->value['register']) {?><option value="<?php echo $_smarty_tpl->tpl_vars['period']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>
 @ <?php echo $_smarty_tpl->tpl_vars['regoption']->value['register'];?>
</option><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div>

<?php $_smarty_tpl->_assignInScope('continueok', true);?>

<?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "unavailable") {?>

<div class="domainunavailable"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['cartdomaintaken'],$_smarty_tpl->tpl_vars['domain']->value ));?>
</div>
<p align="center">
    <button type="button" onclick="cancelcheck()" class="btn btn-default btn-lg">
        <i class="fa fa-arrow-circle-left"></i>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['carttryanotherdomain'];?>

    </button>
</p>


<?php }?>

<?php } elseif ($_smarty_tpl->tpl_vars['checktype']->value == "transfer" && $_smarty_tpl->tpl_vars['transferenabled']->value) {?>

<input type="hidden" name="domainoption" value="transfer" />

<?php if ($_smarty_tpl->tpl_vars['status']->value == "available") {?>

<div class="domainunavailable"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['carttransfernotregistered'],$_smarty_tpl->tpl_vars['domain']->value ));?>
</div>
<p align="center">
    <button type="button" onclick="cancelcheck()" class="btn btn-default btn-lg">
        <i class="fa fa-arrow-circle-left"></i>
        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['carttryanotherdomain'];?>

    </button>
</p>

<?php } elseif ($_smarty_tpl->tpl_vars['status']->value == "unavailable" || $_smarty_tpl->tpl_vars['status']->value == "error") {?>

<div class="domainavailable"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'sprintf2' ][ 0 ], array( $_smarty_tpl->tpl_vars['LANG']->value['carttransferpossible'],$_smarty_tpl->tpl_vars['domain']->value,$_smarty_tpl->tpl_vars['transferprice']->value ));?>
</div>
<input type="hidden" name="domains[]" value="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
" />
<input type="hidden" name="domainsregperiod[<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['transferterm']->value;?>
" />

<?php $_smarty_tpl->_assignInScope('continueok', true);?>

<?php }?>

<?php } elseif ($_smarty_tpl->tpl_vars['checktype']->value == "owndomain" || $_smarty_tpl->tpl_vars['checktype']->value == "subdomain") {?>

<input type="hidden" name="domainoption" value="<?php echo $_smarty_tpl->tpl_vars['checktype']->value;?>
" />
<input type="hidden" name="sld" value="<?php echo $_smarty_tpl->tpl_vars['sld']->value;?>
" />
<input type="hidden" name="tld" value="<?php echo $_smarty_tpl->tpl_vars['tld']->value;?>
" />
<?php echo '<script'; ?>
 language="javascript">
completedomain();
<?php echo '</script'; ?>
>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['othersuggestions']->value) {?>

<div class="domainsuggestions"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartotherdomainsuggestions'];?>
</div>

<table align="center" cellspacing="1" class="domainsuggestions">
<tr><th width="50"></th><th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainname'];?>
</th><th><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarearegistrationperiod'];?>
</th></tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['othersuggestions']->value, 'other');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['other']->value) {
?>
<tr><td><input type="checkbox" name="domains[]" value="<?php echo $_smarty_tpl->tpl_vars['other']->value['domain'];?>
" /></td><td><?php echo $_smarty_tpl->tpl_vars['other']->value['domain'];?>
</td><td><select name="domainsregperiod[<?php echo $_smarty_tpl->tpl_vars['other']->value['domain'];?>
]"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['other']->value['regoptions'], 'regoption', false, 'period');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['period']->value => $_smarty_tpl->tpl_vars['regoption']->value) {
if ($_smarty_tpl->tpl_vars['regoption']->value['register']) {?><option value="<?php echo $_smarty_tpl->tpl_vars['period']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>
 @ <?php echo $_smarty_tpl->tpl_vars['regoption']->value['register'];?>
</option><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>

<?php $_smarty_tpl->_assignInScope('continueok', true);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['continueok']->value) {?>
<div class="text-center domain_nextbtn">
    <button type="submit" class="btn btn-primary btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['continue'];?>
 &nbsp;<i class="fa fa-arrow-circle-right"></i></button>
</div>
<?php }?>

<?php }
}
}
