<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:31:27
         compiled from "v/manage/index.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:18850009985510da8f46f080-67702396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a55da8d352329be95aec43e15e3f5f9c74337bd4' => 
    array (
      0 => 'v/manage/index.tpl.html',
      1 => 1407227546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18850009985510da8f46f080-67702396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'navigatebar' => 0,
    'body' => 0,
    'footer' => 0,
    'errmsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510da8f47f0e6_43624219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510da8f47f0e6_43624219')) {function content_5510da8f47f0e6_43624219($_smarty_tpl) {?><!DOCTYPE html>
<HTML>

<head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name='viewport' content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="icon" href="/v/favicon.png" mce_href="/v/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="/v/bootstrap3/css/bootstrap.css" media='screen'/>
	<link rel="stylesheet" type="text/css" href="/v/bootstrap3/css/bootstrap-theme.css" media='screen'/>
  <link rel="stylesheet" type="text/css" href="/v/manage/css/manage.css" media='screen'/>

</head>

<body>

	<?php echo $_smarty_tpl->tpl_vars['navigatebar']->value;?>


  <div class="container" style="margin-left:180px; margin-top:55px">
      <?php echo $_smarty_tpl->tpl_vars['body']->value;?>

  </div>

	<div style='clear:both;'></div>
	<div id='footer'>
	<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

	</div>
	<pre class='hidden'>
	<?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>

	</pre>

<script type='text/javascript' src='/v/bootstrap3/js/jquery.js'></script>
<script type='text/javascript' src='/v/bootstrap3/js/bootstrap.js'></script>

</body>

  <script>
  
  function test(){}
  $(document).ready(function(){
    if('function'==typeof(head_ready)) head_ready();
    if('function'==typeof(body_ready)) body_ready();
    if('function'==typeof(foot_ready)) foot_ready();
  });

  // load url for modal div
  // <a href='#AddNewModal' role='button' data-toggle='modal' class='btn btn-success'> *}
  $("a[href=#infoModal]").click(function(){
      $("#infoModal").load($(this).attr("data-url"));
      //alert($(this).attr("data-url"));
      //return false;
  });

  
  </script>

<div
        id="infoModal" class="modal fade container" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
</HTML>
<?php }} ?>
