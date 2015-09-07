angular.module("competicao", ['ngMask', 'ngRoute'])
    .config(function ($routeProvider) {
        $routeProvider.
            when('/teste', {
                templateUrl: '/js/teste.html',
                controller: 'updateCtrl'
            })
    });

var global_id = 0;

var setGlobal_id = function (data) {
    global_id = data;
};
var admin = function () {
    return true;
}

//LISTAS
angular.module("competicao").controller("listCtrl", function ($scope, $http) {
    $scope.users = [];
    var loadUsers = function () {
        $http.get('http://localhost:8000/users').success(function (data) {
            //  $scope.users = data;
            console.log('listCtrl, comentado no código app.js linha 24 ' + data);
        });
    };
    loadUsers();
});

angular.module("competicao").controller("listCompetitionCtrl", function ($scope, $http) {

    var loadUsers = function () {
        var url = 'http://localhost:8000/competition/list';
        $http.get(url).success(function (data) {
            $scope.competition = data;
        });
    };
    $scope.delete = function (id) {
        var url = 'http://localhost:8000/competition/destroy/' + id;
        //alert(url);

        $http.delete(url).success(function (data) {
            alert(data);
        });

    }
    loadUsers();
});

//var teste1 = function(){
//    alert(bangalo);
//};

//var setTeste = function(date){
//    bangalo = date;

//var bangalo = "Candelosbert";

angular.module("competicao").controller("cadUserCtrl", function ($scope) {
    $scope.nome = 0;
    $scope.add = function () {

    };
});

angular.module("competicao").controller("userrepositoryCtrl", function ($scope, $http) {

    var loadRepositorys = function () {
        $http.get('http://localhost:8000/repository/index/').success(function (data) {
            $scope.repositorys = data;
        });
    };

    $scope.admin = function () {
        return false;
    };

    $scope.user_id = global_id;

    var loadUserRepositorys = function () {
        var url = 'http://localhost:8000/userrepository/show/' + $scope.user_id;
        $http.get(url).success(function (data) {
            $scope.userRepositorys = data;
        }).error(function () {
            alert('Lista de repositório vasia!!!');
        })
    };
    loadRepositorys();
    loadUserRepositorys();

});


angular.module("competicao").controller("competitionCtrl", function ($scope, $http) {

    var loadUsers = function () {
        //$scope.competition.hoursBegin;

        $scope.users = [
            {name: 'jose'},
            {name: 'Felipe'},
            {name: 'Tonho'},
            {name: 'Fulaniho de tal pereira assdsdssadfsafsafaffasdfasdfs   '}
        ];
    };

    var loadProblens = function () {
        $scope.problem = [
            {name: 'AK25'},
            {name: 'Casinha'},
            {name: 'Padras'}
        ];
    };

    $scope.destroy = function (data) {
        var url = 'http://localhost:8000/competition/destroy/' + global_id;
        $http.delete(url).success(function (data) {
            alert(data);
        }).error(function () {
            alert('Opss!!! ' + data);
        });
    };
    loadProblens();
    loadUsers();
});


angular.module("competicao").controller("problemCtrl", function ($scope, $http) {

    var loadProblemCompetition = function () {
        var url = 'http://localhost:8000/problem/showProblemCompetition/' + global_id;
        $http.get(url).success(function (data) {
            //alert(data);
            $scope.problems = data;
        }).error(function () {
            alert('OpS :( ' + data);
        })
    };
    var loadRepositorys = function () {
        $http.get('http://localhost:8000/repository/index/').success(function (data) {
            $scope.repositorys = data;
        });
    };
    loadRepositorys();
    loadProblemCompetition();
});

angular.module("competicao").controller("competitionUserCtrl", function ($scope, $http) {

    var loadUsermCompetition = function () {
        var url = 'http://localhost:8000/competition/users/' + global_id;
        $http.get(url).success(function (data) {
            //alert(data);
            $scope.users = data;
        }).error(function () {
            alert('OpS!!! :( ' + data);
        })
    };
    var loadUserAll = function () {
        var url = 'http://localhost:8000/users';
        $http.get(url).success(function (data) {
            $scope.allUsers = data;
        }).error(function () {
            alert('OpS!!! :( ' + data);
        })
    };
    loadUserAll();
    loadUsermCompetition();
});
