<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:31:20
         compiled from "v/default/index.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:9713699035510da88697f01-46106588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '140629d2c2bf4f09799e11716b7e187e630b967c' => 
    array (
      0 => 'v/default/index.tpl.html',
      1 => 1399230514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9713699035510da88697f01-46106588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'home' => 0,
    'navigatebar' => 0,
    'body' => 0,
    'menu' => 0,
    'footer' => 0,
    'errmsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510da88757968_53498012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510da88757968_53498012')) {function content_5510da88757968_53498012($_smarty_tpl) {?><!DOCTYPE html>
<HTML>

<head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name='viewport' content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="icon" href="/v/favicon.png" mce_href="/v/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/bootstrap3/css/bootstrap.css" media='screen'/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/default/css/docs.css" media='screen'/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/default/css/install.css" media='screen'/>
</head>

<body>
	<?php echo $_smarty_tpl->tpl_vars['navigatebar']->value;?>


    <div class="container" style="margin-top:30px">
        <?php echo $_smarty_tpl->tpl_vars['body']->value;?>

    </div>

	<div id='guide'>
	<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

	</div>

	<div style='clear:both;'></div>
	<div id='footer'>
	<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

	</div>
	<pre>
	<?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>

	</pre>

<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/default/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/bootstrap3/js/bootstrap.js'></script>
</body>

  <script>
  
  function test(){}
  $(document).ready(function(){
    if('function'==typeof(head_ready)) head_ready();
    if('function'==typeof(body_ready)) body_ready();
    if('function'==typeof(foot_ready)) foot_ready();
  });
  
  </script>

</HTML>
<?php }} ?>
