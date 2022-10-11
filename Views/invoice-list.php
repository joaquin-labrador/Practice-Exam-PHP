<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Facturas</h2>
               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>Id</th>
                         <th>Categoría</th>
                         <th>Nro. Factura</th>
                         <th>Importe</th>
                         <th>Fecha Vencimiento</th>
                         <th>Pagado</th>
                    </thead>
                    <tbody>
                         <?php 
                              foreach($invoiceList as $invoice){
                                   $invoiceCategoryId = $invoice->GetInvoiceCategoryID();
                                   $invoiceCategory = $this->invoiceCategoryDAO->GetById($invoiceCategoryId);
                                   
                                   if($invoiceCategory->GetActive() == 1){
                                        $isPayed =  $invoice->GetPayed() == true ? "Si" : "No";
                                        echo '<tr>';
                                             echo '<td>' . $invoice->GetInvoiceId() . '</td>';
                                             echo '<td>' . $invoiceCategory->GetDescription() . '</td>';
                                             echo '<td>' . $invoice->GetNumber() . '</td>';
                                             echo '<td>' . $invoice->GetAmount() . '</td>';
                                             echo '<td>' . $invoice->GetDueDate() . '</td>';
                                             echo '<td>' . $isPayed .'</td>';
                                        echo '</tr>';
                                   }

                              }

                         ?>
                    </tbody>
               </table>
          </div>
     </section>
     <section id="agregar" class="mb-5">
          <form action="<?php echo FRONT_ROOT ?>Invoice/DeleteInvoice" method="POST">
          <div class="container">
               <h3 class="mb-3">Eliminar Factura</h3>
               <div class="bg-light p-4">
                    <div class="row">
                         <div class="col-lg-3">
                              <label for="">Id</label>
                              <input type="number" name="invoiceId" class="form-control form-control-ml" required value="">
                         </div>
                         <div class="col-lg-3">
                              <span>&nbsp;</span>
                              <button type="submit" class="btn btn-danger ml-auto d-block">Eliminar</button>
                         </div>

                    </div>                    
               </div>
          </div>
          </form>
     </section>
</main>