<form method="post" action="{$systemurl}dologin.php" role="form">
    <div class="row">	
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{$LANG.login}</h3>
                </div>
                <div class="panel-body">
                    {if $incorrect}
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>{$LANG.loginincorrect}</strong>
                        </div>
                    {elseif $verificationId && empty($transientDataName)}
                        {include file="$template/includes/alert.tpl" type="error" msg=$LANG.verificationKeyExpired textcenter=true}
                    {elseif $ssoredirect}
                        {include file="$template/includes/alert.tpl" type="info" msg=$LANG.sso.redirectafterlogin textcenter=true}
                    {/if}
                    <div class="form-group">
                        <label for="username">{$LANG.loginemail}</label>
                        <input type="email" name="username" id="username" class="form-control" placeholder="{$LANG.loginemail}" />
                    </div>
                    <div class="form-group">
                        <label for="password">{$LANG.loginpassword}</label>
                        <input name="password" id="password" type="password" class="form-control" placeholder="{$LANG.loginpassword}" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <input type="checkbox" name="rememberme"{if $rememberme} checked="checked"{/if} /> 
                            <label>{$LANG.loginrememberme}</label>
                        </div>
                    </div>	
                </div>
                <div class="panel-footer">
                    <input id="login" type="submit" class="btn res-100 btn-3d btn-primary" value="{$LANG.loginbutton}" /> <p class="pull-right res-left" style="margin-top:10px;"><a href="pwreset.php">{$LANG.forgotpw}</a></p>
                </div>
            </div>
        </div>
    </div>
</form>