<?php if(count(get_included_files()) === 1) exit("Direct access not permitted."); ?>

<div class="content container-fluid">
	<div class="section mx-auto">
		<header class="section__head">
			<h4 class="section__title ">
				Въвеждане на коли
			</h4><!-- /.section__title -->
		</header><!-- /.section__head -->

		<div class="section__body ">
			<div class="form-car">
				<form action="controllers/CarHandler.php" method="POST">
					<div class="form__body">
						<div class="form__row">
							<label for="field-model" class="form__label">Модел</label>
							
							<div class="form__controls">
								<input type="text" class="field" maxlength="50" name="field-model" id="field-model" value="" required placeholder="Модел">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->

						<div class="form__row">
							<label for="field-year_of_production" class="form__label">Година на производство</label>
							
							<div class="form__controls">
								<input type="number" autocomplete="off" min="1920" max="<?php echo date('Y'); ?>" class="field" name="field-year_of_production" id="datepicker" value="1920">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->

						<div class="form__row">
							<label for="field-number_of_doors" class="form__label">Врати</label>
							
							<div class="form__controls">
								<input type="number" min="3" max="5" class="field" name="field-number_of_doors" id="field-number_of_doors" value="" required placeholder="Врати">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->

						<div class="form__row">
							<label for="field-gearbox" class="form__label">Тип скоростна кутия</label>
							
							<div class="form__controls">
								<select name="field-gearbox" id="field-gearbox">
									<option value="1" selected>Автоматична</option>
									<option value="2">Полу-Автоматична</option>
									<option value="3">Ръчна</option>
								</select>
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->

						<div class="form__row">
							<label for="field-horse_power" class="form__label">Конски сили</label>
							
							<div class="form__controls">
								<input type="number" min="50" max="500" class="field" name="field-horse_power" id="field-horse_power" value="" required placeholder="Конски сили">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->

						<div class="form__row">
							<label for="field-millage" class="form__label">Пробег</label>
							
							<div class="form__controls">
								<input type="number" min="0" max="9999999" class="field" name="field-millage" id="field-millage" value="" required placeholder="Пробег">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->
						
						<div class="form__row">
							<label for="field-details" class="form__label">Детайли</label>
							
							<div class="form__controls">
								<textarea class="textarea" maxlength="200" name="field-details" id="field-details" placeholder="Детайли"></textarea>
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->
					</div><!-- /.form__body -->
					
					<div class="form__actions">
						<button type="submit" name="submit-insert" class="form__btn">
							Запази
						</button>
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form-car -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.content -->