<?php

namespace MatthTavares\DirectCall;

/**
 * Logger
 *
 * @author  Mateus Tavares <contato@mateustavares.com.br>
 * @package MatthTavares\DirectCall
 */
class Logger
{
	/**
	 * Escreve no arquivo de log.
	 *
	 * @param string $type INFO|WARG|EROR|MESG
	 * @param string $message
	 * @return void
	 */
	protected static function log( string $type, string $message )
	{
		$file = DirectCall::getLogFile();

		if( $file == '' )
			return;

		$message = sprintf("[%s] %s - %s", date('Y-m-d H:i:s'), strtoupper($type), $message);

		file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
	}

	public static function info( string $message )
	{
		self::log('INFO', $message);
	}

	public static function warning( string $message )
	{
		self::log('WARG', $message);
	}

	public static function error( string $message )
	{
		self::log('EROR', $message);
	}

	public static function message( string $message )
	{
		self::log('MESG', $message);
	}
}