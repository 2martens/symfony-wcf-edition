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

namespace Pzs\WCFCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LanguageItem
 *
 * @ORM\Table(name="wcf1_language_item")
 * @ORM\Entity
 */
class LanguageItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="languageItemID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $languageItemID;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="languageID", type="integer")
     */
    private $languageID;
	
    /**
     * @var string
     *
     * @ORM\Column(name="languageItem", type="string", length=255)
     */
    private $languageItem;
	
    /**
     * @var string
     *
     * @ORM\Column(name="languageItemValue", type="text")
     */
    private $languageItemValue;
	
    /**
     * @var string
     *
     * @ORM\Column(name="languageCustomItemValue", type="text")
     */
    private $languageCustomItemValue;
	
    /**
     * @var boolean
     *
     * @ORM\Column(name="languageItemOriginIsSystem", type="boolean")
     */
    private $languageItemOriginIsSystem;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="languageCategoryID", type="integer")
     */
    private $languageCategoryID;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="packageID", type="integer")
     */
    private $packageID;
    
    /**
     * @var Pzs\WCFCoreBundle\Entity\Language
     * 
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="languageItems")
     * @ORM\JoinColumn(name="languageID", referencedColumnName="languageID")
     */
    private $language;
	
    /**
     * @var Pzs\WCFCoreBundle\Entity\LanguageCategory
     * 
     * @ORM\ManyToOne(targetEntity="LanguageCategory", inversedBy="languageItems")
     * @ORM\JoinColumn(name="languageCategoryID", referencedColumnName="languageCategoryID")
     */
    private $languageCategory;
	
    /**
     * Get language item id.
     *
     * @return	integer 
     */
    public function getLanguageItemID()
    {
        return $this->languageItemID;
    }
	
    /**
     * Set languageID.
     *
     * @param	integer	$languageID
     * @return	LanguageItem
     */
    public function setLanguageID($languageID)
    {
        $this->languageID = $languageID;
    
        return $this;
    }
	
    /**
     * Get languageID.
     *
     * @return	integer 
     */
    public function getLanguageID()
    {
        return $this->languageID;
    }
	
    /**
     * Set languageItem.
     *
     * @param	string	$languageItem
     * @return	LanguageItem
     */
    public function setLanguageItem($languageItem)
    {
        $this->languageItem = $languageItem;
    
        return $this;
    }
	
    /**
     * Get languageItem.
     *
     * @return	string 
     */
    public function getLanguageItem()
    {
        return $this->languageItem;
    }
	
    /**
     * Set languageItemValue.
     *
     * @param	string	$languageItemValue
     * @return	LanguageItem
     */
    public function setLanguageItemValue($languageItemValue)
    {
        $this->languageItemValue = $languageItemValue;
    
        return $this;
    }
	
    /**
     * Get languageItemValue.
     *
     * @return	string 
     */
    public function getLanguageItemValue()
    {
        return $this->languageItemValue;
    }
	
    /**
     * Set languageCustomItemValue.
     *
     * @param	string	$languageCustomItemValue
     * @return	LanguageItem
     */
    public function setLanguageCustomItemValue($languageCustomItemValue)
    {
        $this->languageCustomItemValue = $languageCustomItemValue;
    
        return $this;
    }
	
    /**
     * Get languageCustomItemValue.
     *
     * @return	string 
     */
    public function getLanguageCustomItemValue()
    {
        return $this->languageCustomItemValue;
    }
	
    /**
     * Set languageItemOriginIsSystem.
     *
     * @param	boolean	$languageItemOriginIsSystem
     * @return	LanguageItem
     */
    public function setLanguageItemOriginIsSystem($languageItemOriginIsSystem)
    {
        $this->languageItemOriginIsSystem = $languageItemOriginIsSystem;
    
        return $this;
    }
	
    /**
     * Get languageItemOriginIsSystem.
     *
     * @return	boolean 
     */
    public function getLanguageItemOriginIsSystem()
    {
        return $this->languageItemOriginIsSystem;
    }
	
    /**
     * Set languageCategoryID.
     *
     * @param	integer	$languageCategoryID
     * @return	LanguageItem
     */
    public function setLanguageCategoryID($languageCategoryID)
    {
        $this->languageCategoryID = $languageCategoryID;
    
        return $this;
    }
	
    /**
     * Get languageCategoryID.
     *
     * @return	integer 
     */
    public function getLanguageCategoryID()
    {
        return $this->languageCategoryID;
    }
	
    /**
     * Set packageID.
     *
     * @param	integer	$packageID
     * @return	LanguageItem
     */
    public function setPackageID($packageID)
    {
        $this->packageID = $packageID;
    
        return $this;
    }
	
    /**
     * Get packageID.
     *
     * @return	integer 
     */
    public function getPackageID()
    {
        return $this->packageID;
    }
	
    /**
     * Set language.
     *
     * @param	\Pzs\WCFCoreBundle\Entity\Language $language
     * @return	LanguageItem
     */
    public function setLanguage(\Pzs\WCFCoreBundle\Entity\Language $language = null)
    {
        $this->language = $language;
    
        return $this;
    }
	
    /**
     * Get language.
     *
     * @return	\Pzs\WCFCoreBundle\Entity\Language 
     */
    public function getLanguage()
    {
        return $this->language;
    }
	
    /**
     * Set languageCategory
     *
     * @param	\Pzs\WCFCoreBundle\Entity\LanguageCategory $languageCategory
     * @return	LanguageItem
     */
    public function setLanguageCategory(\Pzs\WCFCoreBundle\Entity\LanguageCategory $languageCategory = null)
    {
        $this->languageCategory = $languageCategory;
    
        return $this;
    }
	
    /**
     * Get languageCategory
     *
     * @return	\Pzs\WCFCoreBundle\Entity\LanguageCategory 
     */
    public function getLanguageCategory()
    {
        return $this->languageCategory;
    }
}