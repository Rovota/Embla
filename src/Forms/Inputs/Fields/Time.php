<?php

/**
 * @author      Software Department <developers@rovota.com>
 * @copyright   Copyright (c), Rovota
 * @license     MIT
 */

namespace Rovota\Embla\Forms\Inputs\Fields;

use Rovota\Embla\Forms\Inputs\Enums\InputType;

class Time extends Base
{

	public function __construct()
	{
		parent::__construct();

		if (isset($this->attributes['type']) === false) {
			$this->type(InputType::Time);
		}
	}

	// -----------------
	// Content

	public function value(mixed $value): static
	{
		if ($value !== null) {
			$this->attribute('value', moment($value)->format('H:i'));
		}
		return $this;
	}

	// -----------------
	// Constraints

	public function min(mixed $moment): static
	{
		$this->attribute('min', moment($moment)->format('H:i'));
		return $this;
	}

	public function max(mixed $moment): static
	{
		$this->attribute('max', moment($moment)->format('H:i'));
		return $this;
	}

	public function step(int $days = 1): static
	{
		$this->attribute('step', abs($days));
		return $this;
	}

}