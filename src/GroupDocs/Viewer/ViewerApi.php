<?php
/*
 * --------------------------------------------------------------------------------------------------------------------
 * <copyright company="Aspose Pty Ltd" file="ViewerApi.php">
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

namespace GroupDocs\Viewer;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GroupDocs\Viewer\Model\Requests;

/*
 * GroupDocs.Viewer Cloud API
 */
class ViewerApi
{
    /*
     * Stores client instance
     * @var ClientInterface client for calling api
     */
    protected $client;

    /*
     * Stores configuration
     * @var Configuration configuration info
     */
    protected $config;
  
    /*
     * Stores header selector
     * HeaderSelector class for header selection
     */
    protected $headerSelector;

    /*
     * Stores access token
     * @var accessToken Access token
     */
    protected $accessToken;

    /*
     * Stores refresh token
     * @var refreshToken Refresh token
     */
    protected $refreshToken;

    /*
     * Initialize a new instance of ViewerApi
     * @param Configuration   $config configuration info
     * @param ClientInterface   $client client for calling api
     * @param HeaderSelector   $selector class for header selection
     */
    public function __construct(Configuration $config = null, ClientInterface $client = null, HeaderSelector $selector = null)
    {
        $this->config = $config ?: new Configuration();
        $this->client = $client ?: new Client();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /*
     * Gets the config
     * @return Configuration
     */
    public function getConfig() 
    {
        return $this->config;
    }

    /*
     * Operation deleteFontsCache
     *
     * Removes fonts cache.
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteFontsCache()
    {
        try {
             $this->deleteFontsCacheWithHttpInfo();
        }
        catch(RepeatRequestException $e) {
             $this->deleteFontsCacheWithHttpInfo();
        } 
    }

    /*
     * Operation deleteFontsCacheWithHttpInfo
     *
     * Removes fonts cache.
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteFontsCacheWithHttpInfo()
    {
        $returnType = '';
        $request = $this->deleteFontsCacheRequest();

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /*
     * Operation deleteFontsCacheAsync
     *
     * Removes fonts cache.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFontsCacheAsync() 
    {
        return $this->deleteFontsCacheAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation deleteFontsCacheAsyncWithHttpInfo
     *
     * Removes fonts cache.
     *
     * @param Requests\deleteFontsCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFontsCacheAsyncWithHttpInfo() 
    {
        $returnType = '';
        $request = $this->deleteFontsCacheRequest();

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'deleteFontsCache'
     *
     * @param Requests\deleteFontsCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteFontsCacheRequest()
    {

        $resourcePath = '/viewer/fonts/cache';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'DELETE',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('DELETE', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation getFonts
     *
     * List installed fonts.
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\FontCollection
     */
    public function getFonts()
    {
        try {
             list($response) = $this->getFontsWithHttpInfo();
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->getFontsWithHttpInfo();
             return $response;
        } 
    }

    /*
     * Operation getFontsWithHttpInfo
     *
     * List installed fonts.
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\FontCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFontsWithHttpInfo()
    {
        $returnType = '\GroupDocs\Viewer\Model\FontCollection';
        $request = $this->getFontsRequest();

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\FontCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation getFontsAsync
     *
     * List installed fonts.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFontsAsync() 
    {
        return $this->getFontsAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation getFontsAsyncWithHttpInfo
     *
     * List installed fonts.
     *
     * @param Requests\getFontsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFontsAsyncWithHttpInfo() 
    {
        $returnType = '\GroupDocs\Viewer\Model\FontCollection';
        $request = $this->getFontsRequest();

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'getFonts'
     *
     * @param Requests\getFontsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFontsRequest()
    {

        $resourcePath = '/viewer/fonts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation getSupportedFileFormats
     *
     * Retrieves list of supported file formats.
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\FormatCollection
     */
    public function getSupportedFileFormats()
    {
        try {
             list($response) = $this->getSupportedFileFormatsWithHttpInfo();
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->getSupportedFileFormatsWithHttpInfo();
             return $response;
        } 
    }

    /*
     * Operation getSupportedFileFormatsWithHttpInfo
     *
     * Retrieves list of supported file formats.
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\FormatCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSupportedFileFormatsWithHttpInfo()
    {
        $returnType = '\GroupDocs\Viewer\Model\FormatCollection';
        $request = $this->getSupportedFileFormatsRequest();

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\FormatCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation getSupportedFileFormatsAsync
     *
     * Retrieves list of supported file formats.
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSupportedFileFormatsAsync() 
    {
        return $this->getSupportedFileFormatsAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation getSupportedFileFormatsAsyncWithHttpInfo
     *
     * Retrieves list of supported file formats.
     *
     * @param Requests\getSupportedFileFormatsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSupportedFileFormatsAsyncWithHttpInfo() 
    {
        $returnType = '\GroupDocs\Viewer\Model\FormatCollection';
        $request = $this->getSupportedFileFormatsRequest();

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'getSupportedFileFormats'
     *
     * @param Requests\getSupportedFileFormatsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSupportedFileFormatsRequest()
    {

        $resourcePath = '/viewer/formats';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreateAttachmentPagesCache
     *
     * Creates attachment cache.
     *
     * @param Requests\HtmlCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlAttachmentPageCollection
     */
    public function htmlCreateAttachmentPagesCache(Requests\HtmlCreateAttachmentPagesCacheRequest $request)
    {
        try {
             list($response) = $this->htmlCreateAttachmentPagesCacheWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreateAttachmentPagesCacheWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreateAttachmentPagesCacheWithHttpInfo
     *
     * Creates attachment cache.
     *
     * @param Requests\HtmlCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlAttachmentPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreateAttachmentPagesCacheWithHttpInfo(Requests\HtmlCreateAttachmentPagesCacheRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlAttachmentPageCollection';
        $request = $this->HtmlCreateAttachmentPagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlAttachmentPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreateAttachmentPagesCacheAsync
     *
     * Creates attachment cache.
     *
     * @param Requests\HtmlCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreateAttachmentPagesCacheAsync(Requests\HtmlCreateAttachmentPagesCacheRequest $request) 
    {
        return $this->htmlCreateAttachmentPagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreateAttachmentPagesCacheAsyncWithHttpInfo
     *
     * Creates attachment cache.
     *
     * @param Requests\HtmlCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreateAttachmentPagesCacheAsyncWithHttpInfo(Requests\HtmlCreateAttachmentPagesCacheRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlAttachmentPageCollection';
        $request = $this->HtmlCreateAttachmentPagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreateAttachmentPagesCache'
     *
     * @param Requests\HtmlCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreateAttachmentPagesCacheRequest(Requests\HtmlCreateAttachmentPagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlCreateAttachmentPagesCache');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlCreateAttachmentPagesCache');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->htmlOptions)) {
            if (is_string($request->htmlOptions)) {
                $_tempBody = "\"" . $request->htmlOptions . "\"";   
            } else {
                $_tempBody = $request->htmlOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreatePagesCache
     *
     * Creates document pages as HTML and saves them in cache. Pages created before will be removed from cache.
     *
     * @param Requests\HtmlCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlPageCollection
     */
    public function htmlCreatePagesCache(Requests\HtmlCreatePagesCacheRequest $request)
    {
        try {
             list($response) = $this->htmlCreatePagesCacheWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreatePagesCacheWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreatePagesCacheWithHttpInfo
     *
     * Creates document pages as HTML and saves them in cache. Pages created before will be removed from cache.
     *
     * @param Requests\HtmlCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreatePagesCacheWithHttpInfo(Requests\HtmlCreatePagesCacheRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlCreatePagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreatePagesCacheAsync
     *
     * Creates document pages as HTML and saves them in cache. Pages created before will be removed from cache.
     *
     * @param Requests\HtmlCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePagesCacheAsync(Requests\HtmlCreatePagesCacheRequest $request) 
    {
        return $this->htmlCreatePagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreatePagesCacheAsyncWithHttpInfo
     *
     * Creates document pages as HTML and saves them in cache. Pages created before will be removed from cache.
     *
     * @param Requests\HtmlCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePagesCacheAsyncWithHttpInfo(Requests\HtmlCreatePagesCacheRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlCreatePagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreatePagesCache'
     *
     * @param Requests\HtmlCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreatePagesCacheRequest(Requests\HtmlCreatePagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlCreatePagesCache');
        }

        $resourcePath = '/viewer/{fileName}/html/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->htmlOptions)) {
            if (is_string($request->htmlOptions)) {
                $_tempBody = "\"" . $request->htmlOptions . "\"";   
            } else {
                $_tempBody = $request->htmlOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreatePagesCacheFromContent
     *
     * Creates posted document pages as HTML and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlPageCollection
     */
    public function htmlCreatePagesCacheFromContent(Requests\HtmlCreatePagesCacheFromContentRequest $request)
    {
        try {
             list($response) = $this->htmlCreatePagesCacheFromContentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreatePagesCacheFromContentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreatePagesCacheFromContentWithHttpInfo
     *
     * Creates posted document pages as HTML and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreatePagesCacheFromContentWithHttpInfo(Requests\HtmlCreatePagesCacheFromContentRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlCreatePagesCacheFromContentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreatePagesCacheFromContentAsync
     *
     * Creates posted document pages as HTML and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePagesCacheFromContentAsync(Requests\HtmlCreatePagesCacheFromContentRequest $request) 
    {
        return $this->htmlCreatePagesCacheFromContentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreatePagesCacheFromContentAsyncWithHttpInfo
     *
     * Creates posted document pages as HTML and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePagesCacheFromContentAsyncWithHttpInfo(Requests\HtmlCreatePagesCacheFromContentRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlCreatePagesCacheFromContentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreatePagesCacheFromContent'
     *
     * @param Requests\HtmlCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreatePagesCacheFromContentRequest(Requests\HtmlCreatePagesCacheFromContentRequest $request)
    {
        // verify the required parameter 'file' is set
        if ($request->file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling htmlCreatePagesCacheFromContent');
        }
        // verify the required parameter 'htmlOptions' is set
        if ($request->htmlOptions === null) {
            throw new \InvalidArgumentException('Missing the required parameter $htmlOptions when calling htmlCreatePagesCacheFromContent');
        }

        $resourcePath = '/viewer/html/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // form params
        if ($request->file !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->file);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['file'] = $contents;
        }
        // form params
        if ($request->htmlOptions !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->htmlOptions);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['htmlOptions'] = $contents;
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreatePagesCacheFromUrl
     *
     * Creates pages as HTML and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlPageCollection
     */
    public function htmlCreatePagesCacheFromUrl(Requests\HtmlCreatePagesCacheFromUrlRequest $request)
    {
        try {
             list($response) = $this->htmlCreatePagesCacheFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreatePagesCacheFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreatePagesCacheFromUrlWithHttpInfo
     *
     * Creates pages as HTML and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreatePagesCacheFromUrlWithHttpInfo(Requests\HtmlCreatePagesCacheFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlCreatePagesCacheFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreatePagesCacheFromUrlAsync
     *
     * Creates pages as HTML and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePagesCacheFromUrlAsync(Requests\HtmlCreatePagesCacheFromUrlRequest $request) 
    {
        return $this->htmlCreatePagesCacheFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreatePagesCacheFromUrlAsyncWithHttpInfo
     *
     * Creates pages as HTML and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePagesCacheFromUrlAsyncWithHttpInfo(Requests\HtmlCreatePagesCacheFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlCreatePagesCacheFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreatePagesCacheFromUrl'
     *
     * @param Requests\HtmlCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreatePagesCacheFromUrlRequest(Requests\HtmlCreatePagesCacheFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling htmlCreatePagesCacheFromUrl');
        }

        $resourcePath = '/viewer/html/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->htmlOptions)) {
            if (is_string($request->htmlOptions)) {
                $_tempBody = "\"" . $request->htmlOptions . "\"";   
            } else {
                $_tempBody = $request->htmlOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreatePdfFile
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\HtmlCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PdfFileInfo
     */
    public function htmlCreatePdfFile(Requests\HtmlCreatePdfFileRequest $request)
    {
        try {
             list($response) = $this->htmlCreatePdfFileWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreatePdfFileWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreatePdfFileWithHttpInfo
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\HtmlCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PdfFileInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreatePdfFileWithHttpInfo(Requests\HtmlCreatePdfFileRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->HtmlCreatePdfFileRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PdfFileInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreatePdfFileAsync
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\HtmlCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePdfFileAsync(Requests\HtmlCreatePdfFileRequest $request) 
    {
        return $this->htmlCreatePdfFileAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreatePdfFileAsyncWithHttpInfo
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\HtmlCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePdfFileAsyncWithHttpInfo(Requests\HtmlCreatePdfFileRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->HtmlCreatePdfFileRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreatePdfFile'
     *
     * @param Requests\HtmlCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreatePdfFileRequest(Requests\HtmlCreatePdfFileRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlCreatePdfFile');
        }

        $resourcePath = '/viewer/{fileName}/html/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->pdfFileOptions)) {
            if (is_string($request->pdfFileOptions)) {
                $_tempBody = "\"" . $request->pdfFileOptions . "\"";   
            } else {
                $_tempBody = $request->pdfFileOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreatePdfFileFromContent
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PdfFileInfo
     */
    public function htmlCreatePdfFileFromContent(Requests\HtmlCreatePdfFileFromContentRequest $request)
    {
        try {
             list($response) = $this->htmlCreatePdfFileFromContentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreatePdfFileFromContentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreatePdfFileFromContentWithHttpInfo
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PdfFileInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreatePdfFileFromContentWithHttpInfo(Requests\HtmlCreatePdfFileFromContentRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->HtmlCreatePdfFileFromContentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PdfFileInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreatePdfFileFromContentAsync
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePdfFileFromContentAsync(Requests\HtmlCreatePdfFileFromContentRequest $request) 
    {
        return $this->htmlCreatePdfFileFromContentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreatePdfFileFromContentAsyncWithHttpInfo
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePdfFileFromContentAsyncWithHttpInfo(Requests\HtmlCreatePdfFileFromContentRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->HtmlCreatePdfFileFromContentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreatePdfFileFromContent'
     *
     * @param Requests\HtmlCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreatePdfFileFromContentRequest(Requests\HtmlCreatePdfFileFromContentRequest $request)
    {
        // verify the required parameter 'file' is set
        if ($request->file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling htmlCreatePdfFileFromContent');
        }
        // verify the required parameter 'pdfFileOptions' is set
        if ($request->pdfFileOptions === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pdfFileOptions when calling htmlCreatePdfFileFromContent');
        }

        $resourcePath = '/viewer/html/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // form params
        if ($request->file !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->file);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['file'] = $contents;
        }
        // form params
        if ($request->pdfFileOptions !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->pdfFileOptions);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['pdfFileOptions'] = $contents;
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlCreatePdfFileFromUrl
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\HtmlCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PdfFileInfo
     */
    public function htmlCreatePdfFileFromUrl(Requests\HtmlCreatePdfFileFromUrlRequest $request)
    {
        try {
             list($response) = $this->htmlCreatePdfFileFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlCreatePdfFileFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlCreatePdfFileFromUrlWithHttpInfo
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\HtmlCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PdfFileInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlCreatePdfFileFromUrlWithHttpInfo(Requests\HtmlCreatePdfFileFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->HtmlCreatePdfFileFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PdfFileInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlCreatePdfFileFromUrlAsync
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\HtmlCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePdfFileFromUrlAsync(Requests\HtmlCreatePdfFileFromUrlRequest $request) 
    {
        return $this->htmlCreatePdfFileFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlCreatePdfFileFromUrlAsyncWithHttpInfo
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\HtmlCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlCreatePdfFileFromUrlAsyncWithHttpInfo(Requests\HtmlCreatePdfFileFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->HtmlCreatePdfFileFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlCreatePdfFileFromUrl'
     *
     * @param Requests\HtmlCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlCreatePdfFileFromUrlRequest(Requests\HtmlCreatePdfFileFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling htmlCreatePdfFileFromUrl');
        }

        $resourcePath = '/viewer/html/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->pdfFileOptions)) {
            if (is_string($request->pdfFileOptions)) {
                $_tempBody = "\"" . $request->pdfFileOptions . "\"";   
            } else {
                $_tempBody = $request->pdfFileOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlDeleteAttachmentPagesCache
     *
     * Removes attachment cache.
     *
     * @param Requests\HtmlDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function htmlDeleteAttachmentPagesCache(Requests\HtmlDeleteAttachmentPagesCacheRequest $request)
    {
        try {
             $this->htmlDeleteAttachmentPagesCacheWithHttpInfo($request);
        }
        catch(RepeatRequestException $e) {
             $this->htmlDeleteAttachmentPagesCacheWithHttpInfo($request);
        } 
    }

    /*
     * Operation htmlDeleteAttachmentPagesCacheWithHttpInfo
     *
     * Removes attachment cache.
     *
     * @param Requests\HtmlDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlDeleteAttachmentPagesCacheWithHttpInfo(Requests\HtmlDeleteAttachmentPagesCacheRequest $request)
    {
        $returnType = '';
        $request = $this->HtmlDeleteAttachmentPagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /*
     * Operation htmlDeleteAttachmentPagesCacheAsync
     *
     * Removes attachment cache.
     *
     * @param Requests\HtmlDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlDeleteAttachmentPagesCacheAsync(Requests\HtmlDeleteAttachmentPagesCacheRequest $request) 
    {
        return $this->htmlDeleteAttachmentPagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlDeleteAttachmentPagesCacheAsyncWithHttpInfo
     *
     * Removes attachment cache.
     *
     * @param Requests\HtmlDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlDeleteAttachmentPagesCacheAsyncWithHttpInfo(Requests\HtmlDeleteAttachmentPagesCacheRequest $request) 
    {
        $returnType = '';
        $request = $this->HtmlDeleteAttachmentPagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlDeleteAttachmentPagesCache'
     *
     * @param Requests\HtmlDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlDeleteAttachmentPagesCacheRequest(Requests\HtmlDeleteAttachmentPagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlDeleteAttachmentPagesCache');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlDeleteAttachmentPagesCache');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/pages/cache';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'DELETE',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('DELETE', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlDeletePagesCache
     *
     * Removes document cache.
     *
     * @param Requests\HtmlDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function htmlDeletePagesCache(Requests\HtmlDeletePagesCacheRequest $request)
    {
        try {
             $this->htmlDeletePagesCacheWithHttpInfo($request);
        }
        catch(RepeatRequestException $e) {
             $this->htmlDeletePagesCacheWithHttpInfo($request);
        } 
    }

    /*
     * Operation htmlDeletePagesCacheWithHttpInfo
     *
     * Removes document cache.
     *
     * @param Requests\HtmlDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlDeletePagesCacheWithHttpInfo(Requests\HtmlDeletePagesCacheRequest $request)
    {
        $returnType = '';
        $request = $this->HtmlDeletePagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /*
     * Operation htmlDeletePagesCacheAsync
     *
     * Removes document cache.
     *
     * @param Requests\HtmlDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlDeletePagesCacheAsync(Requests\HtmlDeletePagesCacheRequest $request) 
    {
        return $this->htmlDeletePagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlDeletePagesCacheAsyncWithHttpInfo
     *
     * Removes document cache.
     *
     * @param Requests\HtmlDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlDeletePagesCacheAsyncWithHttpInfo(Requests\HtmlDeletePagesCacheRequest $request) 
    {
        $returnType = '';
        $request = $this->HtmlDeletePagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlDeletePagesCache'
     *
     * @param Requests\HtmlDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlDeletePagesCacheRequest(Requests\HtmlDeletePagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlDeletePagesCache');
        }

        $resourcePath = '/viewer/{fileName}/html/pages/cache';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'DELETE',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('DELETE', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachment
     *
     * Downloads attachment.
     *
     * @param Requests\HtmlGetAttachmentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetAttachment(Requests\HtmlGetAttachmentRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentWithHttpInfo
     *
     * Downloads attachment.
     *
     * @param Requests\HtmlGetAttachmentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentWithHttpInfo(Requests\HtmlGetAttachmentRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetAttachmentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentAsync
     *
     * Downloads attachment.
     *
     * @param Requests\HtmlGetAttachmentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentAsync(Requests\HtmlGetAttachmentRequest $request) 
    {
        return $this->htmlGetAttachmentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentAsyncWithHttpInfo
     *
     * Downloads attachment.
     *
     * @param Requests\HtmlGetAttachmentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentAsyncWithHttpInfo(Requests\HtmlGetAttachmentRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetAttachmentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachment'
     *
     * @param Requests\HtmlGetAttachmentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentRequest(Requests\HtmlGetAttachmentRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachment');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetAttachment');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachmentInfo
     *
     * Retrieves attachment information.
     *
     * @param Requests\HtmlGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetAttachmentInfo(Requests\HtmlGetAttachmentInfoRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentInfoWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentInfoWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentInfoWithHttpInfo
     *
     * Retrieves attachment information.
     *
     * @param Requests\HtmlGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentInfoWithHttpInfo(Requests\HtmlGetAttachmentInfoRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetAttachmentInfoRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentInfoAsync
     *
     * Retrieves attachment information.
     *
     * @param Requests\HtmlGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentInfoAsync(Requests\HtmlGetAttachmentInfoRequest $request) 
    {
        return $this->htmlGetAttachmentInfoAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentInfoAsyncWithHttpInfo
     *
     * Retrieves attachment information.
     *
     * @param Requests\HtmlGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentInfoAsyncWithHttpInfo(Requests\HtmlGetAttachmentInfoRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetAttachmentInfoRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachmentInfo'
     *
     * @param Requests\HtmlGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentInfoRequest(Requests\HtmlGetAttachmentInfoRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachmentInfo');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetAttachmentInfo');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachmentInfoWithOptions
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetAttachmentInfoWithOptions(Requests\HtmlGetAttachmentInfoWithOptionsRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentInfoWithOptionsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentInfoWithOptionsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentInfoWithOptionsWithHttpInfo
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentInfoWithOptionsWithHttpInfo(Requests\HtmlGetAttachmentInfoWithOptionsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetAttachmentInfoWithOptionsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentInfoWithOptionsAsync
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentInfoWithOptionsAsync(Requests\HtmlGetAttachmentInfoWithOptionsRequest $request) 
    {
        return $this->htmlGetAttachmentInfoWithOptionsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentInfoWithOptionsAsyncWithHttpInfo
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentInfoWithOptionsAsyncWithHttpInfo(Requests\HtmlGetAttachmentInfoWithOptionsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetAttachmentInfoWithOptionsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachmentInfoWithOptions'
     *
     * @param Requests\HtmlGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentInfoWithOptionsRequest(Requests\HtmlGetAttachmentInfoWithOptionsRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachmentInfoWithOptions');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetAttachmentInfoWithOptions');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->documentInfoOptions)) {
            if (is_string($request->documentInfoOptions)) {
                $_tempBody = "\"" . $request->documentInfoOptions . "\"";   
            } else {
                $_tempBody = $request->documentInfoOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachmentPage
     *
     * Downloads attachment page as HTML.
     *
     * @param Requests\HtmlGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetAttachmentPage(Requests\HtmlGetAttachmentPageRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentPageWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentPageWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentPageWithHttpInfo
     *
     * Downloads attachment page as HTML.
     *
     * @param Requests\HtmlGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentPageWithHttpInfo(Requests\HtmlGetAttachmentPageRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetAttachmentPageRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentPageAsync
     *
     * Downloads attachment page as HTML.
     *
     * @param Requests\HtmlGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentPageAsync(Requests\HtmlGetAttachmentPageRequest $request) 
    {
        return $this->htmlGetAttachmentPageAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentPageAsyncWithHttpInfo
     *
     * Downloads attachment page as HTML.
     *
     * @param Requests\HtmlGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentPageAsyncWithHttpInfo(Requests\HtmlGetAttachmentPageRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetAttachmentPageRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachmentPage'
     *
     * @param Requests\HtmlGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentPageRequest(Requests\HtmlGetAttachmentPageRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachmentPage');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetAttachmentPage');
        }
        // verify the required parameter 'pageNumber' is set
        if ($request->pageNumber === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pageNumber when calling htmlGetAttachmentPage');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/pages/{pageNumber}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }
        // path params
        if ($request->pageNumber !== null) {
            $localName = lcfirst('PageNumber');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->pageNumber), $resourcePath);
        }

        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['text/html']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['text/html'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachmentPageResource
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetAttachmentPageResourceRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetAttachmentPageResource(Requests\HtmlGetAttachmentPageResourceRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentPageResourceWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentPageResourceWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentPageResourceWithHttpInfo
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetAttachmentPageResourceRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentPageResourceWithHttpInfo(Requests\HtmlGetAttachmentPageResourceRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetAttachmentPageResourceRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentPageResourceAsync
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetAttachmentPageResourceRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentPageResourceAsync(Requests\HtmlGetAttachmentPageResourceRequest $request) 
    {
        return $this->htmlGetAttachmentPageResourceAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentPageResourceAsyncWithHttpInfo
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetAttachmentPageResourceRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentPageResourceAsyncWithHttpInfo(Requests\HtmlGetAttachmentPageResourceRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetAttachmentPageResourceRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachmentPageResource'
     *
     * @param Requests\HtmlGetAttachmentPageResourceRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentPageResourceRequest(Requests\HtmlGetAttachmentPageResourceRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachmentPageResource');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetAttachmentPageResource');
        }
        // verify the required parameter 'pageNumber' is set
        if ($request->pageNumber === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pageNumber when calling htmlGetAttachmentPageResource');
        }
        // verify the required parameter 'resourceName' is set
        if ($request->resourceName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $resourceName when calling htmlGetAttachmentPageResource');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/pages/{pageNumber}/resources/{resourceName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }
        // path params
        if ($request->pageNumber !== null) {
            $localName = lcfirst('PageNumber');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->pageNumber), $resourcePath);
        }
        // path params
        if ($request->resourceName !== null) {
            $localName = lcfirst('ResourceName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->resourceName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachmentPages
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlAttachmentPageCollection
     */
    public function htmlGetAttachmentPages(Requests\HtmlGetAttachmentPagesRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentPagesWithHttpInfo
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlAttachmentPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentPagesWithHttpInfo(Requests\HtmlGetAttachmentPagesRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlAttachmentPageCollection';
        $request = $this->HtmlGetAttachmentPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlAttachmentPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentPagesAsync
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentPagesAsync(Requests\HtmlGetAttachmentPagesRequest $request) 
    {
        return $this->htmlGetAttachmentPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentPagesAsyncWithHttpInfo
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentPagesAsyncWithHttpInfo(Requests\HtmlGetAttachmentPagesRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlAttachmentPageCollection';
        $request = $this->HtmlGetAttachmentPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachmentPages'
     *
     * @param Requests\HtmlGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentPagesRequest(Requests\HtmlGetAttachmentPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachmentPages');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetAttachmentPages');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetAttachments
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\HtmlGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\AttachmentCollection
     */
    public function htmlGetAttachments(Requests\HtmlGetAttachmentsRequest $request)
    {
        try {
             list($response) = $this->htmlGetAttachmentsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetAttachmentsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetAttachmentsWithHttpInfo
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\HtmlGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\AttachmentCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetAttachmentsWithHttpInfo(Requests\HtmlGetAttachmentsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\AttachmentCollection';
        $request = $this->HtmlGetAttachmentsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\AttachmentCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetAttachmentsAsync
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\HtmlGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentsAsync(Requests\HtmlGetAttachmentsRequest $request) 
    {
        return $this->htmlGetAttachmentsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetAttachmentsAsyncWithHttpInfo
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\HtmlGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetAttachmentsAsyncWithHttpInfo(Requests\HtmlGetAttachmentsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\AttachmentCollection';
        $request = $this->HtmlGetAttachmentsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetAttachments'
     *
     * @param Requests\HtmlGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetAttachmentsRequest(Requests\HtmlGetAttachmentsRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetAttachments');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetDocumentInfo
     *
     * Retrieves document information.
     *
     * @param Requests\HtmlGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetDocumentInfo(Requests\HtmlGetDocumentInfoRequest $request)
    {
        try {
             list($response) = $this->htmlGetDocumentInfoWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetDocumentInfoWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetDocumentInfoWithHttpInfo
     *
     * Retrieves document information.
     *
     * @param Requests\HtmlGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetDocumentInfoWithHttpInfo(Requests\HtmlGetDocumentInfoRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetDocumentInfoAsync
     *
     * Retrieves document information.
     *
     * @param Requests\HtmlGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoAsync(Requests\HtmlGetDocumentInfoRequest $request) 
    {
        return $this->htmlGetDocumentInfoAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetDocumentInfoAsyncWithHttpInfo
     *
     * Retrieves document information.
     *
     * @param Requests\HtmlGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoAsyncWithHttpInfo(Requests\HtmlGetDocumentInfoRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetDocumentInfo'
     *
     * @param Requests\HtmlGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetDocumentInfoRequest(Requests\HtmlGetDocumentInfoRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetDocumentInfo');
        }

        $resourcePath = '/viewer/{fileName}/html/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetDocumentInfoFromContent
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetDocumentInfoFromContent(Requests\HtmlGetDocumentInfoFromContentRequest $request)
    {
        try {
             list($response) = $this->htmlGetDocumentInfoFromContentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetDocumentInfoFromContentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetDocumentInfoFromContentWithHttpInfo
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetDocumentInfoFromContentWithHttpInfo(Requests\HtmlGetDocumentInfoFromContentRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoFromContentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetDocumentInfoFromContentAsync
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoFromContentAsync(Requests\HtmlGetDocumentInfoFromContentRequest $request) 
    {
        return $this->htmlGetDocumentInfoFromContentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetDocumentInfoFromContentAsyncWithHttpInfo
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoFromContentAsyncWithHttpInfo(Requests\HtmlGetDocumentInfoFromContentRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoFromContentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetDocumentInfoFromContent'
     *
     * @param Requests\HtmlGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetDocumentInfoFromContentRequest(Requests\HtmlGetDocumentInfoFromContentRequest $request)
    {
        // verify the required parameter 'file' is set
        if ($request->file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling htmlGetDocumentInfoFromContent');
        }
        // verify the required parameter 'documentInfoOptions' is set
        if ($request->documentInfoOptions === null) {
            throw new \InvalidArgumentException('Missing the required parameter $documentInfoOptions when calling htmlGetDocumentInfoFromContent');
        }

        $resourcePath = '/viewer/html/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // form params
        if ($request->file !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->file);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['file'] = $contents;
        }
        // form params
        if ($request->documentInfoOptions !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->documentInfoOptions);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['documentInfoOptions'] = $contents;
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetDocumentInfoFromUrl
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetDocumentInfoFromUrl(Requests\HtmlGetDocumentInfoFromUrlRequest $request)
    {
        try {
             list($response) = $this->htmlGetDocumentInfoFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetDocumentInfoFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetDocumentInfoFromUrlWithHttpInfo(Requests\HtmlGetDocumentInfoFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlAsync
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoFromUrlAsync(Requests\HtmlGetDocumentInfoFromUrlRequest $request) 
    {
        return $this->htmlGetDocumentInfoFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlAsyncWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoFromUrlAsyncWithHttpInfo(Requests\HtmlGetDocumentInfoFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetDocumentInfoFromUrl'
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetDocumentInfoFromUrlRequest(Requests\HtmlGetDocumentInfoFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling htmlGetDocumentInfoFromUrl');
        }

        $resourcePath = '/viewer/html/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlWithOptions
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetDocumentInfoFromUrlWithOptions(Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request)
    {
        try {
             list($response) = $this->htmlGetDocumentInfoFromUrlWithOptionsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetDocumentInfoFromUrlWithOptionsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlWithOptionsWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetDocumentInfoFromUrlWithOptionsWithHttpInfo(Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoFromUrlWithOptionsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlWithOptionsAsync
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoFromUrlWithOptionsAsync(Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request) 
    {
        return $this->htmlGetDocumentInfoFromUrlWithOptionsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetDocumentInfoFromUrlWithOptionsAsyncWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoFromUrlWithOptionsAsyncWithHttpInfo(Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoFromUrlWithOptionsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetDocumentInfoFromUrlWithOptions'
     *
     * @param Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetDocumentInfoFromUrlWithOptionsRequest(Requests\HtmlGetDocumentInfoFromUrlWithOptionsRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling htmlGetDocumentInfoFromUrlWithOptions');
        }

        $resourcePath = '/viewer/html/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->documentInfoOptions)) {
            if (is_string($request->documentInfoOptions)) {
                $_tempBody = "\"" . $request->documentInfoOptions . "\"";   
            } else {
                $_tempBody = $request->documentInfoOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetDocumentInfoWithOptions
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function htmlGetDocumentInfoWithOptions(Requests\HtmlGetDocumentInfoWithOptionsRequest $request)
    {
        try {
             list($response) = $this->htmlGetDocumentInfoWithOptionsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetDocumentInfoWithOptionsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetDocumentInfoWithOptionsWithHttpInfo
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetDocumentInfoWithOptionsWithHttpInfo(Requests\HtmlGetDocumentInfoWithOptionsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoWithOptionsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetDocumentInfoWithOptionsAsync
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoWithOptionsAsync(Requests\HtmlGetDocumentInfoWithOptionsRequest $request) 
    {
        return $this->htmlGetDocumentInfoWithOptionsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetDocumentInfoWithOptionsAsyncWithHttpInfo
     *
     * Retrieves document information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\HtmlGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetDocumentInfoWithOptionsAsyncWithHttpInfo(Requests\HtmlGetDocumentInfoWithOptionsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->HtmlGetDocumentInfoWithOptionsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetDocumentInfoWithOptions'
     *
     * @param Requests\HtmlGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetDocumentInfoWithOptionsRequest(Requests\HtmlGetDocumentInfoWithOptionsRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetDocumentInfoWithOptions');
        }

        $resourcePath = '/viewer/{fileName}/html/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->documentInfoOptions)) {
            if (is_string($request->documentInfoOptions)) {
                $_tempBody = "\"" . $request->documentInfoOptions . "\"";   
            } else {
                $_tempBody = $request->documentInfoOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetPage
     *
     * Downloads document page as HTML.
     *
     * @param Requests\HtmlGetPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetPage(Requests\HtmlGetPageRequest $request)
    {
        try {
             list($response) = $this->htmlGetPageWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetPageWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetPageWithHttpInfo
     *
     * Downloads document page as HTML.
     *
     * @param Requests\HtmlGetPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetPageWithHttpInfo(Requests\HtmlGetPageRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPageRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetPageAsync
     *
     * Downloads document page as HTML.
     *
     * @param Requests\HtmlGetPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPageAsync(Requests\HtmlGetPageRequest $request) 
    {
        return $this->htmlGetPageAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetPageAsyncWithHttpInfo
     *
     * Downloads document page as HTML.
     *
     * @param Requests\HtmlGetPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPageAsyncWithHttpInfo(Requests\HtmlGetPageRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPageRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetPage'
     *
     * @param Requests\HtmlGetPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetPageRequest(Requests\HtmlGetPageRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetPage');
        }
        // verify the required parameter 'pageNumber' is set
        if ($request->pageNumber === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pageNumber when calling htmlGetPage');
        }

        $resourcePath = '/viewer/{fileName}/html/pages/{pageNumber}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->pageNumber !== null) {
            $localName = lcfirst('PageNumber');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->pageNumber), $resourcePath);
        }

        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['text/html']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['text/html'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetPageResource
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetPageResourceRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetPageResource(Requests\HtmlGetPageResourceRequest $request)
    {
        try {
             list($response) = $this->htmlGetPageResourceWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetPageResourceWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetPageResourceWithHttpInfo
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetPageResourceRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetPageResourceWithHttpInfo(Requests\HtmlGetPageResourceRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPageResourceRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetPageResourceAsync
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetPageResourceRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPageResourceAsync(Requests\HtmlGetPageResourceRequest $request) 
    {
        return $this->htmlGetPageResourceAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetPageResourceAsyncWithHttpInfo
     *
     * Downloads HTML page resource (image, style, graphics or font).
     *
     * @param Requests\HtmlGetPageResourceRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPageResourceAsyncWithHttpInfo(Requests\HtmlGetPageResourceRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPageResourceRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetPageResource'
     *
     * @param Requests\HtmlGetPageResourceRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetPageResourceRequest(Requests\HtmlGetPageResourceRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetPageResource');
        }
        // verify the required parameter 'pageNumber' is set
        if ($request->pageNumber === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pageNumber when calling htmlGetPageResource');
        }
        // verify the required parameter 'resourceName' is set
        if ($request->resourceName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $resourceName when calling htmlGetPageResource');
        }

        $resourcePath = '/viewer/{fileName}/html/pages/{pageNumber}/resources/{resourceName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->pageNumber !== null) {
            $localName = lcfirst('PageNumber');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->pageNumber), $resourcePath);
        }
        // path params
        if ($request->resourceName !== null) {
            $localName = lcfirst('ResourceName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->resourceName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetPages
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlPageCollection
     */
    public function htmlGetPages(Requests\HtmlGetPagesRequest $request)
    {
        try {
             list($response) = $this->htmlGetPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetPagesWithHttpInfo
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetPagesWithHttpInfo(Requests\HtmlGetPagesRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlGetPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetPagesAsync
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPagesAsync(Requests\HtmlGetPagesRequest $request) 
    {
        return $this->htmlGetPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetPagesAsyncWithHttpInfo
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPagesAsyncWithHttpInfo(Requests\HtmlGetPagesRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlGetPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetPages'
     *
     * @param Requests\HtmlGetPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetPagesRequest(Requests\HtmlGetPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetPages');
        }

        $resourcePath = '/viewer/{fileName}/html/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetPagesFromUrl
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\HtmlPageCollection
     */
    public function htmlGetPagesFromUrl(Requests\HtmlGetPagesFromUrlRequest $request)
    {
        try {
             list($response) = $this->htmlGetPagesFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetPagesFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetPagesFromUrlWithHttpInfo
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\HtmlPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetPagesFromUrlWithHttpInfo(Requests\HtmlGetPagesFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlGetPagesFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\HtmlPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetPagesFromUrlAsync
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPagesFromUrlAsync(Requests\HtmlGetPagesFromUrlRequest $request) 
    {
        return $this->htmlGetPagesFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetPagesFromUrlAsyncWithHttpInfo
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPagesFromUrlAsyncWithHttpInfo(Requests\HtmlGetPagesFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\HtmlPageCollection';
        $request = $this->HtmlGetPagesFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetPagesFromUrl'
     *
     * @param Requests\HtmlGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetPagesFromUrlRequest(Requests\HtmlGetPagesFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling htmlGetPagesFromUrl');
        }

        $resourcePath = '/viewer/html/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetPdfFile
     *
     * Downloads document as PDF.
     *
     * @param Requests\HtmlGetPdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetPdfFile(Requests\HtmlGetPdfFileRequest $request)
    {
        try {
             list($response) = $this->htmlGetPdfFileWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetPdfFileWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetPdfFileWithHttpInfo
     *
     * Downloads document as PDF.
     *
     * @param Requests\HtmlGetPdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetPdfFileWithHttpInfo(Requests\HtmlGetPdfFileRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPdfFileRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetPdfFileAsync
     *
     * Downloads document as PDF.
     *
     * @param Requests\HtmlGetPdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPdfFileAsync(Requests\HtmlGetPdfFileRequest $request) 
    {
        return $this->htmlGetPdfFileAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetPdfFileAsyncWithHttpInfo
     *
     * Downloads document as PDF.
     *
     * @param Requests\HtmlGetPdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPdfFileAsyncWithHttpInfo(Requests\HtmlGetPdfFileRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPdfFileRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetPdfFile'
     *
     * @param Requests\HtmlGetPdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetPdfFileRequest(Requests\HtmlGetPdfFileRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetPdfFile');
        }

        $resourcePath = '/viewer/{fileName}/html/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/pdf']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/pdf'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetPdfFileFromUrl
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\HtmlGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetPdfFileFromUrl(Requests\HtmlGetPdfFileFromUrlRequest $request)
    {
        try {
             list($response) = $this->htmlGetPdfFileFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetPdfFileFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetPdfFileFromUrlWithHttpInfo
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\HtmlGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetPdfFileFromUrlWithHttpInfo(Requests\HtmlGetPdfFileFromUrlRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPdfFileFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetPdfFileFromUrlAsync
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\HtmlGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPdfFileFromUrlAsync(Requests\HtmlGetPdfFileFromUrlRequest $request) 
    {
        return $this->htmlGetPdfFileFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetPdfFileFromUrlAsyncWithHttpInfo
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\HtmlGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetPdfFileFromUrlAsyncWithHttpInfo(Requests\HtmlGetPdfFileFromUrlRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetPdfFileFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetPdfFileFromUrl'
     *
     * @param Requests\HtmlGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetPdfFileFromUrlRequest(Requests\HtmlGetPdfFileFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling htmlGetPdfFileFromUrl');
        }

        $resourcePath = '/viewer/html/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/pdf']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/pdf'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetZipWithAttachmentPages
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetZipWithAttachmentPages(Requests\HtmlGetZipWithAttachmentPagesRequest $request)
    {
        try {
             list($response) = $this->htmlGetZipWithAttachmentPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetZipWithAttachmentPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetZipWithAttachmentPagesWithHttpInfo
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetZipWithAttachmentPagesWithHttpInfo(Requests\HtmlGetZipWithAttachmentPagesRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetZipWithAttachmentPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetZipWithAttachmentPagesAsync
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetZipWithAttachmentPagesAsync(Requests\HtmlGetZipWithAttachmentPagesRequest $request) 
    {
        return $this->htmlGetZipWithAttachmentPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetZipWithAttachmentPagesAsyncWithHttpInfo
     *
     * Retrieves attachment pages as HTML.
     *
     * @param Requests\HtmlGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetZipWithAttachmentPagesAsyncWithHttpInfo(Requests\HtmlGetZipWithAttachmentPagesRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetZipWithAttachmentPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetZipWithAttachmentPages'
     *
     * @param Requests\HtmlGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetZipWithAttachmentPagesRequest(Requests\HtmlGetZipWithAttachmentPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetZipWithAttachmentPages');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling htmlGetZipWithAttachmentPages');
        }

        $resourcePath = '/viewer/{fileName}/html/attachments/{attachmentName}/pages/zip';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/zip'],
                ['application/zip']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlGetZipWithPages
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function htmlGetZipWithPages(Requests\HtmlGetZipWithPagesRequest $request)
    {
        try {
             list($response) = $this->htmlGetZipWithPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlGetZipWithPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlGetZipWithPagesWithHttpInfo
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlGetZipWithPagesWithHttpInfo(Requests\HtmlGetZipWithPagesRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetZipWithPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlGetZipWithPagesAsync
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetZipWithPagesAsync(Requests\HtmlGetZipWithPagesRequest $request) 
    {
        return $this->htmlGetZipWithPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlGetZipWithPagesAsyncWithHttpInfo
     *
     * Retrieves list of document pages as HTML.
     *
     * @param Requests\HtmlGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlGetZipWithPagesAsyncWithHttpInfo(Requests\HtmlGetZipWithPagesRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->HtmlGetZipWithPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlGetZipWithPages'
     *
     * @param Requests\HtmlGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlGetZipWithPagesRequest(Requests\HtmlGetZipWithPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlGetZipWithPages');
        }

        $resourcePath = '/viewer/{fileName}/html/pages/zip';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->resourcePath !== null) {
            $localName = lcfirst('ResourcePath');
            $localValue = is_bool($request->resourcePath) ? ($request->resourcePath ? 'true' : 'false') : $request->resourcePath;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->ignoreResourcePathInResources !== null) {
            $localName = lcfirst('IgnoreResourcePathInResources');
            $localValue = is_bool($request->ignoreResourcePathInResources) ? ($request->ignoreResourcePathInResources ? 'true' : 'false') : $request->ignoreResourcePathInResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->embedResources !== null) {
            $localName = lcfirst('EmbedResources');
            $localValue = is_bool($request->embedResources) ? ($request->embedResources ? 'true' : 'false') : $request->embedResources;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableMinification !== null) {
            $localName = lcfirst('EnableMinification');
            $localValue = is_bool($request->enableMinification) ? ($request->enableMinification ? 'true' : 'false') : $request->enableMinification;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->enableResponsiveRendering !== null) {
            $localName = lcfirst('EnableResponsiveRendering');
            $localValue = is_bool($request->enableResponsiveRendering) ? ($request->enableResponsiveRendering ? 'true' : 'false') : $request->enableResponsiveRendering;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->excludeFonts !== null) {
            $localName = lcfirst('ExcludeFonts');
            $localValue = is_bool($request->excludeFonts) ? ($request->excludeFonts ? 'true' : 'false') : $request->excludeFonts;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/zip'],
                ['application/zip']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation htmlTransformPages
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\HtmlTransformPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PageInfoCollection
     */
    public function htmlTransformPages(Requests\HtmlTransformPagesRequest $request)
    {
        try {
             list($response) = $this->htmlTransformPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->htmlTransformPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation htmlTransformPagesWithHttpInfo
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\HtmlTransformPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PageInfoCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function htmlTransformPagesWithHttpInfo(Requests\HtmlTransformPagesRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PageInfoCollection';
        $request = $this->HtmlTransformPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PageInfoCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation htmlTransformPagesAsync
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\HtmlTransformPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlTransformPagesAsync(Requests\HtmlTransformPagesRequest $request) 
    {
        return $this->htmlTransformPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation htmlTransformPagesAsyncWithHttpInfo
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\HtmlTransformPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function htmlTransformPagesAsyncWithHttpInfo(Requests\HtmlTransformPagesRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PageInfoCollection';
        $request = $this->HtmlTransformPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'htmlTransformPages'
     *
     * @param Requests\HtmlTransformPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function HtmlTransformPagesRequest(Requests\HtmlTransformPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling htmlTransformPages');
        }

        $resourcePath = '/viewer/{fileName}/html/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->transformOptions)) {
            if (is_string($request->transformOptions)) {
                $_tempBody = "\"" . $request->transformOptions . "\"";   
            } else {
                $_tempBody = $request->transformOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreateAttachmentPagesCache
     *
     * Creates attachment cache.
     *
     * @param Requests\ImageCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImageAttachmentPageCollection
     */
    public function imageCreateAttachmentPagesCache(Requests\ImageCreateAttachmentPagesCacheRequest $request)
    {
        try {
             list($response) = $this->imageCreateAttachmentPagesCacheWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreateAttachmentPagesCacheWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreateAttachmentPagesCacheWithHttpInfo
     *
     * Creates attachment cache.
     *
     * @param Requests\ImageCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImageAttachmentPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreateAttachmentPagesCacheWithHttpInfo(Requests\ImageCreateAttachmentPagesCacheRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImageAttachmentPageCollection';
        $request = $this->ImageCreateAttachmentPagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImageAttachmentPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreateAttachmentPagesCacheAsync
     *
     * Creates attachment cache.
     *
     * @param Requests\ImageCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreateAttachmentPagesCacheAsync(Requests\ImageCreateAttachmentPagesCacheRequest $request) 
    {
        return $this->imageCreateAttachmentPagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreateAttachmentPagesCacheAsyncWithHttpInfo
     *
     * Creates attachment cache.
     *
     * @param Requests\ImageCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreateAttachmentPagesCacheAsyncWithHttpInfo(Requests\ImageCreateAttachmentPagesCacheRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImageAttachmentPageCollection';
        $request = $this->ImageCreateAttachmentPagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreateAttachmentPagesCache'
     *
     * @param Requests\ImageCreateAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreateAttachmentPagesCacheRequest(Requests\ImageCreateAttachmentPagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageCreateAttachmentPagesCache');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageCreateAttachmentPagesCache');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->imageOptions)) {
            if (is_string($request->imageOptions)) {
                $_tempBody = "\"" . $request->imageOptions . "\"";   
            } else {
                $_tempBody = $request->imageOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreatePagesCache
     *
     * Creates document pages as image and saves them in cache.  Pages created before will be removed from cache.
     *
     * @param Requests\ImageCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImagePageCollection
     */
    public function imageCreatePagesCache(Requests\ImageCreatePagesCacheRequest $request)
    {
        try {
             list($response) = $this->imageCreatePagesCacheWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreatePagesCacheWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreatePagesCacheWithHttpInfo
     *
     * Creates document pages as image and saves them in cache.  Pages created before will be removed from cache.
     *
     * @param Requests\ImageCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImagePageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreatePagesCacheWithHttpInfo(Requests\ImageCreatePagesCacheRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageCreatePagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImagePageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreatePagesCacheAsync
     *
     * Creates document pages as image and saves them in cache.  Pages created before will be removed from cache.
     *
     * @param Requests\ImageCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePagesCacheAsync(Requests\ImageCreatePagesCacheRequest $request) 
    {
        return $this->imageCreatePagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreatePagesCacheAsyncWithHttpInfo
     *
     * Creates document pages as image and saves them in cache.  Pages created before will be removed from cache.
     *
     * @param Requests\ImageCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePagesCacheAsyncWithHttpInfo(Requests\ImageCreatePagesCacheRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageCreatePagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreatePagesCache'
     *
     * @param Requests\ImageCreatePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreatePagesCacheRequest(Requests\ImageCreatePagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageCreatePagesCache');
        }

        $resourcePath = '/viewer/{fileName}/image/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->imageOptions)) {
            if (is_string($request->imageOptions)) {
                $_tempBody = "\"" . $request->imageOptions . "\"";   
            } else {
                $_tempBody = $request->imageOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreatePagesCacheFromContent
     *
     * Creates posted document pages as image and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImagePageCollection
     */
    public function imageCreatePagesCacheFromContent(Requests\ImageCreatePagesCacheFromContentRequest $request)
    {
        try {
             list($response) = $this->imageCreatePagesCacheFromContentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreatePagesCacheFromContentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreatePagesCacheFromContentWithHttpInfo
     *
     * Creates posted document pages as image and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImagePageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreatePagesCacheFromContentWithHttpInfo(Requests\ImageCreatePagesCacheFromContentRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageCreatePagesCacheFromContentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImagePageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreatePagesCacheFromContentAsync
     *
     * Creates posted document pages as image and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePagesCacheFromContentAsync(Requests\ImageCreatePagesCacheFromContentRequest $request) 
    {
        return $this->imageCreatePagesCacheFromContentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreatePagesCacheFromContentAsyncWithHttpInfo
     *
     * Creates posted document pages as image and saves them in cache. Content with document or multipart content is expected where first part is document and second is HtmlOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePagesCacheFromContentAsyncWithHttpInfo(Requests\ImageCreatePagesCacheFromContentRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageCreatePagesCacheFromContentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreatePagesCacheFromContent'
     *
     * @param Requests\ImageCreatePagesCacheFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreatePagesCacheFromContentRequest(Requests\ImageCreatePagesCacheFromContentRequest $request)
    {
        // verify the required parameter 'file' is set
        if ($request->file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling imageCreatePagesCacheFromContent');
        }
        // verify the required parameter 'imageOptions' is set
        if ($request->imageOptions === null) {
            throw new \InvalidArgumentException('Missing the required parameter $imageOptions when calling imageCreatePagesCacheFromContent');
        }

        $resourcePath = '/viewer/image/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // form params
        if ($request->file !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->file);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['file'] = $contents;
        }
        // form params
        if ($request->imageOptions !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->imageOptions);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['imageOptions'] = $contents;
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreatePagesCacheFromUrl
     *
     * Creates pages as image and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImagePageCollection
     */
    public function imageCreatePagesCacheFromUrl(Requests\ImageCreatePagesCacheFromUrlRequest $request)
    {
        try {
             list($response) = $this->imageCreatePagesCacheFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreatePagesCacheFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreatePagesCacheFromUrlWithHttpInfo
     *
     * Creates pages as image and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImagePageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreatePagesCacheFromUrlWithHttpInfo(Requests\ImageCreatePagesCacheFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageCreatePagesCacheFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImagePageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreatePagesCacheFromUrlAsync
     *
     * Creates pages as image and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePagesCacheFromUrlAsync(Requests\ImageCreatePagesCacheFromUrlRequest $request) 
    {
        return $this->imageCreatePagesCacheFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreatePagesCacheFromUrlAsyncWithHttpInfo
     *
     * Creates pages as image and saves them in cache for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePagesCacheFromUrlAsyncWithHttpInfo(Requests\ImageCreatePagesCacheFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageCreatePagesCacheFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreatePagesCacheFromUrl'
     *
     * @param Requests\ImageCreatePagesCacheFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreatePagesCacheFromUrlRequest(Requests\ImageCreatePagesCacheFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling imageCreatePagesCacheFromUrl');
        }

        $resourcePath = '/viewer/image/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->imageOptions)) {
            if (is_string($request->imageOptions)) {
                $_tempBody = "\"" . $request->imageOptions . "\"";   
            } else {
                $_tempBody = $request->imageOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreatePdfFile
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\ImageCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PdfFileInfo
     */
    public function imageCreatePdfFile(Requests\ImageCreatePdfFileRequest $request)
    {
        try {
             list($response) = $this->imageCreatePdfFileWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreatePdfFileWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreatePdfFileWithHttpInfo
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\ImageCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PdfFileInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreatePdfFileWithHttpInfo(Requests\ImageCreatePdfFileRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->ImageCreatePdfFileRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PdfFileInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreatePdfFileAsync
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\ImageCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePdfFileAsync(Requests\ImageCreatePdfFileRequest $request) 
    {
        return $this->imageCreatePdfFileAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreatePdfFileAsyncWithHttpInfo
     *
     * Creates PDF document.  Removes PDF document if it was created before.
     *
     * @param Requests\ImageCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePdfFileAsyncWithHttpInfo(Requests\ImageCreatePdfFileRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->ImageCreatePdfFileRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreatePdfFile'
     *
     * @param Requests\ImageCreatePdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreatePdfFileRequest(Requests\ImageCreatePdfFileRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageCreatePdfFile');
        }

        $resourcePath = '/viewer/{fileName}/image/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->pdfFileOptions)) {
            if (is_string($request->pdfFileOptions)) {
                $_tempBody = "\"" . $request->pdfFileOptions . "\"";   
            } else {
                $_tempBody = $request->pdfFileOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreatePdfFileFromContent
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PdfFileInfo
     */
    public function imageCreatePdfFileFromContent(Requests\ImageCreatePdfFileFromContentRequest $request)
    {
        try {
             list($response) = $this->imageCreatePdfFileFromContentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreatePdfFileFromContentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreatePdfFileFromContentWithHttpInfo
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PdfFileInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreatePdfFileFromContentWithHttpInfo(Requests\ImageCreatePdfFileFromContentRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->ImageCreatePdfFileFromContentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PdfFileInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreatePdfFileFromContentAsync
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePdfFileFromContentAsync(Requests\ImageCreatePdfFileFromContentRequest $request) 
    {
        return $this->imageCreatePdfFileFromContentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreatePdfFileFromContentAsyncWithHttpInfo
     *
     * Creates PDF document from document passed in request body and saves it in cache. Content with document or multipart content is expected where first part is document and second is PdfFileOptions. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePdfFileFromContentAsyncWithHttpInfo(Requests\ImageCreatePdfFileFromContentRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->ImageCreatePdfFileFromContentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreatePdfFileFromContent'
     *
     * @param Requests\ImageCreatePdfFileFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreatePdfFileFromContentRequest(Requests\ImageCreatePdfFileFromContentRequest $request)
    {
        // verify the required parameter 'file' is set
        if ($request->file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling imageCreatePdfFileFromContent');
        }
        // verify the required parameter 'pdfFileOptions' is set
        if ($request->pdfFileOptions === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pdfFileOptions when calling imageCreatePdfFileFromContent');
        }

        $resourcePath = '/viewer/image/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // form params
        if ($request->file !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->file);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['file'] = $contents;
        }
        // form params
        if ($request->pdfFileOptions !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->pdfFileOptions);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['pdfFileOptions'] = $contents;
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageCreatePdfFileFromUrl
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\ImageCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PdfFileInfo
     */
    public function imageCreatePdfFileFromUrl(Requests\ImageCreatePdfFileFromUrlRequest $request)
    {
        try {
             list($response) = $this->imageCreatePdfFileFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageCreatePdfFileFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageCreatePdfFileFromUrlWithHttpInfo
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\ImageCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PdfFileInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageCreatePdfFileFromUrlWithHttpInfo(Requests\ImageCreatePdfFileFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->ImageCreatePdfFileFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PdfFileInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageCreatePdfFileFromUrlAsync
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\ImageCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePdfFileFromUrlAsync(Requests\ImageCreatePdfFileFromUrlRequest $request) 
    {
        return $this->imageCreatePdfFileFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageCreatePdfFileFromUrlAsyncWithHttpInfo
     *
     * Creates PDF document for document at provided URL and saves it in cache.  Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file. Expects PdfFileOptions object data in request body.
     *
     * @param Requests\ImageCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageCreatePdfFileFromUrlAsyncWithHttpInfo(Requests\ImageCreatePdfFileFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PdfFileInfo';
        $request = $this->ImageCreatePdfFileFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageCreatePdfFileFromUrl'
     *
     * @param Requests\ImageCreatePdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageCreatePdfFileFromUrlRequest(Requests\ImageCreatePdfFileFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling imageCreatePdfFileFromUrl');
        }

        $resourcePath = '/viewer/image/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->pdfFileOptions)) {
            if (is_string($request->pdfFileOptions)) {
                $_tempBody = "\"" . $request->pdfFileOptions . "\"";   
            } else {
                $_tempBody = $request->pdfFileOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageDeleteAttachmentPagesCache
     *
     * Removes attachment cache.
     *
     * @param Requests\ImageDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function imageDeleteAttachmentPagesCache(Requests\ImageDeleteAttachmentPagesCacheRequest $request)
    {
        try {
             $this->imageDeleteAttachmentPagesCacheWithHttpInfo($request);
        }
        catch(RepeatRequestException $e) {
             $this->imageDeleteAttachmentPagesCacheWithHttpInfo($request);
        } 
    }

    /*
     * Operation imageDeleteAttachmentPagesCacheWithHttpInfo
     *
     * Removes attachment cache.
     *
     * @param Requests\ImageDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageDeleteAttachmentPagesCacheWithHttpInfo(Requests\ImageDeleteAttachmentPagesCacheRequest $request)
    {
        $returnType = '';
        $request = $this->ImageDeleteAttachmentPagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /*
     * Operation imageDeleteAttachmentPagesCacheAsync
     *
     * Removes attachment cache.
     *
     * @param Requests\ImageDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageDeleteAttachmentPagesCacheAsync(Requests\ImageDeleteAttachmentPagesCacheRequest $request) 
    {
        return $this->imageDeleteAttachmentPagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageDeleteAttachmentPagesCacheAsyncWithHttpInfo
     *
     * Removes attachment cache.
     *
     * @param Requests\ImageDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageDeleteAttachmentPagesCacheAsyncWithHttpInfo(Requests\ImageDeleteAttachmentPagesCacheRequest $request) 
    {
        $returnType = '';
        $request = $this->ImageDeleteAttachmentPagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageDeleteAttachmentPagesCache'
     *
     * @param Requests\ImageDeleteAttachmentPagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageDeleteAttachmentPagesCacheRequest(Requests\ImageDeleteAttachmentPagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageDeleteAttachmentPagesCache');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageDeleteAttachmentPagesCache');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/pages/cache';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'DELETE',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('DELETE', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageDeletePagesCache
     *
     * Removes document cache.
     *
     * @param Requests\ImageDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function imageDeletePagesCache(Requests\ImageDeletePagesCacheRequest $request)
    {
        try {
             $this->imageDeletePagesCacheWithHttpInfo($request);
        }
        catch(RepeatRequestException $e) {
             $this->imageDeletePagesCacheWithHttpInfo($request);
        } 
    }

    /*
     * Operation imageDeletePagesCacheWithHttpInfo
     *
     * Removes document cache.
     *
     * @param Requests\ImageDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageDeletePagesCacheWithHttpInfo(Requests\ImageDeletePagesCacheRequest $request)
    {
        $returnType = '';
        $request = $this->ImageDeletePagesCacheRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /*
     * Operation imageDeletePagesCacheAsync
     *
     * Removes document cache.
     *
     * @param Requests\ImageDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageDeletePagesCacheAsync(Requests\ImageDeletePagesCacheRequest $request) 
    {
        return $this->imageDeletePagesCacheAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageDeletePagesCacheAsyncWithHttpInfo
     *
     * Removes document cache.
     *
     * @param Requests\ImageDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageDeletePagesCacheAsyncWithHttpInfo(Requests\ImageDeletePagesCacheRequest $request) 
    {
        $returnType = '';
        $request = $this->ImageDeletePagesCacheRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageDeletePagesCache'
     *
     * @param Requests\ImageDeletePagesCacheRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageDeletePagesCacheRequest(Requests\ImageDeletePagesCacheRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageDeletePagesCache');
        }

        $resourcePath = '/viewer/{fileName}/image/pages/cache';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'DELETE',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('DELETE', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetAttachment
     *
     * Downloads attachment.
     *
     * @param Requests\ImageGetAttachmentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetAttachment(Requests\ImageGetAttachmentRequest $request)
    {
        try {
             list($response) = $this->imageGetAttachmentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetAttachmentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetAttachmentWithHttpInfo
     *
     * Downloads attachment.
     *
     * @param Requests\ImageGetAttachmentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetAttachmentWithHttpInfo(Requests\ImageGetAttachmentRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetAttachmentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetAttachmentAsync
     *
     * Downloads attachment.
     *
     * @param Requests\ImageGetAttachmentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentAsync(Requests\ImageGetAttachmentRequest $request) 
    {
        return $this->imageGetAttachmentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetAttachmentAsyncWithHttpInfo
     *
     * Downloads attachment.
     *
     * @param Requests\ImageGetAttachmentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentAsyncWithHttpInfo(Requests\ImageGetAttachmentRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetAttachmentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetAttachment'
     *
     * @param Requests\ImageGetAttachmentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetAttachmentRequest(Requests\ImageGetAttachmentRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetAttachment');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageGetAttachment');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetAttachmentInfo
     *
     * Retrieves attachment information.
     *
     * @param Requests\ImageGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetAttachmentInfo(Requests\ImageGetAttachmentInfoRequest $request)
    {
        try {
             list($response) = $this->imageGetAttachmentInfoWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetAttachmentInfoWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetAttachmentInfoWithHttpInfo
     *
     * Retrieves attachment information.
     *
     * @param Requests\ImageGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetAttachmentInfoWithHttpInfo(Requests\ImageGetAttachmentInfoRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetAttachmentInfoRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetAttachmentInfoAsync
     *
     * Retrieves attachment information.
     *
     * @param Requests\ImageGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentInfoAsync(Requests\ImageGetAttachmentInfoRequest $request) 
    {
        return $this->imageGetAttachmentInfoAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetAttachmentInfoAsyncWithHttpInfo
     *
     * Retrieves attachment information.
     *
     * @param Requests\ImageGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentInfoAsyncWithHttpInfo(Requests\ImageGetAttachmentInfoRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetAttachmentInfoRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetAttachmentInfo'
     *
     * @param Requests\ImageGetAttachmentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetAttachmentInfoRequest(Requests\ImageGetAttachmentInfoRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetAttachmentInfo');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageGetAttachmentInfo');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetAttachmentInfoWithOptions
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetAttachmentInfoWithOptions(Requests\ImageGetAttachmentInfoWithOptionsRequest $request)
    {
        try {
             list($response) = $this->imageGetAttachmentInfoWithOptionsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetAttachmentInfoWithOptionsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetAttachmentInfoWithOptionsWithHttpInfo
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetAttachmentInfoWithOptionsWithHttpInfo(Requests\ImageGetAttachmentInfoWithOptionsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetAttachmentInfoWithOptionsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetAttachmentInfoWithOptionsAsync
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentInfoWithOptionsAsync(Requests\ImageGetAttachmentInfoWithOptionsRequest $request) 
    {
        return $this->imageGetAttachmentInfoWithOptionsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetAttachmentInfoWithOptionsAsyncWithHttpInfo
     *
     * Retrieves attachment information with specified DocumentInfoOptions. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentInfoWithOptionsAsyncWithHttpInfo(Requests\ImageGetAttachmentInfoWithOptionsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetAttachmentInfoWithOptionsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetAttachmentInfoWithOptions'
     *
     * @param Requests\ImageGetAttachmentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetAttachmentInfoWithOptionsRequest(Requests\ImageGetAttachmentInfoWithOptionsRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetAttachmentInfoWithOptions');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageGetAttachmentInfoWithOptions');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->documentInfoOptions)) {
            if (is_string($request->documentInfoOptions)) {
                $_tempBody = "\"" . $request->documentInfoOptions . "\"";   
            } else {
                $_tempBody = $request->documentInfoOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetAttachmentPage
     *
     * Downloads attachment page as image.
     *
     * @param Requests\ImageGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetAttachmentPage(Requests\ImageGetAttachmentPageRequest $request)
    {
        try {
             list($response) = $this->imageGetAttachmentPageWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetAttachmentPageWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetAttachmentPageWithHttpInfo
     *
     * Downloads attachment page as image.
     *
     * @param Requests\ImageGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetAttachmentPageWithHttpInfo(Requests\ImageGetAttachmentPageRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetAttachmentPageRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetAttachmentPageAsync
     *
     * Downloads attachment page as image.
     *
     * @param Requests\ImageGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentPageAsync(Requests\ImageGetAttachmentPageRequest $request) 
    {
        return $this->imageGetAttachmentPageAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetAttachmentPageAsyncWithHttpInfo
     *
     * Downloads attachment page as image.
     *
     * @param Requests\ImageGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentPageAsyncWithHttpInfo(Requests\ImageGetAttachmentPageRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetAttachmentPageRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetAttachmentPage'
     *
     * @param Requests\ImageGetAttachmentPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetAttachmentPageRequest(Requests\ImageGetAttachmentPageRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetAttachmentPage');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageGetAttachmentPage');
        }
        // verify the required parameter 'pageNumber' is set
        if ($request->pageNumber === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pageNumber when calling imageGetAttachmentPage');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/pages/{pageNumber}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }
        // path params
        if ($request->pageNumber !== null) {
            $localName = lcfirst('PageNumber');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->pageNumber), $resourcePath);
        }

        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['image/_*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['image/_*'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetAttachmentPages
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImageAttachmentPageCollection
     */
    public function imageGetAttachmentPages(Requests\ImageGetAttachmentPagesRequest $request)
    {
        try {
             list($response) = $this->imageGetAttachmentPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetAttachmentPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetAttachmentPagesWithHttpInfo
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImageAttachmentPageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetAttachmentPagesWithHttpInfo(Requests\ImageGetAttachmentPagesRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImageAttachmentPageCollection';
        $request = $this->ImageGetAttachmentPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImageAttachmentPageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetAttachmentPagesAsync
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentPagesAsync(Requests\ImageGetAttachmentPagesRequest $request) 
    {
        return $this->imageGetAttachmentPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetAttachmentPagesAsyncWithHttpInfo
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentPagesAsyncWithHttpInfo(Requests\ImageGetAttachmentPagesRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImageAttachmentPageCollection';
        $request = $this->ImageGetAttachmentPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetAttachmentPages'
     *
     * @param Requests\ImageGetAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetAttachmentPagesRequest(Requests\ImageGetAttachmentPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetAttachmentPages');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageGetAttachmentPages');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml', 'application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml', 'application/zip'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetAttachments
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\ImageGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\AttachmentCollection
     */
    public function imageGetAttachments(Requests\ImageGetAttachmentsRequest $request)
    {
        try {
             list($response) = $this->imageGetAttachmentsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetAttachmentsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetAttachmentsWithHttpInfo
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\ImageGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\AttachmentCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetAttachmentsWithHttpInfo(Requests\ImageGetAttachmentsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\AttachmentCollection';
        $request = $this->ImageGetAttachmentsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\AttachmentCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetAttachmentsAsync
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\ImageGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentsAsync(Requests\ImageGetAttachmentsRequest $request) 
    {
        return $this->imageGetAttachmentsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetAttachmentsAsyncWithHttpInfo
     *
     * Retrieves list of document attachments.
     *
     * @param Requests\ImageGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetAttachmentsAsyncWithHttpInfo(Requests\ImageGetAttachmentsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\AttachmentCollection';
        $request = $this->ImageGetAttachmentsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetAttachments'
     *
     * @param Requests\ImageGetAttachmentsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetAttachmentsRequest(Requests\ImageGetAttachmentsRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetAttachments');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetDocumentInfo
     *
     * Retrieves document information.
     *
     * @param Requests\ImageGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetDocumentInfo(Requests\ImageGetDocumentInfoRequest $request)
    {
        try {
             list($response) = $this->imageGetDocumentInfoWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetDocumentInfoWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetDocumentInfoWithHttpInfo
     *
     * Retrieves document information.
     *
     * @param Requests\ImageGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetDocumentInfoWithHttpInfo(Requests\ImageGetDocumentInfoRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetDocumentInfoAsync
     *
     * Retrieves document information.
     *
     * @param Requests\ImageGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoAsync(Requests\ImageGetDocumentInfoRequest $request) 
    {
        return $this->imageGetDocumentInfoAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetDocumentInfoAsyncWithHttpInfo
     *
     * Retrieves document information.
     *
     * @param Requests\ImageGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoAsyncWithHttpInfo(Requests\ImageGetDocumentInfoRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetDocumentInfo'
     *
     * @param Requests\ImageGetDocumentInfoRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetDocumentInfoRequest(Requests\ImageGetDocumentInfoRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetDocumentInfo');
        }

        $resourcePath = '/viewer/{fileName}/image/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetDocumentInfoFromContent
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetDocumentInfoFromContent(Requests\ImageGetDocumentInfoFromContentRequest $request)
    {
        try {
             list($response) = $this->imageGetDocumentInfoFromContentWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetDocumentInfoFromContentWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetDocumentInfoFromContentWithHttpInfo
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetDocumentInfoFromContentWithHttpInfo(Requests\ImageGetDocumentInfoFromContentRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoFromContentRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetDocumentInfoFromContentAsync
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoFromContentAsync(Requests\ImageGetDocumentInfoFromContentRequest $request) 
    {
        return $this->imageGetDocumentInfoFromContentAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetDocumentInfoFromContentAsyncWithHttpInfo
     *
     * Retrieves document information for posted document. Content with document or multipart content is expected where first part is document and second is DocumentInfoOptions. Saves file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoFromContentAsyncWithHttpInfo(Requests\ImageGetDocumentInfoFromContentRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoFromContentRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetDocumentInfoFromContent'
     *
     * @param Requests\ImageGetDocumentInfoFromContentRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetDocumentInfoFromContentRequest(Requests\ImageGetDocumentInfoFromContentRequest $request)
    {
        // verify the required parameter 'file' is set
        if ($request->file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling imageGetDocumentInfoFromContent');
        }
        // verify the required parameter 'documentInfoOptions' is set
        if ($request->documentInfoOptions === null) {
            throw new \InvalidArgumentException('Missing the required parameter $documentInfoOptions when calling imageGetDocumentInfoFromContent');
        }

        $resourcePath = '/viewer/image/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // form params
        if ($request->file !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->file);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['file'] = $contents;
        }
        // form params
        if ($request->documentInfoOptions !== null) {
            $multipart = true;
            $filename = ObjectSerializer::toFormValue($request->documentInfoOptions);
            $handle = fopen($filename, "rb");
            $fsize = filesize($filename);
            $contents = fread($handle, $fsize);
            $formParams['documentInfoOptions'] = $contents;
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetDocumentInfoFromUrl
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetDocumentInfoFromUrl(Requests\ImageGetDocumentInfoFromUrlRequest $request)
    {
        try {
             list($response) = $this->imageGetDocumentInfoFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetDocumentInfoFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetDocumentInfoFromUrlWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetDocumentInfoFromUrlWithHttpInfo(Requests\ImageGetDocumentInfoFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetDocumentInfoFromUrlAsync
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoFromUrlAsync(Requests\ImageGetDocumentInfoFromUrlRequest $request) 
    {
        return $this->imageGetDocumentInfoFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetDocumentInfoFromUrlAsyncWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoFromUrlAsyncWithHttpInfo(Requests\ImageGetDocumentInfoFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetDocumentInfoFromUrl'
     *
     * @param Requests\ImageGetDocumentInfoFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetDocumentInfoFromUrlRequest(Requests\ImageGetDocumentInfoFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling imageGetDocumentInfoFromUrl');
        }

        $resourcePath = '/viewer/image/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetDocumentInfoFromUrlWithOptions
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetDocumentInfoFromUrlWithOptions(Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request)
    {
        try {
             list($response) = $this->imageGetDocumentInfoFromUrlWithOptionsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetDocumentInfoFromUrlWithOptionsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetDocumentInfoFromUrlWithOptionsWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetDocumentInfoFromUrlWithOptionsWithHttpInfo(Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoFromUrlWithOptionsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetDocumentInfoFromUrlWithOptionsAsync
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoFromUrlWithOptionsAsync(Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request) 
    {
        return $this->imageGetDocumentInfoFromUrlWithOptionsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetDocumentInfoFromUrlWithOptionsAsyncWithHttpInfo
     *
     * Retrieves document information for document at provided URL. Retrieves file from specified URL and tries to detect file type when fileName parameter is not specified. Saves retrieved file in storage. Use fileName and folder parameters to specify desired file name and folder to save file. When file with specified name already exists in storage new unique file name will be used for file.
     *
     * @param Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoFromUrlWithOptionsAsyncWithHttpInfo(Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoFromUrlWithOptionsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetDocumentInfoFromUrlWithOptions'
     *
     * @param Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetDocumentInfoFromUrlWithOptionsRequest(Requests\ImageGetDocumentInfoFromUrlWithOptionsRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling imageGetDocumentInfoFromUrlWithOptions');
        }

        $resourcePath = '/viewer/image/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->documentInfoOptions)) {
            if (is_string($request->documentInfoOptions)) {
                $_tempBody = "\"" . $request->documentInfoOptions . "\"";   
            } else {
                $_tempBody = $request->documentInfoOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetDocumentInfoWithOptions
     *
     * Retrieves document information with specified options. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\DocumentInfo
     */
    public function imageGetDocumentInfoWithOptions(Requests\ImageGetDocumentInfoWithOptionsRequest $request)
    {
        try {
             list($response) = $this->imageGetDocumentInfoWithOptionsWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetDocumentInfoWithOptionsWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetDocumentInfoWithOptionsWithHttpInfo
     *
     * Retrieves document information with specified options. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\DocumentInfo, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetDocumentInfoWithOptionsWithHttpInfo(Requests\ImageGetDocumentInfoWithOptionsRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoWithOptionsRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\DocumentInfo', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetDocumentInfoWithOptionsAsync
     *
     * Retrieves document information with specified options. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoWithOptionsAsync(Requests\ImageGetDocumentInfoWithOptionsRequest $request) 
    {
        return $this->imageGetDocumentInfoWithOptionsAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetDocumentInfoWithOptionsAsyncWithHttpInfo
     *
     * Retrieves document information with specified options. Expects DocumentInfoOptions object data in request body.
     *
     * @param Requests\ImageGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetDocumentInfoWithOptionsAsyncWithHttpInfo(Requests\ImageGetDocumentInfoWithOptionsRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\DocumentInfo';
        $request = $this->ImageGetDocumentInfoWithOptionsRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetDocumentInfoWithOptions'
     *
     * @param Requests\ImageGetDocumentInfoWithOptionsRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetDocumentInfoWithOptionsRequest(Requests\ImageGetDocumentInfoWithOptionsRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetDocumentInfoWithOptions');
        }

        $resourcePath = '/viewer/{fileName}/image/info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->documentInfoOptions)) {
            if (is_string($request->documentInfoOptions)) {
                $_tempBody = "\"" . $request->documentInfoOptions . "\"";   
            } else {
                $_tempBody = $request->documentInfoOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'POST',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('POST', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetPage
     *
     * Downloads document page as image.
     *
     * @param Requests\ImageGetPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetPage(Requests\ImageGetPageRequest $request)
    {
        try {
             list($response) = $this->imageGetPageWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetPageWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetPageWithHttpInfo
     *
     * Downloads document page as image.
     *
     * @param Requests\ImageGetPageRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetPageWithHttpInfo(Requests\ImageGetPageRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetPageRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetPageAsync
     *
     * Downloads document page as image.
     *
     * @param Requests\ImageGetPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPageAsync(Requests\ImageGetPageRequest $request) 
    {
        return $this->imageGetPageAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetPageAsyncWithHttpInfo
     *
     * Downloads document page as image.
     *
     * @param Requests\ImageGetPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPageAsyncWithHttpInfo(Requests\ImageGetPageRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetPageRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetPage'
     *
     * @param Requests\ImageGetPageRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetPageRequest(Requests\ImageGetPageRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetPage');
        }
        // verify the required parameter 'pageNumber' is set
        if ($request->pageNumber === null) {
            throw new \InvalidArgumentException('Missing the required parameter $pageNumber when calling imageGetPage');
        }

        $resourcePath = '/viewer/{fileName}/image/pages/{pageNumber}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->pageNumber !== null) {
            $localName = lcfirst('PageNumber');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->pageNumber), $resourcePath);
        }

        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['image/_*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['image/_*'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetPages
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImagePageCollection
     */
    public function imageGetPages(Requests\ImageGetPagesRequest $request)
    {
        try {
             list($response) = $this->imageGetPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetPagesWithHttpInfo
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImagePageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetPagesWithHttpInfo(Requests\ImageGetPagesRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageGetPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImagePageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetPagesAsync
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPagesAsync(Requests\ImageGetPagesRequest $request) 
    {
        return $this->imageGetPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetPagesAsyncWithHttpInfo
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPagesAsyncWithHttpInfo(Requests\ImageGetPagesRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageGetPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetPages'
     *
     * @param Requests\ImageGetPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetPagesRequest(Requests\ImageGetPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetPages');
        }

        $resourcePath = '/viewer/{fileName}/image/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetPagesFromUrl
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\ImagePageCollection
     */
    public function imageGetPagesFromUrl(Requests\ImageGetPagesFromUrlRequest $request)
    {
        try {
             list($response) = $this->imageGetPagesFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetPagesFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetPagesFromUrlWithHttpInfo
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\ImagePageCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetPagesFromUrlWithHttpInfo(Requests\ImageGetPagesFromUrlRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageGetPagesFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\ImagePageCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetPagesFromUrlAsync
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPagesFromUrlAsync(Requests\ImageGetPagesFromUrlRequest $request) 
    {
        return $this->imageGetPagesFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetPagesFromUrlAsyncWithHttpInfo
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPagesFromUrlAsyncWithHttpInfo(Requests\ImageGetPagesFromUrlRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\ImagePageCollection';
        $request = $this->ImageGetPagesFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetPagesFromUrl'
     *
     * @param Requests\ImageGetPagesFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetPagesFromUrlRequest(Requests\ImageGetPagesFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling imageGetPagesFromUrl');
        }

        $resourcePath = '/viewer/image/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetPdfFile
     *
     * Downloads document as PDF.
     *
     * @param Requests\ImageGetPdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetPdfFile(Requests\ImageGetPdfFileRequest $request)
    {
        try {
             list($response) = $this->imageGetPdfFileWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetPdfFileWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetPdfFileWithHttpInfo
     *
     * Downloads document as PDF.
     *
     * @param Requests\ImageGetPdfFileRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetPdfFileWithHttpInfo(Requests\ImageGetPdfFileRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetPdfFileRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetPdfFileAsync
     *
     * Downloads document as PDF.
     *
     * @param Requests\ImageGetPdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPdfFileAsync(Requests\ImageGetPdfFileRequest $request) 
    {
        return $this->imageGetPdfFileAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetPdfFileAsyncWithHttpInfo
     *
     * Downloads document as PDF.
     *
     * @param Requests\ImageGetPdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPdfFileAsyncWithHttpInfo(Requests\ImageGetPdfFileRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetPdfFileRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetPdfFile'
     *
     * @param Requests\ImageGetPdfFileRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetPdfFileRequest(Requests\ImageGetPdfFileRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetPdfFile');
        }

        $resourcePath = '/viewer/{fileName}/image/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/pdf']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/pdf'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetPdfFileFromUrl
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\ImageGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetPdfFileFromUrl(Requests\ImageGetPdfFileFromUrlRequest $request)
    {
        try {
             list($response) = $this->imageGetPdfFileFromUrlWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetPdfFileFromUrlWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetPdfFileFromUrlWithHttpInfo
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\ImageGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetPdfFileFromUrlWithHttpInfo(Requests\ImageGetPdfFileFromUrlRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetPdfFileFromUrlRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetPdfFileFromUrlAsync
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\ImageGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPdfFileFromUrlAsync(Requests\ImageGetPdfFileFromUrlRequest $request) 
    {
        return $this->imageGetPdfFileFromUrlAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetPdfFileFromUrlAsyncWithHttpInfo
     *
     * Downloads document at provided URL as PDF.  Document will be retrieved from the passed URL and added to Storage.
     *
     * @param Requests\ImageGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetPdfFileFromUrlAsyncWithHttpInfo(Requests\ImageGetPdfFileFromUrlRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetPdfFileFromUrlRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetPdfFileFromUrl'
     *
     * @param Requests\ImageGetPdfFileFromUrlRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetPdfFileFromUrlRequest(Requests\ImageGetPdfFileFromUrlRequest $request)
    {
        // verify the required parameter 'url' is set
        if ($request->url === null) {
            throw new \InvalidArgumentException('Missing the required parameter $url when calling imageGetPdfFileFromUrl');
        }

        $resourcePath = '/viewer/image/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    

        // query params
        if ($request->url !== null) {
            $localName = lcfirst('Url');
            $localValue = is_bool($request->url) ? ($request->url ? 'true' : 'false') : $request->url;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $localValue = is_bool($request->fileName) ? ($request->fileName ? 'true' : 'false') : $request->fileName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/pdf']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/pdf'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetZipWithAttachmentPages
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetZipWithAttachmentPages(Requests\ImageGetZipWithAttachmentPagesRequest $request)
    {
        try {
             list($response) = $this->imageGetZipWithAttachmentPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetZipWithAttachmentPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetZipWithAttachmentPagesWithHttpInfo
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetZipWithAttachmentPagesWithHttpInfo(Requests\ImageGetZipWithAttachmentPagesRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetZipWithAttachmentPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetZipWithAttachmentPagesAsync
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetZipWithAttachmentPagesAsync(Requests\ImageGetZipWithAttachmentPagesRequest $request) 
    {
        return $this->imageGetZipWithAttachmentPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetZipWithAttachmentPagesAsyncWithHttpInfo
     *
     * Retrieves attachment pages as images.
     *
     * @param Requests\ImageGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetZipWithAttachmentPagesAsyncWithHttpInfo(Requests\ImageGetZipWithAttachmentPagesRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetZipWithAttachmentPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetZipWithAttachmentPages'
     *
     * @param Requests\ImageGetZipWithAttachmentPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetZipWithAttachmentPagesRequest(Requests\ImageGetZipWithAttachmentPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetZipWithAttachmentPages');
        }
        // verify the required parameter 'attachmentName' is set
        if ($request->attachmentName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $attachmentName when calling imageGetZipWithAttachmentPages');
        }

        $resourcePath = '/viewer/{fileName}/image/attachments/{attachmentName}/pages/zip';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }
        // path params
        if ($request->attachmentName !== null) {
            $localName = lcfirst('AttachmentName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->attachmentName), $resourcePath);
        }

        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->attachmentPassword !== null) {
            $localName = lcfirst('AttachmentPassword');
            $localValue = is_bool($request->attachmentPassword) ? ($request->attachmentPassword ? 'true' : 'false') : $request->attachmentPassword;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/zip'],
                ['application/zip']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageGetZipWithPages
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function imageGetZipWithPages(Requests\ImageGetZipWithPagesRequest $request)
    {
        try {
             list($response) = $this->imageGetZipWithPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageGetZipWithPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageGetZipWithPagesWithHttpInfo
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageGetZipWithPagesWithHttpInfo(Requests\ImageGetZipWithPagesRequest $request)
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetZipWithPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\SplFileObject', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageGetZipWithPagesAsync
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetZipWithPagesAsync(Requests\ImageGetZipWithPagesRequest $request) 
    {
        return $this->imageGetZipWithPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageGetZipWithPagesAsyncWithHttpInfo
     *
     * Retrieves list of document pages as image.
     *
     * @param Requests\ImageGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageGetZipWithPagesAsyncWithHttpInfo(Requests\ImageGetZipWithPagesRequest $request) 
    {
        $returnType = '\SplFileObject';
        $request = $this->ImageGetZipWithPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageGetZipWithPages'
     *
     * @param Requests\ImageGetZipWithPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageGetZipWithPagesRequest(Requests\ImageGetZipWithPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageGetZipWithPages');
        }

        $resourcePath = '/viewer/{fileName}/image/pages/zip';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->format !== null) {
            $localName = lcfirst('Format');
            $localValue = is_bool($request->format) ? ($request->format ? 'true' : 'false') : $request->format;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->width !== null) {
            $localName = lcfirst('Width');
            $localValue = is_bool($request->width) ? ($request->width ? 'true' : 'false') : $request->width;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->height !== null) {
            $localName = lcfirst('Height');
            $localValue = is_bool($request->height) ? ($request->height ? 'true' : 'false') : $request->height;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->quality !== null) {
            $localName = lcfirst('Quality');
            $localValue = is_bool($request->quality) ? ($request->quality ? 'true' : 'false') : $request->quality;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->startPageNumber !== null) {
            $localName = lcfirst('StartPageNumber');
            $localValue = is_bool($request->startPageNumber) ? ($request->startPageNumber ? 'true' : 'false') : $request->startPageNumber;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->countPages !== null) {
            $localName = lcfirst('CountPages');
            $localValue = is_bool($request->countPages) ? ($request->countPages ? 'true' : 'false') : $request->countPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->password !== null) {
            $localName = lcfirst('Password');
            $localValue = is_bool($request->password) ? ($request->password ? 'true' : 'false') : $request->password;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->extractText !== null) {
            $localName = lcfirst('ExtractText');
            $localValue = is_bool($request->extractText) ? ($request->extractText ? 'true' : 'false') : $request->extractText;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderComments !== null) {
            $localName = lcfirst('RenderComments');
            $localValue = is_bool($request->renderComments) ? ($request->renderComments ? 'true' : 'false') : $request->renderComments;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->renderHiddenPages !== null) {
            $localName = lcfirst('RenderHiddenPages');
            $localValue = is_bool($request->renderHiddenPages) ? ($request->renderHiddenPages ? 'true' : 'false') : $request->renderHiddenPages;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->defaultFontName !== null) {
            $localName = lcfirst('DefaultFontName');
            $localValue = is_bool($request->defaultFontName) ? ($request->defaultFontName ? 'true' : 'false') : $request->defaultFontName;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->fontsFolder !== null) {
            $localName = lcfirst('FontsFolder');
            $localValue = is_bool($request->fontsFolder) ? ($request->fontsFolder ? 'true' : 'false') : $request->fontsFolder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/zip']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/zip'],
                ['application/zip']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'GET',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('GET', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Operation imageTransformPages
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\ImageTransformPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \GroupDocs\Viewer\Model\PageInfoCollection
     */
    public function imageTransformPages(Requests\ImageTransformPagesRequest $request)
    {
        try {
             list($response) = $this->imageTransformPagesWithHttpInfo($request);
             return $response;
        }
        catch(RepeatRequestException $e) {
             list($response) = $this->imageTransformPagesWithHttpInfo($request);
             return $response;
        } 
    }

    /*
     * Operation imageTransformPagesWithHttpInfo
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\ImageTransformPagesRequest $request is a request object for operation
     *
     * @throws \GroupDocs\Viewer\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \GroupDocs\Viewer\Model\PageInfoCollection, HTTP status code, HTTP response headers (array of strings)
     */
    public function imageTransformPagesWithHttpInfo(Requests\ImageTransformPagesRequest $request)
    {
        $returnType = '\GroupDocs\Viewer\Model\PageInfoCollection';
        $request = $this->ImageTransformPagesRequest($request);

        try {
            $options = $this->_createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                if ($statusCode === 401) {
                    $this->_refreshToken();
                    throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                }
          
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $request->getUri()), $statusCode, $response->getHeaders(), $response->getBody());
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }
            
            if ($this->config->getDebug()) {
                $this->_writeResponseLog($statusCode, $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 201:
                    $data = ObjectSerializer::deserialize($e->getResponseBody(), '\GroupDocs\Viewer\Model\PageInfoCollection', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /*
     * Operation imageTransformPagesAsync
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\ImageTransformPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageTransformPagesAsync(Requests\ImageTransformPagesRequest $request) 
    {
        return $this->imageTransformPagesAsyncWithHttpInfo($request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /*
     * Operation imageTransformPagesAsyncWithHttpInfo
     *
     * Rotates or reorders document page(s).
     *
     * @param Requests\ImageTransformPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function imageTransformPagesAsyncWithHttpInfo(Requests\ImageTransformPagesRequest $request) 
    {
        $returnType = '\GroupDocs\Viewer\Model\PageInfoCollection';
        $request = $this->ImageTransformPagesRequest($request);

        return $this->client
            ->sendAsync($request, $this->_createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }
                    
                    if ($this->config->getDebug()) {
                        $this->_writeResponseLog($response->getStatusCode(), $response->getHeaders(), ObjectSerializer::deserialize($content, $returnType, []));
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {        
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
          
                    if ($exception instanceof RepeatRequestException) {
                        $this->_refreshToken();
                        throw new RepeatRequestException("Request must be retried", $statusCode, $response->getHeaders(), $response->getBody());
                    }
          
                    throw new ApiException(
                        sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), $response->getBody()
                    );
                }
            );
    }

    /*
     * Create request for operation 'imageTransformPages'
     *
     * @param Requests\ImageTransformPagesRequest $request is a request object for operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ImageTransformPagesRequest(Requests\ImageTransformPagesRequest $request)
    {
        // verify the required parameter 'fileName' is set
        if ($request->fileName === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fileName when calling imageTransformPages');
        }

        $resourcePath = '/viewer/{fileName}/image/pages';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = "";
        $multipart = false;
    
        // path params
        if ($request->fileName !== null) {
            $localName = lcfirst('FileName');
            $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($request->fileName), $resourcePath);
        }

        // query params
        if ($request->folder !== null) {
            $localName = lcfirst('Folder');
            $localValue = is_bool($request->folder) ? ($request->folder ? 'true' : 'false') : $request->folder;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
        // query params
        if ($request->storage !== null) {
            $localName = lcfirst('Storage');
            $localValue = is_bool($request->storage) ? ($request->storage ? 'true' : 'false') : $request->storage;
            if (strpos($resourcePath, '{' . $localName . '}') !== false) {
                $resourcePath = str_replace('{' . $localName . '}', ObjectSerializer::toPathValue($localValue), $resourcePath);
            } else {
                $queryParams[$localName] = ObjectSerializer::toQueryValue($localValue);
            }
        }
    
    
        $resourcePath = $this->_buildUrl($resourcePath, $queryParams);

        // body params
        $_tempBody = null;
        if (isset($request->transformOptions)) {
            if (is_string($request->transformOptions)) {
                $_tempBody = "\"" . $request->transformOptions . "\"";   
            } else {
                $_tempBody = $request->transformOptions;
            }
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                ['application/json', 'application/xml']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = $formParams["data"];
            }
        }
    
        $this->_requestToken();

        if ($this->accessToken !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->accessToken;
        }

        $defaultHeaders = [];
        
        if ($this->config->getClientName()) {
            $defaultHeaders['x-groupdocs-client'] = $this->config->getClientName();
        }

        if ($this->config->getClientVersion()) {
            $defaultHeaders['x-groupdocs-client-version'] = $this->config->getClientVersion();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );
    
        $req = new Request(
            'PUT',
            $resourcePath,
            $headers,
            $httpBody
        );
        if ($this->config->getDebug()) {
            $this->_writeRequestLog('PUT', $resourcePath, $headers, $httpBody);
        }
        
        return $req;
    }

    /*
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    private function _createHttpClientOption() 
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
    
    /*
     * Executes response logging
     */
    private function _writeResponseLog($statusCode, $headers, $body)
    {
        $logInfo = "\nResponse: $statusCode \n";
        echo $logInfo . $this->_writeHeadersAndBody($logInfo, $headers, $body);
    }
	
    /*
     * Executes request logging
     */
    private function _writeRequestLog($method, $url, $headers, $body)
    {
        $logInfo = "\n$method: $url \n";
        echo $logInfo . $this->_writeHeadersAndBody($logInfo, $headers, $body);
    }
	
    /*
     * Executes header and boy formatting
     */
    private function _writeHeadersAndBody($logInfo, $headers, $body)
    {
        foreach ($headers as $name => $value) {
            $logInfo .= $name . ': ' . $value . "\n";
        }
        
        return $logInfo .= "Body: " . $body . "\n";
    }

    /*
     * Executes url parsing
     */
    private function _buildUrl($url, $queryParams) 
    {
        $urlPath = trim($url, '/');
        $urlQuery = http_build_query($queryParams);
 
        $url = $this->config->getServerUrl() . '/' . $urlPath . "?" . $urlQuery;
        
        return $url;
    }
  
    /*
     * Gets a request token from server
     */
    private function _requestToken() 
    {
        if($this->accessToken == null) 
        {
            $requestUrl = $this->config->getApiBaseUrl() . "/oauth2/token";
            $postData = "grant_type=client_credentials" . "&client_id=" . $this->config->getAppSid() . "&client_secret=" . $this->config->getAppKey();
            $response = $this->client->send(new Request('POST', $requestUrl, [], $postData));
            $result = json_decode($response->getBody()->getContents(), true);
            
            $this->accessToken = $result["access_token"];
            $this->refreshToken = $result["refresh_token"];
        }
    }
  
    /*
     * Refresh token
     */
    private function _refreshToken() 
    {
        $url = parse_url($this->config->getServerUrl());

        $requestUrl = $this->config->getApiBaseUrl() . "/oauth2/token";
        $postData = "grant_type=refresh_token&refresh_token=" . $this->config->getRefreshToken();
        $response = $this->client->send(new Request('POST', $requestUrl, [], $postData));
        $result = json_decode($response->getBody()->getContents(), true);
       
        $this->accessToken = $result["access_token"];
        $this->refreshToken = $result["refresh_token"];
    }
}
