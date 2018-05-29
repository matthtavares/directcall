<?php

namespace MatthTavares\DirectCall;

use MatthTavares\DirectCall\HTTP\HttpClient;
use MatthTavares\DirectCall\HTTP\HttpResponse;
use MatthTavares\DirectCall\Services\SMS;

/**
 * DirectCall
 *
 * @author  Mateus Tavares <contato@mateustavares.com.br>
 * @package MatthTavares\DirectCall
 */
class DirectCall
{
    /**
     * @var string
     */
    protected static $id;

    /**
     * @var string
     */
    protected static $secret;

    /**
     * @var string
     */
    protected static $number;

    /**
     * @var string
     */
    protected static $api = 'http://api.directcallsoft.com/';

    public static function configure( string $id, string $secret, string $number )
    {
        self::$id = $id;
        self::$secret = $secret;
        self::$number = $number;
    }

    /**
     * Retorna o token que deve ser enviado a cada requisicao.
     *
     * @return string
     */
    public static function getAccessToken()
    {
        $req = HttpClient::post('/request_token', [
            'client_id'      => self::$id,
            'client_secret'  => self::$secret
        ]);

        return $req->getContent()['access_token'];
    }

    /**
     * Retorna os dados de acesso que devem ser enviados a cada requisicao.
     *
     * @return array
     */
    public static function getAccountCredentials()
    {
        return [
            'access_token' => self::getAccessToken(),
            'origem' => self::$number
        ];
    }

    /**
     * Formata a URL que a API irá chamar.
     *
     * @param  string $endpoint
     * @return string
     */
    public static function endpoint( string $endpoint )
    {
        return self::$api.trim(trim($endpoint,'/'));
    }
}