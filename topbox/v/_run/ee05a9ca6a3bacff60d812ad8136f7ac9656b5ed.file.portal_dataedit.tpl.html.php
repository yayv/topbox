<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:36:27
         compiled from "v/manage/portal_dataedit.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:7522735055510dbbb0baba8-87699061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee05a9ca6a3bacff60d812ad8136f7ac9656b5ed' => 
    array (
      0 => 'v/manage/portal_dataedit.tpl.html',
      1 => 1407236257,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7522735055510dbbb0baba8-87699061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'dgname' => 0,
    'dataid' => 0,
    'data' => 0,
    'edittime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510dbbb121535_29646248',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510dbbb121535_29646248')) {function content_5510dbbb121535_29646248($_smarty_tpl) {?><form method='post' action='/portal/peditData/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['dgname']->value;?>
' role="form" class="form-horizontal" enctype='multipart/form-data'>

  <input type='hidden' name='dataid' value='<?php echo $_smarty_tpl->tpl_vars['dataid']->value;?>
'>
  <input type='hidden' name='orderingroup' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->orderingroup;?>
'>
  <input type='hidden' name='dgtype' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->datagrouptype;?>
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
            <input name='title' class='form-control' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->title;?>
'>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">连接:</label>
          <div class="controls col-sm-10">
            <input name='url' class='form-control' value="<?php echo $_smarty_tpl->tpl_vars['data']->value->url;?>
">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">提示:</label>
          <div class="controls col-sm-10">
            <input name='alt' class='form-control' value="<?php echo $_smarty_tpl->tpl_vars['data']->value->alt;?>
">
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
            <input class='form-control' name='imageurl'  type=text value="<?php echo $_smarty_tpl->tpl_vars['data']->value->image;?>
">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="inputEmail">摘要:</label>
          <div class="controls col-sm-10">
            <textarea name='abstract' class='form-control'><?php echo $_smarty_tpl->tpl_vars['data']->value->abstract;?>
</textarea>
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
