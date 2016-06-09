<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:35:38
         compiled from "v/manage/portal_editdatagroup.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1448742075510db8a8458e2-30477434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3d0bc982c52ce22a2adc5f7dfa5989564789681' => 
    array (
      0 => 'v/manage/portal_editdatagroup.tpl.html',
      1 => 1407577455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1448742075510db8a8458e2-30477434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'dg' => 0,
    'datalist' => 0,
    'id' => 0,
    'home' => 0,
    'pp' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510db8a993850_39062761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510db8a993850_39062761')) {function content_5510db8a993850_39062761($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/liuce/Projects/tinycake/cake/libraries/smarty3/plugins/modifier.truncate.php';
?><div id="body" class='col-md-9'>


<div class='row'>
    <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
</div>

<div class='row well'>
    <div class='col-md-12'><?php echo $_smarty_tpl->tpl_vars['dg']->value->userdefinedname;?>
(<?php echo $_smarty_tpl->tpl_vars['dg']->value->alt;?>
)</div>

    <div class='col-md-2'>类型:<?php echo $_smarty_tpl->tpl_vars['dg']->value->type;?>
</div>
    <div class='col-md-2'>名称:<?php echo $_smarty_tpl->tpl_vars['dg']->value->name;?>
</div>
    <div class='col-md-2'>显示为:<?php echo $_smarty_tpl->tpl_vars['dg']->value->showname;?>
</div>
    <div class='col-md-2'>提示信息:<?php echo $_smarty_tpl->tpl_vars['dg']->value->alt;?>
</div>
    <div class='col-md-4'>成员:<?php echo $_smarty_tpl->tpl_vars['dg']->value->members;?>
(没想起来成员的目的是什么)</div>
    <div class='col-md-4'>
        数据源类型:<span id='sourcetype'><?php echo $_smarty_tpl->tpl_vars['dg']->value->sourcetype;?>
</span><input type='button' value='E' onclick='changeSourcetype()'> 
    </div>
    <div class='col-md-4'>
        更新方式:<span id='updatetype'><?php echo $_smarty_tpl->tpl_vars['dg']->value->updatetype;?>
</span><input type='button' value='E' onclick='changeUpdatetype()'> 
    </div>
    <div class='col-md-11'>
        数据源:<span id='datasource'><?php echo $_smarty_tpl->tpl_vars['dg']->value->datasource;?>
</span> <span class='btn btn-default glyphicon glyphicon-pencil' onclick='changeDatasource()'>Edit</span>
    </div>
</div>

<div class='row'>
<div class="col-md-6 form-inline form-group">
    <div class="input-group" >
        <input id='search_input' type="text" class="form-control">
    </div><!-- /input-group -->
    <!-- Split button -->
    <div class="btn-group">
        <button type="button" class="btn btn-primary" onclick="search('key_word')">搜标题</button>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick='search("key_word")'>搜标题</a></li>
            <li><a href="#" onclick='search("text_date")'>搜日期</a></li>
            <li><a href="#" onclick='search("writer_name")'>搜作者</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>      

</div><!-- /.col-md-6 -->

    <div class='col-md-1'></div>
    <input class='btn btn-default col-md-1' type='button' value='添加' onclick='importdata()'>
    <div class='col-md-1'></div>
    <select id="se" onchange="Plugins()" class='col-md-2 btn btn-primary'>
        <option value="source">选择数据来源</option>
        <option value="guide">在线攻略</option>
    </select>

</div>

<div class='row'>
    <div class='listgroup'>
        

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datalist']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['name'] = 'k';
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total']);
?>
        <li class='list-group-item' id='o_<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
'>
            <div class='col-md-10'>
                <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
. <h4 style='display:inline;'><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->title;?>
</h4> <a href='<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->url;?>
' target='_blank'><span class='glyphicon glyphicon-share'></span></a>

                <?php if ('http://'==smarty_modifier_truncate($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->image,7,'')) {?>
                 <a href='<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->image;?>
' target=_blank>查看</a>
                <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->image) {?>
                    <a href='/data/showimg/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->datagroupname;?>
/dataid-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
/for-show.jpg'  class='thickbox' target=_blank>查看</a>
                    <?php }?>
                <?php }?>
                <br/>
                <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->abstract) {?>
                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->abstract,10,"...");?>

                <?php } else { ?>
                &nbsp;
                <?php }?>
                <br/>
                <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->alt) {?>
                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->alt,10,"...");?>

                <?php } else { ?>
                    &nbsp;
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->d>0) {?>
                    <div class='col-md-3' id='<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
' style="color:#FF0000">
                    <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->date;?>

                    </div>
                <?php } else { ?>
                    <div class='col-md-3' id='<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
'>
                        <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->date;?>

                    </div>
                <?php }?>
                
                <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->writer;?>

            </div>
            
            <div class='col-md-1'>
                <a href='#infoModal' data-url='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/portal/editbox/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->datagroupname;?>
/dataid-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
' 
                    data-toggle='modal'>编辑</a>
                <a href='#infoModal' data-url='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/portal/deletebox/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->datagroupname;?>
/dataid-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
'
                    data-toggle='modal'>删除</a>
            </div>
            <div class='clearfix'></div>
        </li>
    <?php endfor; endif; ?>
    </div>
</div>

<div class='row'>
    <ul class="pagination">
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pp']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total']);
?>
        <li><a href='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/project/page_t/pt-<?php echo $_smarty_tpl->tpl_vars['pp']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['pp']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</a></li>
      <?php endfor; endif; ?>
    </ul>
</div>


</div>

<div class='col-md-3' style='border-left:solid 1px #eeeeee;'>
  <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

</div>

<script type='text/javascript'>

var id = <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
;
var baseurl = '<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
';
var param   = 'id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['dg']->value->name;?>
/dst-<?php echo $_smarty_tpl->tpl_vars['dg']->value->type;?>
';
var sorturl = "/data/sortDatalist/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['dg']->value->name;?>
/?";

function search(t)
{
    s = $('#search_input').val();
    $.post('/project/page/p-0/id-'+id,{'key':t,'val':s},function(){

    },
    'json');
}

function changeDatasource()
{
    var method  = '/data/jupdatedg/';
    var url = prompt('输入数据源URL', '');
    if(url) 
    {
        a = encodeURI(url);
        var data = {'key':'datasource', 'value':a};
        $.post(baseurl+method+param, data, function(ajax){
            if(ajax.ret)
            {
                $('#datasource').text(ajax.value);
                // TODO: check sourcetype
            }
        },
        'json');
    }
}

function changeSourcetype()
{
    var method  = '/data/jupdatedg/';
    var type = prompt('输入数据源类型(rss,json,manual)','');
    if(type!='rss' && type!='json' && type!='manual')
    {
        alert('输入的数据源类型无法处理');
        return;
    }
    
    if(type)
    {
        var data = {'key':'sourcetype', 'value':type};
        $.post(baseurl+method+param, data, function(ajax){
            if(ajax.ret)
            {
                $('#sourcetype').text(ajax.value);
            }
        },
        'json');
    }
}

function changeUpdatetype()
{
    var method  = '/data/jupdatedg/';
    var type = prompt('输入数据更新方式(auto,manual)','');
    if(type!='auto' && type!='manual')
    {
        alert('输入的数据更新方式无法处理');
        return;
    }
    
    if(type)
    {
        var data = {'key':'updatetype', 'value':type};
        $.post(baseurl+method+param, data, function(ajax){
            if(ajax.ret)
            {
                $('#updatetype').text(ajax.value);
            }
        },
        'json');
    }
}

function importdata()
{
    var ouptype = $('#updatetype').text();
    if(ouptype=='auto')
    {
        alert('此项内容设定为自动更新，无须手工参与');
        return;
    }
    
    if($('#datasource').text()!='')
    {
        alert('call thick box');
        return;
    }

    $("#infoModal").load(baseurl+'/portal/inputbox/'+param).modal();

    //$("#infoModal").load($(this).attr("data-url"));
    //http://topic.ubuntu.lvren.cn/templates/copyfrom#TB_iframe=true&width=720&height=420&modal=true&title=复制模板
    //tb_show('录入数据','/data/inputbox/'+param);
}

function body_ready() {
    /* TODO: 拖拽排序的功能已经失效，需要重新开发
    $("#datalist").sortable({
      handle : '.handle',
      update : function () {
		var order = $('#datalist').sortable('serialize');
        $.post(baseurl+sorturl,order,function(data){
    		$("#info").html(data);
        },
        'html');
      }
    });
    */
};
function Plugins()
{
 
   var se = document.getElementById('se').value;
   url=baseurl+'/data/get_json/typeid-'+se+'/'+param;
   tb_show('录入数据',url+'?#TB_iframe=true&width=720&height=320&modal=true&');
  
}
    
</script>


<?php }} ?>
