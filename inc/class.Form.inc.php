<?php
class form
{
   public $Form_ID;
   private $Form_Action;
   private $Form_Label;
   private $Form_Method;
   private $Form_Name;
   public static $Element_Number;
   public $Number;
   public function Body($Form_Label,$Form_Action='',$Form_ID='Form_1',$Form_Method='GET',$Form_Name='New_Form')
   {
	   $this->Form_ID=$Form_ID;
	   $this->Form_Action=$Form_Action;
	   $this->Form_Label=$Form_Label;
	   $this->Form_Name=$Form_Name;
	   $this->Form_Method=$Form_Method;
	   $this->Element_Number=1;
	   $this->Number=$this->Form_ID.$this->Element_Number;
	}
   
   public function Text($Label,$Name,$PlaceHolder='',$Function='',$Error_Message='',$Event='onblur')
   {
	
	   echo "<!--[if !IE]>start row<![endif]-->
		<div class='row'>
			<label>",$Label,":</label>
			<div class='inputs'>
				<div align='right'><span class='input_wrapper'>
				<input  class='text' name='",$Name,"' type='text' placeholder='",$PlaceHolder,"'";
				 echo $Event.'="'.$Function.' " />';
				 echo "
				</span>
				<span id='",$this->Form_ID.$this->Element_Number,"' class='system positive' >&nbsp;</span>
				 <span id='",$this->Form_ID.$this->Element_Number,"' class='system negative'>",$Error_Message,"</span>
                <span id='",$this->Form_ID.$this->Element_Number,"E' class='system negative'>این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->";
		$this->Element_Number++;
	}
	
	
   
      public function TextArea ($Label,$Name,$PlaceHolder='')
   {

	   
	   
	   echo "<!--[if !IE]>start row<![endif]-->
		<div class='row'>
			<label>",$Label,":</label>
			<div class='inputs'>
				<div align='right'><span class='input_wrapper textarea_wrapper'>
				<textarea  class='text' name='",$Name,"'  placeholder='",$PlaceHolder," '/></textarea>
				</span>
				<span id='",$this->Form_ID.$this->Element_Number,"' class='system positive' >&nbsp;</span>
				<span id='",$this->Form_ID.$this->Element_Number,"E' class='system negative'>این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->";
		$this->Element_Number++;
	}

   public function Active ($Label,$Name)
   {
	   echo "		<!--[if !IE]>start row<![endif]-->
		<div class='row'>
			<label>",$Label,":</label>
			<div class='inputs'>
				<div align='right'><span class='view_wrapper_boolen'>
                <span class='approved' id='Active_Button1_",$this->Form_ID.$this->Element_Number,"' onclick='Change_Active_Button();'>
                <input type='hidden' value='1' name='",$Name,"'  />
                
				<a>فعال</a>
				</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->";
		//Javascripts start here------>
		echo "<script language='javascript'>
		function Change_Active_Button() {
	var CID='#Active_Button1_",$this->Form_ID.$this->Element_Number,"';
	if(($(CID+' input').val())==1) {
			$(CID).removeClass('approved').addClass('pending');
			$(CID+' a').html('غیر فعال');
			$(CID+' input').val(0);
	}
	else if(($(CID+' input').val())==0) {
			$(CID).removeClass('pending').addClass('approved');
			$(CID+' a').html('فعال');
			$(CID+' input').val(1);
	}
		}
		</script>";
		$this->Element_Number++;
	}


   public function Button ($Label,$Icon='add_button',$Action='javascript:void(0);',$Name='Submit')
   {
	   echo " <!--[if !IE]>start row<![endif]-->
		<div class='row'>
			<div class='inputs'>
			<span class='button2 blue_button ",$Icon,"'><span><span><span class='button_ico'><em></span>",$Label,"</em></span></span><input form='",$this->Form_Name,"' name='",$Name,"' type='submit' onclick='",$Action,"'/></span><span id='loading_button'></span>
			</div>
		</div>
		<!--[if !IE]>end row<![endif]-->";
		$this->Element_Number++;
	}
   

   public function Inc_Element_N()
   {
	   $this->Element_Number++;
	   return $this->Element_Number;
   }
   
   
   
   
     public function Start()
    {
         echo "<!--[if !IE]>start forms<![endif]-->
   <form name='",$this->Form_Name,"' id='".$this->Form_ID."' method='".$this->Form_Method."' Action='".$this->Form_Action."' class='search_form general_form'>
	<!--[if !IE]>start fieldset<![endif]-->
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class='forms'><h3>",$this->Form_Label,"</h3>";
    }
	
	public function Finish()
	{
		echo "	</div>
	<!--[if !IE]>end forms<![endif]-->
	</fieldset>
	<!--[if !IE]>end fieldset<![endif]-->
	</form>
	<!--[if !IE]>end forms<![endif]-->";
	}
}
?>