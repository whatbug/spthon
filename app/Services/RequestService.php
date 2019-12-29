<?php namespace App\Services;

use Swoole\Http\Request;

Class RequestService {

    //定义参数
    protected $server = [];
    protected $uri    = '';
    protected $queryParams;
    protected $postParams;
    protected $method;
    protected $body;
    protected $header = [];
    protected $swRequest;

    /**
     * @return array
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param array $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return mixed
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * @param mixed $queryParams
     */
    public function setQueryParams($queryParams)
    {
        $this->queryParams = $queryParams;
    }

    /**
     * @return mixed
     */
    public function getPostParams()
    {
        return $this->postParams;
    }

    /**
     * @param mixed $postParams
     */
    public function setPostParams($postParams)
    {
        $this->postParams = $postParams;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return array
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param array $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getSwRequest()
    {
        return $this->swRequest;
    }

    /**
     * @param mixed $swRequest
     */
    public function setSwRequest($swRequest)
    {
        $this->swRequest = $swRequest;
    }

    //初始化
    /**
     * RequestService constructor.
     * @param array $server
     * @param string $uri
     * @param $queryParams
     * @param $postParams
     * @param $method
     * @param $body
     * @param array $header
     * @param $swooleRequest
     */
    public function __construct(array $server, $uri, $queryParams, $postParams, $method, $body, array $header)
    {
        $this->server = $server;
        $this->uri = $uri;
        $this->queryParams = $queryParams;
        $this->postParams = $postParams;
        $this->method = $method;
        $this->body = $body;
        $this->header = $header;
    }

    //被动初始化
    public static function init(Request $swRequest) {
        $server = $swRequest->server;
        $method = $swRequest->server['request_method']?:'GET';
        $uri    = $server['request_uri'];
        $body   = $swRequest->rawContent();
        $request = new self($server, $uri, $swRequest->get, $swRequest->post, $method, $body, $swRequest->header);
        $request->swRequest = $swRequest;
        return $request;
    }


}