<html>

<head>
  <title>Lakshmi Finance</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

    body {
      margin: 0;
      box-sizing: border-box;
    }

    /* CSS for header */
    .header {
      display: flex;
      /* justify-content: space-between; */
      align-items: center;
      background-color: #111010;
    }

    .header .logo {
      font-size: 25px;
      font-family:Georgia, 'Times New Roman', Times, serif;
      color: ;
      text-decoration: none;
      margin-left: 30px;
    }

    .nav-items {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background-color: black;
      margin-left: 250px;
      margin-right: 20px;
    }

    .nav-items a {
      text-decoration: none;
      color: #000;
      padding: 35px 20px;
      color: goldenrod;
    }
    #formcon {
                background-color: rgb(228, 125, 142);
                height: auto;
                margin-top: 40px;
                /* text-align: center; */
                align-items: center;
            }
            label {
                display: inline-block;
                width: 200px;
                margin-left: 200px;
            }
            input[type=text],input[type=password],input[type=date],input[type=file],input[type=numeric] {
                padding: 8px;
                height: 40px;
                margin-top: 10px;
                width: 400px;
            }
            input[type=submit] {
                padding: 5px;
                margin-top: 10px;
                /* margin-left: 650px; */
                height: 40px;
                width: 100px;
            }
            h4 {
                text-align: center;
                font-family:Georgia, 'Times New Roman', Times, serif;
            }
            a {
                text-decoration: none;
                color: black;
            }
            #header {
                height: 80px;
                width: 1425px;
                color: white;
                background-color: black;
                font-size: 20px;
            }
            #name {
                color : white;
                margin-left: 10px;
            }
            .x {
                color: white;
                margin-left: 20px;
            }
            #footer {
                margin-top: 9vh;
                background-color: black;
                height: 100px;
                width: 1425px;
                color: white;
                text-align: center;
            }
            h3 {
                font-weight: normal;
            }
            .star {
                color : red;
            }
</style>
</head>
<?php
    $error1=$error2=$error3=$error4=$error5=$error6=$error7=$error8="";
    $validate = True;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $un = $_POST["un"];
        $pno = $_POST["pno"];
        $email = $_POST["email"];
        $aadhar = $_POST["aadhar"];
        $pincode = $_POST["pincode"];
        $amount = $_POST["amount"];
        $months = $_POST["months"];
        $repay = $_POST["repay"];
        if(empty($un)) {
            $error1="Mandatory-1";
            $validate=False;
        }
        if(empty($pno)) {
            $error2="Mandatory-2";
            $validate=False;
        }
        if(empty($email)) {
            $error3="Mandatory-3";
            $validate=False;
        }
        if(empty($aadhar)) {
            $error4="Mandatory-4";
            $validate=False;
        }
        if(empty($pincode)) {
            $error5="Mandatory-5";
            $validate=False;
        }
        if(empty($amount)) {
            $error6="Mandatory-6";
            $validate=False;
        }
        if(empty($months)){ 
            $error7="Mandatory-7";
            $validate=False;
        }
        if(empty($repay)){ 
            $error8="Mandatory-8";
            $validate=False;
        }
        if($validate == True) {
            $servername = "localhost";
            $username = "Uday";
            $password = "Udayk@2003";
            $database = "mydatabase";
            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn){
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else{ 
                $sql = "INSERT INTO `VEHICLE_loan` 
                        VALUES ('$un', '$pno', '$email', '$aadhar' , '$pincode' , '$amount','$months','$repay')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="fun()">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>';
                }
                else{
                    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="fun()">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>';
                }
            }
        }
    }
?>
<body>
  <header class="header">
    <img style="margin-left: 10px ;" width="70px" height="70px" src="logo.jpg" alt="">
    <a href="#" class="logo" style="color: goldenrod;">Lakshmi Finance</a>
    <nav class="nav-items">
      <a style="margin-left: 250px;" href="MAIN.html">Home</a>
      <a style="margin-left: 40px;" href="SERVICES.html">Services</a>
      <a style="margin-left: 40px;" href="POLICY.html">Policy</a>
      <a style="margin-left: 40px;" href="CONTACT.html">Contact</a>
    </nav>
  </header>
  <div id="formcon">
    <form action="" method="post">
        <label for="un">User Name</label>
        <input type="text" id="un" name="un">
        <span class="star">*</span>
        <span><?php echo $error1; ?></span>
        <br>
        <label for="pno">Phone</label>
        <input type="text" id="pno" name="pno">
        <span class="star">*</span>
        <span><?php echo $error2; ?></span>
        <br>
        <label for="email">Email Id</label>
        <input type="text" id="email" name="email">
        <span class="star">*</span>
        <span><?php echo $error3; ?></span>
        <br>
        <label for="aadhar">Aadhar</label>
        <input type="text" id="aadhar" name="aadhar">
        <span class="star">*</span>
        <span><?php echo $error4; ?></span>
        <br>
        <label for="pincode">Pin Code</label>
        <input type="numeric" id="pincode" name="pincode">
        <span class="star">*</span>
        <span><?php echo $error5; ?></span>
        <br>
        <label for="amount">Amount</label>
        <input type="numeric" id="amount" name="amount">
        <span class="star">*</span>
        <span><?php echo $error6; ?></span>
        <br>
        <label for="months">Months</label>
        <input type="numeric" id="months" name="months">
        <span class="star">*</span>
        <span><?php echo $error7; ?></span>
        <br>
        <label for="repay">Repay</label>
        <input type="numeric" id="repay" name="repay">
        <span class="star">*</span>
        <span><?php echo $error8; ?></span>
        <br>
        <label for=""></label>
        <input type="submit" value="Store">
        <br>
        <br>
    </form>
</div>
</body>
<script>
    function calculateLoan() {
      const goldWeight = parseFloat(document.getElementById("goldWeight").value);
      const goldPurity = parseFloat(document.getElementById("goldPurity").value);
      const ltvRatio = parseFloat(document.getElementById("ltvRatio").value);
      const goldRate = parseFloat(document.getElementById("goldRate").value);
      const interestRate = parseFloat(document.getElementById("interestRate").value);
      const loanTenure = parseFloat(document.getElementById("loanTenure").value);

      // Validate input values
      if (
        isNaN(goldWeight) || isNaN(goldPurity) || isNaN(ltvRatio) ||
        isNaN(goldRate) || isNaN(interestRate) || isNaN(loanTenure)
      ) {
        document.getElementById("loanAmount").innerText = "Please enter valid numeric values.";
        document.getElementById("totalRepayment").innerText = "";
        return;
      }

      // Calculate Loan Amount
      const loanAmount = (goldWeight * goldPurity * goldRate * ltvRatio) / 100;

      // Calculate Total Repayment Amount
      const totalInterest = (loanAmount * interestRate * loanTenure) / 100;
      const totalRepayment = loanAmount + totalInterest;

      // Display the results
      document.getElementById("loanAmount").innerText = `Loan Amount: ${loanAmount.toFixed(2)} (Currency)`;
      document.getElementById("totalRepayment").innerText = `Total Repayment: ${totalRepayment.toFixed(2)} (Currency)`;
    }
  </script>
</html>