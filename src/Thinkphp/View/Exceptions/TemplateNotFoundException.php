<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Xin\Thinkphp\View\Exceptions;

class TemplateNotFoundException extends \RuntimeException
{

	protected $template;

	public function __construct(string $message, string $template = '')
	{
		parent::__construct($message);

		$this->message = $message;
		$this->template = $template;
	}

	/**
	 * 获取模板文件
	 *
	 * @access public
	 * @return string
	 */
	public function getTemplate(): string
	{
		return $this->template;
	}

}
