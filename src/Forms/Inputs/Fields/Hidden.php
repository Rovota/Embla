<?php

/**
 * @author      Software Department <developers@rovota.com>
 * @copyright   Copyright (c), Rovota
 * @license     MIT
 */

namespace Rovota\Embla\Forms\Inputs\Fields;

use Rovota\Embla\Forms\Inputs\Enums\InputType;

class Hidden extends Base
{

	public function __construct()
	{
		parent::__construct();

		if (isset($this->attributes['type']) === false) {
			$this->type(InputType::Hidden);
		}
	}

}