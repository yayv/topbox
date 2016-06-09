<?php 
/**
 *  在这个控制器基类里，默认使用的环境为 smarty2+mysql5, 所使用的php类库均为cake/libraries目录下已经带好的
 */
abstract class CommonController extends Controller
{
	/**
	 * 初始化数据库对象，考虑增加一层，用于实现用户的基类
	 * 
	 */
	public function initDb($dbsrv)
	{
        if('mysql'==get_class($this->_db))
            return ;

		include_once('cls.mysql.php');

		// 如果你想用自己的数据库类, 那就重写这一部分就好了。
		//这里是初始化控制器内的数据库对象
		$this->_db 	= new mysql($dbsrv);
	}
	
	/**
	 * 初始化模版引擎，提供用户覆盖此方法的机会
	 * 
	 */
	public function initTemplateEngine($templatedir='v/default/', $compile_dir='v/_run')
	{
        if('Smarty'==get_class($this->tpl))
            return ;

		include_once('smarty3/Smarty.class.php');

		$this->tpl 	= new Smarty;
		if($templatedir)
			$this->tpl->template_dir = $templatedir; 
		if($compile_dir)
			$this->tpl->compile_dir  = $compile_dir; 
	}

    // TODO: 这个需要再考虑代码结构如何组织，把这个initAssign 转移到用户代码里去，同时还要保持调用的方便
    public function initAssign()
    {
        if($this->tpl)
        {
            $this->tpl->assign('home', Core::getInstance()->getConfig('baseurl'));
            $this->tpl->assign('sitename', Core::getInstance()->getConfig('sitename'));
        }
    }

    public function init() 
    {
    	// 这是个Helper 方法, 把最常用的初始化过程写在这里
        $this->initDb(Core::getInstance()->getConfig('database'));
        $this->initTemplateEngine(
                    Core::getInstance()->getConfig('theme'),
                    Core::getInstance()->getConfig('compiled_template')
        );

        $this->initAssign();
    }

    public function isLogined()
    {
    	// TODO: 这里检查用户是否登录。需要用 sessionid和userid组合验证
        return true;
    }

    public function isEmplyee()
    {
    	// TODO: 这里检查登录的用户是否为公司职员
        return true;
    }

    public function isManager()
    {
        return true;
    }
}



