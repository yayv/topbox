<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:47:52
         compiled from "v/manage/portal_renamedatagroup.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:6354793165510de68d92cb2-51440938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5260c2f5b7ec4ac1915a0a1c7faef26d4771974e' => 
    array (
      0 => 'v/manage/portal_renamedatagroup.tpl.html',
      1 => 1407585356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6354793165510de68d92cb2-51440938',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dgname' => 0,
    'showname' => 0,
    'userdefinedname' => 0,
    'home' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510de68de8777_21951730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510de68de8777_21951730')) {function content_5510de68de8777_21951730($_smarty_tpl) {?><form id='renameform' name='renameform' method='post' action='' >
    <input type='hidden' name='key' value='userdefinedname'>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">添加数据</h4>
      </div>
      <div class="modal-body">
        
        <table class='table'>
        <tr><th>数据组名:</th><td><?php echo $_smarty_tpl->tpl_vars['dgname']->value;?>
</td></tr>
        <tr><th>默认显示名:</th><td><span id='showname'><?php echo $_smarty_tpl->tpl_vars['showname']->value;?>
</span></td></tr>
        <tr><th>用户定义显示名:</th><td><input id='userdefinedname' name='value' value='<?php echo $_smarty_tpl->tpl_vars['userdefinedname']->value;?>
'><input type='button' value='恢复默认名' onclick='userdef()'></td></tr>
        </table>


      </div><!-- end modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <input  type='button' class='btn btn-primary' name=''  onclick='dopost()' value='修改'/>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</form>

<!------------- -->
<script type="text/javascript">
var posturl = '<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/portal/jupdatedg/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['dgname']->value;?>
';

  function dopost()
  {
    $.post(posturl, $('#renameform').serialize(), function(data){
      window.location.reload();
    },'json');
    //$('.renameform').submit();
    //document.forms['renameform'].submit();
    //window.parent.location.reload();
  }
  
  function userdef()
  {
    document.getElementById('userdefinedname').value = document.getElementById('showname').innerHTML;
  }


</script> 
<?php }} ?>
