<?php /* Smarty version 3.1.27, created on 2016-06-11 10:17:55
         compiled from "v\default\main.html" */ ?>
<?php
/*%%SmartyHeaderCode:32722575be553ab8408_44977197%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c2b11e2efb555cdcea04d27f5bf77d4c6d00b0b' => 
    array (
      0 => 'v\\default\\main.html',
      1 => 1289441258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32722575be553ab8408_44977197',
  'variables' => 
  array (
    'title' => 0,
    'baseurl' => 0,
    'themepath' => 0,
    'topfunctions' => 0,
    'func' => 0,
    'menulist' => 0,
    'rightpad' => 0,
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_575be553b2d702_68872416',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_575be553b2d702_68872416')) {
function content_575be553b2d702_68872416 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '32722575be553ab8408_44977197';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn" dir="ltr" >
	<head>
		  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="description" content="" />
  <meta name="generator" content="Lvren Topic Creator v0.1 build" />
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
-绿人专题管理系统</title>
  <link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;
echo $_smarty_tpl->tpl_vars['themepath']->value;?>
/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />


		<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;
echo $_smarty_tpl->tpl_vars['themepath']->value;?>
/main.css" rel="stylesheet" type="text/css" />
		<link href="/js/thickbox.css" rel="stylesheet" type="text/css" />
		
	</head>
	<body>
	  
	  <!-- 通顶栏 -->
		<div id="header1">
			<div id="header2">
				<div id="header3">
					<div id="version">
              <?php
$_from = $_smarty_tpl->tpl_vars['topfunctions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['func'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['func']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_top'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['func']->value) {
$_smarty_tpl->tpl_vars['func']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_top']->value['iteration']++;
$_smarty_tpl->tpl_vars['__foreach_top']->value['first'] = $_smarty_tpl->tpl_vars['__foreach_top']->value['iteration'] == 1;
$foreach_func_Sav = $_smarty_tpl->tpl_vars['func'];
?>
                  <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_top']->value['first']) ? $_smarty_tpl->tpl_vars['__foreach_top']->value['first'] : null)) {?>
                      <?php echo $_smarty_tpl->tpl_vars['func']->value['title'];?>

                  <?php } else { ?>
                      | <?php echo $_smarty_tpl->tpl_vars['func']->value['title'];?>

                  <?php }?> 
              <?php
$_smarty_tpl->tpl_vars['func'] = $foreach_func_Sav;
}
?>
          </div>
					<span><img src='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['themepath']->value;?>
/images/no_msg.gif' />绿人专题管理系统</span>
				</div>
			</div>
		</div>
		
		<div id="content-box">
			<div id="content-pad">
				

	<div id="stepbar">
    <div class="t"><div class="t"><div class="t"></div></div></div>
	  <div class="m">
			<h1>功能</h1>
			<?php echo $_smarty_tpl->tpl_vars['menulist']->value;?>

  	  </div>
	<div class="b">
		<div class="b">
			<div class="b"></div>
		</div>
	</div>
    </div>

  <?php echo '<script'; ?>
 type='text/javascript' src='/js/jquery-1.2.6.js'><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type='text/javascript' src='/js/thickbox.js'><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src='/js/jquery-ui-personalized-1.6rc4.min.js' type='text/javascript' ><?php echo '</script'; ?>
>

<div id="right">
  <div id="rightpad">
	  <?php echo $_smarty_tpl->tpl_vars['rightpad']->value;?>

	</div>
</div>

<div class="clr"></div>

			</div>
		</div>
		<div id="footer1">
			<div id="footer2">
				<div id="footer3"></div>
			</div>
		</div>
		<div id="copyright">
      <a href="http://www.lvren.cn" target="_blank">绿人邮件列表管理系统</a>
			是绿人用于发送绿人小报的管理系统。
    </div>
  <?php echo '<script'; ?>
>
	var tb_pathToImage = "<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/images/loadingAnimation.gif";
	var tb_pathToImage = "<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/images/none.gif";
  <?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
?>