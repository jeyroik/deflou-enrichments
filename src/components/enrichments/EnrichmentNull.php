<?php
namespace deflou\components\enrichments;

/**
 * Class EnrichmentNull
 *
 * @package deflou\components\enrichments
 * @author jeyroik <jeyroik@gmail.com>
 */
class EnrichmentNull extends EnrichmentDispatcher
{
    /**
     * @return mixed|null
     */
    public function __invoke()
    {
        $value = $this->getValue();

        if (is_string($value) && (trim($value) == '@null')) {
            return null;
        }

        return $value;
    }
}
