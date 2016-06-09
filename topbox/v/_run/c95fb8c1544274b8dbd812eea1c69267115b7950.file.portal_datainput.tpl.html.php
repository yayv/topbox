<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:35:41
         compiled from "v/manage/portal_datainput.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:9016352605510db8d112ac5-60132428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c95fb8c1544274b8dbd812eea1c69267115b7950' => 
    array (
      0 => 'v/manage/portal_datainput.tpl.html',
      1 => 1407228289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9016352605510db8d112ac5-60132428',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'dgname' => 0,
    'type' => 0,
    'edittime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510db8d177db6_76749533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510db8d177db6_76749533')) {function content_5510db8d177db6_76749533($_smarty_tpl) {?><form method='post' action='/portal/pinput/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['dgname']->value;?>
' role="form" class="form-horizontal" enctype='multipart/form-data'>
  <input type='hidden' name='dgtype' value='<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
'>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">添加数据</h4>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">标题:</label>
          <div class="controls col-sm-10">
            <input name='title' class='form-control'>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">连接:</label>
          <div class="controls col-sm-10">
            <input name='url' class='form-control'>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">提示:</label>
          <div class="controls col-sm-10">
            <input name='alt' class='form-control'>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">上传图片:</label>
          <div class="controls col-sm-10">
            <input class='form-file' name='imagedata' type=file /> 
          </div>
        </div>

        <div class="form-group">
          <label class='control-label col-sm-2'>或外链:</label>
          <div class="controls col-sm-10">
            <input class='form-control' name='imageurl'  type=text>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">摘要:</label>
          <div class="controls col-sm-10">
            <textarea name='abstract' class='form-control'></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">发布时间:</label>
          <div class="controls col-sm-10">
            <input type=radio name=pubtime value='last' checked onclick="b()">最后编辑时间 
            <input type=radio name=pubtime value='edit' onclick="a()">指定时间 
            <input type=text name='edittime' value="<?php echo $_smarty_tpl->tpl_vars['edittime']->value;?>
" id="timedit" readonly="readonly">
          </div>
        </div>

      </div><!-- end modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <input  type='submit' class='btn btn-primary' name='' value='添加'/>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</form>

<!------------- -->
<script type="text/javascript">

function a()
{
  document.getElementById("timedit").removeAttribute("readOnly");
}
function b(){
document.getElementById("timedit").setAttribute("readOnly","true");
}


</script>			
<?php }} ?>
