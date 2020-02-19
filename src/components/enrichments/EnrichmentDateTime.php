<?php
namespace deflou\components\enrichments;

use extas\components\Replace;

/**
 * Class EnrichmentDateTime
 *
 * @package deflou\components\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
class EnrichmentDateTime extends EnrichmentDispatcher
{
    protected const PARAM__PATTERN = 'pattern';

    /**
     * @param mixed $value
     * @return array|mixed|string|string[]|null
     */
    public function __invoke($value = null)
    {
        $value = $value ?: $this->getValue();

        if (is_string($value)) {
            $pattern = $this->getParameter(static::PARAM__PATTERN);

            preg_match($pattern->getValue(), $value, $matches);
            if (!empty($matches)) {
                $dateFormat = array_pop($matches);
                return preg_replace($pattern->getValue(), date($dateFormat), $value);
            }
            return $value;
        } elseif (is_array($value)) {
            foreach ($value as $index => $subValue) {
                $value[$index] = $this->__invoke($subValue);
            }
            return $value;
        }

        return $value;
    }
}
