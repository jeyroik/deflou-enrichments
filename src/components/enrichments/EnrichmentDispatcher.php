<?php
namespace deflou\components\enrichments;

use deflou\interfaces\enrichments\IEnrichmentDispatcher;
use extas\components\Item;
use extas\components\players\THasPlayer;
use extas\components\samples\parameters\THasSampleParameters;
use extas\components\THasAliases;
use extas\components\THasValue;

/**
 * Class EnrichmentDispatcher
 *
 * @package deflou\components\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
abstract class EnrichmentDispatcher extends Item implements IEnrichmentDispatcher
{
    use THasAliases;
    use THasValue;
    use THasPlayer;
    use THasSampleParameters;

    /**
     * @return mixed
     */
    public abstract function __invoke();

    /**
     * @param $value
     *
     * @return bool
     */
    public function canBeAppliedTo($value): bool
    {
        $markers = $this->getAliases();

        foreach ($markers as $marker) {
            if (strpos($value, '@' . $marker) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array [paramName => paramValue]
     */
    public function getEventParameters(): array
    {
        return $this->config[static::FIELD__EVENT_PARAMETERS] ?? [];
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.enrichment.dispatcher';
    }
}
