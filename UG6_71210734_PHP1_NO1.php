<?php
$n = 6;
if($n%2 != 0){
for ($i=1; $i<=$n; $i++)	
{	 
for($j=1;$j<=$i;$j++)	  
{	  	
echo "*";	 
}	  	
echo "<br/>";   	
}  
}
else{
for($i=0;$i<=$n;$i++)
{	 
for($j=$n-$i;$j>=1;$j--)
{	  	
echo "*";	 
}	  	
echo "<br/>";   	
}  
}
?>
