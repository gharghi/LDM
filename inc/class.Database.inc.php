<?php
class Database
{

	//Private Variables
	
	private static $DB_Host; 
	private static $DB_User; 
	private static $DB_Pass; 
	public static $DB_Name;
	private $Status; //Hold the Status of connection
	private $Con;  //Hold the Active Connection
	//Public Variables
	public $Select_Result;
	public $Select_Rows;
	public $Query;
	public $Insert_ID;
	
	public function Set($Host,$User,$Pass,$Name)
	{

		$this->DB_Host=$Host;
		$this->DB_User=$User;
		$this->DB_Pass=$Pass;
		$this->DB_Name=$Name;
	}
	
    public function Connect()   
	{
        if(!$this->Status)
        {
            $this->Con = mysqli_connect('localhost','shahin_ldm','Cc3Dd44','shahin_ldm');
            if($this->Con)
            {
                $this->Status = true; 
                return true; 
               
            } else
            {
                return false; 
            }
        } else
        {
            return true;  
		}
	}
	
    public function Disconnect()    
	{
		if($this->Status)
    	{
        	if(mysqli_close($this->Con))
        	{
           		$this->Status = false; 
            	return true; 
        	}
        	else
       		{
            	return false; 
        	}
   		}   
	}
	
    public function Select($Table, $Rows = '*', $Where = null, $Order = null)        
	{
		 $Query = 'SELECT '.$Rows.' FROM '.$Table;
        if($Where != null)
            $Query .= ' WHERE '.$Where;
        if($Order != null)
            $Query .= ' ORDER BY '.$Order;$this->Query=$Query;
		$Result = mysqli_query($this->Con,$Query);
		if($Result){
		$this->Select_Rows=mysqli_num_rows($Result);
		$this->Select_Result=mysqli_fetch_all($Result,MYSQLI_ASSOC);
		}
		else
		{
			$this->Select_Rows=FALSE;
			return FALSE;
		}
		mysqli_free_result($Result);
	}
	
	
    public function Insert($Table,$Fields,$Values)        
	{
		$Query= "INSERT INTO `{$Table}` ( ".$Fields." ) VALUES  ".$Values; 
		$Result = mysqli_query($this->Con,$Query);
		if ($Result)
		{
			$this->Insert_ID=mysqli_insert_id($this->Con);
			return TRUE; 
        } 
		else 
		{
			return FALSE;
		}
	}
    public function Delete($Table,$Fields,$ID)        
	{   
		$Query= "DELETE FROM `{$Table}` WHERE ".$Fields." = ".$ID; 
		$Result = mysqli_query($this->Con,$Query);
		if ($Result)
			return TRUE;
		else
		return FALSE;
	}
    public function Update($Table,$Set,$Where)    
	{
		$Query = "UPDATE `{$Table}` SET ";
		foreach($Set as $key=>$value){
			$Query .= "`{$key}` = '{$value}', ";
		}
		$Query = substr($Query, 0, -2);
		// WHERE
		$Query .= ' WHERE '.$Where;
		$Result = mysqli_query($this->Con,$Query);
		if ($Result)
			return TRUE;
		else
		return FALSE;
	}
	
	public function Last_ID() {
        if ($id = mysql_insert_id($this->Con)) {
            return $id;
        } else {
            return false;
        }
    }
 
 public function Escape($string)    
	{
		return stripslashes(mysqli_real_escape_string($this->Con,$string));
	}
}
?>