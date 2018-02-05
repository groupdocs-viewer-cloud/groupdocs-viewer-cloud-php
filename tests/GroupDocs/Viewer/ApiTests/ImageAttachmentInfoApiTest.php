<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="ImageAttachmentInfoApiTest.php">
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

class ImageAttachmentInfoApiTest extends BaseApiTest
{
    /**
     * Test case for imageGetAttachmentInfo
     *
     * Retrieves attachment information..
     *
     */
    public function testImageGetAttachmentInfo()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\ImageGetAttachmentInfoRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->attachmentPassword = $file->attachmentPassword;
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachmentInfo($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("password-protected.docx", $response->getFileName());
    }

    /**
     * Test case for imageGetAttachmentInfo
     *
     * Retrieves attachment information..
     *
     */
    public function testImageGetAttachmentInfoReturnsAttachmentNotFound()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/AttachmentNotFound/");

        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\ImageGetAttachmentInfoRequest(
            $file->fileName,
            "not-found.pdf"
        );
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachmentInfo($request);
    }

    /**
    * Test case for imageGetAttachmentInfo
    *
    * Retrieves attachment information..
    *
    */
    public function testImageGetAttachmentInfoReturnsMissingPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/MissingPassword/");

        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\ImageGetAttachmentInfoRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->folder = $file->folder;

        $response = self::$viewerApi->imageGetAttachmentInfo($request);
    }

    /**
     * Test case for imageGetAttachmentInfo
     *
     * Retrieves attachment information..
     *
     */
    public function testImageGetAttachmentInfoReturnsIncorrectPassword()
    {
        $this->setExpectedExceptionRegExp(\GroupDocs\Viewer\ApiException::class, "/IncorrectPassword/");

        $file = Internal\TestFiles::getFileWithAttachmentMsg();
        $request = new Requests\ImageGetAttachmentInfoRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->attachmentPassword = "not-a-password";
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachmentInfo($request);
    }

    /**
     * Test case for imageGetAttachmentInfo
     *
     * Retrieves attachment information..
     *
     */
    public function testImageGetAttachmentInfoWithOptions()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();

        $options = new \GroupDocs\Viewer\Model\DocumentInfoOptions();
        $options->setAttachmentPassword($file->attachmentPassword);
        $request = new Requests\ImageGetAttachmentInfoWithOptionsRequest(
            $file->fileName,
            $file->attachmentName,
            $options,
            $file->folder
        );
        
        $response = self::$viewerApi->imageGetAttachmentInfoWithOptions($request);
        
        $this->assertEquals(1, count($response->getPages()));
        $this->assertEquals(".docx", $response->getExtension());
        $this->assertEquals("password-protected.docx", $response->getFileName());
    }
}
