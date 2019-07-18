{if $successful}
	{include file="$template/includes/alert.tpl" type="success" msg=$LANG.changessavedsuccessfully textcenter=true}
{/if}
{if $errormessage}
	{include file="$template/includes/alert.tpl" type="error" errorshtml=$errormessage}
{/if}
<form class="form-horizontal using-password-strength" method="post" action="{$smarty.server.PHP_SELF}?action=changepw">
	<input type="hidden" name="submit" value="true" />
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{$LANG.clientareanavchangepw}</h3>
				</div>
				<div class="panel-body">
                    <div class="form-group">
                        <label for="inputExistingPassword" class="col-sm-3 control-label">{$LANG.existingpassword}</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="existingpw" id="inputExistingPassword" autocomplete="off" />
                        </div>
                    </div>
                    <div id="newPassword1" class="form-group has-feedback">
                        <label for="inputNewPassword1" class="col-sm-3 control-label">{$LANG.newpassword}</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="newpw" id="inputNewPassword1" autocomplete="off" />
                            <span class="form-control-feedback glyphicon"></span>
                            {include file="$template/includes/pwstrength.tpl"}
                        </div>
                    </div>
                    <div id="newPassword2" class="form-group has-feedback">
                        <label for="inputNewPassword2" class="col-sm-3 control-label">{$LANG.confirmnewpassword}</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="confirmpw" id="inputNewPassword2" autocomplete="off" />
                            <span class="form-control-feedback glyphicon"></span>
                            <div id="inputNewPassword2Msg"></div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="panel-footer">
				<input class="res-100 btn-3d btn btn-primary" type="submit" name="submit" value="{$LANG.clientareasavechanges}" />
				<input class="res-left res-100 btn btn-default pull-right" type="reset" value="{$LANG.cancel}" />
			</div>
		</div>
	</div>
</form>