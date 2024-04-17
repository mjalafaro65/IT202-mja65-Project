console.log("s vnd fv");

$(document).ready( () => {

    //product page confirmation
    $("#email_form").submit( (event) => {

        const confirmDelete = confirm("Are you sure you want to delete this product?");
        if(confirmDelete) {
            $("#email_form").submit();
        } else {
            event.preventDefault();
        }

    });


    $("#r").submit( () => {
        // clear text boxes

      });




///////// error messages after rest-> get rid of php validation?//////////////////////////////////////////////
    $("#reset_button").click( () => {
        // clear text boxes

        $("#category").val("");

        $("#code").val("");
        $("#name").val("");
        $("#description").val("");
        $("#list_price").val("");


        // reset span elemens
        $("#category").next().text("*");

        $("#code").next().text("*");
        $("#name").next().text("*");
        $("#description").next().text("*");
        $("#list_price").next().text("*");

       
        $("#category").focus();
      });
    
    

});
    