<?php

namespace Xin\Thinkphp\Cache;

use think\Cache;
use Xin\Support\Traits\InteractsWithTime;

class RateLimiter
{

	use InteractsWithTime;

	/**
	 * The cache store implementation.
	 *
	 * @var Cache
	 */
	protected $cache;

	/**
	 * Create a new rate limiter instance.
	 *
	 * @param Cache $cache
	 * @return void
	 */
	public function __construct(Cache $cache)
	{
		$this->cache = $cache;
	}

	/**
	 * Determine if the given key has been "accessed" too many times.
	 *
	 * @param string $key
	 * @param int $maxAttempts
	 * @return bool
	 */
	public function tooManyAttempts($key, $maxAttempts)
	{
		if ($this->attempts($key) >= $maxAttempts) {
			if ($this->cache->has($key . ':timer')) {
				return true;
			}

			$this->resetAttempts($key);
		}

		return false;
	}

	/**
	 * Increment the counter for a given key for a given decay time.
	 *
	 * @param string $key
	 * @param int $decaySeconds
	 * @return int
	 */
	public function hit($key, $decaySeconds = 60)
	{
		$this->cache->set(
			$key . ':timer', $this->availableAt($decaySeconds), $decaySeconds
		);

		$added = $this->cache->set($key, 0, $decaySeconds);

		$hits = (int)$this->cache->inc($key);

		if (!$added && $hits == 1) {
			$this->cache->set($key, 1, $decaySeconds);
		}

		return $hits;
	}

	/**
	 * Get the number of attempts for the given key.
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function attempts($key)
	{
		return $this->cache->get($key, 0);
	}

	/**
	 * Reset the number of attempts for the given key.
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function resetAttempts($key)
	{
		return $this->cache->delete($key);
	}

	/**
	 * Get the number of retries left for the given key.
	 *
	 * @param string $key
	 * @param int $maxAttempts
	 * @return int
	 */
	public function retriesLeft($key, $maxAttempts)
	{
		$attempts = $this->attempts($key);

		return $maxAttempts - $attempts;
	}

	/**
	 * Clear the hits and lockout timer for the given key.
	 *
	 * @param string $key
	 * @return void
	 */
	public function clear($key)
	{
		$this->resetAttempts($key);

		$this->cache->delete($key . ':timer');
	}

	/**
	 * Get the number of seconds until the "key" is accessible again.
	 *
	 * @param string $key
	 * @return int
	 */
	public function availableIn($key)
	{
		return $this->cache->get($key . ':timer') - $this->currentTime();
	}

}
