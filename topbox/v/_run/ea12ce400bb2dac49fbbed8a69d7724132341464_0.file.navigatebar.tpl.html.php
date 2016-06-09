<?php /* Smarty version 3.1.27, created on 2016-06-09 10:08:17
         compiled from "v\default\navigatebar.tpl.html" */ ?>
<?php
/*%%SmartyHeaderCode:17612575940115f88c1_47628124%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea12ce400bb2dac49fbbed8a69d7724132341464' => 
    array (
      0 => 'v\\default\\navigatebar.tpl.html',
      1 => 1425432770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17612575940115f88c1_47628124',
  'variables' => 
  array (
    'User' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575940116726c8_84818508',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575940116726c8_84818508')) {
function content_575940116726c8_84818508 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17612575940115f88c1_47628124';
?>
<!-- Docs master nav -->
<header class="navbar navbar-static-top navbar-fixed-top bs-docs-nav" id="top" role="banner">
    <div class="container topbar">
        <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/" class="navbar-brand" style='background-color:#EEE;'>武畄派</a>
        </div>

        <nav class="navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/manage/contents">内容管理</a></li>
            <li><a href="/manage/cockroach">蟑螂管理</a></li>
            <li><a href="/manage/cockroach">标签管理</a></li>
            <li><a href="/manage/category">分类管理</a></li>
            <li><a href="/manage/minisite">专题管理</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="http://expo.getbootstrap.com">OA系统</a></li>
            <li><a href="http://expo.getbootstrap.com"><?php if ($_smarty_tpl->tpl_vars['User']->value) {
echo $_smarty_tpl->tpl_vars['User']->value['name'];
} else { ?>User<?php }?></a></li>
            <li><a href="http://blog.getbootstrap.com">Logout</a></li>
        </ul>
        </nav>
    </div>
</header>


<?php }
}
?>