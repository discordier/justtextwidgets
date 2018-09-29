<?php

/**
 * This file is part of discordier/justtextwidgets.
 *
 * (c) 2012-2015 CyberSpectrum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    JustTextWidgets
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Stefan heimes <stefan_heimes@hotmail.com>
 * @author     Andreas Isaak <andy.jared@googlemail.com>
 * @copyright  2012-2017 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

use Discordier\JustTextWidgetsBundle\Widgets\JustALongExplanation;
use Discordier\JustTextWidgetsBundle\Widgets\JustAnExplanation;
use Discordier\JustTextWidgetsBundle\Widgets\JustASmallText;
use Discordier\JustTextWidgetsBundle\Widgets\JustAText;
use Discordier\JustTextWidgetsBundle\Widgets\JustATextOption;

// Form fields
$GLOBALS['BE_FFL']['justtext']            = JustAText::class;
$GLOBALS['BE_FFL']['justtextoption']      = JustATextOption::class;
$GLOBALS['BE_FFL']['justexplanation']     = JustAnExplanation::class;
$GLOBALS['BE_FFL']['justsmalltext']       = JustASmallText::class;
$GLOBALS['BE_FFL']['justlongexplanation'] = JustALongExplanation::class;
