# DirectCall
Biblioteca para envio de SMS do DirectCall.

## Instalação
Esta é biblioteca está disponível através do Packagist e pode ser instalada utilizando o [Composer](https://getcomposer.org/).
```
composer require "matthtavares/directcall"
```

## Exemplo
```
use MatthTavares\DirectCall\DirectCall;
use MatthTavares\DirectCall\Services\SMS;

// Configura o acesso a API
DirectCall::configure('SEU_ID_DIRECTCALL', 'SEU_SECRET_DIRECTCALL', 'SEU_TELEFONE_ORIGEM');

// Envia o SMS
$sms = new SMS();
$sms->setNumber('+558399999999');
$sms->setText('Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis. Aenean aliquam molestie leo, vitae iaculis nisl. Viva Forevis aptent taciti sociosqu ad litora torquent. In elementis mé pra quem é amistosis quis leo.');
$sms->send();
```

# Versionamento
Utilizamos o [SemVer](https://semver.org/lang/pt-BR/) para o versionamento do projeto. A versão atual é 1.3.2.