<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Thinkphp\Saas\Wechat;

use think\Service;
use Xin\Contracts\Foundation\Wechat as WechatContract;

class WechatServiceProvider extends Service{

	/**
	 * 启动器
	 */
	public function register(){
		$this->app->bind('wechat', WechatContract::class);
		$this->app->bind(WechatContract::class, function(){
			return new Wechat(
				$this->app->config->get('wechat')
			);
		});
	}
}
