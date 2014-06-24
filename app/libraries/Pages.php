<?php

	Class Pages {

		public static function error($title, $message) {
			return View::make('errors.general',compact('title','message'));
		}
	}

?>