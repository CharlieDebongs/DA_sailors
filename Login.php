<?php

class Login implements interfaceLogin
{


	private $email;
	private $password;
	private $clientLogin;
	private $statement;
	private $result;


	public function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	public function CheckExistingUser($MySQLConnection)
	{

		$this->clientLogin = $MySQLConnection;

		##########################################
		###########  PREPARE STATEMENT  ##########
		##########################################

		$this->statement = $this->clientLogin->prepare("CALL retrieveUSer(?,?)");

		##########################################
		############  BIND PARAMETERS  ###########
		##########################################

		$this->statement->bind_param("ss",$this->email , $this->password);

		##########################################
		###########  EXECUTE STATEMENT  ##########
		##########################################

		$this->result = $this->statement->execute();

		##########################################
		############  CLOSE STATEMENT  ###########
		##########################################

		$this->statement->close();

		if($this->result)
		{
			#Do something
		}
		else
		{
			return FALSE;
		}

	}
}

?>