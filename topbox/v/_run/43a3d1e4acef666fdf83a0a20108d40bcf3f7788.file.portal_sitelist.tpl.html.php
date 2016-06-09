<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:31:29
         compiled from "v/manage/portal_sitelist.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:10883595335510da915da503-99953461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43a3d1e4acef666fdf83a0a20108d40bcf3f7788' => 
    array (
      0 => 'v/manage/portal_sitelist.tpl.html',
      1 => 1408099869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10883595335510da915da503-99953461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sites' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510da9161f9e5_58174968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510da9161f9e5_58174968')) {function content_5510da9161f9e5_58174968($_smarty_tpl) {?><div class='col-md-9'>

<div class='list-group col-md-10'>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['sites']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
    <div class='list-group-item row'>
      
      <span class="badge"><a target='_blank' style='color:white;' href='/portal/manage/id-<?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
'>管理</a></span><span class="badge"><a style='color:white;'>参数</a></span><span class="badge"><a style='color:white;' data-target="#infoModal" data-toggle="modal" data-url='/portal/delProject/id-<?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
' href="#infoModal">删除</a></span>
      <?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
 : <a target='_blank' href='/portal/manage/id-<?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a>
    </div>
    <?php endfor; endif; ?>
</div>

</div>
<div class='col-md-3'>
  <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

</div>
		
<?php }} ?>
