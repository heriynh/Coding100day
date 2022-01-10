

# program sederhana Menghitung jumlah tabungan di bank dengan bunga

print("="*60)
print("Program python untuk menghitung saldo pada bank dengan bunga")
print("="*60)
tabungan = int(input("Masukkan jumlah tabungan :"))
lama = int(input("Masukkan lama menabung :"))

if tabungan < 1000000:
	sukuBunga = 0.03
	saldoAkhir = (tabungan * sukuBunga) * lama + tabungan
	print("Karena tabungan anda dibawah 1.000.000, bunga yang anda dapatkan 3 %")
	print("Maka setelah menabung selama",str(lama), "Bulan, maka saldo anda adalah", str(saldoAkhir))
elif tabungan == 1000000:
	sukuBunga = 0.04
	saldoAkhir = (tabungan * sukuBunga) * lama + tabungan
	print("Karena tabungan anda sama dengan 1.000.000, bunga yang anda dapatkan 4 %")
	print("Maka setelah menabung selama", str(lama),"Bulan, maka saldo anda adalah",str(saldoAkhir))
elif tabungan > 1000000:
	sukuBunga = 0.05
	saldoAkhir = (tabungan * sukuBunga) * lama + tabungan
	print("Karena tabungan anda lebih beaaf dari 1.000.000, bunga yang anda dapatkan 5 %")
	print("Maka setelah menabung selama", str(lama), "Bulan, maka saldo anda adalah",str(saldoAkhir))
else:
	print("Program berkhir")

