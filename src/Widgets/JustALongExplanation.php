<?php

/**
 * This file is part of discordier/justtextwidgets.
 *
 * (c) 2012-2019 CyberSpectrum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    discordier/justtextwidgets
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2012-2019 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace Discordier\JustTextWidgetsBundle\Widgets;

use Contao\Widget;

/**
 * This class renders longtext in the backend.
 *
 * @property ?string $html The HTML code to display
 */
class JustALongExplanation extends Widget
{
    /**
     * The name of the template.
     *
     * @var string
     */
    protected $strTemplate = 'be_widget_long_explanation';

    /**
     * Initialize the object.
     *
     * @param null|array $arrAttributes The initialization values.
     */
    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);
        $this->strClass .= ' explanation';
    }

    /**
     * Generate the label and return it as string.
     */
    public function generateLabel(): string
    {
        return '';
    }

    /**
     * Generate the widget and return it as string.
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function generate(): string
    {
        $GLOBALS['TL_CSS']['just-a-long-explanation'] = 'bundles/discordierjusttextwidgets/css.css';

        return (string) $this->html;
    }
}
