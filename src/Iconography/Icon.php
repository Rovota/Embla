<?php

/**
 * @author      Software Department <developers@rovota.com>
 * @copyright   Copyright (c), Rovota
 * @license     MIT
 */

namespace Rovota\Embla\Iconography;

final class Icon
{

	protected string|null $content = null;

	// -----------------

	public function __construct(string $content)
	{
		$this->content = $this->getFilteredContent($content);
	}

	// -----------------

	public function __toString(): string
	{
		return $this->content;
	}

	// -----------------

	public function color(string $hex): Icon
	{
		$this->content = str_replace('currentColor', strtoupper($hex), $this->content);
		return $this;
	}

	public function className(string $name): Icon
	{
		$this->content = str_replace('icon', trim($name), $this->content);
		return $this;
	}

	// -----------------
	
	protected function getFilteredContent(string $content): string
	{
		$content = str_replace('#323232', 'currentColor', $content);
		$content = str_replace(' version="1.1"', '', $content);
		$content = str_replace(' xmlns="http://www.w3.org/2000/svg"', '', $content);
		$content = str_replace(' xmlns:xlink="http://www.w3.org/1999/xlink"', '', $content);

		return trim($content);
	}

}