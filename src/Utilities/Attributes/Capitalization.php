<?php

/**
 * @copyright   Léandro Tijink
 * @license     MIT
 */

namespace Rovota\Embla\Utilities\Attributes;

use Rovota\Framework\Support\Traits\EnumHelpers;

enum Capitalization: string
{
	use EnumHelpers;

	case Off = 'off';
	case On = 'on';
	case Words = 'words';
	case Characters = 'characters';

	// -----------------

	public function label(): string
	{
		return match ($this) {
			Capitalization::Off => 'Disabled',
			Capitalization::On => 'Enabled',
			Capitalization::Words => 'Words',
			Capitalization::Characters => 'Characters',
		};
	}
}