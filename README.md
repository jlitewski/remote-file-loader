# RemoteFileLoader

Abstracts remote file loading. Automatically chooses the appropriate method to load remote files.

`file_get_contents` might be unusable because `allow_url_fopen` is disabled.
`curl` might not be available because it's not installed.

## Usage

```php
$factory = new RemoteFileLoaderFactory();

$loader = $factory->createLoader();

$data = $loader->load("http://www.google.de");
```
