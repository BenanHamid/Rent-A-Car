<?php

if(count(get_included_files()) === 1) exit("Direct access not permitted."); 

use RentACar\Base\Car;

$carObj = new Car();
$cars = $carObj->getCars();

?>

<div class="content container-fluid">
	<div class="section mx-auto">
		<header class="section__head">
			<h4 class="section__title ">
				Заявка за Резервация
			</h4><!-- /.section__title -->
		</header><!-- /.section__head -->

		<div class="section__body">
			<div class="form-cars">
			<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
				<form id="form-cars" action="controllers/RentHandler.php" method="post">
					<div class="form__body">
						<div class="cars">
							<?php 
								$index = 0;

								foreach ($cars as $k => $car) { ?>
								<div class="car">
									<input type="radio" name="car_id" value="<?php echo $car['ID']; ?>" <?php echo $index == 0 ? 'checked' : '' ?> />
									<span>
										<?php 
											echo 'Модел: ' . $car['MODEL'] . '<br />';
											echo 'Година на производство: ' . $car['YEAR_OF_PRODUCTION'] . '<br />';
											echo 'Врати: ' . $car['NUMBER_OF_DOORS'] . '<br />';
											echo 'Скоростна кутия: ' . $car['GEARBOX'] . '<br />';
											echo 'Конски сили: ' . $car['HORSE_POWER'] . '<br />';
											echo 'Пробег: ' . $car['MILLAGE'] . '<br />';

											if (!empty($car['DETAILS'])) {
												echo 'Детайли: ' . $car['DETAILS'] . '<br />';
											}
										?>
									</span>
								</div><!-- /.car -->
							<?php
								$index++;
								}
							?>
						</div><!-- /.cars -->

						<div class="reservation-calendar">
							<fieldset>
							    <legend>Моля изберете начална и крайна дата</legend>

							    <div class="date-picker">
							        <label for="start">Начална</label>
							        <input type="date" id="start_date" name="start_date"
							        	   value="<?php echo date("Y-m-d"); ?>"
							               min="<?php echo date("Y-m-d"); ?>" max="2018-12-31" />
							    </div>

							    <div class="date-picker">
							        <label for="end">Крайна</label>
							        <input type="date" id="end_date" name="end_date"
							               value="<?php echo date("Y-m-d"); ?>"
							               min="<?php echo date("Y-m-d"); ?>" max="2018-12-31"/ >
							    </div>
							</fieldset>
						</div><!-- /.reservation-calendar -->
					</div><!-- /.form__body -->
					
					<div class="form__actions">
						<?php
							if (count($cars) > 0) { ?>
								<button type="submit" name="submit-rent" id="submit-rent" class="form__btn">
									Запази
								</button>
						<?php		
							} 
						 ?>
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form-cars -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.content -->