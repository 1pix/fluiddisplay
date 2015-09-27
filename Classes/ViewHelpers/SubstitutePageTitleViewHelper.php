<?php
namespace Tesseract\Fluiddisplay\ViewHelpers;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This class is a Fluiddisplay view helper for the Fluid templating engine.
 *
 * It takes the content of the view helper tag and sets it as the page title,
 * returning it or not, depending on the settings.
 *
 * = Examples =
 *
 * Assuming that the namespace has been declared as follows:
 * {namespace fluiddisplay = Tesseract\Fluiddisplay\ViewHelpers}
 *
 * <code title="Simple string with expression to evaluate">
 * <fluiddisplay:substitutePageTitle output="true">{record.header}</fluiddisplay:substitutePageTitle>
 * </code>
 * <output>
 * Foo (assuming the "header" property of object "record" was "Foo")
 * </output>
 * NOTE: if the output property is not set or set to false, the view helper will return an empty string.
 *
 * @package TYPO3
 * @subpackage tx_fluiddisplay
 * @author Francois Suter <typo3@cobweb.ch>
 */
class SubstitutePageTitleViewHelper extends AbstractViewHelper {

	/**
	 * Substitutes the page title with the view helper's content
	 *
	 * @param boolean $output Set to true if the content of the tag should be returned
	 * @return string The content of the tag or an empty string
	 */
	public function render($output = FALSE) {
		$output = (boolean)$output;
		// Render the content and set it as the page title
		$content = $this->renderChildren();
		if (!empty($content)) {
			$GLOBALS['TSFE']->page['title'] = $content;
			$GLOBALS['TSFE']->indexedDocTitle = $content;
		}
		// If output is requested, return content. Otherwise return empty string.
		return ($output) ? $content : '';
	}

}
