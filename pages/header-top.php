<?php if(count(get_included_files()) === 1) exit("Direct access not permitted."); ?>

<div class="main container-fluid">
	<div class="header row">
		<div class="btn btn-home col-sm">
			<a href="?page=home">
				Начало
			</a>
		</div><!-- /.btn btn-car -->

		<div class="btn btn-car col-sm">
			<a href="?page=car">
				Въвеждане на коли
			</a>
		</div><!-- /.btn btn-car -->

		<div class="btn btn-invoice col-sm">
			<a href="?page=invoice">
				Справки
			</a>
		</div><!-- /.btn btn-invoice -->
	</div><!-- /.header -->