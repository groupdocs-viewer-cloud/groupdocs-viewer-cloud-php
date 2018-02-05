<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="ImageAttachmentPagesApiTest.php">
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

class ImageAttachmentPagesApiTest extends BaseApiTest
{
    /**
    * Test case for imageGetAttachmentPage
    *
    * Downloads attachment page as Image.
    *
    */
    public function testImageGetAttachmentPage()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $pageNumber = 1;

        $request = new Requests\ImageGetAttachmentPageRequest(
            $file->fileName,
            $file->attachmentName,
            $pageNumber
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $page = self::$viewerApi->imageGetAttachmentPage($request);

        $this->assertNotNull($page);
    }

    /**
     * Test case for imageGetAttachmentPages
     *
     * Downloads attachment page as Image.
     *
     */
    public function testImageGetAttachmentPages()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        
        $request = new Requests\ImageGetAttachmentPagesRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachmentPages($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals("with-attachment.msg", $response->getFileName());
        $this->assertEquals("password-protected.docx", $response->getAttachmentName());
        $this->assertEquals("email\\msg", $response->getFolder());
    }

    /**
     * Test case for imageGetZipWithAttachmentPages
     *
     * Downloads attachment page as Image.
     *
     */
    public function testImageGetZipWithAttachmentPages()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        
        $request = new Requests\ImageGetZipWithAttachmentPagesRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetZipWithAttachmentPages($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for imageCreateAttachmentPagesCache
     *
     * Creates attachment cache.
     *
     */
    public function testImageCreateAttachmentPagesCache()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();
        
        $request = new Requests\ImageCreateAttachmentPagesCacheRequest(
            $file->fileName,
        
            $file->attachmentName
        
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
        $request->imageOptions = new \GroupDocs\Viewer\Model\ImageOptions();
        $request->imageOptions->setAttachmentPassword($file->attachmentPassword);
            
        $response = self::$viewerApi->imageCreateAttachmentPagesCache($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals("with-attachment.pdf", $response->getFileName());
        $this->assertEquals("password-protected.docx", $response->getAttachmentName());
        $this->assertEquals("pdf\\pdf", $response->getFolder());
    }

    /**
     * Test case for imageDeleteAttachmentPagesCache
     *
     * Removes attachment cache.
     *
     */
    public function testImageDeleteAttachmentPagesCache()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();
        
        $request = new Requests\ImageDeleteAttachmentPagesCacheRequest(
            $file->fileName,
            $file->attachmentName,
            $file->folder
        );
            
        self::$viewerApi->imageDeleteAttachmentPagesCache($request);
    }
}
