<?php

namespace Xin\Limiter;

use App\Support\GeoUtil;

class LocationLimiter extends AbstractLimiter
{

	/**
	 * @inheritDoc
	 */
	protected function check($data)
	{
		if (!isset($data['lng']) || !isset($data['lat'])) {
			throw new \LogicException('location fail');
		}

		$lng = floatval($data['lng'] ?? 0);
		$lat = floatval($data['lat'] ?? 0);

		if (!GeoUtil::hasRange($lng, $lat, $this->config['lng'], $this->config['lat'], $this->config['range'])) {
			throw new \LogicException("不在活动范围之内！");
		}
	}

}
