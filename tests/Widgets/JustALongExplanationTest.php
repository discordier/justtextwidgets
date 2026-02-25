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

use Contao\Config;
use Contao\System;
use Discordier\JustTextWidgetsBundle\Widgets\JustALongExplanation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

#[CoversClass(JustALongExplanation::class)]
class JustALongExplanationTest extends TestCase
{
    public static function generateProvider(): iterable
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
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @SuppressWarnings(PHPMD.ErrorControlOperator)
     */
    #[DataProvider('generateProvider')]
    public function testGeneratesCorrectCode(string $expected, ?array $attributes): void
    {
        System::setContainer($this->mockContainer());

        self::assertSame($expected, $this->buildWidget($attributes)->generate());
    }

    private function mockContainer(): ContainerInterface
    {
        $container = $this->getMockBuilder(ContainerInterface::class)->getMock();

        $container->expects($this->once())->method('has')->with(Config::class)->willReturn(true);

        return $container;
    }

    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @SuppressWarnings(PHPMD.ErrorControlOperator)
     */
    private function buildWidget(?array $attributes): JustALongExplanation
    {
        return new JustALongExplanation($attributes);
    }
}
