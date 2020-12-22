<!-- Conexão com o BD Mysql, utilizando PDO. Toda vez que for necessário acessar o banco esta folha será invocada. -->
<?php

class db
{
	public $mysql = null;
	function __construct()

	{
		try {
			$this->mysql = $this->getConnection();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	private function getConnection()
	{
		$host = "localhost";
		$user  = "root";
		$pass = "";
		$db = "bredi";
		$charset = "utf8";

		$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
		$pdo = new pdo("mysql:host={$host};dbname={$db};charset={$charset}", $user, $pass, $opt);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}
}
