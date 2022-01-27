

#program kasir sederhana menggunakan phyton


def kasir():
		#Masukkan input user
		barang = input("Masukkan nama barang :")
		harga = float(input("Masukkan harga barang :"))
		jumlah = int(input("Masukkan jumlah barang :"))
	
		#menghitung jumlah harga
		total = harga * jumlah
	
		#input pembayaran dari user
		bayar = float(input("Masukkan pembayaran :"))
		
		#mengecek apakah pembayaran kurang
		kurang = total-bayar
		kembalian = bayar-total
		
		if bayar > total:
			print("Kembalian anda adalah :",str(kembalian))
		elif bayar == total :
			print("Uang anda pass, terimah kasih telah belanja disini ")
		else:
			print("Maaf uang anda kurang :",str(kurang))

kasir()
	