<?php

/**
 * @package    JustTextWidgets
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Andreas Isaak <andy.jared@googlemail.com>
 * @copyright  CyberSpectrum
 * @license    LGPL
 * @filesource
 */

/**
 * Display an explanation text in the backend.
 *
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  CyberSpectrum
 * @package    JustTextWidgets
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
            '<span %s>%s%s</label>',
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
