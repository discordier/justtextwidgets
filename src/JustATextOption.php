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
 * Display a hidden field with a fixed value in the backend and the option name next to it.
 * This is useful when you need predefined values in a MultiColumnWizard i.e.
 */
class JustATextOption extends \Widget
{
    /**
     * The name of the template.
     *
     * @var string
     */
    protected $strTemplate = 'be_widget';

    /**
     * The options.
     *
     * @var array
     */
    protected $arrOptions = array();

    /**
     * Add specific attributes.
     *
     * @param string $strKey   The name of the key to set.
     *
     * @param mixed  $varValue The value to use.
     *
     * @return void
     */
    public function __set($strKey, $varValue)
    {
        switch ($strKey) {
            case 'options':
                $this->arrOptions = deserialize($varValue);
                break;

            default:
                parent::__set($strKey, $varValue);
                break;
        }
    }

    /**
     * Generate the widget and return it as string.
     *
     * @return string
     */
    public function generate()
    {
        // Add empty option (XHTML) if there are none
        if (empty($this->arrOptions)) {
            $this->arrOptions = array(
                array(
                    'value' => '',
                    'label' => '-'
                )
            );
        }

        $strClass = (strlen($this->strClass) ? ' class="' . $this->strClass . '"' : '');
        $strStyle = (strlen($this->arrAttributes['style']) ? ' style="' . $this->arrAttributes['style'] . '"' : '');

        return $this->checkOptGroup($this->arrOptions, $strClass, $strStyle);
    }

    /**
     * Scan an option group for the selected option.
     *
     * @param array  $options The option array.
     *
     * @param string $class   The html class to use.
     *
     * @param string $style   The html style to use.
     *
     * @return null|string
     */
    private function checkOptGroup($options, $class, $style)
    {
        foreach ($options as $option) {
            // If it is an option group, handle it.
            if (!isset($option['value'])) {
                $result = $this->checkOptGroup($option, $class, $style);
                if ($result) {
                    return $result;
                }

                continue;
            }

            // No option group, check if it is selected.
            if ($this->isSelected($option)) {
                return sprintf(
                    '<input type="hidden" id="ctrl_%s" name="%s" value="%s" /><span%s>%s</span>',
                    $this->strId,
                    $this->strName,
                    specialchars($option['value']),
                    $class . $style,
                    $option['label']
                );
            }
        }

        return null;
    }
}
