

def faktorial(f):
	if f==1:
		return f
	else:
		return f * faktorial(f-1)
x = faktorial(5)
print(x)