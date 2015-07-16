var ticketdata;
var phonecatControllers = angular.module('phonecatControllers', ['templateservicemod', 'navigationservice']);

phonecatControllers.controller('home', ['$scope', 'TemplateService', 'NavigationService', '$location',
  function ($scope, TemplateService, NavigationService, $location) {
        $scope.template = TemplateService;
        TemplateService.title = $scope.menutitle;
        TemplateService.content = "views/bookingform.html";
        $scope.navigation = NavigationService.getnav();
        $scope.customer = {};
        $scope.customer.quantity = 1;

        ticketdata = [];

        var testsucc = function (data, status) {
            if (data == false) {
                console.log(data);
            } else {
                console.log(data);
                ticketdata = data;
                $location.path('/confirmation');
            };
        };

        $scope.test = function () {
            console.log($scope.customer);
            NavigationService.test($scope.customer).success(testsucc);
        };

  }]);
phonecatControllers.controller('confirmationCtrl', ['$scope', 'TemplateService', 'NavigationService','$location',
  function ($scope, TemplateService, NavigationService, $location) {
        $scope.template = TemplateService;
        $scope.menutitle = NavigationService.makeactive("About");
        TemplateService.title = $scope.menutitle;
        TemplateService.content = "views/confirmation.html"
        $scope.navigation = NavigationService.getnav();

        $scope.ticketinfo = ticketdata;
        $scope.getticket = function () {
            $location.path('/pdf');
        };


  }]);
phonecatControllers.controller('pdfCtrl', ['$scope', 'TemplateService', 'NavigationService','$location',
  function ($scope, TemplateService, NavigationService, $location) {
        $scope.template = TemplateService;
        $scope.menutitle = NavigationService.makeactive("Services");
        TemplateService.title = $scope.menutitle;
        TemplateService.content = "views/pdf.html"
        $scope.navigation = NavigationService.getnav();

        $scope.ticketinfo = ticketdata;

        var doc = new jsPDF();

        doc.setFontSize(42);
        doc.text(20, 20, 'Ticket');

        doc.setFontSize(22);
        doc.text(20, 50, 'Abhay Amin');
        doc.text(20, 70, '9820840946');
        doc.text(20, 80, 'abhay.pixolo@gmail.com');
        var n = 90;
        for(var i=0; i<$scope.ticketinfo.tickets.length; i++)
        {
            n = n+10;
            doc.text(30, n, $scope.ticketinfo.tickets[i].ticket);
            doc.text(20, n, $scope.ticketinfo.user.name);
        };

        var name = "Pavus_Ticket"+$scope.ticketinfo.user.id+".pdf";
        doc.save(name);

        $scope.gotobooking = function () {
            $location.path('/home');
        };
        //CLEAR DATA WHILE LEAVING PAGE
        //ticketdata = [];

  }]);
phonecatControllers.controller('portfolio', ['$scope', 'TemplateService', 'NavigationService',
  function ($scope, TemplateService, NavigationService) {
        $scope.template = TemplateService;
        $scope.menutitle = NavigationService.makeactive("Portfolio");
        TemplateService.title = $scope.menutitle;
        $scope.navigation = NavigationService.getnav();
  }]);
phonecatControllers.controller('contact', ['$scope', 'TemplateService', 'NavigationService',
  function ($scope, TemplateService, NavigationService) {
        $scope.template = TemplateService;
        $scope.menutitle = NavigationService.makeactive("Contact");
        TemplateService.title = $scope.menutitle;
        $scope.navigation = NavigationService.getnav();
  }]);


phonecatControllers.controller('headerctrl', ['$scope', 'TemplateService',
 function ($scope, TemplateService) {
        $scope.template = TemplateService;
  }]);