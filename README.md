# GroupDocs.Viewer Cloud SDK for PHP
This repository contains GroupDocs.Viewer Cloud SDK for PHP source code. This SDK allows you to work with GroupDocs.Viewer Cloud REST APIs in your PHP applications.

## Dependencies
- PHP 5.5 or later

## Authorization
To use SDK you need AppSID and AppKey authorization keys. You can get your AppSID and AppKey at https://dashboard.groupdocs.cloud (free registration is required).  

## Installation & Usage
### Composer

The package is available at [Packagist](https://packagist.org/) and it can be installed via [Composer](http://getcomposer.org/) by executing following command:
```
composer require groupdocscloud/groupdocs-viewer-cloud
``` 

Or you can install SDK via [Composer](http://getcomposer.org/) directly from this repository, add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-php.git"
    }
  ],
  "require": {
    "groupdocscloud/groupdocs-viewer-cloud": "*"
  }
}
```

Then run `composer install`

### Manual Installation

Clone or download this repository, then run `composer install` in the root directory to install dependencies and include `autoload.php` into your code file:

```php
require_once('/path/to/groupdocs-viewer-cloud-php/vendor/autoload.php');
```

## Tests

To run the unit tests set your AppSID and AppKey in [json.config](tests/GroupDocs/Viewer/config.json) and execute following commands:

```
php composer.phar install
./vendor/bin/phpunit
```

## Getting Started

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Get your AppSID and AppKey at https://dashboard.groupdocs.cloud (free registration is required).
$configuration = new GroupDocs\Viewer\Configuration();
$configuration->setAppSid("XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX");
$configuration->setAppKey("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

$viewApi = new GroupDocs\Viewer\ViewApi($configuration);

try {
    // Convert and download a document as JPG
    $format = "jpg";
    $filePath = "myfile.docx";
    $request = new GroupDocs\Viewer\Model\Requests\convertAndDownloadRequest($format, $filePath);
    $result = $viewApi->convertAndDownload($request);

    // Save the resulting file
    $outputPath = __DIR__ . "/output.jpg";
    file_put_contents($outputPath, $result->fread($result->getSize()));
    echo "File converted and saved to: " . $outputPath . "\n";
} catch (Exception $e) {
    echo "Something went wrong: ", $e->getMessage(), "\n";
}

?>
```

Below is an example demonstrating how to upload a document, render it, and download the result using GroupDocs.Viewer Cloud SDK for PHP.

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = new GroupDocs\Viewer\Configuration();
$configuration->setAppSid("XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX");
$configuration->setAppKey("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");

$fileApi = new GroupDocs\Viewer\FileApi($configuration);
$viewApi = new GroupDocs\Viewer\ViewApi($configuration);

try {
    // Upload a file to cloud storage
    $uploadRequest = new GroupDocs\Viewer\Model\Requests\uploadFileRequest("myfile.docx", __DIR__ . "/myfile.docx");
    $fileApi->uploadFile($uploadRequest);

    // Render it to HTML
    $viewOptions = new GroupDocs\Viewer\Model\ViewOptions();
    $fileInfo = new GroupDocs\Viewer\Model\FileInfo();
    $fileInfo->setFilePath("myfile.docx");
    $viewOptions->setFileInfo($fileInfo);
    $viewOptions->setViewFormat("HTML");
    $viewOptions->setOutputPath("myfile.html");

    $viewRequest = new GroupDocs\Viewer\Model\Requests\createViewRequest($viewOptions);
    $viewApi->createView($viewRequest);

    // Download the result
    $downloadRequest = new GroupDocs\Viewer\Model\Requests\downloadFileRequest("myfile.html");
    $result = $fileApi->downloadFile($downloadRequest);

    // Save the resulting file
    $outputPath = __DIR__ . "/myfile.html";
    file_put_contents($outputPath, $result->fread($result->getSize()));
    echo "Rendered file downloaded to: " . $outputPath . "\n";
} catch (Exception $e) {
    echo "Something went wrong: ", $e->getMessage(), "\n";
}

?>
```

## Licensing
GroupDocs.Viewer Cloud SDK for PHP is licensed under [MIT License](LICENSE).

## Resources
+ [**Website**](https://www.groupdocs.cloud)
+ [**Product Home**](https://products.groupdocs.cloud/viewer)
+ [**Documentation**](https://docs.groupdocs.cloud/display/viewercloud/Home)
+ [**Free Support Forum**](https://forum.groupdocs.cloud/c/viewer)
+ [**Blog**](https://blog.groupdocs.cloud/category/viewer)

## Contact Us
Your feedback is very important to us. Please feel free to contact us using our [Support Forums](https://forum.groupdocs.cloud/c/viewer).
