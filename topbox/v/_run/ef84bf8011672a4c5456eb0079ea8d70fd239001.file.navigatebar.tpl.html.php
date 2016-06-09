<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:31:27
         compiled from "v/manage/navigatebar.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:19063482475510da8f3f4a69-28307446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef84bf8011672a4c5456eb0079ea8d70fd239001' => 
    array (
      0 => 'v/manage/navigatebar.tpl.html',
      1 => 1407238509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19063482475510da8f3f4a69-28307446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'User' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510da8f46a700_91078407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510da8f46a700_91078407')) {function content_5510da8f46a700_91078407($_smarty_tpl) {?><!-- Docs master nav -->
<header class="navbar navbar-static-top navbar-fixed-top bs-docs-nav" style='border-bottom:solid 1px #EEEEEE;' id="top" role="banner">
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
            <li><a href="/cockroach">蟑螂管理</a></li>
            <li class="active"><a href="/contents">内容管理</a></li>
            <li><a href="/tags">标签管理</a></li>
            <li><a href="/manage/category">分类管理</a></li>
            <li><a href="/portal/listall">专题管理</a></li>
            <li><a href="/manage/users">用户管理</a></li>
            <li><a href="/manage/users">游戏信息管理</a></li>
            <li><a href="/manage/users">评论管理</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="http://expo.getbootstrap.com">OA系统</a></li>
            <li><a href="http://expo.getbootstrap.com"><?php if ($_smarty_tpl->tpl_vars['User']->value) {?><?php echo $_smarty_tpl->tpl_vars['User']->value['name'];?>
<?php } else { ?>User<?php }?></a></li>
            <li><a href="http://blog.getbootstrap.com">Logout</a></li>
        </ul>
        </nav>
    </div>
</header>


<?php }} ?>
