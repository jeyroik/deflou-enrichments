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
    protected $selfName = 'enrichment';
    protected $selfSection = 'enrichments';
    protected $selfRepositoryClass = IEnrichmentRepository::class;
    protected $selfItemClass = Enrichment::class;
    protected $selfUID = Enrichment::FIELD__NAME;
}
