# deflou-enrichments

Enrichments package for DeFlou.

# install

`# vendor/bin/extas i`

# usage

```php
/**
 * @var $repo IEnrichmentRepository
 * @var $enrichments IEnrichment[]
 */
$repo = SystemContainer::getItem(IEnrichmentRepository::class);
$enrichments = $repo->all([]);
$value = 'My value to enrich on @date(Y-m-d H:i:s)';

foreach ($enrichments as $enrichment) {
    $value = $enrichment->enrich(
        $value,
        null,
        ['message' => 'test param value']
    );
}

echo $value;
```