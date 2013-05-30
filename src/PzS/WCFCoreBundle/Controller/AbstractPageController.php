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
 * @copyright	2011-2012 Jim Martens
 * @license		http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License, version 3
 * @package		de.plugins-zum-selberbauen.SymfonyWCF
 * @subpackage	PzSWCFCoreBundle
*/

namespace PzS\WCFCoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * An abstract page controller to be used for any kind of pages.
 * 
 * Usage:
 * If your controller just shows already existing data, then inherit from this class.
 * 
 * @author		Jim Martens
 * @copyright	2013 Jim Martens
 * @license		http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License, version 3
 * @package		de.plugins-zum-selberbauen.SymfonyWCF
 * @subpackage	PzSWCFCoreBundle
 */
abstract class AbstractPageController extends Controller
{
	/**
	 * Reads parameters.
	 */
	public abstract function readParameters();
	
	/**
	 * Reads necessary database data.
	 */
	public abstract function readData();
	
	/**
	 * Assigns template variables.
	 */
	public abstract function assignVariables();
	
	/**
	 * Controller action. 
	 * Simply add a routing info to your bundle's config that
	 * uses your controller's showAction method. That should
	 * extend this method in order to make use of the functionality
	 * provided by this class.
	 */
	public function showAction()
	{
		$this->readParameters();
		$this->readData();
		$this->assignVariables();
	}
	
}
