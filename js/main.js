window.onload = function(){
	let startDateElement = $("#start_date");
	let startDateRentElement = $("#start-date-rent");
	let endDateRentElement = $("#end-date-rent");
	let endDateElement = $("#end_date");
	let submitRentElement = $("#form-cars");
	let submitInvoiceElement = $("#form-invoice");
	let resetFiltersElement = $("#reset-filters");
	let invoiceTable = document.getElementById('table-invoice__body');
	let totalSumElement = document.getElementById('total-sum');

	//Processing Invoices
	submitInvoiceElement.submit(function(event) {
		event.preventDefault();

		$.ajax({
	  		url: "controllers/RentHandler.php",
	  		method: 'POST',
	  		data: $(this).serialize() + '&submit-invoice=1'
		}).done(function(response) {
			let totalSum = parseFloat(0);

			if (response.length < 1) {
				alert('Няма намерени коли!');
				invoiceTable.innerHTML = '';
				totalSumElement.textContent = '';

				return;
			}

			let data = JSON.parse(response);

			invoiceTable.innerHTML = '';

			for(let i = 0; i < data.length; i++){
			    let tr = document.createElement('tr');
			    totalSum += parseFloat(data[i].TOTAL_RENT);

		    	for (let key in data[i]) {
		    		if (data[i].hasOwnProperty(key)) {
			    		let td = document.createElement('td');
				        td.appendChild(document.createTextNode(data[i][key]));
				        tr.appendChild(td);
		    		}
				}
			    invoiceTable.appendChild(tr);
			}

			totalSum = (totalSum).toFixed(2);

			totalSumElement.textContent = totalSum;
		}).fail(function(response) {
			alert("Грешка при филтрирането! Моля опитайте по-късно.");
		});
	});

	//Processing Rents
	submitRentElement.submit(function(event) {
		event.preventDefault();
		let data = getTotalRent();

		if (data === -1) {
			return;
		}

		$.ajax({
	  		url: "controllers/RentHandler.php",
	  		method: 'POST',
	  		data: $(this).serialize() + '&business_days=' + data.business_days 
	  			+ '&total_rent=' + data.total_rent
	  			+ '&submit-rent=1'
		}).done(function(response) {
			let data = JSON.parse(response);
			let errMsg = 'Съжеляваме, но колата е заета от ' + 
				data.RENT_PERIOD_START + ' до ' + data.RENT_PERIOD_END;
				console.log(response);

			if (response != 1) {
				alert(errMsg);

				return;
			}

			alert('Вашата заявка е приета!');
			
		}).fail(function(response) {
			alert("Грешка при заявката! Моля опитайте по-късно.");
		});
	});

	//Reset Invoice Filters
	resetFiltersElement.click(function(event){
		event.preventDefault();

		let filters = document.querySelectorAll('.filter > select:first-of-type');
		filters.forEach((item) => {
	  		item.value = 0;
		});

		//reset the dates
		startDateRentElement.val(startDateRentElement.attr('min'));
		endDateRentElement.val(endDateRentElement.attr('min'));

		totalSumElement.textContent = '';
		invoiceTable.innerHTML = '';
	});
};

function getTotalRent(){
	let startDate = document.getElementById("start_date").value;
	let endDate = document.getElementById("end_date").value;
	
	let workingDays = getBusinessDatesCount(startDate, endDate);
	if (workingDays === -1) {
		alert('Крайната дата на заемане не може да бъде по-ранна от началната дата!');

		return -1;
	}

	if (workingDays === 0) {
		alert('Крайната дата трябва да бъде работен ден!');

		return -1;
	}

	let totalBusinessDays = workingDays;
	let totalSum = 0;

	if (totalBusinessDays >= 1 && totalBusinessDays <= 3) {
		totalSum = totalBusinessDays * 20;
	}else if (totalBusinessDays >= 4 && totalBusinessDays <= 7) {
		totalSum = totalBusinessDays * 18;
	}else if (totalBusinessDays > 7) {
		totalSum = totalBusinessDays * 16;
	}

	let data = { total_rent: totalSum, business_days: totalBusinessDays };

	return data;
}

function getBusinessDatesCount(startDate, endDate) {
    let count = 0;
    let curDate = parseDate(startDate);
    endDate = parseDate(endDate);
    let dateCheck = curDate.getTime() > endDate.getTime();

    if (dateCheck) return -1;

    while (curDate <= endDate) {
        let dayOfWeek = curDate.getDay();

        if(!((dayOfWeek == 6) || (dayOfWeek == 0))){
           count++;
        }
        curDate.setDate(curDate.getDate() + 1);
    }

    return count;
}

function parseDate(input) {
	let parts = input.match(/(\d+)/g);

  	return new Date(parts[0], parts[1]-1, parts[2]);
}