
#belajar python
print ("====Program sederhan pemilihan jurusan====")
mtk = int(input("Masukkan nilai matematika"))
ingris = int(input("Masukkan nilai bahasa ingris"))
indo = int(input("Masukkan nilai bahasa indonesia"))

rata_rata = (mtk+ingris+indo) / 3

if rata_rata <70:
	print ("Nilai anda tidak cukup  :")
	print(rata_rata)
elif rata_rata ==70:
	print("pilih 1 untuk teknik elektro, 2 untuk teknik mesin, 3 untuk pariwisata")
	pilih = int(input("Silahkan masukkan pilihan 1,2,3"))
	if pilih==1:
		print("Teknik Elektro")
	elif pilih == 2:
		print("Teknik mesin")
	elif pilih == 3 :
		print("Pariwisata")
	else:
		print("anda memasukkan angka salah")
elif rata_rata > 70 and rata_rata<=100:
	print("anda bebas memilih yang disukai")
else:
	print("nilai tidak di ketahui")