<?php

/**
 * This file is part of discordier/justtextwidgets.
 *
 * (c) 2012-2016 CyberSpectrum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    JustTextWidgets
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Andreas Isaak <andy.jared@googlemail.com>
 * @copyright  2012-2016 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace Discordier\JustTextWidgets;

/**
 * Display an explanation text in the backend.
 */
class JustAnExplanation extends \Widget
{
    /**
     * The name of the template.
     *
     * @var string
     */
    protected $strTemplate = 'be_widget_explanation';

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
        if ($this->strLabel == '') {
            return '';
        }

        return sprintf(
            '<span %s>%s%s</span>',
            (strlen($this->strClass) ? ' class="' . $this->strClass . '"' : ''),
            $this->strLabel,
            ($this->required ? '<span class="mandatory">*</span>' : '')
        );
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
        $GLOBALS['TL_CSS'][] = 'system/modules/justtextwidgets/html/css.css';

        return sprintf('<div>%s</div>', $this->content);
    }
}
