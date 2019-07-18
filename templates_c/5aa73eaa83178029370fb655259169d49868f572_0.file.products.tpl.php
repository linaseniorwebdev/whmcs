<?php
/* Smarty version 3.1.33-p1, created on 2019-07-05 17:53:56
  from '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d1f7294ac1611_80403279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5aa73eaa83178029370fb655259169d49868f572' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/AKD/products.tpl',
      1 => 1562091563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/category-chooser.tpl' => 1,
  ),
),false)) {
function content_5d1f7294ac1611_80403279 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
echo '<script'; ?>
 type="text/javascript" src="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="templates/orderforms/<?php echo $_smarty_tpl->tpl_vars['carttpl']->value;?>
/style.css" />
    <div id="order-modern"  class="mainbox dedicated_planbox">
      <h2 class="black_text  text-center margin-botom30"><?php echo $_smarty_tpl->tpl_vars['groupname']->value;?>
</h2>
        <?php $_smarty_tpl->_subTemplateRender("file:templates/orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/category-chooser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        
       <div class="plans_box cartplans">
          <?php $_smarty_tpl->_assignInScope('turns', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
              <div class="dedicated_plan1 HW_cart" id="product<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
"  onclick="window.location='cart.php?a=add&<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>'">
            <div class="heading_textbox">
    <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];
if ($_smarty_tpl->tpl_vars['product']->value['qty']) {?><small>(<?php echo $_smarty_tpl->tpl_vars['product']->value['qty'];?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderavailable'];?>
)</small><?php }?></h3>
    
    <!--headingbox-->
    </div>
    
    <div class="dedicated_price yellow_text">
    
    
    <?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>
                
                
                
                
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>

                  <?php if ($_smarty_tpl->tpl_vars['product']->value['displayprice']) {
echo $_smarty_tpl->tpl_vars['product']->value['displayprice'];
}?>
                  <?php } else {
echo substr($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['price'],0,-3);?>
<span>/<?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "monthly") {?>
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "quarterly") {?>
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "semiannually") {?>
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "annually") {?>
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "biennially") {?>
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>

                  <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "triennially") {?>
                  <?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>

                  <?php }?> </span> <?php }?> </div>
                <div class="plan_inner">
                 <?php echo $_smarty_tpl->tpl_vars['product']->value['featuresdesc'];?>
 
                   <?php if ($_smarty_tpl->tpl_vars['product']->value['features']) {?>
                <ul class="list-inline">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value['features'], 'value', false, 'feature');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                <li><span class="fa fa-check-circle-o"></span> <?php echo $_smarty_tpl->tpl_vars['feature']->value;?>
 <span class="orange"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</span> </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </ul>
              <?php }?>
   <div class="product_order btn1"><a href="cart.php?a=add&<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>" role="button"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>
</a> </div>
<!--plan_inner-->
</div>
<!--dedicated_plan1-->
</div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
          <!--planbox--> 
        </div>
        </div>
<?php }
}
