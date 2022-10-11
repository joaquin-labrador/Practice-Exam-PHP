<?php
    namespace DAO;

    use Model\InvoiceCategory as InvoiceCategory;
    

    interface IInvoiceCategoryDAO {
        function Add(InvoiceCategory $invoice);
        function GetById($id);
        function GetAll();

    }
?>