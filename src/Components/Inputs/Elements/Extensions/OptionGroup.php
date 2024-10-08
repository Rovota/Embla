<?php

/**
 * @copyright   Léandro Tijink
 * @license     MIT
 */

namespace Rovota\Embla\Components\Inputs\Elements\Extensions;

use Rovota\Embla\Components\Inputs\Elements\Group;

class OptionGroup extends Group
{

	protected function configuration(): void
	{
		$this->config->tag = 'optgroup';
	}

	// -----------------
	// Starters

	public static function label(string $text, array|object $data = []): static
	{
		return (new static)->withTranslated($text, $data);
	}

}