![](https://img.shields.io/badge/api-v2.0-lightgrey) ![Packagist Version](https://img.shields.io/packagist/v/groupdocscloud/groupdocs-viewer-cloud) ![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/groupdocscloud/groupdocs-viewer-cloud) [![GitHub license](https://img.shields.io/github/license/groupdocs-viewer-cloud/groupdocs-viewer-cloud-php)](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-php/blob/master/LICENSE) 

# PHP SDK to View Documents in the Cloud

[GroupDocs.Viewer Cloud SDK for PHP](https://products.groupdocs.cloud/viewer/php) wraps GroupDocs.Viewer RESTful APIs so you may integrate Document Viewing features in your own apps with zero initial cost.

GroupDocs.Viewer REST API allows the developers to view & render a number of files formats including Word documents, Excel spreadsheets, PowerPoint presentations, PDF, OpenDocument formats, emails, CAD files & images.

## Document Viewer Services in REST

- 90+ supported file formats.
- View documents as PDF, HTML or images.
- Render documents as raster & vector images.
- Render documents with comments & notes.
- Flip or rotate documents pages at 90, 180 or 270 degrees.
- Reorder document pages.
- Render hidden, consecutive or selected document pages.
- Watermark PDF, image or HTML output pages.
- Render with custom fonts as well as replace any missing fonts.
- Load password-protected documents.
- Extract attachment information such as attachment count & names.
- Extract document information like file format, page count, size and visibility, text coordinates, and so on.
- Integrated storage API.

Check out the [Developer's Guide](https://docs.groupdocs.cloud/viewer/developer-guide/) to know more about GroupDocs.Viewer REST API.

## Microsoft File Formats

**Microsoft Word:** DOC, DOCM, DOCX, DOT, DOTM, DOTX\
**Microsoft Excel:** XLS, XLSX, XLSB, XLSM\
**Microsoft PowerPoint:** PPTX, PPTM, PPT, PPSX, PPSM, PPS, POTX, POTM\
**Microsoft Project:** MPP, MPT\
**Microsoft Outlook:** MSG, OST, PST\
**Microsoft Visio:** VDW, VDX, VSD, VSDM, VSDX, VSS, VSSM, VSSX, VST, VSTM, VSTX, VSX, VTX\
**Microsoft OneNote:** ONE

## Other Formats

**Page Layout Formats:** PDF, XPS, TEX\
**OpenDocument:** ODT, OTT, ODS, OTS, ODP, OTP\
**CAD:** DNG, DWF, DWG, DXF, IDC, STL\
**Images:** BMP, CGM, DCM, DJVU, EMP, EPS, GIF, ICO, JP2, JPG, ODG, PCL, PNG, PS, PSD, SVG, TIFF, WEBP, WMF\
**Web:** HTML, MHT, MHTML\
**Emails:** EML, EMLX\
**eBooks:** EPUB, MOBI\
**Others:** TXT, RTF, CSV, TSV

## Get Started with GroupDocs.Viewer Cloud SDK for PHP

First create an account at [GroupDocs for Cloud](https://dashboard.groupdocs.cloud/) and get your application information. Next, follow the steps as given below.

### Installation via Composer

The package is available at [Packagist](https://packagist.org/) and can be installed via [Composer](http://getcomposer.org/) by executing the following command.

```
composer require groupdocscloud/groupdocs-viewer-cloud
``` 

You can also install the package directly from this repository. Add the following to `composer.json`, then run `composer install`.

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

### Manual Installation

Clone or download this repository, then run `composer install` in the root directory to install dependencies and include `autoload.php` into your code file.

```php
require_once('/path/to/groupdocs-viewer-cloud-php/vendor/autoload.php');
```

### Tests

Set your application information in [json.config](tests/GroupDocs/Viewer/config.json), and execute the following to run the tests.

```
php composer.phar install
./vendor/bin/phpunit
```

## Get a List of Viewable File Formats

```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

//Get Client Id and Client Secret from https://dashboard.groupdocs.cloud
$myClientId = "";
$myClientSecret = "";

// Create instance of the API
$configuration = new GroupDocs\Viewer\Configuration();
$configuration->setAppSid($myClientId);
$configuration->setAppKey($myClientSecret);
$infoApi = new GroupDocs\Viewer\InfoApi($configuration); 

try {
    $response = $infoApi->getSupportedFileFormats();

    foreach ($response->getFormats() as $key => $format) {
        echo $format->getFileFormat() . " - " .  $format->getExtension(), "\n";
    }
} catch (Exception $e) {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
}

?>
```

## GroupDocs.Viewer Cloud SDKs in Popular Languages

| .NET | Java | PHP | Python | Ruby | Node.js | Android |
|---|---|---|---|---|---|---|
| [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-dotnet) | [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-java) | [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-php) | [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-python) | [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-ruby)  | [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-node) | [GitHub](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-android) |
| [NuGet](https://www.nuget.org/packages/GroupDocs.Viewer-Cloud/) | [Maven](https://repository.groupdocs.cloud/webapp/#/artifacts/browse/tree/General/repo/com/groupdocs/groupdocs-viewer-cloud) | [Composer](https://packagist.org/packages/groupdocscloud/groupdocs-viewer-cloud) | [PIP](https://pypi.org/project/groupdocs-viewer-cloud/) | [GEM](https://rubygems.org/gems/groupdocs_viewer_cloud)  | [NPM](https://www.npmjs.com/package/groupdocs-viewer-cloud) | [Maven](https://repository.groupdocs.cloud/webapp/#/artifacts/browse/tree/General/repo/com/groupdocs/groupdocs-viewer-cloud-android) | 

[Home](https://www.groupdocs.cloud/) | [Product Page](https://products.groupdocs.cloud/viewer/php) | [Documentation](https://docs.groupdocs.cloud/viewer/) | [Live Demo](https://products.groupdocs.app/viewer/total) | [API Reference](https://apireference.groupdocs.cloud/viewer/) | [Code Samples](https://github.com/groupdocs-viewer-cloud/groupdocs-viewer-cloud-php-samples) | [Blog](https://blog.groupdocs.cloud/category/viewer/) | [Free Support](https://forum.groupdocs.cloud/c/viewer) | [Free Trial](https://dashboard.groupdocs.cloud)
