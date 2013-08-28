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

###Registering the provider

```php
use Silex\Application;
use Assimp\Silex\Provider\AssimpServiceProvider;

$app = new Application();
$app->register(new AssimpServiceProvider(), array(
    'assimp.bin_path' => '/path/to/assimp'
));
```

###Using the service

```php
use Assimp\Command\Verbs\ListExtensionsVerb;

$verb = new ListExtensionsVerb();
$app['assimp']->execute($verb);
print_r($verb);
```

##License

This is released under the MIT license