<br>
        <center style="color:white"></center>
    <br> 
    <br> 
    <br> 
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.js"></script> 
	
	<script>
	function printDiv(){
		var printContents = document.getElementById("printableArea").innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		console.log("ditekan");
	}
	</script>
</body>

</html>