<?php

namespace MatthTavares\DirectCall\Services;

use MatthTavares\DirectCall\DirectCall;
use MatthTavares\DirectCall\HTTP\HttpClient;

/**
 * SMS
 *
 * Mensagem de texto para celulares
 *
 * @author  Mateus Tavares <contato@mateustavares.com.br>
 * @package MatthTavares\DirectCall
 */
class SMS implements ServiceInterface
{
    /**
     * Texto que será enviado
     *
     * @var string
     */
    protected $text;

    /**
     * Número para o qual o texto será enviado
     *
     * @var string
     */
    protected $number;

    /**
     * Retorna o texto a ser enviado
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Define o texto a ser enviado
     *
     * @param   string  $text
     * @return  SMS
     */
    public function setText( string $text )
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Retorna o número de destino
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Define o número de destino
     * 
     * @param   string  $number
     * @return  SMS
     */
    public function setNumber( string $number )
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Envia o SMS através da API.
     *
     * @return  MatthTavares\DirectCall\HTTP\HttpResponse
     */
    public function send()
    {
        return HttpClient::post('/sms/send', [
            'destino' => $this->getNumber(),
            'texto'   => $this->getText(),
            'tipo'    => 'texto'
        ]);
    }
}