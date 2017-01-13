<?php

class register implements interfaceRegister
{
		private $username;
		private $firstname;
		private $lastname;
		private $email;
		private $password;
		private $category;

		private $statement;
		private $clientRegister;
		private $result;



  public function __construct($username , $firstname , $lastname , $email , $password , $category)
  {
  	
	  	$this->username  = $username;
	  	$this->firstname = $firstname;
	  	$this->lastname  = $lastname;
	  	$this->password  = $password;
	  	$this->category  = $category;


  }
   public function storeUsers($MySQLConnection)
   {
   		$this->clientRegister = $MySQLConnection;

        #########################################
        ########## Prepare Statement  ###########
        #########################################

        $this->statement = $this->clientRegister->prepare("CALL InsertUsers(?,?,?,?,?,?)");

        #########################################
        ########### Bind Parameters  ############
        #########################################

        $this->statement->bind_param("ssssss", $this->username , $this->firstname , $this->lastname , $this->email, $this->password, $this->category);

        #########################################
        ########## Execute Statement  ###########
        #########################################

        $this->result = $this->statement->execute();

        #########################################
        ########### Close Statement  ############
        #########################################

        $this->statement->close();

        if($this->result)
        {
        	# Do something
        }
        else
        {
        	return FALSE;
        }

   }


}

 ?>
