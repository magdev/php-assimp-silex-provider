# Silex Service-Provider for magdev/php-assimp

##Installation

Add it using [composer](http://getcomposer.org/) :

```json
{
    "require": {
        "magdev/php-assimp-silex-provider": "dev-master"
    }
}
```

##Usage

```php
use Silex\Application;
use Assimp\Silex\Provider\AssimpServiceProvider;

$app = new Application();
$app->register(new AssimpServiceProvider(), array(
    'assimp.bin_path' => '/path/to/assimp'
));

```

##License

This is released under the MIT license