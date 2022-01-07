<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Auth\Events;

class LoginFailed {

	/**
	 * The authentication guard name.
	 *
	 * @var string
	 */
	public $guard;

	/**
	 * The user the attempter was trying to authenticate as.
	 *
	 * @var \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public $user;

	/**
	 * The credentials provided by the attempter.
	 *
	 * @var array
	 */
	public $credentials;

	/**
	 * Create a new event instance.
	 *
	 * @param string                                          $guard
	 * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
	 * @param array                                           $credentials
	 * @return void
	 */
	public function __construct($guard, $user, $credentials) {
		$this->user = $user;
		$this->guard = $guard;
		$this->credentials = $credentials;
	}

}
