

#program python belajar equals user login

def login():
	#input username dan password
	username = input("Masukkan username anda :")
	password = input("Masukkan password anda :")
	
	#logika percabanngan
	if username == "Heri" and password == "123":
		print("Selamat anda berhasil login")
	else:
		print("Maaf username dan password salah")		
login()