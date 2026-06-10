<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface
{

	/**
	 * @inheritDoc
	 */
	public function getGlobals(): array
	{
		return [
			'date' => date('Y'),
		];
	}
}