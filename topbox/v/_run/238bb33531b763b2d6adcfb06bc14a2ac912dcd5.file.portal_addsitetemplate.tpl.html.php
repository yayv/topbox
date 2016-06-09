<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 11:32:37
         compiled from "v/manage/portal_addsitetemplate.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:3972264435510dad5d45841-85640169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '238bb33531b763b2d6adcfb06bc14a2ac912dcd5' => 
    array (
      0 => 'v/manage/portal_addsitetemplate.tpl.html',
      1 => 1406427520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3972264435510dad5d45841-85640169',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notify' => 0,
    'project' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510dad5d8fad9_79737823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510dad5d8fad9_79737823')) {function content_5510dad5d8fad9_79737823($_smarty_tpl) {?><div id="step">
    <div class="t">
      	<div class="t">
      		<div class="t"></div>
      	</div>
    </div>
    <div class="m">

        <div style='padding:15px;'>
        <div style='margin:5px;width:400px;float:left;'>
        <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

        <form action="/portal/doAddSiteTemplate/id-<?php echo $_smarty_tpl->tpl_vars['project']->value->id;?>
" method="post">
			<input type="hidden" name="from_tmplid" id='from_tmplid' value="<?php echo $_smarty_tpl->tpl_vars['template']->value->from_tmplid;?>
">
            <!--编号:--><input type="hidden" name="id"   value="<?php echo $_smarty_tpl->tpl_vars['template']->value->id;?>
"><br/>
            名　称:<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->templatename;?>
"><br/>
            文件名:<input type="text" name="filename" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->templatefile;?>
"><br/>
            说　明:模板内参数用的引号，请使用<font color='red'>双引号</font><br/>
            内　容:(<a href='/templates/copyfrom#TB_iframe=true&width=720&height=420&modal=true&title=复制模板' class='thickbox'>从公共模板复制</a>)<br/>
            　　 <textarea id='content' rows="20" cols="100" name="content" style="font-size:12px;line-height:18px;"><?php echo $_smarty_tpl->tpl_vars['template']->value->content;?>
</textarea><br/>
            类　型:<input type="text" name="type" value="<?php echo $_smarty_tpl->tpl_vars['template']->value->type;?>
">(weekend, hezuo)<br/>
            <input class='btn btn-primary' value='保存' type="submit">
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

function setvalues(url)
{
	// ajax get content
	$.getJSON(url,function(data){
		if(data.ret)
		{
			if(data.content)
			{
				$('#content').val(data.content);
				$('#from_tmplid').val(data.id);
			}
		}
		else
		{
			alert(data.msg);
		}
	});
}

</script>
<?php }} ?>
