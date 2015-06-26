<form id="compiler">
  
  <textarea name='nail' id="input-form" rows="30" cols="100"></textarea><br></br>
  <textarea name = 'mail' id = "testcase-form" rows="2" cols="20"></textarea><br></br>
  <input type='submit' id="btn-submit" name='emailSubmit' value='submit' />
  <input type='reset' id="btn-clear-input" name='resetInputForm' value='clear'/>
</form>
<h4> testcase form</h4>
<form id="testcase">

</form>
 <h3> Output Form </h3>
<div id="output-form"></div>
<script src="jquery-1.11.3.min.js"></script>
<script>


$('form#compiler').on('submit', function (e) {
    e.preventDefault();
  $.ajax({
    type: 'post',
    url: 'newcompile.php',
    data: $('form#compiler').serialize(),
    success: function (result) { 
      $("#output-form").html(result);
    
    }
  });

});


</script>
