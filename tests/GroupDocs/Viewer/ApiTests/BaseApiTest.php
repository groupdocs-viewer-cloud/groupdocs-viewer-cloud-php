<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="BaseApiTest.php">
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
namespace GroupDocs\Viewer\ApiTests;

use PHPUnit\Framework\TestCase;
use GroupDocs\Viewer\Configuration;
use GroupDocs\Viewer\ViewerApi;

abstract class BaseApiTest extends \PHPUnit_Framework_TestCase
{
    protected static $viewerConfig;
    protected static $viewerApi;

    protected static $storageConfig;
    protected static $storageApi;
    
    protected static $fontsFolder = "fonts";
    protected static $fromUrlFolder = "tests\\from_url";
    protected static $fromContentFolder = "tests\\from_content";

    protected static $testFilesUploaded = false;

    /**
     * Cleanup after each test case
     */
    public function tearDown()
    {
        self::_deleteFolder("cache");
        self::_deleteFolder("tests");
    }

    private static function _deleteFolder($folder)
    {
        $request = new \GroupDocs\Storage\Model\Requests\DeleteFolderRequest(
            $folder, null, true);

        self::$storageApi->DeleteFolder($request);
    }

    /**
     * Setup before each test suite
     */
    public static function setUpBeforeClass()
    {
        self::_initTests();
    }

    private static function _initTests()
    {
        $config = self::_getConfig();

        //TODO: Get your AppSID and AppKey at https://dashboard.groupdocs.cloud 
        //      (free registration is required).
        $appSid = $config["AppSID"];
        $appKey = $config["AppKey"];
        $apiBaseUrl = $config["ApiBaseUrl"];

        self::$storageConfig = new \GroupDocs\Storage\Configuration();
        self::$storageConfig->setAppKey($appKey);
        self::$storageConfig->setAppSid($appSid);
        self::$storageConfig->setHost($apiBaseUrl);
        self::$storageApi = new \GroupDocs\Storage\Api\StorageApi(self::$storageConfig);

        self::$viewerConfig = new Configuration();
        self::$viewerConfig->setAppSid($appSid);
        self::$viewerConfig->setAppKey($appKey);
        self::$viewerConfig->setApiBaseUrl($apiBaseUrl);
        self::$viewerApi = new ViewerApi(self::$viewerConfig);

        self::_uploadTestFiles();
    }

    private static function _getConfig()
    {
        $contents = file_get_contents(realpath(__DIR__ . "/../config.json"));
        $config = \GuzzleHttp\json_decode($contents, true);

        return $config;
    }

    private static function _uploadTestFiles()
    {
        if (self::$testFilesUploaded) {
            return;
        }

        $folder = self::_getTestDataPath();
        $dir_iterator = new \RecursiveDirectoryIterator($folder);
        $iterator = new \RecursiveIteratorIterator($dir_iterator, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($iterator as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getPathName();

                $filePathInStorage = str_replace($folder . '\\', "", $filePath);
                $filePathInStorage = str_replace("\\", "/", $filePathInStorage);

                $isExistRequest = new \GroupDocs\Storage\Model\Requests\GetIsExistRequest($filePathInStorage);
                $isExistResponse = self::$storageApi->GetIsExist($isExistRequest);
                if (!$isExistResponse->getFileExist()->getIsExist()) {
                    $putCreateRequest = new \GroupDocs\Storage\Model\Requests\PutCreateRequest($filePathInStorage, $filePath);
                    $putCreateResponse = self::$storageApi->PutCreate($putCreateRequest);
                }
            }
        }

        self::$testFilesUploaded = true;
    }

    private static function _getTestDataPath()
    {
        return realpath(__DIR__ . '/../Resources/TestData/');
    }

    /**
     * Serializes object as JSON
     */
    protected static function serializeObject($obj)
    {
        $optionsFile = tmpfile();
        $optionsFilePath = stream_get_meta_data($optionsFile)['uri'];
        fwrite($optionsFile, $obj->__toString());

        return [$optionsFile, $optionsFilePath];
    }

    /**
     * Returns path to test file
     */
    protected static function getTestFilePath($file)
    {
        return realpath(self::_getTestDataPath() . DIRECTORY_SEPARATOR .  $file->folder . DIRECTORY_SEPARATOR . $file->fileName);
    }
}
