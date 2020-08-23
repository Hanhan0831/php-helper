<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Contracts\Comment;

use Xin\Contracts\Foundation\Repository as BaseRepository;

interface Repository extends BaseRepository{
	
	/**
	 * get recommend comments by item id.
	 *
	 * @param $itemId
	 * @return mixed
	 */
	public function getRecommendByItem($itemId);
}
