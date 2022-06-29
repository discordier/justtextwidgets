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
use Discordier\JustTextWidgetsBundle\Widgets\JustATextOption;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/** @covers \Discordier\JustTextWidgetsBundle\Widgets\JustATextOption */
class JustATextOptionTest extends TestCase
{
    public function generateProvider(): iterable
    {
        yield [
            'expected' => '',
            'attributes' => null,
        ];
        yield [
            'expected' => '<input type="hidden" id="ctrl_id_value" name="name_value" value="Text content value" />' .
                '<span>Text content value</span>',
            'attributes' => [
                'id' => 'id_value',
                'name' => 'name_value',
                'options' => [
                    [
                        'label' => 'Text content value',
                        'value' => 'Text content value',
                    ]
                ],
                'value' => 'Text content value'
            ],
        ];
    }

    /**
     * @dataProvider generateProvider
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function testGeneratesCorrectCode(string $expected, ?array $attributes): void
    {
        System::setContainer($this->mockContainer());

        $widget = new JustATextOption($attributes);

        self::assertSame($expected, $widget->generate());
    }

    private function mockContainer(): ContainerInterface
    {
        $container = $this->getMockForAbstractClass(ContainerInterface::class);

        $container->expects(self::once())->method('has')->with(Config::class)->willReturn(true);

        return $container;
    }
}
