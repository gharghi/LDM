<?php
$id='P11';
$lv='1';
 include('../global/header.php'); ?>
 <span class="pages" id="MN11"></span>
      <!--[if !IE]>start info<![endif]-->
      <div id="info"> 
        <!--[if !IE]>start section<![endif]-->
        <div class="section"> 
<script src="visualize.jQuery.js"></script>
<link rel="stylesheet" type="text/css" href="visualize.css" /> 
<link rel="stylesheet" type="text/css" href="visualize-dark.css" /> 
<link rel="stylesheet" type="text/css" href="visualize-light.css" /> 


<script language="javascript">
$(document).ready(function() {
$('.table22').visualize({type:'pie',pieMargin:5,width:200}).appendTo('#chart2');
$('.table33').visualize({width:200}).appendTo('#chart1');
});

</script>
<div class="section_inner">
 <?php
 $DB= new Database;
 $DB->Connect();
 $DB->Select('Admin','AID,AUsername');
 $num=$DB->Select_Rows;
 $i=0;
 ?>
                <table class="table22" style=" display:none">
	<caption>نسبت ورود مدیرها</caption>
	<thead>
		<tr>
			
			<th scope="col">نام مدیر</th>
			<th scope="col">تعدلد لاگین</th>
			
		</tr>
	</thead>
	<tbody>
    <?php
	while($num > $i){
		$Admin[$i]=$DB->Select_Result[$i] ['AUsername'];
		$AIDD[$i]=$DB->Select_Result[$i] ['AID'];
		$i++;
	}
	$DB->disconnect();
	$j=0;
	while($num > $j)
	{
		$DB= new Database;
		$DB->Connect();
		$DB->Select('AdminLogin','count(AID) as cum',"AID=".$AIDD[$j]);
		$num=$DB->Select_Rows;
	echo "<tr>
			<th scope='row'>".$Admin[$j]."</th>
			<td>".$DB->Select_Result[$j] ['cum']."</td>
		</tr>
	";
	$j++;
	}
	$DB->disconnect();
	?>
	
	</tbody>
</table>
             

<?php
$DB= new Database;
$DB->Connect();
$DB->Select('Admin','AID');
$num1=$DB->Select_Rows;
$DB->disconnect();

$DB= new Database;
$DB->Connect();
$DB->Select('Hardware','HWID');
$num2=$DB->Select_Rows;
$DB->disconnect();

$DB= new Database;
$DB->Connect();
$DB->Select('Tower','TWID');
$num3=$DB->Select_Rows;
$DB->disconnect();
 
$DB= new Database;
$DB->Connect();
$DB->Select('Switch','SWID');
$num4=$DB->Select_Rows;
$DB->disconnect();

$DB= new Database;
$DB->Connect();
$DB->Select('User','UserID');
$num5=$DB->Select_Rows;
$DB->disconnect();

$DB= new Database;
$DB->Connect();
$DB->Select('IP','IPID');
$num6=$DB->Select_Rows;
$DB->disconnect();

 ?>
                <table class="table33" style=" display:none">
	<caption>اطلاعات درون دیتابیس</caption>
	<thead>
		<tr>
			
			<th scope="col"></th>
			<th scope="col"></th>
      	</tr>
	</thead>
	<tbody>
    <?php

	echo "<tr>
			<th scope='row'>مدیرها</th>
			<td>".$num1."</td>
			</tr>
			<tr>
			<th scope='row'>کاربرها</th>
			<td>".$num5."</td>
			</tr>
			<tr>
			<th scope='row'>مرکزها</th>
			<td>".$num3."</td>
			</tr>
			<tr>
			<th scope='row'>سوئیچ ها</th>
			<td>".$num4."</td>
			</tr>
			<tr>
			<th scope='row'>سخت افزارها</th>
			<td>".$num2."</td>
			</tr>
";
	
	?>
	
	</tbody>
</table>

<div id="chart1" style="float:right; "></div>
<div id="chart2" style="float:left; "></div>
</div>

        </div>
        <!--[if !IE]>end section<![endif]--> 
        
      </div>
      <!--[if !IE]>end info<![endif]-->
      
      <?php // include("../home/sidebar.php"); ?>
      <?php  include("../global/footer.php"); ?>