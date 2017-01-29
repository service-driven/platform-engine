$(document).ready(function () {

    let listeners = [];
    let application = window.flow.get('Application');
    application.bootstrap(listeners);
});
