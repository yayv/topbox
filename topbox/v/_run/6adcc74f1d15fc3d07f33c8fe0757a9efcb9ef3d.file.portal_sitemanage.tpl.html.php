<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:32:25
         compiled from "v/manage/portal_sitemanage.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:4677093405510dac9dc4f62-45133938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6adcc74f1d15fc3d07f33c8fe0757a9efcb9ef3d' => 
    array (
      0 => 'v/manage/portal_sitemanage.tpl.html',
      1 => 1408099869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4677093405510dac9dc4f62-45133938',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'templates' => 0,
    'v' => 0,
    'pages' => 0,
    'project' => 0,
    'datagroup' => 0,
    'dir' => 0,
    'home' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510dac9ec02e4_41514098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510dac9ec02e4_41514098')) {function content_5510dac9ec02e4_41514098($_smarty_tpl) {?>
<div id="body" class='col-md-9'>
  <div class='section'>
  <h1>模板管理[<a href='#' onclick='toggleShow("tempaltemanage_content")'>x</a>]</h1>
  <div id='tempaltemanage_content' style='display:;'>
  <a href='/portal/addSiteTemplate/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>增加模板</a><br/>
    <table class='manage table'><tr class='header'><th>模板</th><th>模板文件</th><th>模板样本</th><th></th></tr>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['templates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
           <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value->templatename;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value->templatefile;?>
</td>
        <td>修改自:<?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</td>
        <td><a href='/portal/editSiteTemplate/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/templateid-<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
'>编辑</a></td>
       </tr>
    <?php } ?>
    </table>
  </div>

  </div>

  <div class='section'>
  <h1>页面管理[<a href='#' onclick='toggleShow("pagemanage_content")'>x</a>]</h1>
  <div id='pagemanage_content' style='display:;'>
  <a href='/portal/addpage/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>增加页面</a><br/>
  <table class='manage table'>
    <tr class='header'>
      <th>页面名</th>
      <th>文件名</th>
      <th>模板</th>
      <th>发布方式</th>
      <th></th>
    </tr>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pages']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->pagename;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->filename;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->templatename;?>
</td>
      <td><?php if ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->publishtype=='dynamic') {?>动态发布<?php } elseif ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->publishtype=='static') {?>静态发布<?php } elseif ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->publishtype=='manual') {?>自定义内容<?php } elseif ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->publishtype=='auto') {?>自动调取<?php }?></td>
      <td>
        <a href="<?php echo $_smarty_tpl->tpl_vars['project']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->filename;?>
" target='publish' class='btn btn-default' >浏览</a>
        <a href="/portal/editpage/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/pageid-<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
" class='btn btn-default'>编辑</a>
        <a data-target="#infoModal" data-toggle="modal" class="btn btn-primary" data-url="/portal/delpage/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/pageid-<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
" href="#infoModal">删除</a>
       </td>
    </tr>
    <?php endfor; endif; ?>
  </table>
  </div>  
  </div>

  <div class='section'>
  <h1>数据管理 [<a href='#' onclick='toggleShow("datamanage_content")'>x</a>]</h1>

  <div id='datamanage_content' style='display:;'>
      <table class='manage'>
          <tr class='header'>
              <th>数据组名称</th>
              <th>类型</th>
              <th>说明</th>
              <th>成员变量</th>
              <th>数据源</th>
              <th>数据源类型</th>
              <th>更新方式</th>
              <th>使用状态</th>
          </tr>
          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datagroup']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
              <tr><td ><span id='dgun<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->name;?>
'><?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->userdefinedname;?>
</span></td>
                  <td><?php if ($_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->type=='single') {?>单条<?php } else { ?>列表<?php }?></td>
                  <td title='<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->alt;?>
'><a style='cursor:pointer;'>?</a></td>
                  <td>x</td>
                  <td><span class='datasource'></span></td>
                  <td><?php if ($_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->sourcetype=='manual') {?>录入<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->sourcetype;?>
<?php }?></td>
                  <td></td>
                  <td>
                    <?php if ($_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->reference) {?>
                      使用中 <a href='/portal/editdatagroup/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->name;?>
'>编辑</a>
                      &nbsp;<a onclick='renamedg("<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->name;?>
", "<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->showname;?>
","<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->userdefinedname;?>
")' style="color:#0B55C4; cursor:pointer;">改名</a>
                    <?php } else { ?>
                      未使用 <a href='#infoModal' data-url='/portal/deletedgbox/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
/name-<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->name;?>
' data-toggle='modal'>删除</a>　<a onclick='renamedg("<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->name;?>
", "<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->showname;?>
","<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->userdefinedname;?>
")' class='thickbox' style="color:#0B55C4; cursor:pointer;">改名</a>　<input type="checkbox" name="del" id="<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->id;?>
" value="<?php echo $_smarty_tpl->tpl_vars['datagroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]->name;?>
">
                    <?php }?>      
                  </td>
              </tr>
          <?php endfor; endif; ?>
      </table>
    <div style="width:100px; font-size:18px; padding-left:500px;"><a class='btn btn-primary' href='javascript:void(0)' onclick="del_more()" style="cursor:pointer;">多项删除</a></div>
      <p>注: 名称为显示名，与模板内的变量名，说明，类型等信息都不可在这里更改，这些内容是从模板文件中自动分析出来的。</p>
  </div>

  </div>


  <div class='section'>
  <h1>资源管理</h1>
    <form action="/portal/addimg/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" enctype="multipart/form-data" id="form1" name="form1">
    已上传资源：<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
<br />
    上传资源:<input type="file" name="filename" />注：只能上传.zip压缩包,上传完之后要点击发布<br/>
    <input type="submit" onclick="check()">
    </form> 

    <hr/>
    <form action="/portal/downloadZip/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" enctype="multipart/form-data" id="form1" name="form1">
    下载已上传资源：<br/>
    <input type="submit" value="下载">
    </form> 

  </div>


  <div class='section'>
  <h1>发布</h1>
  <a target='publish' class='btn btn-primary' href='/portal/publish/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>发布</a>  <a class='btn btn-primary' target='publish' href='<?php echo $_smarty_tpl->tpl_vars['project']->value->url;?>
'>浏览</a>  <a class='btn btn-primary' target='publish' href='<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/portal/republish/id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>重新发布(危险操作)</a> <br /><br />
  </div>


  <p>维护数据,预览项目,发布项目</p>

</div>

<div class='col-md-3' style='border-left:solid 1px #eeeeee;'>
  <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

</div>

<script type='text/javascript'>
var pid = '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
var baseurl  = '<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
';

function renamedg(name, showname, uname)
{
	var url = baseurl+'/portal/renamebox/id-'+pid+'/name-'+name+'/showname-'+encodeURI(showname)+'/uname-'+encodeURI(uname);
    //tb_show('录入数据',url+'?#TB_iframe=true&width=360&height=120&modal=true&');
    //$("#infoModal").load(baseurl+'/portal/inputbox/'+param).modal();
    $('#infoModal').load(url).modal();
    return ;
}

function toggleShow(id)
{
    var tag = document.getElementById(id);
    var disp = tag.style.display;
    if(disp!='none')
        tag.style.display = 'none';
    else
        tag.style.display = '';
}
function del_more()
{
   var del_id=new Array();
   var dname=new Array();
   var dels=document.getElementsByName("del");
   
   for(i=0; i<dels.length; i++)
   {
      if(dels[i].checked)
	  {
      del_id[del_id.length]=dels[i].id;
	  dname[dname.length]=dels[i].value;
	  
	  }
   }
   if(del_id.length==0)
   {
     alert("还没有选择要删除的数据");
   }
   else
   {
   url=baseurl+'/data/deletedgboxmore/id-'+del_id+'/pid-'+pid+'/dname-'+dname+'/l-'+del_id.length;
   tb_show('删除数据',url+'?#TB_iframe=true&width=360&height=120&modal=true&');
   //window.location=url;
   return ;
   }
  
}

</script>
<?php }} ?>
