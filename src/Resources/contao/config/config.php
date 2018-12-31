<?php

/**
 * This file is part of discordier/justtextwidgets.
 *
 * (c) 2012-2018 CyberSpectrum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    discordier/justtextwidgets
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2018 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0-or-later
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
