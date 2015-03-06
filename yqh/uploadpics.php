<?php

if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "application/octet-stream")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 50000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["file"]["error"] . "";
    }
 
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    //echo "file: " .$_FILES["file"]["name"]. "<br />";

    
    if (file_exists("pics/" . $_FILES["file"]["name"]))
      {
   
   
   
      //echo $_FILES["file"]["name"] . " already exists auto rename by the time ";
      
      $_FILES["file"]["name"] = date("Y-m-d") . rand() . ".png";
      
       move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath .= "http://card.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#";  

      echo  $_picpath;    
   
      }
    else
      {
      
      $_FILES["file"]["name"] = date("Y-m-d") . rand() . ".png";
       
      move_uploaded_file($_FILES["file"]["tmp_name"],
      
      "pics/" . $_FILES["file"]["name"]);
      
      
      $_picpath .= "http://card.allappropriate.com/" . "pics/" . $_FILES["file"]["name"]."#";  
      
      
      echo  $_picpath;
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }







?>