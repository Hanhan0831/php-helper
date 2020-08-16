<?php
/**
 * Talents come from diligence, and knowledge is gained by accumulation.
 *
 * @author: 晋<657306123@qq.com>
 */

use Illuminate\Support\HigherOrderTapProxy;

if(!function_exists('value')){
	/**
	 * Return the default value of the given value.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	function value($value){
		return $value instanceof Closure ? $value() : $value;
	}
}

if(!function_exists('windows_os')){
	/**
	 * Determine whether the current environment is Windows based.
	 *
	 * @return bool
	 */
	function windows_os(){
		return strtolower(substr(PHP_OS, 0, 3)) === 'win';
	}
}

if(!function_exists('blank')){
	/**
	 * Determine if the given value is "blank".
	 *
	 * @param mixed $value
	 * @return bool
	 */
	function blank($value){
		if(is_null($value)){
			return true;
		}
		
		if(is_string($value)){
			return trim($value) === '';
		}
		
		if(is_numeric($value) || is_bool($value)){
			return false;
		}
		
		if($value instanceof Countable){
			return count($value) === 0;
		}
		
		return empty($value);
	}
}

if(!function_exists('object_get')){
	/**
	 * Get an item from an object using "dot" notation.
	 *
	 * @param object $object
	 * @param string $key
	 * @param mixed  $default
	 * @return mixed
	 */
	function object_get($object, $key, $default = null){
		if(is_null($key) || trim($key) == ''){
			return $object;
		}
		
		foreach(explode('.', $key) as $segment){
			if(!is_object($object) || !isset($object->{$segment})){
				return value($default);
			}
			
			$object = $object->{$segment};
		}
		
		return $object;
	}
}

if(!function_exists('tap')){
	/**
	 * Call the given Closure with the given value then return the value.
	 *
	 * @param mixed         $value
	 * @param callable|null $callback
	 * @return mixed
	 */
	function tap($value, $callback = null){
		if(is_null($callback)){
			return new HigherOrderTapProxy($value);
		}
		
		$callback($value);
		
		return $value;
	}
}

if(!function_exists('build_mysql_distance_field')){
	/**
	 * 生成计算位置字段
	 *
	 * @param float  $longitude
	 * @param float  $latitude
	 * @param string $lng_name
	 * @param string $lat_name
	 * @param string $as_name
	 * @return string
	 */
	function build_mysql_distance_field($longitude, $latitude, $lng_name = 'longitude', $lat_name = 'latitude', $as_name = 'distance'){
		return "ROUND(6378.138*2*ASIN(SQRT(POW(SIN(({$latitude}*PI()/180-{$lat_name}*PI()/180)/2),2)+COS({$latitude}*PI()/180)*COS({$lat_name}*PI()/180)*POW(SIN(({$longitude}*PI()/180-{$lng_name}*PI()/180)/2),2)))*1000) AS {$as_name}";
	}
}
if(!function_exists('analysis_words')){
	/**
	 * 关键字分词
	 *
	 * @param string $keyword
	 * @param int    $num 最大返回条数
	 * @param int    $holdLength 保留字数
	 * @return array
	 */
	function analysis_words($keyword, $num = 5, $holdLength = 48){
		if($keyword === null || $keyword === "") return [];
		if(mb_strlen($keyword) > $holdLength) $keyword = mb_substr($keyword, 0, 48);
		
		//执行分词
		$pa = new \xin\analysis\Analysis('utf-8', 'utf-8');
		$pa->setSource($keyword);
		$pa->startAnalysis();
		$result = $pa->getFinallyResult($num);
		if(empty($result)) return [$keyword];
		
		return array_unique($result);
	}
}

if(!function_exists('build_keyword_sql')){
	/**
	 * 编译查询关键字SQL
	 *
	 * @param string $keywords
	 * @return array
	 */
	function build_keyword_sql($keywords){
		$keywords = analysis_words($keywords);
		return array_map(function($item){
			return "%{$item}%";
		}, $keywords);
	}
}
