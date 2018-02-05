<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="HtmlAttachmentPagesApiTest.php">
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

class HtmlAttachmentPagesApiTest extends BaseApiTest
{
    /**
    * Test case for htmlGetAttachmentPage
    *
    * Downloads attachment page as HTML.
    *
    */
    public function testHtmlGetAttachmentPage()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $pageNumber = 1;

        $request = new Requests\HtmlGetAttachmentPageRequest(
            $file->fileName,
            $file->attachmentName,
            $pageNumber
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->htmlGetAttachmentPage($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for htmlGetAttachmentPages
     *
     * Downloads attachment page as HTML.
     *
     */
    public function testHtmlGetAttachmentPages()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        
        $request = new Requests\HtmlGetAttachmentPagesRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->htmlGetAttachmentPages($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals("with-attachment.msg", $response->getFileName());
        $this->assertEquals("password-protected.docx", $response->getAttachmentName());
        $this->assertEquals("email\\msg", $response->getFolder());
    }

    /**
     * Test case for htmlGetZipWithAttachmentPages
     *
     * Downloads attachment page as HTML.
     *
     */
    public function testHtmlGetZipWithAttachmentPages()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        
        $request = new Requests\HtmlGetZipWithAttachmentPagesRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->resourcePath = "./r/{resource-name}";
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->htmlGetZipWithAttachmentPages($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for htmlCreateAttachmentPagesCache
     *
     * Creates attachment cache.
     *
     */
    public function testHtmlCreateAttachmentPagesCache()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();
        
        $request = new Requests\HtmlCreateAttachmentPagesCacheRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
        $request->htmlOptions = new \GroupDocs\Viewer\Model\HtmlOptions();
        $request->htmlOptions->setAttachmentPassword($file->attachmentPassword);
            
        $response = self::$viewerApi->htmlCreateAttachmentPagesCache($request);

        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals("with-attachment.pdf", $response->getFileName());
        $this->assertEquals("password-protected.docx", $response->getAttachmentName());
        $this->assertEquals("pdf\\pdf", $response->getFolder());
    }

    /**
     * Test case for htmlDeleteAttachmentPagesCache
     *
     * Removes attachment cache.
     *
     */
    public function testHtmlDeleteAttachmentPagesCache()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();
        
        $request = new Requests\HtmlDeleteAttachmentPagesCacheRequest(
            $file->fileName,
            $file->attachmentName,
            $file->folder
        );
            
        self::$viewerApi->htmlDeleteAttachmentPagesCache($request);
    }
}
