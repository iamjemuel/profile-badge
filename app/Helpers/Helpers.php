<?php

	if (!function_exists('explodeString'))
	{
	/**
	 * Explode string
	 *
	 * @param string
	 * @return string
	 */
		function explodeString($data)
		{
			return explode(' ', trim($data));
		}
	}

	if (!function_exists('kebabCaseName'))
	{
		/**
		 * Explode string
		 *
		 * @param string
		 * @return string
		 */
		function kebabCaseName($name)
		{
			$temp = explode(' ', trim($name));
	
			if(count($temp) > 1)
			{
				return str_replace(' ', '-', strtolower($name));
			}
			else
			{
				return strtolower($temp[0]);
			}
		}
	}
?>
