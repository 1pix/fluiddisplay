<?php
namespace Tesseract\Fluiddisplay\Component;

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

use Tesseract\Tesseract\Service\FrontendConsumerBase;
use Tesseract\Tesseract\Tesseract;
use Tesseract\Tesseract\Utility\Utilities;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * This class is the actual data consumer for extension fluiddisplay.
 * It performs a rendering of the data structure using a Fluid template.
 *
 * @author Francois Suter (Cobweb) <typo3@cobweb.ch>
 * @author Fabien Udriot <fabien.udriot@ecodev.ch>
 * @package TYPO3
 * @subpackage tx_fluiddisplay
 */
class DataConsumer extends FrontendConsumerBase
{

    public $tsKey = 'tx_fluiddisplay';
    public $extKey = 'fluiddisplay';
    protected $conf;
    protected $table; // Name of the table where the details about the data display are stored
    protected $uid; // Primary key of the record to fetch for the details
    protected $structure = array(); // Input standardised data structure
    protected $result = ''; // The result of the processing by the Data Consumer
    protected $counter = array();

    /**
     * Resets values for a number of properties.
     *
     * This is necessary because services are managed as singletons.
     *
     * @return void
     */
    public function reset()
    {
        $this->structure = array();
        $this->result = '';
        $this->uid = '';
        $this->table = '';
        $this->conf = array();
    }

    /**
     * Returns the filter data.
     *
     * @return array
     */
    public function getFilter()
    {
        return $this->filter;
    }

    // Data Consumer interface methods

    /**
     * Returns the type of data structure that the Data Consumer can use.
     *
     * @return string Type of used data structures
     */
    public function getAcceptedDataStructure()
    {
        return Tesseract::RECORDSET_STRUCTURE_TYPE;
    }

    /**
     * Indicates whether the Data Consumer can use the type of data structure requested or not.
     *
     * @param string $type Type of data structure
     * @return boolean True if it can use the requested type, false otherwise
     */
    public function acceptsDataStructure($type)
    {
        return $type === Tesseract::RECORDSET_STRUCTURE_TYPE;
    }

    /**
     * Passes a data structure to the Data Consumer.
     *
     * @param array $structure Standardised data structure
     * @return void
     */
    public function setDataStructure($structure)
    {
        $this->structure[$structure['name']] = $structure;
    }

    /**
     * Gets the data structure.
     *
     * @return array $structure Standardised data structure
     */
    public function getDataStructure()
    {
        return $this->structure;
    }

    /**
     * Returns the result of the rendering.
     *
     * @return mixed The result of the Data Consumer's work
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets the result. Useful for hooks.
     *
     * @param mixed $result Predefined result
     * @return void
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Starts the rendering using the Fluid engine.
     *
     * @return void
     */
    public function startProcess()
    {

        // Get the full path to the template file
        try {
            $filePath = Utilities::getTemplateFilePath($this->consumerData['template']);

            // Instantiate a Fluid stand-alone view and load the template file
            $view = GeneralUtility::makeInstance(StandaloneView::class);
            $view->setTemplatePathAndFilename($filePath);
            // Assign the Tesseract Data Structure
            $view->assign('datastructure', $this->structure);
            // Define a hook allowing pre-processing of the view before rendering
            if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['preProcessView'])) {
                foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$this->extKey]['preProcessView'] as $className) {
                    $preProcessor = GeneralUtility::getUserObj($className);
                    $preProcessor->preProcessView($view, $this);
                }
            }
            // Send some information to debug output
            $this->controller->addMessage(
                    $this->extKey,
                    'Template file: ' . $filePath,
                    '',
                    FlashMessage::INFO
            );
            $this->controller->addMessage(
                    $this->extKey,
                    'Received data structure',
                    '',
                    FlashMessage::INFO,
                    $this->structure
            );
            // Render the result
            $this->result = $view->render();

        } catch (\Exception $e) {
            $this->controller->addMessage(
                    $this->extKey,
                    $e->getMessage() . ' (' . $e->getCode() . ')',
                    'Error processing the view',
                    FlashMessage::ERROR
            );
        }
    }
}
