<?php

/**
 * @copyright   Léandro Tijink
 * @license     MIT
 */

namespace Rovota\Embla\Components\Inputs\Fields;

use Rovota\Embla\Base\Component;
use Rovota\Embla\Components\Inputs\Traits\InputCommons;
use Rovota\Embla\Utilities\Attributes\InputType;

abstract class Base extends Component
{
	use InputCommons;

	// -----------------

	public function __construct(Component|null $parent = null)
	{
		parent::__construct($parent);

		$this->config->tag = 'input';
	}

	// -----------------

	protected function prepareRender(): void
	{
		if ($this->attributes->missing('type') && $this->config->tag === 'input') {
			$this->attribute('type', InputType::Text);
		}
	}

}