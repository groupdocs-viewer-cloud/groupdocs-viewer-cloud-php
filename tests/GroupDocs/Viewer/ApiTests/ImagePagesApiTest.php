<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="ImagePagesApiTest.php">
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

class ImagePagesApiTest extends BaseApiTest
{
    /**
    * Test case for imageGetPage
    *
    * Downloads document page as Image.
    *
    */
    public function testImageGetPage()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        $pageNumber = 1;

        $request = new Requests\ImageGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
            
        $page = self::$viewerApi->imageGetPage($request);

        $this->assertNotNull($page);
    }

    /**
    * Test case for imageGetPage
    *
    * Downloads document page as Image.
    *
    */
    public function testImageGetPageWithExtractText()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        $pageNumber = 1;

        $request = new Requests\ImageGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
        $request->extractText = true;
            
        $page = self::$viewerApi->imageGetPage($request);

        $this->assertNotNull($page);
    }

    /**
    * Test case for imageGetPage
    *
    * Downloads document page as Image.
    *
    */
    public function testImageGetPageWithCustomFont()
    {
        $file = Internal\TestFiles::getFileUsesCustomFontPptx();
        $pageNumber = 1;

        $request = new Requests\ImageGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
        $request->fontsFolder = self::$fontsFolder;
            
        $page = self::$viewerApi->imageGetPage($request);

        $this->assertNotNull($page);
    }

    /**
    * Test case for imageGetPage
    *
    * Downloads document page as Image.
    *
    */
    public function testImageGetPageWithWidth()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        $pageNumber = 1;

        $request = new Requests\ImageGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
        $request->width = 800;
            
        $page = self::$viewerApi->imageGetPage($request);

        $this->assertNotNull($page);
    }

    /**
    * Test case for imageGetPage
    *
    * Downloads document page as Image.
    *
    */
    public function testImageGetPageWithHeight()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        $pageNumber = 1;

        $request = new Requests\ImageGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
        $request->height = 800;
            
        $page = self::$viewerApi->imageGetPage($request);

        $this->assertNotNull($page);
    }

    /**
    * Test case for imageGetPage
    *
    * Downloads document page as Image.
    *
    */
    public function testImageGetPageWithQuality()
    {
        $file = Internal\TestFiles::getFileOnePageDocx();
        $pageNumber = 1;

        $request = new Requests\ImageGetPageRequest($file->fileName, $pageNumber);
        $request->folder = $file->folder;
        $request->quality = 800;
            
        $page = self::$viewerApi->imageGetPage($request);

        $this->assertNotNull($page);
    }

    /**
     * Test case for imageGetPages
     *
     * Downloads document page as Image.
     *
     */
    public function testImageGetPages()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\ImageGetPagesRequest($file->fileName);
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetPages($request);

        $this->assertEquals(4, count($response->getPages()));
        $this->assertEquals("four-pages.docx", $response->getFileName());
        $this->assertEquals("words\\docx", $response->getFolder());
    }

    /**
     * Test case for imageGetZipWithPages
     *
     * Downloads document pages as Image.
     *
     */
    public function testImageGetZipWithPages()
    {
        $file = Internal\TestFiles::getFileThreeSheetsXlsx();
        
        $request = new Requests\ImageGetZipWithPagesRequest($file->fileName);
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetZipWithPages($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for imageCreatePagesCache
     *
     * Creates document cache.
     *
     */
    public function testImageCreatePagesCache()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\ImageCreatePagesCacheRequest($file->fileName);
        $request->folder = $file->folder;
        $request->imageOptions = new \GroupDocs\Viewer\Model\ImageOptions();
        $request->imageOptions->setFormat("jpg");
            
        $response = self::$viewerApi->imageCreatePagesCache($request);

        $this->assertEquals(4, count($response->getPages()));
        $this->assertEquals("four-pages.docx", $response->getFileName());
        $this->assertEquals("words\\docx", $response->getFolder());
    }

    /**
     * Test case for imageCreatePagesCacheFromContent
     *
     * Creates posted document pages as Image and saves them in cache. Content with document or multipart content is expected where first part is document and second is ImageOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testImageCreatePagesCacheFromContent()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $options = new \GroupDocs\Viewer\Model\ImageOptions();
        $options->setFormat("jpg");

        $testFilePath = self::getTestFilePath($file);
        list($optionsFile, $optionsFilePath) = self::serializeObject($options);

        $request = new Requests\ImageCreatePagesCacheFromContentRequest($testFilePath, $optionsFilePath);
        $request->folder = self::$fromContentFolder;
        
        $response = self::$viewerApi->imageCreatePagesCacheFromContent($request);

        $this->assertEquals(4, count($response->getPages()));
        $this->assertStringEndsWith(".docx", $response->getFileName());
    }

    /**
     * Test case for imageCreatePagesCacheFromUrl
     *
     * Creates pages as Image and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     */
    public function testImageCreatePagesCacheFromUrl()
    {
        $file = Internal\TestFiles::getFileFromUrlWithNotesPptx();
        
        $ImageOptions = new \GroupDocs\Viewer\Model\ImageOptions();
        $ImageOptions->setFormat("jpg");
        $ImageOptions->slidesOptions = new \GroupDocs\Viewer\Model\SlidesOptions();
        $ImageOptions->slidesOptions->setRenderNotes(true);

        $request = new Requests\ImageCreatePagesCacheFromUrlRequest($file->url, $ImageOptions);
        $request->folder = self::$fromUrlFolder;
            
        $response = self::$viewerApi->imageCreatePagesCacheFromUrl($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals("with-notes.pptx", $response->getFileName());
    }

    /**
     * Test case for imageTransformPages
     *
     * Rotates or reorders document page(s).
     *
     */
    public function testImageRotatePage()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $transformOptions = new \GroupDocs\Viewer\Model\RotateOptions();
        $transformOptions->setPageNumber(1);
        $transformOptions->setAngle(90);

        $request = new Requests\ImageTransformPagesRequest(
            $file->fileName,
            $transformOptions,
            $file->folder
        );
        
        $response = self::$viewerApi->imageTransformPages($request);

        $this->assertEquals(90, $response->getPages()[0]->getAngle());
    }

    /**
     * Test case for imageTransformPages
     *
     * Rotates or reorders document page(s).
     *
     */
    public function testImageReorderPages()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $transformOptions = new \GroupDocs\Viewer\Model\ReorderOptions();
        $transformOptions->setPageNumber(1);
        $transformOptions->setNewPosition(2);

        $request = new Requests\ImageTransformPagesRequest(
            $file->fileName,
            $transformOptions,
            $file->folder
        );
        
        $response = self::$viewerApi->imageTransformPages($request);

        $this->assertEquals(2, $response->getPages()[0]->getNumber());
        $this->assertEquals(1, $response->getPages()[1]->getNumber());
    }

    /**
     * Test case for imageDeletePagesCache
     *
     * Removes document cache.
     *
     */
    public function testImageDeletePagesCache()
    {
        $file = Internal\TestFiles::getFileFourPagesDocx();
        
        $request = new Requests\ImageDeletePagesCacheRequest(
            $file->fileName,
        
            $file->folder
        
        );
            
        self::$viewerApi->imageDeletePagesCache($request);
    }
}
