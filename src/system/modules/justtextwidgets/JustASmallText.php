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
class JustASmallText extends Widget
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget_small';

	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{              
                return sprintf('<input type="hidden" id="ctrl_%s" name="%s" value="%s" /><div%s>%s</div>',
                            $this->strId,
                            $this->strName,
                            $this->label ? specialchars($this->label) : specialchars($this->varValue),
                            $this->style ? ' style="' . $this->style . '"' : '',
                            $this->label
                        );
	}
}