

#program python sederhana

print("PROGRAM MENGHITUNG BERAT BADAN IDEAL")
print("="*20)
print("1. Laki-laki")
print("2. Perrmpuan")
print("="*20)
a = int(input("Masukkan pilihan anda 1/2 :"))

if a == 1:
	print("Laki-Laki")
	
	x = float(input("Masukkan berat badan anda :"))
	y = float(input("Masukkan tinggi badan anda :"))/100
	z = (x / (y*y))
	print(x, "/", y*y, "=",z)
	if z < 17:
		print("Berat badan terlalu kurus")
	elif   z <=18:
		print("Berat badan kurus")
	elif z <= 25:
		print("Berat badan normal")
	elif  z <= 27:
		print("Berat badan gemuk")
	elif z > 27:
		print("Berat badan terlalu gemuk")
	
elif a == 2:
	print("Perempuan")
	
	x = float(input("Masukkan berat badan anda :"))
	y = float(input("Masukkan tinggi badan anda :"))/100
	z = (x / (y*y))
	print(x, "/", y*y, "=",z)
	if z < 17:
		print("Berat badan terlalu kurus")
	elif z <=18:
		print("Berat badan kurus")
	elif z <= 25:
		print("Berat badan normal")
	elif z <= 27:
		print("Berat badan gemuk")
	elif z > 27:
		print("Berat badan terlalu gemuk")
	



