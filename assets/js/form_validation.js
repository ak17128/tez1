<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
 $(document).ready(function() {
   $.validator.addMethod("lettersOnly", function(value, element) {
      return this.optional(element) || /^[a-zA-Z]+$/.test(value);  // Regex to allow only letters
    }, "Please enter valid Name");
   $('#myForm').validate({
     rules:{
       firstname: {
         required: true,
         lettersOnly: true,
         minlength: 4,
         maxlength: 15
       }
     },
     messages:{
       firstname: {
         required: "Name is required !",
         lettersOnly: "Enter valid name !",
         minlength: "at least 4 characters long !",
         maxlength: "No more than 15 characters long !"
       }
     },
     errorPlacement: function(error, element) {
       error.addClass('text-danger');
       error.insertAfter(element);
     },
     highlight: function(element) {
       $(element).addClass('is-invalid');
     },
     unhighlight: function(element) {
       $(element).removeClass('is-invalid');
     }
   });
 });
</script>
