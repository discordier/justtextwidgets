[![Code Quality Diagnostics](https://github.com/discordier/justtextwidgets/actions/workflows/diagnostics.yml/badge.svg?branch=master&event=push)](https://github.com/discordier/justtextwidgets/actions/workflows/diagnostics.yml?query=branch%3Amaster)
[![Latest Version tagged](http://img.shields.io/github/tag/discordier/justtextwidgets.svg)](https://github.com/discordier/justtextwidgets/tags)
[![Latest Version on Packagist](http://img.shields.io/packagist/v/discordier/justtextwidgets.svg)](https://packagist.org/packages/discordier/justtextwidgets)
[![Installations via composer per month](http://img.shields.io/packagist/dm/discordier/justtextwidgets.svg)](https://packagist.org/packages/discordier/justtextwidgets)

# justtextwidgets

Possibility to add hidden fields with text values and explanation texts to the [Contao DCA](https://github.com/contao/contao).

Various input types have been developed for use in the [MultiColumWizard (MCW)](https://github.com/menatwork/contao-multicolumnwizard-bundle).

Examples for the implementation can be found in the project [MetaModels](https://github.com/MetaModels/core). 

There are four different `inputType` which can be used in DCA:

* justtext
* justsmalltext
* justtextoption
* justexplanation
* justlongexplanation

## justtext
With `justtext` is intended for use in MCW and creates a label, text and hidden field - 
label and text can be hidden with the MCW parameters `hideHead` and `hideBody`.
In MetaModels this is used in the table of "input/output combinations".

```
$GLOBALS['TL_DCA']['tl_mytable']['fields']['justtext'] = [
    'label'     => null,
    'exclude'   => true,
    'inputType' => 'justtext',
    'eval'      => ['tl_class' => 'cbx w50']
];
```

## justsmalltext
`justsmalltext` outputs a simple text and a hidden field.

```
$GLOBALS['TL_DCA']['tl_mytable']['fields']['justsmalltext'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_mytable']['justsmalltext'],
    'exclude'   => true,
    'inputType' => 'justsmalltext',
    'eval'      => ['tl_class' => 'cbx w50']
];
```

## justtextoption

With `justtextoption` it is e.g. possible to output a text for each line in the MCW for each column.
In MetaModels this is used in the rendersettings for languages at "JumpTo page".

```
$GLOBALS['TL_DCA']['tl_mytable']['fields']['justtextoption'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_mytable']['justtextoption'],
    'exclude'   => true,
    'inputType' => 'justtextoption',
    'eval'      => [
        'tl_class' => 'cbx w50',
        'options'  => ['foo' => ['value' => 'foovalue'], 'bar' => ['value' => 'barvalue']],
        'default'  => 'barvalue'
    ]
];
```

## justexplanation
With `justexplanation` a simple text can be output via the parameter `content` and the option `xlabel`.

```
$GLOBALS['TL_DCA']['tl_mytable']['fields']['justexplanation'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_mytable']['justexplanation'],
    'exclude'   => true,
    'xlabel'    => [
        ['tl_myothertable', 'myWizard']
    ],
    'inputType' => 'justexplanation',
    'eval'      => ['tl_class' => 'cbx w50', 'content' => 'Hello World!']
];
``` 

## justlongexplanation
With `justlongexplanation` a complex html block can be output via the parameter `html` to show different content in
your input mask.

```
$GLOBALS['TL_DCA']['tl_mytable']['fields']['justlongexplanation'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_mytable']['justlongexplanation'],
    'exclude'   => true,
    'inputType' => 'justlongexplanation',
    'eval'      => [
        'tl_class' => 'clr',
        'html'     => '
<div style="background-color: #cce4ee; margin-top: 1em">
    <p style="padding: 2em 2em 0 2em;"><span style="font-weight: bold; display: block;">This is text, it contains <a href="https://w3c.org">HTML</a> in "just long explanation".</span>
    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
    
    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
    
    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. 
    
    Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. 
    </p>
    <style>
    #chart_div {
      min-height: 40px;
    }
    .spinner {
      width: 40px;
      height: 40px;
      margin: 30px;
      background-color: #333;
    
      border-radius: 100%;  
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }
    @-webkit-keyframes sk-scaleout {
      0% { -webkit-transform: scale(0) }
      100% {
        -webkit-transform: scale(1.0);
        opacity: 0;
      }
    }
    @keyframes sk-scaleout {
      0% { 
        -webkit-transform: scale(0);
        transform: scale(0);
      } 100% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        opacity: 0;
      }
    }
    </style>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load(\'current\', {\'packages\':[\'corechart\']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn(\'string\', \'Topping\');
        data.addColumn(\'number\', \'Slices\');
        data.addRows([
          [\'Mushrooms\', 3],
          [\'Onions\', 1],
          [\'Olives\', 1],
          [\'Zucchini\', 1],
          [\'Pepperoni\', 2]
        ]);

        // Set chart options
        var options = {\'title\':\'How Much Pizza I Ate Last Night\',
                       \'width\':400,
                       \'height\':300,
                       \'backgroundColor\': \'transparent\'
         };

        // Instantiate and draw our chart, passing in some options.
        var target = document.getElementById(\'chart_div\');
        var chart = new google.visualization.PieChart(target);
        target.removeClass(\'spinner\');
        chart.draw(data, options);
      }
    </script>
    <!--Div that will hold the pie chart-->
    <div id="chart_div" class="spinner"></div>
</div>
'
    ],
];
```

