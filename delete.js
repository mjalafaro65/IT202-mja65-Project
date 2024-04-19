$(document).ready( () => {

    //product page confirmation
    $(".deleteProduct_form").submit( (event) => {

        const confirmDelete = confirm("Are you sure you want to delete this product?");
        if(!confirmDelete) {
            event.preventDefault();
        }

    });


    $("#detail_img").hover( ()=>{
        $("#detail_img").toggleClass('blackAndWhite')
        
    })



    //create page
    $("#create_from").submit( event => {
        let isValid=true;

        function validate(min,max,id){
           
            const value=$(id).val();
            console.log(value);
            if(value===""){
                $(id).next().text("This field is required");
                isValid=false;

            }else{
                if(!(id=="#list_price")){
                    console.log(value.length)
                    if(value.length<min){
                        $(id).next().text("This field should have a minimum of "+ min +" characters")
                            .css("fontSize","12px");
                        isValid=false;
                        
                    }
                    if(value.length>max){
                        $(id).next().text("This field should have a maximum of "+ max +" characters")
                             .css("fontSize","12px");
                        isValid=false;
                    }
                }else{
                    console.log("go in")
                    if(value<=min){
                        $(id).next().text("This field should not be negative or zero")
                            .css("fontSize","12px");
                        isValid=false;
                          
                        
                    }
                    if(value>=max){
                        $(id).next().text("This field should not exceed $100,000.")
                            .css("fontSize","12px");
                            
                        isValid=false;
                    }
                }        
            }

                
        }

        validate(4,10,"#code");
        validate(10,100,"#name");
        validate(10,255,"#description");
        validate(0,100000,"#list_price");

        if(isValid){
            $("#create_form").submit();
        }else{
            event.preventDefault();
        }


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
    