

#program python sederhana faktorial

def faktorial(n):
	if n==1:
		return n
	else:
		return n*faktorial(n-1)
x = faktorial(5)
print(x)