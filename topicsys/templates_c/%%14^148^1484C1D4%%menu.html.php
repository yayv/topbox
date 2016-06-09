<?php /* Smarty version 2.6.26, created on 2010-11-07 20:16:50
         compiled from menu.html */ ?>
<?php $_from = $this->_tpl_vars['menulist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['menu']):
?>
<div class="step-off">
	<?php echo $this->_tpl_vars['menu']['title']; ?>
:<?php echo $this->_tpl_vars['menu']['name']; ?>
<br/>
	<?php $_from = $this->_tpl_vars['menu']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['menuitem']):
?>
	<a target='<?php echo $this->_tpl_vars['menuitem']['target']; ?>
' href='<?php echo $this->_tpl_vars['menuitem']['url']; ?>
'><?php echo $this->_tpl_vars['menuitem']['title']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php endforeach; endif; unset($_from); ?>