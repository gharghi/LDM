<?php
class error
{
	public function begin() {
		echo "<ul class='system_messages'>";
	}
	public function finish() {
		echo "</ul>";
	}
	public function row($type,$id,$message) {
		echo "<li class=".$type." id='".$id."'><span class='ico'></span><strong class='system_title'>".$message."</strong></li>";
	}
}
?>