<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="HtmlPdfApiTest.php">
*   Copyright (c) 2003-2018 Aspose Pty Ltd
* </copyright>
* <summary>
*  Permission is hereby granted, free of charge, to any person obtaining a copy
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
namespace GroupDocs\Viewer\ApiTests;

use GroupDocs\Viewer\ApiTests\Internal;
use GroupDocs\Viewer\Model\Requests;

require_once "BaseApiTest.php";
require_once "Internal\TestFiles.php";

class HtmlPdfApiTest extends BaseApiTest
{
    /**
     * Test case for htmlGetPdfFile
     *
     * Downloads document as PDF.
     *
     */
    public function testHtmlGetPdfFile()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\HtmlGetPdfFileRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->htmlGetPdfFile($request);
        
        $this->assertNotNull($response);
    }

    /**
     * Test case for htmlGetPdfFileFromUrl
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     */
    public function testHtmlGetPdfFileFromUrl()
    {
        $file = Internal\TestFiles::getFileFromUrlOnePageDocx();
        
        $request = new Requests\HtmlGetPdfFileFromUrlRequest($file->url);
        $request->folder = self::$fromUrlFolder;
        
        $response = self::$viewerApi->htmlGetPdfFileFromUrl($request);
        
        $this->assertNotNull($response);
    }
    
    /**
     * Test case for htmlCreatePdfFile
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     */
    public function testHtmlCreatePdfFile()
    {
        $file = Internal\TestFiles::getFilePasswordProtectedDocx();
        
        $pdfFileOptions = new \GroupDocs\Viewer\Model\PdfFileOptions();
        $pdfFileOptions->setPassword($file->password);

        $request = new Requests\HtmlCreatePdfFileRequest(
            $file->fileName,
            $pdfFileOptions
        );
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->htmlCreatePdfFile($request);
        
        $this->assertNotEmpty($response->getFileName());
        $this->assertNotEmpty($response->getFolder());
        $this->assertNotEmpty($response->getPdfFileName());
    }

    /**
     * Test case for htmlCreatePdfFileFromContent
     *
     * Creates PDF document. Removes PDF document if it was created before.
     *
     */
    public function testHtmlCreatePdfFileFromContent()
    {
        $file = Internal\TestFiles::getFilePasswordProtectedDocx();
        
        $pdfFileOptions = new \GroupDocs\Viewer\Model\PdfFileOptions();
        $pdfFileOptions->setPassword($file->password);

        $testFilePath = self::getTestFilePath($file);
        list($optionsFile, $optionsFilePath) = self::serializeObject($pdfFileOptions);

        $request = new Requests\HtmlCreatePdfFileFromContentRequest(
            $testFilePath,
            $optionsFilePath
        );
        $request->folder = self::$fromContentFolder;
        
        $response = self::$viewerApi->htmlCreatePdfFileFromContent($request);
        
        $this->assertNotEmpty($response->getFileName());
        $this->assertNotEmpty($response->getFolder());
        $this->assertNotEmpty($response->getPdfFileName());
    }

    /**
     * Test case for htmlCreatePdfFileFromUrl
     *
     * Creates PDF document for document at provided URL and saves it in cache. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     */
    public function testHtmlCreatePdfFileFromUrl()
    {
        $file = Internal\TestFiles::getFileFromUrlWithNotesPptx();
        
        $pdfFileOptions = new \GroupDocs\Viewer\Model\PdfFileOptions();
        $pdfFileOptions->slidesOptions = new \GroupDocs\Viewer\Model\SlidesOptions();
        $pdfFileOptions->slidesOptions->setRenderNotes(true);

        $request = new Requests\HtmlCreatePdfFileFromUrlRequest(
            $file->url,
            $pdfFileOptions
        );
        $request->folder = self::$fromUrlFolder;
        
        $response = self::$viewerApi->htmlCreatePdfFileFromUrl($request);
        
        $this->assertNotEmpty($response->getFileName());
        $this->assertNotEmpty($response->getFolder());
        $this->assertNotEmpty($response->getPdfFileName());
    }
}
