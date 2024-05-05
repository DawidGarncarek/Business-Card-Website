<?php

require __DIR__."/WalidacjaLog.php";

class UslugiTest extends \PHPUnit\Framework\TestCase {
	public function testId(){
        //Kiedy ID jest liczbą
		$result = Uslugi\WalidacjaLog::id_check(1);
		$this->assertFalse($result);
        //Kiedy ID jest czymś innym
        $result = Uslugi\WalidacjaLog::id_check(" ");
		$this->assertFalse($result);
	}
    public function testImie(){
        //Kiedy Imie jest liczbą
		$result = Uslugi\WalidacjaLog::imie_check("Paweł");
		$this->assertFalse($result);
        //Kiedy Imie jest czymś innym
        $result = Uslugi\WalidacjaLog::imie_check("Kacper");
		$this->assertFalse($result);
	}
    public function testTelefon(){
        //Kiedy telefon jest liczbą
		$result = Uslugi\WalidacjaLog::telefon_check(213769420);
		$this->assertFalse($result);
        //Kiedy telefon jest czymś innym
        $result = Uslugi\WalidacjaLog::telefon_check(" ");
		$this->assertFalse($result);
	}
    public function testOgloszenie(){
        //Kiedy ogloszenie jest liczbą
		$result = Uslugi\WalidacjaLog::ogloszenie_check("Jestem studentem i chętnie pomagam essa");
		$this->assertFalse($result);
        //Kiedy ogloszenie jest czymś innym
        $result = Uslugi\WalidacjaLog::ogloszenie_check(" ");
		$this->assertFalse($result);
	}
}