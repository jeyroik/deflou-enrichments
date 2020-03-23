<?php
namespace deflou\components\enrichments;

use extas\components\repositories\Repository;

/**
 * Class EnrichmentRepository
 *
 * @package deflou\components\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
class EnrichmentRepository extends Repository
{
    protected string $itemClass = Enrichment::class;
    protected string $pk = Enrichment::FIELD__NAME;
    protected string $name = 'enrichments';
    protected string $scope = 'deflou';
    protected string $idAs = '';
}
