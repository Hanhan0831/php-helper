<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Thinkphp\Plugin;

use think\Validate;

class EventValidate extends Validate
{

	/**
	 * 验证规则
	 *
	 * @var array
	 */
	protected $rule = [
		'name' => 'require|alphaDash2|length:3,48|unique:event',
		'description' => 'require|length:3,255',
		'type' => 'require|in:0,1',
	];

	/**
	 * 字段信息
	 *
	 * @var array
	 */
	protected $field = [
		'name' => '唯一标识',
		'description' => '描述',
		'type' => '类型',
	];

	/**
	 * 情景模式
	 *
	 * @var array
	 */
	protected $scene = [];

}
