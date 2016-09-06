<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 商品分类 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?=_PUBLIC?>/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="<?=_PUBLIC?>/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?=site_url('admin/categoryc/addA')?>">添加分类</a></span>
<span class="action-span1"><a href="<?=site_url('admin/indexc/index')?>">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
<!-- start ad position list -->
	<div class="list-div" id="listDiv">
		<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
			<tbody>
				<tr>
					<th>分类名称</th>
					<th>商品数量</th>
					<th>数量单位</th>
					<th>导航栏</th>
					<th>是否显示</th>
					<th>价格分级</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
        <?php  foreach ($cats as $cat) :?>

				<tr align="center" class="0" id="0_1">
					<td align="left" class="first-cell">
           <?php echo str_repeat("&nbsp;&nbsp;&nbsp;",$cat['level']); ?>
						<img src="<?=_PUBLIC?>//admin/images/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:0em" onclick="rowClicked(this)">
						<span><a href="goods.php?act=list&amp;cat_id=1"><?php  echo $cat['cat_name'] ; ?></a></span>
					 </td>
					<td width="10%"><?php  echo $cat['unit'] ; ?></td>

					<td width="10%"><span onclick="listTable.edit(this, 'edit_measure_unit', 1)" title="点击修改内容" style=""><?php  echo $cat['unit'] ; ?></span></td>
					<td width="10%"><img src="<?=_PUBLIC?>/admin/images/no.gif" onclick="listTable.toggle(this, 'toggle_show_in_nav', 1)"><?php  echo $cat['is_show'] ; ?></td>
					<td width="10%"><img src="<?=_PUBLIC?>/admin/images/yes.gif" onclick="listTable.toggle(this, 'toggle_is_show', 1)"><?php  echo $cat['is_show'] ; ?></td>
					<td><span onclick="listTable.edit(this, 'edit_grade', 1)" title="点击修改内容" style=""><?php  echo $cat['sort_order'] ; ?></span></td>
					<td width="10%" align="right"><span onclick="listTable.edit(this, 'edit_sort_order', 1)" title="点击修改内容" style=""><?php  echo $cat['sort_order'] ; ?></span></td>
					<td width="24%" align="center">
						<!-- <a href="category.php?act=move&amp;cat_id=1">转移商品</a> | -->
           <!--  <?=site_url('admin/categoryc/edita/'.$cat['cat_id'])?> -->
						<a href="<?=site_url('admin/categoryc/editA/'.$cat['cat_id'])?>">编辑</a> |
						<a href="<?=site_url('admin/categoryc/deleteA/'.$cat['cat_id'])?>">移除</a>
					</td>
				</tr>
      <?php  endforeach; ?>
	<!--  start 这些代码是显示使用，没有格式化 开发时可删除-->
   
  	<!--  end这些代码是显示使用，没有格式化 开发时可删除-->
	</tbody>
  </table>
</div>
</form>



<div id="footer">
	FOR PRACTICE33 -  </div>

 <script>
	/**
 * 折叠分类列表
 */
var imgPlus = new Image();
imgPlus.src = "<?=_PUBLIC?>/admin/images/menu_plus.gif";

function rowClicked(obj)
{
  // 当前图像
  img = obj;
  // 取得上二级tr>td>img对象
  obj = obj.parentNode.parentNode;
  // 整个分类列表表格
  var tbl = document.getElementById("list-table");
  // 当前分类级别
  var lvl = parseInt(obj.className);
  // 是否找到元素
  var fnd = false;
  var sub_display = img.src.indexOf('menu_minus.gif') > 0 ? 'none' : 'table-row' ;
  // 遍历所有的分类
  for (i = 0; i < tbl.rows.length; i++)
  {
      var row = tbl.rows[i];
      if (row == obj)
      {
          // 找到当前行
          fnd = true;
          //document.getElementById('result').innerHTML += 'Find row at ' + i +"<br/>";
      }
      else
      {
          if (fnd == true)
          {
              var cur = parseInt(row.className);
              var icon = 'icon_' + row.id;
              if (cur > lvl)
              {
                  row.style.display = sub_display;
                  if (sub_display != 'none')
                  {
                      var iconimg = document.getElementById(icon);
                      iconimg.src = iconimg.src.replace('plus.gif', 'minus.gif');
                  }
              }
              else
              {
                  fnd = false;
                  break;
              }
          }
      }
  }

  for (i = 0; i < obj.cells[0].childNodes.length; i++)
  {
      var imgObj = obj.cells[0].childNodes[i];
      if (imgObj.tagName == "IMG" && imgObj.src != '<?=_PUBLIC?>/admin/images/menu_arrow.gif')
      {
          imgObj.src = (imgObj.src == imgPlus.src) ? '<?=_PUBLIC?>/admin/images/menu_minus.gif' : imgPlus.src;
      }
  }
}
</script>
</body>
</html>