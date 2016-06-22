<?php 
error_reporting(1);
include_once 'dbConnect.php';

switch ($_REQUEST ['method']) {
	case 'getAuteurs':
		$res = $pdo->prepare('SELECT * FROM auteur');
		$res->execute();
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
		break;
	case 'getCountries':
		$res = $pdo->prepare('SELECT * FROM pays ORDER BY libelle_pays');
		$res->execute();
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
		break;
	case 'getDeprtsByIdCountry':
		$res = $pdo->prepare('SELECT * FROM departements WHERE id_pays = ?');

		$res->execute(array($_REQUEST['id_pays']));
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
		break;
	case 'getCitiesByIdDeprt':
		$res = $pdo->prepare('SELECT * FROM communes WHERE id_deprt = ?');
		$res->execute(array($_REQUEST['id_deprt']));
		$res = $res->fetchAll(PDO::FETCH_ASSOC);
		break;
	default:
		break;
}
echo json_encode($res);