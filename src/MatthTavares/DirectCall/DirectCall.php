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
    protected static $access_token;

    /**
     * @var string
     */
    protected static $api = 'http://api.directcallsoft.com/';

    /**
     * @var string
     */
    protected static $logFile;

    public static function configure( string $id, string $secret, string $number )
    {
        self::$id = $id;
        self::$secret = $secret;
        self::$number = $number;

        // Get access_token
        $req = HttpClient::post('/request_token', [
            'client_id'      => self::$id,
            'client_secret'  => self::$secret
        ]);
        self::$access_token = $req->getContent()['access_token'];
    }

    /**
     * Retorna os dados de acesso que devem ser enviados a cada requisicao.
     *
     * @return array
     */
    public static function getAccountCredentials()
    {
        return [
            'access_token' => self::$access_token,
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

    /**
     * Cria um arquivo de log.
     *
     * @param string $path      O caminha absoluto para o arquivo.
     * @param bool   $overwrite Informa se o arquivo pode ser sobescrito.
     */
    public static function setLogFile( string $path, bool $overwrite = TRUE )
    {
        if( is_dir($path) )
            throw new Exception('O caminho informado não é um arquivo.');

        if( $overwrite )
            file_put_contents($path, '', LOCK_EX);
        else
            file_put_contents($path, '', FILE_APPEND | LOCK_EX);

        if( ! is_writable($path) )
            throw new Exception('O arquivo de log não pode ser escrito.');

        self::$logFile = $path;
    }

    /**
     * Retorna o caminho para o arquivo de log.
     *
     * @return string
     */
    public static function getLogFile()
    {
        return self::$logFile;
    }
}