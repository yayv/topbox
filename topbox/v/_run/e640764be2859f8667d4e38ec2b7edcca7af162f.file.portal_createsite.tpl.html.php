<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:31:44
         compiled from "v/manage/portal_createsite.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19640538975510daa0ac5024-22361412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e640764be2859f8667d4e38ec2b7edcca7af162f' => 
    array (
      0 => 'v/manage/portal_createsite.tpl.html',
      1 => 1406398933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19640538975510daa0ac5024-22361412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'projectname' => 0,
    'description' => 0,
    'author' => 0,
    'writer' => 0,
    'topicdir' => 0,
    'directory' => 0,
    'url' => 0,
    'staticdata' => 0,
    'dynamicdata' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510daa0b33e88_08692495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510daa0b33e88_08692495')) {function content_5510daa0b33e88_08692495($_smarty_tpl) {?>
<div class='col-md-9'>
<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
<div style='border:solid 1px red;background-color:yellow;color:green'>
<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?>
<form method='POST' action='/portal/project_add'>
	<table>
	<tr><td>项目名称:</td><td><input type='text' name='projectname' value='<?php echo $_smarty_tpl->tpl_vars['projectname']->value;?>
' ></td></tr>
	<tr><td>项目描述:</td><td><textarea name='description'><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea></td></tr>
	<tr><td>技术负责人:</td><td><input type='text' name='author' value='<?php echo $_smarty_tpl->tpl_vars['author']->value;?>
' ></td></tr>
	<tr><td>编辑负责人:</td><td><input type='text' name='writer' value='<?php echo $_smarty_tpl->tpl_vars['writer']->value;?>
'></td></tr>
	<tr><td>发布目录:</td><td><?php echo $_smarty_tpl->tpl_vars['topicdir']->value;?>
<input type='text' name='directory' value='<?php echo $_smarty_tpl->tpl_vars['directory']->value;?>
'></td></tr>
	<tr><td>基础URL:</td><td><input type='text' name='url' value='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
'></td></tr>
	<tr><td>静态数据:</td><td><input type='text' name='staticdata' value='<?php echo $_smarty_tpl->tpl_vars['staticdata']->value;?>
'></td></tr>
	<tr><td>动态数据:</td><td><input type='text' name='dynamicdata' value='<?php echo $_smarty_tpl->tpl_vars['dynamicdata']->value;?>
'></td></tr>
	<tr><td/><td><input type='submit' value='创建'><input type='reset' value='重填'></td></tr>
	</table>
</form>
</div>

<div class='col-md-3' style='border-left:1px solid #EEEEEE;'>
	<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

</div>
<?php }} ?>
