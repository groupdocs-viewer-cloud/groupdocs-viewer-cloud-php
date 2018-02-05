<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="ImageAttachmentsApiTest.php">
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

class ImageAttachmentsApiTest extends BaseApiTest
{
    /**
     * Test case for imageGetAttachment
     *
     * Downloads attachment.
     *
     */
    public function testImageGetAttachmentFromMsg()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();

        $request = new Requests\ImageGetAttachmentRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachment($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for imageGetAttachment
     *
     * Downloads attachment.
     *
     */
    public function testImageGetAttachmentFromPdf()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();

        $request = new Requests\ImageGetAttachmentRequest(
            $file->fileName,
            $file->attachmentName
        );
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachment($request);

        $this->assertNotNull($response);
    }

    /**
     * Test case for imageGetAttachment
     *
     * Retrieves list of document attachments.
     *
     */
    public function testImageGetAttachmentsFromMsg()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();

        $request = new Requests\ImageGetAttachmentsRequest($file->fileName);
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachments($request);

        $this->assertEquals(1, count($response->getAttachments()));
        $this->assertEquals("password-protected.docx", $response->getAttachments()[0]->getName());
    }

    /**
     * Test case for imageGetAttachment
     *
     * Retrieves list of document attachments.
     *
     */
    public function testImageGetAttachmentsFromPdf()
    {
        $file = Internal\TestFiles::getFileWithAttachmentPdf();

        $request = new Requests\ImageGetAttachmentsRequest($file->fileName);
        $request->folder = $file->folder;
            
        $response = self::$viewerApi->imageGetAttachments($request);

        $this->assertEquals(1, count($response->getAttachments()));
        $this->assertEquals("password-protected.docx", $response->getAttachments()[0]->getName());
    }
}
