<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="ImageCreatePagesCacheFromUrlRequest.php">
 *   Copyright (c) 2003-2018 Aspose Pty Ltd
 * </copyright>
 * <summary>
 *   Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  SOFTWARE.
 * </summary>
 * --------------------------------------------------------------------------------------------------------------------
 */

namespace GroupDocs\Viewer\Model\Requests;

/*
 * Request model for imageCreatePagesCacheFromUrl operation.
 */
class ImageCreatePagesCacheFromUrlRequest
{
    /*
     * Initializes a new instance of the ImageCreatePagesCacheFromUrlRequest class.
     *  
     * @param string $url The URL to retrieve document.
     * @param \GroupDocs\Viewer\Model\ImageOptions $imageOptions The image rendering options.
     * @param string $fileName The file name.
     * @param string $fontsFolder The folder with custom fonts in storage.
     * @param string $folder The folder which contains specified file in storage.
     * @param string $storage The file storage which have to be used.
     */
    public function __construct($url, $imageOptions = null, $fileName = null, $fontsFolder = null, $folder = null, $storage = null)             
    {
        $this->url = $url;
        $this->imageOptions = $imageOptions;
        $this->fileName = $fileName;
        $this->fontsFolder = $fontsFolder;
        $this->folder = $folder;
        $this->storage = $storage;
    }

    /*
     * The URL to retrieve document.
     */
    public $url;
	
    /*
     * The image rendering options.
     */
    public $imageOptions;
	
    /*
     * The file name.
     */
    public $fileName;
	
    /*
     * The folder with custom fonts in storage.
     */
    public $fontsFolder;
	
    /*
     * The folder which contains specified file in storage.
     */
    public $folder;
	
    /*
     * The file storage which have to be used.
     */
    public $storage;
}
