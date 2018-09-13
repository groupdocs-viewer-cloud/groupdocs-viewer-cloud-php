<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="HtmlGetPdfFileFromUrlRequest.php">
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
 * Request model for htmlGetPdfFileFromUrl operation.
 */
class HtmlGetPdfFileFromUrlRequest
{
    /*
     * Initializes a new instance of the HtmlGetPdfFileFromUrlRequest class.
     *  
     * @param string $url The URL to retrieve document.
     * @param string $fileName The file name.
     * @param string $password The document password. Not required if PDF document was created before.
     * @param bool $renderComments Allows to render document comments. Not required if PDF document was created before.
     * @param bool $renderHiddenPages Enables rendering of document hidden pages, sheets or slides.
     * @param string $defaultFontName The name of the default font.
     * @param string $fontsFolder The folder with custom fonts in storage.
     * @param string $folder The folder which contains specified file in storage.
     * @param string $storage The file storage which have to be used.
     */
    public function __construct($url, $fileName = null, $password = null, $renderComments = null, $renderHiddenPages = null, $defaultFontName = null, $fontsFolder = null, $folder = null, $storage = null)             
    {
        $this->url = $url;
        $this->fileName = $fileName;
        $this->password = $password;
        $this->renderComments = $renderComments;
        $this->renderHiddenPages = $renderHiddenPages;
        $this->defaultFontName = $defaultFontName;
        $this->fontsFolder = $fontsFolder;
        $this->folder = $folder;
        $this->storage = $storage;
    }

    /*
     * The URL to retrieve document.
     */
    public $url;
	
    /*
     * The file name.
     */
    public $fileName;
	
    /*
     * The document password. Not required if PDF document was created before.
     */
    public $password;
	
    /*
     * Allows to render document comments. Not required if PDF document was created before.
     */
    public $renderComments;
	
    /*
     * Enables rendering of document hidden pages, sheets or slides.
     */
    public $renderHiddenPages;
	
    /*
     * The name of the default font.
     */
    public $defaultFontName;
	
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
