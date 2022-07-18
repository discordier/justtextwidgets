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

namespace Discordier\JustTextWidgetsBundle\Test\Widgets;

use Composer\InstalledVersions;
use Composer\Semver\VersionParser;
use Contao\Config;
use Contao\System;
use Discordier\JustTextWidgetsBundle\Widgets\JustALongExplanation;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/** @covers \Discordier\JustTextWidgetsBundle\Widgets\JustALongExplanation */
class JustALongExplanationTest extends TestCase
{
    public function generateProvider(): iterable
    {
        yield [
            'expected' => '',
            'attributes' => null,
        ];
        yield [
            'expected' => '<span>Text content value</span>',
            'attributes' => [
                'html' => '<span>Text content value</span>'
            ],
        ];
        yield [
            'expected' => '<span class="class1 class2" style="color: #000;">Text content value</span>',
            'attributes' => [
                'html' => '<span class="class1 class2" style="color: #000;">Text content value</span>',
            ],
        ];
    }

    /**
     * @dataProvider generateProvider
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @SuppressWarnings(PHPMD.ErrorControlOperator)
     */
    public function testGeneratesCorrectCode(string $expected, ?array $attributes): void
    {
        System::setContainer($this->mockContainer());

        self::assertSame($expected, $this->buildWidget($attributes)->generate());
    }

    private function mockContainer(): ContainerInterface
    {
        $container = $this->getMockForAbstractClass(ContainerInterface::class);

        $container->expects(self::once())->method('has')->with(Config::class)->willReturn(true);

        return $container;
    }

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @SuppressWarnings(PHPMD.ErrorControlOperator)
     */
    private function buildWidget(?array $attributes): JustALongExplanation
    {
        // 4.9 causes Undefined index issues.
        if (InstalledVersions::satisfies(new VersionParser(), 'contao/core-bundle', '4.9.*')) {
            return @new JustALongExplanation($attributes);
        }
        return new JustALongExplanation($attributes);
    }
}
