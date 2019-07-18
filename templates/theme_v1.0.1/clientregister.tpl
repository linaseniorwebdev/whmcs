{if in_array('state', $optionalFields)}
    <script>
        var stateNotRequired = true;
    </script>
{/if}
<script type="text/javascript" src="{$BASE_PATH_JS}/StatesDropdown.js"></script>
{if $registrationDisabled}
	{include file="$template/includes/alert.tpl" type="error" msg=$LANG.registerCreateAccount|cat:' <strong><a href="cart.php" class="alert-link">'|cat:$LANG.registerCreateAccountOrder|cat:'</a></strong>'}
{/if}
{if $errormessage}
	{include file="$template/includes/alert.tpl" type="error" errorshtml=$errormessage}
{/if}
{if !$registrationDisabled}
	<form class="form-horizontal using-password-strength" method="post" action="{$smarty.server.PHP_SELF}">
		<input type="hidden" name="register" value="true" />
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">{$LANG.clientregistertitle}</h3>
					</div>
					<div class="panel-body">
						<fieldset>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="firstname">{$LANG.clientareafirstname}</label>
								<div class="col-sm-6">
									<input type="text" name="firstname" id="firstname" value="{$clientfirstname}" class="form-control" {if !in_array('firstname', $optionalFields)}required{/if} />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="lastname">{$LANG.clientarealastname}</label>
								<div class="col-sm-6">
									<input type="text" name="lastname" id="lastname" value="{$clientlastname}" class="form-control" {if !in_array('lastname', $optionalFields)}required{/if} />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="companyname">{$LANG.clientareacompanyname}</label>
								<div class="col-sm-6">
									<input type="text" name="companyname" id="companyname" value="{$clientcompanyname}" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="email">{$LANG.clientareaemail}</label>
								<div class="col-sm-6">
									<input type="email" name="email" id="email" value="{$clientemail}" class="form-control"/>
								</div>
							</div>
							<div id="newPassword1" class="form-group has-feedback">
								<label for="inputNewPassword1" class="col-sm-3 control-label">{$LANG.clientareapassword}</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="inputNewPassword1" name="password" autocomplete="off" />
									<span class="form-control-feedback glyphicon glyphicon-password"></span>
									{include file="$template/includes/pwstrength.tpl"}
								</div>
							</div>
							<div id="newPassword2" class="form-group has-feedback">
								<label for="inputNewPassword2" class="col-sm-3 control-label">{$LANG.clientareaconfirmpassword}</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="inputNewPassword2" name="password2" autocomplete="off" />
									<span class="form-control-feedback glyphicon glyphicon-password"></span>
									<div id="inputNewPassword2Msg">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="address1">{$LANG.clientareaaddress1}</label>
								<div class="col-sm-6">
									<input type="text" name="address1" id="address1" value="{$clientaddress1}" class="form-control" {if !in_array('address1', $optionalFields)}required{/if} />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="address2">{$LANG.clientareaaddress2}</label>
								<div class="col-sm-6">
									<input type="text" name="address2" id="address2" value="{$clientaddress2}" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="city">{$LANG.clientareacity}</label>
								<div class="col-sm-6">
									<input type="text" name="city" id="city" value="{$clientcity}" class="form-control" {if !in_array('city', $optionalFields)}required{/if} />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="state">{$LANG.clientareastate}</label>
								<div class="col-sm-6">
									<input type="text" name="state" id="state" value="{$clientstate}" class="form-control" {if !in_array('state', $optionalFields)}required{/if} />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="postcode">{$LANG.clientareapostcode}</label>
								<div class="col-sm-6">
									<input type="text" name="postcode" id="postcode" value="{$clientpostcode}" class="form-control" {if !in_array('postcode', $optionalFields)}required{/if} />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="country">{$LANG.clientareacountry}</label>
								<div class="col-sm-6">
									<select id="country" name="country" class="form-control">
										{foreach $clientcountries as $countryCode => $countryName}
											<option value="{$countryCode}"{if (!$clientcountry && $countryCode eq $defaultCountry) || ($countryCode eq $clientcountry)} selected="selected"{/if}>
												{$countryName}
											</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="phonenumber">{$LANG.clientareaphonenumber}</label>
								<div class="col-sm-6">
									<input type="tel" name="phonenumber" id="phonenumber" value="{$clientphonenumber}" class="form-control" {if !in_array('phonenumber', $optionalFields)}required{/if} />
								</div>
							</div>
						</fieldset>
						{if $customfields}
							<hr/>
							<fieldset>
								{foreach from=$customfields key=num item=customfield}
									<div class="form-group">
										<label class="col-sm-3 control-label" for="customfield{$customfield.id}">{$customfield.name}</label>
										<div class="col-sm-6 control">
											{$customfield.input} {$customfield.description}
										</div>
									</div>
								{/foreach}
							</fieldset>
						{/if}
						{if $currencies}
							<hr/>
							<fieldset>
								<div class="form-group">
									<label for="currency" class="col-sm-3 control-label">{$LANG.choosecurrency}</label>
									<div class="col-sm-6">
										<select id="currency" name="currency" class="form-control">
											{foreach from=$currencies item=curr}
												<option value="{$curr.id}"{if !$smarty.post.currency && $curr.default || $smarty.post.currency eq $curr.id } selected{/if}>{$curr.code}</option>
											{/foreach}
										</select>
									</div>
								</div>
							</fieldset>
						{/if}
						{if $securityquestions}
							<hr />
							<fieldset>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="securityqid">{$LANG.clientareasecurityquestion}</label>
									<div class="col-sm-6">
										<select name="securityqid" id="securityqid" class="form-control">
											{foreach key=num item=question from=$securityquestions}
												<option value={$question.id}>{$question.question}</option>
											{/foreach}
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="securityqans">{$LANG.clientareasecurityanswer}</label>
									<div class="col-sm-6">
										<input type="password" name="securityqans" id="securityqans" class="form-control" autocomplete="off" />
									</div>
								</div>
							</fieldset>
						{/if}
						{include file="$template/includes/captcha.tpl"}
						{if $accepttos}
							<hr />
							<div class="form-group">
								<div class="col-md-12">
									<label class="checkbox-inline" class="icheck">
										<input type="checkbox" class="icheck" name="accepttos" class="accepttos" />
										{$LANG.ordertosagreement} <a href="{$tosurl}" target="_blank">{$LANG.ordertos}</a>
									</label>
								</div>
							</div>
						{/if}
					</div>
					<div class="panel-footer">
						<input class="btn res-100 btn-3d btn-primary" type="submit" value="{$LANG.clientregistertitle}" />
					</div>
				</div>
			</div>
		</div>
	</form>
{/if}