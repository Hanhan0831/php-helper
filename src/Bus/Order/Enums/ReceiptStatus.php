<?php

namespace Xin\Bus\Order\Enums;

use MyCLabs\Enum\Enum;

/**
 * 订单收货状态枚举类
 */
class ReceiptStatus extends Enum
{

	// 待收货
	public const PENDING = 10;

	// 已收货
	public const SUCCESS = 20;

	/**
	 * 获取枚举数据
	 *
	 * @return array
	 */
	public static function data()
	{
		return [
			self::PENDING => '待收货',
			self::SUCCESS => '已收货',
		];
	}

}
