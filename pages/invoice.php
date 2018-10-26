<?php

if(count(get_included_files()) === 1) exit("Direct access not permitted."); 

use RentACar\Base\Rent;

$rentObj = new Rent();
$rentPeriods = $rentObj->getEarliestRent();
$cars = $rentObj->getRents();

$models = array_unique(array_map(function($elem){return $elem['MODEL'];}, $cars));
$year_of_production = array_unique(array_map(function($elem){return $elem['YEAR_OF_PRODUCTION'];}, $cars));
$gearbox = array_unique(array_map(function($elem){return $elem['GEARBOX'];}, $cars));
$horse_power = array_unique(array_map(function($elem){return $elem['HORSE_POWER'];}, $cars));
$millage = array_unique(array_map(function($elem){return $elem['MILLAGE'];}, $cars));
$number_of_doors = array_unique(array_map(function($elem){return $elem['NUMBER_OF_DOORS'];}, $cars));

?>

<div class="content container-fluid">
	<div class="section mx-auto">
		<header class="section__head">
			<h4 class="section__title ">
				Справки
			</h4><!-- /.section__title -->
		</header><!-- /.section__head -->

		<div class="section__body ">
			<div class="form-invoice">
				<form id="form-invoice" action="controllers/RentHandler.php" method="post">
					<div class="form__body">
						<div class="date-picker">
					        <label for="start">Начална</label>

					        <input type="date" id="start-date-rent" name="start_date_rent"
				         		min="<?php echo($rentPeriods['MIN_DATE']); ?>" 
								max="<?php echo($rentPeriods['MAX_DATE']); ?>"
								value="<?php echo($rentPeriods['MIN_DATE']); ?>">

							<label for="start">Крайна</label>

					        <input type="date" id="end-date-rent" name="end_date_rent"
					        	min="<?php echo($rentPeriods['MIN_DATE']); ?>" 
								max="<?php echo($rentPeriods['MAX_DATE']); ?>"
								value="<?php echo($rentPeriods['MIN_DATE']); ?>">
					    </div><!-- /.date-picker -->
						
						<div class="filter">
							<p>
								Модел
							</p>

						    <select name="model" id="model">
					    		<option value="0">Всички</option>

						    	<?php foreach ($models as $key => $model) { ?>
						    		<option value="<?php echo $model; ?>">
						    			<?php echo $model; ?>
						    		</option>
						    	<?php
						    		}
						    	?>
						    </select>
					    </div><!-- /.filter -->
							
						<div class="filter">
							<p>
								Година на производство
							</p>

					      	<select name="year_of_production" id="year_of_production">
					    		<option value="0">Всички</option>

						    	<?php foreach ($year_of_production as $key => $year_of_production) { ?>
						    		<option value="<?php echo $year_of_production; ?>">
						    			<?php 
						    				$parts = strtok($year_of_production, '-');
	  										
						    				echo $parts;
						    			?>
						    		</option>
						    	<?php
						    		}
						    	?>
						    </select>
					    </div><!-- /.filter -->
						
						<div class="filter">
							<p>
								Брой Врати
							</p>

						    <select name="number_of_doors" id="number_of_doors">
					    		<option value="0">Всички</option>

						    	<?php foreach ($number_of_doors as $key => $number_of_doors) { ?>
						    		<option value="<?php echo $number_of_doors; ?>">
						    			<?php echo $number_of_doors; ?>
						    		</option>
						    	<?php
						    		}
						    	?>
						    </select>
					    </div><!-- /.filter -->
						
						<div class="filter">
							<p>
								Тип скоростна кутия
							</p>

						    <select name="gearbox" id="gearbox">
					    		<option value="0">Всички</option>

						    	<?php foreach ($gearbox as $key => $gearbox) { ?>
						    		<option value="<?php echo $gearbox; ?>">
						    			<?php echo $gearbox; ?>
						    		</option>
						    	<?php
						    		}
						    	?>
						    </select>
					    </div><!-- /.filter -->
						
						<div class="filter">
							<p>
								Конски сили
							</p>

						    <select name="horse_power" id="horse_power">
					    		<option value="0">Всички</option>

						    	<?php foreach ($horse_power as $key => $horse_power) { ?>
						    		<option value="<?php echo $horse_power; ?>">
						    			<?php echo $horse_power; ?>
						    		</option>
						    	<?php
						    		}
						    	?>
						    </select>
					    </div><!-- /.filter -->
					</div><!-- /.form__body -->
					
					<div class="form__actions">
						<button type="submit" name="submit-invoice" id="submit-invoice" class="form__btn">
							Намери
						</button>

						<button type="button" name="reset-filters" id="reset-filters" class="form__btn">
							Изчисти филтрите
						</button>
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form -->
			
			<div class="table">
				<table id="table-invoice">
					<thead>
						<tr>
							<td>
								Модел
							</td>

							<td>
								Начална дата на наемане
							</td>

							<td>
								Крайна дата на наемане
							</td>

							<td>
								Брой наети дни(само работни)
							</td>

							<td>
								Общо(в евро)
							</td>
						</tr>
					</thead>

					<tbody id="table-invoice__body">
					</tbody>

					<tfoot>
					    <tr>
					      <td colspan="4">Общо</td>
					      <td id="total-sum"></td>
					    </tr>
					  </tfoot>
				</table>
			</div><!-- /#table-invoice.table -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.content -->