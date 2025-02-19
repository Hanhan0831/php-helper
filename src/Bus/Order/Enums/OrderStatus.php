<?php

namespace Xin\Bus\Order\Enums;

use MyCLabs\Enum\Enum;

/**
 * 订单状态枚举类
 */
class OrderStatus extends Enum
{

	/**
	 * 订单已取消
	 */
	public const CANCEL = 0;

	/**
	 * 订单已关闭
	 */
	public const CLOSED = 1;

	/**
	 * 订单进行中
	 */
	public const PENDING = 10;

	/**
	 * 订单已支付
	 */
	public const PAYMENT = 20;

	/**
	 * 订单已发货
	 */
	public const DELIVERED = 30;

	/**
	 * 订单已收货
	 */
	public const RECEIVED = 40;

	/**
	 * 订单已完成
	 */
	public const FINISHED = 50;

	/**
	 * 订单已退款
	 */
	public const REFUNDED = 60;

	/**
	 * 获取枚举数据
	 *
	 * @return string[]
	 */
	public static function data()
	{
		return [
			self::CANCEL => '已取消',
			self::CLOSED => '已关闭',
			self::PENDING => '交易中',
			self::PAYMENT => '已支付',
			self::DELIVERED => '已发货',
			self::RECEIVED => '已收货',
			self::FINISHED => '已完成',
			self::REFUNDED => '退款中',
		];
	}

}
