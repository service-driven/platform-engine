'use strict';

angular
    .module('app')
    .run([
        '$rootScope', '$state', '$stateParams',
        function ($rootScope, $state, $stateParams) {
            $rootScope.$state = $state;
            $rootScope.$stateParams = $stateParams;
        }
    ])
    .config(
        ['$stateProvider', '$urlRouterProvider', 'JQ_CONFIG', 'MODULE_CONFIG',
            function ($stateProvider, $urlRouterProvider, JQ_CONFIG, MODULE_CONFIG) {
                var layout = "application/tpl/blocks/material.layout.html";
                $urlRouterProvider.otherwise('/app/dashboard');

                $stateProvider
                    .state('app', {
                        abstract: true,
                        url: '/app',
                        templateUrl: 'application/tpl/blocks/material.layout.html'
                    })
                    .state('app.dashboard', {
                        url: '/dashboard',
                        templateUrl: 'application/tpl/app_dashboard.html',
                        resolve: load(['application/js/controllers/chart.js'])
                    })

                    .state('app.goals', {
                        url: '/goals',
                        templateUrl: 'application/view/visions/goals/index.html'
                    })
                    .state('app.strategies', {
                        url: '/strategies',
                        templateUrl: 'application/view/visions/strategies/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load([
                            'xeditable',
                            'application/js/controllers/xeditable.js'
                        ])
                    })
                    .state('app.issues', {
                        url: '/issues',
                        templateUrl: 'application/view/visions/issues/index.html'
                    })

                    .state('app.edges', {
                        url: '/edges',
                        templateUrl: 'application/view/connections/edges/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load([
                            'xeditable',
                            'application/js/controllers/xeditable.js'
                        ])
                    })
                    .state('app.nodes', {
                        url: '/nodes',
                        templateUrl: 'application/view/connections/nodes/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                    })
                    .state('app.people', {
                        url: '/people',
                        templateUrl: 'application/view/connections/people/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                    })

                    .state('app.data', {
                        url: '/data',
                        templateUrl: 'application/view/data/data/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                    })
                    .state('app.competitors', {
                        url: '/competitors',
                        templateUrl: 'application/view/data/competitors/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                    })
                    .state('app.reports', {
                        url: '/reports',
                        templateUrl: 'application/view/data/reports/index.html',
                        controller: 'XeditableCtrl',
                        resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                    })
                    .state('app.administration', {
                        url: '/administration',
                        template: '<div ui-view class="wrapper-md"></div>',
                        resolve: load(['application/js/controllers/material.js'])
                    })
                    .state('app.administration.importers', {
                        url: '/importers',
                        templateUrl: 'application/view/administration/importers/index.html'
                    })

                    .state('app.user', {
                        url: '/user',
                        template: '<div ui-view class="fade-in-down"></div>'
                    })
                    .state('app.user.profile', {
                        url: '/profile',
                        templateUrl: 'application/view/user/profile/index.html'
                    })

                //.state('app.ui', {
                //    url: '/ui',
                //    template: '<div ui-view class="fade-in-up"></div>'
                //})
                //.state('app.ui.buttons', {
                //    url: '/buttons',
                //    templateUrl: 'application/tpl/ui_buttons.html'
                //})
                //.state('app.ui.icons', {
                //    url: '/icons',
                //    templateUrl: 'application/tpl/ui_icons.html'
                //})
                //.state('app.ui.grid', {
                //    url: '/grid',
                //    templateUrl: 'application/tpl/ui_grid.html'
                //})
                //.state('app.ui.widgets', {
                //    url: '/widgets',
                //    templateUrl: 'application/tpl/ui_widgets.html'
                //})
                //.state('app.ui.bootstrap', {
                //    url: '/bootstrap',
                //    templateUrl: 'application/tpl/ui_bootstrap.html'
                //})
                //.state('app.ui.sortable', {
                //    url: '/sortable',
                //    templateUrl: 'application/tpl/ui_sortable.html'
                //})
                //.state('app.ui.scroll', {
                //    url: '/scroll',
                //    templateUrl: 'application/tpl/ui_scroll.html',
                //    resolve: load('application/js/controllers/scroll.js')
                //})
                //.state('app.ui.portlet', {
                //    url: '/portlet',
                //    templateUrl: 'application/tpl/ui_portlet.html'
                //})
                //.state('app.ui.timeline', {
                //    url: '/timeline',
                //    templateUrl: 'application/tpl/ui_timeline.html'
                //})
                //.state('app.ui.tree', {
                //    url: '/tree',
                //    templateUrl: 'application/tpl/ui_tree.html',
                //    resolve: load(['angularBootstrapNavTree', 'application/js/controllers/tree.js'])
                //})
                //.state('app.ui.toaster', {
                //    url: '/toaster',
                //    templateUrl: 'application/tpl/ui_toaster.html',
                //    resolve: load(['toaster', 'application/js/controllers/toaster.js'])
                //})
                //.state('app.ui.jvectormap', {
                //    url: '/jvectormap',
                //    templateUrl: 'application/tpl/ui_jvectormap.html',
                //    resolve: load('application/js/controllers/vectormap.js')
                //})
                //.state('app.ui.googlemap', {
                //    url: '/googlemap',
                //    templateUrl: 'application/tpl/ui_googlemap.html',
                //    resolve: load(['application/js/app/map/load-google-maps.js', 'application/js/app/map/ui-map.js', 'application/js/app/map/map.js'], function () {
                //        return loadGoogleMaps();
                //    })
                //})
                //.state('app.chart', {
                //    url: '/chart',
                //    templateUrl: 'application/tpl/ui_chart.html',
                //    resolve: load('application/js/controllers/chart.js')
                //})
                //// table
                //.state('app.table', {
                //    url: '/table',
                //    template: '<div ui-view></div>'
                //})
                //.state('app.table.static', {
                //    url: '/static',
                //    templateUrl: 'application/tpl/table_static.html'
                //})
                //.state('app.table.datatable', {
                //    url: '/datatable',
                //    templateUrl: 'application/tpl/table_datatable.html'
                //})
                //.state('app.table.footable', {
                //    url: '/footable',
                //    templateUrl: 'application/tpl/table_footable.html'
                //})
                //.state('app.table.grid', {
                //    url: '/grid',
                //    templateUrl: 'application/tpl/table_grid.html',
                //    resolve: load(['ngGrid', 'application/js/controllers/grid.js'])
                //})
                //.state('app.table.uigrid', {
                //    url: '/uigrid',
                //    templateUrl: 'application/tpl/table_uigrid.html',
                //    resolve: load(['ui.grid', 'application/js/controllers/uigrid.js'])
                //})
                //.state('app.table.editable', {
                //    url: '/editable',
                //    templateUrl: 'application/tpl/table_editable.html',
                //    controller: 'XeditableCtrl',
                //    resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                //})
                //.state('app.table.smart', {
                //    url: '/smart',
                //    templateUrl: 'application/tpl/table_smart.html',
                //    resolve: load(['smart-table', 'application/js/controllers/table.js'])
                //})
                //// form
                //.state('app.form', {
                //    url: '/form',
                //    template: '<div ui-view class="fade-in"></div>',
                //    resolve: load('application/js/controllers/form.js')
                //})
                //.state('app.form.components', {
                //    url: '/components',
                //    templateUrl: 'application/tpl/form_components.html',
                //    resolve: load(['ngBootstrap', 'daterangepicker', 'application/js/controllers/form.components.js'])
                //})
                //.state('app.form.elements', {
                //    url: '/elements',
                //    templateUrl: 'application/tpl/form_elements.html'
                //})
                //.state('app.form.validation', {
                //    url: '/validation',
                //    templateUrl: 'application/tpl/form_validation.html'
                //})
                //.state('app.form.wizard', {
                //    url: '/wizard',
                //    templateUrl: 'application/tpl/form_wizard.html'
                //})
                //.state('app.form.fileupload', {
                //    url: '/fileupload',
                //    templateUrl: 'application/tpl/form_fileupload.html',
                //    resolve: load(['angularFileUpload', 'application/js/controllers/file-upload.js'])
                //})
                //.state('app.form.imagecrop', {
                //    url: '/imagecrop',
                //    templateUrl: 'application/tpl/form_imagecrop.html',
                //    resolve: load(['ngImgCrop', 'application/js/controllers/imgcrop.js'])
                //})
                //.state('app.form.select', {
                //    url: '/select',
                //    templateUrl: 'application/tpl/form_select.html',
                //    controller: 'SelectCtrl',
                //    resolve: load(['ui.select', 'application/js/controllers/select.js'])
                //})
                //.state('app.form.slider', {
                //    url: '/slider',
                //    templateUrl: 'application/tpl/form_slider.html',
                //    controller: 'SliderCtrl',
                //    resolve: load(['vr.directives.slider', 'application/js/controllers/slider.js'])
                //})
                //.state('app.form.editor', {
                //    url: '/editor',
                //    templateUrl: 'application/tpl/form_editor.html',
                //    controller: 'EditorCtrl',
                //    resolve: load(['textAngular', 'application/js/controllers/editor.js'])
                //})
                //.state('app.form.xeditable', {
                //    url: '/xeditable',
                //    templateUrl: 'application/tpl/form_xeditable.html',
                //    controller: 'XeditableCtrl',
                //    resolve: load(['xeditable', 'application/js/controllers/xeditable.js'])
                //})
                //// pages
                //.state('app.page', {
                //    url: '/page',
                //    template: '<div ui-view class="fade-in-down"></div>'
                //})
                //.state('app.page.profile', {
                //    url: '/profile',
                //    templateUrl: 'application/tpl/page_profile.html'
                //})
                //.state('app.page.post', {
                //    url: '/post',
                //    templateUrl: 'application/tpl/page_post.html'
                //})
                //.state('app.page.search', {
                //    url: '/search',
                //    templateUrl: 'application/tpl/page_search.html'
                //})
                //.state('app.page.invoice', {
                //    url: '/invoice',
                //    templateUrl: 'application/tpl/page_invoice.html'
                //})
                //.state('app.page.price', {
                //    url: '/price',
                //    templateUrl: 'application/tpl/page_price.html'
                //})
                //.state('app.docs', {
                //    url: '/docs',
                //    templateUrl: 'application/tpl/docs.html'
                //})
                //// others
                //.state('lockme', {
                //    url: '/lockme',
                //    templateUrl: 'application/tpl/page_lockme.html'
                //})
                //.state('access', {
                //    url: '/access',
                //    template: '<div ui-view class="fade-in-right-big smooth"></div>'
                //})
                //.state('access.signin', {
                //    url: '/signin',
                //    templateUrl: 'application/tpl/page_signin.html',
                //    resolve: load(['application/js/controllers/signin.js'])
                //})
                //.state('access.signup', {
                //    url: '/signup',
                //    templateUrl: 'application/tpl/page_signup.html',
                //    resolve: load(['application/js/controllers/signup.js'])
                //})
                //.state('access.forgotpwd', {
                //    url: '/forgotpwd',
                //    templateUrl: 'application/tpl/page_forgotpwd.html'
                //})
                //.state('access.404', {
                //    url: '/404',
                //    templateUrl: 'application/tpl/page_404.html'
                //})
                //
                //// fullCalendar
                //.state('app.calendar', {
                //    url: '/calendar',
                //    templateUrl: 'application/tpl/app_calendar.html',
                //    // use resolve to load other dependences
                //    resolve: load(['moment', 'fullcalendar', 'ui.calendar', 'application/js/app/calendar/calendar.js'])
                //})
                //
                //// mail
                //.state('app.mail', {
                //    abstract: true,
                //    url: '/mail',
                //    templateUrl: 'application/tpl/mail.html',
                //    // use resolve to load other dependences
                //    resolve: load(['application/js/app/mail/mail.js', 'application/js/app/mail/mail-service.js', 'moment'])
                //})
                //.state('app.mail.list', {
                //    url: '/inbox/{fold}',
                //    templateUrl: 'application/tpl/mail.list.html'
                //})
                //.state('app.mail.detail', {
                //    url: '/{mailId:[0-9]{1,4}}',
                //    templateUrl: 'application/tpl/mail.detail.html'
                //})
                //.state('app.mail.compose', {
                //    url: '/compose',
                //    templateUrl: 'application/tpl/mail.new.html'
                //})
                //
                //.state('layout', {
                //    abstract: true,
                //    url: '/layout',
                //    templateUrl: 'application/tpl/layout.html'
                //})
                //.state('layout.fullwidth', {
                //    url: '/fullwidth',
                //    views: {
                //        '': {
                //            templateUrl: 'application/tpl/layout_fullwidth.html'
                //        },
                //        'footer': {
                //            templateUrl: 'application/tpl/layout_footer_fullwidth.html'
                //        }
                //    },
                //    resolve: load(['application/js/controllers/vectormap.js'])
                //})
                //.state('layout.mobile', {
                //    url: '/mobile',
                //    views: {
                //        '': {
                //            templateUrl: 'application/tpl/layout_mobile.html'
                //        },
                //        'footer': {
                //            templateUrl: 'application/tpl/layout_footer_mobile.html'
                //        }
                //    }
                //})
                //.state('layout.app', {
                //    url: '/app',
                //    views: {
                //        '': {
                //            templateUrl: 'application/tpl/layout_app.html'
                //        },
                //        'footer': {
                //            templateUrl: 'application/tpl/layout_footer_fullwidth.html'
                //        }
                //    },
                //    resolve: load(['application/js/controllers/tab.js'])
                //})
                //.state('apps', {
                //    abstract: true,
                //    url: '/apps',
                //    templateUrl: 'application/tpl/layout.html'
                //})
                //.state('apps.note', {
                //    url: '/note',
                //    templateUrl: 'application/tpl/apps_note.html',
                //    resolve: load(['application/js/app/note/note.js', 'moment'])
                //})
                //.state('apps.contact', {
                //    url: '/contact',
                //    templateUrl: 'application/tpl/apps_contact.html',
                //    resolve: load(['application/js/app/contact/contact.js'])
                //})
                //.state('app.weather', {
                //    url: '/weather',
                //    templateUrl: 'application/tpl/apps_weather.html',
                //    resolve: load(['application/js/app/weather/skycons.js', 'angular-skycons', 'application/js/app/weather/ctrl.js', 'moment'])
                //})
                //.state('app.todo', {
                //    url: '/todo',
                //    templateUrl: 'application/tpl/apps_todo.html',
                //    resolve: load(['application/js/app/todo/todo.js', 'moment'])
                //})
                //.state('app.todo.list', {
                //    url: '/{fold}'
                //})
                //.state('app.note', {
                //    url: '/note',
                //    templateUrl: 'application/tpl/apps_note_material.html',
                //    resolve: load(['application/js/app/note/note.js', 'moment'])
                //})
                //.state('music', {
                //    url: '/music',
                //    templateUrl: 'application/tpl/music.html',
                //    controller: 'MusicCtrl',
                //    resolve: load([
                //        'com.2fdevs.videogular',
                //        'com.2fdevs.videogular.plugins.controls',
                //        'com.2fdevs.videogular.plugins.overlayplay',
                //        'com.2fdevs.videogular.plugins.poster',
                //        'com.2fdevs.videogular.plugins.buffering',
                //        'application/js/app/music/ctrl.js',
                //        'application/js/app/music/theme.css'
                //    ])
                //})
                //.state('music.home', {
                //    url: '/home',
                //    templateUrl: 'application/tpl/music.home.html'
                //})
                //.state('music.genres', {
                //    url: '/genres',
                //    templateUrl: 'application/tpl/music.genres.html'
                //})
                //.state('music.detail', {
                //    url: '/detail',
                //    templateUrl: 'application/tpl/music.detail.html'
                //})
                //.state('music.mtv', {
                //    url: '/mtv',
                //    templateUrl: 'application/tpl/music.mtv.html'
                //})
                //.state('music.mtvdetail', {
                //    url: '/mtvdetail',
                //    templateUrl: 'application/tpl/music.mtv.detail.html'
                //})
                //.state('music.playlist', {
                //    url: '/playlist/{fold}',
                //    templateUrl: 'application/tpl/music.playlist.html'
                //})
                //.state('app.material', {
                //    url: '/material',
                //    template: '<div ui-view class="wrapper-md"></div>',
                //    resolve: load(['application/js/controllers/material.js'])
                //})
                //.state('app.material.button', {
                //    url: '/button',
                //    templateUrl: 'application/tpl/material/button.html'
                //})
                //.state('app.material.color', {
                //    url: '/color',
                //    templateUrl: 'application/tpl/material/color.html'
                //})
                //.state('app.material.icon', {
                //    url: '/icon',
                //    templateUrl: 'application/tpl/material/icon.html'
                //})
                //.state('app.material.card', {
                //    url: '/card',
                //    templateUrl: 'application/tpl/material/card.html'
                //})
                //.state('app.material.form', {
                //    url: '/form',
                //    templateUrl: 'application/tpl/material/form.html'
                //})
                //.state('app.material.list', {
                //    url: '/list',
                //    templateUrl: 'application/tpl/material/list.html'
                //})
                //.state('app.material.ngmaterial', {
                //    url: '/ngmaterial',
                //    templateUrl: 'application/tpl/material/ngmaterial.html'
                //})
                ;

                function load(srcs, callback) {
                    return {
                        deps: [
                            '$ocLazyLoad', '$q',
                            function ($ocLazyLoad, $q) {
                                var deferred = $q.defer();
                                var promise = false;

                                srcs = angular.isArray(srcs) ? srcs : srcs.split(/\s+/);
                                if (!promise) {
                                    promise = deferred.promise;
                                }
                                angular.forEach(srcs, function (src) {
                                    promise = promise.then(function () {
                                        if (JQ_CONFIG[src]) {
                                            return $ocLazyLoad.load(JQ_CONFIG[src]);
                                        }
                                        angular.forEach(MODULE_CONFIG, function (module) {
                                            if (module.name == src) {
                                                name = module.name;
                                            } else {
                                                name = src;
                                            }
                                        });
                                        return $ocLazyLoad.load(name);
                                    });
                                });
                                deferred.resolve();

                                return callback ? promise.then(function () {
                                    return callback();
                                }) : promise;
                            }
                        ]
                    }
                }
            }
        ]
    );
