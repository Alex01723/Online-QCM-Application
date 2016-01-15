<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 08/12/2015
 * Time: 14:22
 */
if (isset($_GET[@numeroQuestion])) {
    @    $numeroQuestion = $_GET[numeroQuestion];
} else
    $numeroQuestion = 1;
print("Question n°" . $numeroQuestion);
?>


<table>
    <tr>
        <td colspan="2"><textarea name="question_<?php echo $numeroQuestion ?>" cols="60" rows="5">Entrez votre question et sélectionnez la bonne réponse en cochant la case accolé au champs de texte</textarea>
        </td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td><input type="text" value="Entrez votre reponse" name="reponse1_<?php echo $numeroQuestion ?>" required>
            <input type="radio" name="bonnereponse1_<?php echo $numeroQuestion ?>" required>
        </td>
        <td><input type="text" value="Entrez votre reponse" name="reponse2_<?php echo $numeroQuestion ?>" required>
            <input type="radio" name="bonnereponse2_<?php echo $numeroQuestion ?>" required>
        </td>
    </tr>
    <tr>
        <td><input type="text" value="Entrez votre reponse" name="reponse3_<?php echo $numeroQuestion ?>" required>
            <input type="radio" name="bonnereponse3_<?php echo $numeroQuestion ?>" required>
        </td>
        <td><input type="text" value="Entrez votre reponse" name="reponse4_<?php echo $numeroQuestion ?>" required>
            <input type="radio" name="bonnereponse4_<?php echo $numeroQuestion ?>" required>
        </td>
    </tr>
    <!-- //reponse[x]_[id] donne la chaine de caractère de la réponse x à la question id
     //bonnereponse[x]_[id] si x est vraie, alors la reponse x est la bonne réponse a la question id -->
    </tbody>
</table>

<input type="hidden" name="nombreDeQuestions" value="<? echo $numeroQuestion ?>">

