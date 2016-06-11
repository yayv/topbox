<?php /* Smarty version 3.1.27, created on 2016-06-11 10:13:52
         compiled from "v\default\menu.html" */ ?>
<?php
/*%%SmartyHeaderCode:8826575be460cf10f4_74352837%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c1676ebe8bdfa917d3c93260f9a64c83774aac9' => 
    array (
      0 => 'v\\default\\menu.html',
      1 => 1289441258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8826575be460cf10f4_74352837',
  'variables' => 
  array (
    'menulist' => 0,
    'menu' => 0,
    'menuitem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575be460d663f3_85876471',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575be460d663f3_85876471')) {
function content_575be460d663f3_85876471 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8826575be460cf10f4_74352837';
$_from = $_smarty_tpl->tpl_vars['menulist']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menu']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars['menu'];
?>
<div class="step-off">
	<?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
:<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
<br/>
	<?php
$_from = $_smarty_tpl->tpl_vars['menu']->value['list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menuitem'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menuitem']->_loop = false;
$_smarty_tpl->tpl_vars['k2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k2']->value => $_smarty_tpl->tpl_vars['menuitem']->value) {
$_smarty_tpl->tpl_vars['menuitem']->_loop = true;
$foreach_menuitem_Sav = $_smarty_tpl->tpl_vars['menuitem'];
?>
	<a target='<?php echo $_smarty_tpl->tpl_vars['menuitem']->value['target'];?>
' href='<?php echo $_smarty_tpl->tpl_vars['menuitem']->value['url'];?>
'><?php echo $_smarty_tpl->tpl_vars['menuitem']->value['title'];?>
</a>
	<?php
$_smarty_tpl->tpl_vars['menuitem'] = $foreach_menuitem_Sav;
}
?>
</div>
<?php
$_smarty_tpl->tpl_vars['menu'] = $foreach_menu_Sav;
}

}
}
?>