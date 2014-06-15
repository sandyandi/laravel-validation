<?php namespace Sandyandi\Validation;

use Closure;
use Cohensive\Validation\Validator as CohensiveValidator;
use Illuminate\Support\Contracts\MessageProviderInterface;

class Validator extends CohensiveValidator implements MessageProviderInterface
{

	/**
	 * Transform an attribute to colon-notation if a colon exists.
	 * @param  string $attribute
	 * @return string
	 */
	protected function transformAttribute($attribute)
	{
		return strpos($attribute, ':') !== false ? preg_replace('/:((\d+)|(\*)):/', ':', $attribute) : $attribute;
	}

	/**
	 * Get the validation message for an attribute and rule.
	 *
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @return string
	 */
	protected function getMessage($attribute, $rule)
	{
		$attribute = $this->transformAttribute($attribute);

		return parent::getMessage($attribute, $rule);
	}

	/**
	 * Get the displayable name of the attribute.
	 *
	 * @param  string  $attribute
	 * @return string
	 */
	protected function getAttribute($attribute)
	{
		$attribute = $this->transformAttribute($attribute);

		return parent::getAttribute($attribute);
	}

}
