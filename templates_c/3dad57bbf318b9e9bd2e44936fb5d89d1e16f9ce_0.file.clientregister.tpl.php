<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 05:47:56
  from '/home/azur/webapps/app-whmcs/templates/AKD/clientregister.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d240e6c182758_21702139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dad57bbf318b9e9bd2e44936fb5d89d1e16f9ce' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/AKD/clientregister.tpl',
      1 => 1562091557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d240e6c182758_21702139 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if (in_array('state',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>
    <?php echo '<script'; ?>
>
        var stateNotRequired = true;
    <?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH_JS']->value;?>
/StatesDropdown.js"><?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['registrationDisabled']->value) {?>
	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'msg'=>((($_smarty_tpl->tpl_vars['LANG']->value['registerCreateAccount']).(' <strong><a href="cart.php" class="alert-link">')).($_smarty_tpl->tpl_vars['LANG']->value['registerCreateAccountOrder'])).('</a></strong>')), 0, true);
}
if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"error",'errorshtml'=>$_smarty_tpl->tpl_vars['errormessage']->value), 0, true);
}
if (!$_smarty_tpl->tpl_vars['registrationDisabled']->value) {?>
	<form class="form-horizontal using-password-strength" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
		<input type="hidden" name="register" value="true" />
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientregistertitle'];?>
</h3>
					</div>
					<div class="panel-body">
						<fieldset>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="firstname"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareafirstname'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="firstname" id="firstname" value="<?php echo $_smarty_tpl->tpl_vars['clientfirstname']->value;?>
" class="form-control" <?php if (!in_array('firstname',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="lastname"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientarealastname'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="lastname" id="lastname" value="<?php echo $_smarty_tpl->tpl_vars['clientlastname']->value;?>
" class="form-control" <?php if (!in_array('lastname',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="companyname"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacompanyname'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="companyname" id="companyname" value="<?php echo $_smarty_tpl->tpl_vars['clientcompanyname']->value;?>
" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="email"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaemail'];?>
</label>
								<div class="col-sm-6">
									<input type="email" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['clientemail']->value;?>
" class="form-control"/>
								</div>
							</div>
							<div id="newPassword1" class="form-group has-feedback">
								<label for="inputNewPassword1" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapassword'];?>
</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="inputNewPassword1" name="password" autocomplete="off" />
									<span class="form-control-feedback glyphicon glyphicon-password"></span>
									<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pwstrength.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
								</div>
							</div>
							<div id="newPassword2" class="form-group has-feedback">
								<label for="inputNewPassword2" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaconfirmpassword'];?>
</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="inputNewPassword2" name="password2" autocomplete="off" />
									<span class="form-control-feedback glyphicon glyphicon-password"></span>
									<div id="inputNewPassword2Msg">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="address1"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress1'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="address1" id="address1" value="<?php echo $_smarty_tpl->tpl_vars['clientaddress1']->value;?>
" class="form-control" <?php if (!in_array('address1',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="address2"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaaddress2'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="address2" id="address2" value="<?php echo $_smarty_tpl->tpl_vars['clientaddress2']->value;?>
" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="city"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacity'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="city" id="city" value="<?php echo $_smarty_tpl->tpl_vars['clientcity']->value;?>
" class="form-control" <?php if (!in_array('city',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="state"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareastate'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="state" id="state" value="<?php echo $_smarty_tpl->tpl_vars['clientstate']->value;?>
" class="form-control" <?php if (!in_array('state',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="postcode"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareapostcode'];?>
</label>
								<div class="col-sm-6">
									<input type="text" name="postcode" id="postcode" value="<?php echo $_smarty_tpl->tpl_vars['clientpostcode']->value;?>
" class="form-control" <?php if (!in_array('postcode',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="country"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareacountry'];?>
</label>
								<div class="col-sm-6">
									<select id="country" name="country" class="form-control">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientcountries']->value, 'countryName', false, 'countryCode');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['countryCode']->value => $_smarty_tpl->tpl_vars['countryName']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['countryCode']->value;?>
"<?php if ((!$_smarty_tpl->tpl_vars['clientcountry']->value && $_smarty_tpl->tpl_vars['countryCode']->value == $_smarty_tpl->tpl_vars['defaultCountry']->value) || ($_smarty_tpl->tpl_vars['countryCode']->value == $_smarty_tpl->tpl_vars['clientcountry']->value)) {?> selected="selected"<?php }?>>
												<?php echo $_smarty_tpl->tpl_vars['countryName']->value;?>

											</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="phonenumber"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareaphonenumber'];?>
</label>
								<div class="col-sm-6">
									<input type="tel" name="phonenumber" id="phonenumber" value="<?php echo $_smarty_tpl->tpl_vars['clientphonenumber']->value;?>
" class="form-control" <?php if (!in_array('phonenumber',$_smarty_tpl->tpl_vars['optionalFields']->value)) {?>required<?php }?> />
								</div>
							</div>
						</fieldset>
						<?php if ($_smarty_tpl->tpl_vars['customfields']->value) {?>
							<hr/>
							<fieldset>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customfields']->value, 'customfield', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['customfield']->value) {
?>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="customfield<?php echo $_smarty_tpl->tpl_vars['customfield']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['customfield']->value['name'];?>
</label>
										<div class="col-sm-6 control">
											<?php echo $_smarty_tpl->tpl_vars['customfield']->value['input'];?>
 <?php echo $_smarty_tpl->tpl_vars['customfield']->value['description'];?>

										</div>
									</div>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</fieldset>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['currencies']->value) {?>
							<hr/>
							<fieldset>
								<div class="form-group">
									<label for="currency" class="col-sm-3 control-label"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['choosecurrency'];?>
</label>
									<div class="col-sm-6">
										<select id="currency" name="currency" class="form-control">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'curr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['curr']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['curr']->value['id'];?>
"<?php if (!$_POST['currency'] && $_smarty_tpl->tpl_vars['curr']->value['default'] || $_POST['currency'] == $_smarty_tpl->tpl_vars['curr']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['curr']->value['code'];?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</select>
									</div>
								</div>
							</fieldset>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['securityquestions']->value) {?>
							<hr />
							<fieldset>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="securityqid"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityquestion'];?>
</label>
									<div class="col-sm-6">
										<select name="securityqid" id="securityqid" class="form-control">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['securityquestions']->value, 'question', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['question']->value) {
?>
												<option value=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="securityqans"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareasecurityanswer'];?>
</label>
									<div class="col-sm-6">
										<input type="password" name="securityqans" id="securityqans" class="form-control" autocomplete="off" />
									</div>
								</div>
							</fieldset>
						<?php }?>
						<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/captcha.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
						<?php if ($_smarty_tpl->tpl_vars['accepttos']->value) {?>
							<hr />
							<div class="form-group">
								<div class="col-md-12">
									<label class="checkbox-inline" class="icheck">
										<input type="checkbox" class="icheck" name="accepttos" class="accepttos" />
										<?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertosagreement'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['tosurl']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordertos'];?>
</a>
									</label>
								</div>
							</div>
						<?php }?>
					</div>
					<div class="panel-footer">
						<input class="btn res-100 btn-3d btn-primary" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientregistertitle'];?>
" />
					</div>
				</div>
			</div>
		</div>
	</form>
<?php }
}
}
