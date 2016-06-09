<?php /* Smarty version 3.1.27, created on 2016-06-08 11:08:34
         compiled from "v\default\index.tpl.html" */ ?>
<?php
/*%%SmartyHeaderCode:326935757fcb2aea1a3_88780016%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4c663cdfb338d3e170e1838d2a10584f1e28f2e' => 
    array (
      0 => 'v\\default\\index.tpl.html',
      1 => 1399230514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326935757fcb2aea1a3_88780016',
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
  'version' => '3.1.27',
  'unifunc' => 'content_5757fcb2b270a4_50218002',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5757fcb2b270a4_50218002')) {
function content_5757fcb2b270a4_50218002 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '326935757fcb2aea1a3_88780016';
?>
<!DOCTYPE html>
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

<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/default/js/jquery.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/v/bootstrap3/js/bootstrap.js'><?php echo '</script'; ?>
>
</body>

  <?php echo '<script'; ?>
>
  
  function test(){}
  $(document).ready(function(){
    if('function'==typeof(head_ready)) head_ready();
    if('function'==typeof(body_ready)) body_ready();
    if('function'==typeof(foot_ready)) foot_ready();
  });
  
  <?php echo '</script'; ?>
>

</HTML>
<?php }
}
?>