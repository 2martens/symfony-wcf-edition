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
 * @subpackage	PzSWCFCoreBundle
 */

namespace PzS\WCFCoreBundle\Tests\Service\Language;

use PzS\WCFCoreBundle\Service\Language\LanguageService;

/**
 * Tests the language service.
 * 
 * @author		Jim Martens
 * @copyright	2013 Jim Martens
 * @license		http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License, version 3
 * @package		de.plugins-zum-selberbauen.SymfonyWCF
 * @subpackage	PzSWCFCoreBundle
 */
class LanguageServiceTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * The language service.
	 * 
	 * @var \PzS\WCFCoreBundle\Service\Language\LanguageServiceInterface
	 */
	private $languageService;
	
	/**
	 * {@inheritDoc}
	 */
	public function setUp()
	{
		$languageRepository = $this->getMockBuilder('\PzS\WCFCoreBundle\Repository\LanguageRepository')
			->disableOriginalConstructor()
			->getMock();
		$languageRepository->expects(parent::once())
			->method('find')
			->will(parent::returnCallback(array($this, 'findLanguageCallback')));
		$languageRepository->expects(parent::once())
			->method('findBy')
			->will(parent::returnCallback(array($this, 'findByLanguageCallback')));
		
		$languageCategoryRepository = $this->getMockBuilder('\PzS\WCFCoreBundle\Repository\LanguageCategoryRepository')
			->disableOriginalConstructor()
			->getMock();
		$languageRepository->expects(parent::once())
			->method('find')
			->will(parent::returnCallback(array($this, 'findLanguageCategoryCallback')));
		$languageRepository->expects(parent::once())
			->method('findBy')
			->will(parent::returnCallback(array($this, 'findByLanguageCategoryCallback')));
		
		$this->languageService = new LanguageService($languageRepository);
		$this->languageService->setDefaultLanguage(2);
	}
	
	/**
	 * Tests the getLanguage method.
	 */
	public function testGetLanguage()
	{
		$actualLanguage1 = $this->languageService->getLanguage(1);
		parent::assertEquals(1, $actualLanguage1->getLanguageID(), 'For an existing ID, a wrong language has been returned.');
		
		$actualLanguage2 = $this->languageService->getLanguage(3);
		parent::assertNull($actualLanguage2, 'For an invalid language id, a value not equal to null has been returned.');
	}
	
	/**
	 * Tests the getLanguageByCode method.
	 */
	public function testGetLanguageByCode()
	{
		$actualLanguage1 = $this->languageService->getLanguageByCode('de');
		parent::assertEquals('de', $actualLanguage1->getLanguageCode(), 'For an existing language code, a wrong language has been returned.');
		
		$actualLanguage2 = $this->languageService->getLanguageByCode('js');
		parent::assertNull($actualLanguage2, 'For an invalid language code, a value not equal to null has been returned.');
	}
	
	/**
	 * Tests the getLanguages method.
	 */
	public function testGetLanguages()
	{
		$languages = $this->languageService->getLanguages();
		parent::assertCount(2, $languages, 'The result array contains more or less entries than languages exist.');
		parent::assertContainsOnlyInstancesOf('\PzS\WCFCoreBundle\Entity\Language', $languages, 'The result array does contain elements that are not languages.');
	
		$containsAllLanguages = false;
		$contains1 = false;
		$contains2 = false;
		$containsOnlyExistingLanguages = true;
		foreach ($languages as $language)
		{
			$id = $language->getLanguageID();
			if ($id == 1)
			{
				$contains1 = true;
			}
			elseif ($id == 2)
			{
				$contains2 = true;
			}
			else
			{
				$containsOnlyExistingLanguages = false;
			}
		}
		$containsAllLanguages = $contains1 && $contains2 && $containsOnlyExistingLanguages;
	
		parent::assertTrue($containsAllLanguages, 'The result array contains either not all or more languages than actually exist.');
	}
	
	/**
	 * Tests the setDefaultLanguageID method.
	 */
	public function testSetDefaultLanguageID()
	{
		$this->languageService->setDefaultLanguage(1);
		parent::assertEquals(1, $this->languageService->getDefaultLanguageID(), 'The default language id hasn\'t been returned.');
	}
	
	/**
	 * Tests the getDefaultLanguageID method.
	 */
	public function testGetDefaultLanguageID()
	{
		parent::assertEquals(2, $this->languageService->getDefaultLanguageID(), 'The default language id hasn\'t been returned.');
	}
	
	/**
	 * Tests the getCategory method.
	 */
	public function testGetCategory()
	{
		$actualLanguageCategory1 = $this->languageService->getCategory('wcf.global');
		parent::assertEquals('wcf.global', $actualLanguageCategory1->getLanguageCategory(), 'For an existing category name, a wrong language category has been returned.');
	
		$actualLanguageCategory2 = $this->languageService->getCategory('wcf.humbug');
		parent::assertNull($actualLanguageCategory2, 'For an invalid language category name, a value not equal to null has been returned.');
	}
	
	/**
	 * Tests the getCategoryByID method.
	 */
	public function testGetCategoryByID()
	{
		$actualLanguageCategory1 = $this->languageService->getCategoryByID(1);
		parent::assertEquals(1, $actualLanguageCategory1->getLanguageCategoryID(), 'For an existing ID, a wrong language has been returned.');
	
		$actualLanguageCategory2 = $this->languageService->getCategoryByID(3);
		parent::assertNull($actualLanguageCategory2, 'For an invalid id, a value not equal to null has been returned.');
	}
	
	/**
	 * Tests the isValidCategory method.
	 */
	public function testIsValidCategory()
	{
		parent::assertTrue($actualLanguageCategory1->isValidCategory('wcf.global'), 'For a valid category, a value not equal to true has been returned.');
		parent::assertFalse($actualLanguageCategory1->isValidCategory('wcf.humbug'), 'For an invalid category, a value not equal to false has been returned.');
	}
	
	/**
	 * Tests the getCategories method.
	 */
	public function testGetCategories()
	{
		$categories = $this->languageService->getCategories();
		parent::assertCount(2, $categories, 'The result array contains more or less entries than categories exist.');
		parent::assertContainsOnlyInstancesOf('\PzS\WCFCoreBundle\Entity\LanguageCategory', $categories, 'The result array does contain elements that are not language categories.');
		
		$containsAllCategories = false;
		$contains1 = false;
		$contains2 = false;
		$containsOnlyExistingCategories = true;
		foreach ($categories as $category)
		{
			$id = $category->getLanguageCategoryID();
			if ($id == 1)
			{
				$contains1 = true;
			}
			elseif ($id == 2)
			{
				$contains2 = true;
			}
			else
			{
				$containsOnlyExistingCategories = false;
			}
		}
		$containsAllCategories = $contains1 && $contains2 && $containsOnlyExistingCategories;
		
		parent::assertTrue($containsAllCategories, 'The result array contains either not all or more categories than actually exist.');
	}
	
	// TODO: implement tests for getUserLanguage, getLanguageItem and isMultilingualismEnabled
	
	// ----- helper functions ----//
	
	/**
	 * Return language mocks or null depending on the input.
	 * This is a callback for the find method.
	 * 
	 * @return	 \PHPUnit_Framework_MockObject_MockObject|NULL
	 */
	public function findLanguageCallback()
	{
		$args = func_get_args();
		$id = $args[0];
		if ($id == 1)
		{
			$language = $this->getMock('\PzS\WCFCoreBundle\Entity\Language');
			$language->expects(parent::once())
				->method('getLanguageID')
				->will(parent::returnValue(1));
			return $language;
		}
		elseif ($id == 2)
		{
			$language = $this->getMock('\PzS\WCFCoreBundle\Entity\Language');
			$language->expects(parent::once())
				->method('getLanguageID')
				->will(parent::returnValue(2));
			return $language;
		}
		else
		{
			return null;
		}
	}
	
	
	/**
	 * Return language mocks or null depending on the input.
	 * This is a method for the findBy method.
	 *
	 * @return	 \PHPUnit_Framework_MockObject_MockObject|NULL
	 */
	public function findByLanguageCallback()
	{
		$args = func_get_args();
		$languageCode = $args[0]['languageCode'];
		if ($languageCode == 'de')
		{
			$language = $this->getMock('\PzS\WCFCoreBundle\Entity\Language');
			$language->expects(parent::once())
				->method('getLanguageCode')
				->will(parent::returnValue('de'));
			return $language;
		}
		elseif ($languageCode == 'en')
		{
			$language = $this->getMock('\PzS\WCFCoreBundle\Entity\Language');
			$language->expects(parent::once())
				->method('getLanguageCode')
				->will(parent::returnValue('en'));
			return $language;
		}
		else
		{
			return null;
		}
	}
	
	
	/**
	 * Return language category mocks or null depending on the input.
	 * This is a callback for the find method.
	 *
	 * @return	 \PHPUnit_Framework_MockObject_MockObject|NULL
	 */
	public function findLanguageCategoryCallback()
	{
		$args = func_get_args();
		$id = $args[0];
		if ($id == 1)
		{
			$languageCategory = $this->getMock('\PzS\WCFCoreBundle\Entity\LanguageCategory');
			$languageCategory->expects(parent::once())
				->method('getLanguageCategoryID')
				->will(parent::returnValue(1));
			return $language;
		}
		elseif ($id == 2)
		{
			$languageCategory = $this->getMock('\PzS\WCFCoreBundle\Entity\LanguageCategory');
			$languageCategory->expects(parent::once())
				->method('getLanguageCategoryID')
				->will(parent::returnValue(2));
			return $languageCategory;
		}
		else
		{
			return null;
		}
	}
	
	
	/**
	 * Return language category mocks or null depending on the input.
	 * This is a method for the findBy method.
	 *
	 * @return	 \PHPUnit_Framework_MockObject_MockObject|NULL
	 */
	public function findByLanguageCategoryCallback()
	{
		$args = func_get_args();
		$languageCategory = $args[0]['languageCategory'];
		if ($languageCategory == 'wcf.global')
		{
			$languageCategory = $this->getMock('\PzS\WCFCoreBundle\Entity\LanguageCategory');
			$languageCategory->expects(parent::once())
				->method('getLanguageCategory')
				->will(parent::returnValue('wcf.global'));
			return $languageCategory;
		}
		elseif ($languageCategory == 'wcf.acp')
		{
			$languageCategory = $this->getMock('\PzS\WCFCoreBundle\Entity\LanguageCategory');
			$languageCategory->expects(parent::once())
				->method('getLanguageCategory')
				->will(parent::returnValue('wcf.acp'));
			return $languageCategory;
		}
		else
		{
			return null;
		}
	}
	
}
