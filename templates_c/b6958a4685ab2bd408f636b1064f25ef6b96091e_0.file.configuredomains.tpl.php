<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 22:15:11
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/configuredomains.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24f5cf79f172_93769101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6958a4685ab2bd408f636b1064f25ef6b96091e' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/configuredomains.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24f5cf79f172_93769101 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/azur/webapps/app-whmcs/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
$template = $_smarty_tpl;
echo '<script'; ?>
 type="text/javascript" src="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/style.css" />
    <div id="order-modern">

    <div class="text-center">
        <h2 class="black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainsconfig'];?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainsconfiginfo'];?>
</p>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
        <div class="errorbox" style="display:block;">
            <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['errormessage']->value,'<li>',' &nbsp;#&nbsp; ');?>
 &nbsp;#&nbsp;
        </div>
        <br />
    <?php }?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?a=confdomains">
        <input type="hidden" name="update" value="true" />

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domains']->value, 'domain', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['domain']->value) {
?>

            <div class="panel panel-default hw_cofdmain">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $_smarty_tpl->tpl_vars['domain']->value['domain'];?>
 - <?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>

                        <?php if ($_smarty_tpl->tpl_vars['domain']->value['hosting']) {?>
                            <span style="color:#009900;">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainshashosting'];?>
]</span>
                        <?php } else { ?>
                            <a href="cart.php" style="color:#cc0000;">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainsnohosting'];?>
]</a>
                        <?php }?>
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-3 hw_pdfont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['hosting'];?>
:</div>
                        <div class="col-sm-9 black_text"><?php if ($_smarty_tpl->tpl_vars['domain']->value['hosting']) {?><span style="color:#009900;">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainshashosting'];?>
]</span><?php } else { ?><a href="cart.php" style="color:#cc0000;">[<?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartdomainsnohosting'];?>
]</a><?php }?></div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3 hw_pdfont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderregperiod'];?>
:</div>
                        <div class="col-sm-9 black_text"><?php echo $_smarty_tpl->tpl_vars['domain']->value['regperiod'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderyears'];?>
</div>
                    </div>
                    <hr />
                    <?php if ($_smarty_tpl->tpl_vars['domain']->value['eppenabled']) {?>
                        <div class="row">
                            <div class="col-sm-3 hw_pdfont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaineppcode'];?>
:</div>
                            <div class="col-sm-9  black_text"><input type="text" name="epp[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]" size="20" value="<?php echo $_smarty_tpl->tpl_vars['domain']->value['eppvalue'];?>
" class="form-control" /> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaineppcodedesc'];?>
</div>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagement'] || $_smarty_tpl->tpl_vars['domain']->value['emailforwarding'] || $_smarty_tpl->tpl_vars['domain']->value['idprotection']) {?>
                        <div class="row">
                            <div class="col-sm-3 hw_pdfont"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartaddons'];?>
:</div>
                            <div class="col-sm-9 black_text">

                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagement']) {?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="dnsmanagement[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]"<?php if ($_smarty_tpl->tpl_vars['domain']->value['dnsmanagementselected']) {?> checked<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domaindnsmanagement'];?>
 (<?php echo $_smarty_tpl->tpl_vars['domain']->value['dnsmanagementprice'];?>
)
                                    </label>
                                    <br />
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['emailforwarding']) {?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="emailforwarding[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]"<?php if ($_smarty_tpl->tpl_vars['domain']->value['emailforwardingselected']) {?> checked<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainemailforwarding'];?>
 (<?php echo $_smarty_tpl->tpl_vars['domain']->value['emailforwardingprice'];?>
)
                                    </label>
                                    <br />
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['domain']->value['idprotection']) {?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="idprotection[<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
]"<?php if ($_smarty_tpl->tpl_vars['domain']->value['idprotectionselected']) {?> checked<?php }?> />
                                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainidprotection'];?>
 (<?php echo $_smarty_tpl->tpl_vars['domain']->value['idprotectionprice'];?>
)
                                    </label>
                                    <br />
                                <?php }?>

                            </div>
                        </div>
                    <?php }?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['domain']->value['fields'], 'domainfield', false, 'domainfieldname');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['domainfieldname']->value => $_smarty_tpl->tpl_vars['domainfield']->value) {
?>
                        <div class="row">
                            <div class="col-sm-4"><?php echo $_smarty_tpl->tpl_vars['domainfieldname']->value;?>
:</div>
                            <div class="col-sm-8"><?php echo $_smarty_tpl->tpl_vars['domainfield']->value;?>
</div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <?php if ($_smarty_tpl->tpl_vars['atleastonenohosting']->value) {?>
	
            <h2 class="black_text text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameservers'];?>
</h2>
            <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['cartnameserversdesc'];?>
</p>

            <div class="form-horizontal hw_cdform">
                <div class="form-group">
                    <label for="inputNs1" class="col-sm-3 col-sm-offset-1 control-label black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver1'];?>
</label>
                    <div class="col-sm-7 col-md-5">
                        <input type="text" class="form-control" id="inputNs1" name="domainns1" value="<?php echo $_smarty_tpl->tpl_vars['domainns1']->value;?>
" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNs2" class="col-sm-3 col-sm-offset-1 control-label black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver2'];?>
</label>
                    <div class="col-sm-7 col-md-5">
                        <input type="text" class="form-control" id="inputNs2" name="domainns2" value="<?php echo $_smarty_tpl->tpl_vars['domainns2']->value;?>
" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNs3" class="col-sm-3 col-sm-offset-1 control-label black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver3'];?>
</label>
                    <div class="col-sm-7 col-md-5">
                        <input type="text" class="form-control" id="inputNs3" name="domainns3" value="<?php echo $_smarty_tpl->tpl_vars['domainns3']->value;?>
" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNs1" class="col-sm-3 col-sm-offset-1 control-label black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver4'];?>
</label>
                    <div class="col-sm-7 col-md-5">
                        <input type="text" class="form-control" id="inputNs4" name="domainns4" value="<?php echo $_smarty_tpl->tpl_vars['domainns4']->value;?>
" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNs5" class="col-sm-3 col-sm-offset-1 control-label black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['domainnameserver5'];?>
</label>
                    <div class="col-sm-7 col-md-5">
                        <input type="text" class="form-control" id="inputNs5" name="domainns5" value="<?php echo $_smarty_tpl->tpl_vars['domainns5']->value;?>
" />
                    </div>
                </div>
            </div>

        <?php }?>

        <div class="text-center domain_nextbtn">
            <button type="submit" class="btn btn-primary btn-lg"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['continue'];?>
 &nbsp;<i class="fa fa-arrow-circle-right"></i></button>
        </div>

    </form>

</div>
<?php }
}
