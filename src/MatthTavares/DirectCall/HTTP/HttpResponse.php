<?php

namespace MatthTavares\DirectCall\HTTP;

/**
 * Response
 * 
 * @author  Mateus Tavares <contato@mateustavares.com.br>
 * @package MatthTavares\DirectCall
 */
class HttpResponse
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $contentType;

    /**
     * @var array
     */
    protected $content;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode( int $statusCode )
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType( string $contentType )
    {
        $this->contentType = $contentType;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param array $content
     */
    public function setContent( $content )
    {
        $this->content = $content;
    }
}