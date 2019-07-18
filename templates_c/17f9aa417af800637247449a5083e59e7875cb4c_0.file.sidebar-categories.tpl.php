<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:24:28
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/sidebar-categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fa8c4f29b5_42634201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17f9aa417af800637247449a5083e59e7875cb4c' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/sidebar-categories.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d28fa8c4f29b5_42634201 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['totalNoOffProductGroups']->value > 5) {?>
  <?php echo '<script'; ?>
 type="text/javascript">
      jQuery(document).on('ready', function() {
		jQuery("#categoriesBox").slick({
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            autoplay: false,
            autoplaySpeed: 2000,
            variableWidth: false,
			responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                    }
                },
               {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 280,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
          });
    });
  <?php echo '</script'; ?>
>
<?php }?>
<div class="choose-more-product">
    <div class="top">
        <h3><i class="fa fa-list"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['choosemoreproduct'];?>
</h3>
        <div class="pull-right right-links">
            <a href="cart.php?a=add&domain=register"><i class="fa fa-globe"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['newdomain'];?>
</a>
            <a href="cart.php?a=add&domain=transfer"><i class="fa fa-share-square"></i> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['transferinadomain'];?>
</a>  
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" id="categoriesBox">  
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groupCats']->value, 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
            <div class="col-sm-2">
              <a href="cart.php?gid=<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
">
                <div class="more-product-col">
                    <img src="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/caticons/<?php echo $_smarty_tpl->tpl_vars['child']->value->icon;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['child']->value->icon;?>
">
                    <h3><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</h3>                                
                </div>
              </a>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>    
</div>
<div class="clearfix"></div><?php }
}
