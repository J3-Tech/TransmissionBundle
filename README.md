# TransmissionBundle

## Installation

using [Composer](https://getcomposer.org):

```json
{
    "require": {
        "chellem/transmission-bundle": "dev-master"
    }
}
```

## CONFIGURATION
Register the bundle:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
		// ...
		new new Transmission\Bundle\TransmissionBundle\TransmissionBundle(),
	);
	// ...
}
```

Configuration in your config.yml:

```yaml
# app/config/config.yml
transmission: ~
```

## Usage as service

...php
$transmission=$this->container->get('transmission');
$torrents = $transmission->all();
$torrent  = $transmission->get(1);
...

You can use any other methods available through [transmission-php](https://github.com/kleiram/transmission-php)