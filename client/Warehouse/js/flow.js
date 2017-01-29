window.flow.setService('Config', {
    states: {
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
    },
    view_manager: {
        nodeSize: 10, // width and height of a single node, in pixel
        nodeStyle: {
            normal: {
                fill: 'white',
                'stroke-opacity': 0.2, // the border
            },
            blocked: {
                fill: 'grey',
                'stroke-opacity': 0.2,
            },
            start: {
                fill: '#0d0',
                'stroke-opacity': 0.2,
            },
            end: {
                fill: '#e40',
                'stroke-opacity': 0.2,
            },
            opened: {
                fill: '#98fb98',
                'stroke-opacity': 0.2,
            },
            closed: {
                fill: '#afeeee',
                'stroke-opacity': 0.2,
            },
            failed: {
                fill: '#ff8888',
                'stroke-opacity': 0.2,
            },
            tested: {
                fill: '#e5e5e5',
                'stroke-opacity': 0.2,
            },
        },
        nodeColorizeEffect: {
            duration: 50,
        },
        nodeZoomEffect: {
            duration: 200,
            transform: 's1.2', // scale by 1.2x
            transformBack: 's1.0',
        },
        pathStyle: {
            stroke: 'yellow',
            'stroke-width': 3,
        },
        supportedOperations: ['opened', 'closed', 'tested'],
    }

});
window.flow.setFactory('ConfigFactory', function (container) {
    return container.get('Config');
});


window.flow.setFactory('ModuleManagerFactory', function (container) {
    let ModuleManager = container.get('ModuleManager');
    return new ModuleManager();

});
window.flow.setService('ModuleManager', function (modules, eventManager) {
});



window.flow.setFactory('ViewManagerFactory', function (container) {
    let ViewManager = container.get('ViewManager');
    return new ViewManager();
});
window.flow.setService('ViewManager', function (container) {
});

window.flow.setService('Application', function (container, events, request, response) {
    this.container = container;
    this.events = events || container.get('EventManager');//.setIdentifiers(['MvcEvent']);
    this.request = request || container.get('Request');
    this.response = response || container.get('Request');

    this.bootstrap = function (listeners) {
        for (let listener of listeners) {
            this.container.get(listener).attach(this.events);
        }

        let event = this.event = window.flow.get('MvcEvent');
        event.setName(event.EVENT_BOOTSTRAP);
        event.setTarget(this);
        event.setRequest(this.request);
        event.setResponse(this.response);

        this.events.triggerEvent(event);

        return this;
    };

    return this;
});
window.flow.setFactory('ApplicationFactory', function (container) {

    let ViewManager = container.get('Application');
    return new ViewManager(container);
});


window.flow.setFactory('EventManager', function (container) {
    this.events = {};

    this.setIdentifiers = function (identifiers) {
        return this;
    };

    this.triggerEvent = function (event) {
        this.triggerListeners(event);
    };

    this.triggerListeners = function (event, callback) {
        let listeners = {};

        if (this.events.hasOwnProperty(event.getName())) {

        }

        let responseCollection = [];
        for (let listener of listeners) {
            let response = listener(event);
            responseCollection.push(response);

            if (callback && callback(response)) {
                // response.
            }
        }
    };
});

window.flow.addInitializer(function (container, service) {

});

window.flow.setFactory('MvcEvent', function () {

    this.EVENT_BOOTSTRAP = 'bootstrap';
    this.setName = function (name) {
        this.name = name;
    };
    this.getName = function () {
        return this.name;
    };
    this.setTarget = function (response) {
        this.name = response;
    };
    this.setApplication = function (response) {
        this.name = response;
    };
    this.setRequest = function (response) {
        this.name = response;
    };
    this.setResponse = function (response) {
        this.name = response;
    };
    this.setRouter = function (router) {
        this.router = router;
    };

});


window.flow.setFactory('RequestFactory', function RequestFactory(container) {
    let Response = container.get('Request');

    return new Response();
});
window.flow.setService('Request', function Response() {

});


window.flow.setFactory('ResponseFactory', function ResponseFactory(container) {
    let Response = container.get('Response');

    return new Response();
});
window.flow.setService('Response', function Response() {

});


window.flow.setFactory('ServiceListener', function () {
    function ServiceListener(config) {
        this.config = config;
    }

    return ServiceListener;

});


// window.flow.setService('ApplicationConfig', configuration);
window.flow.setFactory('StateMachine', function (container) {
    let config = container.get('Config');
    return window.StateMachine.create(config);
});
