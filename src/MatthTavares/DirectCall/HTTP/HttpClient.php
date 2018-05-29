<?php

namespace MatthTavares\DirectCall\HTTP;

use MatthTavares\DirectCall\DirectCall;

/**
 * HttpClient
 *
 * @author  Mateus Tavares <contato@mateustavares.com.br>
 * @package MatthTavares\DirectCall
 */
class HttpClient
{
    /**
     * Envia um conjunto de parâmetros via post
     *
     * @param $endpoint
     * @param array $data
     * @return HttpResponse
     */
    public static function post( string $endpoint, array $data )
    {
        $url = DirectCall::endpoint($endpoint);

        /**
         * Adiciona automaticamente as credenciais da API
         * ao fazer uma requisição exceto para o endpoint 'request_token'
         */
        if( trim($endpoint, ' /') != 'request_token' )
            $data = array_merge(DirectCall::getAccountCredentials(), $data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,            $url);
        curl_setopt($ch, CURLOPT_POST,           true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query($data));
        curl_setopt($ch, CURLOPT_HEADER,         0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $response = new HttpResponse();
        $response->setStatusCode((int)$info['http_code']);
        $response->setContentType($info['content_type']);
        $response->setContent(json_decode($output, true));
        return $response;
    }
}