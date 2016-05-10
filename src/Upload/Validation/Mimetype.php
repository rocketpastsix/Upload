<?php
/**
 * Upload
 *
 * @author      Josh Lockhart <info@joshlockhart.com>
 * @copyright   2012 Josh Lockhart
 * @link        http://www.joshlockhart.com
 * @version     2.0.0
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace Upload\Validation;

use Upload\ValidationInterface;
/**
 * Validate Upload Media Type
 *
 * This class validates an upload's media type (e.g. "image/png").
 *
 * @author  Josh Lockhart <info@joshlockhart.com>
 * @since   1.0.0
 * @package Upload
 */
class Mimetype implements ValidationInterface
{
    /**
     * Valid media types
     * @var array
     */
    protected $mimetypes;

    /**
     * Constructor
     *
     * @param string|array $mimetypes
     */
    public function __construct($mimetypes)
    {
        if (is_string($mimetypes) === true) {
            $mimetypes = array($mimetypes);
        }
        $this->mimetypes = $mimetypes;
    }

    /**
     * Validate
     *
     * @param  \Upload\FileInfoInterface  $fileInfo
     * @throws \RuntimeException          If validation fails
     */
    public function validate(\Upload\FileInfoInterface $fileInfo)
    {
        if (in_array($fileInfo->getMimetype(), $this->mimetypes) === false) {
            throw new \Upload\Exception(sprintf('Invalid mimetype. Must be one of: %s', implode(', ', $this->mimetypes)), $fileInfo);
        }
    }
}
