/*global $, xChart, d3 */

var data = {
    "xScale": "ordinal",
    "yScale": "linear",
    "main": [
        {
            "className": ".pizza",
            "data": [
                {
                    "x": "Pepperoni",
                    "y": 4
                },
                {
                    "x": "Cheese",
                    "y": 12
                },
                {
                    "x": "BBQ",
                    "y": 8
                },
                {
                    "x": "Vegetable",
                    "y": 6
                }
            ]
        }
    ]
};
$('#basic-bar-chart').css({
    'height': '300px'
});
var basicBarChart = new xChart('bar', data, '#basic-bar-chart');

var tt = document.createElement('div'),
    leftOffset = -($('html').css('padding-left').replace('px', '') + $('body').css('margin-left').replace('px', '')),
    topOffset = -32;
tt.className = 'ex-tooltip';
document.body.appendChild(tt);

var data = {
    "xScale": "time",
    "yScale": "linear",
    "main": [
        {
            "className": ".pizza",
            "data": [
                {
                    "x": "2012-11-05",
                    "y": 6
                },
                {
                    "x": "2012-11-06",
                    "y": 6
                },
                {
                    "x": "2012-11-07",
                    "y": 8
                },
                {
                    "x": "2012-11-08",
                    "y": 3
                },
                {
                    "x": "2012-11-09",
                    "y": 4
                },
                {
                    "x": "2012-11-10",
                    "y": 9
                },
                {
                    "x": "2012-11-11",
                    "y": 6
                }
            ]
        }
    ]
};
var opts = {
    "dataFormatX": function (x) {
        "use strict";
        return d3.time.format('%Y-%m-%d').parse(x);
    },
    "tickFormatX": function (x) {
        "use strict";
        return d3.time.format('%A')(x);
    },
    "mouseover": function (d, i) {
        "use strict";
        var pos = $(this).offset();
        $(tt).text(d3.time.format('%A')(d.x) + ': ' + d.y)
            .css({
                top: topOffset + pos.top,
                left: pos.left + leftOffset
            })
            .show();
    },
    "mouseout": function (x) {
        "use strict";
        $(tt).hide();
    }
};
$('#line-chart').css({
    'height': '300px'
});
var lineChart = new xChart('line-dotted', data, '#line-chart', opts);



$('#dynamic-chart').css({
    'height': '300px'
});
(function () {
    "use strict";

    var data = [{
        "xScale": "ordinal",
        "comp": [],
        "main": [{
            "className": ".main.l1",
            "data": [{
                "y": 15,
                "x": "2012-11-19T00:00:00"
            }, {
                "y": 11,
                "x": "2012-11-20T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-21T00:00:00"
            }, {
                "y": 10,
                "x": "2012-11-22T00:00:00"
            }, {
                "y": 1,
                "x": "2012-11-23T00:00:00"
            }, {
                "y": 6,
                "x": "2012-11-24T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-25T00:00:00"
            }]
        }, {
            "className": ".main.l2",
            "data": [{
                "y": 29,
                "x": "2012-11-19T00:00:00"
            }, {
                "y": 33,
                "x": "2012-11-20T00:00:00"
            }, {
                "y": 13,
                "x": "2012-11-21T00:00:00"
            }, {
                "y": 16,
                "x": "2012-11-22T00:00:00"
            }, {
                "y": 7,
                "x": "2012-11-23T00:00:00"
            }, {
                "y": 18,
                "x": "2012-11-24T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-25T00:00:00"
            }]
        }],
        "type": "line-dotted",
        "yScale": "linear"
    }, {
        "xScale": "ordinal",
        "comp": [],
        "main": [{
            "className": ".main.l1",
            "data": [{
                "y": 12,
                "x": "2012-11-19T00:00:00"
            }, {
                "y": 18,
                "x": "2012-11-20T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-21T00:00:00"
            }, {
                "y": 7,
                "x": "2012-11-22T00:00:00"
            }, {
                "y": 6,
                "x": "2012-11-23T00:00:00"
            }, {
                "y": 12,
                "x": "2012-11-24T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-25T00:00:00"
            }]
        }, {
            "className": ".main.l2",
            "data": [{
                "y": 29,
                "x": "2012-11-19T00:00:00"
            }, {
                "y": 33,
                "x": "2012-11-20T00:00:00"
            }, {
                "y": 13,
                "x": "2012-11-21T00:00:00"
            }, {
                "y": 16,
                "x": "2012-11-22T00:00:00"
            }, {
                "y": 7,
                "x": "2012-11-23T00:00:00"
            }, {
                "y": 18,
                "x": "2012-11-24T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-25T00:00:00"
            }]
        }],
        "type": "cumulative",
        "yScale": "linear"
    }, {
        "xScale": "ordinal",
        "comp": [],
        "main": [{
            "className": ".main.l1",
            "data": [{
                "y": 12,
                "x": "2012-11-19T00:00:00"
            }, {
                "y": 18,
                "x": "2012-11-20T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-21T00:00:00"
            }, {
                "y": 7,
                "x": "2012-11-22T00:00:00"
            }, {
                "y": 6,
                "x": "2012-11-23T00:00:00"
            }, {
                "y": 12,
                "x": "2012-11-24T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-25T00:00:00"
            }]
        }, {
            "className": ".main.l2",
            "data": [{
                "y": 29,
                "x": "2012-11-19T00:00:00"
            }, {
                "y": 33,
                "x": "2012-11-20T00:00:00"
            }, {
                "y": 13,
                "x": "2012-11-21T00:00:00"
            }, {
                "y": 16,
                "x": "2012-11-22T00:00:00"
            }, {
                "y": 7,
                "x": "2012-11-23T00:00:00"
            }, {
                "y": 18,
                "x": "2012-11-24T00:00:00"
            }, {
                "y": 8,
                "x": "2012-11-25T00:00:00"
            }]
        }],
        "type": "bar",
        "yScale": "linear"
    }],
        order = [0, 1, 0, 2],
        i = 0,
        xFormat = d3.time.format('%A'),
        chart = new xChart('line-dotted', data[order[i]], '#dynamic-chart', {
            axisPaddingTop: 5,
            dataFormatX: function (x) {
                return new Date(x);
            },
            tickFormatX: function (x) {
                return xFormat(x);
            },
            timing: 1250
        }),
        rotateTimer,
        toggles = d3.selectAll('.multi button'),
        t = 3500;

    function updateChart(i) {
        var d = data[i];
        chart.setData(d);
        toggles.classed('toggled', function () {
            return (d3.select(this).attr('data-type') === d.type);
        });
        return d;
    }

    toggles.on('click', function (d, i) {
        clearTimeout(rotateTimer);
        updateChart(i);
    });

    function rotateChart() {
        i += 1;
        i = (i >= order.length) ? 0 : i;
        var d = updateChart(order[i]);
        rotateTimer = setTimeout(rotateChart, t);
    }
    rotateTimer = setTimeout(rotateChart, t);
}());