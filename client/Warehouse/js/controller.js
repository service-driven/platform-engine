/**
 * The visualization controller will works as a state machine.
 * See files under the `doc` folder for transition descriptions.
 * See https://github.com/jakesgordon/javascript-state-machine
 * for the document of the StateMachine module.
 */
var Controller = StateMachine.create({
    initial: 'none',
    events: [
        {
            name: 'init',
            from: 'none',
            to: 'ready'
        },
        {
            name: 'search',
            from: 'starting',
            to: 'searching'
        },
        {
            name: 'pause',
            from: 'searching',
            to: 'paused'
        },
        {
            name: 'finish',
            from: 'searching',
            to: 'finished'
        },
        {
            name: 'resume',
            from: 'paused',
            to: 'searching'
        },
        {
            name: 'cancel',
            from: 'paused',
            to: 'ready'
        },
        {
            name: 'modify',
            from: 'finished',
            to: 'modified'
        },
        {
            name: 'reset',
            from: '*',
            to: 'ready'
        },
        {
            name: 'clear',
            from: ['finished', 'modified'],
            to: 'ready'
        },
        {
            name: 'start',
            from: ['ready', 'modified', 'restarting'],
            to: 'starting'
        },
        {
            name: 'restart',
            from: ['searching', 'finished'],
            to: 'restarting'
        },
        {
            name: 'dragStart',
            from: ['ready', 'finished'],
            to: 'draggingStart'
        },
        {
            name: 'dragEnd',
            from: ['ready', 'finished'],
            to: 'draggingEnd'
        },
        {
            name: 'drawWall',
            from: ['ready', 'finished'],
            to: 'drawingWall'
        },
        {
            name: 'eraseWall',
            from: ['ready', 'finished'],
            to: 'erasingWall'
        },
        {
            name: 'rest',
            from: ['draggingStart', 'draggingEnd', 'drawingWall', 'erasingWall'],
            to: 'ready'
        }
    ]
});

$.extend(Controller, {
    gridSize: [100, 50], // number of nodes horizontally and vertically
    operationsPerSecond: 300,

    /**
     * Asynchronous transition from `none` state to `ready` state.
     */
    onleavenone: function () {
        let numCols = this.gridSize[0],
            numRows = this.gridSize[1];

        this.grid = new PF.Grid(numCols, numRows);

        View.init({
            numCols: numCols,
            numRows: numRows
        });
        View.generateGrid(function () {
            Controller.setDefaultStartEndPos();
            Controller.bindEvents();
            Controller.transition(); // transit to the next state (ready)
        });

        this.$buttons = $('.control_button');

        this.hookPathFinding();

        return StateMachine.ASYNC;
        // => ready
    },
    ondrawWall: function (event, from, to, gridX, gridY) {
        this.setWalkableAt(gridX, gridY, false);
        // => drawingWall
    },
    oneraseWall: function (event, from, to, gridX, gridY) {
        this.setWalkableAt(gridX, gridY, true);
        // => erasingWall
    },
    onsearch: function (event, from, to) {
        var grid,
            timeStart, timeEnd,
            finder = Panel.getFinder();

        timeStart = window.performance ? performance.now() : Date.now();
        grid = this.grid.clone();

        this.paths = [
            finder.findPath(this.startX, this.startY, this.endX, this.endY, grid)
        ];
        this.operationCount = this.operations.length;
        timeEnd = window.performance ? performance.now() : Date.now();
        this.timeSpent = (timeEnd - timeStart).toFixed(4);

        this.loop();
        // => searching
    },
    onrestart: function () {
        // When clearing the colorized nodes, there may be
        // nodes still animating, which is an asynchronous procedure.
        // Therefore, we have to defer the `abort` routine to make sure
        // that all the animations are done by the time we clear the colors.
        // The same reason applies for the `onreset` event handler.
        setTimeout(function () {
            Controller.clearOperations();
            Controller.clearFootprints();
            Controller.start();
        }, View.nodeColorizeEffect.duration * 1.2);
        // => restarting
    },
    onpause: function (event, from, to) {
        // => paused
    },
    onresume: function (event, from, to) {
        this.loop();
        // => searching
    },
    oncancel: function (event, from, to) {
        this.clearOperations();
        this.clearFootprints();
        // => ready
    },
    onfinish: function (event, from, to) {
        for (var pathIndex in this.paths) {
            if (this.paths.hasOwnProperty(pathIndex)) {
                var path = this.paths[pathIndex];

                View.showStats({
                    pathLength: PF.Util.pathLength(path),
                    timeSpent: this.timeSpent,
                    operationCount: this.operationCount
                });
                View.drawPath(path);
            }
        }
    },
    onclear: function (event, from, to) {
        this.clearOperations();
        this.clearFootprints();
        // => ready
    },
    onmodify: function (event, from, to) {
        // => modified
    },
    onreset: function (event, from, to) {
        setTimeout(function () {
            Controller.clearOperations();
            Controller.clearAll();
            Controller.buildNewGrid();
        }, View.nodeColorizeEffect.duration * 1.2);
        // => ready
    },

    /**
     * The following functions are called on entering states.
     */

    onready: function () {
        console.log('=> ready');

        this.setButtonStates({
            id: 1,
            text: 'Start Search',
            enabled: true,
            callback: $.proxy(this.start, this)
        }, {
            id: 2,
            text: 'Pause Search',
            enabled: false
        }, {
            id: 3,
            text: 'Clear Walls',
            enabled: true,
            callback: $.proxy(this.reset, this)
        });
        this.storages = [];
    },

    onstarting: function (event, from, to) {
        console.log('=> starting');

        this.clearFootprints();
        this.setButtonStates({
            id: 2,
            enabled: true
        });
        this.search();
    },

    onsearching: function () {
        console.log('=> searching');

        this.setButtonStates({
            id: 1,
            text: 'Restart Search',
            enabled: true,
            callback: $.proxy(this.restart, this)
        }, {
            id: 2,
            text: 'Pause Search',
            enabled: true,
            callback: $.proxy(this.pause, this)
        });
    },

    onpaused: function () {
        console.log('=> paused');

        this.setButtonStates({
            id: 1,
            text: 'Resume Search',
            enabled: true,
            callback: $.proxy(this.resume, this)
        }, {
            id: 2,
            text: 'Cancel Search',
            enabled: true,
            callback: $.proxy(this.cancel, this)
        });
        // => [searching, ready]
    },
    onfinished: function () {
        console.log('=> finished');

        this.setButtonStates({
            id: 1,
            text: 'Restart Search',
            enabled: true,
            callback: $.proxy(this.restart, this)
        }, {
            id: 2,
            text: 'Clear Path',
            enabled: true,
            callback: $.proxy(this.clear, this)
        });
    },
    onmodified: function () {
        console.log('=> modified');

        this.setButtonStates({
            id: 1,
            text: 'Start Search',
            enabled: true,
            callback: $.proxy(this.start, this)
        }, {
            id: 2,
            text: 'Clear Path',
            enabled: true,
            callback: $.proxy(this.clear, this)
        });
    },

    /**
     * Define setters and getters of PF.Node, then we can get the operations
     * of the pathfinding.
     */
    hookPathFinding: function () {

        PF.Node.prototype = {
            get opened() {
                return this._opened;
            },
            set opened(v) {
                this._opened = v;
                Controller.operations.push({
                    x: this.x,
                    y: this.y,
                    attr: 'opened',
                    value: v
                });
            },
            get closed() {
                return this._closed;
            },
            set closed(v) {
                this._closed = v;
                Controller.operations.push({
                    x: this.x,
                    y: this.y,
                    attr: 'closed',
                    value: v
                });
            },
            get tested() {
                return this._tested;
            },
            set tested(v) {
                this._tested = v;
                Controller.operations.push({
                    x: this.x,
                    y: this.y,
                    attr: 'tested',
                    value: v
                });
            }
        };

        this.operations = [];
    },
    bindEvents: function () {
        $('#draw_area').mousedown($.proxy(this.mousedown, this));
        $(window)
            .mousemove($.proxy(this.mousemove, this))
            .mouseup($.proxy(this.mouseup, this));
    },
    loop: function () {
        var interval = 1000 / this.operationsPerSecond;
        (function loop() {
            if (!Controller.is('searching')) {
                return;
            }
            Controller.step();
            setTimeout(loop, interval);
        })();
    },
    step: function () {
        var operations = this.operations,
            op, isSupported;

        do {
            if (!operations.length) {
                this.finish(); // transit to `finished` state
                return;
            }
            op = operations.shift();
            isSupported = View.supportedOperations.indexOf(op.attr) !== -1;
        } while (!isSupported);

        View.setAttributeAt(op.x, op.y, op.attr, op.value);
    },
    clearOperations: function () {
        this.operations = [];
    },
    clearFootprints: function () {
        View.clearFootprints();
        View.clearPath();
    },
    clearAll: function () {
        this.clearFootprints();
        View.clearBlockedNodes();
    },
    buildNewGrid: function () {
        this.grid = new PF.Grid(this.gridSize[0], this.gridSize[1]);
    },
    mousedown: function (event) {
        var coord = View.toGridCoordinate(event.pageX, event.pageY),
            gridX = coord[0],
            gridY = coord[1],
            grid = this.grid;

        if (this.can('dragStart') && this.isStartPos(gridX, gridY)) {
            this.dragStart();
            return;
        }
        if (this.can('dragEnd') && this.isEndPos(gridX, gridY)) {
            this.dragEnd();
            return;
        }
        if (this.can('drawWall') && grid.isWalkableAt(gridX, gridY)) {
            this.drawWall(gridX, gridY);
            return;
        }
        if (this.can('eraseWall') && !grid.isWalkableAt(gridX, gridY)) {
            this.eraseWall(gridX, gridY);
        }
    },
    mousemove: function (event) {
        var coord = View.toGridCoordinate(event.pageX, event.pageY),
            grid = this.grid,
            gridX = coord[0],
            gridY = coord[1];

        if (this.isStartOrEndPos(gridX, gridY)) {
            return;
        }

        switch (this.current) {
            case 'draggingStart':
                if (grid.isWalkableAt(gridX, gridY)) {
                    this.setStartPos(gridX, gridY);
                }
                break;
            case 'draggingEnd':
                if (grid.isWalkableAt(gridX, gridY)) {
                    this.setEndPos(gridX, gridY);
                }
                break;
            case 'drawingWall':
                this.setWalkableAt(gridX, gridY, false);
                break;
            case 'erasingWall':
                this.setWalkableAt(gridX, gridY, true);
                break;
        }
    },
    mouseup: function (event) {
        if (Controller.can('rest')) {
            Controller.rest();
        }
    },
    setButtonStates: function () {
        $.each(arguments, function (i, opt) {
            var $button = Controller.$buttons.eq(opt.id - 1);
            if (opt.text) {
                $button.text(opt.text);
            }
            if (opt.callback) {
                $button
                    .unbind('click')
                    .click(opt.callback);
            }
            if (opt.enabled === undefined) {
                return;
            } else if (opt.enabled) {
                $button.removeAttr('disabled');
            } else {
                $button.attr({disabled: 'disabled'});
            }
        });
    },

    addRack: function (startX, startY, width) {
        width = width || 3;

        var endX = startX + width;
        var endY = startY + 20;

        for (var x = startX; x < endX; x++) {
            for (var y = startY; y < endY; y++) {
                this.setWalkableAt(x, y, false);
            }
        }
    },

    addStorage: function (gridX, gridY) {
        this.storages.push([gridX, gridY]);

        View.setAttributeAt(gridX, gridY, 'walkable', true);
    },

    getStorages: function () {
        return this.storages;
    },

    /**
     * When initializing, this method will be called to set the positions
     * of start node and end node.
     * It will detect user's display size, and compute the best positions.
     */
    setDefaultStartEndPos: function () {
        var width, height,
            marginRight, availWidth,
            centerX, centerY,
            nodeSize = View.nodeSize;

        width = $(window).width();
        height = $(window).height();

        marginRight = $('#algorithm_panel').width();
        availWidth = width - marginRight;

        centerX = Math.ceil(availWidth / 2 / nodeSize);
        centerY = Math.floor(height / 2 / nodeSize);

        this.setStartPos(0, 0);
        this.setEndPos(1, 1);

        let rackMargin = 2;

        for (let i = 0; i < 10; i++) {

        }

        this.setWalkablesBetween([2, 2], [5, 30]);
        this.setWalkablesBetween([7, 2], [10, 30]);
        this.setWalkablesBetween([12, 2], [15, 30]);
        this.setWalkablesBetween([17, 2], [20, 30]);
        this.setWalkablesBetween([22, 2], [25, 30]);
        this.setWalkablesBetween([27, 2], [30, 30]);
        this.setWalkablesBetween([32, 2], [35, 30]);
        this.setWalkablesBetween([37, 2], [40, 30]);

    },
    setStartPos: function (gridX, gridY) {
        this.startX = gridX;
        this.startY = gridY;

        View.setStartPos(gridX, gridY);
    },
    setEndPos: function (gridX, gridY) {
        this.endX = gridX;
        this.endY = gridY;

        View.setEndPos(gridX, gridY);
    },
    setWalkableAt: function (gridX, gridY, walkable) {
        this.grid.setWalkableAt(gridX, gridY, walkable);

        View.setAttributeAt(gridX, gridY, 'walkable', walkable);
    },

    setWalkablesBetween: function (sourceCoordinates, targetCoordinates) {
        sourceCoordinates = !Array.isArray(sourceCoordinates) ? [sourceCoordinates, sourceCoordinates] : sourceCoordinates;
        targetCoordinates = !Array.isArray(targetCoordinates) ? [targetCoordinates, targetCoordinates] : targetCoordinates;

        for (let xCoordinate = sourceCoordinates[0]; xCoordinate < targetCoordinates[0]; xCoordinate++) {
            for (let yCoordinate = sourceCoordinates[1]; yCoordinate < targetCoordinates[1]; yCoordinate++) {

                if ((xCoordinate === sourceCoordinates[0] || xCoordinate === targetCoordinates[0] - 1)) {
                    View.addStoragePos(xCoordinate, yCoordinate);
                } else {
                    this.setWalkableAt(xCoordinate, yCoordinate, false);
                }

            }
        }
    },

    isStartPos: function (gridX, gridY) {
        return gridX === this.startX && gridY === this.startY;
    },
    isEndPos: function (gridX, gridY) {
        return gridX === this.endX && gridY === this.endY;
    },
    isStartOrEndPos: function (gridX, gridY) {
        return this.isStartPos(gridX, gridY) || this.isEndPos(gridX, gridY);
    }
});
