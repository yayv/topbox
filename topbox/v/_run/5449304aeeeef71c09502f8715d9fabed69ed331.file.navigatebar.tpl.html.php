<?php /* Smarty version Smarty-3.1.18, created on 2015-03-25 15:23:52
         compiled from "v/default/navigatebar.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:171450421955126288b13013-09503499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5449304aeeeef71c09502f8715d9fabed69ed331' => 
    array (
      0 => 'v/default/navigatebar.tpl.html',
      1 => 1425432771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171450421955126288b13013-09503499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'User' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55126288bad241_96434599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55126288bad241_96434599')) {function content_55126288bad241_96434599($_smarty_tpl) {?><!-- Docs master nav -->
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
            <li><a href="http://expo.getbootstrap.com"><?php if ($_smarty_tpl->tpl_vars['User']->value) {?><?php echo $_smarty_tpl->tpl_vars['User']->value['name'];?>
<?php } else { ?>User<?php }?></a></li>
            <li><a href="http://blog.getbootstrap.com">Logout</a></li>
        </ul>
        </nav>
    </div>
</header>


<?php }} ?>
