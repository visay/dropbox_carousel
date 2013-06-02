<?php
namespace VisayInfo\DropboxCarousel\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Visay Keo <visay.keo@typo3.org>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * @package dropbox_carousel
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class CarouselController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action play
	 *
	 * @return void
	 */
	public function playAction() {
		$storageUid = $this->settings['fileStorage'];
		$folderName = $this->settings['folderName'];

		$storageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\StorageRepository');
		$storage = $storageRepository->findByUid($storageUid);
		$folder = $storage->getFolder('/' . $folderName);
		$files = $folder->getFiles();

		$patterns = array();
		$patterns[0] = '/-/';
		$patterns[1] = '/_/';
		$replacements = array();
		$replacements[0] = ' ';
		$replacements[1] = ' ';
		$folderName = preg_replace($patterns, $replacements, $folderName);

		$this->view->assign('folderName', ucwords($folderName));
		$this->view->assign('files', $files);
	}

}
?>