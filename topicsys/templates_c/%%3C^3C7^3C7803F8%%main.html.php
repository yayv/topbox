<?php /* Smarty version 2.6.26, created on 2010-11-07 20:16:50
         compiled from main.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" lang="zh-cn" dir="ltr" >
	<head>
		  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="description" content="" />
  <meta name="generator" content="Lvren Topic Creator v0.1 build" />
  <title><?php echo $this->_tpl_vars['title']; ?>
-绿人专题管理系统</title>
  <link href="<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo $this->_tpl_vars['themepath']; ?>
/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />


		<link href="<?php echo $this->_tpl_vars['baseurl']; ?>
<?php echo $this->_tpl_vars['themepath']; ?>
/main.css" rel="stylesheet" type="text/css" />
		<link href="/js/thickbox.css" rel="stylesheet" type="text/css" />
		
	</head>
	<body>
	  
	  <!-- 通顶栏 -->
		<div id="header1">
			<div id="header2">
				<div id="header3">
					<div id="version">
              <?php $_from = $this->_tpl_vars['topfunctions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['top'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['func']):
        $this->_foreach['top']['iteration']++;
?>
                  <?php if (($this->_foreach['top']['iteration'] <= 1)): ?>
                      <?php echo $this->_tpl_vars['func']['title']; ?>

                  <?php else: ?>
                      | <?php echo $this->_tpl_vars['func']['title']; ?>

                  <?php endif; ?> 
              <?php endforeach; endif; unset($_from); ?>
          </div>
					<span><img src='<?php echo $this->_tpl_vars['baseurl']; ?>
/<?php echo $this->_tpl_vars['themepath']; ?>
/images/no_msg.gif' />绿人专题管理系统</span>
				</div>
			</div>
		</div>
		
		<div id="content-box">
			<div id="content-pad">
				

	<div id="stepbar">
    <div class="t"><div class="t"><div class="t"></div></div></div>
	  <div class="m">
			<h1>功能</h1>
			<?php echo $this->_tpl_vars['menulist']; ?>

  	  </div>
	<div class="b">
		<div class="b">
			<div class="b"></div>
		</div>
	</div>
    </div>

  <script type='text/javascript' src='/js/jquery-1.2.6.js'></script>
  <script type='text/javascript' src='/js/thickbox.js'></script>
  <script src='/js/jquery-ui-personalized-1.6rc4.min.js' type='text/javascript' ></script>

<div id="right">
  <div id="rightpad">
	  <?php echo $this->_tpl_vars['rightpad']; ?>

	</div>
</div>

<div class="clr"></div>

			</div>
		</div>
		<div id="footer1">
			<div id="footer2">
				<div id="footer3"></div>
			</div>
		</div>
		<div id="copyright">
      <a href="http://www.lvren.cn" target="_blank">绿人邮件列表管理系统</a>
			是绿人用于发送绿人小报的管理系统。
    </div>
  <script>
	var tb_pathToImage = "<?php echo $this->_tpl_vars['home']; ?>
/images/loadingAnimation.gif";
	var tb_pathToImage = "<?php echo $this->_tpl_vars['home']; ?>
/images/none.gif";
  </script>
	</body>
</html>