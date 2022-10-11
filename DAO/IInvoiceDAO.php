<?php
    namespace DAO;

    use Model\Invoice as Invoice;

    interface IInvoiceDAO
    {
        function Add(Invoice $invoice);
        function GetById($id);
        function GetAll();
        function DeleteInvoice($invoice);
        
    }
?>