<?php

if (!defined('PILUS_SHOP'))
{
	header("Location: ../../../studio/403.php");
	exit;
}

$totalRows = isset($views['totalRows']) ? htmlspecialchars($views['totalRows']) : '';

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<h1 class="page-header"><?php echo $views['pageTitle']; ?>
			 <a href="index.php?module=customers&action=newCustomer"
					class="btn btn-outline btn-success"> <i
					class="fa fa-plus-circle fa-fw"></i> Tambah Kustomer
				</a>
			</h1>

		</div>
		<!-- /.col-lg-12 -->

	</div>
	<!-- /.row -->

	<?php 
   if (isset($views['errorMessage'])) { ?>

	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert"
			aria-hidden="true">&times;</button>
		<?php echo $views['errorMessage']; ?>
	</div>
<?php
   }
   
   if ( isset( $views['statusMessage'] ) ) { ?>

	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert"
			aria-hidden="true">&times;</button>
		<?php echo $views['statusMessage']; ?>
	</div>

	<?php }?>


	<div class="row">

		<div class="col-lg-12">

			<div class="panel panel-default">

				<div class="panel-heading">
					<?php  echo $totalRows; ?>
					 Customer<?php  echo ( $totalRows != 1 ) ? 's' : ''?>
					in Total
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Lengkap</th>
									<th>Email</th>
									<th>Tipe</th>
									<th>Edit</th>
									<th>Hapus</th>

								</tr>
							</thead>
							<tbody>
								<?php 

								$no = $views['position'];
								foreach ($views['customers'] as $customer) :
									
								$no++;

								?>
								<tr>

									<td><?php echo $no; ?></td>
									<td><?php echo htmlspecialchars($customer -> getCustomerFullname()); ?>
									</td>
									<td><?php echo htmlspecialchars($customer -> getCustomerEmail()); ?>
									</td>
									<td><?php echo htmlspecialchars($customer -> getCustomerType()); ?>
									</td>
									

									<td><a
										href="index.php?module=customers&action=editCustomer&customerId=<?php echo $customer -> getId(); ?>&sessionId=<?php echo $customer -> getCustomer_Session(); ?>"
										class="btn btn-primary"> <i class="fa fa-pencil fa-fw"></i>
											Edit
									</a>
									</td>


									<td><a
										href="javascript:deleteCustomer('<?php echo $customer -> getId(); ?>', '<?php echo $customer -> getCustomerFullname(); ?>')"
										class="btn btn-danger"> <i class="fa fa-trash-o fa-fw"></i>
											Hapus
									</a>
									</td>

								</tr>
								<?php endforeach; ?>

							</tbody>

						</table>
						<!-- /table-responsive -->
					</div>

					<div class="pagination">
						<span> 
						<?php if ($totalRows > 10) echo $views['pageLink']; ?>
						</span>
					</div>

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
  function deleteCustomer(id, fullname)
  {
	  if (confirm("Apakah anda yakin ingin menghapus kustomer anda dengan nama  '" + fullname + "'"))
	  {
	  	window.location.href = 'index.php?module=customers&action=deleteCustomer&customerId=' + id;
	  }
  }
</script>
