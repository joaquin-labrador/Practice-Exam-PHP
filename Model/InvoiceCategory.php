<?php

namespace Model;

class InvoiceCategory
{
    private $invoiceCategoryId;
    private $description;
    private $active;


    public function GetInvoiceCategoryId()
    {
        return $this->invoiceCategoryId;
    }


    public function SetInvoiceCategoryId($invoiceCategoryId)
    {
        $this->invoiceCategoryId = $invoiceCategoryId;
    }


    public function GetDescription()
    {
        return $this->description;
    }

    public function SetDescription($description)
    {
        $this->description = $description;
    }


    public function GetActive()
    {
        return $this->active;
    }


    public function SetActive($active)
    {
        $this->active = $active;
    }
}
 ?>