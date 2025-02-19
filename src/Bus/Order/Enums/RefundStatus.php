<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Bus\Order\Enums;

use MyCLabs\Enum\Enum;

class RefundStatus extends Enum
{

	/**
	 * 维权已取消
	 */
	public const CANCELED = 0;

	/**
	 * 商家已拒绝
	 */
	public const REFUSED = 1;

	/**
	 * 申请维权中
	 */
	public const PENDING = 10;

	/**
	 * 商家审核已通过（买家待退货）
	 */
	public const PASSED = 20;

	/**
	 * 买家已发货（卖家待收货）
	 */
	public const DELIVERED = 30;

	/**
	 * 卖家已收货（卖家待打款）
	 */
	public const RECEIVED = 40;

	/**
	 * 维权已结束
	 */
	public const FINISHED = 50;

	/**
	 * 获取枚举数据
	 *
	 * @return array
	 */
	public static function data()
	{
		return [
			self::CANCELED => '已取消',
			self::PENDING => '申请中',
			self::PASSED => '买家待退货',
			self::REFUSED => '商家已拒绝',
			self::DELIVERED => '卖家待收货',
			self::RECEIVED => '卖家待打款',
			self::FINISHED => '受理完成',
		];
	}

}
