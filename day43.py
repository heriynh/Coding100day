

#program python sederhana hitung bunga bank


tabungan = int(input("Masukkan tabungan"))
bunga = float(input("Masukkan bunga :"))
bulan = int(input("Masukkan bulan :"))
for a in range (bulan):
	a+=1
	tabungan +=tabungan*bunga
	print("Tabungan bulan ke :",str(a),str(tabungan))