var app = angular.module("MonApplication", 
	[
	"ngRoute", 
	"ngMessages"
	]
);

app.config(function($routeProvider) {
	$routeProvider.when('/', {
		templateUrl : 'app/views/accueil.html',
		controller : 'accueilController'
	})
	.when('/form', {
		templateUrl : 'app/views/formulaire.html',
		controller : 'formController'
	})
	.when('/auteurs', {
		templateUrl : 'app/views/auteurs.html',
		controller : 'auteursController'
	})
	.when('/auteur/:id_auteur', {
		templateUrl : 'app/views/auteur.html',
		controller : 'auteurController'
	});
})