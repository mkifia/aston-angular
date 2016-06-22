app.controller("MonCtrl", function($scope, $http) {
	
	$scope.user = { name: "Sebastien", lastName: "Olivier" };
	console.log('Contrôleur 1');
	$scope.prenom = 'toto';
	
});

app.controller("SonCtrl", function($scope, $http) {
	$scope.tab = [{name: "item1"}, {name: "item2"}, {name: "item3"}, {name: "item4"}, {name: "item5"}];
	$scope.action = function() {
		alert('Hello');
	}
		$scope.dateDuJour = new Date();

	$scope.$watch('prenom', function(newValue, oldValue) {
		console.log(newValue, oldValue);
	})

	$scope.carre = function(nombre) {
		return nombre*nombre;
	}

	$scope.getComments = function() {
		
	}
});

app.controller("accueilController", 
	function($scope) {
	console.log("accueilController");
});

app.controller("auteursController", 
	function($scope, $http) {
	console.log("auteursController");
	$http.get('app/resources/serveur.php', 
	{
		params: {method: 'getAuteurs'}
	}).then(function(result) {
		console.log(result.data);
		$scope.auteurs = result.data;
	})
});

app.controller("auteurController", 
	function($scope, $routeParams, $http) {
	console.log("auteurController", $routeParams.id_auteur);
	$http.get('app/resources/serveur.php', 
	{
		params: {method: 'getAuteurById', id_auteur:$routeParams.id_auteur}
	}).then(function(result) {
		console.log(result.data);
		$scope.auteur = result.data[0];
	})
})