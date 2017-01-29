// lazyload config

angular
    .module('app')
    .constant('JQ_CONFIG', {
            easyPieChart: [
                '/application/libs/jquery/jquery.easy-pie-chart/dist/jquery.easypiechart.fill.js'
            ],
            sparkline: [
                '/application/libs/jquery/jquery.sparkline/dist/jquery.sparkline.retina.js'
            ],
            plot: [
                '/application/libs/jquery/flot/jquery.flot.js',
                '/application/libs/jquery/flot/jquery.flot.pie.js',
                '/application/libs/jquery/flot/jquery.flot.resize.js',
                '/application/libs/jquery/flot.tooltip/js/jquery.flot.tooltip.min.js',
                '/application/libs/jquery/flot.orderbars/js/jquery.flot.orderBars.js',
                '/application/libs/jquery/flot-spline/js/jquery.flot.spline.min.js'
            ],
            moment: [
                '/application/libs/jquery/moment/moment.js'
            ],
            screenfull: [
                '/application/libs/jquery/screenfull/dist/screenfull.min.js'
            ],
            slimScroll: [
                '/application/libs/jquery/slimscroll/jquery.slimscroll.min.js'
            ],
            sortable: [
                '/application/libs/jquery/html5sortable/jquery.sortable.js'
            ],
            nestable: [
                '/application/libs/jquery/nestable/jquery.nestable.js',
                '/application/libs/jquery/nestable/jquery.nestable.css'
            ],
            filestyle: [
                '/application/libs/jquery/bootstrap-filestyle/src/bootstrap-filestyle.js'
            ],
            slider: [
                '/application/libs/jquery/bootstrap-slider/bootstrap-slider.js',
                '/application/libs/jquery/bootstrap-slider/bootstrap-slider.css'
            ],
            chosen: [
                '/application/libs/jquery/chosen/chosen.jquery.min.js',
                '/application/libs/jquery/chosen/bootstrap-chosen.css'
            ],
            TouchSpin: [
                '/application/libs/jquery/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js',
                '/application/libs/jquery/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'
            ],
            wysiwyg: [
                '/application/libs/jquery/bootstrap-wysiwyg/bootstrap-wysiwyg.js',
                '/application/libs/jquery/bootstrap-wysiwyg/external/jquery.hotkeys.js'
            ],
            dataTable: [
                '/application/libs/jquery/datatables/datatables.min.js',
                '/application/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                '/application/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.css'
            ],
            vectorMap: [
                '/application/libs/jquery/bower-jvectormap/jquery-jvectormap-1.2.2.min.js',
                '/application/libs/jquery/bower-jvectormap/jquery-jvectormap-world-mill-en.js',
                '/application/libs/jquery/bower-jvectormap/jquery-jvectormap-us-aea-en.js',
                '/application/libs/jquery/bower-jvectormap/jquery-jvectormap.css'
            ],
            footable: [
                '/application/libs/jquery/footable/v3/js/footable.min.js',
                '/application/libs/jquery/footable/v3/css/footable.bootstrap.min.css'
            ],
            fullcalendar: [
                '/application/libs/jquery/moment/moment.js',
                '/application/libs/jquery/fullcalendar/dist/fullcalendar.min.js',
                '/application/libs/jquery/fullcalendar/dist/fullcalendar.css',
                '/application/libs/jquery/fullcalendar/dist/fullcalendar.theme.css'
            ],
            daterangepicker: [
                '/application/libs/jquery/moment/moment.js',
                '/application/libs/jquery/bootstrap-daterangepicker/daterangepicker.js',
                '/application/libs/jquery/bootstrap-daterangepicker/daterangepicker-bs3.css'
            ],
            tagsinput: [
                '/application/libs/jquery/bootstrap-tagsinput/dist/bootstrap-tagsinput.js',
                '/application/libs/jquery/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'
            ]
        }
    )
    .constant('MODULE_CONFIG', [
            {
                name: 'ngGrid',
                files: [
                    '/application/libs/angular/ng-grid/build/ng-grid.min.js',
                    '/application/libs/angular/ng-grid/ng-grid.min.css',
                    '/application/libs/angular/ng-grid/ng-grid.bootstrap.css'
                ]
            },
            {
                name: 'ngAdmin',
                files: [
                    '/application/libs/angular/ng-admin/build/ng-admin.min.js',
                    '/application/libs/angular/ng-admin/build/ng-admin.min.css'
                ]
            },
            {
                name: 'ui.grid',
                files: [
                    '/application/libs/angular/angular-ui-grid/ui-grid.min.js',
                    '/application/libs/angular/angular-ui-grid/ui-grid.min.css',
                    '/application/libs/angular/angular-ui-grid/ui-grid.bootstrap.css'
                ]
            },
            {
                name: 'ui.select',
                files: [
                    '/application/libs/angular/angular-ui-select/dist/select.min.js',
                    '/application/libs/angular/angular-ui-select/dist/select.min.css'
                ]
            },
            {
                name: 'angularFileUpload',
                files: [
                    '/application/libs/angular/angular-file-upload/angular-file-upload.js'
                ]
            },
            {
                name: 'ui.calendar',
                files: ['/application/libs/angular/angular-ui-calendar/src/calendar.js']
            },
            {
                name: 'ngImgCrop',
                files: [
                    '/application/libs/angular/ngImgCrop/compile/minified/ng-img-crop.js',
                    '/application/libs/angular/ngImgCrop/compile/minified/ng-img-crop.css'
                ]
            },
            {
                name: 'angularBootstrapNavTree',
                files: [
                    '/application/libs/angular/angular-bootstrap-nav-tree/dist/abn_tree_directive.js',
                    '/application/libs/angular/angular-bootstrap-nav-tree/dist/abn_tree.css'
                ]
            },
            {
                name: 'toaster',
                files: [
                    '/application/libs/angular/angularjs-toaster/toaster.js',
                    '/application/libs/angular/angularjs-toaster/toaster.css'
                ]
            },
            {
                name: 'textAngular',
                files: [
                    '/application/libs/angular/textAngular/dist/textAngular-sanitize.min.js',
                    '/application/libs/angular/textAngular/dist/textAngular.min.js'
                ]
            },
            {
                name: 'vr.directives.slider',
                files: [
                    '/application/libs/angular/venturocket-angular-slider/build/angular-slider.min.js',
                    '/application/libs/angular/venturocket-angular-slider/build/angular-slider.css'
                ]
            },
            {
                name: 'com.2fdevs.videogular',
                files: [
                    '/application/libs/angular/videogular/videogular.min.js'
                ]
            },
            {
                name: 'com.2fdevs.videogular.plugins.controls',
                files: [
                    '/application/libs/angular/videogular-controls/controls.min.js'
                ]
            },
            {
                name: 'com.2fdevs.videogular.plugins.buffering',
                files: [
                    '/application/libs/angular/videogular-buffering/buffering.min.js'
                ]
            },
            {
                name: 'com.2fdevs.videogular.plugins.overlayplay',
                files: [
                    '/application/libs/angular/videogular-overlay-play/overlay-play.min.js'
                ]
            },
            {
                name: 'com.2fdevs.videogular.plugins.poster',
                files: [
                    '/application/libs/angular/videogular-poster/poster.min.js'
                ]
            },
            {
                name: 'com.2fdevs.videogular.plugins.imaads',
                files: [
                    '/application/libs/angular/videogular-ima-ads/ima-ads.min.js'
                ]
            },
            {
                name: 'xeditable',
                files: [
                    '/application/libs/angular/angular-xeditable/dist/js/xeditable.min.js',
                    '/application/libs/angular/angular-xeditable/dist/css/xeditable.css'
                ]
            },
            {
                name: 'smart-table',
                files: [
                    '/application/libs/angular/angular-smart-table/dist/smart-table.min.js'
                ]
            },
            {
                name: 'angular-skycons',
                files: [
                    '/application/libs/angular/angular-skycons/angular-skycons.js'
                ]
            }
        ]
    )
    .config([
        '$ocLazyLoadProvider', 'MODULE_CONFIG',
        function ($ocLazyLoadProvider, MODULE_CONFIG) {
            $ocLazyLoadProvider.config({
                debug: false,
                events: true,
                modules: MODULE_CONFIG
            });
        }
    ]);
