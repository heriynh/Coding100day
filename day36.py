


tab = int(input("Masukkan tabungan :"))
bunga = float(input("Masukkan bunga"))
bulan = int(input("Masukkan bulan :"))

for a in range(bulan):
	a+=1
	tab+=tab*bunga
	print("bulan ke -",a,"Rp. ",str(tab))
	