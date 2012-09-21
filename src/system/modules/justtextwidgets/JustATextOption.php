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
 * Class JustATextOption
 *
 * Display a hidden field with a fixed value in the backend and the option name next to it.
 * This is useful when you need predefined values in a MultiColumnWizard i.e.
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  CyberSpectrum
 * @package    JustTextWidgets
 */
class JustATextOption extends Widget
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget';

	/**
	 * Options
	 * @var array
	 */
	protected $arrOptions = array();

	/**
	 * Add specific attributes
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'options':
				$this->arrOptions = deserialize($varValue);
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}

	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		// Add empty option (XHTML) if there are none
		if (empty($this->arrOptions))
		{
			$this->arrOptions = array(array('value'=>'', 'label'=>'-'));
		}

		foreach ($this->arrOptions as $strKey=>$arrOption)
		{
			if (isset($arrOption['value']))
			{
				if ($this->isSelected($arrOption))
				{
					return sprintf('<input type="hidden" id="ctrl_%s" name="%s" value="%s" /><span>%s</span>',
										$this->strId,
										$this->strName,
										 specialchars($arrOption['value']),
										 $arrOption['label']);
				}
			}
			else
			{
				foreach ($arrOption as $arrOptgroup)
				{
					if ($this->isSelected($arrOptgroup))
					{
						return sprintf('<input type="hidden" id="ctrl_%s" name="%s" value="%s" /><span>%s</span>',
											$this->strId,
											$this->strName,
											 specialchars($arrOptgroup['value']),
											 $arrOptgroup['label']);
					}
				}
			}
		}
	}
}