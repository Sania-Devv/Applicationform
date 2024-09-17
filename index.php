<?php
include('connection.php');

extract($_POST);

if(isset($is_submit)){
    // for validation
    if(isset($name)&& $name ==""){
        $error['name'] ="Required plz";
    }
// full name
    if(isset($full_name) && $full_name ==""){
        $error['full_name'] ="Required";
    }
    
    if(isset($parent_name) && $parent_name ==""){
        $error['parent_name'] ="Required";
    }
    
    if(isset($address) && $address ==""){
        $error['address'] ="Required";
    }

    
    if(isset($gender) || (isset($gender) && $gender == '')){
        $error['gender'] = "Required";
    }
    // duplication
    if(isset($phone) && $phone ==""){
        $error['phone'] ="Required"; 
    }
    else{
        echo "test";die;
        

        $sql = "SELECT * FROM users WHERE phone = '".$phone."'";
        if(isset($mode) && $mode == 'edit'){
            $sql .= " id != '".$id."'";
        }
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $error['phone'] = "This phone is already exist";
        }
    }
   
    if(isset($email) && $email ==""){
        $error['email'] ="Required";
    }

    if(isset($date) && $date ==""){
        $error['date'] ="Required";
    }

    if(isset($cnic_no) && $cnic_no ==""){
        $error['cnic_no'] ="Required";
    }
    if(isset($salary) && $salary ==""){
        $error['salary'] ="Required";
    }
    
    if(isset($date_of_birth) && $date_of_birth ==""){
        $error['date_of_birth'] ="Required";
    }
    if(isset($detail) && $detail ==""){
        $error['detail'] ="Required";
    }
    
}
?>
<!-- link style -->
  <link rel="stylesheet" href="style.css">  
    
  <h1>Application Information</h1>
    <form method="post" action="">
        <input type="hidden" name="is_submit" value="y"/>
        <div class="row">
        <div class="col12 all_col">
            <label for="name"> <b>Position Applied For: 
            <span class="color_red">*<?php
                if(isset($error['name'])){
                    echo $error['name'];
                }
                ?></span>
            </b> </label><br>
            <input class="inputtext" type="text" name="name" id="name" value="<?php
            if(isset($name)){
            echo $name;
            }
            ?>"/>
        </div>
    </div> 
    <div class="row">
        <div class="col4 all_col"> 
            <label for="full_name"> <b>Full Name: <span class="color_red">*
                <?php
            if(isset($error['full_name'])){
                echo $error['full_name'];
            }
            ?></span></b> </label><br>
            <input class="inputtext" type="text" name="full_name" id="full_name" value="<?php
            if(isset($full_name)){
                echo $full_name;
            }
            ?>" />
        </div>
        <div class="col4 all_col">
            <label for="parent_name"> <b>Parent Name:<span class="color_red">*<?php
            if(isset($error['parent_name'])){
                echo $error['parent_name'];
            }
            ?></span> </b> </label><br>
            <input class="inputtext" type="text"  name="parent_name" id="parent_name" value="<?php
             if(isset($parent_name)){
                echo $parent_name;
            }
            ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col12 all_col">
            <label for="address"> <b>Address: <span class="color_red">*<?php
            if(isset($error['address'])){
                echo $error['address'];
            }
            ?></span></b> </label><br>
            <input class="inputtext" type="text" id="address" name="address" value="
            <?php
            if(isset($address)){
               echo $address;
           }
            
            ?>"/>
        </div>
    </div>
    
    <div class="row">
        <div class="col4 all_col">
            <label for="phone"> <b>Phone:  <span class="color_red">*<?php
            if(isset($error['phone'])){
                echo $error['phone'];
            }
            ?></span></b> </label><br>
            <input class="inputtext" type="number"  name="phone" id="phone" value="<?php
            if(isset($phone)){
               echo $phone;
           }
            
            ?>"/>
        </div>
        <div class="col4 all_col">
            <label for="email"> <b>Email:  <span class="color_red">*<?php
            if(isset($error['email'])){
                echo $error['email'];
            }
            ?></span> </b> </label><br>
            <input class="inputtext" type="text" id="email" name="email" value="<?php
            if(isset($email)){
               echo $email;
           }
            
            ?>"/>
        </div>
        <div class="col4 all_col">
            <label for="gender"> <b>Gender: <span class="color_red">*<?php
              if(isset($error['gender'])){
                echo $error['gender'];
            }
            ?>
            </span>
         </b> </label><br>
            <div class="gender-options">
                <input type="radio" id="gender"  name="gender" value="male"<?php
                if(isset($gender) && $gender == 'male'){
                    echo"checked";
                }
                ?>>
            <b>Male</b>&nbsp; &nbsp; 
        <input  type="radio" id="gender"  name="gender" value="female" <?php
                if(isset($gender) && $gender == 'female'){
                    echo"checked";
                }
                ?>>
            <b>Female</b>
            </div>
        </div>   
    </div>

    <div class="row">
        <div class="col4 all_col"> 
            <label for="date"> <b>Joining Date: <span class="color_red">*<?php
            if(isset($error['date'])){
                echo $error['date'];
            }
            ?></span>
                 </b> </label><br>
            <input class="inputtext" type="date" id="date" name="date" value="<?php
            if(isset($date)){
               echo $date;
           } ?>"/>
        </div>
        <div class="col4 all_col">
            <label for="cnic_no"> <b>CNIC No:
                <span class="color_red">*<?php
            if(isset($error['cnic_no'])){
                echo $error['cnic_no'];
            }
            ?></span>
            </b> </label><br>
            <input class="inputtext" type="number" id="cnic_no" name="cnic_no" value="<?php
            if(isset($cnic_no)){
               echo $cnic_no;
           }
           ?>"/>
        </div>
        <div class="col4 all_col">
            <label for="salary"> <b>Desired Salary:
                <span class="color_red">*<?php
            if(isset($error['salary'])){
                echo $error['salary'];
            }
            ?></span>
            </b> </label><br>
            <input class="inputtext" type="number" id="salary" name="salary" value="<?php
            if(isset($salary)){
               echo $salary;
           }
           ?>"/>
        </div>
        </div>    
        
    <div class="row">
        <div class="col4 all_col">
            <label for="status"> <b>Marital Status:</b> </label><br>
     <select class="inputtext" type="text"  id="status"  name="status">
             <option value="single">Single</option>
             <option value="single">Married</option>
            </select> 
        </div>
        <div class="col4 all_col">
            <label for="no_of_children"> <b>No Of Children:</b> </label><br>
            <input class="inputtext" type="number" id="no_of_children" name="no_of_children"  value="">
        </div>
        <div class="col4 all_col">
            <label for="date_of_birth"> <b>Date Of Birth: <span class="color_red">*<?php
            if(isset($error['date_of_birth'])){
                echo $error['date_of_birth'];
            }
            ?></span></b> </label><br>
            <input class="inputtext" type="date" id="date_of_birth" name="date_of_birth" value="<?php
            if(isset($date_of_birth)){
               echo $date_of_birth;
           }
            
            ?>"/>
        </div>
        </div>  

        <div class="row">
            <div class="col12 all_col">
                <label for="detail"><b> Detail if you have any medical issue::
                    <span class="color_red">*<?php
            if(isset($error['detail'])){
                echo $error['detail'];
            }
            ?></span>
                </b></label><br>
                <input class="inputtext" type="text" id="detail" name="detail" value="<?php
            if(isset($detail)){
               echo $detail;
           }
            
            ?>"/>
            </div>
        </div>
        <h1>Education</h1>

        <div class="row">
            <div class="col6 all_col"> 
                <label for="board"> <b>Intermediate Board: 
                </b> </label><br>
                <input class="inputtext" type="text" id="board" name="board"  value="">
            </div>
            <div class="col6 all_col">
                <label for="group"> <b>Inter Group:
                </b> </label><br>
                <input class="inputtext" type="text" id="group" name="group"  value="">
            </div>
        </div>
       
        <div class="row">
            <div class="col6 all_col"> 
                <label for="inter_to"> <b>Inter To: 
                </b> </label><br>
                <input class="inputtext" type="text" id="inter_to" name="inter_to" value="">
            </div>
            <div class="col6 all_col">
                <label for="inter_from"> <b>Inter From: 
                </b> </label><br>
                <input class="inputtext" type="text" id="inter_from" name="inter_from" value=""> 
            </div>
        </div>

        <div class="row"></div>
            <div class="col6 all_col"> 
                <label for="uni"> <b>University:
                </b> </label><br>
                <input class="inputtext" type="text" id="uni" name="uni" value="">
            </div>
            <div class="col6 all_col">
                <label for="city"> <b>City:
                </b> </label><br>
                <input class="inputtext" type="text" id="city" name="city"  value="">
            </div>
        </div>
       
        <div class="row">
            <div class="col4 all_col">
                <label for="from_city"> <b>From: 
                </b> </label><br>
                <input class="inputtext" type="text" id="from_city" name="from_city" value="">
            </div>
            <div class="col4 all_col">
                <label for="name_to"> <b>To: 
                </b> </label><br>
                <input class="inputtext" type="text" id="name_to" name="name_to" value="">
            </div>
            <div class="col4 all_col">
                <label for="graduate"> <b>Are you  graduate: <span class="color_red">*<?php
            if(isset($error['graduate'])){
                echo $error['graduate'];
            }
            ?></span>
             </b> </label><br>
                <div class="gender-options">
                    <input type="radio" id="graduate"  name="graduate" 
                    value="<?php
            if(isset($graduate)){
               echo $graduate;
           }
            
            ?>"/><b>Yes</b>&nbsp; &nbsp; 
                    <input  type="radio" id="graduate"  name="graduate" value="<?php
            if(isset($graduate)){
               echo $graduate;
           }
            
            ?>"/><b>No</b>
                </div>
            </div>   
        </div>

        <div class="button-container">
            <input class="submit" type="submit" id="submit"value="Submit">
        </div>
    </form>
    
 
    
</body>
</html>