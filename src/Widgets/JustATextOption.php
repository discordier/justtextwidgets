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
 * @author     Andreas Isaak <andy.jared@googlemail.com>
 * @copyright  2012-2018 CyberSpectrum
 * @license    https://github.com/discordier/justtextwidgets/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace Discordier\JustTextWidgetsBundle\Widgets;

use Contao\StringUtil;
use Contao\Widget;

/**
 * Display a hidden field with a fixed value in the backend and the option name next to it.
 * This is useful when you need predefined values in a MultiColumnWizard i.e.
 *
 * @psalm-type TOptionValue=array{value?: string, label: string}
 */
class JustATextOption extends Widget
{
    /**
     * The name of the template.
     *
     * @var string
     */
    protected $strTemplate = 'be_widget';

    /**
     * Add specific attributes.
     *
     * @param string $strKey   The name of the key to set.
     * @param mixed  $varValue The value to use.
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __set($strKey, $varValue): void
    {
        if ($strKey === 'options') {
            /** @psalm-suppress MixedAssignment */
            $this->arrOptions = StringUtil::deserialize($varValue, true);

            return;
        }
        parent::__set($strKey, $varValue);
    }

    /**
     * Generate the widget and return it as string.
     */
    public function generate(): string
    {
        // Add empty option (XHTML) if there are none
        if (empty($this->arrOptions)) {
            $this->arrOptions = [
                [
                    'value'   => '',
                    'label'   => '-',
                    'default' => false,
                ]
            ];
        }

        /** @psalm-suppress RedundantCastGivenDocblockType - Contao does not ensure we get a string here, can be null */
        $strClass = ('' !== (string) $this->strClass ? ' class="' . $this->strClass . '"' : '');
        if ('' !== ($strStyle = (string) ($this->arrAttributes['style'] ?? ''))) {
            $strStyle = ' style="' . $strStyle . '"';
        }

        /** @psalm-suppress ArgumentTypeCoercion - Contao does not denote the correct types. */
        return $this->checkOptGroup($this->arrOptions, $strClass, $strStyle);
    }

    /**
     * Scan an option group for the selected option.
     *
     * @param list<TOptionValue|list<TOptionValue>> $options The option array.
     * @param string                                $class   The html class to use.
     * @param string                                $style   The html style to use.
     *
     * @return string
     */
    private function checkOptGroup(array $options, string $class, string $style): string
    {
        foreach ($options as $option) {
            // If it is an option group, handle it.
            if (!isset($option['value'])) {
                /** @psalm-suppress ArgumentTypeCoercion - Must be a valid array here. */
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
                    StringUtil::specialchars($option['value']),
                    $class . $style,
                    $option['label'] ?? ''
                );
            }
        }

        return '';
    }
}
