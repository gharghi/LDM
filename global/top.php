
<div id="head">
  <div class="inner">
    <h1 id="logo"><a href="home.php"><?php echo _DOCNAME; ?></a></h1>
    <!--[if !IE]>start user details<![endif]-->
<div id="user_details">
<ul id="user_details_menu">
  <li class="first1"><a href="../logout.php"><?php echo _LOGOUT; ?></a></li>
  <li><a href="" id="<?php echo $AID; ?>" onclick="AdminViewCurrent(this); return false;"><?php echo _MYPROFILE; ?></a></li>
  <li class="last"><strong><?php echo $AName; ?> </strong></li>
</ul>
<div id="server_details">
  <dl>
    <dt><?php echo _LASTENTRY; ?>:</dt>
    <dd>
      <?php
    $DB= new Database;
    $DB->Connect();
    $DB->Select('AdminLogin','IP',"AID='".$AID."'","Date desc ");
    echo $DB->Select_Result[0]['IP'];
   ?>
    </dd>
  </dl>
</div>
</div>
<!--[if !IE]>end user details<![endif]--> 

<!--[if !IE]>start main menu<![endif]-->
<div id="main_menu">
<ul>
  <li><a href="../home/home.php" id="MN1" ><span><span><?php echo _HOME; ?></span></span></a>
      </li>
  <li> <a href="../form/Users.php" id="MN2"><span><span><?php echo _USER; ?></span></span></a>
    <ul>
      <li><a href="../form/AddUser.php" id="MN21"><span><span><?php echo _ADD; ?></span></span></a></li>
      <li><a href="../form/Users.php" id="MN22"><span><span><?php echo _USER; ?></span></span></a></li>
      <li><a href="../form/SearchUser.php" id="MN23"><span><span><?php echo _SEARCH; ?></span></span></a></li>
    </ul>
  </li>
  <li ><a href="../javascript:loadpage(777);" ><span><span><?php echo _REPORT; ?></span></span></a>
    <ul>
      <li><a href="../javascript:loadpage('port/List.php');"><span><span><?php echo _PORT; ?></span></span></a></li>
      <li><a href="../javascript:loadpage('hardware/Search.php');" ><span><span><?php echo _HARDWARE; ?></span></span></a></li>
      <li><a href="../javascript:loadpage('ip/Search.php');"><span><span><?php echo _IPSEARCH; ?></span></span></a></li>
      <li><a href="../javascript:loadpage('ip/SearchDeleted.php');"><span><span><?php echo _IPHISTORY; ?></span></span></a></li>
      <li><a href="../javascript:loadpage('form/SearchAudit.php');"><span><span><?php echo _EVENTSEARCH; ?></span></span></a></li>
    </ul>
  </li>
        <li><a href="../javascript:loadpage('admin/list.php');"><span><span><?php echo _ADMIN; ?></span></span></a>
          <ul>
            <li><a href="../javascript:loadpage('admin/list.php');" class="selected" ><span><span><?php echo _VIEW; ?></span></span></a></li>
            <li><a href="../javascript:loadpage('admin/add.php');" ><span><span><?php echo _ADD; ?></span></span></a></li>
          </ul>
        </li>
        <li><a href="../javascript:loadpage(777); return false;"><span><span><?php echo _FACILITY; ?></span></span></a>
          <ul>
            <li><a href="../javascript:loadpage('proc/BSList.php');" class="selected" ><span><span><?php echo _SELL; ?></span></span></a></li>
            <li><a href="../javascript:loadpage('admin/add.php');" ><span><span><?php echo _BACKUP; ?></span></span></a></li>
          </ul>
        </li>
        <li><a href="../prefix/List.php" id="MN2"><span><span><?php echo _SETTING; ?></span></span></a>
          <ul>
            <li><a href="../javascript:loadpage('prefix/List.php');"><span><span><?php echo _IPRANGE; ?></span></span></a></li>
            <li><a href="../javascript:loadpage('tower/List.php');"><span><span><?php echo _TOWER; ?></span></span></a></li>
            <li><a href="../javascript:loadpage('switch/List.php');"><span><span><?php echo _SEITCH; ?></span></span></a></li>
            <li><a href="../javascript:loadpage('type/List.php');"><span><span><?php echo _HARDWARETYPE; ?></span></span></a></li>
          </ul>
        </li>
        <li><a href="../ " onclick="loadpage('support/home.php'); return false;"><span><span><?php echo _SUPPORT; ?></span></span></a>
          <ul>
            <li><a href="../javascript:loadpage('support/home.php');"><span><span><?php echo _REQUEST; ?></span></span></a></li>
            <li><a href="../javascript:loadpage('support/list.php');"><span><span><?php echo _TICKETLIST; ?></span></span></a></li>
          </ul>
        </li>
        <li><a href="../javascript:loadpage('global/About.php');" ><span><span><?php echo _ABOUT; ?></span></span></a> </li>
      </ul>
    </div>
    <!--[if !IE]>end main menu<![endif]--> 
    
  </div>
</div>
