<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */
namespace Xin\Thinkphp\Facade;

use think\Facade;
use think\facade\Route;
use Xin\Thinkphp\Plugin\PluginDispatch;

/**
 * @method bool has($plugin) static
 * @method \Xin\Contracts\Plugin\PluginInfo plugin($plugin) static
 * @method string pluginClass($plugin) static
 * @method string controllerClass($plugin, $controller, $layer = 'controller') static
 * @method mixed invoke(\think\Request $request, $plugin, $controller, $action) static
 * @method \Xin\Contracts\Plugin\PlugLazyCollection lists() static
 * @method void boot() static
 * @method string rootPath($path = '') static
 * @method string path($path = '') static
 */
class Plugin extends Facade{

	/**
	 * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
	 *
	 * @access protected
	 * @return string
	 */
	protected static function getFacadeClass(){
		return 'PluginManager';
	}

	/**
	 * 路由到自定义调度对象
	 *
	 * @param callable $pluginBootCallback
	 */
	public static function routes($pluginBootCallback = null){
		Route::any('plugin/:plugin/:controller/[:action]', PluginDispatch::class);
		PluginDispatch::$pluginBootCallback = $pluginBootCallback;
	}

}
