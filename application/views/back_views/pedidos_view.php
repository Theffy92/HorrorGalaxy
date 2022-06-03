<div class="container">
<table class="table table-hover">
<thead>
	<th>N° factura</th>
	<th>Fecha</th>
	<th>Cliente</th>
	<th></th>
</thead>
<tbody>
	<?php foreach ($ventas->result() as $row) {?>
	     
	<tr>	 
	      <td><?php echo $row->serial; ?></td>
	     <td><?php echo $row->date;?></td>
	     <td><?php echo $row->nombre;?></td>
	     <td><a class="btn btn-success" href='<?php echo base_url("index.php/detalles/$row->serial") ?>'>Detalles</a></td>
	     </tr>
	<?php 
	}?>
</tbody>
</table>
</div>