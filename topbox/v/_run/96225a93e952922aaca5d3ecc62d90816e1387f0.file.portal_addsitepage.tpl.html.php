<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:36:55
         compiled from "v/manage/portal_addsitepage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:12294410345510dbd722b071-80119592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96225a93e952922aaca5d3ecc62d90816e1387f0' => 
    array (
      0 => 'v/manage/portal_addsitepage.tpl.html',
      1 => 1408099869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12294410345510dbd722b071-80119592',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'projectid' => 0,
    'projectname' => 0,
    'pageid' => 0,
    'pagename' => 0,
    'filename' => 0,
    'templates' => 0,
    'v' => 0,
    'type' => 0,
    'publishtype' => 0,
    'default_hookfile' => 0,
    'hookfile' => 0,
    'templateid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510dbd72a3677_28675189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510dbd72a3677_28675189')) {function content_5510dbd72a3677_28675189($_smarty_tpl) {?><div id="step">
    <div class="t">
      	<div class="t">
      		<div class="t"></div>
      	</div>
    </div>
    <div class="m">

        <div style='padding:15px;'>
        <div style='margin:5px;width:400px;float:left;'>
        <?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
        <div style='border:solid 1px red;background-color:yellow;color:green'>
        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

        </div>
        <?php }?>
        <form action="/portal/doAddSitePage/id-<?php echo $_smarty_tpl->tpl_vars['projectid']->value;?>
" method="post">
          <fieldset>
            <legend><strong>基本参数</strong></legend>
            项目　名:<?php echo $_smarty_tpl->tpl_vars['projectname']->value;?>
<input type='hidden' name='pageid' value='<?php echo $_smarty_tpl->tpl_vars['pageid']->value;?>
'><br/>
            页面名称:<input name='pagename' value='<?php echo $_smarty_tpl->tpl_vars['pagename']->value;?>
' ><br/>
            页面文件:<input name='filename' value='<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
' ><br/>
            模板文件:<select name='templateid' id='templateid'>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['templates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['v']->value->templatename;?>
</option>
                        <?php } ?>
                     </select><br/>
            发布类型:<select name='publishtype' id='publishtype'>
                            <option value='dynamic'>动态发布(页面为php文件)</option>
                            <option value='static'>静态发布(页面为html文件)</option>
                            <option value='manual'>自定义内容(扩展名自定)</option>
							
                     </select><br/>
            </fieldset>
            
            <?php if ($_smarty_tpl->tpl_vars['type']->value=='edit'&&$_smarty_tpl->tpl_vars['publishtype']->value=='dynamic') {?>
                <fieldset style='margin-top:50px'>
                  <legend><strong>高级参数</strong></legend>
                  <div>动态扩展文件:<?php echo $_smarty_tpl->tpl_vars['default_hookfile']->value;?>
</div>
                  <?php if ($_smarty_tpl->tpl_vars['default_hookfile']->value) {?>
                      <div><a href='/portal/editpagehook/id-<?php echo $_smarty_tpl->tpl_vars['projectid']->value;?>
/pageid-<?php echo $_smarty_tpl->tpl_vars['pageid']->value;?>
' class='btn btn-default'>编辑文件内容</a></div>
                  <?php } else { ?>
                      <div><a href='/portal/createHookPage/id-<?php echo $_smarty_tpl->tpl_vars['projectid']->value;?>
/pageid-<?php echo $_smarty_tpl->tpl_vars['pageid']->value;?>
' class='btn btn-default'>创建扩展文件</a></div>
                  <?php }?>
                </fieldset>
            <?php }?>
            <input class='btn btn-primary' type="submit" style='margin-top:20px'>
        </form>
        </div>

         <div style='clear:both;'></div>
         </div>   
		 
		 </div>
    <div class="b">
      	<div class="b">
      		<div class="b"></div>
      	</div>
    </div>
</div>
<script type='text/javascript'>
var hookfile = '<?php echo $_smarty_tpl->tpl_vars['default_hookfile']->value;?>
';
// var hookfile     = '<?php echo $_smarty_tpl->tpl_vars['hookfile']->value;?>
';
document.getElementById('publishtype').value = "<?php echo $_smarty_tpl->tpl_vars['publishtype']->value;?>
";
document.getElementById('templateid').value = '<?php echo $_smarty_tpl->tpl_vars['templateid']->value;?>
';
</script>

<?php }} ?>
