function test(){
    let F_name = document.getElementById('name').value
    let Gender = document.querySelector('input[name="optradio"]:checked')
    let E_mail = document.getElementById('email').value
    let Contact = document.getElementById('co_number').value
    let Address = document.getElementById('address').value
    let Married = document.querySelector('input[name="optradio1"]:checked')
    let Dept = document.getElementById('dept').value
    let Desg = document.getElementById('designation').value
    let Password = document.getElementById('pwd').value

    
    if(!F_name){
        document.getElementById('name_error').innerText="Please Enter your Name"
        
    }else{
        document.getElementById('name_error').innerText=""
    }
    if(!Gender){
        document.getElementById('gender_error').innerText="Please select your Gender";
        
    }else{
        document.getElementById('gender_error').innerText=""
    }
    if(!E_mail){
        document.getElementById('mail_error').innerText="Please Enter your E-Mail";
        
    }else{
        document.getElementById('mail_error').innerText=""
    }
    if(!Contact){
        document.getElementById('number_error').innerText="Please Enter your Phone Number";
        
    }else{
        document.getElementById('number_error').innerText=""
    }
    if(!Address){
        document.getElementById('add_error').innerText="Please Enter your Address";
        
    }else{
        document.getElementById('add_error').innerText=""
    }
    if(!Married){
        document.getElementById('marry_error').innerText="Please Select your Marital Status";
    }else{
        document.getElementById('marry_error').innerText=""
    }
    if(!Dept){
        document.getElementById('dept_error').innerText="Please Select your Department";
        
    }else{
        document.getElementById('dept_error').innerText=""
    }
    if(!Desg){
        document.getElementById('desg_error').innerText="Please Select your Designation";
        
    }else{
        document.getElementById('desg_error').innerText=""
    }
    if(!Password){
        document.getElementById('desg_error').innerText="Please Select your Designation";
        
    }else{
        document.getElementById('desg_error').innerText=""
    }
}