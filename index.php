<?php 
$alert_msg = '';
$output = '';

if(isset($_POST['submit'])){

    if($_POST['inpStrng'] == '' || $_POST['firstChars'] == '' || $_POST['firstRep'] == ''|| $_POST['secondChars'] == '' || $_POST['secondRep'] == ''){
        $alert_msg = 'NOTICE: Please Make Sure All The Input Fields Are Filled';
    }
    else{
        $new_Arr = [];
        $inputString = strval($_POST['inpStrng']);
        $exploded_InpStrng = str_split($inputString);
        for($i=0; $i<count($exploded_InpStrng); $i++){

            if(strtolower($exploded_InpStrng[$i]) == strtolower($_POST['firstChars'])){
                $new_Arr[] = $exploded_InpStrng[$i];
                $d = array_count_values($new_Arr);
                if(isset($d[$exploded_InpStrng[$i]]) && (intval($d[$exploded_InpStrng[$i]] +1) <  (int)$_POST['firstRep']))
                $new_Arr[] = $exploded_InpStrng[$i];

            }else if(strtolower($exploded_InpStrng[$i]) == strtolower($_POST['secondChars'])){
                $new_Arr[] = $exploded_InpStrng[$i];
                $d = array_count_values($new_Arr);
                if(isset($d[$exploded_InpStrng[$i]]) && (intval($d[$exploded_InpStrng[$i]] +1) <  (int)$_POST['secondRep']))
                $new_Arr[] = $exploded_InpStrng[$i];
            }else{
                $new_Arr[] = $exploded_InpStrng[$i];
            }

        }
        $output .= '<span>OutPut : </span>'.strtoupper(implode("",$new_Arr)).'<br>';
        for($j=0; $j < count($new_Arr); $j++){
           if($new_Arr[$j] != ' '){
            $output .= 'Occurance of '.$new_Arr[$j].' : <br>';
           }
           
        }
      //  var_dump($new_Arr); die;


        // var_dump($_POST['inpStrng']); 
        // var_dump($_POST['firstChars']); 
        // var_dump($_POST['firstRep']); 
        // var_dump($_POST['secondChars']); 
        // var_dump($_POST['secondRep']); 
        // die;
    }
    

}

?>
<html>
    <head>
<title>Fingent - Charcter Check</title>
    </head>
    <body>
        <h2>String Repettency Detecter</h2>
        <span style="color:red"><?= $alert_msg ?></span><br><br>
        <form method="post">
            <label for="inpStrng">
                Enter The Sentence :
            </label>
            <input type="text" name="inpStrng" id="inpStrng" />
            <br/>

            <label for="firstChars">
                Enter The First Character To Be Checked For Repettency :
            </label>
            <input type="text" name="firstChars" id="firstChars" />
            <br/>
            <label for="firstRep">
                Enter The Number Of times of repettency allowed for First Character :
            </label>
            <input type="number" name="firstRep" id="firstRep" />
            <br/>

            <label for="secondChars">
                Enter The Second Character To Be Checked For Repettency :
            </label>
            <input type="text" name="secondChars" id="secondChars" />
            <br/>
            <label for="secondRep">
                Enter The Number Of times of repettency allowed for Second Character :
            </label>
            <input type="number" name="secondRep"  id="secondRep" />
            <br/>
            <input type="submit" name="submit" value="Submit" />
        </form><br><br>
        <?php
        if(isset($output) && $output != ''){
            echo $output;

        }
        ?>

    </body>
</html>