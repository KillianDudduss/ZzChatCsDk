<?php

require('./../src/fonctions.php');

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
	public function testessaie()
	{
		$this->assertTrue(1 === 1, "essaie des premier tests pour comprendre");
		$this->assertFalse(1==2);
		$this->assertEquals("toto","toto");
		$this->assertNotEquals("toto","tata");
	}
	public function testparsetexte()
	{
		$texte="[b]coucou qu'est ce que tu raconte de beau ?[/b]";
		$attendu="<b>coucou qu'est ce que tu raconte de beau ?</b>";
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);

		$texte="[b]coucou qu'est ce que tu raconte de beau ?[/b] rien et toi";
		$attendu="<b>coucou qu'est ce que tu raconte de beau ?</b> rien et toi";
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);

		$texte="[i]coucou qu'est ce que tu raconte de beau ?[/i] rien et toi";
		$attendu="<i>coucou qu'est ce que tu raconte de beau ?</i> rien et toi";
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
		
		$texte="[U]coucou qu'est ce que tu raconte de beau ?[/U] rien et toi";
		$attendu="<u>coucou qu'est ce que tu raconte de beau ?</u> rien et toi";
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
		
		$texte="[blue]coucou quest ce que tu raconte de beau ?[/blue] rien et toi";
		$attendu='<font color = "blue">coucou quest ce que tu raconte de beau ?</font> rien et toi';
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
		
		$texte="[black]coucou quest ce que tu raconte de beau ?[/black] rien et toi";
		$attendu='<font color = "black">coucou quest ce que tu raconte de beau ?</font> rien et toi';
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
		
		$texte="[pink]coucou quest ce que tu raconte de beau ?[/pink] rien et toi";
		$attendu='<font color = "pink">coucou quest ce que tu raconte de beau ?</font> rien et toi';
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
		
		$texte="[red]coucou quest ce que tu raconte de beau ?[/red] rien et toi";
		$attendu='<font color = "red">coucou quest ce que tu raconte de beau ?</font> rien et toi';
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
		
		$texte="[green]coucou quest ce que tu raconte de beau ?[/green] rien et toi";
		$attendu='<font color = "green">coucou quest ce que tu raconte de beau ?</font> rien et toi';
		$sortie=parseText($texte);
		$this->assertEquals($attendu,$sortie);
	}
	public function testsendmessage()
	{
		$line="simon;;ohohoho;;10 Dec 2016, 12:45";
		$attendu='<div class="userdate">simon : 10 Dec 2016, 12:45 : </div><div class="message">ohohoho</div>';
		$this->assertEquals($attendu,afficher($line));

		$line="simon;;<u>souligné</u>;;10 Dec 2016, 13:33";
		$attendu='<div class="userdate">simon : 10 Dec 2016, 13:33 : </div><div class="message"><u>souligné</u></div>';
		$this->assertEquals($attendu,afficher($line));

		$line="simon;;bonjour;;13 Nov 2016, 10:54";
		$attendu='<div class="userdate">simon : 13 Nov 2016, 10:54 : </div><div class="message">bonjour</div>';
		$this->assertEquals($attendu,afficher($line));

		$line="simon;;<b>enfiiinnnnnnnnn !!!!</b>;;10 Dec 2016, 13:32";
		$attendu='<div class="userdate">simon : 10 Dec 2016, 13:32 : </div><div class="message"><b>enfiiinnnnnnnnn !!!!</b></div>';
		$this->assertEquals($attendu,afficher($line));

		$line="killian;;<b>enfiiinnnnnnnnn !!!!</b>;;10 Dec 2016, 13:32";
		$attendu='<div class="userdate">killian : 10 Dec 2016, 13:32 : </div><div class="message"><b>enfiiinnnnnnnnn !!!!</b></div>';
		$this->assertEquals($attendu,afficher($line));
	}

	public function testReadFile()
	{
		$filecontent=lirefile("./filetest/vide.txt");
		$attendu="";
		$this->assertEquals($attendu,$filecontent);

		$filecontent=lirefile("./filetest/test1.txt");
		$attendu="bonjour, le test1 a réussi parfaitement ici";
		$this->assertEquals($attendu,$filecontent);

		$filecontent=lirefile("./filetest/test2.txt");
		$attendu="bonjour, le test1 a réussi parfaitement ici\r\nje peux même sauter des lignes";
		$this->assertEquals($attendu,$filecontent);
	}


	/*public function testWriteInFile()
	{
		$_POST['text']="test d'envoie d'un message";
		$_SESSION['username']="simon";
		require_once ('./../src/got-messages.php');
		$tab = file('./../db/messages.txt');
		$der_ligne = $tab[count($tab)-1];
		$attendu=$_SESSION['username'].";;".parseText($_POST['text']).";;".date("d M Y, G:i", time());
		$this->assertContains($attendu, $der_ligne);
	}*/

}


?>