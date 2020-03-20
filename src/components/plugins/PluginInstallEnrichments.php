<?php
namespace deflou\components\plugins;

use deflou\components\enrichments\Enrichment;
use deflou\interfaces\enrichments\IEnrichmentRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallEnrichments
 *
 * @package deflou\components\plugins
 * @author jeyroik <jeyroik@gmail.com>
 */
class PluginInstallEnrichments extends PluginInstallDefault
{
    protected string $selfName = 'enrichment';
    protected string $selfSection = 'enrichments';
    protected string $selfRepositoryClass = IEnrichmentRepository::class;
    protected string $selfItemClass = Enrichment::class;
    protected string $selfUID = Enrichment::FIELD__NAME;
}
