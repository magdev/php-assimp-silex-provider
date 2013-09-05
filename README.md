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

and until this package is registered at Packagist add the repository

```json
{
    "repositories" : [{
            "type" : "vcs",
            "url" : "git@bitbucket.org:magdev/php-assimp-silex-provider.git"
        }
    ]
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