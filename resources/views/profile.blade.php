<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Мой аккаунт</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
            body {
                font-family: 'Nunito', sans-serif;
            }
			.Butt_Auth{
				width: 100% !important;
				height: 50px !important;
				background-color: rgb(153, 247, 243);
			}
			.Input_Auth{
				width: 100% !important;
			}
			.Butt_Auth:hover{
				background-color: #68e8e2;
			}
			*{
				font-size: 14pt;
			}
			a{
				color: blue;
			}
			a
			{
				text-transform: none;
				width: 290px;
				min-width: 290px;
			}
			@media screen and (min-width: 900px) {
				a{
					text-transform: none;
					width: 300px !important;
					min-width: 300px !important;
				}
			}
			

		</style>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>
	
    <body class="antialiased">
		<center>
		<div id="main">
			<div>
				Привет, <label id="name_"></label> <label id="surname"></label>.	
				<div class="container mb-4">
					<div class="row mb-4 mt-2">
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal">Все сделки (<label id="deal_all">0</label>)</a>
						</div>
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal_success">Успешные сделки (<label id="deal_status_done">0</label>)</a>
						</div>
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal_await_completed">Ожидается выполнение сделки (<label id="deal_status_expected">0</label>)</a>
						</div>
						
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal_canceled">Отмененные сделки (<label id="deal_status_canceled">0</label>)</a>
						</div>
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal_canceled_await">Ожидающие отмены сделки (<label id="deal_status_waiting">0</label>)</a>
						</div>
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal_suspended">Приостановленные сделки (<label id="deal_status_suspended">0</label>)</a>
						</div>
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#setting">Настройки</a>
						</div>
						<div class="col-sm mb-4">
							<a class="btn btn-primary btn-sm" href="#deal_start_canceled">Открыть спор</a>
						</div>
					</div>
					<div id="table_down">
					</div>
				</div>
				
				
			</div>
		</div>
		</center>
		<script>
			setInterval(cheked_hash_url, 100);
			function cheked_hash_url()
			{
			
				var hash = document.location.hash
				if(hash != "")
				{
					table_down.innerHTML = "";
					switch(hash) {
						case '#deal':
							document.cookie.split(';').forEach(element => {
								deal(element)	
							});
							break
						case '#deal_success':
							document.cookie.split(';').forEach(element => {
								deal_success(element)	
							});
							break
						case '#deal_canceled':
							document.cookie.split(';').forEach(element => {
								deal_canceled(element)	
							});
							break
						case '#deal_canceled_await':
							document.cookie.split(';').forEach(element => {
								deal_canceled_await(element)	
							});
							break
						case '#deal_suspended':
							document.cookie.split(';').forEach(element => {
								deal_suspended(element)	
							});
							break
						case '#deal_await_completed':
							document.cookie.split(';').forEach(element => {
								deal_await_completed(element)	
							});
							break
						case '#setting':
							setting()
							break
						case '#deal_start_canceled':
							deal_start_canceled()
							break
					}
					document.location.hash = ""
				}
			}
			async function deal(element)
			{
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID") {
					let response = await fetch("/api/deal/all/" + element.split('=')[1]);
					if (response.ok) {
						let json = await response.json();
						if(json['error'] == "200")
						{
							addHeaderTable()
							var i = 0;
							json['company'].forEach(element => {
								var elem2 = document.createElement('tr');
								elem2.className = "tr"
								tbody.appendChild(elem2);
								elem2 = document.createElement('th');
								elem2.scope = "row"
								elem2.innerHTML = i+1;    
								document.getElementsByClassName('tr')[i].appendChild(elem2);
								elem2 = document.createElement('td');
								elem2.innerHTML = element['name_company'];    
								document.getElementsByClassName('tr')[i].appendChild(elem2);
								elem2 = document.createElement('td');
								elem2.innerHTML = element['status_company'];    
								document.getElementsByClassName('tr')[i].appendChild(elem2);
								i++
							});
						}
					}
				}
			}
			
			function deal_success(element)
			{
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID") {
					GetUL(element, "0")
				}
			}
			async function deal_canceled(element)
			{
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID") {
					GetUL(element, "2")
				}
			}
			async function deal_canceled_await(element)
			{
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID") {
					GetUL(element, "3")
				}
			}
			async function deal_suspended(element)
			{
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID") {
					GetUL(element, "4")
				}
			}
			async function deal_await_completed(element)
			{
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID") {
					GetUL(element, "1")
				}
			}
			async function setting(element)
			{
				
			}
			async function deal_start_canceled(element)
			{
				
			}
			async function green(element) {
				if(element.split('=')[0] == " cookieID" || element.split('=')[0] == "cookieID")
				{
					var url = "/api/auth/hash/?hash=" + element.split('=')[1]
					let response = await fetch(url);
					if (response.ok) {
						let json = await response.json();
						if(json['error'] == "200")
						{
							getFIO(json['userID'])
							var urls = "/api/deal/info_profile/" + json['userID']
							let responser = await fetch(urls);
							if (responser.ok) {
								
								let texter = await responser.json();
								if(texter['error'] == "200")
								{
									deal_status_canceled.innerHTML = texter['deal_status_canceled']
									deal_status_done.innerHTML = texter['deal_status_done']
									deal_status_expected.innerHTML = texter['deal_status_expected']
									deal_status_waiting.innerHTML = texter['deal_status_waiting']
									deal_status_suspended.innerHTML = texter['deal_status_suspended']
									deal_all.innerHTML = texter['deal_all']
								}
							}
						}
					}
				}
			}
			async function GetUL(element, type)
			{
				let response = await fetch("/api/deal/get/" + element.split('=')[1] + "/" + type);
				if (response.ok) {
					let json = await response.json();
					if(json['error'] == "200")
					{
						addHeaderTable()
						var i = 0;
						json['company'].forEach(element => {
							var elem2 = document.createElement('tr');
							elem2.className = "tr"
							tbody.appendChild(elem2);
							elem2 = document.createElement('th');
							elem2.scope = "row"
							elem2.innerHTML = i+1;    
							document.getElementsByClassName('tr')[i].appendChild(elem2);
							elem2 = document.createElement('td');
							elem2.innerHTML = element['name_company'];    
							document.getElementsByClassName('tr')[i].appendChild(elem2);
							elem2 = document.createElement('td');
							elem2.innerHTML = element['status_company'];    
							document.getElementsByClassName('tr')[i].appendChild(elem2);
							i++
						});
					}
				}
			}
			async function getFIO(id)
			{
				var urls = "/api/user/Get_Full_name/" + id
				let responser = await fetch(urls);
				if (responser.ok) {
					let texter = await responser.json();
					if(texter['error'] == "200")
					{
						name_.innerHTML = texter['userInfo']['name']
						surname.innerHTML = texter['userInfo']['surname']
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
				elem2.innerHTML = "Название компании"
				tr_up.appendChild(elem2);
				
				elem2 = document.createElement('th');
				elem2.scope = "col"
				elem2.innerHTML = "Статус компании"
				tr_up.appendChild(elem2);
				
				elem2 = document.createElement('tbody');
				elem2.id = "tbody"
				table.appendChild(elem2);
				
				
				//elem2.innerHTML = element['name_company'];
			}
			document.cookie.split(';').forEach(element =>{  green(element)});
		</script>
    </body>
</html>
