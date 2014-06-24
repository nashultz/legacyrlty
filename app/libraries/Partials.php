<?php

	Class Partials {

		public static function jumpTo() {
			$year = (int)date('Y');
			$years['current'] = 'Year';
			for($i = $year; $i<= ($year + 10); $i++) {
				$years[$i] = $i;
			}			

			return View::make('events.partials.jumpTo',compact('years'));		
		}

	}

?>