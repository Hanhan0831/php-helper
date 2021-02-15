<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Contracts\Menu;

interface Repository{
	
	/**
	 * 获取所有菜单
	 *
	 * @return mixed
	 */
	public function all();
	
	/**
	 * 获取菜单
	 *
	 * @param mixed $user
	 * @return mixed
	 */
	public function get($user);
	
	/**
	 * 写入一组菜单
	 *
	 * @param array $menus
	 * @param array $append
	 * @return bool
	 */
	public function puts($menus, $append = []);
	
	/**
	 * 移除菜单
	 *
	 * @param mixed $condition
	 */
	public function forget($condition);
	
}
