<!DOCTYPE html>
<html ng-app="MonApplication">

<head>
    <meta charset="utf-8">
    <title>AngularJS</title>
    <style type="text/css">
    	.ma-class{
    		color: red;
    	}
    </style>
</head>

<body>

    <select ng-model="author_id" name="author_id">
        <option value="1">auteur 1</option>
        <option value="2">auteur 2</option>
        <option value="3">auteur 3</option>
        <option value="4">auteur 4</option>
    </select>
    <u>
        <li><a href="#/auteurs" title="">Get All Authors</a></li>
        <li><a ng-href="#/auteur/{{author_id}}" title="">Get Author</a></li>
    </u>

	<ng-view></ng-view>
	
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>
    <script type="text/javascript" src="app/config/app.js"></script>
    <script type="text/javascript" src="app/src/controllers/controller.js"></script>
</body>

</html>