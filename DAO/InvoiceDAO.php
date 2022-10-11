<?php

namespace DAO;

use DAO\IInvoiceDAO as IInvoiceDAO;
use Model\Invoice as Invoice;

class InvoiceDAO implements IInvoiceDAO
{
    private $invoiceList = array();
    private $fileName = ROOT . "Data/Invoices.json";

    public function Add(Invoice $invoice)
    {
        $this->RetrieveData();
        array_push($invoiceList, $invoice);
        $this->SaveData();
    }

    private function RetrieveData()
    {
        $this->invoiceList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $invoiceArray) {
                $invoice = new Invoice();
                $invoice->SetInvoiceId($invoiceArray["invoiceId"]);
                $invoice->SetInvoiceCategoryId($invoiceArray["invoiceCategoryId"]);
                $invoice->SetAmount($invoiceArray["amount"]);
                $invoice->SetDueDate($invoiceArray["dueDate"]);
                $invoice->SetPayed($invoiceArray["payed"]);
                $invoice->SetNumber($invoiceArray["number"]);
                array_push($this->invoiceList, $invoice);
            }
        }
    }

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->invoiceList as $invoice) {

            $valuesArray["invoiceId"] = $invoice->GetInvoiceId();
            $valuesArray["invoiceCategoryId"] = $invoice->GetInvoiceCategoryId();
            $valuesArray["amount"] = $invoice->GetAmount();
            $valuesArray["dueDate"] = $invoice->GetDueDate();
            $valuesArray["payed"] = $invoice->GetPayed();
            $valuesArray["number"] = $invoice->GetNumber();
            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $jsonContent);
    }

    public function GetById($id)
    {

        $this->RetrieveData();
        if (count($this->invoiceList) >= $id) { {
                foreach ($this->invoiceList as $invoice) {
                    if ($invoice->GetInvoiceId() == $id)
                        return $invoice;
                }
            }
            return null;
        }
    }

    public function GetAll()
    {
        $this->RetrieveData();
        return $this->invoiceList;
    }

    public function DeleteInvoice($invoice)
    {
        $this->RetrieveData();
        $invoiceToDelete = new Invoice();
        $invoiceToDelete = $invoice;
        $key = array_search($invoiceToDelete, $this->invoiceList);
        unset($this->invoiceList[$key]);
        $this->SaveData();
        $_SESSION["success"] = "Factura eliminada con exito";

        /**
         * array_column($this->invoiceList, "invoiceId")
         * devuelve los valores de una sola columna de un array asociativo (en este caso, el id de la factura) 
         * $this->invoiceList[0] = => "invoiceId" => 1, "invoiceCategoryId" => 1, "amount" => 1000, "dueDate" => "2020-12-12", "payed" => false, "number" => 1
         * aplicando array_column($this->invoiceList, "invoiceId") devuelve un array con los valores de la columna "invoiceId" de cada factura
         * ex: 
         * [0] => 1
         * [1] => 2
         * [2] => 3
         * [3] => 4
         * ...
         */
    }
}
