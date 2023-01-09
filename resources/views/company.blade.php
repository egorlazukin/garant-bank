<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Компания</title>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="container mb-4">
			<center>
				<div class="row mb-4 mt-2">
					<div class="col-sm mb-4" style="width: 300px;">
						<a class="btn btn-primary btn-sm" href="" style="width: 300px;">Мой аккаунт</a>
					</div>
					<div class="col-sm mb-4" >
						<a class="btn btn-primary btn-sm" href="" style="width: 300px;">Создать новую сделку</a>
					</div>
					<div class="col-sm mb-4" style="width: 300px;">
						<form>
							<input type="sears" name="sears" style="width: 200px;" placeholder="Имя или ИНН">
						</form>
					</div>
				</div>
			</center>
		<div class="row mb-4 mt-2">
			<div class="col-sm mb-4">
				<label id="label_Stat"></label> <b><label id="label_name" style="font-size: 15px;"></label></b><br>
				<label>ИНН: <label id="label_inn"></label></label><br>
				<b>О компании:</b><br><label id="label_Info"></label>
			</div>
			<div class="col-sm mb-4">
				<center>
					<img id="photo_company" width="200" height="200" src="">
				</center>
			</div>
		</div>
			<br>
			<center class="mb-4"><h2>Мы тут работаем!</h2></center>

			<div id="table_down">
			</div>

		
	</div>
</body>
<script type="text/javascript">
	async function GetInfoCompany(element)
	{
		let response = await fetch("/api/company/info/" + element + "?update=1");
		if (response.ok) {
			let json = await response.json();
			if(json['error'] == "200")
			{
				
				label_Stat.innerHTML = json['status_company']['status_company'] 
				label_name.innerHTML = json['status_company']['name_company']
				label_inn.innerHTML = json['status_company']['inn_company']
				photo_company.src = json['photo_url']
				var other_info = json['other_info']
				if(other_info == "")
				{
					label_Info.innerHTML = "Информация не заполнена.";
				}
				else
				{
					label_Info.innerHTML = other_info;
				}
				addHeaderTable()
				var i = 0;
				json['array_vorker'].forEach(element => {
					var elem2 = document.createElement('tr');
					elem2.className = "tr"
					tbody.appendChild(elem2);
					elem2 = document.createElement('th');
					elem2.scope = "row"
					elem2.innerHTML = i+1;    
					document.getElementsByClassName('tr')[i].appendChild(elem2);
					elem2 = document.createElement('td');
					elem2.innerHTML = element['user_name'];    
					document.getElementsByClassName('tr')[i].appendChild(elem2);
					elem2 = document.createElement('td');
					elem2.innerHTML = element['employee_title_job'];    
					document.getElementsByClassName('tr')[i].appendChild(elem2);
					i++
				});
			}
		}
	}


	function addHeaderTable()
	{
		var elem2 = document.createElement('table');
		elem2.id = "table"
		elem2.className = "table"
		table_down.appendChild(elem2);
				
		elem2 = document.createElement('thead');
		elem2.id = 'thead';
		table.appendChild(elem2);			

		elem2 = document.createElement('tr');
		elem2.id = 'tr_up';
		thead.appendChild(elem2);
		
		elem2 = document.createElement('th');
		elem2.scope = "col"
		elem2.innerHTML = "#"
		tr_up.appendChild(elem2);
				
		elem2 = document.createElement('th');
		elem2.scope = "col"
		elem2.innerHTML = "Имя работника"
		tr_up.appendChild(elem2);
				
		elem2 = document.createElement('th');
		elem2.scope = "col"
		elem2.innerHTML = "Вакансия работника"
		tr_up.appendChild(elem2);
				
		elem2 = document.createElement('tbody');
		elem2.id = "tbody"
		table.appendChild(elem2);
	}
	GetInfoCompany(document.location.pathname.split('/')[2])
	
</script>
</html>