<form name="form1" method="post" action="" >
<table>
<tr><td>Num 1:</td><td><input type="text" value="150" name="num1" id="num1" /></td></tr>
<tr><td>Num 2:</td><td><input type="text" value="120" name="num2" id="num2" /></td></tr>
<tr><td>Sum:</td><td><input type="text" name="sum" id="sum" readonly /></td></tr>
<tr><td>Subtract:</td><td><input type="text" name="subt" id="subt" readonly /></td></tr>
</table>
</form>

<script>

$(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#num1, #num2").on("keydown keyup", function() {
        sum();
    });
});

function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
			var result = parseInt(num1) + parseInt(num2);
			var result1 = parseInt(num2) - parseInt(num1);
            if (!isNaN(result)) {
                document.getElementById('sum').value = result;
				document.getElementById('subt').value = result1;
            }
        }

</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
