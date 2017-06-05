$(function () {
    var lineLayer, anchorLayer, quad;
    anchorLayer = new Konva.Layer();

    var width = $("#canvas").width();
    var height = window.innerHeight - 5;
    $("#canvas")[0].height = height;

    var lineLayer, anchorLayer, quad;

    function updateLines() {
        var q = quad;
        var quadLine = lineLayer.get('#quadLine')[0];
        quadLine.setPoints([q.start.attrs.x, q.start.attrs.y, q.end.attrs.x, q.end.attrs.y]);
        lineLayer.draw();
    }


    function buildAnchor(x, y) {
        var anchor = new Konva.Circle({
            x: x,
            y: y,
            radius: 20,
            stroke: '#666',
            fill: '#ddd',
            strokeWidth: 2,
            draggable: true
        });
        anchor.on('mouseover', function () {
            document.body.style.cursor = 'pointer';
            this.setStrokeWidth(4);
            anchorLayer.draw();
        });
        anchor.on('mouseout', function () {
            document.body.style.cursor = 'default';
            this.setStrokeWidth(2);
            anchorLayer.draw();
        });
        anchor.on('dragend', function () {
            updateLines();
        });
        anchorLayer.add(anchor);
        return anchor;
    }


    var stage = new Konva.Stage({
        container: 'canvas',
        width: width,
        height: height
    });
    anchorLayer = new Konva.Layer();
    lineLayer = new Konva.Layer();
    var quadLine = new Konva.Line({
        strokeWidth: 2,
        stroke: 'black',
        lineCap: 'round',
        id: 'quadLine',
        opacity: 1,
        points: [0, 0]
    });

    lineLayer.add(quadLine);
    quad = {
        start: buildAnchor(60, 30),
        end: buildAnchor(80, 160)
    };

    anchorLayer.on('beforeDraw', function () {
        updateLines();
    });
    stage.add(lineLayer);
    stage.add(anchorLayer);
    updateLines();
});