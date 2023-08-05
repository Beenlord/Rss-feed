<?php

	namespace core;

	if (!defined("F_CONTROLLERS")) {
		define("F_CONTROLLERS", "/core/controllers");
	}

	final class Dispatcher
	{
		private string $controller;
		private string $method;
		private array $props = [];

		public function __construct() {

			// Install base values
			$this -> controller = "page";
			$this -> method = "index";
		}

		public static function init() {
			$path = self::parseUrl();

			if (isset($path[0]) && class_exists()) {
				unset($path[0]);
			}
		}

		private static function parseUrl(): array {
			$uri = explode("?", $_SERVER["REQUEST_URI"])[0];
			$uri = ltrim($uri, DIRECTORY_SEPARATOR);
			$uri = rtrim($uri, DIRECTORY_SEPARATOR);

			$parts = explode(DIRECTORY_SEPARATOR, $uri);
			return $parts && $parts[0] ? $parts : [];
		}
	}