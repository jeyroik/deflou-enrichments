<?php
namespace deflou\components\enrichments;

/**
 * Class EnrichmentRegularExpression
 *
 * @package deflou\components\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
class EnrichmentRegularExpression extends EnrichmentDispatcher
{
    protected const PARAM__MARKER = 'marker';

    /**
     * @param null $value
     * @return array|mixed|null
     */
    public function __invoke($value = null)
    {
        $value = $value ?: $this->getValue();

        if (is_string($value)) {
            $marker = $this->getParameter(static::PARAM__MARKER);
            preg_match('/\@(.*?)\.' . $marker->getValue() . '\((.*)\)$/m', $value, $matches);

            if (!empty($matches)) {
                $eventParameterName = $matches[1];
                $expression = $matches[2];
                $eventParameters = $this->getEventParameters();
                if (isset($eventParameters[$eventParameterName])) {
                    preg_match($expression, $eventParameters[$eventParameterName], $matches);
                    if (!empty($matches)) {
                        return array_pop($matches);
                    }
                }
            }
        } elseif (is_array($value)) {
            foreach ($value as $index => $subValue) {
                $value[$index] = $this->__invoke($subValue);
            }
        }

        return $value;
    }

    /**
     * @param $value
     * @return bool
     */
    public function canBeAppliedTo($value): bool
    {
        $eventParameters = $this->getEventParameters();
        $aliases = [];

        foreach ($eventParameters as $name => $value) {
            $aliases[] = $name . '.match';
        }

        $this->setAliases($aliases);

        return parent::canBeAppliedTo($value);
    }
}
