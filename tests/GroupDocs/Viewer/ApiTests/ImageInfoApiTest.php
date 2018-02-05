<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="ImageInfoApiTest.php">
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

class ImageInfoApiTest extends BaseApiTest
{
    /**
     * Test case for imageGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testImageGetDocumentInfo()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\ImageGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
        
        $this->assertEquals(4, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("four-pages.docx", $response->getFileName());
    }

    /**
     * Test case for imageGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testImageGetDocumentInfoWithRenderHiddenPages()
    {
        $file = Internal\TestFiles::getFileTwoHiddenPagesVsd();
        
        $request = new Requests\ImageGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        $request->renderHiddenPages = true;
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
        
        $this->assertEquals(3, count($response->getPages()));
        $this->assertEquals(".vsd", $response->getExtension());
        $this->assertEquals("two-hidden-pages.vsd", $response->getFileName());
    }

    /**
     * Test case for imageGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testImageGetDocumentInfoWithExtractText()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        
        $request = new Requests\ImageGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        $request->extractText = true;
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("one-page.docx", $response->getFileName());

        $pageRows = $response->getPages()[0]->getRows();
        $this->assertTrue(count($pageRows) > 0);
        foreach ($pageRows as $key => $pageRow) {
            $this->assertNotEmpty($pageRow->getText());
            $this->assertTrue($pageRow->getRowHeight() > 0);
            $this->assertTrue($pageRow->getRowWidth() > 0);
            $this->assertTrue($pageRow->getRowLeft() > 0);
            $this->assertTrue($pageRow->getRowTop() > 0);
            $this->assertTrue(count($pageRow->getTextCoordinates()) > 0);
            $this->assertTrue(count($pageRow->getCharacterCoordinates()) > 0);
        }
    }

    /**
    * Test case for imageGetDocumentInfo
    *
    * Retrieves document information.
    *
    */
    public function testImageGetDocumentInfoReturnsFileNotFound()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/FileNotFound/");

        $request = new Requests\ImageGetDocumentInfoRequest("file-not-found.docx");
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
    }

    /**
    * Test case for imageGetDocumentInfo
    *
    * Retrieves document information.
    *
    */
    public function testImageGetDocumentInfoReturnsMissingPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/MissingPassword/");

        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $request = new Requests\ImageGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
    }

    /**
      * Test case for imageGetDocumentInfo
      *
      * Retrieves document information.
      *
      */
    public function testImageGetDocumentInfoReturnsIncorrectPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/IncorrectPassword/");

        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $request = new Requests\ImageGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        $request->password = "not-a-password";
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
    }

    /**
     * Test case for imageGetDocumentInfo
     *
     * Retrieves document information.
     *
     */
    public function testImageGetDocumentInfoReturnsFailedToReadFile()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/FailedToReadFile/");

        $file = Internal\TestFiles::getFileCorruptedPdf();

        $request = new Requests\ImageGetDocumentInfoRequest($file->fileName);
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->imageGetDocumentInfo($request);
    }

    /**
      * Test case for imageGetDocumentInfoFromUrl
      *
      * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
      *
      */
    public function testImageGetDocumentInfoFromUrl()
    {
        $file = Internal\TestFiles::getFileFromUrlOnePageDocx();

        $request = new Requests\ImageGetDocumentInfoFromUrlRequest($file->url);
        $request->fileName = $file->fileName;
        $request->folder = self::$fromUrlFolder;
        
        $response = self::$viewerApi->imageGetDocumentInfoFromUrl($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("one-page.docx", $response->getFileName());
    }

    /**
     * Test case for imageGetDocumentInfoFromUrl
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testImageGetDocumentInfoFromUrlReturnsFailedToParseUrl()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/FailedToParseUrl/");

        $request = new Requests\ImageGetDocumentInfoFromUrlRequest("invalid-url");
        
        $response = self::$viewerApi->imageGetDocumentInfoFromUrl($request);
    }

    /**
     * Test case for imageGetDocumentInfoWithOptions
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     */
    public function testImageGetDocumentInfoWithOptions()
    {
        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $documentInfoOptions = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $documentInfoOptions->setPassword($file->password);

        $request = new Requests\ImageGetDocumentInfoWithOptionsRequest($file->fileName);
        $request->documentInfoOptions = $documentInfoOptions;
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->imageGetDocumentInfoWithOptions($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("password-protected.docx", $response->getFileName());
    }

    /**
     * Test case for imageGetDocumentInfoWithOptions
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     */
    public function testImageGetDocumentInfoWithOptionsWithExtractText()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();

        $documentInfoOptions = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $documentInfoOptions->setExtractText(true);

        $request = new Requests\ImageGetDocumentInfoWithOptionsRequest($file->fileName);
        $request->documentInfoOptions = $documentInfoOptions;
        $request->folder = $file->folder;
        
        $response = self::$viewerApi->imageGetDocumentInfoWithOptions($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("one-page.docx", $response->getFileName());

        $pageRows = $response->getPages()[0]->getRows();
        $this->assertTrue(count($pageRows) > 0);
        foreach ($pageRows as $key => $pageRow) {
            $this->assertNotEmpty($pageRow->getText());
            $this->assertTrue($pageRow->getRowHeight() > 0);
            $this->assertTrue($pageRow->getRowWidth() > 0);
            $this->assertTrue($pageRow->getRowLeft() > 0);
            $this->assertTrue($pageRow->getRowTop() > 0);
            $this->assertTrue(count($pageRow->getTextCoordinates()) > 0);
            $this->assertTrue(count($pageRow->getCharacterCoordinates()) > 0);
        }
    }

    /**
     * Test case for imageGetDocumentInfoFromContent
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testImageGetDocumentInfoFromContent()
    {
        $file = Internal\TestFiles::getFilePasswordProtectedDocx();

        $options = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $options->setPassword($file->password);

        $testFilePath = self::getTestFilePath($file);
        list($optionsFile, $optionsFilePath) = self::serializeObject($options);

        $request = new Requests\ImageGetDocumentInfoFromContentRequest(
            $testFilePath,
            $optionsFilePath
        );
        $request->folder = self::$fromContentFolder;
        
        $response = self::$viewerApi->imageGetDocumentInfoFromContent($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
    }

    /**
     * Test case for imageGetDocumentInfoFromUrlWithOptions
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testImageGetDocumentInfoFromUrlWithOptions()
    {
        $file = Internal\TestFiles::getFileFromUrlWithNotesPptx();

        $options = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $options->slidesOptions = new \GroupDocs\Viewer\Model\SlidesOptions();
        $options->slidesOptions->setRenderNotes(true);

        $request = new Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest($file->url);
        $request->fileName = $file->fileName;
        $request->folder = self::$fromUrlFolder;
        $request->documentInfoOptions = $options;
        
        $response = self::$viewerApi->imageGetDocumentInfoFromUrlWithOptions($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".pptx", $response->getExtension());
        $this->assertEquals("with-notes.pptx", $response->getFileName());
    }
}
