<?php

namespace LazyBench\AliApi\Auth;

use LazyBench\AliApi\Constant\ContentType;
use LazyBench\AliApi\Constant\HttpHeader;
use LazyBench\AliApi\Constant\HttpMethod;
use LazyBench\AliApi\Constant\SystemHeader;
use LazyBench\AliApi\Http\HttpRequest;

/**
 * Author:LazyBench
 * Date:2018/12/21
 */
class Auth
{
    private $appKey = '24186940';
    private $appSecret = '78d2cb291c9bb24404e042d49211ea86';

    public function __construct($appKey = '', $appSecret = '')
    {
        $appKey && $this->appKey = $appKey;
        $appSecret && $this->appSecret = $appSecret;
    }

    /**
     * Author:LazyBench
     * @param $host
     * @param $path
     * @return HttpRequest
     */
    public function buildRequest($host, $path)
    {
        $request = new HttpRequest($host, $path, HttpMethod::GET, $this->appKey, $this->appSecret);
        $request->setHeader(HttpHeader::HTTP_HEADER_CONTENT_TYPE, ContentType::CONTENT_TYPE_TEXT);
        $request->setHeader(HttpHeader::HTTP_HEADER_ACCEPT, ContentType::CONTENT_TYPE_TEXT);
        $request->setSignHeader(SystemHeader::X_CA_TIMESTAMP);
        return $request;
    }

}