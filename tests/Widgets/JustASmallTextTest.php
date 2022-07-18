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
use Discordier\JustTextWidgetsBundle\Widgets\JustASmallText;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/** @covers \Discordier\JustTextWidgetsBundle\Widgets\JustASmallText */
class JustASmallTextTest extends TestCase
{
    public function generateProvider(): iterable
    {
        yield [
            'expected' => '<input type="hidden" id="ctrl_" name="" value="" /><div></div>',
            'attributes' => null,
        ];
        yield [
            'expected' => '<input type="hidden" id="ctrl_id_value" name="name_value" value="Text content value" />' .
                '<div style="display: block"></div>',
            'attributes' => [
                'id' => 'id_value',
                'name' => 'name_value',
                'value' => 'Text content value',
                'style' => 'display: block',
            ],
        ];
        yield [
            'expected' => '<input type="hidden" id="ctrl_id_value" name="name_value" value="This is the label" />' .
                '<div style="display: block">This is the label</div>',
            'attributes' => [
                'id' => 'id_value',
                'name' => 'name_value',
                'value' => 'Text content value',
                'label' => 'This is the label',
                'style' => 'display: block',
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
    private function buildWidget(?array $attributes): JustASmallText
    {
        // 4.9 causes Undefined index issues.
        if (InstalledVersions::satisfies(new VersionParser(), 'contao/core-bundle', '4.9.*')) {
            return @new JustASmallText($attributes);
        }
        return new JustASmallText($attributes);
    }
}
