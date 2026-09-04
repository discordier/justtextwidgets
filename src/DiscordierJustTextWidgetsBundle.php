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

namespace Discordier\JustTextWidgetsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * The Bundle class.
 *
 * @api
 *
 * @psalm-suppress DeprecatedInterface Bundle implements the deprecated BundleInterface under
 *     Symfony 8, but there is no drop-in replacement: Symfony\Component\DependencyInjection\
 *     Kernel\AbstractBundle expects the newer loadExtension()/configure() contract rather than the
 *     classic reflection-based Extension auto-discovery, and migrating to it is a real rewrite,
 *     not a one-line fix.
 */
class DiscordierJustTextWidgetsBundle extends Bundle
{
}
