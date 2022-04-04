<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

namespace Xin\Thinkphp\Filesystem;

use think\db\Query;
use think\facade\Db;
use Xin\Capsule\Service;
use Xin\Contracts\Uploader\UploadProvider as UploadProviderContract;
use Xin\Support\Arr;

class UploadProvider extends Service implements UploadProviderContract
{
	/**
	 * @inheritDoc
	 */
	public function getByMd5($scene, $md5)
	{
		return (array)$this->query()->where('type', $scene)->where('md5', $md5)->find();
	}

	/**
	 * @inheritDoc
	 */
	public function getBySha1($scene, $sha1)
	{
		return (array)$this->query()->where('type', $scene)->where('sha1', $sha1)->find();
	}

	/**
	 * @inheritDoc
	 */
	public function getByETag($scene, $etag)
	{
		return (array)$this->query()->where('type', $scene)->where('etag', $etag)->find();
	}

	/**
	 * @inheritDoc
	 */
	public function save($scene, array $data)
	{
		$saveData = array_merge([
			'type' => $scene,
		], Arr::except($data, ['key']));
		$saveData['id'] = $this->query()->insertGetId($saveData);

		return $saveData;
	}

	/**
	 * @return Query
	 */
	protected function query()
	{
		if (isset($this->config['model'])) {
			$class = $this->config['model'];
			return (new $class)->db();
		}

		$name = isset($this->config['name']) ? $this->config['name'] : 'file';

		return Db::name($name);
	}
}