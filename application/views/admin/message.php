<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Refresh" content ="<?php echo $wait;?> ;url=<?php echo $url;?>"/>
<link href="<?=_PUBLIC?>/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="<?=_PUBLIC?>/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
<span class="action-span1"><a href="index.php?act=main">SHOP管理中心 </a> </span><span id="search_id" class="action-span1"> - 系统信息  </span>
<div style="clear:both"></div>
</h1>
<div class="list-div">
  <div style="background:#FFF; padding: 20px 50px; margin: 2px;">
    <table align="center" width="400">
      <tr>
        <td width="50" valign="top">
        <!--  <img src="application/views/admin/images/information.gif" width="32" height="32" border="0" alt="information" /> -->
          <img src="<?=_PUBLIC?>/admin/images/warning.gif" width="32" height="32" border="0" alt="warning" />
       <!--   <img src="application/views/admin/images/confirm.gif" width="32" height="32" border="0" alt="confirm" /> -->
        </td>
        <td style="font-size: 14px; font-weight: bold"><?php echo $message;?></td>
      </tr>
      <tr>
        <td></td>
        <td id="redirectionMsg">
          <?php echo $wait;?> 秒之后跳转
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <ul style="margin:0; padding:0 10px" class="msg-link">       
            <li><a href=""></a></li>
          </ul>
        </td>
      </tr>
    </table>
  </div>
</div>



<div id="footer">
	FOR PRACTICE -  - 
</div>


</body>
</html>