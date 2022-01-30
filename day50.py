

#program python konverter


print("***Selamat datang di program konversi nilai***")
print("PYTHON CONVERTER")
print(" Contoh : dari cm ke km")
con1 = input("Dari :")
con2 = input("Ke :")
if (con1=="cm" or con1=="CM" or con1=="Cm") and (con2=="M" or con2=="m"):
	print("konversi Cm ke M")
	bil1= int(input("Masukkan nilai dalam satuan Cm :"))
	hasil= bil1 / 100
	print("Hasil conversi ke Meter adalah ",hasil,"M")
elif (con1=="cm" or con1=="CM" or con1=="Cm") and (con2=="KM" or con2=="Km" or con2=="km"):
	print("konversi Cm ke Km")
	bil1= int(input("Masukkan nilai dalam satuan Cm :"))
	hasil= bil1 / 1000
	print("Hasil conversi ke Meter adalah ",hasil,"Km")
else:
	print("maaf program hanya menghitung conversi cm ke m dan cm ke km")
	
	