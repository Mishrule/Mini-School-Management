function receipt(){
				var da = new Date();
				var gfy = da.getFullYear()
				var gy = da.getYear();
				var gm = da.getMonth();
				var gd = da.getDay();
				var gh = da.getHours();
				var gm = da.getMinutes();
				var gs = da.getSeconds();
				var gms = da.getMilliseconds();
				
				var receipt = gy+''+gfy+''+gm+''+gd+''+gh+''+gm+''+gs+''+gms;
				
				return receipt;
}