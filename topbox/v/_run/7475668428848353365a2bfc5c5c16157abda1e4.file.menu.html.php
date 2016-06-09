<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:31:29
         compiled from "v/manage/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:12732323045510da914c89b8-06808532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7475668428848353365a2bfc5c5c16157abda1e4' => 
    array (
      0 => 'v/manage/menu.html',
      1 => 1406280598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12732323045510da914c89b8-06808532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menulist' => 0,
    'menu' => 0,
    'menuitem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510da915267a6_96278623',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510da915267a6_96278623')) {function content_5510da915267a6_96278623($_smarty_tpl) {?>

	<div role="complementary" class="bs-docs-sidebar hidden-print hidden-xs hidden-sm">
	<ul class="nav bs-docs-sidenav">
	<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menulist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['menu']->key;
?>            	
		<li>
		  <a href="#overview" style='font-weight:bold;font-size:15px;'><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
:<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</a>
		  <ul class="nav">
			<?php  $_smarty_tpl->tpl_vars['menuitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menuitem']->_loop = false;
 $_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menuitem']->key => $_smarty_tpl->tpl_vars['menuitem']->value) {
$_smarty_tpl->tpl_vars['menuitem']->_loop = true;
 $_smarty_tpl->tpl_vars['k2']->value = $_smarty_tpl->tpl_vars['menuitem']->key;
?>
			<li><a target='<?php echo $_smarty_tpl->tpl_vars['menuitem']->value['target'];?>
' href='<?php echo $_smarty_tpl->tpl_vars['menuitem']->value['url'];?>
'><?php echo $_smarty_tpl->tpl_vars['menuitem']->value['title'];?>
</a></li>
			<?php } ?>
			
		  </ul>
		</li>
	<?php } ?>				
	</ul>
	<a href="#top" class="back-to-top">
	  Back to top
	</a>

	<a class="bs-docs-theme-toggle" href="#">
	  Preview theme
	</a>

	</div>

<?php }} ?>
