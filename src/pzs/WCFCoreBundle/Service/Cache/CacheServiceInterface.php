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
 * Provides functionality for caching.
 * 
 * @author		Jim Martens
 * @copyright	2013 Jim Martens
 * @license		http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License, version 3
 * @package		de.plugins-zum-selberbauen.SymfonyWCF
 * @subpackage	PzsWCFCoreBundle
 */
interface CacheServiceInterface
{
	/**
	 * Returns the cached value for the given name and parameters.
	 * 
	 * @param	string	$cacheName	the cache name has to exist, call isCacheExisting to verify
	 * @param	array	$parameters	optional
	 * 
	 * @return	mixed
	 */
	public function get($cacheName, array $parameters = array());
	
	/**
	 * Caches given data under given cacheName and parameters.
	 * 
	 * @param	string	$cacheName	the cache name must not exist, call isCacheExisting to verify
	 * @param	array	$data
	 * @param	array	$parameters	optional
	 */
	public function set($cacheName, array $data, array $parameters = array());
	
	/**
	 * Sets the cache under cacheName with given parameters as outdated.
	 * 
	 * @param	string	$cacheName	the cache name has to exist, call isCacheExisting to verify
	 * @param	array	$parameters	optional
	 */
	public function reset($cacheName, array $parameters = array());
	
	/**
	 * Resets all caches.
	 * 
	 * Should only be used if necessary as the next request will have to load all data from database.
	 */
	public function resetAll();
	
	/**
	 * Returns true if a cache under the given cache name exists.
	 * 
	 * @param	string	$cacheName
	 * 
	 * @return	boolean
	 */
	public function isCacheExisting($cacheName);
}
