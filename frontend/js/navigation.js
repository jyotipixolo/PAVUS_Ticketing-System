var adminurl="http://localhost/pavus/PAVUS_Ticketing-System/index.php/";

var navigationservice = angular.module('navigationservice', [])



.factory('NavigationService', function ($http) {
    var navigation = [{
        name: "Home",
        classis: "active",
        link:"#/home",
        subnav: []
    }, {
        name: "About",
        active: "",
        link:"#/about",
        subnav: []
    }, {
        name: "Services",
        classis: "",
        link:"#/services",
        subnav: []
    }, {
        name: "Portfolio",
        classis: "",
        link:"#/portfolio",
        subnav: []
    }, {
        name: "Contact",
        classis: "",
        link:"#/contact",
        subnav: []
    }];

    return {
        getnav: function() {
            return navigation;
        },
        makeactive: function(menuname) {
            for(var i=0;i<navigation.length;i++) {
                if(navigation[i].name==menuname)
                {
                    navigation[i].classis="active";
                }
                else {
                    navigation[i].classis="";
                }
            }
            return menuname;
        },
        
        
        
        test: function(object) {
            return $http.get(adminurl + "booking/confirmation", {
                params: {
                ticketinput:object
                }
            });
        }
        
    }
});