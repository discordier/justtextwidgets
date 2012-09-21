<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package	   JustTextWidgets
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  CyberSpectrum
 * @license    LGPL
 * @filesource
 */
if (!defined('TL_ROOT'))
{
	die('You cannot access this file directly!');
}



/**
 * Class JustAnExplanation
 *
 * Display an explanation text in the backend.
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  CyberSpectrum
 * @package    JustTextWidgets
 */
class JustAnExplanation extends Widget
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget_explanation';

	/**
	 * Initialize the object
	 * @param array
	 * @throws Exception
	 */
	public function __construct($arrAttributes=false)
	{
		parent::__construct($arrAttributes);
		$this->strClass .= ' explanation';
	}


	/**
	 * Generate the label and return it as string
	 * @return string
	 */
	public function generateLabel()
	{
		if ($this->strLabel == '')
		{
			return '';
		}
		return sprintf('<span %s>%s%s</label>',
						(strlen($this->strClass) ? ' class="' . $this->strClass . '"' : ''),
						$this->strLabel,
						($this->required ? '<span class="mandatory">*</span>' : ''));
	}

	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		$GLOBALS['TL_CSS'][] = 'system/modules/justtextwidgets/html/css.css';
		return sprintf('<div>%s</div>', $this->content);
	}
}
