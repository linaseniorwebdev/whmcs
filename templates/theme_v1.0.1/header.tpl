<!DOCTYPE html>
 <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta charset="utf-8">
    
    <title>{if $kbarticle.title}{$kbarticle.title} - {/if}{$companyname} - {$pagetitle}  </title>
{include file="$template/includes/head.tpl"}

    {$headoutput}

</head>
<body>

{if $templatefile == 'error'}

{else}
<div class="col-xs-12">
<div class="col-xs-6 pull-right text-right">
<div id="wrapper">
  <div id="sidebar-wrapper">
            <ul class="sidebar-nav text-uppercase">
 		  {include file="$template/includes/navbar.tpl" navbar=$primaryNavbar}
					{include file="$template/includes/navbar.tpl" navbar=$secondaryNavbar}
                
            </ul>
        </div>   
        <a href="#menu-toggle" class="btn btn-default sidebar_btn" id="menu-toggle"><img src="{$WEB_ROOT}/templates/{$template}/assets/images/Button.jpg" alt="" /></a>
        </div>
 </div>
 </div>
 
<div class="top_navcon LightGrey_bg">
  <section class="container">
    <div class="row">
      <div class="top_nav col-xs-12 no_padding bold_font">
        <ul class="list1 pull-left text-uppercase">

            {if $languagechangeenabled && count($locales) > 1}
                <li>
                    <a href="#" class="choose-language" data-toggle="popover" id="languageChooser">
                        {$activeLocale.localisedName}
                        <b class="caret"></b>
                    </a>
                    <div id="languageChooserContent" class="hidden">
                        <ul>
                            {foreach $locales as $locale}
                                <li>
                                    <a href="{$currentpagelinkback}language={$locale.language}">{$locale.localisedName}</a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </li>
            {/if}
            {if $loggedin}
                <li>
                    <a href="#" data-toggle="popover" id="accountNotifications" data-placement="bottom">
                        {$LANG.notifications}
                        {if count($clientAlerts) > 0}<span class="label label-info">NEW</span>{/if}
                        <b class="caret"></b>
                    </a>
                    <div id="accountNotificationsContent" class="hidden">
                        <ul class="client-alerts">
                        {foreach $clientAlerts as $alert}
                            <li>
                                <a href="{$alert->getLink()}">
                                    <i class="fa fa-fw fa-{if $alert->getSeverity() == 'danger'}exclamation-circle{elseif $alert->getSeverity() == 'warning'}warning{elseif $alert->getSeverity() == 'info'}info-circle{else}check-circle{/if}"></i>
                                    <div class="message">{$alert->getMessage()}</div>
                                </a>
                            </li>
                        {foreachelse}
                            <li class="none">
                                {$LANG.notificationsnone}
                            </li>
                        {/foreach}
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{$WEB_ROOT}/logout.php">
                        {$LANG.clientareanavlogout}
                    </a>
                </li>
            {else}
                <li>
                    <a href="{$WEB_ROOT}/clientarea.php">{$LANG.login}</a>
                </li>
                {if $condlinks.allowClientRegistration}
                    <li>
                        <a href="{$WEB_ROOT}/register.php">{$LANG.register}</a>
                    </li>
                {/if}
                <li>
                    <a href="{$WEB_ROOT}/cart.php?a=view">
                        {$LANG.viewcart}
                    </a>
                </li>
            {/if}
            
        </ul>
        
<ul class="list1 list2 pull-right text-uppercase">
{include file="$template/includes/navbar.tpl" navbar=$secondaryNavbar}
</ul>
<!--top_nav--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <!--top_nav--> 
</div>

<header class="header col-xs-12">
  <section class="container">
    <div class="row">
      <div class="logo pull-left"><a href="{$WEB_ROOT}/index.php"><img src="{$WEB_ROOT}/templates/{$template}/assets/images/logo.png" alt="TRIPLEHOST" /></a></div>
      <nav class="navbar navbar-default main-navigation pull-right">
        <div class="container-fluid">
          <div class="row">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="collapse navbar-collapse no_padding" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav bold_font">
                <li ><a href="{$WEB_ROOT}/shared-hosting.php">{$LANG.menu_webhosting}</a> </li>
                
                <li><a href="{$WEB_ROOT}/reseller-hosting.php">{$LANG.menu_Reseller}</a></li>
                <li><a href="{$WEB_ROOT}/vps-hosting.php">{$LANG.menu_vpshosting}</a></li>
                <li><a href="{$WEB_ROOT}/dedicated-hosting.php">{$LANG.menu_servers}</a></li>
				<li><a href="{$WEB_ROOT}/dedicated-hosting.php">{$LANG.menu_wordpress}</a></li>
                              <li> 
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Pages <b class="caret"> </b></a>

<ul class="dropdown-menu nav_eoptn"> 
<li><a href="{$WEB_ROOT}/price.php">Prices </a> </li>
<li><a href="{$WEB_ROOT}/team.php">Our Team</a> </li>
<li><a href="{$WEB_ROOT}/faqs.php"> FaQs</a> </li>
<li><a href="{$WEB_ROOT}/error.php">404  </a> </li>
</ul>
</li>

              </ul>
              
              <ul class="nav navbar-nav bold_font mobile_menu">
              {include file="$template/includes/navbar.tpl" navbar=$primaryNavbar}
					
              
                <li ><a href="{$WEB_ROOT}/shared-hosting.php">WebHosting </a> </li>
                                              <li> 
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Pages <b class="caret"> </b></a>

<ul class="dropdown-menu nav_eoptn"> 
<li><a href="{$WEB_ROOT}/price.php">Prices </a> </li>
<li><a href="{$WEB_ROOT}/team.php">Our Team</a> </li>
<li><a href="{$WEB_ROOT}/faqs.php"> FaQs</a> </li>
<li><a href="{$WEB_ROOT}/error.php">404  </a> </li>
<li ><a href="{$WEB_ROOT}/shared-hosting.php">WebHosting </a> </li>
  <li><a href="{$WEB_ROOT}/reseller-hosting.php">ResellerHosting</a></li>
     <li><a href="{$WEB_ROOT}/vps-hosting.php">VPS HOSTING</a></li>
     <li><a href="{$WEB_ROOT}/dedicated-hosting.php">DEDICATED SERVER</a></li>
                


</ul>
</li>

              </ul>
              <!--collapse--> 
            </div>
            <!--row--> 
          </div>
          <!--container-fluid--> 
        </div>
        <!--nav--> 
      </nav>
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <!--header--> 
</header>
{/if}


{if $templatefile == 'homepage'}
    <div class="bannercon col-xs-12 no_padding animatedParent" >
  <section class="container">
    <div class="row">
      <div class="banner col-xs-12 no_padding">
        <div class="banner_padding col-xs-12">
          <div class="banner_text col-lg-7 col-md-7 col-sm-12 col-xs-12 no_padding slowest animated slideInLeft">
            <h1 class="heading1 bold_font ">{$LANG.banner1_title}</h1>
            <h2 class="heading2 black_text">{$LANG.banner1_titlesub1}<span class="bold_font"> {$LANG.banner1_titlesub2}</span></h2>
            <ul class="pull-left">
              <li>{$LANG.banner1_text1} <span class="bold_font"><a class="white_text" href="#">{$LANG.banner1_text2}</a></span> {$LANG.banner1_text3}</li>
              <li><span class="bold_font"><a class="white_text" href="#">{$LANG.banner1_text4} </a></span> {$LANG.banner1_text5}</li>
              <li>{$LANG.banner1_text6} <span class="bold_font"><a class="white_text" href="#">{$LANG.banner1_text7}</a></span> {$LANG.banner1_text8}</li>
              <li>{$LANG.banner1_text9} <span class="bold_font"><a class="white_text" href="#">{$LANG.banner1_text10} </a></span>{$LANG.banner1_text11}</li>

            </ul>
            <div class="pricebox pull-left">
              <div class="limitedbox yellow_bg bold_font">{$LANG.banner1_text12}</div>
              <div class="clearfix"></div>
              <div class="banner_price text-uppercase"><span class=" text-lowercase">{$LANG.banner1_text13}</span> <span class="yellow_text bold_font dollar">{$LANG.banner1_text14}</span> {$LANG.banner1_text15} 
                <!--banner_price--> 
              </div>
              <!--pricebox--> 
            </div>
            <div class="clearfix"></div>
           <div class="bannner_buttns">
            <div class="transparent_btn btn1"><a class="green_bg" href="cart.php?">{$LANG.button_5}</a></div>
            <div class="transparent_btn btn2"><a href="shared-hosting.php">{$LANG.button_6}</a></div>
            </div>
            <div class="clearfix"></div>
            <p>{$LANG.banner1_text16}</p>
            <!--v_align--> 
          </div>
        </div>
        <!--banner_text--> 
      </div>
      
      <!--row--> 
    </div>
    <!--container--> 
  </section>
  <!--bannercon--> 
</div>
    {else}
     {include file="$template/includes/pageheader.tpl" title=$displayTitle desc=$tagline showbreadcrumb=true}
    
{/if}

{include file="$template/includes/verifyemail.tpl"}

{if $templatefile == 'homepage' || $filename eq 'privacy-policy' || $filename eq 'tos' || $filename eq 'reseller-hosting' || $filename eq 'shared-hosting' || $filename eq 'dedicated-hosting' || $filename eq 'vps-hosting' || $filename eq 'price' || $filename eq 'team' || $filename eq 'error' || $filename eq 'faqs'}
{else}
<section id="main-body">
    <div class="container{if $skipMainBodyContainer}-fluid without-padding{/if}">
        <div class="row">
<div class="col-xs-12 hosting_paddingbox">
        {if !$inShoppingCart && ($primarySidebar->hasChildren() || $secondarySidebar->hasChildren())}
            
            <div class="col-md-3 pull-md-left sidebar">
                {include file="$template/includes/sidebar.tpl" sidebar=$primarySidebar}
            </div>
        {/if}
        <!-- Container for main page display content -->
        <div class="{if !$inShoppingCart && ($primarySidebar->hasChildren() || $secondarySidebar->hasChildren())}col-md-9 pull-md-right{else}col-xs-12{/if} main-content">
  {/if} 