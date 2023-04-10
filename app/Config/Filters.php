<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'authGuard' => \App\Filters\AuthGuard::class,
		
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'honeypot',
			'authGuard' => ['before' => ['admin/*']],
			'authGuard' =>['except' => ['/',
									'categoria/*',
									'pagina/*',
									'print/*',
									'logout',
									'cadastro',
									'telefones',
									'visualizar/*',
									'ouvidoria',
									'server',
									'front/signupcontroller/store',
									'front/signincontroller/loginAuth',
									'front/Home/sendEmail',
									'Front/Api/*',
									'/front/documentos/getFiles',
									
									'/admin/ouvidoria/core',
									'/admin/ouvidoria/getProtocolo',
									'pesquisa/',
									'documentos',
									'login',
									'Front/Events',
									'Front/Shop/*',
									'register',
									'front/chat/',
									'Front/Shop/Checkout/cadastrarUsuario']],
	
		],
		'after'  => [
			'toolbar',
			
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
