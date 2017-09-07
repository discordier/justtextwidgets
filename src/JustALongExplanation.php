<?php

/**
 * This file is part of discordier/justtextwidgets.
 *
 * (c) 2012-2015 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Andreas Isaak <andy.jared@googlemail.com>
 * @copyright  2012-2017 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace Discordier\JustTextWidgets;

use Contao\Widget;

/**
 * This class renders longtext in the backend.
 *
 * @property string $html The HTML code to display
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
     * @param bool|array $arrAttributes The initialization values.
     */
    public function __construct($arrAttributes = false)
    {
        parent::__construct($arrAttributes);
        $this->strClass .= ' explanation';
    }

    /**
     * Generate the label and return it as string.
     *
     * @return string
     */
    public function generateLabel()
    {
        return '';
    }

    /**
     * Generate the widget and return it as string.
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function generate()
    {
        $GLOBALS['TL_CSS']['just-a-long-explanation'] = 'system/modules/justtextwidgets/html/css.css';

        return $this->html;
    }
}
