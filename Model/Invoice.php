<?php

namespace Model;

class Invoice
{
    private $invoiceId;
    private $invoiceCategoryID;
    private $number;
    private $amount;
    private $dueDate;
    private $payed;



    public function GetInvoiceId()
    {
        return $this->invoiceId;
    }


    public function SetInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    public function GetInvoiceCategoryID()
    {
        return $this->invoiceCategoryID;
    }


    public function SetInvoiceCategoryID($invoiceCategoryID)
    {
        $this->invoiceCategoryID = $invoiceCategoryID;
    }

    public function GetNumber()
    {
        return $this->number;
    }


    public function SetNumber($number)
    {
        $this->number = $number;
    }

    public function GetAmount()
    {
        return $this->amount;
    }

    public function SetAmount($amount)
    {
        $this->amount = $amount;
    }


    public function GetDueDate()
    {
        return $this->dueDate;
    }

    public function SetDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function GetPayed()
    {
        return $this->payed;
    }

    public function SetPayed($payed)
    {
        $this->payed = $payed;
    }
}
