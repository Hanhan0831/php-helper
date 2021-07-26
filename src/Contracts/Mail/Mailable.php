<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */
namespace Xin\Contracts\Mail;

use Illuminate\Contracts\Queue\Factory as Queue;

interface Mailable{

	/**
	 * Send the message using the given mailer.
	 *
	 * @param \Illuminate\Contracts\Mail\Mailer $mailer
	 * @return void
	 */
	public function send(Mailer $mailer);

	/**
	 * Queue the given message.
	 *
	 * @param \Illuminate\Contracts\Queue\Factory $queue
	 * @return mixed
	 */
	public function queue(Queue $queue);

	/**
	 * Deliver the queued message after the given delay.
	 *
	 * @param \DateTimeInterface|\DateInterval|int $delay
	 * @param \Illuminate\Contracts\Queue\Factory  $queue
	 * @return mixed
	 */
	public function later($delay, Queue $queue);
}
