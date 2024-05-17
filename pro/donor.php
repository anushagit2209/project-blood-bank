<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONOR</title>
    <link rel="stylesheet" href="donor1.css">
</head>
<body>
    <div class="main">
        
    <h1>FILL IN THE CREDENTIALS</h1>
    

    <form action="donor1.php" method="post">
        <div><label for="donor_name">Donor Name:</label>
            <input type="text" id="donor_name" name="donor_name" required>
            <box-icon type='solid' name='user'></box-icon></div> <br>
            <div><label for="blood_group">Blood Group:</label>
                <input type="text" id="blood_group" name="blood_group" required></div> <br>
                <div><label for="haemoglobin">Haemoglobin Count:</label>
                    <input type="text" id="haemoglobin" name="haemoglobin" required></div> <br>
               <div><label for="disease">ARE YOU SUFFERING FROM ANY DISEASE?:</label>
                <select  name="disease"  id="disease"  required>
                    <optgroup label="disease">
                    <option value="HIV/AIDS">HIV/AIDS</option>
                    <option value="HEPATITIS B">HEPATITIS B</option>
                    <option value="CANCER">CANCER</option>
                    <option value="COLD">COLD</option>
                    <option value="OTHERS">OTHERS</option>
                </select> 
               </div><br>
               <div><label for="pregnant">ARE YOU PREGNANT OR BREAST FEEDING?:</label>
                <input type="radio" id="pregnant" name="pregnant" value="yes">
                yes
                <input type="radio" id="pregnant" name="pregnant" value="no">
                no
                </div><br>
                <div><label for="periods">ARE YOU ON YOUR PERIODS?:</label>
                    <input type="radio" id="periods" name="periods" value="yes">
                    yes
                    <input type="radio" id="periods" name="periods" value="no">
                    no
                    </div><br>
                    <div><label for="allergy">ARE YOU ALLERGIC TO SOMETHING?:</label>
                        <input type="radio" id="allergy" name="allergy" value="yes">
                        yes
                        <input type="radio" id="allergy" name="allergy" value="no">
                        no
                        </div>
                    <div>
                        <p>PLEASE SPECIFY </p>
                   <textarea></textarea></div><br>
                    <button type="submit">SUBMIT</button>
                    <button type="reset">Reset now</button>
                    <a href="logout.php" class="btn">LogOut</a>
                
                </div><br> 
                                    </div>
                    
                    
      
        <br>
       
    </section>
    
    
</body>
</html>
