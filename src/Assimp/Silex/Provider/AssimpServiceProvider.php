<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2013 Marco Graetsch <magdev3.0@googlemail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    magdev
 * @copyright 2013 Marco Graetsch <magdev3.0@googlemail.com>
 * @package
 * @license   http://opensource.org/licenses/MIT MIT License
 */


namespace Assimp\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Assimp\Command\CommandExecutor;
use Assimp\Silex\Converter\FileConverter;

/**
 * Silex service provider to integrate magdev/php-assimp library.
 *
 * @author magdev
 */
class AssimpServiceProvider implements ServiceProviderInterface
{
    public function boot(Application $app)
    {
    	
    }

    public function register(Application $app)
    {
        $app['assimp'] = $app->share(function(Application $app) {
	        if (!isset($app['assimp.bin_path'])) {
	            $app['assimp.bin_path'] = null;
	        }
            return new CommandExecutor($app['assimp.bin_path']);
        });
        
        $app['assimp.converter'] = $app->share(function(Application $app) {
        	return new FileConverter($app);
        });
    }
}