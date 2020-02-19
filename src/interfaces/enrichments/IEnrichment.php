<?php
namespace deflou\interfaces\enrichments;

use extas\interfaces\IHasAliases;
use extas\interfaces\IHasClass;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\players\IPlayer;
use extas\interfaces\samples\parameters\IHasSampleParameters;

/**
 * Interface IEnrichment
 *
 * @package deflou\interfaces\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IEnrichment extends IItem, IHasName, IHasDescription, IHasClass, IHasAliases, IHasSampleParameters
{
    public const SUBJECT = 'deflou.enrichment';

    /**
     * @param mixed $value
     * @param IPlayer $player
     * @param array $eventParameters
     * @return mixed
     */
    public function enrich($value, IPlayer $player, array $eventParameters);
}
