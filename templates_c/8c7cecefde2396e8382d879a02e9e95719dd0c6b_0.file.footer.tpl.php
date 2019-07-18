<?php
/* Smarty version 3.1.33-p1, created on 2019-07-09 18:24:24
  from '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d24bfb8c912b5_43191268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c7cecefde2396e8382d879a02e9e95719dd0c6b' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/theme_v1.0.1/footer.tpl',
      1 => 1562091557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d24bfb8c912b5_43191268 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?>
                </div><!-- /.main-content -->
                <?php if (!$_smarty_tpl->tpl_vars['inShoppingCart']->value && $_smarty_tpl->tpl_vars['secondarySidebar']->value->hasChildren()) {?>
                    <div class="col-md-3 pull-md-left sidebar">
                        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('sidebar'=>$_smarty_tpl->tpl_vars['secondarySidebar']->value), 0, true);
?>
                    </div>
                <?php }?>
            </div>
                            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php if ($_smarty_tpl->tpl_vars['templatefile']->value == 'error') {
} else { ?>
<footer class="footercon col-xs-12 no_padding " >
  <div class="footerbox col-xs-12  white_text no_padding">
    <section class="container">
      <div class="row">
        <div class="col-xs-12 no_padding footer_port no_padding">
          <div class="col-xs-3 no_padding-left logo_feature">
            <div class="sitemap col-xs-12 no_padding">
              <div class="footer_logo"> <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/images/footer-logo.png"> </div>
              <p> Copyright © 2010-2017</p>
             
              
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-2">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="regular_font white_text">Our Services</h5>
              <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/shared-hosting.php">Web Hosting</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/reseller-hosting.php">Reseller Hosting</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/vps-hosting.php">VPS Hosting</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/dedicated-hosting.php">Dedicated Server</a></li>
              </ul>
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-2">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="regular_font white_text">Support Resources</h5>
              <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/knowledgebase.php">Knowledgebase</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/supporttickets.php">Support Tickets</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/submitticket.php">Submit Ticket</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/serverstatus.php">Server Status</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/announcements.php">Announcementst</a></li>

                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/contact.php">Contact Us</a></li>
              </ul>
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-2">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="regular_font white_text">Legal</h5>
              <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/tos.php">Terms of Service</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/privacy-policy.php">Privacy Policy</a></li>
                </ul>
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-3 no_padding-right">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="white_text">Tweets </h5>
              <h6> Designingmedia.com
                @designinmedia</h6>
              <p>It's August 31st and we would like to wish everyone a very Happy Independence Day! </p>
              <span class="yellow_text"> #ProudMalaysian <br>
              #HariKebangsaan #gbnetwork</span> </div>
          </div>
        </div>
        
        <!--row--> 
      </div>
      
      <!--container--> 
    </section>
  </div>
  <div class="copy_rights_bg col-xs-12 no_padding">
    <div class="container">
      <div class="row">
        <div class="credit_cards pull-left">
          <ul>
            <li>We Accept </li>
            <li>
              <figure> <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/images/credit_cards.png"></figure>
            </li>
          </ul>
        </div>
        <div class="socail_media pull-right">
          <ul>
            <li> Get Social With Us</li>
            <li> <a href="https://www.facebook.com/akdesignerdotcom"> <i class="fa fa-facebook" aria-hidden="true"></i> </a> </li>
            <li> <a href="https://twitter.com/akdesigner"> <i class="fa fa-twitter" aria-hidden="true"></i> </a> </li>
            
            <li> <a href="https://plus.google.com/+Akdesigner"> <i class="fa fa-google-plus" aria-hidden="true"></i> </a> </li>
          </ul>
        </div>
        
        <!--row--> 
      </div>
      <!--container--> 
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="trade_marked col-xs-12 text-center">
        <h5>*Prices reflect discount on first term </h5>
        <p class="white_text"> All brand names are trademarks of their respective owners. All prices, plans, and options listed are what has been publicly disclosed as of 08/10/2016</p>
        <span class="yellow_text"> Prices and features are subject to change without notice.</span> 
        
        <!--trade_marked--> 
      </div>
      
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <!--footerbox-->
  </div>
  <!--footercon--> 
</footer>
<?php }?>

<div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body panel-body">
                Loading...
            </div>
            <div class="modal-footer panel-footer">
                <div class="pull-left loader">
                    <i class="fa fa-circle-o-notch fa-spin"></i> Loading...
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary modal-submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>



<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/smoove.js" type="text/javascript"><?php echo '</script'; ?>
> 



<?php echo '<script'; ?>
>
$(document).ready(function(e) {
    $('.main-val').click(function() {
        if($(this).find('input[type=radio]').val()=='windows'&&$(this).find('input[type=radio]').prop('checked')==true){
			$('.sub-val').hide();
			$('#plsk').show();	
		}
		else if($(this).find('input[type=radio]').val()=='centos'&&$(this).find('input[type=radio]').prop('checked')==true){
			$('.sub-val').hide();
			$('#no-cp').show();	
			$('#cp').show();
		}
		else{
			$('.sub-val').hide();
		}
		
    });
	
$(window).resize("resize",function(){  
    animation($(this).width());
});
animation($(window).width());
function animation(width){
     if(width>768) {
        $('.block').smoove({offset:'15%'});
     }
}
	$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
}); 
<?php echo '</script'; ?>
>



	

   


<?php echo $_smarty_tpl->tpl_vars['footeroutput']->value;?>


</body>
</html>
<?php }
}
