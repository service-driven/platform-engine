$(document).ready(function () {
    function groupBy(data, key) {
        var groupedData = [],
            types = {},
            i,
            j,
            current;

        for (i = 0, j = data.length; i < j; i++) {
            current = data[i];

            if (!(current[key] in types)) {
                types[current[key]] = {
                    type: current[key],
                    data: []
                };
                groupedData.push(types[current[key]]);
            }
            types[current[key]].data.push(current);
        }
        return groupedData;
    }

    var options = {
        series: {
            shadowSize: 5,
            curvedLines: {
                apply: true,
                active: false,
                monotonicFit: false
            },

            lines: {
                show: true,
                lineWidth: 2
            },
            points: {
                show: true,
                lineWidth: 2
            }
        },
        grid: {
            borderWidth: 0,
            labelMargin: 10,
            hoverable: true,
            clickable: true,
            mouseActiveRadius: 6
        },
        xaxis: {
            tickDecimals: 1,
            ticks: true
        },

        yaxis: {
            tickDecimals: 1,
            ticks: true
        },

        legend: {
            show: false
        }
    };

    var salesPerHourData = [
        {
            "id": "2016-09-21_0",
            "created": "2016-09-21",
            "dayhour": 0,
            "sold": 13,
            "sumsold": 2123.8
        }, {
            "id": "2016-09-21_1",
            "created": "2016-09-21",
            "dayhour": 1,
            "sold": 1,
            "sumsold": 101.8
        }, {
            "id": "2016-09-21_2",
            "created": "2016-09-21",
            "dayhour": 2,
            "sold": 3,
            "sumsold": 837.25
        }, {
            "id": "2016-09-21_3",
            "created": "2016-09-21",
            "dayhour": 3,
            "sold": 2,
            "sumsold": 143.65
        }, {
            "id": "2016-09-21_4",
            "created": "2016-09-21",
            "dayhour": 4,
            "sold": 1,
            "sumsold": 169.94
        }, {
            "id": "2016-09-21_5",
            "created": "2016-09-21",
            "dayhour": 5,
            "sold": 4,
            "sumsold": 448.44
        }, {
            "id": "2016-09-21_6",
            "created": "2016-09-21",
            "dayhour": 6,
            "sold": 14,
            "sumsold": 2179.58
        }, {
            "id": "2016-09-21_7",
            "created": "2016-09-21",
            "dayhour": 7,
            "sold": 28,
            "sumsold": 4014.26
        }, {
            "id": "2016-09-21_8",
            "created": "2016-09-21",
            "dayhour": 8,
            "sold": 42,
            "sumsold": 4862.99
        }, {
            "id": "2016-09-21_9",
            "created": "2016-09-21",
            "dayhour": 9,
            "sold": 63,
            "sumsold": 8152.15
        }, {
            "id": "2016-09-21_10",
            "created": "2016-09-21",
            "dayhour": 10,
            "sold": 57,
            "sumsold": 8075.86
        }, {
            "id": "2016-09-21_11",
            "created": "2016-09-21",
            "dayhour": 11,
            "sold": 58,
            "sumsold": 7482.37
        }, {
            "id": "2016-09-21_12",
            "created": "2016-09-21",
            "dayhour": 12,
            "sold": 82,
            "sumsold": 10324.6
        }, {
            "id": "2016-09-21_13",
            "created": "2016-09-21",
            "dayhour": 13,
            "sold": 95,
            "sumsold": 11931.1
        }, {
            "id": "2016-09-21_14",
            "created": "2016-09-21",
            "dayhour": 14,
            "sold": 97,
            "sumsold": 12298.9
        }, {
            "id": "2016-09-21_15",
            "created": "2016-09-21",
            "dayhour": 15,
            "sold": 90,
            "sumsold": 12524.8
        }, {
            "id": "2016-09-21_16",
            "created": "2016-09-21",
            "dayhour": 16,
            "sold": 89,
            "sumsold": 10541.2
        }, {
            "id": "2016-09-21_17",
            "created": "2016-09-21",
            "dayhour": 17,
            "sold": 59,
            "sumsold": 7717.68
        }, {
            "id": "2016-09-21_18",
            "created": "2016-09-21",
            "dayhour": 18,
            "sold": 79,
            "sumsold": 11053.5
        }, {
            "id": "2016-09-21_19",
            "created": "2016-09-21",
            "dayhour": 19,
            "sold": 90,
            "sumsold": 11059.3
        }, {
            "id": "2016-09-21_20",
            "created": "2016-09-21",
            "dayhour": 20,
            "sold": 114,
            "sumsold": 18991.2
        }, {
            "id": "2016-09-21_21",
            "created": "2016-09-21",
            "dayhour": 21,
            "sold": 112,
            "sumsold": 15545.2
        }, {
            "id": "2016-09-21_22",
            "created": "2016-09-21",
            "dayhour": 22,
            "sold": 88,
            "sumsold": 14258.9
        }, {
            "id": "2016-09-21_23",
            "created": "2016-09-21",
            "dayhour": 23,
            "sold": 32,
            "sumsold": 4198.32
        }, {
            "id": "2016-09-28_0",
            "created": "2016-09-28",
            "dayhour": 0,
            "sold": 6,
            "sumsold": 1299.94
        }, {
            "id": "2016-09-28_1",
            "created": "2016-09-28",
            "dayhour": 1,
            "sold": 1,
            "sumsold": 114.7
        }, {
            "id": "2016-09-28_2", "created": "2016-09-28", "dayhour": 2, "sold": 0, "sumsold": 0
        }, {
            "id": "2016-09-28_3",
            "created": "2016-09-28",
            "dayhour": 3,
            "sold": 0,
            "sumsold": 0
        }, {
            "id": "2016-09-28_4", "created": "2016-09-28", "dayhour": 4, "sold": 0, "sumsold": 0
        }, {
            "id": "2016-09-28_5",
            "created": "2016-09-28",
            "dayhour": 5,
            "sold": 3,
            "sumsold": 457.6
        }, {
            "id": "2016-09-28_6",
            "created": "2016-09-28",
            "dayhour": 6,
            "sold": 9,
            "sumsold": 737.48
        }, {
            "id": "2016-09-28_7",
            "created": "2016-09-28",
            "dayhour": 7,
            "sold": 23,
            "sumsold": 3846.86
        }, {
            "id": "2016-09-28_8",
            "created": "2016-09-28",
            "dayhour": 8,
            "sold": 44,
            "sumsold": 5980.66
        }, {
            "id": "2016-09-28_9",
            "created": "2016-09-28",
            "dayhour": 9,
            "sold": 48,
            "sumsold": 6834.12
        }, {
            "id": "2016-09-28_10",
            "created": "2016-09-28",
            "dayhour": 10,
            "sold": 60,
            "sumsold": 8050.51
        }, {
            "id": "2016-09-28_11",
            "created": "2016-09-28",
            "dayhour": 11,
            "sold": 54,
            "sumsold": 6648.77
        }, {
            "id": "2016-09-28_12",
            "created": "2016-09-28",
            "dayhour": 12,
            "sold": 42,
            "sumsold": 6603.18
        }, {
            "id": "2016-09-28_13",
            "created": "2016-09-28",
            "dayhour": 13,
            "sold": 51,
            "sumsold": 6969.75
        }, {
            "id": "2016-09-28_14",
            "created": "2016-09-28",
            "dayhour": 14,
            "sold": 55,
            "sumsold": 7862.17
        }, {
            "id": "2016-09-28_15",
            "created": "2016-09-28",
            "dayhour": 15,
            "sold": 68,
            "sumsold": 8716.87
        }, {
            "id": "2016-09-28_16",
            "created": "2016-09-28",
            "dayhour": 16,
            "sold": 62,
            "sumsold": 8113.37
        }, {
            "id": "2016-09-28_17",
            "created": "2016-09-28",
            "dayhour": 17,
            "sold": 52,
            "sumsold": 7412.07
        }, {
            "id": "2016-09-28_18",
            "created": "2016-09-28",
            "dayhour": 18,
            "sold": 53,
            "sumsold": 7747.53
        }, {
            "id": "2016-09-28_19",
            "created": "2016-09-28",
            "dayhour": 19,
            "sold": 61,
            "sumsold": 8583.13
        }, {
            "id": "2016-09-28_20",
            "created": "2016-09-28",
            "dayhour": 20,
            "sold": 63,
            "sumsold": 7624.56
        }, {
            "id": "2016-09-28_21",
            "created": "2016-09-28",
            "dayhour": 21,
            "sold": 77,
            "sumsold": 10613.8
        }, {
            "id": "2016-09-28_22",
            "created": "2016-09-28",
            "dayhour": 22,
            "sold": 62,
            "sumsold": 9728.03
        }, {
            "id": "2016-09-28_23",
            "created": "2016-09-28",
            "dayhour": 23,
            "sold": 24,
            "sumsold": 4303.25
        }, {
            "id": "2016-10-04_0",
            "created": "2016-10-04",
            "dayhour": 0,
            "sold": 7,
            "sumsold": 1043.5
        }, {
            "id": "2016-10-04_1",
            "created": "2016-10-04",
            "dayhour": 1,
            "sold": 4,
            "sumsold": 877.28
        }, {
            "id": "2016-10-04_2",
            "created": "2016-10-04",
            "dayhour": 2,
            "sold": 3,
            "sumsold": 549.93
        }, {
            "id": "2016-10-04_3",
            "created": "2016-10-04",
            "dayhour": 3,
            "sold": 1,
            "sumsold": 309.7
        }, {
            "id": "2016-10-04_4",
            "created": "2016-10-04",
            "dayhour": 4,
            "sold": 2,
            "sumsold": 109.92
        }, {
            "id": "2016-10-04_5",
            "created": "2016-10-04",
            "dayhour": 5,
            "sold": 3,
            "sumsold": 251.77
        }, {
            "id": "2016-10-04_6",
            "created": "2016-10-04",
            "dayhour": 6,
            "sold": 9,
            "sumsold": 1365.75
        }, {
            "id": "2016-10-04_7",
            "created": "2016-10-04",
            "dayhour": 7,
            "sold": 15,
            "sumsold": 2070.65
        }, {
            "id": "2016-10-04_8",
            "created": "2016-10-04",
            "dayhour": 8,
            "sold": 39,
            "sumsold": 4865.08
        }, {
            "id": "2016-10-04_9",
            "created": "2016-10-04",
            "dayhour": 9,
            "sold": 29,
            "sumsold": 3068.84
        }, {
            "id": "2016-10-04_10",
            "created": "2016-10-04",
            "dayhour": 10,
            "sold": 52,
            "sumsold": 8806.27
        }, {
            "id": "2016-10-04_11",
            "created": "2016-10-04",
            "dayhour": 11,
            "sold": 35,
            "sumsold": 5621.21
        }, {
            "id": "2016-10-04_12",
            "created": "2016-10-04",
            "dayhour": 12,
            "sold": 43,
            "sumsold": 5815.3
        }, {
            "id": "2016-10-04_13",
            "created": "2016-10-04",
            "dayhour": 13,
            "sold": 39,
            "sumsold": 4567.05
        }, {
            "id": "2016-10-04_14",
            "created": "2016-10-04",
            "dayhour": 14,
            "sold": 68,
            "sumsold": 11024
        }, {
            "id": "2016-10-04_15",
            "created": "2016-10-04",
            "dayhour": 15,
            "sold": 42,
            "sumsold": 7210.12
        }, {
            "id": "2016-10-04_16",
            "created": "2016-10-04",
            "dayhour": 16,
            "sold": 46,
            "sumsold": 8700.39
        }, {
            "id": "2016-10-04_17",
            "created": "2016-10-04",
            "dayhour": 17,
            "sold": 52,
            "sumsold": 7687.71
        }, {
            "id": "2016-10-04_18",
            "created": "2016-10-04",
            "dayhour": 18,
            "sold": 49,
            "sumsold": 5642.01
        }, {
            "id": "2016-10-04_19",
            "created": "2016-10-04",
            "dayhour": 19,
            "sold": 46,
            "sumsold": 5643.61
        }, {
            "id": "2016-10-04_20",
            "created": "2016-10-04",
            "dayhour": 20,
            "sold": 72,
            "sumsold": 11905.1
        }, {
            "id": "2016-10-04_21",
            "created": "2016-10-04",
            "dayhour": 21,
            "sold": 98,
            "sumsold": 16213
        }, {
            "id": "2016-10-04_22",
            "created": "2016-10-04",
            "dayhour": 22,
            "sold": 55,
            "sumsold": 10723.7
        }, {
            "id": "2016-10-04_23",
            "created": "2016-10-04",
            "dayhour": 23,
            "sold": 30,
            "sumsold": 3965.25
        }, {
            "id": "2016-10-05_0",
            "created": "2016-10-05",
            "dayhour": 0,
            "sold": 6,
            "sumsold": 1081.35
        }, {
            "id": "2016-10-05_1", "created": "2016-10-05", "dayhour": 1, "sold": 1, "sumsold": 29.95
        }];
    var salesData = [
        {
            "dateofvisit": "2016-10-05",
            "visitors": 480,
            "sumtotal": "1111.30",
            "indentcount": 7,
            "couponvalue": 0,
            "goodycount": 0,
            "levy": "0.0145833333333333"
        }, {
            "dateofvisit": "2016-10-04",
            "visitors": 26041,
            "sumtotal": "120851.00",
            "indentcount": 787,
            "couponvalue": 690,
            "goodycount": 0,
            "levy": 0.030221573672286
        }, {
            "dateofvisit": "2016-10-03",
            "visitors": 28254,
            "sumtotal": "159833.00",
            "indentcount": 1009,
            "couponvalue": 1390,
            "goodycount": 0,
            "levy": "0.0357117576272386"
        }, {
            "dateofvisit": "2016-10-01",
            "visitors": 25211,
            "sumtotal": "132938.00",
            "indentcount": 939,
            "couponvalue": 1345,
            "goodycount": 0,
            "levy": "0.0372456467415017"
        }, {
            "dateofvisit": "2016-09-29",
            "visitors": 24596,
            "sumtotal": "101512.00",
            "indentcount": 788,
            "couponvalue": 1480,
            "goodycount": 0,
            "levy": "0.0320377297121483"
        }, {
            "dateofvisit": "2016-09-28",
            "visitors": 27082,
            "sumtotal": "122626.00",
            "indentcount": 875,
            "couponvalue": 1780,
            "goodycount": 0,
            "levy": "0.0323092829185437"
        }, {
            "dateofvisit": "2016-09-27",
            "visitors": 29536,
            "sumtotal": "125629.00",
            "indentcount": 875,
            "couponvalue": 1780,
            "goodycount": 0,
            "levy": "0.0296248645720477"
        }, {
            "dateofvisit": "2016-09-26",
            "visitors": 22334,
            "sumtotal": "112819.00",
            "indentcount": 827,
            "couponvalue": 1510,
            "goodycount": 0,
            "levy": "0.0370287454105848"
        }, {
            "dateofvisit": "2016-09-25",
            "visitors": 24730,
            "sumtotal": "122200.00",
            "indentcount": 863,
            "couponvalue": 1570,
            "goodycount": 0,
            "levy": "0.0348968863728265"
        }];
    var mailData = [
        {"received": "2016-10-04", "total": "118", "unseen": "34"}, {
            "received": "2016-10-03",
            "total": "40",
            "unseen": "0"
        }, {"received": "2016-10-02", "total": "45", "unseen": "0"}, {
            "received": "2016-10-01",
            "total": "42",
            "unseen": "2"
        }, {"received": "2016-09-30", "total": "91", "unseen": "1"}, {
            "received": "2016-09-29",
            "total": "53",
            "unseen": "0"
        }, {"received": "2016-09-28", "total": "91", "unseen": "0"}, {
            "received": "2016-09-27",
            "total": "86",
            "unseen": "0"
        }, {"received": "2016-09-26", "total": "76", "unseen": "0"}, {
            "received": "2016-09-25",
            "total": "20",
            "unseen": "0"
        }, {"received": "2016-09-24", "total": "29", "unseen": "0"}, {
            "received": "2016-09-23",
            "total": "79",
            "unseen": "0"
        }, {"received": "2016-09-22", "total": "87", "unseen": "0"}, {
            "received": "2016-09-21",
            "total": "235",
            "unseen": "0"
        }];
    var refererData = [
        {"count": 12238, "referer": "www.google.de"}, {
            "count": 6603,
            "referer": "m.facebook.com"
        }, {"count": 1251, "referer": "cas.nl.eu.criteo.com"}, {
            "count": 802,
            "referer": "www.googleadservices.com"
        }, {"count": 678, "referer": "www.facebook.com"}, {"count": 627, "referer": "cas.fr.eu.criteo.com"}, {
            "count": 524,
            "referer": "www.stylight.de"
        }, {"count": 497, "referer": "www.bing.com"}, {"count": 457, "referer": "images.google.de"}, {
            "count": 339,
            "referer": "www.google.nl"
        }];
    var birthdayData = [
        {"fullname": "Valentina Schlytschkowa", "dob": "1990-10-05"}
    ];
    var campaignData = [
        {
            "count": 5155,
            "campaign": "k5_2016_winter",
            "source": "facebook",
            "medium": "performance_socialpaid"
        }, {
            "count": 4245,
            "campaign": "w2_2016_winter",
            "source": "newsletter_someday",
            "medium": "brand_newsletter_email"
        }, {
            "count": 2976,
            "campaign": "generic_opus",
            "source": "criteo",
            "medium": "retargeting_retargetingfeed_feed"
        }, {
            "count": 1368,
            "campaign": "generic_opus",
            "source": "facebook",
            "medium": "retargeting_retargetingfeed_feed"
        }, {
            "count": 1210,
            "campaign": "k5_2016_winter",
            "source": "newsletter_opus",
            "medium": "brand_newsletter_email"
        }, {
            "count": 641,
            "campaign": "generic",
            "source": "criteo",
            "medium": "retargeting_retargetingfeed_feed"
        }, {
            "count": 570,
            "campaign": "generic_someday",
            "source": "criteo",
            "medium": "retargeting_retargetingfeed_feed"
        }, {
            "count": 545,
            "campaign": "generic_someday",
            "source": "facebook",
            "medium": "retargeting_retargetingfeed_feed"
        }, {
            "count": 524,
            "campaign": "generic_opus",
            "source": "stylight",
            "medium": "performance_psm_feed"
        }, {
            "count": 363,
            "campaign": "generic_someday",
            "source": "newsletter_someday",
            "medium": "brand_newsletter_email"
        }];
    var pageData = [
        {"count": 8032, "currentpage": "\/de_de\/opus"}, {
            "count": 3755,
            "currentpage": "\/de_de\/opus\/sweat\/sweatshirts\/sweater-gesina-grau"
        }, {"count": 3685, "currentpage": "\/de_de"}, {
            "count": 2626,
            "currentpage": "\/de_de\/opus\/mode-online"
        }, {"count": 2421, "currentpage": "\/de_de\/opus\/neuheiten"}, {
            "count": 2293,
            "currentpage": "\/de_de\/someday"
        }, {"count": 1938, "currentpage": "\/de_de\/opus\/shop-by-look"}, {
            "count": 1866,
            "currentpage": "\/de_de\/opus\/sale"
        }, {"count": 1782, "currentpage": "\/de_de\/warenkorb"}, {
            "count": 1678,
            "currentpage": "\/de_de\/opus\/sweat"
        }];


    var sales = salesData.map(function (sale, index) {
        return [index, sale.sumtotal];
    });

    var groupedSalesPerHourData = groupBy(salesPerHourData, 'created');
    var groupesSalesPerHourChartConfig = groupedSalesPerHourData.map(function (saleGroup, index) {
        return {
            data: saleGroup.data.map(function (sale) {
                return [sale.dayhour, sale.sumsold];
            }),
            lines: {
                show: true,
                fill: 0.5
            },
            label: saleGroup.type,
            stack: true,
            color: ['#03A9F4', '#E0F7FA', '#00695C', '#AEEA00'][index]
        };
    });
    $("#chart-sales").plot(groupesSalesPerHourChartConfig, options);

    var salesPerHour = salesPerHourData.map(function (sale) {
        return [sale.dayhour, sale.sumtotal];
    });
    var mails = mailData.map(function (mail) {
        return mail;
    });
    var referers = refererData.map(function (referer) {
        return referer;
    });
    var birthdays = birthdayData.map(function (birthday) {
        return birthday;
    });
    var campaigns = campaignData.map(function (campaign) {
        return campaign;
    });
    var pages = pageData.map(function (page) {
        return page;
    });
    var currentVisitors = [{"quantity": 162}];

});
