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
 * @package    JustTextWidgets
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2018 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace Discordier\JustTextWidgetsBundle\Test;

use Discordier\JustTextWidgetsBundle\Widgets\JustALongExplanation;
use Discordier\JustTextWidgetsBundle\Widgets\JustAnExplanation;
use Discordier\JustTextWidgetsBundle\Widgets\JustASmallText;
use Discordier\JustTextWidgetsBundle\Widgets\JustAText;
use Discordier\JustTextWidgetsBundle\Widgets\JustATextOption;
use PHPUnit\Framework\TestCase;

/**
 * This class tests if the deprecated autoloader works.
 *
 * @package MetaModels\AttributeSelectBundle\Test
 */
class DeprecatedAutoloaderTest extends TestCase
{
    /**
     * Selectes of old classes to the new one.
     *
     * @var array
     */
    private static $classes = [
        'Discordier\JustTextWidgets\JustALongExplanation' => JustALongExplanation::class,
        'Discordier\JustTextWidgets\JustAnExplanation'    => JustAnExplanation::class,
        'Discordier\JustTextWidgets\JustASmallText'       => JustASmallText::class,
        'Discordier\JustTextWidgets\JustAText'            => JustAText::class,
        'Discordier\JustTextWidgets\JustATextOption'      => JustATextOption::class,
    ];

    /**
     * Provide the alias class map.
     *
     * @return array
     */
    public function provideAliasClassMap()
    {
        $values = [];

        foreach (static::$classes as $select => $class) {
            $values[] = [$select, $class];
        }

        return $values;
    }

    /**
     * Test if the deprecated classes are aliased to the new one.
     *
     * @param string $oldClass Old class name.
     * @param string $newClass New class name.
     *
     * @dataProvider provideAliasClassMap
     */
    public function testDeprecatedClassesAreAliased($oldClass, $newClass)
    {
        $this->assertTrue(class_exists($oldClass), sprintf('Class select "%s" is not found.', $oldClass));

        $oldClassReflection = new \ReflectionClass($oldClass);
        $newClassReflection = new \ReflectionClass($newClass);

        $this->assertSame($newClassReflection->getFileName(), $oldClassReflection->getFileName());
    }
}
