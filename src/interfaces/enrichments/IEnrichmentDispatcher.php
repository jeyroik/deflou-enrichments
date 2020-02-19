<?php
namespace deflou\interfaces\enrichments;

use extas\interfaces\IHasAliases;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\samples\parameters\IHasSampleParameters;

/**
 * Interface IEnrichmentDispatcher
 *
 * @package deflou\interfaces\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IEnrichmentDispatcher extends IItem, IHasAliases, IHasPlayer, IHasValue, IHasSampleParameters
{
    public const SUBJECT = 'deflou.enrichment.dispatcher';

    public const FIELD__EVENT_PARAMETERS = 'event_parameters';

    /**
     * @return mixed
     */
    public function __invoke();

    /**
     * @param $value
     *
     * @return bool
     */
    public function canBeAppliedTo($value): bool;

    /**
     * @return array
     */
    public function getEventParameters(): array;
}
