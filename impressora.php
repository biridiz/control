<?php
/* Change to the correct path if you copy this example! */
//require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
include_once "_pages/in.php";


try {
    // Enter the device file for your USB printer here
    $connector = new NetworkPrintConnector("192.168.1.40", 9100);
    //$connector = new FilePrintConnector("/dev/usb/lp0");
    //$connector = new FilePrintConnector("/dev/usb/lp1");
    //$connector = new FilePrintConnector("/dev/usb/lp2");
    $connector = new FilePrintConnector("php://stdout");
    $printer = new Printer($connector);
    
    /* Initialize */
    $printer -> initialize();
    
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $printer -> text("hellow world\n");
    /*$printer -> text("Nome do Aplicativo/Empresa!\n");
    $printer -> text("Nome do evento!\n");
    $printer -> text("$data\n");
    $printer -> text("$horaIn\n");
    $printer -> text("*************************************************\n");
    
    /* Very large text */
    /*title($printer, "Placa:\n");
    $printer -> setTextSize(8, 8);
    $printer -> text("$placa\n");*/
    $printer -> cut();

    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
?>