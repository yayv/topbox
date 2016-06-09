<?php /* Smarty version Smarty-3.1.18, created on 2015-03-24 12:20:22
         compiled from "v/manage/contents.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:12677090825510e606e3b2c6-45790979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af115dadf0f7f68438fbe2e022a38f659c73dd32' => 
    array (
      0 => 'v/manage/contents.tpl.html',
      1 => 1407236285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12677090825510e606e3b2c6-45790979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recs' => 0,
    'rec' => 0,
    'content_id' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5510e606efcaf9_23120671',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5510e606efcaf9_23120671')) {function content_5510e606efcaf9_23120671($_smarty_tpl) {?><div class="form-group">
  <a href='#infoModal' data-url='/contents/editCondition' class='btn btn-primary' data-toggle="modal" data-target="#infoModal">按条件筛选</a>
</div>


    
    <table class="table table-bordered">
      <thead>
      <tr style="background-color:#C0ECF8">
        <th> id             </th>
        <th> title          </th>
        <th> cover          </th>
        <th> shortname      </th>
        <th> substract      </th>
        <th> content        </th>
        <th> contenttype    </th>
        <th> file           </th>
        <th> width * height </th>
        <th> resolution     </th>
        <th> size           </th>
        <th> length         </th>
        <th> source         </th>
        <th> sourcetype     </th>
        <th> author         </th>
        <th> editor         </th>
        <th> tags           </th>
      </tr>
      </thead>

      <tbody>
      <?php  $_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->key => $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
?>
      <tr style="font-size:15px;">
        <td><?php echo $_smarty_tpl->tpl_vars['rec']->value['id'];?>
</td>   
        
        <td > 
            <a href='<?php echo $_smarty_tpl->tpl_vars['rec']->value['url'];?>
' style="width:200px; font-size:10px; display:inline-block"> <?php echo $_smarty_tpl->tpl_vars['rec']->value['title'];?>
 </a>
        </td>
        
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['cover'];?>
       </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['shortname'];?>
   </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['substract'];?>
   </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['content'];?>
     </td>   
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['contenttype'];?>
 </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['file'];?>
        </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['width'];?>
 x <?php echo $_smarty_tpl->tpl_vars['rec']->value['height'];?>
   </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['resolution'];?>
  </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['size'];?>
        </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['length'];?>
      </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['source'];?>
      </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['sourcetype'];?>
  </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['author'];?>
      </td>
        <td> <?php echo $_smarty_tpl->tpl_vars['rec']->value['editor'];?>
      </td>

        <td >
          <?php $_smarty_tpl->tpl_vars['content_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['rec']->value['id'], null, 0);?>
          <a href="#infoModal" data-url="/contents/editTags?content_id=<?php echo $_smarty_tpl->tpl_vars['content_id']->value;?>
" class="btn btn-default" data-toggle="modal" data-target="#infoModal">标签</a>
          <a href="#infoModal" data-url="/contents/showEditContentView?content_id=<?php echo $_smarty_tpl->tpl_vars['content_id']->value;?>
" class="btn btn-default" data-toggle="modal" data-target="#infoModal">编辑</a>
        </td>
      </tr>
      <?php } ?>

      </tbody>

    </table>





<ul class="pagination">
<?php if ($_smarty_tpl->tpl_vars['pages']->value) {?>
	<li><a href="#">&laquo;</a></li>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pages']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
  <li><a href="/contents/?start=<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']];?>
"><?php echo ($_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]-$_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]%20)/20+1;?>
</a></li>
<?php endfor; endif; ?>
  <li><a href="#">&raquo;</a></li>
<?php }?>
</ul>




<?php }} ?>
