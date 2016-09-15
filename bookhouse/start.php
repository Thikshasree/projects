<form action="addtocart.php" method="post"> 
	  <tr> 
	    <td> </td> 
	    <td><strong>Quantity</strong></td> 
	    <td><label> 
	     <select name="qty">; 
	<?php 
	  for($i=1; $i<12; $i++) { 
	 echo '<option value='.$i.'>'.$i.'</option>'; 
	     } 
	?> 
	 </select> 
	    </label> 
	   </td> 
	    <input name="bid" type="hidden" value="<?php echo $row['bookno']?>" /></td> 
	  </tr> 	  <tr> 
	    <td> </td> 
	    <td> </td> 
	    <td><label> 
	      <input type="submit" name="submit" value="Add to Cart" /> 
	    </label></td> 
	  </tr> 
	  </form> 