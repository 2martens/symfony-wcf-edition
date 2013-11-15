<?php
/**
 * LICENSE:
 * This file is part of the Symfony-WCF.
 *
 * The Symfony-WCF is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * The Ultimate CMS is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with the Symfony-WCF.  If not, see {@link http://www.gnu.org/licenses/}.
 * 
 * @author		Jim Martens
 * @copyright	2013 Jim Martens
 * @license		http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License, version 3
 * @package		de.plugins-zum-selberbauen.SymfonyWCF
 * @subpackage	PzsWCFCoreBundle
 */

namespace Pzs\WCFCoreBundle\Service\Cache;

/**
 * Manages the cache.
 * 
 * @author		Jim Martens
 * @copyright	2013 Jim Martens
 * @license		http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License, version 3
 * @package		de.plugins-zum-selberbauen.SymfonyWCF
 * @subpackage	PzsWCFCoreBundle
 */
class CacheService implements CacheServiceInterface
{
	// TODO implement methods
	/**
	 * 
	 */
	public function get($cacheName, array $parameters = array())
	{
		return '';
	}
	
	/**
	 * 
	 */
	public function set($cacheName, array $data, array $parameters = array())
	{
		
	}
	
	/**
	 * 
	 */
	public function reset($cacheName, array $parameters = array())
	{
		
	}
	
	/**
	 * 
	 */
	public function resetAll()
	{
		
	}
	
	/**
	 * 
	 */
	public function isCacheExisting($cacheName)
	{
		return false;
	}
}
