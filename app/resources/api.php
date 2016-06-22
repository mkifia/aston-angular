<?php

/**
 * Service des gestion des appels rest
 */
class Core_Rest_Service {
	/**
	 * Constructeur
	 */
	public function __construct() {
	}

	/**
	 * Encodage en json
	 * @param  array $json Liste d'arguments
	 *	- string status [description]
	 *	- string result [description]
	 *	- string errors [description]
	 *	- string debug [description]
	 */
	public function json(array $json) {
		header('Content-Type: application/json');
		if ( !isset($json['status']) ) {
			throw new \Exception('$oServiceRest->return([...]) : status not-isset');
		}
		if ( !isset($json['result']) ) {
			throw new \Exception('$oServiceRest->return([...]) : result not-isset');
		}
		if ( !isset($json['errors']) ) {
			throw new \Exception('$oServiceRest->return([...]) : error not-isset');
		}
		if ( empty($json['debug']) ) {
			$json['debug'] = null;
		}
		if ( is_array($json['result']) ) {
			$json['result_count'] = count($json['result']);
		}
		echo json_encode($json);
    	exit;
	}

	/**
	 * Renvoi avec succès des données encodées en json
	 * @param  array $json Liste d'arguments
	 *	- string status [description]
	 *	- string result [description]
	 *	- string errors [description]
	 *	- string debug [description]
	 */
	public function returnSuccess(array $json) {
		if ( is_string($json['result']) ) {
			$json['result'] = [$json['result']];
		}
		$this->json([
		    'status'    => empty($json['status']) ? 0 : $json['status'],
		    'result'	=> $json['result'],
		    'errors'	=> [],
		    'debug'		=> empty($json['debug'])? null : $json['debug'],
		]);
	}

	/**
	 * Renvoi avec erreur des données encodées en json
	 * @param  array $json Liste d'arguments
	 *	- string status [description]
	 *	- string result [description]
	 *	- string errors [description]
	 *	- string debug [description]
	 */
	public function returnError(array $json) {
		if ( is_string($json['errors']) ) {
			$json['errors'] = [$json['errors']];
		}
		$json['status'] = empty($json['status']) ? -1 : $json['status'];
		$json['debug'] = empty($json['debug'])? null : $json['debug'];
	}
}
