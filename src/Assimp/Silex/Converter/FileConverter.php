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


namespace Assimp\Silex\Converter;

use Silex\Application;
use Assimp\Command\Verbs\ExportVerb;

/**
 * Assimp File Converter
 *
 * @author magdev
 */
class FileConverter
{
    /** @var \Silex\Application */
    private $app = null;
    
    
    /**
     * Constructor
     *
     * @param \Silex\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    
    /**
     * Convert 3D files
     *
     * @param string $file
     * @param string $format
     * @param array $parameters
     * @param string $outputDir
     * @return \Assimp\Command\Verbs\ExportVerb
     */
    public function convert($file, $format = 'stl', array $parameters = array(), $outputDir = null)
    {
        if (is_null($outputDir)) {
            $outputDir = sys_get_temp_dir();
        }
        
        $filename = basename($file, substr($file, strrpos($file, '.')));
        $outputFile = $outputDir.'/'.$filename.'.'.$format;
        
        $verb = new ExportVerb();
        $verb->setOutputFile($outputFile)
            ->setFormat($format)
            ->setFile($file)
            ->setParameters($parameters);
        $this->app['assimp']->execute($verb);
        return $verb;
    }
}