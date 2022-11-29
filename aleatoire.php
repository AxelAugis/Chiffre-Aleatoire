

<h2>Trouver le nombre choisi par l'ordinateur</h2>

<form action="#" method="POST">
    <input type="reset" value="Réinitialiser"> <br>
    <label for="chiffre">Quel est le chiffre : </label>
    <input type="number" name="chiffre" id="chiffre"><br/>
    <input type="submit" value="Envoyer">
</form>

<?php
    session_start();
    $limits = ['min' => 0, 'max' => 100];
        if (empty($_SESSION['chiffreAlea'])) {

            $_SESSION['chiffreAlea'] = rand($limits['min'], $limits['max']);
            $_SESSION['essai'] = 0;
}
  
        $chiffreAlea = $_SESSION['chiffreAlea'];
        $essai = $_SESSION['essai'];
        
        if ($essai === 5){
            echo "Vous avez perdu";
            unset($_SESSION['essai'], $essai);
            unset($_SESSION['chiffreAlea'], $chiffreAlea);
        }
        
        if(isset($_POST["chiffre"]) && $_POST["chiffre"] > 0){
            $chiffreSaisi = (int)$_POST["chiffre"];
            echo "<h2>";
        if($chiffreSaisi === $chiffreAlea){
            echo "C'est gagné";
            unset($_SESSION['chiffreAlea'], $chiffreAlea) ;
        } 
            elseif ($chiffreSaisi > $chiffreAlea) {

                    echo "Le chiffre est plus petit";
                    $_SESSION['essai'] = $essai+1;
                }

             elseif ($chiffreSaisi < $chiffreAlea) {

                    echo "Le chiffre est plus grand";
                    $_SESSION['essai'] = $essai+1;
                }
            
            else {
                echo "Veuillez entrer un chiffre.";
            
        }
        echo "</h2>";
    }
            
?>