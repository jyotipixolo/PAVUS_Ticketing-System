var adminurl = "http://localhost/PAVUS_Ticketing-System/pavus/index.php/";

var navigationservice = angular.module('navigationservice', [])



.factory('NavigationService', function ($http) {
    var navigation = [{
        name: "Home",
        classis: "active",
        link: "#/home",
        subnav: []
    }, {
        name: "About",
        active: "",
        link: "#/about",
        subnav: []
    }, {
        name: "Services",
        classis: "",
        link: "#/services",
        subnav: []
    }, {
        name: "Portfolio",
        classis: "",
        link: "#/portfolio",
        subnav: []
    }, {
        name: "Contact",
        classis: "",
        link: "#/contact",
        subnav: []
    }];

    return {
        getnav: function () {
            return navigation;
        },
        makeactive: function (menuname) {
            for (var i = 0; i < navigation.length; i++) {
                if (navigation[i].name == menuname) {
                    navigation[i].classis = "active";
                } else {
                    navigation[i].classis = "";
                }
            }
            return menuname;
        },

        login: function (data) {
            return $http.get(adminurl + "booking/login", {
                params: {
                    user: data
                }
            });
        },

        getticketavailability: function () {
            return $http.get(adminurl + "booking/bookingform", {
                params: {}
            });
        },

        getconfirmation: function (object) {
            return $http.get(adminurl + "booking/confirmation", {
                params: {
                    ticketinput: object
                }
            });
        },

        sendemail: function (data) {
            return $http.post("https://mandrillapp.com/api/1.0/messages/send-template.json", data)
        },

        addtemplate: function (data) {
            return $http.post("https://mandrillapp.com/api/1.0/templates/add.json", data)
        }

    }
});