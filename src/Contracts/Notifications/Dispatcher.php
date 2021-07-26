<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */
namespace Xin\Contracts\Notifications;

interface Dispatcher{

	/**
	 * Send the given notification to the given notifiable entities.
	 *
	 * @param \Xin\Support\Collection|array|mixed $notifiables
	 * @param mixed                               $notification
	 * @return void
	 */
	public function send($notifiables, $notification);

	/**
	 * Send the given notification immediately.
	 *
	 * @param \Xin\Support\Collection|array|mixed $notifiables
	 * @param mixed                               $notification
	 * @return void
	 */
	public function sendNow($notifiables, $notification);
}
