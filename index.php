<html >
<body>
<style>
.outer-div
{
  padding: 30px;
  text-align: center;
}
label, input {
    display: block;
}
label {
    margin-bottom: 20px;
}
</style>
<div class="outer-div">
<img src="Drapeau.jpg"   width="350px" height="300px">
<form method="POST" action="index.php">
<br />
<br /><label>
Numéro TVA :  <select  name="codepays" id="codepays" type="text" required >
<option value="" selected>--Choisissez un code pays--</option>
<option value="DE" >Allemagne</option>
<option value="AT" >Autriche</option>
<option value="BE" >Belgique</option>
<option value="BG" >Bulgarie</option>
<option value="CY" >Chypre</option>
<option value="HR" >Croatie</option>
<option value="DK" >Danemark</option>
<option value="ES" >Espagne</option>
<option value="EE" >Estonie</option>
<option value="FI" >Finlande</option>
<option value="FR" >France</option>
<option value="GR">Grèce</option>
<option value="HU">Hongrie</option>
<option value="IE">Irlande</option>
<option value="IT">Italie</option>
<option value="LV">Lettonie</option>
<option value="LT">Lituanie</option>
<option value="LU">Luxembourg</option>
<option value="MT">Malte</option>
<option value="NL">Pays-Bas</option>
<option value="PL">Pologne</option>
<option value="PT">Portugal</option>
<option value="CZ">République tchèque</option>
<option value="RO">Roumanie</option>
<option value="GB">Royaume-Uni</option>
<option value="SK">Slovaquie</option>
<option value="SI">Slovénie</option>
<option value="SE">Suède</option
</select>
 </label>
 
 <div class="center-div">
   <input style=" margin: 0 auto; width: 200px; height: 40px; position: absolute;   top: 400px;  left: 700px;" type="text" name="numbertva" id="numbertva" required></br>
   <input style=" margin: 0 auto; width: 200px; height: 40px; position: absolute;   top: 450px;  left: 700px;"  type="submit" value="Rechercher"></br>
   </div>
  </div>
</form>

<div class="outer-div">
<?php
if (isset ($_POST['codepays'])){

$countryCode= $_POST['codepays'];
$vatNo=$_POST['numbertva'];
$client = new SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");
$Result=$client->checkVat(array(
  'countryCode' => $countryCode,
  'vatNumber' => $vatNo
));
//var_dump($Result);

?>

<table  style="position: absolute;   top: 500px;  left: 700px;"  border="1"> 
<tr>
<td>countryCode </td>
<td> <?php echo $Result->countryCode; ?> </td>
</tr>

<tr>
<td> vatNumber </td>
<td> <?php echo $Result->vatNumber; ?> </td>
</tr>

<tr>
<td> date</td>
<td><?php echo $Result->requestDate; ?> </td>
</tr>

<tr>
<td>Nom </td>
<td> <?php echo $Result->name; ?> </td>
</tr>
<tr>
<td> adress</td>
<td><?php echo $Result->address; ?> </td>
</tr>
</table>

<?php 
}
?>
</div>
</body>
</html>