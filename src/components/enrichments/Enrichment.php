<?php
namespace deflou\components\enrichments;

use deflou\interfaces\enrichments\IEnrichment;
use deflou\interfaces\enrichments\IEnrichmentDispatcher;
use extas\components\Item;
use extas\components\samples\parameters\THasSampleParameters;
use extas\components\THasAliases;
use extas\components\THasClass;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\interfaces\players\IPlayer;

/**
 * Class Enrichment
 *
 * @package deflou\components\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
class Enrichment extends Item implements IEnrichment
{
    use THasName;
    use THasDescription;
    use THasClass;
    use THasAliases;
    use THasSampleParameters;

    /**
     * @param mixed $value
     * @param IPlayer $player
     * @param array $eventParameters
     * @return mixed
     */
    public function enrich($value, IPlayer $player, array $eventParameters)
    {
        /**
         * @var $enrichment IEnrichmentDispatcher
         */
        $currentOptions = $this->__toArray();
        $currentOptions[IEnrichmentDispatcher::FIELD__PLAYER_NAME] = $player->getName();
        $currentOptions[IEnrichmentDispatcher::FIELD__VALUE] = $value;
        $currentOptions[IEnrichmentDispatcher::FIELD__EVENT_PARAMETERS] = $eventParameters;

        $enrichment = $this->buildClassWithParameters($currentOptions);

        return $enrichment->canBeAppliedTo($value) ? $enrichment() : $value;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
