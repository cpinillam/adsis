class Gauge {

    constructor(id, width, indicators, label, colour) {
        this.id = id;
        this.data = {};
        this.label = {};
        this.colour = {};
        this.width = width;

        this.data[0] = indicators[0][0];
        this.data[1] = indicators[0][1];
        this.data[2] = indicators[0][2];
        this.data[3] = indicators[0][3];
        this.data[4] = indicators[0][4];

        this.label[0] = label[0];
        this.label[1] = label[1];
        this.label[2] = label[2];
        this.label[3] = label[3];
        this.label[4] = label[4];

        this.colour[0] = colour[0];
        this.colour[1] = colour[1];
        this.colour[2] = colour[2];
        this.colour[3] = colour[3];
        this.colour[4] = colour[4];


        console.log(this.data);
    }
   
    render5Percentages() {

        var data = [
            { value: this.data[4], label: this.label[4], color: this.colour[4] },
            { value: this.data[3], label: this.label[3], color: this.colour[3] },
            { value: this.data[2], label: this.label[2], color: this.colour[2] },
            { value: this.data[1], label: this.label[1], color: this.colour[1] },
            { value: this.data[0], label: this.label[0], color: this.colour[0] }
        ];
        
        var width = this.width;

        var arcSize = (6 * width / 100);
        var innerRadius = arcSize * 3;

        var svg = d3.select('#result', this.id).append('svg').attr('width', width).attr('height', width);

        var arcs = data.map(function (obj, i) {
            return d3.svg.arc().innerRadius(i * arcSize + innerRadius).outerRadius((i + 1) * arcSize - (width / 100) + innerRadius);
        });
        var arcsGrey = data.map(function (obj, i) {
            return d3.svg.arc().innerRadius(i * arcSize + (innerRadius + ((arcSize / 2) - 2))).outerRadius((i + 1) * arcSize - ((arcSize / 2)) + (innerRadius));
        });

        var pieData = data.map(function (obj, i) {
            return [
                { value: obj.value * 0.75, arc: arcs[i], object: obj },
                { value: (100 - obj.value) * 0.75, arc: arcsGrey[i], object: obj },
                { value: 100 * 0.25, arc: arcs[i], object: obj }];
        });

        var pie = d3.layout.pie().sort(null).value(function (d) {
            return d.value;
        });

        var g = svg.selectAll('g').data(pieData).enter()
            .append('g')
            .attr('transform', 'translate(' + width / 2 + ',' + width / 2 + ') rotate(180)');
        var gText = svg.selectAll('g.textClass').data([{}]).enter()
            .append('g')
            .classed('textClass', true)
            .attr('transform', 'translate(' + width / 2 + ',' + width / 2 + ') rotate(180)');

        g.selectAll('path').data(function (d) {
            return pie(d);
        }).enter().append('path')
            .attr('id', function (d, i) {
                if (i == 1) {
                    return "Text" + d.data.object.label
                }
            })
            .attr('d', function (d) {
                return d.data.arc(d);
            }).attr('fill', function (d, i) {
                return i == 0 ? d.data.object.color : i == 1 ? '#e8e8e8' : 'none';
            });

        svg.selectAll('g').each(function (d, index) {
            var el = d3.select(this);
            var path = el.selectAll('path').each(function (r, i) {
                if (i === 1) {
                    var centroid = r.data.arc.centroid({
                        startAngle: r.startAngle + 0.05,
                        endAngle: r.startAngle + 0.001 + 0.05
                    });
                    var lableObj = r.data.object;
                    g.append('text')
                        .attr('font-size', ((5 * width) / 100))
                        .attr('dominant-baseline', 'central')
                        /*.attr('transform', "translate(" + centroid[0] + "," + (centroid[1] + 10) + ") rotate(" + (180 / Math.PI * r.startAngle + 7) + ")")
                        .attr('alignment-baseline', 'middle')*/
                        .append("textPath")
                        .attr("textLength", function (d, i) {
                            return 0;
                        })
                        .attr("xlink:href", "#Text" + r.data.object.label)
                        .attr("startOffset", '5')
                        .attr("dy", '-3em')
                        .text(lableObj.value  + '%');
                }
                if (i === 0) {
                    var centroidText = r.data.arc.centroid({
                        startAngle: r.startAngle,
                        endAngle: r.startAngle
                    });
                    var lableObj = r.data.object;
                    gText.append('text')
                        .attr('font-size', ((5 * width) / 100))
                        .text(lableObj.label)
                        .attr('transform', "translate(" + (centroidText[0] - ((1.5 * width) / 100)) + "," + (centroidText[1] + ") rotate(" + (180) + ")"))
                        .attr('dominant-baseline', 'central');
                }
            });
        });
    }

    render4Integers() {

        var data = [
            { value: this.data[3], label: this.label[3], color: this.colour[3] },
            { value: this.data[2], label: this.label[2], color: this.colour[2] },
            { value: this.data[1], label: this.label[1], color: this.colour[1] },
            { value: this.data[0], label: this.label[0], color: this.colour[0] }
        ];

        var width = this.width;

        var arcSize = (6 * width / 100);
        var innerRadius = arcSize * 3;

        var svg = d3.select('#result', this.id).append('svg').attr('width', width).attr('height', width);

        var arcs = data.map(function (obj, i) {
            return d3.svg.arc().innerRadius(i * arcSize + innerRadius).outerRadius((i + 1) * arcSize - (width / 100) + innerRadius);
        });
        var arcsGrey = data.map(function (obj, i) {
            return d3.svg.arc().innerRadius(i * arcSize + (innerRadius + ((arcSize / 2) - 2))).outerRadius((i + 1) * arcSize - ((arcSize / 2)) + (innerRadius));
        });

        var pieData = data.map(function (obj, i) {
            return [
                { value: obj.value * 0.75, arc: arcs[i], object: obj },
                { value: (100 - obj.value) * 0.75, arc: arcsGrey[i], object: obj },
                { value: 100 * 0.25, arc: arcs[i], object: obj }];
        });

        var pie = d3.layout.pie().sort(null).value(function (d) {
            return d.value;
        });

        var g = svg.selectAll('g').data(pieData).enter()
            .append('g')
            .attr('transform', 'translate(' + width / 2 + ',' + width / 2 + ') rotate(180)');
        var gText = svg.selectAll('g.textClass').data([{}]).enter()
            .append('g')
            .classed('textClass', true)
            .attr('transform', 'translate(' + width / 2 + ',' + width / 2 + ') rotate(180)');

        g.selectAll('path').data(function (d) {
            return pie(d);
        }).enter().append('path')
            .attr('id', function (d, i) {
                if (i == 1) {
                    return "Text" + d.data.object.label
                }
            })
            .attr('d', function (d) {
                return d.data.arc(d);
            }).attr('fill', function (d, i) {
                return i == 0 ? d.data.object.color : i == 1 ? '#e8e8e8' : 'none';
            });

        svg.selectAll('g').each(function (d, index) {
            var el = d3.select(this);
            var path = el.selectAll('path').each(function (r, i) {
                if (i === 1) {
                    var centroid = r.data.arc.centroid({
                        startAngle: r.startAngle + 0.05,
                        endAngle: r.startAngle + 0.001 + 0.05
                    });
                    var lableObj = r.data.object;
                    g.append('text')
                        .attr('font-size', ((5 * width) / 100))
                        .attr('dominant-baseline', 'central')
                        /*.attr('transform', "translate(" + centroid[0] + "," + (centroid[1] + 10) + ") rotate(" + (180 / Math.PI * r.startAngle + 7) + ")")
                        .attr('alignment-baseline', 'middle')*/
                        .append("textPath")
                        .attr("textLength", function (d, i) {
                            return 0;
                        })
                        .attr("xlink:href", "#Text" + r.data.object.label)
                        .attr("startOffset", '5')
                        .attr("dy", '-3em')
                        .text(lableObj.value/10 + '');
                }
                if (i === 0) {
                    var centroidText = r.data.arc.centroid({
                        startAngle: r.startAngle,
                        endAngle: r.startAngle
                    });
                    var lableObj = r.data.object;
                    gText.append('text')
                        .attr('font-size', ((5 * width) / 100))
                        .text(lableObj.label)
                        .attr('transform', "translate(" + (centroidText[0] - ((1.5 * width) / 100)) + "," + (centroidText[1] + ") rotate(" + (180) + ")"))
                        .attr('dominant-baseline', 'central');
                }
            });
        });
    }

}