

#program sederhana python menentukan bilangan prima


angka = int(input("Masukkan sebuah angka :"))

if (angka==2 or angka==3 or angka == 5 or angka == 7) or (angka%2!=0 and angka %3!=0 and angka%5!=0 and angka%7!=0):
	print(angka, "ini adalah bilangan prima")
else:
	print(angka, "bukan bilangan prima")