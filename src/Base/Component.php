<?php

/**
 * @copyright   Léandro Tijink
 * @license     MIT
 */

namespace Rovota\Embla\Base;

use Rovota\Embla\Base\Traits\ComponentChildren;
use Rovota\Embla\Base\Traits\ComponentData;
use Rovota\Framework\Structures\Basket;
use Rovota\Framework\Support\Str;
use Rovota\Framework\Support\Traits\Conditionable;
use Stringable;

abstract class Component implements Stringable
{
	use Conditionable;
	use ComponentChildren;
	use ComponentData;

	// -----------------

	protected Component|null $parent;

	protected ComponentConfig $config;

	// -----------------

	public Basket $children;

	public Basket $variables;

	public Basket $attributes;

	public Basket $classes;

	// -----------------

	public function __construct(Component|null $parent = null)
	{
		$this->parent = $parent;
		$this->config = new ComponentConfig();

		$this->children = new Basket();
		$this->variables = new Basket();
		$this->attributes = new Basket();
		$this->classes = new Basket();

//		$this->classes->append('accent-auto');
//		$this->attributes->set('type', 'submit');
//		$this->attributes->append('required');

		$this->configuration();
	}

	public function __toString(): string
	{
		return $this->render();
	}

	// -----------------

	public function setParent(Component|null $parent): static
	{
		$this->parent = $parent;
		return $this;
	}

	public function getParent(): Component|null
	{
		return $this->parent;
	}

	// -----------------

	public function getConfig(): ComponentConfig
	{
		return $this->config;
	}

	// -----------------

	public static function make(): static
	{
		return new static();
	}

	// -----------------

	// -----------------

	// -----------------

	// -----------------

	// -----------------

	protected function render(): string
	{
		$this->prepareRender();

		$fragments = Basket::from([
			'opening' => sprintf('<%s', $this->config->tag),
			'attributes' => $this->getFormattedAttributes(),
			'classes' => $this->getFormattedClasses(),
		])->filter(function (string $fragment) {
			return strlen($fragment) > 0;
		});

		if ($this->config->self_closing) {
			return $fragments->append('/>')->join(' ');
		}

		if ($this->children->isEmpty()) {
			return $fragments->append('></'.$this->config->tag.'>')->join($fragments->count() === 2 ? '' : ' ');
		}

		// TODO: Apply child components.

		return '';
	}

	// -----------------

	protected function prepareRender(): void
	{

	}

	protected function configuration(): void
	{

	}

	// -----------------

	private function getFormattedAttributes(): string
	{
		$attributes = new Basket();

		foreach ($this->attributes as $name => $value) {
			if (is_int($name)) {
				$attributes->append(Str::escape($value));
				continue;
			}

			$attributes->append(sprintf('%s="%s"', $name, Str::escape($value)));
		}

		return trim($attributes->join(' '));
	}

	private function getFormattedClasses(): string
	{
		if ($this->classes->isEmpty()) {
			return '';
		}

		return sprintf('class"%s"', $this->classes->join(' '));
	}


}