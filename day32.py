

#program python sederhana
print("---Menghitung Nilai----")

nama = input("Masukkan nama mahasiswa : ")
nilai = int(input("Masukka nilai mahasiswa : "))

if nilai <=100 and nilai >=80:
	grade = 'A'
	print(nama, "Selamat Nilai anda",str(nilai),grade)
elif nilai <80 and nilai >=70 :
	grade ='B'
	print(nama, "Selamat Nilai anda",str(nilai),grade)
elif nilai <70 and nilai >= 60:
	grade = 'C'
	print(nama, "Selamat Nilai anda", str(nilai),grade)
elif nilai <60 and nilai >= 50:
	grade = 'D'
	print (nama, "Selamat Nilai anda",str(nilai),grade)
elif nilai < 50:
	grade = 'E'
	print(nama, "Selamat Nilai anda",str(nilai),grade)
else:
	print("Nilai not found")