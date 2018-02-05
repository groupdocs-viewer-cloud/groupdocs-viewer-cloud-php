<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="HtmlInfoApiTest.php">
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

class HtmlInfoApiTest extends BaseApiTest
{
    /**
     * Test case for htmlGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testHtmlGetDocumentInfo()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\HtmlGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->htmlGetDocumentInfo($request);
        
        $this->assertEquals(4, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("four-pages.docx", $response->getFileName());
    }

    /**
     * Test case for htmlGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testHtmlGetDocumentInfoWithRenderHiddenPages()
    {
        $file = Internal\TestFiles::getFileTwoHiddenPagesVsd();
        
        $request = new Requests\HtmlGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        $request->renderHiddenPages = true;
        
        $response = self::$viewerApi->htmlGetDocumentInfo($request);
        
        $this->assertEquals(3, count($response->getPages()));
        $this->assertEquals(".vsd", $response->getExtension());
        $this->assertEquals("two-hidden-pages.vsd", $response->getFileName());
    }

    /**
    * Test case for htmlGetDocumentInfo
    *
    * Retrieves document information.
    *
    */
    public function testHtmlGetDocumentInfoReturnsFileNotFound()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/FileNotFound/");

        $request = new Requests\HtmlGetDocumentInfoRequest("file-not-found.docx");
        
        $response = self::$viewerApi->htmlGetDocumentInfo($request);
    }

    /**
    * Test case for htmlGetDocumentInfo
    *
    * Retrieves document information.
    *
    */
    public function testHtmlGetDocumentInfoReturnsMissingPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/MissingPassword/");

        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $request = new Requests\HtmlGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->htmlGetDocumentInfo($request);
    }

    /**
      * Test case for htmlGetDocumentInfo
      *
      * Retrieves document information.
      *
      */
    public function testHtmlGetDocumentInfoReturnsIncorrectPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/IncorrectPassword/");

        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $request = new Requests\HtmlGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        $request->password = "not-a-password";
        
        $response = self::$viewerApi->htmlGetDocumentInfo($request);
    }

    /**
     * Test case for htmlGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testHtmlGetDocumentInfoReturnsFailedToReadFile()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/FailedToReadFile/");

        $file = Internal\TestFiles::getFileCorruptedPdf();

        $request = new Requests\HtmlGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->htmlGetDocumentInfo($request);
    }

    /**
      * Test case for htmlGetDocumentInfoFromUrl
      *
      * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
      *
      */
    public function testHtmlGetDocumentInfoFromUrl()
    {
        $file = Internal\TestFiles::getFileFromUrlOnePageDocx();

        $request = new Requests\HtmlGetDocumentInfoFromUrlRequest($file->url);
        $request->fileName = $file->fileName;
        $request->folder = self::$fromUrlFolder;
        
        $response = self::$viewerApi->htmlGetDocumentInfoFromUrl($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("one-page.docx", $response->getFileName());
    }

    /**
     * Test case for htmlGetDocumentInfoFromUrl
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testHtmlGetDocumentInfoFromUrlReturnsFailedToParseUrl()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/FailedToParseUrl/");

        $request = new Requests\HtmlGetDocumentInfoFromUrlRequest("invalid-url");
        
        $response = self::$viewerApi->htmlGetDocumentInfoFromUrl($request);
    }

    /**
     * Test case for htmlGetDocumentInfoWithOptions
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     */
    public function testHtmlGetDocumentInfoWithOptions()
    {
        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $documentInfoOptions = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $documentInfoOptions->setPassword($file->password);

        $request = new Requests\HtmlGetDocumentInfoWithOptionsRequest($file->fileName);
        $request->folder = $file->folder;
        $request->documentInfoOptions = $documentInfoOptions;
        
        $response = self::$viewerApi->htmlGetDocumentInfoWithOptions($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("password-protected.docx", $response->getFileName());
    }

    /**
     * Test case for htmlGetDocumentInfoFromContent
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testHtmlGetDocumentInfoFromContent()
    {
        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $documentInfoOptions = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $documentInfoOptions->setPassword($file->password);

        $testFilePath = self::getTestFilePath($file);
        list($optionsFile, $optionsFilePath) = self::serializeObject($documentInfoOptions);

        $request = new Requests\HtmlGetDocumentInfoFromContentRequest(
            $testFilePath,
            $optionsFilePath
        );
        $request->folder = self::$fromContentFolder;
        
        $response = self::$viewerApi->htmlGetDocumentInfoFromContent($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
    }

    /**
     * Test case for htmlGetDocumentInfoFromUrlWithOptions
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testHtmlGetDocumentInfoFromUrlWithOptions()
    {
        $file = Internal\TestFiles::getFileFromUrlWithNotesPptx();

        $documentInfoOptions = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $documentInfoOptions->slidesOptions = new \GroupDocs\Viewer\Model\SlidesOptions();
        $documentInfoOptions->slidesOptions->setRenderNotes(true);

        $request = new Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest($file->url);
        $request->fileName = $file->fileName;
        $request->folder = self::$fromUrlFolder;
        $request->documentInfoOptions = $documentInfoOptions;
        
        $response = self::$viewerApi->htmlGetDocumentInfoFromUrlWithOptions($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".pptx", $response->getExtension());
        $this->assertEquals("with-notes.pptx", $response->getFileName());
    }
}
