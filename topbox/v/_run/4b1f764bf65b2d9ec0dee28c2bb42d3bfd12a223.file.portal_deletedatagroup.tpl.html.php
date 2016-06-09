<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:55:17
         compiled from "v/manage/portal_deletedatagroup.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:14248732325510e02597ee37-41101248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b1f764bf65b2d9ec0dee28c2bb42d3bfd12a223' => 
    array (
      0 => 'v/manage/portal_deletedatagroup.tpl.html',
      1 => 1407588411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14248732325510e02597ee37-41101248',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'count' => 0,
    'home' => 0,
    'id' => 0,
    'dgname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510e0259ee450_42754981',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510e0259ee450_42754981')) {function content_5510e0259ee450_42754981($_smarty_tpl) {?>  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">删除数据组</h4>
      </div>
      <div class="modal-body">
        

      <h3>确认要删除<strong style="color:#0066CC"><?php echo $_smarty_tpl->tpl_vars['data']->value->showname;?>
</strong>吗？</h3>
      <h5>此数据组有<?php echo $_smarty_tpl->tpl_vars['count']->value->nums;?>
条数据</h5>


      </div><!-- end modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <input  type='button' class='btn btn-primary' name=''  onclick='dodelete("<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/portal/deletedatagroup/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['dgname']->value;?>
")' value='确认删除'/>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->


<!------------- -->
<script type="text/javascript">

function dodelete(url)
{
    $.getJSON(url,function(data){
        window.parent.location = window.parent.location ;
    });
}

function resize(me)
{
    x = 360 - 50;
    y = 320 - 50;

    var imageWidth = me.width;
    var imageHeight = me.height;
    if (imageWidth > x) {
      imageHeight = imageHeight * (x / imageWidth); 
      imageWidth = x; 
      if (imageHeight > y) { 
        imageWidth = imageWidth * (y / imageHeight); 
        imageHeight = y; 
      }
    } else if (imageHeight > y) { 
      imageWidth = imageWidth * (y / imageHeight); 
      imageHeight = y; 
      if (imageWidth > x) { 
        imageHeight = imageHeight * (x / imageWidth); 
        imageWidth = x;
      }
    }
 
    $('#showimg').attr('width', imageWidth);
    $('#showimg').attr('height', imageHeight);
}

</script> 

<?php }} ?>
