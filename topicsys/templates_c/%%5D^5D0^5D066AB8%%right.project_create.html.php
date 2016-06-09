<?php /* Smarty version 2.6.26, created on 2010-11-09 14:16:20
         compiled from right.project_create.html */ ?>
<?php if ($this->_tpl_vars['message']): ?>
<div style='border:solid 1px red;background-color:yellow;color:green'>
<?php echo $this->_tpl_vars['message']; ?>

</div>
<?php endif; ?>
<form method='POST' action='<?php echo $this->_tpl_vars['home']; ?>
/project/padd'>
	<table>
	<tr><td>项目名称:</td><td><input type='text' name='projectname' value='<?php echo $this->_tpl_vars['projectname']; ?>
' ></td></tr>
	<tr><td>项目描述:</td><td><textarea name='description'><?php echo $this->_tpl_vars['description']; ?>
</textarea></td></tr>
	<tr><td>技术负责人:</td><td><input type='text' name='author' value='<?php echo $this->_tpl_vars['author']; ?>
' readonly='readonly'></td></tr>
	<tr><td>编辑负责人:</td><td><input type='text' name='writer' value='<?php echo $this->_tpl_vars['writer']; ?>
'></td></tr>
	<tr><td>发布目录:</td><td><input type='text' name='directory' value='<?php echo $this->_tpl_vars['directory']; ?>
'></td></tr>
	<tr><td>基础URL:</td><td><input type='text' name='url' value='<?php echo $this->_tpl_vars['url']; ?>
'></td></tr>
	<tr><td>静态数据:</td><td><input type='text' name='staticdata' value='<?php echo $this->_tpl_vars['staticdata']; ?>
'></td></tr>
	<tr><td>动态数据:</td><td><input type='text' name='dynamicdata' value='<?php echo $this->_tpl_vars['dynamicdata']; ?>
'></td></tr>
	<tr><td/><td><input type='submit' value='创建'><input type='reset' value='重填'></td></tr>
	</table>
</form>
