<?php
/**
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose Pty Ltd" file="HtmlAttachmentPageResourceApiTest.php">
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

class HtmlAttachmentPageResourceApiTest extends BaseApiTest
{
    /**
     * Test case for htmlGetAttachmentPageResource
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     */
    public function testHtmlGetAttachmentPageResource()
    {
        $file = Internal\TestFiles::getFileWithAttachmentMsg();
       
        $getPagesRequest = new Requests\HtmlGetAttachmentPagesRequest(
            $file->fileName,
            $file->attachmentName
        );
        $getPagesRequest->embedResources = false;
        $getPagesRequest->startPageNumber = 1;
        $getPagesRequest->countPages = 1;
        $getPagesRequest->attachmentPassword = $file->attachmentPassword;
        $getPagesRequest->folder = $file->folder;
            
        $getPagesResponse = self::$viewerApi->htmlGetAttachmentPages($getPagesRequest);
        
        $page = $getPagesResponse->getPages()[0];

        $this->assertNotNull($page);

        foreach ($page->getResources() as $key => $resource) {
            $getResourceRequest = new Requests\HtmlGetAttachmentPageResourceRequest(
                $fileName = $file->fileName,
                $attachmentName = $file->attachmentName,
                $pageNumber = $page->getNumber(),
                $resourceName = $resource->getName(),
                $folder = $file->folder,
                $storage = null
            );

            $getResourceResponse = self::$viewerApi->htmlGetAttachmentPageResource($getResourceRequest);

            $this->assertNotNull($getResourceResponse);
        }
    }
}
