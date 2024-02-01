<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="PdfOptimizationOptions.php">
 *   Copyright (c) 2003-2024 Aspose Pty Ltd
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

namespace GroupDocs\Viewer\Model;

use \ArrayAccess;
use \GroupDocs\Viewer\ObjectSerializer;

/*
 * PdfOptimizationOptions
 *
 * @description Contains the PDF optimization options to apply to the output PDF file.
 */
class PdfOptimizationOptions implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "PdfOptimizationOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'lineriaze' => 'bool',
        'removeAnnotations' => 'bool',
        'removeFormFields' => 'bool',
        'convertToGrayScale' => 'bool',
        'subsetFonts' => 'bool',
        'compressImages' => 'bool',
        'imageQuality' => 'int',
        'resizeImages' => 'bool',
        'maxResolution' => 'int',
        'optimizeSpreadsheets' => 'bool'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'lineriaze' => null,
        'removeAnnotations' => null,
        'removeFormFields' => null,
        'convertToGrayScale' => null,
        'subsetFonts' => null,
        'compressImages' => null,
        'imageQuality' => 'int32',
        'resizeImages' => null,
        'maxResolution' => 'int32',
        'optimizeSpreadsheets' => null
    ];

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /*
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'lineriaze' => 'Lineriaze',
        'removeAnnotations' => 'RemoveAnnotations',
        'removeFormFields' => 'RemoveFormFields',
        'convertToGrayScale' => 'ConvertToGrayScale',
        'subsetFonts' => 'SubsetFonts',
        'compressImages' => 'CompressImages',
        'imageQuality' => 'ImageQuality',
        'resizeImages' => 'ResizeImages',
        'maxResolution' => 'MaxResolution',
        'optimizeSpreadsheets' => 'OptimizeSpreadsheets'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'lineriaze' => 'setLineriaze',
        'removeAnnotations' => 'setRemoveAnnotations',
        'removeFormFields' => 'setRemoveFormFields',
        'convertToGrayScale' => 'setConvertToGrayScale',
        'subsetFonts' => 'setSubsetFonts',
        'compressImages' => 'setCompressImages',
        'imageQuality' => 'setImageQuality',
        'resizeImages' => 'setResizeImages',
        'maxResolution' => 'setMaxResolution',
        'optimizeSpreadsheets' => 'setOptimizeSpreadsheets'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'lineriaze' => 'getLineriaze',
        'removeAnnotations' => 'getRemoveAnnotations',
        'removeFormFields' => 'getRemoveFormFields',
        'convertToGrayScale' => 'getConvertToGrayScale',
        'subsetFonts' => 'getSubsetFonts',
        'compressImages' => 'getCompressImages',
        'imageQuality' => 'getImageQuality',
        'resizeImages' => 'getResizeImages',
        'maxResolution' => 'getMaxResolution',
        'optimizeSpreadsheets' => 'getOptimizeSpreadsheets'
    ];

    /*
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /*
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /*
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /*
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['lineriaze'] = isset($data['lineriaze']) ? $data['lineriaze'] : null;
        $this->container['removeAnnotations'] = isset($data['removeAnnotations']) ? $data['removeAnnotations'] : null;
        $this->container['removeFormFields'] = isset($data['removeFormFields']) ? $data['removeFormFields'] : null;
        $this->container['convertToGrayScale'] = isset($data['convertToGrayScale']) ? $data['convertToGrayScale'] : null;
        $this->container['subsetFonts'] = isset($data['subsetFonts']) ? $data['subsetFonts'] : null;
        $this->container['compressImages'] = isset($data['compressImages']) ? $data['compressImages'] : null;
        $this->container['imageQuality'] = isset($data['imageQuality']) ? $data['imageQuality'] : null;
        $this->container['resizeImages'] = isset($data['resizeImages']) ? $data['resizeImages'] : null;
        $this->container['maxResolution'] = isset($data['maxResolution']) ? $data['maxResolution'] : null;
        $this->container['optimizeSpreadsheets'] = isset($data['optimizeSpreadsheets']) ? $data['optimizeSpreadsheets'] : null;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['lineriaze'] === null) {
            $invalidProperties[] = "'lineriaze' can't be null";
        }
        if ($this->container['removeAnnotations'] === null) {
            $invalidProperties[] = "'removeAnnotations' can't be null";
        }
        if ($this->container['removeFormFields'] === null) {
            $invalidProperties[] = "'removeFormFields' can't be null";
        }
        if ($this->container['convertToGrayScale'] === null) {
            $invalidProperties[] = "'convertToGrayScale' can't be null";
        }
        if ($this->container['subsetFonts'] === null) {
            $invalidProperties[] = "'subsetFonts' can't be null";
        }
        if ($this->container['compressImages'] === null) {
            $invalidProperties[] = "'compressImages' can't be null";
        }
        if ($this->container['imageQuality'] === null) {
            $invalidProperties[] = "'imageQuality' can't be null";
        }
        if ($this->container['resizeImages'] === null) {
            $invalidProperties[] = "'resizeImages' can't be null";
        }
        if ($this->container['maxResolution'] === null) {
            $invalidProperties[] = "'maxResolution' can't be null";
        }
        if ($this->container['optimizeSpreadsheets'] === null) {
            $invalidProperties[] = "'optimizeSpreadsheets' can't be null";
        }
        return $invalidProperties;
    }

    /*
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['lineriaze'] === null) {
            return false;
        }
        if ($this->container['removeAnnotations'] === null) {
            return false;
        }
        if ($this->container['removeFormFields'] === null) {
            return false;
        }
        if ($this->container['convertToGrayScale'] === null) {
            return false;
        }
        if ($this->container['subsetFonts'] === null) {
            return false;
        }
        if ($this->container['compressImages'] === null) {
            return false;
        }
        if ($this->container['imageQuality'] === null) {
            return false;
        }
        if ($this->container['resizeImages'] === null) {
            return false;
        }
        if ($this->container['maxResolution'] === null) {
            return false;
        }
        if ($this->container['optimizeSpreadsheets'] === null) {
            return false;
        }
        return true;
    }


    /*
     * Gets lineriaze
     *
     * @return bool
     */
    public function getLineriaze()
    {
        return $this->container['lineriaze'];
    }

    /*
     * Sets lineriaze
     *
     * @param bool $lineriaze Enables optimization the output PDF file for viewing online with a web browser. This optimization allows a browser to display the first pages of a PDF file when     you open the document, instead of waiting for the entire file to download.
     *
     * @return $this
     */
    public function setLineriaze($lineriaze)
    {
        $this->container['lineriaze'] = $lineriaze;

        return $this;
    }

    /*
     * Gets removeAnnotations
     *
     * @return bool
     */
    public function getRemoveAnnotations()
    {
        return $this->container['removeAnnotations'];
    }

    /*
     * Sets removeAnnotations
     *
     * @param bool $removeAnnotations Enables removing annotation from the output PDF file.
     *
     * @return $this
     */
    public function setRemoveAnnotations($removeAnnotations)
    {
        $this->container['removeAnnotations'] = $removeAnnotations;

        return $this;
    }

    /*
     * Gets removeFormFields
     *
     * @return bool
     */
    public function getRemoveFormFields()
    {
        return $this->container['removeFormFields'];
    }

    /*
     * Sets removeFormFields
     *
     * @param bool $removeFormFields Enables removing form fields from a PDF file.
     *
     * @return $this
     */
    public function setRemoveFormFields($removeFormFields)
    {
        $this->container['removeFormFields'] = $removeFormFields;

        return $this;
    }

    /*
     * Gets convertToGrayScale
     *
     * @return bool
     */
    public function getConvertToGrayScale()
    {
        return $this->container['convertToGrayScale'];
    }

    /*
     * Sets convertToGrayScale
     *
     * @param bool $convertToGrayScale Enables converting the output PDF file to a grayscale.
     *
     * @return $this
     */
    public function setConvertToGrayScale($convertToGrayScale)
    {
        $this->container['convertToGrayScale'] = $convertToGrayScale;

        return $this;
    }

    /*
     * Gets subsetFonts
     *
     * @return bool
     */
    public function getSubsetFonts()
    {
        return $this->container['subsetFonts'];
    }

    /*
     * Sets subsetFonts
     *
     * @param bool $subsetFonts Subsets fonts in the output PDF file. If the file uses embedded fonts, it contains all font data. GroupDocs.Viewer can subset embedded fonts to reduce the file size.
     *
     * @return $this
     */
    public function setSubsetFonts($subsetFonts)
    {
        $this->container['subsetFonts'] = $subsetFonts;

        return $this;
    }

    /*
     * Gets compressImages
     *
     * @return bool
     */
    public function getCompressImages()
    {
        return $this->container['compressImages'];
    }

    /*
     * Sets compressImages
     *
     * @param bool $compressImages Enables compressing images in the output PDF file. Use this option to allow other compressing options: PdfOptimizationOptions.ImageQuality and PdfOptimizationOptions.MaxResolution.
     *
     * @return $this
     */
    public function setCompressImages($compressImages)
    {
        $this->container['compressImages'] = $compressImages;

        return $this;
    }

    /*
     * Gets imageQuality
     *
     * @return int
     */
    public function getImageQuality()
    {
        return $this->container['imageQuality'];
    }

    /*
     * Sets imageQuality
     *
     * @param int $imageQuality Sets the image quality in the output PDF file (in percent). To change the image quality, first set the PdfOptimizationOptions.CompressImages property to true.
     *
     * @return $this
     */
    public function setImageQuality($imageQuality)
    {
        $this->container['imageQuality'] = $imageQuality;

        return $this;
    }

    /*
     * Gets resizeImages
     *
     * @return bool
     */
    public function getResizeImages()
    {
        return $this->container['resizeImages'];
    }

    /*
     * Sets resizeImages
     *
     * @param bool $resizeImages Enables setting the maximum resolution in the output PDF file. To allow this option, set the GroupDocs.Viewer.Options.PdfOptimizationOptions.CompressImages property to true. This option allows setting the GroupDocs.Viewer.Options.PdfOptimizationOptions.MaxResolution property.
     *
     * @return $this
     */
    public function setResizeImages($resizeImages)
    {
        $this->container['resizeImages'] = $resizeImages;

        return $this;
    }

    /*
     * Gets maxResolution
     *
     * @return int
     */
    public function getMaxResolution()
    {
        return $this->container['maxResolution'];
    }

    /*
     * Sets maxResolution
     *
     * @param int $maxResolution Sets the maximum resolution in the output PDF file. To allow this option, set the GroupDocs.Viewer.Options.PdfOptimizationOptions.CompressImages and GroupDocs.Viewer.Options.PdfOptimizationOptions.MaxResolution properties to true. The default value is 300.
     *
     * @return $this
     */
    public function setMaxResolution($maxResolution)
    {
        $this->container['maxResolution'] = $maxResolution;

        return $this;
    }

    /*
     * Gets optimizeSpreadsheets
     *
     * @return bool
     */
    public function getOptimizeSpreadsheets()
    {
        return $this->container['optimizeSpreadsheets'];
    }

    /*
     * Sets optimizeSpreadsheets
     *
     * @param bool $optimizeSpreadsheets Enables optimization of spreadsheets in the PDF files. This optimization allows to reduce the output file size by setting up border lines. Besides that, it removes the Arial and Times New Roman characters of 32-127 codes.
     *
     * @return $this
     */
    public function setOptimizeSpreadsheets($optimizeSpreadsheets)
    {
        $this->container['optimizeSpreadsheets'] = $optimizeSpreadsheets;

        return $this;
    }
    /*
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /*
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /*
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /*
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /*
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


