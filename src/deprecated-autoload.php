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

// This hack is to load the "old locations" of the classes.
spl_autoload_register(
    function ($class) {
        static $classes = [
            'Discordier\JustTextWidgets\JustALongExplanation' => JustALongExplanation::class,
            'Discordier\JustTextWidgets\JustAnExplanation'    => JustAnExplanation::class,
            'Discordier\JustTextWidgets\JustASmallText'       => JustASmallText::class,
            'Discordier\JustTextWidgets\JustAText'            => JustAText::class,
            'Discordier\JustTextWidgets\JustATextOption'      => JustATextOption::class,
        ];

        if (isset($classes[$class])) {
            // @codingStandardsIgnoreStart Silencing errors is discouraged
            @trigger_error('Class "' . $class . '" has been renamed to "' . $classes[$class] . '"', E_USER_DEPRECATED);
            // @codingStandardsIgnoreEnd

            if (!class_exists($classes[$class])) {
                spl_autoload_call($class);
            }

            class_alias($classes[$class], $class);
        }
    }
);
