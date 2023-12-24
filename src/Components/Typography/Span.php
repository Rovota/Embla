<?php

/**
 * @author      Software Department <developers@rovota.com>
 * @copyright   Copyright (c), Rovota
 * @license     MIT
 */

namespace Rovota\Embla\Components\Typography;

use Rovota\Embla\Components\Component;

class Span extends Component
{

	public function __construct()
	{
		parent::__construct('span');
	}

	// -----------------
	// Content

	public static function content(string $text, array|object $args = []): static
	{
		$component = new static;
		$component->withText($text, $args);
		return $component;
	}

}