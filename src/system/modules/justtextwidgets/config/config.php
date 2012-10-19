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
 * Form fields
 */
$GLOBALS['BE_FFL']['justtext']  = 'JustAText';
$GLOBALS['BE_FFL']['justtextoption']  = 'JustATextOption';
$GLOBALS['BE_FFL']['justexplanation'] = 'JustAnExplanation';
$GLOBALS['BE_FFL']['justsmalltext'] = 'JustASmallText';

?>