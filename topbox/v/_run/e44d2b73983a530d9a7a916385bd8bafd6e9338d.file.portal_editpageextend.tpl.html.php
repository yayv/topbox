<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 12:23:27
         compiled from "v/manage/portal_editpageextend.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:11557480715510e6bf3aad53-35965290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e44d2b73983a530d9a7a916385bd8bafd6e9338d' => 
    array (
      0 => 'v/manage/portal_editpageextend.tpl.html',
      1 => 1408099869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11557480715510e6bf3aad53-35965290',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'projectid' => 0,
    'pageid' => 0,
    'projectname' => 0,
    'pagename' => 0,
    'user_hook_filename' => 0,
    'hookfilecontent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510e6bf3f0118_48697762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510e6bf3f0118_48697762')) {function content_5510e6bf3f0118_48697762($_smarty_tpl) {?><form method='POST' action='/portal/peditpagehook/id-<?php echo $_smarty_tpl->tpl_vars['projectid']->value;?>
/pageid-<?php echo $_smarty_tpl->tpl_vars['pageid']->value;?>
'>

所在项目:<input value='<?php echo $_smarty_tpl->tpl_vars['projectname']->value;?>
' readonly='readonly'><br/>
所在页面:<input value='<?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
' readonly='readonly'><br/>
附加文件:<input name='user_hook_filename' value='<?php echo $_smarty_tpl->tpl_vars['user_hook_filename']->value;?>
' readonly='readonly'/><br/>
附加内容:<textarea name='hookfile_content' rows="20" cols="100"  style="font-size:12px;line-height:18px;">
<?php echo $_smarty_tpl->tpl_vars['hookfilecontent']->value;?>

</textarea><br/>
<input type='submit' value='保存'>
</form>
</div><?php }} ?>
