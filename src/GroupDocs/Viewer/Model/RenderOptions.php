<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="RenderOptions.php">
 *   Copyright (c) 2003-2019 Aspose Pty Ltd
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
 * RenderOptions
 *
 * @description Rendering options
 */
class RenderOptions implements ArrayAccess
{
    const DISCRIMINATOR = 'Type';

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "RenderOptions";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'startPageNumber' => 'int',
        'countPagesToRender' => 'int',
        'defaultFontName' => 'string',
        'defaultEncoding' => 'string',
        'renderComments' => 'bool',
        'renderHiddenPages' => 'bool',
        'spreadsheetOptions' => '\GroupDocs\Viewer\Model\SpreadsheetOptions',
        'cadOptions' => '\GroupDocs\Viewer\Model\CadOptions',
        'emailOptions' => '\GroupDocs\Viewer\Model\EmailOptions',
        'projectManagementOptions' => '\GroupDocs\Viewer\Model\ProjectManagementOptions'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'startPageNumber' => 'int32',
        'countPagesToRender' => 'int32',
        'defaultFontName' => null,
        'defaultEncoding' => null,
        'renderComments' => null,
        'renderHiddenPages' => null,
        'spreadsheetOptions' => null,
        'cadOptions' => null,
        'emailOptions' => null,
        'projectManagementOptions' => null
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
        'startPageNumber' => 'StartPageNumber',
        'countPagesToRender' => 'CountPagesToRender',
        'defaultFontName' => 'DefaultFontName',
        'defaultEncoding' => 'DefaultEncoding',
        'renderComments' => 'RenderComments',
        'renderHiddenPages' => 'RenderHiddenPages',
        'spreadsheetOptions' => 'SpreadsheetOptions',
        'cadOptions' => 'CadOptions',
        'emailOptions' => 'EmailOptions',
        'projectManagementOptions' => 'ProjectManagementOptions'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'startPageNumber' => 'setStartPageNumber',
        'countPagesToRender' => 'setCountPagesToRender',
        'defaultFontName' => 'setDefaultFontName',
        'defaultEncoding' => 'setDefaultEncoding',
        'renderComments' => 'setRenderComments',
        'renderHiddenPages' => 'setRenderHiddenPages',
        'spreadsheetOptions' => 'setSpreadsheetOptions',
        'cadOptions' => 'setCadOptions',
        'emailOptions' => 'setEmailOptions',
        'projectManagementOptions' => 'setProjectManagementOptions'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'startPageNumber' => 'getStartPageNumber',
        'countPagesToRender' => 'getCountPagesToRender',
        'defaultFontName' => 'getDefaultFontName',
        'defaultEncoding' => 'getDefaultEncoding',
        'renderComments' => 'getRenderComments',
        'renderHiddenPages' => 'getRenderHiddenPages',
        'spreadsheetOptions' => 'getSpreadsheetOptions',
        'cadOptions' => 'getCadOptions',
        'emailOptions' => 'getEmailOptions',
        'projectManagementOptions' => 'getProjectManagementOptions'
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
        $this->container['startPageNumber'] = isset($data['startPageNumber']) ? $data['startPageNumber'] : null;
        $this->container['countPagesToRender'] = isset($data['countPagesToRender']) ? $data['countPagesToRender'] : null;
        $this->container['defaultFontName'] = isset($data['defaultFontName']) ? $data['defaultFontName'] : null;
        $this->container['defaultEncoding'] = isset($data['defaultEncoding']) ? $data['defaultEncoding'] : null;
        $this->container['renderComments'] = isset($data['renderComments']) ? $data['renderComments'] : null;
        $this->container['renderHiddenPages'] = isset($data['renderHiddenPages']) ? $data['renderHiddenPages'] : null;
        $this->container['spreadsheetOptions'] = isset($data['spreadsheetOptions']) ? $data['spreadsheetOptions'] : null;
        $this->container['cadOptions'] = isset($data['cadOptions']) ? $data['cadOptions'] : null;
        $this->container['emailOptions'] = isset($data['emailOptions']) ? $data['emailOptions'] : null;
        $this->container['projectManagementOptions'] = isset($data['projectManagementOptions']) ? $data['projectManagementOptions'] : null;

        // Initialize discriminator property with the model name.
        $discriminator = array_search('Type', self::$attributeMap);
        $this->container[$discriminator] = static::$swaggerModelName;
    }

    /*
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['startPageNumber'] === null) {
            $invalidProperties[] = "'startPageNumber' can't be null";
        }
        if ($this->container['countPagesToRender'] === null) {
            $invalidProperties[] = "'countPagesToRender' can't be null";
        }
        if ($this->container['renderComments'] === null) {
            $invalidProperties[] = "'renderComments' can't be null";
        }
        if ($this->container['renderHiddenPages'] === null) {
            $invalidProperties[] = "'renderHiddenPages' can't be null";
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

        if ($this->container['startPageNumber'] === null) {
            return false;
        }
        if ($this->container['countPagesToRender'] === null) {
            return false;
        }
        if ($this->container['renderComments'] === null) {
            return false;
        }
        if ($this->container['renderHiddenPages'] === null) {
            return false;
        }
        return true;
    }


    /*
     * Gets startPageNumber
     *
     * @return int
     */
    public function getStartPageNumber()
    {
        return $this->container['startPageNumber'];
    }

    /*
     * Sets startPageNumber
     *
     * @param int $startPageNumber Page number from which rendering should be started
     *
     * @return $this
     */
    public function setStartPageNumber($startPageNumber)
    {
        $this->container['startPageNumber'] = $startPageNumber;

        return $this;
    }

    /*
     * Gets countPagesToRender
     *
     * @return int
     */
    public function getCountPagesToRender()
    {
        return $this->container['countPagesToRender'];
    }

    /*
     * Sets countPagesToRender
     *
     * @param int $countPagesToRender Count pages which should be rendered
     *
     * @return $this
     */
    public function setCountPagesToRender($countPagesToRender)
    {
        $this->container['countPagesToRender'] = $countPagesToRender;

        return $this;
    }

    /*
     * Gets defaultFontName
     *
     * @return string
     */
    public function getDefaultFontName()
    {
        return $this->container['defaultFontName'];
    }

    /*
     * Sets defaultFontName
     *
     * @param string $defaultFontName Default font name may be specified in following cases: - You want to generally specify the default font to fall back on, if particular font   in the document cannot be found during rendering. - Your document uses fonts, that contain non-English characters and you want to make sure   any missing font is replaced with one that has the same character set available.
     *
     * @return $this
     */
    public function setDefaultFontName($defaultFontName)
    {
        $this->container['defaultFontName'] = $defaultFontName;

        return $this;
    }

    /*
     * Gets defaultEncoding
     *
     * @return string
     */
    public function getDefaultEncoding()
    {
        return $this->container['defaultEncoding'];
    }

    /*
     * Sets defaultEncoding
     *
     * @param string $defaultEncoding Default encoding for the plain text files such as .csv, .txt and .eml files when encoding is not specified in header
     *
     * @return $this
     */
    public function setDefaultEncoding($defaultEncoding)
    {
        $this->container['defaultEncoding'] = $defaultEncoding;

        return $this;
    }

    /*
     * Gets renderComments
     *
     * @return bool
     */
    public function getRenderComments()
    {
        return $this->container['renderComments'];
    }

    /*
     * Sets renderComments
     *
     * @param bool $renderComments When enabled comments will be rendered to the output.
     *
     * @return $this
     */
    public function setRenderComments($renderComments)
    {
        $this->container['renderComments'] = $renderComments;

        return $this;
    }

    /*
     * Gets renderHiddenPages
     *
     * @return bool
     */
    public function getRenderHiddenPages()
    {
        return $this->container['renderHiddenPages'];
    }

    /*
     * Sets renderHiddenPages
     *
     * @param bool $renderHiddenPages When enabled hidden pages, sheets or slides will be rendered to the output
     *
     * @return $this
     */
    public function setRenderHiddenPages($renderHiddenPages)
    {
        $this->container['renderHiddenPages'] = $renderHiddenPages;

        return $this;
    }

    /*
     * Gets spreadsheetOptions
     *
     * @return \GroupDocs\Viewer\Model\SpreadsheetOptions
     */
    public function getSpreadsheetOptions()
    {
        return $this->container['spreadsheetOptions'];
    }

    /*
     * Sets spreadsheetOptions
     *
     * @param \GroupDocs\Viewer\Model\SpreadsheetOptions $spreadsheetOptions Rendering options for Spreadsheet file formats. Spreadsheet file formats include files with extensions: .xls, .xlsx, .xlsm, .xlsb, .csv, .ods, .ots, .xltx, .xltm, .tsv
     *
     * @return $this
     */
    public function setSpreadsheetOptions($spreadsheetOptions)
    {
        $this->container['spreadsheetOptions'] = $spreadsheetOptions;

        return $this;
    }

    /*
     * Gets cadOptions
     *
     * @return \GroupDocs\Viewer\Model\CadOptions
     */
    public function getCadOptions()
    {
        return $this->container['cadOptions'];
    }

    /*
     * Sets cadOptions
     *
     * @param \GroupDocs\Viewer\Model\CadOptions $cadOptions Rendering options for CAD file formats. CAD file formats include files with extensions: .dwg, .dxf, .dgn, .ifc, .stl
     *
     * @return $this
     */
    public function setCadOptions($cadOptions)
    {
        $this->container['cadOptions'] = $cadOptions;

        return $this;
    }

    /*
     * Gets emailOptions
     *
     * @return \GroupDocs\Viewer\Model\EmailOptions
     */
    public function getEmailOptions()
    {
        return $this->container['emailOptions'];
    }

    /*
     * Sets emailOptions
     *
     * @param \GroupDocs\Viewer\Model\EmailOptions $emailOptions Rendering options for Email file formats. Email file formats include files with extensions: .msg, .eml, .emlx, .ifc, .stl
     *
     * @return $this
     */
    public function setEmailOptions($emailOptions)
    {
        $this->container['emailOptions'] = $emailOptions;

        return $this;
    }

    /*
     * Gets projectManagementOptions
     *
     * @return \GroupDocs\Viewer\Model\ProjectManagementOptions
     */
    public function getProjectManagementOptions()
    {
        return $this->container['projectManagementOptions'];
    }

    /*
     * Sets projectManagementOptions
     *
     * @param \GroupDocs\Viewer\Model\ProjectManagementOptions $projectManagementOptions Rendering options for Project file formats. Project file formats include files with extensions: .mpt, .mpp
     *
     * @return $this
     */
    public function setProjectManagementOptions($projectManagementOptions)
    {
        $this->container['projectManagementOptions'] = $projectManagementOptions;

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


