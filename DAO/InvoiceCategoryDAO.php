<?php

namespace DAO;

use DAO\IInvoiceCategoryDAO as IInvoiceCategoryDAO;
use Model\InvoiceCategory as InvoiceCategory;


class InvoiceCategoryDAO implements IInvoiceCategoryDAO
{
    private $invoiceCategoryList = array();
    private $fileName = ROOT . "Data/InvoiceCategories.json";

    public function Add(InvoiceCategory $invoiceCategory)
    {
        $this->RetrieveData();
        array_push($this->invoiceCategoryList, $invoiceCategory);
        $this->SaveData();
    }

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->invoiceCategoryList as $invoiceCategory) {

            $valueArray["invoiceCategoryId"] = $invoiceCategory->GetInvoiceCategoryId();
            $valueArray["description"] = $invoiceCategory->GetDescription();
            $valueArray["active"] = $invoiceCategory->GetActive();
            array_push($arrayToEncode, $valueArray);
    
        }

        $jsonEncode = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonEncode);
    }

    private function RetrieveData()
    {
        $this->invoiceCategoryList = array();

        if (file_exists($this->fileName)) {
            $jsonContent = file_get_contents($this->fileName);
            $jsonArray = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($jsonArray as $valueArray) {
                $invoiceCategory = new InvoiceCategory();
                $invoiceCategory->SetInvoiceCategoryId($valueArray["invoiceCategoryId"]);
                $invoiceCategory->SetDescription($valueArray["description"]);
                $invoiceCategory->SetActive($valueArray["active"]);
                array_push($this->invoiceCategoryList, $invoiceCategory);
            }
        }
    }
    
    public function GetById($id){
        $this->RetrieveData();
        if($id <= count($this->invoiceCategoryList)){
        foreach($this->invoiceCategoryList as $invoiceCategory){
            if($invoiceCategory->GetInvoiceCategoryId() === $id)
                return $invoiceCategory;
        }
    }

        return null;
    }

    public function GetAll(){
        $this->RetrieveData();
        return $this->invoiceCategoryList;
    }

}
