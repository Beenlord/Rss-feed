<?php

	spl_autoload_register(function ($className) {
		$requirePath = str_replace("\\", "/", $className).".php";
		if (file_exists($requirePath)) {
			require $requirePath;
		}
	});