var ticketdata;
var phonecatControllers = angular.module('phonecatControllers', ['templateservicemod', 'navigationservice']);

phonecatControllers.controller('home', ['$scope', 'TemplateService', 'NavigationService', '$location',
  function ($scope, TemplateService, NavigationService, $location) {
        $scope.template = TemplateService;
        TemplateService.content = "views/bookingform.html";
        $scope.navigation = NavigationService.getnav();

        if ($.jStorage.get("user") == null || $.jStorage.get("user") == {}) {
            $location.path('/login');
        };
      
        $scope.user = $.jStorage.get("user");

        $scope.customer = {};
        $scope.customer.quantity = 1;
        
        $scope.customer.sales = $scope.user.id;

        //LOADER
        $scope.loading = false;

        ticketdata = [];



        //GETTING AVAILABLE TICKETS
        var ticketavailabilitysuccess = function (data, status) {
            if(data.earlybird > 0)
            {
                $scope.customer.category = 'earlybird';
            }else if(data.silver > 0)
            {
                $scope.customer.category = 'silver';
            }else if(data.gold > 0)
            {
                $scope.customer.category = 'gold';
            }else if(data.diamond > 0)
            {
                $scope.customer.category = 'diamond';
            }else{
                $scope.customer.category = 'vip';
            };
            $scope.earlybirdavailable = data.earlybird;
            $scope.silveravailable = data.silver;
            $scope.goldavailable = data.gold;
            $scope.diamondavailable = data.diamond;
            $scope.vipavailable = data.vip;
        };
        NavigationService.getticketavailability().success(ticketavailabilitysuccess);

        //CATEGORY COST FROM CATEGORY
        var getcatcost = function (cat) {
            if (cat == 'earlybird'){
                return 700;
            }else if(cat == 'silver') {
                return 1400;
            } else if (cat == 'gold') {
                return 2100;
            } else if (cat == 'diamond') {
                return 2800;
            } else if (cat == 'vip') {
                return 3500;
            };
        };

        //SHOWING DYNAMIC COST
        $scope.costchange = function () {
            $scope.customer.cost = $scope.customer.quantity * getcatcost($scope.customer.category);
        };
        $scope.costchange();


        //LOGOUT
        $scope.logout = function () {
            $.jStorage.flush();
            $location.path('/login');
        };
      
        //MESSAGE
        $scope.message = '';

        //BOOK TICKET ON DATABASE
        var getconfirmationsuccess = function (data, status) {
            //LOADER
            $scope.loading = false;
            if (angular.isString(data)) {
                data = data.trim();
            };
            console.log(data);
            if (data == 'false') {
                $scope.message = "Ooops! The number of tickets you need are not available, please refresh the page";
            } else {
                ticketdata = data;
                $location.path('/confirmation');
            };
        };
        $scope.getconfirmation = function () {
            //LOADER
            $scope.loading = true;
            console.log($scope.customer);
            NavigationService.getconfirmation($scope.customer).success(getconfirmationsuccess);
        };


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        var template = '<html><body><div style="text-align:center;font-size: large;"><strong>Your Ticket:</strong></div><div><img src="http://pavus2015.com/ticketheader.png" width="100%"></div><br><div mc:edit="user"><table class="usertable"><tr><td><strong>Order No.</strong> </td><td>: PAVUSTCKT34</td></tr><tr><td><strong>Name</strong></td><td>: Abhay Amin</td></tr><tr><td><strong>E-mail</strong></td><td>: abhay.pixolo@gmail.com</td></tr><tr><td><strong>Phone No.</strong></td><td>: 9820840946</td></tr><tr><td><strong>Tickets Booked</strong></td><td>: 4</td></tr></table></div><br><h5>Ticket Information</h5><div mc:edit="tickets"><table class="ticketstable"><tr class="tablehead"><td>Sr. No</td><td>Ticket Number</td><td>Category</td><td>Cost</td></tr><tr><td>1</td><td>G003</td><td>Gold</td><td>3000</td></tr>   <tr class="alternaterow"><td>2</td><td>G004</td><td>Gold</td><td>3000</td></tr><tr class="tablehead"><td>Total</td><td></td><td></td><td>12000</td></tr></table></div><div style="font-size:large"><strong>Event Information</strong><ul><li>Event will be held on 8th August, 2015</li><li>Event will be held at Somaiya Ground No. 4 & 5, Ghatkopar (East)</li><li>Entry to the event starts at 4:30pm</li><li>Food and drinks will be available for purchase in the grounds</li></ul><br></div><div style="background-color: gainsboro;padding: 10px;"><strong>Terms & Condition</strong><ul><li>The identity proof of the person who booked the ticket is required while collecting the tickets</li><li>This ticket is strictly not transferable and is for the sole use of the purchaser</li><li>No smoking is allowed within the venue</li></ul></div></body></html>';

        $scope.addtemplate = function () {
            var params = {
                "key": "dMXuoKcR1Pj5kI19N-Otyg",
                "name": "pavus_ticket",
                "from_email": "pavus2015@gmail.com",
                "from_name": "Pavus 2015",
                "subject": "Your Ticket Confirmation",
                "code": template,
                "text": "thank you",
                "publish": false,
                "labels": [
        "thank you"
    ]
            };

            var tempadded = function (data, status) {
                console.log(data);
                console.log(status);
            };

            NavigationService.addtemplate(params).success(tempadded);
        };
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}]);

phonecatControllers.controller('confirmationCtrl', ['$scope', 'TemplateService', 'NavigationService', '$location',
  function ($scope, TemplateService, NavigationService, $location) {
        $scope.template = TemplateService;
        $scope.menutitle = NavigationService.makeactive("About");
        TemplateService.title = $scope.menutitle;
        TemplateService.content = "views/confirmation.html"
        $scope.navigation = NavigationService.getnav();

        if ($.jStorage.get("user") == null || $.jStorage.get("user") == {}) {
            $location.path('/login');
        };

        $scope.ticketinfo = ticketdata;

        $scope.getticket = function () {
            ticketdata = [];
            $location.path('/home');
        };

        //EMAIL FUNCTION
        //SEND EMAIL
        var emailsuccess = function (data, status) {
            console.log(data);
        };

        var emailing = function () {

            var useremaildata = '<table style="width:80%"><tr><td><strong>Order No.</strong></td><td>: PAVUSTCKT' + $scope.ticketinfo.user.id + '</td></tr><tr><td><strong>Name</strong></td><td>: ' + $scope.ticketinfo.user.name + '</td>            </tr><tr><td><strong>E-mail</strong></td><td>: ' + $scope.ticketinfo.user.email + '</td></tr><tr><td><strong>Phone No.</strong></td>                <td>: ' + $scope.ticketinfo.user.contactnumber + '</td></tr><tr><td><strong>Tickets Booked</strong></td><td>: ' + $scope.ticketinfo.user.quantity + '</td></tr><tr><td><strong>Booking Time</strong></td><td>: ' + $scope.ticketinfo.user.date + '</td></tr></table>';

            var ticketemaildata = '<table style="width: 100%;text-align: center"><tr style="background-color:rgb(18,34,94);color:white"><td>Sr. No</td><td>Ticket Number</td><td>Category</td><td>Cost</td></tr>';
            var cost = $scope.ticketinfo.user.cost / $scope.ticketinfo.user.quantity;
            for (var q = 0; q < $scope.ticketinfo.tickets.length; q++) {
                if (q % 2 != 0) {
                    ticketemaildata = ticketemaildata + '<tr style="background-color:beige"><td>' + (q + 1) + '</td>';
                } else {
                    ticketemaildata = ticketemaildata + '<tr><td>' + (q + 1) + '</td>';
                };
                ticketemaildata = ticketemaildata + '<td>' + $scope.ticketinfo.tickets[q].ticket + '</td><td>' + angular.uppercase($scope.ticketinfo.user.category) + '</td><td>' + cost + '</td></tr>'
            };
            ticketemaildata = ticketemaildata + '<tr style="background-color:rgb(18,34,94);color:white"><td>Total</td><td></td><td></td><td>' + $scope.ticketinfo.user.cost + '</td></tr></table>';


            $scope.params = {
                "key": "dMXuoKcR1Pj5kI19N-Otyg",
                "template_name": "pavus_ticket",
                "template_content": [
                    {
                        "name": "user",
                        "content": useremaildata
        },
                    {
                        "name": "tickets",
                        "content": ticketemaildata
        }
    ],
                "message": {
                    "html": "<p>Thank You</p>",
                    "text": "",
                    "subject": "Your Pavus 2015 Ticket No." + $scope.ticketinfo.user.id,
                    "from_email": "pavus2015@gmail.com",
                    "from_name": "Pavus 2015",
                    "to": [
                        {
                            "email": $scope.ticketinfo.user.email,
                            "name": $scope.ticketinfo.user.name,
                            "type": "to"
            }
        ],
                    "headers": {
                        "Reply-To": "pavus2015@gmail.com"
                    },
                    "bcc_address": "pavus2015@gmail.com"
                },
                "async": false
            };

            NavigationService.sendemail($scope.params).success(emailsuccess);
        };

        //CREATE PDF
        var doc = new jsPDF();

        doc.setFontSize(42);
        doc.text(20, 20, 'Ticket');

        doc.setFontSize(22);
        doc.text(20, 50, $scope.ticketinfo.user.name);
        doc.text(20, 70, $scope.ticketinfo.user.contactnumber);
        doc.text(20, 80, $scope.ticketinfo.user.email);
        var n = 90;
        for (var i = 0; i < $scope.ticketinfo.tickets.length; i++) {
            n = n + 10;
            doc.text(80, n, $scope.ticketinfo.tickets[i].ticket);
            doc.text(20, n, $scope.ticketinfo.user.name);
        };

        var name = "Pavus_Ticket" + $scope.ticketinfo.user.id + ".pdf";
        //var pdfOutput = btoa(doc.output());
        //var url = 'data:application/pdf;base64,' + Base64.encode(pdfOutput);
        //var pdfOutput = doc.output();


        //DOWNLOAD PDF
        //doc.save(name);

        //SEND EMAIL
        emailing();


}]);

phonecatControllers.controller('loginCtrl', ['$scope', 'TemplateService', 'NavigationService', '$location',
  function ($scope, TemplateService, NavigationService, $location) {
        $scope.template = TemplateService;
        TemplateService.title = $scope.menutitle;
        TemplateService.content = "views/login.html"
        $scope.navigation = NavigationService.getnav();


        $scope.user = {};

        //LOADER
        $scope.loading = false;

        var loginsuccess = function (data, status) {
            //LOADER
            $scope.loading = false;
            if (angular.isString(data)) {
                data = data.trim();
            };
            console.log(data);
            if (data == 'false') {
                $scope.message = "username and password are invalid";
            } else {
                $.jStorage.set("user", data);
                $scope.message = "";
                $location.path('/home');
            };
        };

        $scope.login = function () {
            $scope.loading = true;
            NavigationService.login($scope.user).success(loginsuccess);
        };

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