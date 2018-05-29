<?php

namespace MatthTavares\DirectCall\Services;

/**
 * ServiceInterface
 *
 * @author  Mateus Tavares <contato@mateustavares.com.br>
 * @package MatthTavares\DirectCall
 */
interface ServiceInterface
{
    /**
     * Precisa ser implementado por todos os servicos.
     *
     * @return  MatthTavares\DirectCall\HTTP\HttpResponse
     */
    public function send();
}