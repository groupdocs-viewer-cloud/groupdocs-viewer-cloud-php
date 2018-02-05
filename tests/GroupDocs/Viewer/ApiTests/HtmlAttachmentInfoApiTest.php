<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="HtmlAttachmentInfoApiTest.php">
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

class HtmlAttachmentInfoApiTest extends BaseApiTest
{
    /**
     * Test case for htmlGetAttachmentInfo
     *
     * Retrieves attachment information.
     *
     */
    public function testHtmlGetAttachmentInfo()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\HtmlGetAttachmentInfoRequest(
            $file->fileName,
            $file->attachmentName,
            null,
            $file->attachmentPassword,
            $file->folder
        );
        
        $response = self::$viewerApi->htmlGetAttachmentInfo($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("password-protected.docx", $response->getFileName());
    }

    /**
     * Test case for htmlGetAttachmentInfo
     *
     * Retrieves attachment information.
     *
     */
    public function testHtmlGetAttachmentInfoReturnsAttachmentNotFound()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/AttachmentNotFound/");

        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\HtmlGetAttachmentInfoRequest(
            $file->fileName,
            "not-found.pdf",
            null,
            $file->attachmentPassword,
            $file->folder
        );
        
        $response = self::$viewerApi->htmlGetAttachmentInfo($request);
    }

    /**
    * Test case for htmlGetAttachmentInfo
    *
    * Retrieves attachment information.
    *
    */
    public function testHtmlGetAttachmentInfoReturnsMissingPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/MissingPassword/");

        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\HtmlGetAttachmentInfoRequest(
            $file->fileName,
            $file->attachmentName,
            null,
            null,
            $file->folder
        );
        
        $response = self::$viewerApi->htmlGetAttachmentInfo($request);
    }

    /**
     * Test case for htmlGetAttachmentInfo
     *
     * Retrieves attachment information.
     *
     */
    public function testHtmlGetAttachmentInfoReturnsIncorrectPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/IncorrectPassword/");

        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\HtmlGetAttachmentInfoRequest(
            $file->fileName,
            $file->attachmentName,
            null,
            "not-a-password",
            $file->folder
        );
        
        $response = self::$viewerApi->htmlGetAttachmentInfo($request);
    }

    /**
     * Test case for htmlGetAttachmentInfo
     *
     * Retrieves attachment information.
     *
     */
    public function testHtmlGetAttachmentInfoWithOptions()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();

        $options = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $options->setAttachmentPassword($file->attachmentPassword);
        $request = new Requests\HtmlGetAttachmentInfoWithOptionsRequest(
            $file->fileName,
            $file->attachmentName,
            $options,
            $file->folder
        );
        
        $response = self::$viewerApi->htmlGetAttachmentInfoWithOptions($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("password-protected.docx", $response->getFileName());
    }
}
