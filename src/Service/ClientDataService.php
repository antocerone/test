<?php

namespace App\Service;

/**
 * ClientDataService
 * Elements site
 * Default data
 */
class ClientDataService
{
	// Data core
	public $bd_mode					= 'light'; // dark light
	public $version					= '1.0.0';
	public $dump					= false;

	public $client					= false;
	public $blogs					= [];

	// Elements html with data
	public $modal					= [];
	public $head					= '';
	public $chats					= '';
	public $notificaciones			= '';
	public $alertas					= '';
	public $nav						= '';
	public $sidebar					= '';
	public $slider					= '';
	public $content					= '';
	public $modalslider				= '';
	public $footer					= '';

	public function __construct()
	{
		// 
		$this->client = [
			'title' => 'ipGlobalBlog',
			'slogan' => 'Expertos en negocios digitales',
			'telefono' => '',
			'email' => '',
			'direccion' => '',
			'icon' => 'icon.png',
			'logo' => 'logo.png',
			'web' => 'ipglobal.es',
		];

		$this->blogs = [
			'0' => [
				'id' => 1,
				'title' => 'Blog público 1',
				'is_active' => 1,
			],
			'1' => [
				'id' => 2,
				'title' => 'Blog público 2',
				'is_active' => 1,
			]
		];

		// mapping data for html
		$this->_setModal();
		$this->_setHead();
		$this->_setChat();
		$this->_setNotificaciones();
		$this->_setAlertas();
		$this->_setNav();
		$this->_setSideBar();
		$this->_setSlider();
		$this->_setContent();
		$this->_setModalSideBar();
		$this->_setFooter();
	}

	#################################################################################################
	# _SETTERS
	#################################################################################################
	/**
	 * setModal
	 * (string) Almacena mensajes y alertas modal.
	 * @param mixed $data
	 * @return void
	 *
	 * @param string 'mode' Options like bootstrap:alert or modal
	 * @param string 'type' Options like bootstrap:primary secondary success danger warning info light dark
	 */
	private function _setModal($data = [])
	{
		$this->modal['show'] = false;
		$this->modal['mode'] = 'alert'; // alert o modal
		$this->modal['type'] = 'primary'; // primary secondary success danger warning info light dark
		$this->modal['title'] = '';
		$this->modal['message'] = [];

		if (!empty($data)) {
			$this->modal['show'] = $data['show'];
			$this->modal['mode'] = $data['mode'];
			$this->modal['type'] = $data['type'];
			$this->modal['title'] = $data['title'];
			$this->modal['message'] = $data['message'];
		}
	}

	public function getModal()
	{
		return $this->modal;
	}

	/**
	 * setHead
	 *
	 * @return void
	 */
	private function _setHead()
	{
		$this->head = [
			'base' => ['href' => '/'],
			'meta' => [
				'charset' => 'utf-8',
				'name' => [
					'viewport' => 'width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0',
					"HandheldFriendly" => 'True',
					"MobileOptimized" => '320',
					"googlesiteverification" => '2snOArqRKSB5Dip4oXK21E9ERTEIeKNMXRaPCDKyP2c',
					'keywords' => '(descripcion)',
					'title' => 'Sedes',
					'author' => '(nombre_empresa)',
					'description' => '(descripcion)',
					'DCtitle' => '(descripcion)',
					'DCdescription' => '(descripcion)',
					'robots' => 'index, follow',
					'revisitafter' => '1 month',
				],
				'httpequiv' => [
					'XUACompatible' => 'IE=edge,chrome=1',
					'description' => '(descripcion)',
					'DCdescription' => '(descripcion)',
					'pragma' => 'no-cache'
				]
			]
		];
	}

	private function _setChat($data = [])
	{
		$this->chats = !empty($data) ? $data : [
			'1' => ['autor' => 'Brad Diesel', 'estado' => 'danger', 'text' => 'Call me whenever you can...', 'time' => '10-12-2022 09:15:00', 'image' => 'default.png'],
			'2' => ['autor' => 'John Pierce', 'estado' => 'muted', 'text' => 'I got your message bro', 'time' => '10-12-2022 10:15:00', 'image' => 'default.png'],
			'3' => ['autor' => 'Nora Silvester', 'estado' => 'warning', 'text' => 'The subject goes here', 'time' => '10-12-2022 11:30:00', 'image' => 'default.png'],
		];
	}

	private function _setNotificaciones($data = [])
	{
		$this->notificaciones = !empty($data) ? $data : $data;
	}

	private function _setAlertas($data = [])
	{
		$this->alertas = !empty($data) ? $data : [
			'messages' => 4,
			'requests' => 6,
			'reports' => 3,
		];
	}

	private function _setNav($data = [])
	{
		$this->nav = !empty($data) ? $data : $data;
	}

	private function _setSideBar($data = [])
	{
		$this->sidebar = !empty($data) ? $data : $data;
	}

	private function _setSlider($data = [])
	{
		$this->slider = !empty($data) ? $data : $data;
	}

	private function _setContent($data = [])
	{
		$this->content = !empty($data) ? $data : $data;
	}

	private function _setModalSideBar($data = [])
	{
		$this->modalslider = !empty($data) ? $data : $data;
	}

	private function _setFooter($data = [])
	{
		$this->footer = !empty($data) ? $data : [];
	}
}
