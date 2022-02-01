


#program python sederhana 



nama = input("Masukkan nama mahasiswa :")
tugas = float(input("Masukkan nilai tugas :"))
uts = float(input("Masukkan nilai Uts :"))
uas = float(input("Masukkan nilai Uas :"))

# ketentuan kontrak:
# tugas = 25%
# uts = 35%
# uas = 40%

nilai_akhir = (tugas*0.25)+(uts*0.35)+(uas*0.40)

if nilai_akhir >=80 and nilai_akhir <=100:
	grade = "A"
elif nilai_akhir <80 and nilai_akhir>=70:
	grade = "B"
elif nilai_akhir <70 and nilai_akhir>=60:
	grade = "C"
elif nilai_akhir < 60:
	grade = "D"
else :
	grade = "E"
	
if nilai_akhir>= 60:
	status = "Lulus"
else:
	status = "Tidak lulus"
	
print("Hasil perhitungan nilai")
print("__________________________")
print ("Nama mahasiswa :",nama)
print("Nilai tugas :",tugas)
print("Nilai uts :",uts)
print("Nilai Uas :",uas)
print("----------------------")
print("Nilai akhir :",nilai_akhir)
print("grade :",grade)
print("Status :",status)