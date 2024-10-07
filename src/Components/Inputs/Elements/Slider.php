<?php

/**
 * @copyright   Léandro Tijink
 * @license     MIT
 */

namespace Rovota\Embla\Components\Inputs\Elements;

use Rovota\Embla\Base\Component;

class Slider extends Component
{

	protected function configuration(): void
	{
		$this->config->tag = 'input-slider';
	}

}