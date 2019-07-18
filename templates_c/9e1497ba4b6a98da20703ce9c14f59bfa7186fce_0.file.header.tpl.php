<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 18:38:39
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24c30f95b683_12741778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e1497ba4b6a98da20703ce9c14f59bfa7186fce' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/header.tpl',
      1 => 1562690312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24c30f95b683_12741778 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><!DOCTYPE html>
 <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta charset="utf-8">
    
    <title><?php if ($_smarty_tpl->tpl_vars['kbarticle']->value['title']) {
echo $_smarty_tpl->tpl_vars['kbarticle']->value['title'];?>
 - <?php }
echo $_smarty_tpl->tpl_vars['companyname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
  </title>
<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php echo $_smarty_tpl->tpl_vars['headoutput']->value;?>


</head>
<body>

<?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'error') {?>

<?php } else { ?>
<div class="col-xs-12">
<div class="col-xs-6 pull-right text-right">
<div id="wrapper">
  <div id="sidebar-wrapper">
            <ul class="sidebar-nav text-uppercase">
 		  <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['primaryNavbar']->value), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['secondaryNavbar']->value), 0, true);
?>
                
            </ul>
        </div>   
        <a href="#menu-toggle" class="btn btn-default sidebar_btn" id="menu-toggle"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/images/Button.jpg" alt="" /></a>
        </div>
 </div>
 </div>
 
<div class="top_navcon LightGrey_bg">
  <section class="container">
    <div class="row">
      <div class="top_nav col-xs-12 no_padding bold_font">
        <ul class="list1 pull-left text-uppercase">

            <?php if ($_smarty_tpl->tpl_vars['languagechangeenabled']->value && count($_smarty_tpl->tpl_vars['locales']->value) > 1) {?>
                <li>
                    <a href="#" class="choose-language" data-toggle="popover" id="languageChooser">
                        <?php echo $_smarty_tpl->tpl_vars['activeLocale']->value['localisedName'];?>

                        <b class="caret"></b>
                    </a>
                    <div id="languageChooserContent" class="hidden">
                        <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['locales']->value, 'locale');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['locale']->value) {
?>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['currentpagelinkback']->value;?>
language=<?php echo $_smarty_tpl->tpl_vars['locale']->value['language'];?>
"><?php echo $_smarty_tpl->tpl_vars['locale']->value['localisedName'];?>
</a>
                                </li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {?>
                <li>
                    <a href="#" data-toggle="popover" id="accountNotifications" data-placement="bottom">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['notifications'];?>

                        <?php if (count($_smarty_tpl->tpl_vars['clientAlerts']->value) > 0) {?><span class="label label-info">NEW</span><?php }?>
                        <b class="caret"></b>
                    </a>
                    <div id="accountNotificationsContent" class="hidden">
                        <ul class="client-alerts">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientAlerts']->value, 'alert');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['alert']->value) {
?>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['alert']->value->getLink();?>
">
                                    <i class="fa fa-fw fa-<?php if ($_smarty_tpl->tpl_vars['alert']->value->getSeverity() == 'danger') {?>exclamation-circle<?php } elseif ($_smarty_tpl->tpl_vars['alert']->value->getSeverity() == 'warning') {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['alert']->value->getSeverity() == 'info') {?>info-circle<?php } else { ?>check-circle<?php }?>"></i>
                                    <div class="message"><?php echo $_smarty_tpl->tpl_vars['alert']->value->getMessage();?>
</div>
                                </a>
                            </li>
                        <?php
}
} else {
?>
                            <li class="none">
                                <?php echo $_smarty_tpl->tpl_vars['LANG']->value['notificationsnone'];?>

                            </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/logout.php">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['clientareanavlogout'];?>

                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/clientarea.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['login'];?>
</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['condlinks']->value['allowClientRegistration']) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/register.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['register'];?>
</a>
                    </li>
                <?php }?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/cart.php?a=view">
                        <?php echo $_smarty_tpl->tpl_vars['LANG']->value['viewcart'];?>

                    </a>
                </li>
            <?php }?>
            
        </ul>
        
<ul class="list1 list2 pull-right text-uppercase">
<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['secondaryNavbar']->value), 0, true);
?>
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
      <div class="logo pull-left"><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/images/logo.png" alt="TRIPLEHOST" /></a></div>
      <nav class="navbar navbar-default main-navigation pull-right">
        <div class="container-fluid">
          <div class="row">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="collapse navbar-collapse no_padding" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav bold_font">
                <li ><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/shared-hosting.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_webhosting'];?>
</a> </li>
                
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/reseller-hosting.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_Reseller'];?>
</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/vps-hosting.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_vpshosting'];?>
</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/dedicated-hosting.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_servers'];?>
</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/dedicated-hosting.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['menu_wordpress'];?>
</a></li>
                              <li> 
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Pages <b class="caret"> </b></a>

<ul class="dropdown-menu nav_eoptn"> 
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/price.php">Prices </a> </li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/team.php">Our Team</a> </li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/faqs.php"> FaQs</a> </li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/error.php">404  </a> </li>
</ul>
</li>

              </ul>
              
              <ul class="nav navbar-nav bold_font mobile_menu">
              <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('navbar'=>$_smarty_tpl->tpl_vars['primaryNavbar']->value), 0, true);
?>
					
              
                <li ><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/shared-hosting.php">WebHosting </a> </li>
                                              <li> 
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Pages <b class="caret"> </b></a>

<ul class="dropdown-menu nav_eoptn"> 
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/price.php">Prices </a> </li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/team.php">Our Team</a> </li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/faqs.php"> FaQs</a> </li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/error.php">404  </a> </li>
<li ><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/shared-hosting.php">WebHosting </a> </li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/reseller-hosting.php">ResellerHosting</a></li>
     <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/vps-hosting.php">VPS HOSTING</a></li>
     <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/dedicated-hosting.php">DEDICATED SERVER</a></li>
                


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
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'homepage') {?>
    <div class="bannercon col-xs-12 no_padding animatedParent" >
  <section class="container">
    <div class="row">
      <div class="banner col-xs-12 no_padding">
        <div class="banner_padding col-xs-12">
          <div class="banner_text col-lg-7 col-md-7 col-sm-12 col-xs-12 no_padding slowest animated slideInLeft">
            <h1 class="heading1 bold_font "><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_title'];?>
</h1>
            <h2 class="heading2 black_text"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_titlesub1'];?>
<span class="bold_font"> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_titlesub2'];?>
</span></h2>
            <ul class="pull-left">
              <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text1'];?>
 <span class="bold_font"><a class="white_text" href="#"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text2'];?>
</a></span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text3'];?>
</li>
              <li><span class="bold_font"><a class="white_text" href="#"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text4'];?>
 </a></span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text5'];?>
</li>
              <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text6'];?>
 <span class="bold_font"><a class="white_text" href="#"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text7'];?>
</a></span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text8'];?>
</li>
              <li><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text9'];?>
 <span class="bold_font"><a class="white_text" href="#"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text10'];?>
 </a></span><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text11'];?>
</li>

            </ul>
            <div class="pricebox pull-left">
              <div class="limitedbox yellow_bg bold_font"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text12'];?>
</div>
              <div class="clearfix"></div>
              <div class="banner_price text-uppercase"><span class=" text-lowercase"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text13'];?>
</span> <span class="yellow_text bold_font dollar"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text14'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text15'];?>
 
                <!--banner_price--> 
              </div>
              <!--pricebox--> 
            </div>
            <div class="clearfix"></div>
           <div class="bannner_buttns">
            <div class="transparent_btn btn1"><a class="green_bg" href="cart.php?"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['button_5'];?>
</a></div>
            <div class="transparent_btn btn2"><a href="shared-hosting.php"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['button_6'];?>
</a></div>
            </div>
            <div class="clearfix"></div>
            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['banner1_text16'];?>
</p>
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
    <?php } else { ?>
     <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/pageheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['displayTitle']->value,'desc'=>$_smarty_tpl->tpl_vars['tagline']->value,'showbreadcrumb'=>true), 0, true);
?>
    
<?php }?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/verifyemail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'homepage' || $_smarty_tpl->tpl_vars['filename']->value == 'privacy-policy' || $_smarty_tpl->tpl_vars['filename']->value == 'tos' || $_smarty_tpl->tpl_vars['filename']->value == 'reseller-hosting' || $_smarty_tpl->tpl_vars['filename']->value == 'shared-hosting' || $_smarty_tpl->tpl_vars['filename']->value == 'dedicated-hosting' || $_smarty_tpl->tpl_vars['filename']->value == 'vps-hosting' || $_smarty_tpl->tpl_vars['filename']->value == 'price' || $_smarty_tpl->tpl_vars['filename']->value == 'team' || $_smarty_tpl->tpl_vars['filename']->value == 'error' || $_smarty_tpl->tpl_vars['filename']->value == 'faqs') {
} else { ?>
<section id="main-body">
    <div class="container<?php if ($_smarty_tpl->tpl_vars['skipMainBodyContainer']->value) {?>-fluid without-padding<?php }?>">
        <div class="row">
<div class="col-xs-12 hosting_paddingbox">
        <?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && ($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren() || $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren())) {?>
            
            <div class="col-md-3 pull-md-left sidebar">
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sidebar'=>$_smarty_tpl->tpl_vars['primarySidebar']->value), 0, true);
?>
            </div>
        <?php }?>
        <!-- Container for main page display content -->
        <div class="<?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && ($_smarty_tpl->tpl_vars['primarySidebar']->value->hasChildren() || $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren())) {?>col-md-9 pull-md-right<?php } else { ?>col-xs-12<?php }?> main-content">
  <?php }?> <?php }
}
