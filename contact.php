<?php
/// This must come first when we need access to the current session
session_start();;

require("classes/components.php");
require("classes/utils.php");
require("components/form-validation.php");


components::pageHeaderAlt("Checkout", ["style"], ["mobile-nav"]);
?>

<main class="content-wrapper contact-content">


<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">Full name:</label><br>
  <input type="text" name="name" value="<?php echo $name;?>"><br>
  <p class="error"><?php echo $nameErr ?></p>
  <label for="email">Email:</label><br>
  <input type="text" name="email" value="<?php echo $email;?>"><br>
  <p class="error"><?php echo $emailErr ?></p>
  <label for="contactNo">Contact Number:</label><br>
  <input type="text" name="contactNo" value="<?php echo $contactNo;?>">
  <p class="error"><?php echo $contactNoErr ?></p>
  <label for="message">Message:</label><br>
  <textarea name="message" rows="5"><?php echo $message;?></textarea>
  <p class="error"><?php echo $messageErr ?></p>
  <br><br>
  <input type="submit" onclick="return validateForm()" name="submit" value="Submit">  
</form>

<iframe width="425" height="350" src="https:///www.openstreetmap.org/export/embed.html?bbox=-2.993334531784058%2C56.49000188262805%2C-2.9796874523162846%2C56.49539753638916&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https:///www.openstreetmap.org/#map=17/56.49270/-2.98651">View Larger Map</a></small>
</main>
<script>
    /**
     * Validates the form by checking if the required fields are filled out.
     * If any of the fields are empty, an alert message is displayed.
     */
    function validateForm() {
        let formName = document.forms[0]["name"].value.trim();
        let formEmail = document.forms[0]["email"].value.trim();
        let formContactNo = document.forms[0]["contactNo"].value.trim();
        let formMessage = document.forms[0]["message"].value.trim();




        if (formName === "") {
            alert("Username must be filled out");
            return false;
        }

        if (formEmail === "") {
            alert("Email must be filled out");
            return false;
        }

        if (formContactNo === "") {
            alert("Username must be filled out");
            return false;
        }

        if (formMessage === "") {
            alert("Message must be filled out");
            return false;
        }


        
        return true;
    }
</script>