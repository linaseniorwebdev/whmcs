<?php
/* Smarty version 3.1.33-p1, created on 2019-07-12 23:26:31
  from '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d28fb07b5a121_29910051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef7621272c2381eb187b3120db99f22c1230f9ae' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/orderforms/hostx/products.tpl',
      1 => 1562187325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/common.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories.tpl' => 1,
    'file:orderforms/".((string)$_smarty_tpl->tpl_vars[\'carttpl\']->value)."/sidebar-categories-collapsed.tpl' => 1,
  ),
),false)) {
function content_5d28fb07b5a121_29910051 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
$_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/common.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<div id="order-standard_cart">

    <div class="row">
        <div class="col-md-12">
            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div> 
        <div class="col-md-12">
            <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
                <div class="alert alert-danger">
                    <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

                </div>
            <?php }?>
        </div>       
        <div class="col-md-12">

            <?php $_smarty_tpl->_subTemplateRender("file:orderforms/".((string)$_smarty_tpl->tpl_vars['carttpl']->value)."/sidebar-categories-collapsed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hookAboveProductsOutput']->value, 'output');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['output']->value) {
?>
                <div>
                    <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              <div class="pricing_section">    
                    <div class="tab-content">
                      <div class="tab-pane active" id="pricing">      
                          <div class="price_group">
                            <div id="productList">            
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['product']->value) {
?>
									<?php $_smarty_tpl->_assignInScope('pidsid', $_smarty_tpl->tpl_vars['product']->value['pid']);?>
                                    <div class="price_sect">            
                                      <h2><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h2>
                                      <p><?php echo $_smarty_tpl->tpl_vars['customDescripti']->value[$_smarty_tpl->tpl_vars['pidsid']->value]['pHeadSortDesc'];?>
</p>
                                      <h1>
                                        <?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>
                                            <p><?php echo $_smarty_tpl->tpl_vars['LANG']->value['bundledeal'];?>
</p>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['displayprice']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value['displayprice'];?>

                                            <?php }?>
                                        <?php } else { ?>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['hasconfigoptions']) {?>
                                               <p> <?php echo $_smarty_tpl->tpl_vars['LANG']->value['startingfrom'];?>
 </p>
                                            <?php }?>
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['price'];?>

                                            <br />
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "monthly") {?>
                                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermmonthly'];?>
</span>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "quarterly") {?>
                                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermquarterly'];?>
</span>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "semiannually") {?>
                                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermsemiannually'];?>
</span>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "annually") {?>
                                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermannually'];?>
</span>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "biennially") {?>
                                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermbiennially'];?>
</span>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['cycle'] == "triennially") {?>
                                                <span class="price"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['orderpaymenttermtriennially'];?>
</span>
                                            <?php }?>
                                            <br>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['setupFee']) {?>
                                                <small><?php echo $_smarty_tpl->tpl_vars['product']->value['pricing']['minprice']['setupFee']->toPrefixed();?>
 <?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordersetupfee'];?>
</small>
                                            <?php }?>
                                        <?php }?>                                        
                                      </h1>
                                      <?php if ($_smarty_tpl->tpl_vars['product']->value['featuresdesc']) {?>                              
                                            <?php echo $_smarty_tpl->tpl_vars['product']->value['featuresdesc'];?>

									  <?php } else { ?>
											<?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                                      <?php }?>
                                      <div class="bottom_sect">
                                        <h4><?php echo $_smarty_tpl->tpl_vars['customDescripti']->value[$_smarty_tpl->tpl_vars['pidsid']->value]['pFootCaption'];?>
</h4>
                                        <p><?php echo $_smarty_tpl->tpl_vars['customDescripti']->value[$_smarty_tpl->tpl_vars['pidsid']->value]['pFootSortDesc'];?>
</p>
                                        <a href="cart.php?a=add&<?php if ($_smarty_tpl->tpl_vars['product']->value['bid']) {?>bid=<?php echo $_smarty_tpl->tpl_vars['product']->value['bid'];
} else { ?>pid=<?php echo $_smarty_tpl->tpl_vars['product']->value['pid'];
}?>" class="button03"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['ordernowbutton'];?>
</a>
                                      </div>
                                    </div>              
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>    

                          </div>
                      </div>
                    </div>                  
            </div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hookBelowProductsOutput']->value, 'output');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['output']->value) {
?>
                <div>
                    <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </div>
    </div>
</div>
<?php }
}
