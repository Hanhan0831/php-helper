<?php

namespace Xin\Excel\Concerns;

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

interface WithReadFilter
{

	/**
	 * @return IReadFilter
	 */
	public function readFilter(): IReadFilter;

}
