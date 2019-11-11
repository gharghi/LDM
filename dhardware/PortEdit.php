<span class="input_wrapper blank">
<?php
$id='P13';
$lv='2';
$Faction='hardware/Edit.php';
$FID='F13';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
            echo "<select name='Port'>";
			echo "<option >انتخاب کنید</option>";
			$query1="select PNum,PortID from Port where SWID=$SWID and Active=0 ";
            $result1=mysql_query($query1);
            $num2=mysql_num_rows($result1);
                $i=0;
                while ($i < $num2) 
                    {
                $PortID=mysql_result($result1,$i,'PortID');
                $PNum=mysql_result($result1,$i,'PNum');
                $i++;
                echo "<option value='",$PortID,"'>",$PNum,'</option>';
                    }
            echo "</select>";
            ?>