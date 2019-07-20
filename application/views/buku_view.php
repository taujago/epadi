<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>DATA BUKU </p>
<table width="100%" border="0">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Judul</th>
    <th scope="col">Pengarang</th>
    <th scope="col">Penerbit</th>
  </tr>
  <?php foreach($record->result() as $row) :  ?>
  <tr>
    <th scope="col"><?php echo $row->id ?></th>
    <th scope="col"><?php echo $row->judul ?></th>
    <th scope="col"><?php echo $row->penulis ?></th>
    <th scope="col"><?php echo $row->penerbit ?></th>
  </tr>
  <?php endforeach;  ?>
  
</table>
<p>&nbsp;</p>
</body>
</html>