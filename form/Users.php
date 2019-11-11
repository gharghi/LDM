<?php
$id='P11';
$lv='1';
 include('../global/header.php'); ?>
<span class="pages" id="MN22"></span> 
<!--[if !IE]>start info<![endif]-->
<div id="info"> 
  <!--[if !IE]>start section<![endif]-->
  <div class="section"> 
    <!--[if !IE]>start section inner <![endif]-->
    <div class="section_inner">
      <?php
echo " <script>
function arraySearch(arr,val) {
   for (var i=0; i<arr.length; i++)
       if (arr[i] == val)                    
           return i;
   return false;
 }
  $(function() {
    var availableTags=new Array(); 
	var array1=new Array();";
$DB=new Database;
$DB->Connect();
$DB->Select('User','UserID,Name',' NDeleted=1');
$num=$DB->Select_Rows;
$i=0;
while ($i < $num) {
	$UserID=$DB->Select_Result[$i]['UserID'];
	$Name=$DB->Select_Result[$i]['Name'];
	
	echo 'array1["'.$Name.'"]="'.$UserID.'";
	availableTags['.$i.']="'.$Name.'";';
	$i++;
	}	
   echo "
    $( '#tags' ).autocomplete({
      source: availableTags,
	 select: function(event, ui ){
		 var Name=$('#tags').val();
		 var ID=array1[Name];
		  $('#Valid').val(1);
		  $('#btn').attr('onclick','loaduserprofile('+ID+'); return false;');
	  }
    });
  });
  function submitform()
  {
	   var valid=$('#Valid').val();
		 if (valid!=0)
		 {
		  $('#btn').attr('onclick','loaduserprofile(ID); return false;');
		 }
		 else {
			 $('li.red#11').show().delay(2000).fadeOut(4000);
		 }
  }
  </script>";
 $DB->Disconnect();
 $error=new error;
$error->begin();
$error->row('red','11',_ERROR_USER_NOTFOUND);
$error->finish();
?>
     
      <!--[if !IE]>start forms<![endif]-->
      <form    class="search_form general_form">
        <!--[if !IE]>start fieldset<![endif]-->
        <fieldset>
          <!--[if !IE]>start forms<![endif]-->
          <div class="forms">
            <h3><?php echo _SEARCH_QUICK_ACCESS; ?></h3>
            <input type="hidden" id="Valid" value="0" />
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <label><?php echo _SEARCH_NAME; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="input_wrapper">
                  <input class="text"  id="tags" type="text"  />
                  </span></div>
              </div>
            </div>
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <div class="inputs">
               <span class="button2 blue_button search_button">
               <span>
               <span>
               <em>
               <span class="button_ico">
               </span><?php echo _SEARCH_SEARCH; ?>
               </em>
               </span>
               </span>
                <input  id="btn" onClick="submitform(); return false;" type="submit" />
                </span> 
                </div>
            </div>
            <!--[if !IE]>end row<![endif]--> 
          </div>
        </fieldset>
      </form>
    </div>
    <!--[if !IE]>end row<![endif]--> 
  </div>
  <!--[if !IE]>end section inner<![endif]--> 
</div>
<!--[if !IE]>end section<![endif]-->
</div>
<!--[if !IE]>end info<![endif]-->
<?php  include("../global/footer.php"); ?>