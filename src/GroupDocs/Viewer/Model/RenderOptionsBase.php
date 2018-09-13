<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="RenderOptionsBase.php">
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

namespace GroupDocs\Viewer\Model;

use \ArrayAccess;
use \GroupDocs\Viewer\ObjectSerializer;

/*
 * RenderOptionsBase
 *
 * @description Base render options.
 */
class RenderOptionsBase implements ArrayAccess
{
    const DISCRIMINATOR = 'Type';

    /*
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = "RenderOptionsBase";

    /*
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'password' => 'string',
        'attachmentPassword' => 'string',
        'extractText' => 'bool',
        'renderComments' => 'bool',
        'renderHiddenPages' => 'bool',
        'transforms' => 'string[]',
        'defaultFontName' => 'string',
        'watermark' => '\GroupDocs\Viewer\Model\Watermark',
        'cellsOptions' => '\GroupDocs\Viewer\Model\CellsOptions',
        'cadOptions' => '\GroupDocs\Viewer\Model\CadOptions',
        'emailOptions' => '\GroupDocs\Viewer\Model\EmailOptions',
        'wordsOptions' => '\GroupDocs\Viewer\Model\WordsOptions',
        'pdfOptions' => '\GroupDocs\Viewer\Model\PdfOptions',
        'slidesOptions' => '\GroupDocs\Viewer\Model\SlidesOptions',
        'projectOptions' => '\GroupDocs\Viewer\Model\ProjectOptions'
    ];

    /*
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'password' => null,
        'attachmentPassword' => null,
        'extractText' => null,
        'renderComments' => null,
        'renderHiddenPages' => null,
        'transforms' => null,
        'defaultFontName' => null,
        'watermark' => null,
        'cellsOptions' => null,
        'cadOptions' => null,
        'emailOptions' => null,
        'wordsOptions' => null,
        'pdfOptions' => null,
        'slidesOptions' => null,
        'projectOptions' => null
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
        'password' => 'Password',
        'attachmentPassword' => 'AttachmentPassword',
        'extractText' => 'ExtractText',
        'renderComments' => 'RenderComments',
        'renderHiddenPages' => 'RenderHiddenPages',
        'transforms' => 'Transforms',
        'defaultFontName' => 'DefaultFontName',
        'watermark' => 'Watermark',
        'cellsOptions' => 'CellsOptions',
        'cadOptions' => 'CadOptions',
        'emailOptions' => 'EmailOptions',
        'wordsOptions' => 'WordsOptions',
        'pdfOptions' => 'PdfOptions',
        'slidesOptions' => 'SlidesOptions',
        'projectOptions' => 'ProjectOptions'
    ];

    /*
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'password' => 'setPassword',
        'attachmentPassword' => 'setAttachmentPassword',
        'extractText' => 'setExtractText',
        'renderComments' => 'setRenderComments',
        'renderHiddenPages' => 'setRenderHiddenPages',
        'transforms' => 'setTransforms',
        'defaultFontName' => 'setDefaultFontName',
        'watermark' => 'setWatermark',
        'cellsOptions' => 'setCellsOptions',
        'cadOptions' => 'setCadOptions',
        'emailOptions' => 'setEmailOptions',
        'wordsOptions' => 'setWordsOptions',
        'pdfOptions' => 'setPdfOptions',
        'slidesOptions' => 'setSlidesOptions',
        'projectOptions' => 'setProjectOptions'
    ];

    /*
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'password' => 'getPassword',
        'attachmentPassword' => 'getAttachmentPassword',
        'extractText' => 'getExtractText',
        'renderComments' => 'getRenderComments',
        'renderHiddenPages' => 'getRenderHiddenPages',
        'transforms' => 'getTransforms',
        'defaultFontName' => 'getDefaultFontName',
        'watermark' => 'getWatermark',
        'cellsOptions' => 'getCellsOptions',
        'cadOptions' => 'getCadOptions',
        'emailOptions' => 'getEmailOptions',
        'wordsOptions' => 'getWordsOptions',
        'pdfOptions' => 'getPdfOptions',
        'slidesOptions' => 'getSlidesOptions',
        'projectOptions' => 'getProjectOptions'
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
        $this->container['password'] = isset($data['password']) ? $data['password'] : null;
        $this->container['attachmentPassword'] = isset($data['attachmentPassword']) ? $data['attachmentPassword'] : null;
        $this->container['extractText'] = isset($data['extractText']) ? $data['extractText'] : null;
        $this->container['renderComments'] = isset($data['renderComments']) ? $data['renderComments'] : null;
        $this->container['renderHiddenPages'] = isset($data['renderHiddenPages']) ? $data['renderHiddenPages'] : null;
        $this->container['transforms'] = isset($data['transforms']) ? $data['transforms'] : null;
        $this->container['defaultFontName'] = isset($data['defaultFontName']) ? $data['defaultFontName'] : null;
        $this->container['watermark'] = isset($data['watermark']) ? $data['watermark'] : null;
        $this->container['cellsOptions'] = isset($data['cellsOptions']) ? $data['cellsOptions'] : null;
        $this->container['cadOptions'] = isset($data['cadOptions']) ? $data['cadOptions'] : null;
        $this->container['emailOptions'] = isset($data['emailOptions']) ? $data['emailOptions'] : null;
        $this->container['wordsOptions'] = isset($data['wordsOptions']) ? $data['wordsOptions'] : null;
        $this->container['pdfOptions'] = isset($data['pdfOptions']) ? $data['pdfOptions'] : null;
        $this->container['slidesOptions'] = isset($data['slidesOptions']) ? $data['slidesOptions'] : null;
        $this->container['projectOptions'] = isset($data['projectOptions']) ? $data['projectOptions'] : null;

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

        if ($this->container['extractText'] === null) {
            $invalidProperties[] = "'extractText' can't be null";
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

        if ($this->container['extractText'] === null) {
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
     * Gets password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /*
     * Sets password
     *
     * @param string $password Allows to specify document password in case when document is password-protected.
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->container['password'] = $password;

        return $this;
    }

    /*
     * Gets attachmentPassword
     *
     * @return string
     */
    public function getAttachmentPassword()
    {
        return $this->container['attachmentPassword'];
    }

    /*
     * Sets attachmentPassword
     *
     * @param string $attachmentPassword Allows to specify attachment password in case when attachment is password-protected.
     *
     * @return $this
     */
    public function setAttachmentPassword($attachmentPassword)
    {
        $this->container['attachmentPassword'] = $attachmentPassword;

        return $this;
    }

    /*
     * Gets extractText
     *
     * @return bool
     */
    public function getExtractText()
    {
        return $this->container['extractText'];
    }

    /*
     * Sets extractText
     *
     * @param bool $extractText Enables document text extraction. For rendering document as image only.
     *
     * @return $this
     */
    public function setExtractText($extractText)
    {
        $this->container['extractText'] = $extractText;

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
     * @param bool $renderComments Enables document comments rendering.
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
     * @param bool $renderHiddenPages Enables rendering of document hidden pages, sheets or slides.
     *
     * @return $this
     */
    public function setRenderHiddenPages($renderHiddenPages)
    {
        $this->container['renderHiddenPages'] = $renderHiddenPages;

        return $this;
    }

    /*
     * Gets transforms
     *
     * @return string[]
     */
    public function getTransforms()
    {
        return $this->container['transforms'];
    }

    /*
     * Sets transforms
     *
     * @param string[] $transforms Transforms to apply. Available transforms [\"Rotate\",\"Reorder\",\"AddPrintAction\"]. 1. Rotate - pages will be rotated on angle if angle was set before. 2. Reorder - for rendering document as PDF only. Pages will be ordered according to rearrangements made before. 3. AddPrintAction - for rendering document as PDF only. An JavaScript action will be added which opens print dialog when PDF document is opened.
     *
     * @return $this
     */
    public function setTransforms($transforms)
    {
        $this->container['transforms'] = $transforms;

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
     * @param string $defaultFontName The name of the default font. Default font name may be specified in following cases: - You want to generally specify the default font to fall back on, if particular font   in the document cannot be found during rendering. - Your document uses fonts, that contain non-English characters and you want to make sure   any missing font is replaced with one that has the same character set available.
     *
     * @return $this
     */
    public function setDefaultFontName($defaultFontName)
    {
        $this->container['defaultFontName'] = $defaultFontName;

        return $this;
    }

    /*
     * Gets watermark
     *
     * @return \GroupDocs\Viewer\Model\Watermark
     */
    public function getWatermark()
    {
        return $this->container['watermark'];
    }

    /*
     * Sets watermark
     *
     * @param \GroupDocs\Viewer\Model\Watermark $watermark Allows to specify watermark.
     *
     * @return $this
     */
    public function setWatermark($watermark)
    {
        $this->container['watermark'] = $watermark;

        return $this;
    }

    /*
     * Gets cellsOptions
     *
     * @return \GroupDocs\Viewer\Model\CellsOptions
     */
    public function getCellsOptions()
    {
        return $this->container['cellsOptions'];
    }

    /*
     * Sets cellsOptions
     *
     * @param \GroupDocs\Viewer\Model\CellsOptions $cellsOptions The Spreadsheet documents rendering options.
     *
     * @return $this
     */
    public function setCellsOptions($cellsOptions)
    {
        $this->container['cellsOptions'] = $cellsOptions;

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
     * @param \GroupDocs\Viewer\Model\CadOptions $cadOptions The CAD documents rendering options.
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
     * @param \GroupDocs\Viewer\Model\EmailOptions $emailOptions The Email documents rendering options.
     *
     * @return $this
     */
    public function setEmailOptions($emailOptions)
    {
        $this->container['emailOptions'] = $emailOptions;

        return $this;
    }

    /*
     * Gets wordsOptions
     *
     * @return \GroupDocs\Viewer\Model\WordsOptions
     */
    public function getWordsOptions()
    {
        return $this->container['wordsOptions'];
    }

    /*
     * Sets wordsOptions
     *
     * @param \GroupDocs\Viewer\Model\WordsOptions $wordsOptions The Text documents rendering options.
     *
     * @return $this
     */
    public function setWordsOptions($wordsOptions)
    {
        $this->container['wordsOptions'] = $wordsOptions;

        return $this;
    }

    /*
     * Gets pdfOptions
     *
     * @return \GroupDocs\Viewer\Model\PdfOptions
     */
    public function getPdfOptions()
    {
        return $this->container['pdfOptions'];
    }

    /*
     * Sets pdfOptions
     *
     * @param \GroupDocs\Viewer\Model\PdfOptions $pdfOptions The PDF documents rendering options.
     *
     * @return $this
     */
    public function setPdfOptions($pdfOptions)
    {
        $this->container['pdfOptions'] = $pdfOptions;

        return $this;
    }

    /*
     * Gets slidesOptions
     *
     * @return \GroupDocs\Viewer\Model\SlidesOptions
     */
    public function getSlidesOptions()
    {
        return $this->container['slidesOptions'];
    }

    /*
     * Sets slidesOptions
     *
     * @param \GroupDocs\Viewer\Model\SlidesOptions $slidesOptions The Presentation documents rendering options.
     *
     * @return $this
     */
    public function setSlidesOptions($slidesOptions)
    {
        $this->container['slidesOptions'] = $slidesOptions;

        return $this;
    }

    /*
     * Gets projectOptions
     *
     * @return \GroupDocs\Viewer\Model\ProjectOptions
     */
    public function getProjectOptions()
    {
        return $this->container['projectOptions'];
    }

    /*
     * Sets projectOptions
     *
     * @param \GroupDocs\Viewer\Model\ProjectOptions $projectOptions The Microsoft Project documents rendering options.
     *
     * @return $this
     */
    public function setProjectOptions($projectOptions)
    {
        $this->container['projectOptions'] = $projectOptions;

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


