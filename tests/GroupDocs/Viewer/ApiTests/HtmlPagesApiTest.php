<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="HtmlPagesApiTest.php">
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

class HtmlPagesApiTest extends BaseApiTest
{
    /**
    * Test case for htmlGetPage
    *
    * Downloads document page as HTML.
    *
    */
    public function testHtmlGetPage()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        $pageNumber = 1;

        $request = new Requests\HtmlGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
            
        $page = self::$viewerApi->htmlGetPage($request);

        $this->assertNotNull($page);
    }

    /**
    * Test case for htmlGetPage
    *
    * Downloads document page as HTML.
    *
    */
    public function testHtmlGetPageWithCustomFont()
    {
        $file = Internal\TestFiles::getFileUsesCustomFontPptx();
        $pageNumber = 1;

        $request = new Requests\HtmlGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
        $request->fontsFolder = self::$fontsFolder;
            
        $page = self::$viewerApi->htmlGetPage($request);

        $this->assertNotNull($page);
    }

    /**
     * Test case for htmlGetPages
     *
     * Downloads document page as HTML.
     *
     */
    public function testHtmlGetPages()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\HtmlGetPagesRequest($file->fileName);
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->htmlGetPages($request);

        $this->assertEquals(4, count($response->getPages()));
        $this->assertEquals("four-pages.docx", $response->getFileName());
        $this->assertEquals("words\\docx", $response->getFolder());
    }

    /**
     * Test case for htmlGetZipWithPages
     *
     * Downloads document pages as HTML.
     *
     */
    public function testHtmlGetZipWithPages()
    {
        $file = Internal\TestFiles::getFileThreeSheetsXlsx();
        
        $request = new Requests\HtmlGetZipWithPagesRequest($file->fileName);
        $request->resourcePath = "./r/{resource-name}";
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->htmlGetZipWithPages($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for htmlCreatePagesCache
     *
     * Creates document cache.
     *
     */
    public function testHtmlCreatePagesCache()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $htmlOptions = new \GroupDocs\Viewer\Model\HtmlOptions();
        $htmlOptions->setEmbedResources(true);

        $request = new Requests\HtmlCreatePagesCacheRequest($file->fileName);
        $request->folder = $file->folder;
        $request->htmlOptions = $htmlOptions;
            
        $response = self::$viewerApi->htmlCreatePagesCache($request);

        $this->assertEquals(4, count($response->getPages()));
        $this->assertEquals("four-pages.docx", $response->getFileName());
        $this->assertEquals("words\\docx", $response->getFolder());
    }

    /**
     * Test case for htmlCreatePagesCacheFromContent
     *
     * Creates posted document pages as HTML and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testHtmlCreatePagesCacheFromContent()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $htmlOptions = new \GroupDocs\Viewer\Model\HtmlOptions();
        $htmlOptions->setEmbedResources(true);

        $testFilePath = self::getTestFilePath($file);
        list($optionsFile, $optionsFilePath) = self::serializeObject($htmlOptions);

        $request = new Requests\HtmlCreatePagesCacheFromContentRequest($testFilePath, $optionsFilePath);
        $request->folder = self::$fromContentFolder;
        
        $response = self::$viewerApi->htmlCreatePagesCacheFromContent($request);

        $this->assertEquals(4, count($response->getPages()));
        $this->assertStringEndsWith(".docx", $response->getFileName());
    }

    /**
     * Test case for htmlCreatePagesCacheFromUrl
     *
     * Creates pages as HTML and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testHtmlCreatePagesCacheFromUrl()
    {
        $file = Internal\TestFiles::getFileFromUrlWithNotesPptx();
        
        $htmlOptions = new \GroupDocs\Viewer\Model\HtmlOptions();
        $htmlOptions->setEmbedResources(true);
        $htmlOptions->slidesOptions = new \GroupDocs\Viewer\Model\SlidesOptions();
        $htmlOptions->slidesOptions->setRenderNotes(true);

        $request = new Requests\HtmlCreatePagesCacheFromUrlRequest($file->url, $htmlOptions);
        $request->folder = self::$fromUrlFolder;
            
        $response = self::$viewerApi->htmlCreatePagesCacheFromUrl($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals("with-notes.pptx", $response->getFileName());
    }

    /**
     * Test case for htmlTransformPages
     *
     * Rotates or reorders document page(s).
     *
     */
    public function testHtmlRotatePage()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $transformOptions = new \GroupDocs\Viewer\Model\RotateOptions();
        $transformOptions->setPageNumber(1);
        $transformOptions->setAngle(90);

        $request = new Requests\HtmlTransformPagesRequest(
            $file->fileName,
            $transformOptions,
            $file->folder
        );
        
        $response = self::$viewerApi->htmlTransformPages($request);

        $this->assertEquals(90, $response->getPages()[0]->getAngle());
    }

    /**
     * Test case for htmlTransformPages
     *
     * Rotates or reorders document page(s).
     *
     */
    public function testHtmlReorderPages()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $transformOptions = new \GroupDocs\Viewer\Model\ReorderOptions();
        $transformOptions->setPageNumber(1);
        $transformOptions->setNewPosition(2);

        $request = new Requests\HtmlTransformPagesRequest(
            $file->fileName,
            $transformOptions,
            $file->folder
        );
        
        $response = self::$viewerApi->htmlTransformPages($request);

        $this->assertEquals(2, $response->getPages()[0]->getNumber());
        $this->assertEquals(1, $response->getPages()[1]->getNumber());
    }

    /**
     * Test case for htmlDeletePagesCache
     *
     * Removes document cache.
     *
     */
    public function testHtmlDeletePagesCache()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\HtmlDeletePagesCacheRequest(
            $file->fileName,
        
            $file->folder
        
        );
            
        self::$viewerApi->htmlDeletePagesCache($request);
    }
}
