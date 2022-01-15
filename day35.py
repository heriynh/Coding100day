

#hitung bunga bank

tab = 1000000
bunga = 0.10
bulan = 1

while (bulan <=12):
	tab += tab*bunga
	print("bulan ke -",bulan,"Rp.",tab)
	bulan+=1
	