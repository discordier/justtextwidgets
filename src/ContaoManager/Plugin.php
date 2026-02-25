<?php

/**
 * This file is part of discordier/justtextwidgets.
 *
 * (c) 2012-2026 CyberSpectrum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    discordier/justtextwidgets
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Ingolf Steinhardt <info@e-spin.de.de>
 * @copyright  2012-2026 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace Discordier\JustTextWidgetsBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Discordier\JustTextWidgetsBundle\DiscordierJustTextWidgetsBundle;

/**
 * Contao Manager plugin.
 *
 * @api
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    #[\Override]
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(DiscordierJustTextWidgetsBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['justtextwidgets'])
        ];
    }
}
