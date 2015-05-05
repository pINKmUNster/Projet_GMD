<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
  <head>
    <title>
      EXEMPLE SQL
    </title>
  </head>
  <body>
    <?
foreach ($data AS $row )
{
?>
   label :
<? echo $row["label"]; ?>
 se CUI :
<? echo $row["se-cui"]; ?> <br/>
  se name :
<? echo $row["se-name"]; ?>
<?
}
?>
  </body>
</html>