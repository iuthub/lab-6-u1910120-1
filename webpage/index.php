<?php

include ('header.php');

$name = '';
$email = '';
$userName = '';
$password = '';
$confirmPassword = '';
$dateOfBirth = '';
$gender = '';
$maritalStatus = '';
$address = '';
$city = '';
$postalCode = '';
$homePhone = '';
$mobilePhone = '';
$creditCardNumber = '';
$creditCardExpiryDate = '';
$monthlySalary = '';
$webSiteURL = '';
$GPA = '';


$isNameValid = true;
$isEmailValid = true;
$isUserNameValid = true;
$isPasswordValid = true;
$isConfirmPasswordValid = true;
$isDateOfBirthValid = true;
$isGenderValid = true;
$isMaritalStatusValid = true;
$isAddressValid = true;
$isCityValid = true;
$isPostalCodeValid = true;
$isHomePhoneValid = true;
$isMobilePhoneValid = true;
$isCreditCardNumberValid = true;
$isCreditCardExpiryDateValid = true;
$isMonthlySalaryValid = true;
$isWebSiteURLValid  = true;
$isGPAValid = true;


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $confirmPassword = $_REQUEST['confirmPassword'];
    $dateOfBirth = $_REQUEST['dateOfBirth'];
    $gender = $_REQUEST['gender'];
    $maritalStatus = $_REQUEST['maritalStatus'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $postalCode = $_REQUEST['postalCode'];
    $homePhone = $_REQUEST['homePhone'];
    $mobilePhone = $_REQUEST['mobilePhone'];
    $creditCardNumber = $_REQUEST['creditCardNumber'];
    $creditCardExpiryDate = $_REQUEST['creditCardExpiryDate'];
    $monthlySalary = $_REQUEST['monthlySalary'];
    $webSiteURL = $_REQUEST['websiteURL'];
    $GPA = $_REQUEST['GPA'];


    $isNameValid = preg_match('/^[a-z]{2,}$/i', $name);
    $isEmailValid = preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i', $email);
    $isUserNameValid = preg_match('/^(\w){5,}$/i', $userName);
    $isPasswordValid = preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]{3,}).{6,10}$/i', $password);

    if($_REQUEST['password']==$_REQUEST['confirmPassword']){ $isConfirmPasswordValid =true;}
    else{ $isConfirmPasswordValid = false; }

    $isDateOfBirthValid = preg_match('/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/i', $dateOfBirth);
    $isGenderValid = preg_match('/^male$|^female$/i', $gender);
    $isMaritalStatusValid = preg_match('/^single$|^married$|^divorced$|^widowed$/i', $maritalStatus);
    $isAddressValid = !!($address);
    $isCityValid = preg_match('/^[a-z][a-z \-]*[a-z]$/i', $city);
    $isPostalCodeValid = preg_match('/^\d{6}$/i',$postalCode);
    $isHomePhoneValid = preg_match('/^[0-9]{2}\s[0-9]{7}$/', $homePhone);
    $isMobilePhoneValid = preg_match('/^[0-9]{2}\s[0-9]{7}$/', $mobilePhone);
    $isCreditCardNumberValid = preg_match('/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/', $creditCardNumber);
    $isCreditCardExpiryDateValid = preg_match('/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/', $creditCardExpiryDate);
    $isMonthlySalaryValid = preg_match('/^UZS\s[0-9]{3,},[0-9]{3}.[0-9]{2}/', $monthlySalary);
    $isWebSiteURLValid = preg_match('/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)$/i', $webSiteURL);
    $isGPAValid = preg_match('/^(?!.*4\.([5]+[0]*[1-9]+|[6-9][0-9]*))([0-4](?:\.[0-9]*)?)$|(\-[0-9]+\.?[0-9]*)$/', $GPA);

    $isValid = $isNameValid &&  $isEmailValid &&  $isUserNameValid &&  $isPasswordValid && $isConfirmPasswordValid
        && $isDateOfBirthValid && $isGenderValid && $isMaritalStatusValid && $isAddressValid && $isCityValid
        &&  $isPostalCodeValid && $isHomePhoneValid && $isMobilePhoneValid && $isCreditCardNumberValid
        && $isCreditCardExpiryDateValid && $isMonthlySalaryValid && $isWebSiteURLValid && $isGPAValid;

    if ($isValid){
        header('Location: thanks.php', True, 301);
    }

}

?>


    <div class="container">

        <div class="row">
            <div class="col">
                <h1>Submit form with validation</h1>

                <form action="index.php" method="post">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control <?= $isNameValid?'' : 'is-invalid'?>"
                               id="name" name="name" value="<?= $name ?>" placeholder="enter a name">
                        <div class="invalid-feedback">
                            Please, enter name
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control <?= $isEmailValid?'' : 'is-invalid'?>"
                               id="email" name="email" value="<?= $email ?>" placeholder="enter an email">
                        <div class="invalid-feedback">
                            Please, enter an email
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control <?= $isUserNameValid?'' : 'is-invalid'?>"
                               id="userName" name="userName" value="<?= $userName ?>" placeholder="enter a username">
                        <div class="invalid-feedback">
                            Please, enter a username
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= $isPasswordValid?'' : 'is-invalid'?>"
                               id="password" name="password" value="<?= $password ?>" placeholder="enter a password">
                        <div class="invalid-feedback">
                            Please, enter a password
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= $isConfirmPasswordValid?'' : 'is-invalid'?>"
                               id="confirmPassword" name="confirmPassword" value="<?= $confirmPassword ?>" placeholder="confirm a password">
                        <div class="invalid-feedback">
                            Please, enter a password
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control <?= $isDateOfBirthValid?'' : 'is-invalid'?>"
                               id="dateOfBirth" name="dateOfBirth" value="<?= $dateOfBirth ?>"
                               placeholder="dd.mm.yyyy">
                        <div class="invalid-feedback">
                            Please, enter your date of birth
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control <?= $isGenderValid?'' : 'is-invalid'?>"
                               id="gender" name="gender" value="<?= $gender ?>" placeholder="enter male or female">
                        <div class="invalid-feedback">
                            Please, enter male or female
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="maritalStatus" class="form-label">Marital Status</label>
                        <input type="text" class="form-control <?= $isMaritalStatusValid?'' : 'is-invalid'?>"
                               id="maritalStatus" name="maritalStatus" value="<?= $maritalStatus ?>"
                               placeholder="enter one of the following  single, married, divorced, widowed">
                        <div class="invalid-feedback">
                            Please, enter one of the following  single, married, divorced, widowed
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control <?= $isAddressValid?'' : 'is-invalid'?>"
                               id="address" name="address" value="<?= $address ?>" placeholder="enter your address">
                        <div class="invalid-feedback">
                            Please, enter your address
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control <?= $isCityValid ? '' : 'is-invalid' ?>" id="city"
                               name="city" value="<?= $city ?>" placeholder="Enter city">
                        <div class="invalid-feedback">
                            Please, enter city
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="postalCode" class="form-label">Postal Code</label>
                        <input type="text" class="form-control <?= $isPostalCodeValid?'' : 'is-invalid'?>"
                               id="postalCode" name="postalCode" value="<?= $postalCode ?>" placeholder="enter a postal code">
                        <div class="invalid-feedback">
                            Please, enter your postal code;
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="homePhone" class="form-label">Home Phone</label>
                        <input type="text" class="form-control <?= $isHomePhoneValid?'' : 'is-invalid'?>"
                               id="homePhone" name="homePhone" value="<?= $homePhone ?>"
                               placeholder="for ex, 97 1234567">
                        <div class="invalid-feedback">
                            Please, enter your home phone in such form for ex, 97 1234567
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="mobilePhone" class="form-label">Mobile Phone</label>
                        <input type="text" class="form-control <?= $isMobilePhoneValid?'' : 'is-invalid'?>"
                               id="mobilePhone" name="mobilePhone" value="<?= $mobilePhone ?>"
                               placeholder="for ex, 97 1234567">
                        <div class="invalid-feedback">
                            Please, enter your mobile phone in such form for ex, 97 1234567
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="creditCardNumber" class="form-label">Credit Card Number</label>
                        <input type="text" class="form-control <?= $isCreditCardNumberValid?'' : 'is-invalid'?>"
                               id="creditCardNumber" name="creditCardNumber" value="<?= $creditCardNumber ?>"
                               placeholder="for ex 1234 1234 1234 1234">
                        <div class="invalid-feedback">
                            Please, enter a credit card number
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="creditCardExpiryDate" class="form-label">Credit Card Expiry Date</label>
                        <input type="text" class="form-control <?= $isCreditCardExpiryDateValid?'' : 'is-invalid'?>"
                               id="creditCardExpiryDate" name="creditCardExpiryDate"
                               value="<?= $creditCardExpiryDate ?>" placeholder="for ex 07.05.2014">
                        <div class="invalid-feedback">
                            Please, enter a credit card expiry date
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="monthlySalary" class="form-label">Monthly Salary</label>
                        <input type="text" class="form-control <?= $isMonthlySalaryValid?'' : 'is-invalid'?>"
                               id="monthlySalary" name="monthlySalary"
                               value="<?= $monthlySalary ?>" placeholder="enter a monthly salary">
                        <div class="invalid-feedback">
                            Please, enter a monthly salary
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="websiteURL" class="form-label">Website URL</label>
                        <input type="text" class="form-control <?= $isWebSiteURLValid?'' : 'is-invalid'?>"
                               id="websiteURL" name="websiteURL"
                               value="<?= $webSiteURL ?>" placeholder="enter a website URL">
                        <div class="invalid-feedback">
                            Please, enter a website URL
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="GPA" class="form-label">Overall GPA</label>
                        <input type="text" class="form-control <?= $isGPAValid?'' : 'is-invalid'?>"
                               id="GPA" name="GPA" value="<?= $GPA ?>" placeholder="enter a GPA">
                        <div class="invalid-feedback">
                            Please, enter a GPA
                        </div>
                    </div>





                    <dt></dt>
                    <dd><input type="submit" value="Register"></dd>

                </form>




            </div>
        </div>

    </div>


<?php include ('footer.php');?>