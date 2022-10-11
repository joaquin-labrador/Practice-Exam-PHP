<?php

namespace Controllers;

use DAO\InvoiceDAO as InvoiceDAO;
use DAO\InvoiceCategoryDAO as InvoiceCategoryDAO;
use Utils\Session as Session;

class InvoiceController
{
    private $invoiceDAO;
    private $invoiceCategoryDAO;

    public function __construct()
    {
        $this->invoiceCategoryDAO = new InvoiceCategoryDAO();
        $this->invoiceDAO = new InvoiceDAO();
    }


    public function ListForm()
    {
        Session::VerifySession();
        $invoiceList = $this->invoiceDAO->GetAll();
        require_once(VIEWS_PATH . "invoice-list.php");
    }

    public function DeleteInvoice($invoiceId)
    {
        Session::VerifySession();
        $invoiceToDelete = $this->invoiceDAO->GetById($invoiceId);
        if (isset($invoiceToDelete)) {
            if ($invoiceToDelete->GetPayed() == 1) {
                $this->invoiceDAO->DeleteInvoice($invoiceToDelete);
                header("location:" . FRONT_ROOT . "Invoice/ListForm");
            } else {
                $_SESSION["error"] = "No se puede eliminar una facura no pagada";
                header("location:" . FRONT_ROOT . "Invoice/ListForm");
            }
        } else {
            $_SESSION["error"] = "El id ingreso no existe en la base de datos";
            header("location:" . FRONT_ROOT . "Invoice/ListForm");
        }
    }
}
