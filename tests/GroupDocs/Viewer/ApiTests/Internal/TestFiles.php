<?php

/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="TestFiles.php">
 *   Copyright (c) 2003-2018 Aspose Pty Ltd
 * </copyright>
 * <summary>
 *   Permission is hereby granted, free of charge, to any person obtaining a copy
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

namespace GroupDocs\Viewer\ApiTests\Internal;

require_once "TestFile.php";

 /*
 * Describes file for tests.
 */
class TestFiles
{
    public static function getFileWithAttachmentMsg()
    {
        $file = new TestFile();
        $file->fileName = "with-attachment.msg";
        $file->folder = "email\\msg";
        $file->password = "";
        $file->url = "";
        $file->attachmentName = "password-protected.docx";
        $file->attachmentPassword = "password";

        return $file;
    }

    public static function getFileWithAttachmentPdf()
    {
        $file = new TestFile();
        $file->fileName = "with-attachment.pdf";
        $file->folder = "pdf\\pdf";
        $file->password = "";
        $file->url = "";
        $file->attachmentName = "password-protected.docx";
        $file->attachmentPassword = "password";

        return $file;
    }

    public static function getFileFourPagesDocx()
    {
        $file = new TestFile();
        $file->fileName = "four-pages.docx";
        $file->folder = "words\\docx";

        return $file;
    }

    public static function getFileTwoHiddenPagesVsd()
    {
        $file = new TestFile();
        $file->fileName = "two-hidden-pages.vsd";
        $file->folder = "diagram\\vsd";

        return $file;
    }

    public static function getFilePasswordProtectedDocx()
    {
        $file = new TestFile();
        $file->fileName = "password-protected.docx";
        $file->folder = "words\\docx";
        $file->password = "password";

        return $file;
    }

    public static function getFileCorruptedPdf()
    {
        $file = new TestFile();
        $file->fileName = "corrupted.pdf";
        $file->folder = "pdf\\pdf";

        return $file;
    }

    public static function getFileFromUrlOnePageDocx()
    {
        $file = new TestFile();
        $file->fileName = "one-page.docx";
        $file->url = "https://www.dropbox.com/s/j260ve4f90h1p41/one-page.docx?dl=1";

        return $file;
    }

    public static function getFileFromUrlWithNotesPptx()
    {
        $file = new TestFile();
        $file->fileName = "with-notes.pptx";
        $file->url = "https://www.dropbox.com/s/r2eioe2atushqcf/with-notes.pptx?dl=1";

        return $file;
    }

    public static function getFileOnePageDocx()
    {
        $file = new TestFile();
        $file->fileName = "one-page.docx";
        $file->folder = "words\\docx";

        return $file;
    }

    public static function getFileUsesCustomFontPptx()
    {
        $file = new TestFile();
        $file->fileName = "uses-custom-font.pptx";
        $file->folder = "slides\\pptx";

        return $file;
    }

    public static function getFileThreeSheetsXlsx()
    {
        $file = new TestFile();
        $file->fileName = "three-sheets.xlsx";
        $file->folder = "cells\\xlsx";

        return $file;
    }
}
