<html>
<body>
<h1>Update Books</h1>

<form action="adminupdatebookssubmit.php" method="post">
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanageauthors.php">Authors</a>

<a href="adminmanageusers.php">Users</a>
<a href="adminmanagepublishers.php">Publishers</a>
<a href="adminmanagecustomers.php">Customers</a>
<a href="adminmanagetransactions.php">transactions</a>
<a href="adminmanagelogout.php">Logout</a>

<p>Book Number:- <input type="text" name="bookno" size=20 value="" maxlength=20/>
</p>
<p>Book Name:- <input type="text" name="bookname" size="55" value="" maxlength="25" />
</p>
<p>First Author No:- <input type="text" name="firstauthor" size=20  value=""/>
</p>
<p>Second Author No:- <input type="text" name="secondauthor" size=20 value="" />
</p>
<p>Third Author No:- <input type="text" name="thirdauthor" size=20  value=""/>
</p>
<p>Fourth Author No:- <input type="text" name="fourthauthor" size=20 value=""/>
</p>
<p>Publisher Number No:- <input type="text" name="pno" size="55" value="" maxlength="25" />
</p>
<p>Category No:- <input type="text" name="categoryno" size=20 value="" maxlength=20/>
</p>
<p>ISBN:- <input type="text" name="isbn" size=20 value="" />
</p>
<p>Edition:- <input type="text" name="edition" size=20 value="" />
</p>
<p>Cost:- <input type="text" name="cost" size=20  value=""/>
</p>
<p><br><input type="submit" name="updatebooks" value="updatebooks" ></p>
</html>
</body>